<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Customer;
use App\Models\Faq;

use App\Models\LoginSecurityLog;
use App\Models\NewsletterSubscriber;
use App\Models\OrderItem;
use App\Models\OrdersTransaction;
use App\Models\PaymentTransaction;
use App\Models\ProductReview;
use App\Models\ProductsInventory;

use App\Models\Registration;
use App\Models\SearchLog;
use App\Models\ShippingDetail;
use App\Models\SiteSetting;
use App\Models\Team;

use App\Models\Wishlist;
use App\Models\WhatsappClick;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class FrontendApiController extends Controller
{
    // ─── Site Settings ─────────────────────────────────────────────
    public function siteSettings(): JsonResponse
    {
        $settings = SiteSetting::first();
        return response()->json([
            'success' => true,
            'data' => $settings
        ]);
    }

    // ─── Categories ────────────────────────────────────────────────
    public function categories(): JsonResponse
    {
        $categories = Category::active()->get();
        return response()->json([
            'success' => true,
            'data' => $categories
        ]);
    }

    // ─── Products (with Search Logging) ────────────────────────────
    public function products(Request $request): JsonResponse
    {
        $query = ProductsInventory::active()->with('category');

        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->has('search') && $request->search) {
            $keyword = $request->search;
            $query->where('title', 'like', '%' . $keyword . '%');

            // ── Feature 5: Search Logging ──
            $log = SearchLog::where('keyword', $keyword)->first();
            if ($log) {
                $log->increment('hit_count');
                $log->update(['last_searched_at' => now()]);
            } else {
                SearchLog::create([
                    'keyword' => $keyword,
                    'hit_count' => 1,
                    'last_searched_at' => now()
                ]);
            }
        }

        if ($request->has('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->has('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        if ($request->has('in_house')) {
            $query->where('is_in_house_brand', $request->in_house);
        }

        $products = $query->orderByRaw('discount_percentage DESC')->get();

        return response()->json([
            'success' => true,
            'data' => $products
        ]);
    }

    public function productDetail($id): JsonResponse
    {
        $product = ProductsInventory::active()->with('category')->find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $product
        ]);
    }

    public function featuredProducts(): JsonResponse
    {
        $products = ProductsInventory::active()
            ->with('category')
            ->orderByRaw('discount_percentage DESC')
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        return response()->json([
            'success' => true,
            'data' => $products
        ]);
    }

    // ─── Team ──────────────────────────────────────────────────────
    public function team(): JsonResponse
    {
        $team = Team::active()->get();
        return response()->json([
            'success' => true,
            'data' => $team
        ]);
    }

    // ─── FAQs ──────────────────────────────────────────────────────
    public function faqs(): JsonResponse
    {
        $faqs = Faq::active()->get();
        return response()->json([
            'success' => true,
            'data' => $faqs
        ]);
    }

    // ─── Branches (Store Locator) ──────────────────────────────────
    public function branches(): JsonResponse
    {
        $branches = Branch::active()->get();
        return response()->json([
            'success' => true,
            'data' => $branches
        ]);
    }



    // ─── Product Reviews ───────────────────────────────────────────
    public function reviews($productId): JsonResponse
    {
        $reviews = ProductReview::where('product_id', $productId)
            ->where('is_visible', 1)
            ->get();

        return response()->json([
            'success' => true,
            'data' => $reviews
        ]);
    }

    // ─── Contact Form ──────────────────────────────────────────────
    public function submitContact(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string'
        ]);

        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'contact' => $request->contact ?? '',
            'subject' => $request->subject,
            'message' => $request->message,
            'ip' => $request->ip()
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Message sent successfully!',
            'data' => $contact
        ]);
    }

    // ─── Newsletter ────────────────────────────────────────────────
    public function subscribeNewsletter(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $existing = NewsletterSubscriber::where('email', $request->email)->first();
        if ($existing) {
            return response()->json([
                'success' => false,
                'message' => 'Already subscribed!'
            ]);
        }

        NewsletterSubscriber::create([
            'email' => $request->email,
            'is_subscribed' => 1,
            'subscribed_at' => now()
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Subscribed successfully!'
        ]);
    }

    // ─── WhatsApp Click Logging ────────────────────────────────────
    public function logWhatsappClick(Request $request): JsonResponse
    {
        WhatsappClick::create([
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent()
        ]);

        return response()->json([
            'success' => true,
            'message' => 'WhatsApp click logged successfully.'
        ]);
    }

    // ═══════════════════════════════════════════════════════════════
    // Feature 1: Registration + Customer Sync
    // ═══════════════════════════════════════════════════════════════
    public function register(Request $request): JsonResponse
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:registration,email',
            'password' => 'required|min:6'
        ]);

        // Create in registration table
        $user = Registration::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => md5($request->password)
        ]);

        // Sync to customers table so admin panel sees this customer
        $customer = Customer::create([
            'name' => $request->first_name . ' ' . $request->last_name,
            'email' => $request->email,
            'password' => md5($request->password),
            'phone' => $request->phone ?? '',
            'address' => $request->address ?? ''
        ]);

        session([
            'user_id' => $user->id,
            'customer_id' => $customer->id,
            'user_name' => $user->first_name . ' ' . $user->last_name,
            'user_email' => $user->email
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Registration successful!',
            'data' => [
                'id' => $user->id,
                'name' => $user->first_name . ' ' . $user->last_name,
                'email' => $user->email
            ]
        ]);
    }

    // ═══════════════════════════════════════════════════════════════
    // Feature 7: Login + Security Logging
    // ═══════════════════════════════════════════════════════════════
    public function login(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = Registration::where('email', $request->email)
            ->where('password', md5($request->password))
            ->first();

        if (!$user) {
            // Log failed attempt
            LoginSecurityLog::create([
                'user_id' => 0,
                'ip_address' => $request->ip(),
                'attempt_count' => 1,
                'is_successful' => 0,
                'user_agent' => $request->userAgent(),
                'logged_at' => now()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Invalid credentials.'
            ], 401);
        }

        // Find or create matching customer record
        $customer = Customer::where('email', $user->email)->first();
        if (!$customer) {
            $customer = Customer::create([
                'name' => $user->first_name . ' ' . $user->last_name,
                'email' => $user->email,
                'password' => $user->password,
                'phone' => '',
                'address' => ''
            ]);
        }

        // Log successful login
        LoginSecurityLog::create([
            'user_id' => $user->id,
            'ip_address' => $request->ip(),
            'attempt_count' => 1,
            'is_successful' => 1,
            'user_agent' => $request->userAgent(),
            'logged_at' => now()
        ]);

        session([
            'user_id' => $user->id,
            'customer_id' => $customer->id,
            'user_name' => $user->first_name . ' ' . $user->last_name,
            'user_email' => $user->email
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Login successful!',
            'data' => [
                'id' => $user->id,
                'name' => $user->first_name . ' ' . $user->last_name,
                'email' => $user->email
            ]
        ]);
    }

    // ─── User Logout ───────────────────────────────────────────────
    public function logout(): JsonResponse
    {
        session()->forget(['user_id', 'customer_id', 'user_name', 'user_email']);

        return response()->json([
            'success' => true,
            'message' => 'Logged out successfully.'
        ]);
    }

    // ─── User Session Check ────────────────────────────────────────
    public function userSession(): JsonResponse
    {
        $userId = session('user_id');
        if ($userId) {
            // Check if user actually exists in database (prevents stale session crashes)
            $user = Registration::find($userId);
            if (!$user) {
                session()->forget(['user_id', 'customer_id', 'user_name', 'user_email']);
                return response()->json([
                    'success' => true,
                    'logged_in' => false
                ]);
            }

            return response()->json([
                'success' => true,
                'logged_in' => true,
                'data' => [
                    'id' => $user->id,
                    'name' => session('user_name'),
                    'email' => session('user_email')
                ]
            ]);
        }

        return response()->json([
            'success' => true,
            'logged_in' => false
        ]);
    }

    /**
     * Helper to validate session integrity and existence in DB.
     * Returns the user object if valid, or null if invalid.
     */
    private function getValidatedUser()
    {
        $userId = session('user_id');
        if (!$userId) return null;

        $user = Registration::find($userId);
        if (!$user) {
            // Stale session detected - user was likely deleted from DB
            session()->forget(['user_id', 'customer_id', 'user_name', 'user_email']);
            return null;
        }

        return $user;
    }

    // ─── Wishlist ──────────────────────────────────────────────────
    public function getWishlist(Request $request): JsonResponse
    {
        $user = $this->getValidatedUser();
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Please login first.'
            ], 401);
        }

        $wishlist = Wishlist::where('user_id', $user->id)->get();

        $items = $wishlist->map(function ($item) {
            $product = ProductsInventory::active()->find($item->product_id);
            return [
                'wishlist_id' => $item->id,
                'product_id' => $item->product_id,
                'added_at' => $item->added_at,
                'product' => $product
            ];
        })->filter(fn($item) => $item['product'] !== null)->values();

        return response()->json([
            'success' => true,
            'data' => $items
        ]);
    }

    public function addToWishlist(Request $request): JsonResponse
    {
        $user = $this->getValidatedUser();
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Please login first.'
            ], 401);
        }

        $request->validate([
            'product_id' => 'required|integer'
        ]);

        $existing = Wishlist::where('user_id', $user->id)
            ->where('product_id', $request->product_id)
            ->first();

        if ($existing) {
            return response()->json([
                'success' => false,
                'message' => 'Already in wishlist.'
            ]);
        }

        $wishlist = Wishlist::create([
            'user_id' => $user->id,
            'product_id' => $request->product_id,
            'added_at' => now()
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Added to wishlist!',
            'data' => $wishlist
        ]);
    }

    public function removeFromWishlist($id): JsonResponse
    {
        $user = $this->getValidatedUser();
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Please login first.'
            ], 401);
        }

        $item = Wishlist::where('id', $id)->where('user_id', $user->id)->first();
        if ($item) {
            $item->delete();
        }

        return response()->json([
            'success' => true,
            'message' => 'Removed from wishlist.'
        ]);
    }

    // ─── Cart ──────────────────────────────────────────────────────
    public function getCart(Request $request): JsonResponse
    {
        $user = $this->getValidatedUser();
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Please login first.'
            ], 401);
        }

        // Fetch cart items with eager-loaded product data
        $cartItems = CartItem::where('user_id', $user->id)
            ->with(['product' => function($q) {
                $q->active();
            }])
            ->get();

        if ($cartItems->isEmpty()) {
            return response()->json([
                'success' => true,
                'data' => ['items' => [], 'total' => 0]
            ]);
        }

        // Map cart items to proper response format
        $items = $cartItems->map(function ($item) {
            return [
                'cart_item_id' => $item->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'product' => $item->product
            ];
        })->filter(fn($item) => $item['product'] !== null)->values();

        // Calculate total
        $total = $items->sum(function ($item) {
            $finalPrice = $item['product']->discounted_price ?? $item['product']->price ?? 0;
            return $finalPrice * $item['quantity'];
        });

        return response()->json([
            'success' => true,
            'data' => [
                'items' => $items,
                'total' => $total
            ]
        ]);
    }

    public function addToCart(Request $request): JsonResponse
    {
        $user = $this->getValidatedUser();
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Please login first.'
            ], 401);
        }

        $request->validate([
            'product_id' => 'required|integer',
            'quantity' => 'integer|min:1'
        ]);

        $quantity = $request->quantity ?? 1;
        $product = ProductsInventory::active()->find($request->product_id);
        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found or inactive.'
            ], 404);
        }
        $finalPrice = $product->discounted_price ?? $product->price;
        $unitPrice = $finalPrice;

        $existingItem = CartItem::where('user_id', $user->id)
            ->where('product_id', $request->product_id)
            ->first();

        if ($existingItem) {
            $existingItem->quantity += $quantity;
            $existingItem->unit_price = $unitPrice;
            $existingItem->subtotal = $existingItem->quantity * $unitPrice;
            $existingItem->save();
        } else {
            CartItem::create([
                'user_id' => $user->id,
                'product_id' => $request->product_id,
                'quantity' => $quantity,
                'unit_price' => $unitPrice,
                'subtotal' => $unitPrice * $quantity
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Added to cart!'
        ]);
    }

    public function removeFromCart($id): JsonResponse
    {
        $user = $this->getValidatedUser();
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Please login first.'
            ], 401);
        }

        CartItem::where('id', $id)->where('user_id', $user->id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Removed from cart.'
        ]);
    }

    // ═══════════════════════════════════════════════════════════════
    // Feature 2: Checkout (Cart → Order → Shipping → Payment)
    // ═══════════════════════════════════════════════════════════════
    public function checkout(Request $request): JsonResponse
    {
        $user = $this->getValidatedUser();
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Please login first.'
            ], 401);
        }

        $request->validate([
            'shipping_address' => 'required|string',
            'city' => 'required|string',
            'phone_number' => 'required|string',
            'order_notes' => 'nullable|string'
        ]);

        // Get cart items
        $cartItems = CartItem::where('user_id', $user->id)->get();
        if ($cartItems->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Your cart is empty.'
            ]);
        }

        // Calculate total
        $totalAmount = 0;
        $orderItems = [];
        foreach ($cartItems as $ci) {
            $product = ProductsInventory::active()->find($ci->product_id);
            if (!$product) continue;
            $finalPrice = $product->discounted_price ?? $product->price;
            $subtotal = $finalPrice * $ci->quantity;
            $totalAmount += $subtotal;
            $orderItems[] = [
                'product_id' => $ci->product_id,
                'unit_price' => $finalPrice,
                'quantity' => $ci->quantity,
                'subtotal' => $subtotal
            ];

            // Reduce stock
            if ($product->current_stock >= $ci->quantity) {
                $product->current_stock -= $ci->quantity;
                $product->save();
            }
        }

        // Create order
        $order = OrdersTransaction::create([
            'user_id' => $user->id,
            'order_reference_id' => 'ORD-' . strtoupper(uniqid()),
            'total_amount' => $totalAmount,
            'order_status' => 'pending'
        ]);

        // Create order items
        foreach ($orderItems as $oi) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $oi['product_id'],
                'unit_price' => $oi['unit_price'],
                'quantity' => $oi['quantity'],
                'subtotal' => $oi['subtotal']
            ]);
        }

        // Create shipping detail
        ShippingDetail::create([
            'order_id' => $order->id,
            'shipping_address' => $request->shipping_address,
            'city' => $request->city,
            'phone_number' => $request->phone_number,
            'order_notes' => $request->order_notes ?? ''
        ]);

        // Create payment transaction (COD)
        PaymentTransaction::create([
            'order_id' => $order->id,
            'payment_method' => 'COD',
            'status' => 'pending',
            'transaction_reference' => 'COD-' . strtoupper(uniqid()),
            'transaction_date' => now()
        ]);

        // Clear cart
        CartItem::where('user_id', $user->id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Order placed successfully!',
            'data' => [
                'order_id' => $order->id,
                'reference' => $order->order_reference_id,
                'total' => $totalAmount
            ]
        ]);
    }

    // ═══════════════════════════════════════════════════════════════
    // Feature 3: Product Review Submission
    // ═══════════════════════════════════════════════════════════════
    public function submitReview(Request $request): JsonResponse
    {
        $user = $this->getValidatedUser();
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Please login first.'
            ], 401);
        }

        $request->validate([
            'product_id' => 'required|integer',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000'
        ]);

        $review = ProductReview::create([
            'product_id' => $request->product_id,
            'user_id' => $user->id,
            'customer_name' => session('user_name'),
            'rating' => $request->rating,
            'comment' => $request->comment,
            'is_visible' => 0  // Admin must approve before showing
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Review submitted! It will appear after admin approval.',
            'data' => $review
        ]);
    }



    // ═══════════════════════════════════════════════════════════════
    // Feature 8: Order History
    // ═══════════════════════════════════════════════════════════════
    public function getOrders(): JsonResponse
    {
        $user = $this->getValidatedUser();
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Please login first.'
            ], 401);
        }

        $orders = OrdersTransaction::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        $data = $orders->map(function ($order) {
            $items = OrderItem::where('order_id', $order->id)->get()->map(function ($item) {
                $product = ProductsInventory::find($item->product_id);
                return [
                    'product_title' => $product ? $product->title : 'Unknown',
                    'quantity' => $item->quantity,
                    'unit_price' => $item->unit_price,
                    'subtotal' => $item->subtotal
                ];
            });
            $shipping = ShippingDetail::where('order_id', $order->id)->first();
            return [
                'id' => $order->id,
                'reference' => $order->order_reference_id,
                'total' => $order->total_amount,
                'status' => $order->order_status,
                'date' => $order->created_at,
                'items' => $items,
                'shipping' => $shipping
            ];
        });

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    // ═══════════════════════════════════════════════════════════════
    // Global Search: Lightweight Product Search for Header Bar
    // ═══════════════════════════════════════════════════════════════
    public function searchProducts(Request $request): JsonResponse
    {
        $query = $request->input('query', '');

        if (strlen($query) < 3) {
            return response()->json([
                'success' => true,
                'data' => []
            ]);
        }

        $products = ProductsInventory::active()
            ->where('title', 'LIKE', '%' . $query . '%')
            ->select('id', 'title', 'price', 'image')
            ->limit(10)
            ->get();

        return response()->json([
            'success' => true,
            'data' => $products
        ]);
    }
}
