<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class CartController extends Controller
{
    

    public function index(){

        //$user_id = Auth::id();
        //$cartItems = Cart::with('product')->where('user_id', $user_id )->get();// alter code
        
        $cartItems = Cart::with('product')->where('user_id', auth()->id())->get();
        
        $total = $cartItems->sum(fn($item) => $item->product_price * $item->quantity);
        
        return view('front.cart.index', compact('cartItems', 'total'));
    }


    public function store(Request $request){
            // $product_price = $request->product_price;
            // $quantity = $request->quantity;
            // $price = $product_price * $quantity;


        Cart::insert([

            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'product_color' => $request->product_color,
            'product_size' => $request->product_size,
            'quantity' => $request->quantity,
            
        ]);


        return redirect()->route('front.cart.index')->with('success', 'Success! Your item added to cart');
    }


   //Update quantity

    public function updateQuantity(Request $request){
    

    $request->validate([
        'id' => 'required|exists:carts,id',
        'quantity' => 'required|integer|min:1'
    ]);

    $cartItem = Cart::where('id', $request->id)
        ->where('user_id', auth()->id())
        ->firstOrFail();

    $cartItem->update(['quantity' => $request->quantity]);



    // Recalculate total for the user
    $total = Cart::where('user_id', auth()->id())
        ->get()
        ->sum(fn($item) => $item->product_price * $item->quantity);
    $shipping = 20; // fixed or calculate based on rules
    $grandTotal = $total + $shipping;

    return response()->json([
    'success' => true,
    'item_total' => number_format($cartItem->product_price * $cartItem->quantity, 2),
    'new_total' => number_format($total, 2), // <-- THIS MUST EXIST
    'shipping' => number_format($shipping, 2),
    'grand_total' => number_format($grandTotal, 2),
]);

   }

   public function delete($id){
        Cart::FindOrFail($id)->delete();
        return back()->with('success', 'Success! data delete Successfully');
    }

    


}







    
