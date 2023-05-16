<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\UploadPhotos;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    use UploadPhotos;
    public function index()
    {
        $admin = User::where('id', Auth::id())->where('role_as', '1')->first();
        return view('Admin.profile.index', compact('admin'));
    }

    public function editProfileadmin(Request $request)
    {
        $user = User::find(Auth::id());

        $Validator = $request->validate([
            'fname'     =>'required',
            'lname'     =>'required',
            'phone'     =>'required|string',
            'email'     =>'required|string',
            'address1'  =>'required|min:0',
            'address2'  =>'required|min:0',
            'city'      =>'required|string',
            'state'     =>'required|string',
            'country'   =>'required',
            'pincode'   =>'required|string',
        ]);

        $file_name = $user->image;

        if ($request->hasFile('image'))
        {
            $path = 'assets/Frontend/Users/'.$user->image;
                if(File::exists($path))
                {
                    File::delete($path);
                }
                $file_name = $this->savePhotos($request->image , 'assets/Frontend/Users/') ;
        };
        $user->name        =  ucwords($request->input('fname').' '.$request->input('lname'));
        $user->fname        = ucwords($request->input('fname'));
        $user->lname        = ucwords($request->input('lname'));
        $user->phone        = $request->input('phone');
        $user->email        = $request->input('email');
        $user->address1     = ucwords($request->input('address1'));
        $user->address2     = ucwords($request->input('address2'));
        $user->city         = ucwords($request->input('city'));
        $user->state        = ucwords($request->input('state'));
        $user->country      = ucwords($request->input('country'));
        $user->pincode      = ucwords($request->input('pincode'));
        $user->image        = $file_name;
        $user->update();
        return  redirect('/admin-profile')->with('status', "Profile update Successfull");
    }
}
