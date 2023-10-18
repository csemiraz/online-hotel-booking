@extends('admin.layouts.app')
@section('title', 'Datewise Rooms Detail | Admin')
@section('heading', 'Datewise Rooms Detail')

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
                                    <th>Room Name</th>
                                    <th>Total Rooms</th>
                                    <th>Booked Rooms</th>
                                    <th>Available Rooms</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rooms as $key=>$room)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $room->name }}</td>
                                    <td>{{ $room->total_rooms }}</td>
                                    <td>
                                        @php
                                        $count = \App\Models\BookedRoom::where('room_id',$room->id)->where('booking_date',$check_selected_date)->count();
                                        @endphp
                                        {{ $count }}
                                    </td>
                                    <td>{{ $room->total_rooms - $count }}</td>
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