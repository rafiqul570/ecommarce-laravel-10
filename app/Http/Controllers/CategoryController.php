<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CategoryController extends Controller
{
    // public function index(){
    //     $allSubscriber = DB::table('categories')->whereNot('id',[1])->get();
    //     return view('ecom_category.index', compact('allSubscriber'));
    // }

    public function create(){
        return view('ecom_category.create');
    }


 public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'category_ameame' => ['required'],
            'slug' => ['required'],
            'subcategory_count' => ['required'],
            'product_count' => ['required'],
        ]);

        $category = Category::create([
            'category_name' => $request->category_name,
            'slug' => $request->slug,
            'subcategory_count' => $request->subcategory_count,
            'product_count' => $request->product_count,
        ]);

        return back()->with('success', 'Success! data insert Successfully');
    }


    // public function edit($id){
    //     $editUser = User::FindOrFail($id);

    //     return view('ecom_category.edit', compact('editUser'));

    // }

    // public function update(Request $request){
    //     $id = $request->id;

    //     $request->validate([
    //         'name' => ['required'],
    //         'amount' => ['required'],
    //         'phone' => ['required', 'unique:'.User::class],

    //     ]);

    //     User::FindOrFail($id)->update([
    //         'name' => $request->name,
    //         'amount' => $request->amount,
    //         'phone' => $request->phone,
    //     ]);


    //     return redirect()->route('bn_subscriber.index')->with('success', 'Success! data update Successfully');

    // }

    // public function delete($id){
    //     User::FindOrFail($id)->delete();
    //     return back()->with('success', 'Success! data delete Successfully');
    // }
}
