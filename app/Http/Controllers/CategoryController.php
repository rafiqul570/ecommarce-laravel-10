<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
     public function index(){
        $allCategory = Category::latest()->get();
        return view('admin.category.index', compact('allCategory'));
    }

    public function create(){
        return view('admin.category.create');
    }


 public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories',
        ]);

        Category::insert([
            'category_name' => $request->category_name,
            'slug' => strtolower(str_replace( '', '-', $request->category_name))
        ]);

        return back()->with('success', 'Success! data insert Successfully');
    }


    public function edit($id){
        $editCategory = Category::FindOrFail($id);

        return view('admin.category.edit', compact('editCategory'));

    }

    public function update(Request $request){
        $id = $request->id;

        $request->validate([
            'category_name' => 'required|unique:categories',
        ]);

        Category::FindOrFail($id)->update([
            'category_name' => $request->category_name,
            'slug' => strtolower(str_replace( '', '-', $request->category_name))
        ]);


        return redirect()->route('admin.category.index')->with('success', 'Success! data update Successfully');

    }

    public function delete($id){
        Category::FindOrFail($id)->delete();
        return back()->with('success', 'Success! data delete Successfully');
    }



}
