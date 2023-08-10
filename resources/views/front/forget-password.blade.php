@extends('front.layouts.app')
@section('title', 'Forget Password')
@section('main_content')
<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $global_page_data->forget_password_heading }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4">
                <div class="login-form">
                    <form action="{{ route('customer_forget_password_submit') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Email Address</label>
                            <input type="text" name="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary bg-website">Submit</button>
                            <a href="{{ route('customer_login') }}" class="primary-color">Back to Login Page</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
 