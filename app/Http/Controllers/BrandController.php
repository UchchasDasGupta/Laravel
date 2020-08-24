<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use Carbon\Carbon;

class BrandController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function AllBrand()
    {
        $brands = Brand::latest()->paginate(3);
        return view('admin.brand.index',compact('brands'));
    }

    //Store Brand
    public function StoreBrand(Request $request)
    {
        $validatedData = $request->validate([
            'brand_name' => 'required|min:4',
            'brand_image' => 'required|mimes:jpg,jpeg,png,PNG,JPEG',
        ],
        [
            'brand_name.required' => 'Please Input Brand Name',
            //'brand_name.min' => 'Brand longer then 4chars',
        ]);

        $brand_image = $request->file('brand_image');

        $image_name=hexdec(uniqid());
        $ext=strtolower($brand_image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='image/brand/';
        $image_url=$upload_path.$image_full_name;
        $brand_image->move($upload_path,$image_full_name);
       
        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_image' => $image_url,
            'created_at' => Carbon::now()  //optional
        ]);

        return Redirect()->back()->with('success','Brand Inserted');
    }

    //Brand Edit
    public function Edit($id)
    {
        $edit = Brand::find($id);
        return view('admin.brand.edit',compact('edit'));
    }

    //Brand Update
    public function Update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'brand_name' => 'required|min:4',
            'brand_image' => 'mimes:jpg,jpeg,png,PNG,JPEG',
        ],
        [
            'brand_name.required' => 'Please Input Brand Name',
            //'brand_name.min' => 'Brand longer then 4chars',
        ]);

        $old_image = $request->old_image;

        $brand_image = $request->file('brand_image');

        if($brand_image)
        {
        $image_name=hexdec(uniqid());
        $ext=strtolower($brand_image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='image/brand/';
        $image_url=$upload_path.$image_full_name;
        $brand_image->move($upload_path,$image_full_name);
       
        unlink($old_image);

        Brand::find($id)->update([
            'brand_name' => $request->brand_name,
            'brand_image' => $image_url,
            'created_at' => Carbon::now()  //optional
        ]);

        return Redirect()->back()->with('success','Brand Updated');

        }else
        {
            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'created_at' => Carbon::now()  //optional
            ]);

            return Redirect()->back()->with('success','Brand Updated');
        }
    }

    //Brand Delete
    public function Delete($id)
    {
        $img = Brand::find($id);
        $old_image = $img->brand_image;
        unlink($old_image);
        Brand::find($id)->delete();
        return Redirect()->back()->with('success','Brand Deleted');
    }

}
