<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::where('status', '0')->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function viweorder($id)
    {
        $orders = Order::where('id', $id)->first();
        return view('admin.Orders.view', compact('orders'));
    }

    public function updateorder(Request $request, $id)
    {
        $orders = Order::find($id);
        $orders->status = $request->input('order_status');
        $orders->update();

        return redirect('orders')->with("status", 'order Updated Successfully');

    }

    public function historyorder()
    {
        $orders = Order::where('status', '1')->get();
        return view('admin.orders.histort',compact('orders'));
    }
}
