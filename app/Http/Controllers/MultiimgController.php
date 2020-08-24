<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Multiimg;
use Carbon\Carbon;
use Image;

class MultiimgController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //Multiple Image Upload
    public function index()
    {
        $images = Multiimg::latest()->get();
        return view('admin.multi_img.index',compact('images'));
    }

    //Store
    public function StoreImage(Request $request)
    {
        //$validatedData = $request->validate([
            //'image' => 'required|mimes:jpg,jpeg,png,PNG,JPEG',
        //]);

        $image = $request->file('image');
        foreach($image as $multi_img)
        {
        $image_name=hexdec(uniqid()).'.'.$multi_img->getClientOriginalExtension();
        Image::make($multi_img)->resize(300,300)->save('image/multiple_image/'.$image_name);

        $upload_path='image/multiple_image/'.$image_name;

        Multiimg::insert([
            'image' => $upload_path,
            'created_at' => Carbon::now()  //optional
        ]);
        }
        return Redirect()->back()->with('success','Multiple Image Inserted');
    }

    //Delete
    public function Delete($id)
    {
        $img = Multiimg::find($id);
        $old_image = $img->image;
        unlink($old_image);
        Multiimg::find($id)->delete();
        return Redirect()->back()->with('success','Multiple Image Deleted');
    }
}
