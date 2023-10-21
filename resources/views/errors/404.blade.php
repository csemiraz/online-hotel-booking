@extends('front.layouts.app')
@section('title', 'Error 404')
@section('main_content')
<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-5 text-center">
                <img src="{{ asset('images/404.jpg') }}" alt="404" width="250" class="img-fluid rounded-circle mb-3 img-thumbnail border-info">
                    <h1><span class="text-danger">Oops!</span> Error 404 page not found</h1>
                    <p>The page you were looking for doesn't exist.</p>
                    <a href="javascript:history.back()" class="btn btn-danger rounded-pill"><i class="fa fa-arrow-left"></i> Go back</a>
            </div>
        </div>
    </div>
</div>
@endsection
 