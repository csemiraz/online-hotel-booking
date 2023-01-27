@extends('admin.layouts.app')
@section('title', 'View | Feature')
@section('heading', 'View Feature')
@section('button')
<a href="{{ route('admin_feature_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Create</a>
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
                                    <th>Icon</th>
                                    <th>Heading</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($features as $key=>$feature)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>
                                        <i class="{{ $feature->icon }} fz_40"></i>
                                    </td>
                                    <td>{{ $feature->heading }}</td>
                                    <td class="pt_10 pb_10">
                                        <a href="{{ route('admin_feature_edit', $feature->id) }}"
                                            class="btn btn-warning">Edit</a>
                                        <a href="{{ route('admin_feature_delete', $feature->id) }}" class="btn btn-danger"
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