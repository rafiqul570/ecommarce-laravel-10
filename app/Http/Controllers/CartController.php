<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function AddProductToCard(Request $request){
            // $product_price = $request->product_price;
            // $quantity = $request->quantity;
            // $price = $product_price * $quantity;


        Cart::insert([
            'product_id' => $request->product_id,
            'user_id' => Auth::id(),
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'product_color' => $request->product_color,
            'product_size' => $request->product_size,
            'quantity' => $request->quantity,
            
        ]);


        return redirect()->route('front.pages.addToCard')->with('success', 'Success! Your item added to cart');
    }


    public function AddToCard(){

        $userid = Auth::id();
        $cart_items = Cart::where('user_id', $userid )->get();
        
        return view('front.pages.addToCard', compact('cart_items'));
    }
    
}
