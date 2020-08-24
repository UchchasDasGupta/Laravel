<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //User Profile
    public function index()
    {
        return view('admin.profile.index');
    }

    //Update
    public function UpdateProfile(Request $request)
    {
            $validatedData = $request->validate([
                'name' => 'required|min:4',
                'email' => 'required|email',
            ]);

            $id = Auth::user()->id;

            User::find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            return Redirect()->back()->with('success','Profile Updated');

    }

    //change password
    public function ChangePassword()
    {
        return view('admin.profile.password');
    }

    //Update Password
    public function UpdatePassword(Request $request)
    {
        //$validatedData = $request->validate([
          //  'old_password' => 'required|min:8|password',
          //  'new_password' => 'required|min:8|password',
          //  'confirm_password' => 'required|min:8|password',
        //]);

        $id = Auth::user()->id;
        $db_pass = Auth::user()->password;
        $old_pass = $request->old_password;
        $new_pass = $request->new_password;
        $confirm_pass = $request->confirm_password;

        if(Hash::check($old_pass,$db_pass))
        {
            if($new_pass == $confirm_pass)
            {
                User::find($id)->update([
                    'password' => Hash::make($request->new_password)
                ]);
                Auth::logout();
                return Redirect()->route('login'); 
                
            }else{
                return Redirect()->back()->with('danger','New Password And Confirm Password Not Same !'); 
            }
        }else
        {
            return Redirect()->back()->with('error','Old Password Not Match !');
        }
    }
}
