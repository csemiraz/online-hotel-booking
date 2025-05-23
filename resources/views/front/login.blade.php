@extends('front.layouts.app')
@section('title', 'Login')
@section('main_content')
<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $global_page_data->signin_heading }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4">
                <div class="login-form">
                    <form action="{{ route('customer_login_submit') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Email Address</label>
                            <input type="text" name="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary bg-website">Login</button>
                            <a href="{{ route('customer_forget_password') }}" class="primary-color">Forget Password?</a>
                        </div>
                    </form>
                    <div class="mb-3">
                        <a href="{{ route('customer_signup') }}" class="primary-color">New User? Make Registration</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
 