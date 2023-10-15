<?php

namespace App\Http\Controllers\Admin;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminCustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::get();
        return view('admin.customers', compact('customers'));
    }

    public function change_status($id)
    {
        $customer = Customer::where('id', $id)->first();
        if($customer->status == 1) {
            $customer->status = 0;
        }
        else {
            $customer->status = 1;
        }
        $customer->update();

        return redirect()->back()->with('success', 'Customer status changed successfully.');
    }
}
