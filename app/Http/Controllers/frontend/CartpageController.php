<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\frontend\CartItem;
use Illuminate\Http\Request;

class cartpagecontroller extends Controller
{
    public function cartpage()
    {
        $userId = auth()->id() ?? 0;

        $cartItems =CartItem::with('project')
            ->where('user_id', $userId)
            ->get();
 
        $subTotal = $cartItems->sum(function ($item) {
            // Force price to float, default to 0 if invalid
            $price = floatval($item->project->price ?? 0);
            $quantity = intval($item->quantity ?? 1);

            return $price * $quantity;
        });

        return view('frontend.cart-page', compact('cartItems', 'subTotal'));
    }

    public function remove($id)
    {
        $item = CartItem::findOrFail($id);
        $item->delete();
        return redirect()->route('frontend.cart-page')->with('success', 'Item removed from cart');
    }

    public function update($id, $type)
    {
        $item = CartItem::findOrFail($id);

        if ($type === 'plus') {
            $item->quantity += 1;
        } elseif ($type === 'minus' && $item->quantity > 1) {
            $item->quantity -= 1;
        }

        $item->save();
        return redirect()->route('frontend.cart-page');
    }

    public function store($projectId)
    {
        $userId = auth()->id() ?: 0; // fallback if no login yet

        $existing = CartItem::where('user_id', $userId)
            ->where('project_id', $projectId)
            ->first();

        if ($existing) {
            $existing->quantity += 1;
            $existing->save();
        } else {
            CartItem::create([
                'user_id'    => $userId,
                'project_id' => $projectId,
                'quantity'   => 1,
            ]);
        }

        return redirect()->route('frontend.cart-page')->with('success', 'Added to cart!');
    }
}
