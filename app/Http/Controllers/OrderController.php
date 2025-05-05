<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Checkout;
use App\Models\Order;

class OrderController extends Controller
{
     
     public function store(Request $request){

         $shippingAddress = Checkout::where('user_id', auth()->id())->first();
         $cartItems = Cart::with('product')->where('user_id', auth()->id())->get();

        foreach($cartItems as $item){
        Order::insert([
            'user_id' => Auth::id(),
            'city' => $shippingAddress->city,
            'postcode' => $shippingAddress->postcode,
            'phone' => $shippingAddress->phone,

            'product_id' => $item->product_id,
            'product_name' => $item->product_name,
            'product_color' => $item->product_color,
            'product_size' => $item->product_size,
            'product_img' => $item->product_img,
            'product_quantity' => $item->product_quantity,
            'product_price' => $item->product_price,
            'shippingCost' => $item->shippingCost,
            'total_price' => $item->total_price,
            
            'payment_status' => 'cash on delivery',
            'delivery_status' => 'processing',
            
        ]);

        Cart::where('user_id', auth()->id())->delete();
        Checkout::where('user_id', auth()->id())->delete();
      }
        

    return redirect()->route('front.pages.payment')->with('success', 'Success! data insert Successfully');

    }
}
