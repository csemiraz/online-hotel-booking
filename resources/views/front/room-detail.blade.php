@extends('front.layouts.app')
@section('title', 'Room')
@section('main_content')
   
<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Room: {{ $room->name }}</h2>
            </div>
        </div>
    </div>
</div>


<div class="page-content room-detail">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-7 col-sm-12 left">

                <div class="room-detail-carousel owl-carousel">
                    <div class="item" style="background-image:url({{ asset('images/'.$room->featured_photo) }});">
                        <div class="bg"></div>
                    </div>

                    @foreach ($room->rRoomPhotos as $item)    
                    <div class="item" style="background-image:url({{ asset('images/'.$item->photo) }});">
                        <div class="bg"></div>
                    </div>
                    @endforeach

                </div>
                
                <div class="description">
                    {!! $room->description !!}
                </div>

                <div class="amenity">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Amenities</h2>
                        </div>
                    </div>
                    <div class="row">
                        @php
                            $arr_amenities = explode(',', $room->amenities);
                        @endphp
                        @for ($i=0; $i<count($arr_amenities); $i++)
                        @php
                            $room_amenity = App\Models\Amenity::where('id', $arr_amenities[$i])->first();
                        @endphp
                        <div class="col-lg-6 col-md-12">
                            <div class="item"><i class="fa fa-check-circle"></i> {{ $room_amenity->name }}</div>
                        </div>
                        @endfor                      
                       
                    </div>
                </div>


                <div class="feature">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Features</h2>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>Room Size</th>
                                <td>{{ $room->size }}m2</td>
                            </tr>
                            <tr>
                                <th>Number of Beds</th>
                                <td>{{ $room->total_beds }}</td>
                            </tr>
                            <tr>
                                <th>Number of Bathrooms</th>
                                <td>{{ $room->total_bathrooms }}</td>
                            </tr>
                            <tr>
                                <th>Number of Balconies</th>
                                <td>{{ $room->total_balconies }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="video">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $room->video_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>


            </div>
            <div class="col-lg-4 col-md-5 col-sm-12 right">

                <div class="sidebar-container" id="sticky_sidebar">
                        <div class="widget">
                            <h2>Room Price per Night</h2>
                            <div class="price">
                                ${{ $room->price }}
                            </div>
                        </div>
                        <div class="widget">
                            <h2>Reserve This Room</h2>
                            <form action="{{ route('booking_submit') }}" method="post">
                                @csrf
                            <input type="hidden" name="room_id" value="{{ $room->id }}">
                            <div class="form-group mb_20">
                                <label for="">Check in & Check out</label>
                                <input type="text" name="checkin_checkout" class="form-control daterange1" placeholder="05/06/2022 - 06/06/2022">
                            </div>
                            <div class="form-group mb_20">
                                <label for="">Adult</label>
                                <input type="number" name="adult" class="form-control" min="1" max="20">
                            </div>
                            <div class="form-group mb_20">
                                <label for="">Children</label>
                                <input type="number" name="children" class="form-control" min="0" max="20">
                            </div>
                        </div>

                        <div class="widget">
                            <button type="submit" class="book-now">Add to Cart</button>
                        </div>
                    </form>

                    </div>

                </div>


            </div>
        </div>
    </div>
@endsection