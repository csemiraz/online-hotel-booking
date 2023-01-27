@extends('admin.layouts.app')
@section('title', 'Edit | Slide')
@section('heading', 'Edit Slide')
@section('button')
    <a href="{{ route('admin_slide_view') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection
@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_slide_update', $slide->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Existing Photo</label>
                            <div>
                                <img class="w_250 h_150" src="{{ asset('images/'.$slide->photo) }}" alt="slide_photo">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label>Change Photo</label>
                            <div>
                                <input name="photo" class="form-control" type="file">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label>Heading</label>
                            <input type="text" class="form-control" name="heading" value="{{ $slide->heading }}">
                        </div>
                     
                        <div class="form-group mb-3">
                            <label>Text</label>
                            <textarea name="text" class="form-control snote" cols="30" rows="10">{{ $slide->text }}</textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label>Button Text</label>
                            <input type="text" class="form-control" name="button_text" value="{{ $slide->button_text }}">
                        </div>

                        <div class="form-group mb-3">
                            <label>Button URL</label>
                            <input type="text" class="form-control" name="button_url" value="{{ $slide->button_url }}">
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