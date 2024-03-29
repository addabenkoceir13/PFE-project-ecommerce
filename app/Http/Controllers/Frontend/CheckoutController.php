<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Traits\UploadPhotos;
use Illuminate\Http\Request;
use App\Models\Invoices;
use App\Models\Order;
use App\Models\Orders;
use App\Models\Products;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class CheckoutController extends Controller
{
    use UploadPhotos;

    public function index()
    {
        $old_Cartsitems = Orders::where('id_user', Auth::id())->get();

        foreach($old_Cartsitems as $item)
        {
            if (!Products::where('id', $item->id_prod)->where('qte_stock', '>=', $item->qty_prod)->exists())
            {
                $removeItem = Orders::where('id_user', Auth::id())->where('id_prod', $item->id_prod)->first();
                $removeItem->delete();
            }
        }

        $Cartsitems = Orders::where('id_user', Auth::id())->get();
        $totalitems = Orders::where('id_user', Auth::id())->count();
        return view('Frontend.checkout' , compact('Cartsitems', 'totalitems'));
    }

    public function placeorder(Request $request)
    {
        $validator = $request->validate([
            'fname'     => 'required|max:255'  ,
            'lname'     => 'required|max:255'  ,
            'lname'     => 'required|max:255'  ,
            'email'     => 'required|max:255'  ,
            'phone'     => 'required|max:255'  ,
            'address1'  => 'required|max:255'  ,
            'address2'  => 'required|max:255'  ,
            'city'      => 'required|max:255'  ,
            'state'     => 'required|max:255'  ,
            'country'   => 'required|max:255'  ,
            'image'     => 'required|max:255'  ,
            'pincode'   => 'required|max:255'  ,
        ]);

        $file_name = $this->savePhotos($request->image , 'assets/uploads/ccp/') ;

        $order = new Order();
        $order->id_user     = Auth::id();
        $order->fname       = ucwords($request->input('fname'));
        $order->lname       = ucwords($request->input('lname'));
        $order->email       = $request->input('email');
        $order->phone       = $request->input('phone');
        $order->address1    = ucwords($request->input('address1'));
        $order->address2    = ucwords($request->input('address2'));
        $order->city        = ucwords($request->input('city'));
        $order->country     = ucwords($request->input('country'));
        $order->state       = ucwords($request->input('state'));
        $order->pincode     = $request->input('pincode');
        $order->status      = '0';
        $order->image       = $file_name;
        $order->price_total = $request->input('price_total');
        $order->tracking_no = 'techshop '.rand(1111,9999);
        $order->save();


        $Cartsitems = Orders::where('id_user', Auth::id())->get();

        $total_price = $request->input('price_total');
        $randomString = '#'. strtoupper(Str::random(5));

        foreach ($Cartsitems as $item)
        {
            Invoices::create([
                'id_order'      => $order->id,
                'id_prod'       => $item->id_prod,
                'qty_prod'      => $item->qty_prod,
                'total_price'   => $total_price,
                'num_invoice'   => $randomString,
            ]);

            $prod = Products::where('id', $item->id_prod)->first();
            $prod->qte_stock = $prod->qte_stock - $item->qty_prod;
            $prod->update();
        }

        if(Auth::user()->address2 != $request->input('address2'))
        {
            $user = User::where('id', Auth::id())->first();

            $user->fname     = ucwords($request->input('fname'));
            $user->lname     = ucwords($request->input('lname'));
            $user->phone     = $request->input('phone');
            $user->address1  = ucwords($request->input('address1'));
            $user->address2  = ucwords($request->input('address2'));
            $user->city      = ucwords($request->input('city'));
            $user->country   = ucwords($request->input('country'));
            $user->state     = ucwords($request->input('state'));
            $user->pincode   = $request->input('pincode');
            $user->update();
        }

        $Cartsitems = Orders::where('id_user', Auth::id())->get();
        Orders::destroy($Cartsitems);




        return redirect('/')->with("status", "Order placed Successfully");
    }

}

