@extends('front.layouts.app')
@section('title', 'Terms & Conditions')
@section('main_content')
<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $page_data->terms_heading }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {!! $page_data->terms_content !!}
            </div>
        </div>
    </div>
</div>
@endsection
 