<?php

namespace App\Http\Controllers\Customer;

use App\Models\Order;
use App\Models\Customer;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CustomerOrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('customer_id', Auth::guard('customer')->user()->id)->get();
        return view('customer.orders', compact('orders'));
    }

    public function orderInvoice($id)
    {
        $order = Order::where('id', $id)->first();
        $order_details = OrderDetail::where('order_id', $id)->get();
        $customer = Customer::where('id', Auth::guard('customer')->user()->id)->first();
        return view('customer.order-invoice', compact('order', 'order_details', 'customer'));
    }
}
