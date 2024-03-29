<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use Illuminate\Http\Request;
use File;
use DB;

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
            'product_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg}max:2048',
        ]);
        
    //image Insert 
            $image_name = '';
        if($request->has('product_img')){
            $image = $request->file('product_img');
            $image_name = uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('uploads/image/',$image_name);
            
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
            'product_img' => $image_name,
            'slug' => strtolower(str_replace( ' ', '-', $request->product_name)),
        ]);

             Category::where('id', $category_id)->increment('product_count',1);
             Subcategory::where('id', $subcategory_id)->increment('product_count',1);


        return back()->with('success', 'Success! data insert Successfully');
    }


    public function edit($id){
        $product = Product::FindOrFail($id);
        return view('ecom_product.edit', compact('product'));

    }

    public function editImage($id){
        $product = Product::FindOrFail($id);
        return view('ecom_product.editImage', compact('product'));

    }

    
    public function updateImage(Request $request){
        
        $id = $request->id;
        $product = Product::FindOrFail($id);

    $request->validate([
        'product_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg}max:2048',
       
    ]);

    //image upload 
    $image_name = '';
    $deleteOldImage='uploads/image/'.$product->product_img;
    
    if($request->has('product_img')){
        $image = $request->file('product_img');
        if(file_exists($deleteOldImage)){
            File::delete($deleteOldImage);
        }
        
        $image_name = uniqid().'.'.$image->getClientOriginalExtension();
        $image->move('uploads/image/',$image_name);   
    
    }

    Product::FindOrFail($id)->update([
        'product_img' => $image_name,
        
    ]);


    return redirect()->route('ecom_product.index')->with('success', 'Success! data update Successfully');

}


    public function update(Request $request){
        
            $id = $request->id;
            $product = Product::FindOrFail($id);

        $request->validate([
            'product_name' => 'required',
            'product_price' => 'required',
            'product_quantity' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
           
            
        ]);

        //image upload 
        $image_name = '';
        $deleteOldImage='uploads/image/'.$product->product_img;
        
        if($request->has('product_img')){
            $image = $request->file('product_img');
            if(file_exists($deleteOldImage)){
                File::delete($deleteOldImage);
            }
            
            $image_name = uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('uploads/image/',$image_name);   
        }else{
            $image_name = $product->product_img;
        }

        Product::FindOrFail($id)->update([
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'product_quantity' => $request->product_quantity,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'product_img' => $image_name,
            'slug' => strtolower(str_replace( ' ', '-', $request->product_name)),
        ]);


        return redirect()->route('ecom_product.index')->with('success', 'Success! data update Successfully');

    }

    //Delete
    public function delete($id){
        $category_id = Product::where('id', $id)->value('category_id');
        $subcategory_id = Product::where('id', $id)->value('subcategory_id');

        $product = Product::FindOrFail($id);
        
        $image = 'uploads/image/'.$product->product_img;
        if(file_exists($image)){
        File::delete($image);
        }
        
        $product->delete();
        
        Category::where('id', $category_id)->decrement('product_count',1);
        Subcategory::where('id', $subcategory_id)->decrement('product_count',1);
        return back()->with('success', 'Success! data delete Successfully');
    }

    // JSON DATA

    public function getSubcat($id){
        $Subcategory = DB::table('subcategories')->where('category_id', $id)->get();
        return response()->json($Subcategory);
    }
}

