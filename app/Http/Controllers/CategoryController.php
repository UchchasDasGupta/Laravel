<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function AllCat()
    {
        $category = Category::latest()->paginate(2);
        $trash = Category::onlyTrashed()->latest()->paginate(2);
        return view('admin.category.index',compact('category','trash'));
    }

    public function AddCat(Request $request)
    {
        $validatedData = $request->validate([
            'category_name' => 'required|max:255',
        ],
        [
            'category_name.required' => 'Please Input Category Name',
            'category_name.max' => 'Category Less then 255chars',

        ]
    );

        Category::insert([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->back()->with('success','Category Inserted');
        //$category = new Category;
        //$category->category_name = $request->category_name;
        //$category->user_id = Auth::user()->id;
        //$category->save();
        //return view('admin.category.index');
    }

    //edit
    public function Edit($id)
    {
        $edit = Category::find($id);
        return view('admin.category.edit',compact('edit'));
    }

    //Update
    public function Update(Request $request,$id)
    {
        $update = Category::find($id)->update([

            'category_name'=>$request->category_name,
            'user_id' => Auth::user()->id
        ]);

        return Redirect()->route('all.category')->with('success','Category Updated');
  
    }

    //SoftDelete
    public function SoftDelete($id)
    {
        $delete = Category::find($id)->delete();
        return Redirect()->back()->with('success','Category Deleted');

    }

    //Restore
    public function Restore($id)
    {
        $delete = Category::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('success','Category Restore');

    }

    //Permanent Delete    
    public function PDelete($id)
    {
        $delete = Category::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('success','Category Permantently Deleted');

    }
}
 