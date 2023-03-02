@extends('admin.layouts.app')
@section('title', 'Edit | Room')
@section('heading', 'Edit Room')
@section('button')
    <a href="{{ route('admin_room_view') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection
@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_room_update', $room->id) }}" method="post" enctype="multipart/form-data">
                        @csrf 

                        <div class="form-group mb-3">
                            <label>Name *</label>
                            <input type="text" class="form-control" name="name" value="{{ $room->name }}">
                        </div>

                        <div class="form-group mb-3">
                            <label>Description *</label>
                            <textarea name="description" class="form-control snote" cols="30" rows="10">{{ $room->description }}</textarea>
                        </div>

                        
                        <div class="form-group mb-3">
                            <label>Price *</label>
                            <input type="text" class="form-control" name="price" value="{{ $room->price }}">
                        </div>

                        <div class="form-group mb-3">
                            <label>Total Rooms *</label>
                            <input type="text" class="form-control" name="total_rooms" value="{{ $room->total_rooms }}">
                        </div>
                             
                        <div class="form-group mb-3">
                            <label>Amenities</label>
                            @php
                                $i=0;
                            @endphp
                            @foreach($amenities as $amenity)
                            @php
                                $i++;
                            @endphp
                            @if(in_array($amenity->id, $existing_amenities))
                            @php
                                $check_type = 'checked';
                            @endphp
                            @else
                            @php
                                $check_type = '';
                            @endphp
                            @endif
                            <div class="form-check">
                                <input name="arr_amenities[]" class="form-check-input" type="checkbox" value="{{ $amenity->id }}" id="defaultCheck{{ $i }}" {{ $check_type }}>
                                <label class="form-check-label" for="defaultCheck{{ $i }}">
                                  {{ $amenity->name }}
                                </label>
                            </div>
                            @endforeach
                        </div>

                        <div class="form-group mb-3">
                            <label>Size</label>
                            <input type="text" class="form-control" name="size" value="{{ $room->size }}">
                        </div>

                        <div class="form-group mb-3">
                            <label>Total Beds</label>
                            <input type="text" class="form-control" name="total_beds" value="{{ $room->total_beds }}">
                        </div>

                        <div class="form-group mb-3">
                            <label>Total Bathrooms</label>
                            <input type="text" class="form-control" name="total_bathrooms" value="{{ $room->total_bathrooms }}">
                        </div>

                        <div class="form-group mb-3">
                            <label>Total Guests</label>
                            <input type="text" class="form-control" name="total_guests" value="{{ $room->total_guests }}">
                        </div>

                        <div class="form-group mb-3">
                            <label>Total Balconies</label>
                            <input type="text" class="form-control" name="total_balconies" value="{{ $room->total_balconies }}">
                        </div>

                        <div class="form-group mb-3">
                            <label>Existing Featured Photo</label>
                            <div>
                                <img style="width: 200px;" src="{{ asset('images/'.$room->featured_photo) }}" alt="featured photo" >
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label>Change Featured Photo *</label>
                            <div>
                                <input name="featured_photo" class="form-control" type="file">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label>Video Id</label>
                            <input type="text" class="form-control" name="video_id" value="{{ $room->video_id }}">
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