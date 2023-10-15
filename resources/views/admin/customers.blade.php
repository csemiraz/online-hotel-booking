@extends('admin.layouts.app')
@section('title', 'View | Customers')
@section('heading', 'Customers')

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
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $key=>$customer)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>
                                        @if($customer->photo != '')
                                        <img src="{{ asset('images/'.$customer->photo) }}" alt="" style="width: 120px; height: 100px;">
                                        @else
                                        <img src="{{ asset('images/no_image.png') }}" alt="" style="width: 120px; height: 100px;">
                                        @endif
                                    </td>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ $customer->phone }}</td>
                                    <td class="pt_10 pb_10">
                                        @if($customer->status == 1)
                                        <a href="{{ route('admin_customer_change_status', $customer->id) }}"
                                            class="btn btn-success">Active</a>
                                        @else
                                        <a href="{{ route('admin_customer_change_status', $customer->id) }}"
                                            class="btn btn-warning">Pending</a>
                                        @endif
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