@extends('admin.layouts.app')
@section('title', 'Gallery | Room')
@section('heading', 'Gallery Room')
@section('button')
    <a href="{{ route('admin_room_view') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
@endsection
@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_room_gallery_store', $room->id) }}" method="post" enctype="multipart/form-data">
                        @csrf                 

                        <div class="form-group mb-3">
                            <label>Photo*</label>
                            <div>
                                <input name="photo" type="file">
                            </div>
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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody> 
                                @foreach ($room_photos as $room_photo)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img class="w_200 h_150" src="{{ asset('images/'.$room_photo->photo) }}" alt="">
                                    </td>
                                   
                                    <td class="pt_10 pb_10">
                                        <a href="{{ route('admin_room_gallery_delete', $room_photo->id) }}" class="btn btn-danger"
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