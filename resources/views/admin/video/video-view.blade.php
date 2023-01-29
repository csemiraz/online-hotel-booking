@extends('admin.layouts.app')
@section('title', 'View | Video')
@section('heading', 'View Video')
@section('button')
<a href="{{ route('admin_video_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Create</a>
@endsection
@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example1">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Video</th>
                                    <th>Caption</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($videos as $video)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <iframe width="350" height="200" src="https://www.youtube.com/embed/{{ $video->video_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                    </td>
                                    <td>{{ $video->caption }}</td>
                                    <td class="pt_10 pb_10">
                                        <a href="{{ route('admin_video_edit', $video->id) }}"
                                            class="btn btn-warning">Edit</a>
                                        <a href="{{ route('admin_video_delete', $video->id) }}" class="btn btn-danger"
                                            onClick="return confirm('Are you sure?');">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection