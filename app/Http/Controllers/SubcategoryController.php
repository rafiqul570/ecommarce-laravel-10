<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubcategoryController extends Controller
{

    public function index(){
        $allSubcategory = Subcategory::latest()->get();
        return view('ecom_subcategory.index', compact('allSubcategory'));
    }

    public function create(){
        $allCategory = Category::first()->get();
        return view('ecom_subcategory.create', compact('allCategory'));
    }


 public function store(Request $request)
    {
        $request->validate([
            'subcategory_name' => 'required|unique:subcategories',
            'category_id' => 'required',

        ]);

        $category_id = $request->category_id;
        $category_name = Category::where('id', $category_id)->value('category_name');

        Subcategory::create([
            'subcategory_name' => $request->subcategory_name,
            'slug' => strtolower(str_replace( '', '-', $request->subcategory_name)),
            'category_id' => $category_id,
            'category_name' => $category_name
        ]);

        Category::where('id', $category_id)->increment('subcategory_count',1);

        return back()->with('success', 'Success! data insert Successfully');
    }


    public function edit($id){
        $editSubcategory = Subcategory::FindOrFail($id);

        return view('ecom_subcategory.edit', compact('editSubcategory'));

    }

    public function update(Request $request){
       
        $id = $request->id;

        $request->validate([
            'subcategory_name' => 'required|unique:subcategories',
        ]);

        Subcategory::FindOrFail($id)->update([
            'subcategory_name' => $request->subcategory_name,
            'slug' => strtolower(str_replace( '', '-', $request->subcategory_name)),
        ]);


        return redirect()->route('ecom_subcategory.index')->with('success', 'Success! data update Successfully');

    }

    public function delete($id){
        $cat_id = Subcategory::where('id', $id)->value('category_id');
        Subcategory::FindOrFail($id)->delete();
        Category::where('id', $cat_id)->decrement('subcategory_count', 1);
        return back()->with('success', 'Success! data delete Successfully');
    }

}

