<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    // Role
    public function index(){
        $role = Auth::user()->role;
        if($role == '1'){
            return view('admin.dashboard');
        }else{
            return view('front.dashboard');
        }


    }


      //dat show home page
      public function homePage(){
        $allCategory = Category::latest()->get();
        $allProduct = Product::latest()->get();
        return view('homePage', compact('allCategory', 'allProduct'));
        }

    
}
