<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Checkout;

class CheckoutController extends Controller
{
    public function index(){

        return view('front.checkout.index');
    }


    public function create(){

        //$cartItems = Cart::all();
        $cartItems = Cart::where('user_id', auth()->id())->get();
    
        $shippingCost = 50;

        $subtotal = $cartItems->sum(fn($item) => $item->product_price * $item->quantity);
        $total = $subtotal + $shippingCost;

        return view('front.checkout.create', compact('cartItems','subtotal', 'shippingCost', 'total'));
    }

       


    public function store(Request $request){

         $request->validate([
            'city' => 'required',
            'postcode' => 'required',
            'phone' => 'required',
        ]);

        Checkout::insert([
            'user_id' => Auth::id(),
            'city' => $request->city,
            'postcode' => $request->postcode,
            'phone' => $request->phone,
            
        ]);


        return back()->with('success', 'Success! data insert Successfully');
    }



}
