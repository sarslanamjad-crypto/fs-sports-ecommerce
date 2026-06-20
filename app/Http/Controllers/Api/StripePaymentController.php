<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\OrdersTransaction;
use App\Models\PaymentTransaction;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class StripePaymentController extends Controller
{
    /**
     * Validate session user (mirrors FrontendApiController pattern).
     */
    private function getValidatedUser()
    {
        $userId = session('user_id');
        if (!$userId) return null;

        $user = Registration::find($userId);
        if (!$user) {
            session()->forget(['user_id', 'customer_id', 'user_name', 'user_email']);
            return null;
        }

        return $user;
    }

    /**
     * Create a Stripe Checkout Session for the given order.
     *
     * POST /api/frontend/stripe/checkout/{order_id}
     */
    public function checkout(Request $request, $order_id): JsonResponse
    {
        $user = $this->getValidatedUser();
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Please login first.'
            ], 401);
        }

        // Find the order belonging to this user
        $order = OrdersTransaction::where('id', $order_id)
            ->where('user_id', $user->id)
            ->first();

        if (!$order) {
            return response()->json([
                'success' => false,
                'message' => 'Order not found.'
            ], 404);
        }

        try {
            // Set Stripe secret key from environment
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            // Build line items from order details by looping through order items
            $orderItems = \App\Models\OrderItem::where('order_id', $order->id)->get();
            $lineItems = [];
            foreach ($orderItems as $orderItem) {
                $productName = $orderItem->product ? $orderItem->product->title : ('Product #' . $orderItem->product_id);
                $lineItems[] = [
                    'price_data' => [
                        'currency'     => 'pkr',
                        'product_data' => [
                            'name' => $productName,
                        ],
                        'unit_amount'  => intval(($orderItem->price_at_purchase) * 100), // Stripe reads cents
                    ],
                    'quantity' => $orderItem->quantity,
                ];
            }

            // Create the Stripe Checkout Session
            $session = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'line_items'           => $lineItems,
                'mode'                 => 'payment',
                'success_url'          => route('stripe.success', ['order_id' => $order->id]),
                'cancel_url'           => route('stripe.cancel', ['order_id' => $order->id]),
            ]);

            return response()->json([
                'success' => true,
                'url'     => $session->url,
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Stripe session creation failed: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Handle successful Stripe payment return.
     *
     * GET /stripe/success/{order_id}
     */
    public function paymentSuccess(Request $request, $order_id)
    {
        $user = $this->getValidatedUser();

        $order = OrdersTransaction::find($order_id);

        if ($order) {
            // Update the order record
            $order->order_status = 'confirmed';
            $order->save();

            // Update the associated payment transaction
            $payment = PaymentTransaction::where('order_id', $order->id)->first();
            if ($payment) {
                $payment->status = 'Paid';
                $payment->payment_method = 'Stripe';
                $payment->save();
            }
        }

        // Flush the user's cart
        if ($user) {
            CartItem::where('user_id', $user->id)->delete();
        }

        // Redirect to the account page with a success flag
        return redirect()->route('my_account.html')->with('stripe_success', $order ? $order->order_reference_id : '');
    }

    /**
     * Handle cancelled Stripe payment return.
     *
     * GET /stripe/cancel/{order_id}
     */
    public function paymentCancel(Request $request, $order_id)
    {
        return redirect()->route('cart_checkout.html')->with('stripe_cancelled', true);
    }
}
