<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    // public function users()
    // {
    //     $users = User::all();
    //     $orderitemuser = Order::where('id_user', Auth::id())->count();
    //     return view('Admin.users.index', compact('users','orderitemuser'));
    // }

    // public function viewuser($id)
    // {
    //     $user = User::find($id);
    //     return view('admin.users.view', compact('user'));
    // }
}
