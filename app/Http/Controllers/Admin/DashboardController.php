<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoices;
use App\Models\Notation;
use App\Models\Order;
use App\Models\Products;
use App\Models\Review;
use App\Models\Suppliers;
use App\Models\User;
use App\Models\Wishlist;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users      = User::all()->count();
        $suppliers  = Suppliers::all()->count();
        $reviews    = Review::all()->count();
        $products   = Products::all()->count();
        $ratings    = Notation::all()->count();
        $phones     = Products::where('id_cate', '1')->count();
        $computers  = Products::where('id_cate', '2')->count();
        $orders     = Order::all()->count();
        $orderCon   = Order::where('status', '1')->count();
        $orderNoCon = Order::where('status', '0')->count();
        $invoices   = Invoices::all()->count();
        $wishlists  = Wishlist::all()->count();

        $data = [
            'users'     => $users,
            'suppliers' => $suppliers,
            'reviews'   => $reviews,
            'products'  => $products,
            'ratings'   => $ratings,
            'phones'    => $phones,
            'computers' => $computers,
            'orders'    => $orders,
            'orderCon'  => $orderCon,
            'orderNoCon'=> $orderNoCon,
            'invoices'  => $invoices,
            'wishlists' => $wishlists,
        ];
        return view('admin.dashboard.index', $data);
    }
}
