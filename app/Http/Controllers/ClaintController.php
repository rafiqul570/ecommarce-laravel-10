<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use Illuminate\Http\Request;
use DB;
class ClaintController extends Controller
{

    
    //data show category_page
    public function CategoryPage($id){
        $allCategory = Category::findOrFail($id);
        $allProduct = Product::where('category_id', $id)->latest()->get();
        return view('frontend.categoryPage', compact('allCategory', 'allProduct'));
    }

    //data show Subcategory_page
    public function SubcategoryPage($id){
        $allSubcategory = Subcategory::findOrFail($id);
        $allProduct = Product::where('subcategory_id', $id)->latest()->get();
        return view('frontend.subcategoryPage', compact('allSubcategory', 'allProduct'));
    }

    public function SinglePage(){
       
        return view('frontend.singlePage');

    }
}
