<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommandeController extends Controller
{
    public function addProduct(Request $request)
    {
        $id_product = $request->input('id_product');
        $qty_product = $request->input('qty_product');

        if (Auth::check())
        {
            $prod_check = Products::where('id', $id_product)->first();
            if ($prod_check) {
                if (Orders::where('id_prod', $id_product)->where('id_user', Auth::id())->exists())
                {
                    return response()->json(['messageadd' => $prod_check->name_prod." Already Added to cart "]);
                }
                else
                {
                    $cartItem = new Orders();
                    $cartItem->id_prod  = $id_product;
                    $cartItem->qty_prod = $qty_product;
                    $cartItem->id_user  =  Auth::id();
                    $cartItem->save();
                    return response()->json(['message' => $prod_check->name_prod." Added to cart "]);
                }
            }
        }
        else
        {
            return response()->json(['messageerroe'=> "Login to Continue"]);
        }

    }
    // End Functio

    // Start function
    public function viewcart()
    {
        $cartitme = Orders::where('id_user', Auth::id())->get();
        return view('Frontend.cart', compact('cartitme'));
    }
    // End Functio

    // Start function
    public function deletecartprod(Request $request)
    {
        if (Auth::check())
        {
            $id_product = $request->input("id_product");
            $prod_check = Products::where('id', $id_product)->first();
            if (Orders::where('id_prod', $id_product)->where('id_user', Auth::id())->exists())
            {
                $cartItem = Orders::where('id_prod', $id_product)->where('id_user', Auth::id())->first();
                $cartItem->delete();
                return response()->json(['message' => $prod_check->name_prod." Products Deleted Successfull "]);
            }
        }
        else
        {
            return response()->json(['messageerroe'=> "Login to Continue"]);
        }
    }
    // End Functio
    // Start function
    public function updatecart(Request $request)
    {
        $id_product = $request->input('id_product');
        $qty_product = $request->input('qty_product');

        if (Auth::check())
        {
            if (Orders::where('id_prod', $id_product)->where('id_user', Auth::id())->exists())
            {
                $cart = Orders::where('id_prod', $id_product)->where('id_user', Auth::id())->first();
                $cart->qty_prod = $qty_product;
                $cart->update();
                return response()->json(['message' => "Quantity Updated Successfull "]);
            }
        }
        else
        {
            return response()->json(['messageerroe'=> "Login to Continue"]);
        }
    }
    // End Functio
    // Start function
    public function cartcount()
    {
        $cartcount = Orders::where('id_user', Auth::id())->count();
        return response()->json(['count' => $cartcount]);
    }
}

