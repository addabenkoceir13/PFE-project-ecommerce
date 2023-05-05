<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistContrller extends Controller
{
    public function index()
    {
        $wishlist = Wishlist::where('id_user', Auth::id())->get();
        return view('frontend.wishlist', compact('wishlist'));
    }

    public function AddWish(Request $request)
    {
        if (Auth::check())
        {
            $id_prod = $request->input('id_product');
            if (Products::find($id_prod))
            {
                $wish = new Wishlist();
                $wish->id_prod = $id_prod;
                $wish->id_user = Auth::id();
                $wish->save();
                return response()->json(['message'=> "Products Added to Wishlist"]);
            }
            else
            {
                return response()->json(['messageerroe' => "Products doesnot exist "]);
            }
        }
        else
        {
            return response()->json(['messageerroe'=> "Login to Continue"]);
        }
    }

    public function deletedwish(Request $request)
    {
        if (Auth::check())
        {
            $id_product = $request->input("id_product");
            $prod_check = Products::where('id', $id_product)->first();
            if (Wishlist::where('id_prod', $id_product)->where('id_user', Auth::id())->exists())
            {
                $cartItem = Wishlist::where('id_prod', $id_product)->where('id_user', Auth::id())->first();
                $cartItem->delete();
                return response()->json(['message' => $prod_check->name_prod." Item Removed from Wishlist Successfull "]);
            }
        }
        else
        {
            return response()->json(['messageerroe'=> "Login to Continue"]);
        }
    }

    public function wishlistcount()
    {
        $wishcount = Wishlist::where('id_user', Auth::id())->count();
        return response()->json(['count' => $wishcount]);
    }
}
