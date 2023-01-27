@extends('admin.layouts.app')
@section('title', 'Create | Feature')
@section('heading', 'Create Feature')
@section('button')
    <a href="{{ route('admin_feature_view') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection
@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_feature_store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Icon*</label>
                            <input type="text" class="form-control" name="icon">
                        </div>

                        <div class="form-group mb-3">
                            <label>Heading</label>
                            <input type="text" class="form-control" name="heading">
                        </div>
                     
                        <div class="form-group mb-3">
                            <label>Text</label>
                            <textarea name="text" class="form-control"></textarea>
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