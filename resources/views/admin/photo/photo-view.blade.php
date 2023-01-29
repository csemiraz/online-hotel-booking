@extends('admin.layouts.app')
@section('title', 'View | Photo')
@section('heading', 'View Photo')
@section('button')
<a href="{{ route('admin_photo_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Create</a>
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
                                    <th>Caption</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($photos as $photo)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img class="w_200 h_150" src="{{ asset('images/'.$photo->photo) }}" alt="">
                                    </td>
                                    <td>{{ $photo->caption }}</td>
                                    <td class="pt_10 pb_10">
                                        <a href="{{ route('admin_photo_edit', $photo->id) }}"
                                            class="btn btn-warning">Edit</a>
                                        <a href="{{ route('admin_photo_delete', $photo->id) }}" class="btn btn-danger"
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