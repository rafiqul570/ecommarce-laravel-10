<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   
    public function index(){
        $allProduct = Category::latest()->get();
        return view('ecom_category.index', compact('allProduct'));
    }

    public function create(){
        $allCategory = Category::latest()->get();
        $allSubcategory = Subcategory::latest()->get();
        return view('ecom_product.create',compact('allCategory', 'allSubcategory'));
    }


 public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|unique:products',
            'product_price' => 'required',
            'product_quantity' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'product_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

            $image = $request->file('product_img');
            $img_name = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
            $request->product_img->move(public_path('upload'),$img_name);
            $img_url = 'upload/'.$img_name;
            
            $category_id = $request->category_id;
            $subcategory_id = $request->subcategory_id;
            
            $category_name = Category::where('id', $category_id)->value('category_name');
            $subcategory_name = Subcategory::where('id', $subcategory_id)->value('subcategory_name');

        Product::create([
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'product_quantity' => $request->product_quantity,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'category_name' => $category_name,
            'subcategory_name' => $subcategory_name,
            'product_img' => $img_url,
            'slug' => strtolower(str_replace( ' ', '-', $request->product_name)),
        ]);

             Category::where('id', $category_id)->increment('product_count',1);
             Subcategory::where('id', $subcategory_id)->increment('product_count',1);


        return back()->with('success', 'Success! data insert Successfully');
    }


//     public function edit($id){
//         $editCategory = Category::FindOrFail($id);

//         return view('ecom_category.edit', compact('editCategory'));

//     }

//     public function update(Request $request){
//         $id = $request->id;

//         $request->validate([
//             'category_name' => 'required|unique:categories',
//         ]);

//         Category::FindOrFail($id)->update([
//             'category_name' => $request->category_name,
//             'slug' => strtolower(str_replace( '', '-', $request->category_name))
//         ]);


//         return redirect()->route('ecom_category.index')->with('success', 'Success! data update Successfully');

//     }

//     public function delete($id){
//         Category::FindOrFail($id)->delete();
//         return back()->with('success', 'Success! data delete Successfully');
//     }
}

