@extends('admin.layouts.app')
@section('title', 'Create | Amenity')
@section('heading', 'Create Amenity')
@section('button')
    <a href="{{ route('admin_amenity_view') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection
@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_amenity_store') }}" method="post">
                        @csrf 

                        <div class="form-group mb-3">
                            <label>Amenity Name*</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
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