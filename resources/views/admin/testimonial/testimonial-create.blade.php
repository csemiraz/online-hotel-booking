@extends('admin.layouts.app')
@section('title', 'Create | Testimonial')
@section('heading', 'Create Testimonial')
@section('button')
    <a href="{{ route('admin_testimonial_view') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection
@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_testimonial_store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Photo*</label>
                            <div>
                                <input name="photo" class="form-control" type="file">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label>Name*</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                        
                        <div class="form-group mb-3">
                            <label>Designation*</label>
                            <input type="text" class="form-control" name="designation" value="{{ old('designation') }}">
                        </div>

                        <div class="form-group mb-3">
                            <label>Comment*</label>
                            <textarea name="comment" class="form-control h_100" cols="30" rows="10">{{ old('comment') }}</textarea>
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