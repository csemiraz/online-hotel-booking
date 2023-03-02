@extends('admin.layouts.app')
@section('title', 'View | Room')
@section('heading', 'View Room')
@section('button')
<a href="{{ route('admin_room_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Create</a>
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
                                    <th>Featured Photo</th>
                                    <th>Name</th>
                                    <th>Price(Per Night)</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i=0;
                                @endphp
                                @foreach ($rooms as $room)
                                @php $i++; @endphp
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img class="w_200 h_150" src="{{ asset('images/'.$room->featured_photo) }}" alt="">
                                    </td>
                                    <td>{{ $room->name }}</td>
                                    <td>{{ $room->price }}</td>
                                    <td class="pt_10 pb_10">
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{ $i }}">Detail</button>
                                        <a href="{{ route('admin_room_gallery', $room->id) }}"
                                            class="btn btn-success">Gallery</a>
                                            <a href="{{ route('admin_room_edit', $room->id) }}"
                                                class="btn btn-warning">Edit</a>
                                        <a href="{{ route('admin_room_delete', $room->id) }}" class="btn btn-danger"
                                            onClick="return confirm('Are you sure?');">Delete</a>
                                    </td>

                                    <div class="modal fade" id="exampleModal{{ $i }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Room Detail</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group row bdb1 pt_10 mb_0">
                                                        <div class="col-md-4"><label class="form-label">Featured Photo</label></div>
                                                        <div class="col-md-8 mb-1"><img class="w_200 h_150" src="{{ asset('images/'.$room->featured_photo) }}" alt=""></div>
                                                    </div>
                                                    <div class="form-group row bdb1 pt_10 mb_0">
                                                        <div class="col-md-4"><label class="form-label">Name</label></div>
                                                        <div class="col-md-8">{{ $room->name }}</div>
                                                    </div>
                                                    <div class="form-group row bdb1 pt_10 mb_0">
                                                        <div class="col-md-4"><label class="form-label">Description</label></div>
                                                        <div class="col-md-8">{!! $room->description !!}</div>
                                                    </div>
                                                    <div class="form-group row bdb1 pt_10 mb_0">
                                                        <div class="col-md-4"><label class="form-label">Price (Per Night)</label></div>
                                                        <div class="col-md-8">${{ $room->price }}</div>
                                                    </div>
                                                    <div class="form-group row bdb1 pt_10 mb_0">
                                                        <div class="col-md-4"><label class="form-label">Total Rooms</label></div>
                                                        <div class="col-md-8">{{ $room->total_rooms }}</div>
                                                    </div>
                                                    <div class="form-group row bdb1 pt_10 mb_0">
                                                        <div class="col-md-4"><label class="form-label">Amenities</label></div>
                                                        <div class="col-md-8">{{ $room->name }}</div>
                                                    </div>
                                                    <div class="form-group row bdb1 pt_10 mb_0">
                                                        <div class="col-md-4"><label class="form-label">Size</label></div>
                                                        <div class="col-md-8">{{ $room->size }}</div>
                                                    </div>
                                                    <div class="form-group row bdb1 pt_10 mb_0">
                                                        <div class="col-md-4"><label class="form-label">Total Beds</label></div>
                                                        <div class="col-md-8">{{ $room->total_beds }}</div>
                                                    </div>
                                                    <div class="form-group row bdb1 pt_10 mb_0">
                                                        <div class="col-md-4"><label class="form-label">Tatal Bathrooms</label></div>
                                                        <div class="col-md-8">{{ $room->total_bathrooms }}</div>
                                                    </div>
                                                    <div class="form-group row bdb1 pt_10 mb_0">
                                                        <div class="col-md-4"><label class="form-label">Tatal Guests</label></div>
                                                        <div class="col-md-8">{{ $room->total_guests }}</div>
                                                    </div>
                                                    <div class="form-group row bdb1 pt_10 mb_0">
                                                        <div class="col-md-4"><label class="form-label">Tatal Balconies</label></div>
                                                        <div class="col-md-8">{{ $room->total_balconies }}</div>
                                                    </div>
                                                    <div class="form-group row bdb1 pt_10 mb_0">
                                                        <div class="col-md-4"><label class="form-label">Video</label></div>
                                                        <div class="col-md-8">
                                                            <iframe width="500" height="315" src="https://www.youtube.com/embed/{{ $room->video_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>

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