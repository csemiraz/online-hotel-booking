@extends('admin.layouts.app')
@section('title', 'Create | Post')
@section('heading', 'Create Post')
@section('button')
    <a href="{{ route('admin_post_view') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection
@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_post_store') }}" method="post" enctype="multipart/form-data">
                        @csrf 

                        <div class="form-group mb-3">
                            <label>Title*</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>

                        <div class="form-group mb-3">
                            <label>Content*</label>
                            <textarea name="content" class="form-control snote" cols="30" rows="10">{{ old('content') }}</textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label>Photo*</label>
                            <div>
                                <input name="photo" class="form-control" type="file">
                            </div>
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