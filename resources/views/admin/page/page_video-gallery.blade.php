@extends('admin.layouts.app')
@section('title', 'Edit | Video Gallery Page')
@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_page_video_gallery_update') }}" method="post">
                        @csrf

                        <div class="form-group mb-3">
                            <label>Video Gallery Heading *</label>
                            <input name="video_gallery_heading" class="form-control" type="text" value="{{ $page_data->video_gallery_heading }}">
                        </div>

                        <div class="form-group mb-3">
                            <label>Video Gallery Status *</label>
                            <select name="video_gallery_status" class="form-control">
                                <option value="1" @if($page_data->video_gallery_status == 1) selected @endif>Show</option>
                                <option value="0"  @if($page_data->video_gallery_status == 0) selected @endif>Hide</option>
                            </select>
                        </div>
                     
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
