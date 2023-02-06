@extends('admin.layouts.app')
@section('title', 'Edit | Amenity')
@section('heading', 'Edit Amenity')
@section('button')
    <a href="{{ route('admin_amenity_view') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection
@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_amenity_update', $amenity->id) }}" method="post">
                        @csrf
                        
                        <div class="form-group mb-3">
                            <label>Amenity Name*</label>
                            <div>
                                <input name="name" value="{{ $amenity->name }}" class="form-control" type="text">
                            </div>
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