@extends('admin.layouts.app')
@section('title', 'Edit | Room Page')
@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_page_room_update') }}" method="post">
                        @csrf

                        <div class="form-group mb-3">
                            <label>Room Heading *</label>
                            <input name="room_heading" class="form-control" type="text" value="{{ $page_data->room_heading }}">
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
