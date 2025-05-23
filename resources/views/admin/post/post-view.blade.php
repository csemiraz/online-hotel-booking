@extends('admin.layouts.app')
@section('title', 'View | Post')
@section('heading', 'View Post')
@section('button')
<a href="{{ route('admin_post_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Create</a>
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
                                    <th>Photo</th>
                                    <th>Title</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img class="w_200 h_150" src="{{ asset('images/'.$post->photo) }}" alt="">
                                    </td>
                                    <td>{{ $post->title }}</td>
                                    <td class="pt_10 pb_10">
                                        <a href="{{ route('admin_post_edit', $post->id) }}"
                                            class="btn btn-warning">Edit</a>
                                        <a href="{{ route('admin_post_delete', $post->id) }}" class="btn btn-danger"
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