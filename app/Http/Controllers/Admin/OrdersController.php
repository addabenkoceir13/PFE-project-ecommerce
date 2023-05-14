<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoices;
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

    public function ordersCount()
    {
        $orders = Order::where('status', '0')->count();
        return response()->json(['count' => $orders]);

    }

    public function deletedOrder(Request $request)
    {
        $id_order = $request->input('id_order');
        $orders = Order::find($id_order);
        $orders->delete();
        return response()->json(['message' => 'order Deleted Successfully']);

    }

    public function deletedOrderitem(Request $request)
    {
        $id = $request->input('id_invoices');
        $orders = Invoices::find($id);
        $orders->delete();
        return response()->json(['message' => 'order Deleted Successfully']);

    }
}
