<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
// use App\Http\Traits\UploadPhotos;
use App\Http\Traits\UploadPhotouser;
use App\Models\Invoices;
use App\Models\Order;
use App\Models\Orders;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class UserController extends Controller
{
    // use UploadPhotos;
    use UploadPhotouser;

    public function viewindex()
    {
        $user = User::where('id', Auth::id())->first();
        return view('Frontend.users.index', compact('user'));

    }

    public function editProfile(Request $request)
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
        $user->name        =  $request->input('fname').' '.$request->input('lname');
        $user->fname        = $request->input('fname');
        $user->lname        = $request->input('lname');
        $user->phone        = $request->input('phone');
        $user->email        = $request->input('email');
        $user->address1     = $request->input('address1');
        $user->address2     = $request->input('address2');
        $user->city         = $request->input('city');
        $user->state        = $request->input('state');
        $user->country      = $request->input('country');
        $user->pincode      = $request->input('pincode');
        $user->image        = $file_name;
        $user->update();
        return  redirect('/my-profile')->with('status', "Profile update Successfull");
    }

    public function index()
    {
        $orders = Order::where('id_user', Auth::id())->get();
        return view('Frontend.orders.index', compact('orders'));
    }

    public function vieworder($id)
    {
        $orders = order::where('id', $id)->where('id_user' , Auth::id())->first();
        return view('Frontend.orders.view', compact('orders'));
    }

    public function deletedOrder(Request $request)
    {
        $id_order = $request->input('id_order');

        $order_check = Order::find($id_order);
        $invoces_check = Invoices::where('id_order',$id_order)->exists();

        if ($order_check)
        {
            if ( $invoces_check) {
                $orders = Order::find($id_order);
                $invoces = Invoices::where('id_order',$id_order)->get();
                $invoces_ids = $invoces->pluck('id')->toArray();

                foreach($invoces_ids as $ids)
                {
                    $invoices = Invoices::find($ids);
                    $invoices->delete();
                }
                $orders->delete();
                // return response()->json($invoces_ids);
                return response()->json(['message' => 'order Deleted Successfully']);
            }
            else
            {
                return response()->json(['messageeeror' => 'Sorry The Invoices Not exists']);
            }
        }
        else
        {
            return response()->json(['messageeeror' => 'Sorry The order Not exists']);
        }
    }


}
