@extends('admin.layouts.app')
@section('title', 'Send Email | Subscriber')
@section('heading', 'Send Email To Subscribers')
@section('button')
    <a href="{{ route('admin_subscriber_view') }}" class="btn btn-primary"><i class="fas fa-eye"></i> Subscribers</a>
@endsection
@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_subscriber_send_email_submit') }}" method="post">
                        @csrf 

                        <div class="form-group mb-3">
                            <label>Subject*</label>
                            <input type="text" class="form-control" name="subject" value="{{ old('subject') }}">
                        </div>

                        <div class="form-group mb-3">
                            <label>Message*</label>
                            <textarea name="message" class="form-control snote" cols="30" rows="10">{{ old('message') }}</textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection