@extends('admin.layouts.app')
@section('title', 'Edit | Photo')
@section('heading', 'Edit Photo')
@section('button')
    <a href="{{ route('admin_photo_view') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection
@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_photo_update', $photo->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Existing Photo</label>
                            <div>
                                <img class="w_300 h_200" src="{{ asset('images/'.$photo->photo) }}" alt="post_photo">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label>Change Photo</label>
                            <div>
                                <input name="photo" class="form-control" type="file">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label>Caption</label>
                            <textarea name="caption" class="form-control h_100" cols="30" rows="10">{{ $photo->caption }}</textarea>
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