<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class UsersController extends Controller
{
    public function users()
    {
        $users = User::all();
        $orderitemuser = Order::where('id_user', Auth::id())->count();
        return view('Admin.users.index', compact('users','orderitemuser'));
    }

    public function viewuser($id)
    {
        $user = User::find($id);
        $orderitemuser = Order::where('id_user', Auth::id())->count();
        return view('admin.users.view', compact('user'));
    }

    public function deletedUser(Request $request)
    {
        $id_user = $request->input('id_user');
        $user_check = User::where('id', $id_user)->exists();

        if ($user_check)
        {
            $user = User::find($id_user);
            if ($user->image) {
                $path = 'assets/Frontend/Users/'.$user->image;
                if(File::exists($path))
                {
                    File::delete($path);
                }
            }
            $user->delete();

            return response()->json(['message' => $user->name." Deleted Successfull "]);
        } else
        {
            return response()->json(['messageeeror' => " This user not foundl "]);
        }

    }

    public function search(Request $request)
    {
        $users = User::where('name', 'like', '%' . $request->input('query') . '%')->get();
        return response()->json($users);
    }


    // public function userslist()
    // {
    //     $users = User::select('name')->get();
    //     $data = [];

    //     foreach($users as $item)
    //     {
    //         $data[] = $item['name'];
    //     }

    //     return $data;
    // }
}
