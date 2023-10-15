<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Customer;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Order::get();
        return view('admin.orders', compact('orders'));
    }

    public function orderInvoice($id)
    {
        $order = Order::where('id', $id)->first();
        $order_details = OrderDetail::where('order_id', $id)->get();
        $customer = Customer::where('id', $order->customer_id)->first();
        return view('admin.order-invoice', compact('order', 'order_details', 'customer'));
    }
    public function order_delete($id)
    {
        $order = Order::where('id', $id)->delete();
        $order_details = OrderDetail::where('order_id', $id)->delete();
        return redirect()->back()->with('success', 'Order info deleted successfully.');
    }
}
