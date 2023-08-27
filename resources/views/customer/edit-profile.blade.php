@extends('customer.layouts.app')
@section('title', 'Edit Profile | Customer')
@section('heading', 'Edit Profile')

@section('main_content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('customer_edit_profile_submit') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="{{ asset('images/'.$customer->photo) }}" alt="" class="profile-photo w_100_p">
                                    <input type="file" name="photo" class="form-control mt_10" name="photo">
                                </div>
                                <div class="col-md-9">
                                    <div class="mb-4">
                                        <label class="form-label">Name *</label>
                                        <input type="text" class="form-control" name="name" value="{{ $customer->name }}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Email *</label>
                                        <input type="text" class="form-control" name="email" value="{{ $customer->email }}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Phone</label>
                                        <input type="text" class="form-control" name="phone" value="{{ $customer->phone }}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Country</label>
                                        <input type="text" class="form-control" name="country" value="{{ $customer->country }}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Address</label>
                                        <input type="text" class="form-control" name="address" value="{{ $customer->address }}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">State</label>
                                        <input type="text" class="form-control" name="state" value="{{ $customer->state }}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">City</label>
                                        <input type="text" class="form-control" name="city" value="{{ $customer->city }}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Zip Code</label>
                                        <input type="text" class="form-control" name="zip" value="{{ $customer->zip }}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Retype Password</label>
                                        <input type="password" class="form-control" name="retype_password">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label"></label>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection