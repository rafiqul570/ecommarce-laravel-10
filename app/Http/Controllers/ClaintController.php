<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
class ClaintController extends Controller
{

    
    //data show category_page
    public function CategoryPage($id){
        $allCategory = Category::findOrFail($id);
        $allProduct = Product::where('category_id', $id)->latest()->get();
        return view('front.pages.categoryPage', compact('allCategory', 'allProduct'));
    }


    public function SinglePage($id){

        $product = Product::FindOrFail($id);
        $category_id = Product::where('id', $id)->value('category_id');
        $related_product = Product::where('category_id', $category_id)->latest()->get();
        return view('front.pages.singlePage', compact('product', 'related_product'));

    }

   public function AddProductToCard(Request $request){


        Card::insert([
            'product_id' => $request->product_id,
            'user_id' => Auth::id(),
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'quantity' => $request->quantity,
            
        ]);


        return redirect()->route('front.pages.addToCard')->with('success', 'Success! Your item added to cart');
    }


    public function AddToCard(){

        $userid = Auth::id();
        $cart_items = Card::where('user_id', $userid )->get();
        
        return view('front.pages.addToCard', compact('cart_items'));
    }
    

    public function Checkout(){

        return view('front.pages.checkout');
    }

    public function TodaysDeal(){

        return view('front.pages.todaysDeal');
    }

    public function CustomService(){

        return view('front.pages.customService');
    }


     public function UserProfile(){

        return view('front.userProfile.dashboard');
    }


     public function History(){

        return view('front.userProfile.history');
    }


     public function PendingOrders(){

        return view('front.userProfile.pendingOrders');
    }



//==========================Tasting====================================

 public function Index(){

        return view('products');
    }


 public function Cart(){

        return view('cart');
    }


 public function RemoveFromCart(Request $request)
{
    $cart = session()->get('cart', []);
    $id = $request->id;
    if(isset($cart[$id])) {
        unset($cart[$id]);
        session()->put('cart', $cart);
    }
    return redirect()->route('cart');
}
//============================================================

}
