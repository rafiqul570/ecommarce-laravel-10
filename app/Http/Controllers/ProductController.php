<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   
    public function index(){
        $allProduct = Product::latest()->get();
        return view('ecom_product.index', compact('allProduct'));
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
        //image upload       
        if($request->has('product_img')){
            $image = $request->file('product_img');
            $extension = $image->getClientOriginalExtension();
            $image_name = time().'.'.$extension;
            $path = 'uploads/image/';
            $image->move($path, $image_name);
            
        }
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
            'product_img' => $path.$image_name,
            'slug' => strtolower(str_replace( ' ', '-', $request->product_name)),
        ]);

             Category::where('id', $category_id)->increment('product_count',1);
             Subcategory::where('id', $subcategory_id)->increment('product_count',1);


        return back()->with('success', 'Success! data insert Successfully');
    }


    public function edit($id){
        $editProduct = Product::FindOrFail($id);

        return view('ecom_product.edit', compact('editProduct'));

    }

    public function update(Request $request){
        $id = $request->id;

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

        Product::FindOrFail($id)->update([
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'product_quantity' => $request->product_quantity,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'category_name' => $category_name,
            'subcategory_name' => $subcategory_name,
            'product_img' => $path.$image_name,
            'slug' => strtolower(str_replace( ' ', '-', $request->product_name)),
        ]);


        return redirect()->route('ecom_product.index')->with('success', 'Success! data update Successfully');

    }

    public function delete($id){
        $category_id = Product::where('id', $id)->value('category_id');
        $subcategory_id = Product::where('id', $id)->value('subcategory_id');

        Product::FindOrFail($id)->delete();
        
        Category::where('id', $category_id)->decrement('product_count',1);
        Subcategory::where('id', $subcategory_id)->decrement('product_count',1);
        return back()->with('success', 'Success! data delete Successfully');
    }
}

