<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use App\Models\Cart;
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


    public function SingleProduct($id){

        $product = Product::FindOrFail($id);
        // $category_id = Product::where('id', $id)->value('category_id');
        $related_product = Product::where('category_id', $product->category_id)->take(6)->get();
        return view('front.pages.singleProduct', compact('product', 'related_product'));

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


}
