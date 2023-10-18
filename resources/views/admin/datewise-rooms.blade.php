@extends('admin.layouts.app')
@section('title', 'Datewise Rooms | Admin')
@section('heading', 'Datewise Rooms')

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_datewise_rooms_submit') }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Select Date *</label>
                            <input type="text" class="form-control datepicker" name="selected_date">
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