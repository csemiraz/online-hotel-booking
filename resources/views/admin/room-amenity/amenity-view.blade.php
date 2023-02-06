@extends('admin.layouts.app')
@section('title', 'View | Amenity')
@section('heading', 'View Amenity')
@section('button')
<a href="{{ route('admin_amenity_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Create</a>
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
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($amenities as $amenity)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $amenity->name }}</td>
                                    <td class="pt_10 pb_10">
                                        <a href="{{ route('admin_amenity_edit', $amenity->id) }}"
                                            class="btn btn-warning">Edit</a>
                                        <a href="{{ route('admin_amenity_delete', $amenity->id) }}" class="btn btn-danger"
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