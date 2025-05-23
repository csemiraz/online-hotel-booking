@extends('admin.layouts.app')
@section('title', 'Home | Admin')
@section('heading', 'Dashboard')

@section('main_content')
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fas fa-cart-plus"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Completed Orders</h4>
                    </div>
                    <div class="card-body">
                        {{ $total_completed_orders }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="fas fa-cart-arrow-down"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Pending Orders</h4>
                    </div>
                    <div class="card-body">
                        {{ $total_pending_orders }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-user-plus"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Active Customers</h4>
                    </div>
                    <div class="card-body">
                        {{ $total_active_customers }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fas fa-user-minus"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Pending Customers</h4>
                    </div>
                    <div class="card-body">
                        {{ $total_pending_customers }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="fas fa-book-open"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Rooms</h4>
                    </div>
                    <div class="card-body">
                        {{ $total_rooms }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Subscribers</h4>
                    </div>
                    <div class="card-body">
                        {{ $total_subscribers }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fas fa-cart-plus"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>New Orders Today</h4>
                    </div>
                    <div class="card-body">
                        {{ $today_orders }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="fas fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>New Customers Today</h4>
                    </div>
                    <div class="card-body">
                        {{ $today_customers }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>New Subscribers Today</h4>
                    </div>
                    <div class="card-body">
                        {{ $today_subscribers }}
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12">
            <section class="section">
                <div class="section-header">
                    <h1>Recent Orders</h1>
                </div>
            </section>
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
        </div>
    </div>
@endsection