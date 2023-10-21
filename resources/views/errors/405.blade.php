@extends('front.layouts.app')
@section('title', 'Error 405')
@section('main_content')
<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-5 text-center">
                <img src="{{ asset('images/405.jpg') }}" alt="405" width="250" class="img-fluid rounded-circle mb-3 img-thumbnail border-info">
                    <h1><span class="text-danger">Oops!</span> Error 405 method not allowed</h1>
                    <p>The request you were looking for not allowed.</p>
                    <a href="javascript:history.back()" class="btn btn-danger rounded-pill"><i class="fa fa-arrow-left"></i> Go back</a>
            </div>
        </div>
    </div>
</div>
@endsection
 