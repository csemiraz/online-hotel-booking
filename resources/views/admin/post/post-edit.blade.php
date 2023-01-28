@extends('admin.layouts.app')
@section('title', 'Edit | Post')
@section('heading', 'Edit Post')
@section('button')
    <a href="{{ route('admin_post_view') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection
@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_post_update', $post->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Existing Photo</label>
                            <div>
                                <img class="w_300 h_200" src="{{ asset('images/'.$post->photo) }}" alt="post_photo">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label>Change Photo</label>
                            <div>
                                <input name="photo" class="form-control" type="file">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label>title*</label>
                            <input type="text" class="form-control" name="title" value="{{ $post->title }}">
                        </div>

                        <div class="form-group mb-3">
                            <label>Content*</label>
                            <textarea name="content" class="form-control snote" cols="30" rows="10">{{ $post->content }}</textarea>
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