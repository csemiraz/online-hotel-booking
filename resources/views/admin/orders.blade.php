@extends('admin.layouts.app')
@section('title', 'Customer Orders | Admin')
@section('heading', 'Customer Orders')

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example1">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Order No</th>
                                    <th>Payment Method</th>
                                    <th>Booking Date</th>
                                    <th>Paid Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $key=>$order)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $order->order_no }}</td>
                                    <td>{{ $order->payment_method }}</td>
                                    <td>{{ $order->booking_date }}</td>
                                    <td>${{ $order->paid_amount }}</td>
                                    <td class="pt_10 pb_10">
                                        <a href="{{ route('admin_order_invoice', $order->id) }}"
                                            class="btn btn-info">Order Invoice</a>
                                        <a href="{{ route('admin_order_delete', $order->id) }}"
                                            class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection