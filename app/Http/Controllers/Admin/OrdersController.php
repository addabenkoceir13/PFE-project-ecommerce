<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\OrderConfirmationEmail;
use App\Models\Invoices;
use App\Models\Order;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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

        $order = Order::find($id);
        $invoices = Invoices::where('id_order',$id )->first();


        // Update status order
        $status = $request->input('order_status');
        $sumPait = $request->input("sum_paid");
        $order->status = $status;
        $order->update();

        if ($status == 1)
        {
            $data = [
                'subject'       => "Order confirmation by email ",
                'name'          => $order->fname .' '. $order->lname,
                'email'         => $order->email,
                'phone'         => $order->phone,
                'address1'      => $order->address1,
                'address2'      => $order->address2,
                'city'          => $order->city,
                'country'       => $order->country,
                'state'         => $order->state,
                'price_total'   => $order->price_total,
                'tracking_no'   => $order->tracking_no,
                'updated_at'    => $order->updated_at,
                'sum_paid'      => $sumPait,
                "num_invoice"   => $invoices->num_invoice,

            ];
            Mail::to($order->email)->send(new OrderConfirmationEmail($data, $order));

            return redirect('orders')->with("status", 'order Updated and Email sent Successfully');
        }
        else
        {
            return redirect('orders')->with("statusalert", 'No students are confirmed or canceled .');
        }
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

}
