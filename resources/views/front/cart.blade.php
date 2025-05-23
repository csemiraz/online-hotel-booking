@extends('front.layouts.app')
@section('title', 'Cart')
@section('main_content')
<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $global_page_data->cart_heading }}</h2>
            </div>
        </div>
    </div>
</div>


<div class="page-content">
    <div class="container">
        <div class="row cart">
            <div class="col-md-12">
                @if(session()->has('cart_room_id'))
                <div class="table-responsive">
                    <table class="table table-bordered table-cart">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Serial</th>
                                <th>Photo</th>
                                <th>Room Info</th>
                                <th>Price/Night</th>
                                <th>Checkin</th>
                                <th>Checkout</th>
                                <th>Guests</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @php
                                $arr_cart_room_id = array();
                                $i=0;
                                foreach (session()->get('cart_room_id') as $value) {
                                    $arr_cart_room_id[$i] = $value;
                                    $i++;
                                }

                                $arr_cart_checkin_date = array();
                                $i = 0;
                                foreach(session()->get('cart_checkin_date') as $value) {
                                    $arr_cart_checkin_date[$i] = $value;
                                    $i++;
                                }

                                $arr_cart_checkout_date = array();
                                $i=0;
                                foreach (session()->get('cart_checkout_date') as $value) {
                                    $arr_cart_checkout_date[$i] = $value;
                                    $i++;
                                }

                                $arr_cart_adult = array();
                                $i=0;
                                foreach (session()->get('cart_adult') as $value) {
                                    $arr_cart_adult[$i] = $value;
                                    $i++;
                                }

                                $arr_cart_children = array();
                                $i=0;
                                foreach (session()->get('cart_children') as $value) {
                                    $arr_cart_children[$i] = $value;
                                    $i++;
                                }

                                $total_price = 0;
                                for($i=0; $i<count($arr_cart_room_id); $i++) {
                                    $room_data = DB::table('rooms')->where('id', $arr_cart_room_id[$i])->first();
                                @endphp

                                <tr>
                                    <td>
                                        <a href="{{ route('cart_delete', $arr_cart_room_id[$i]) }}" class="cart-delete-link" onclick="return confirm('Are you sure?');"><i class="fa fa-times"></i></a>
                                    </td>
                                    <td>{{ $i+1 }}</td>
                                    <td><img src="{{ asset('images/'.$room_data->featured_photo) }}"></td>
                                    <td>
                                        <a href="{{ route('room_detail', $room_data->id) }}" class="room-name">{{ $room_data->name }}</a>
                                    </td>
                                    <td>${{ $room_data->price }}</td>
                                    <td>{{ $arr_cart_checkin_date[$i] }}</td>
                                    <td>{{ $arr_cart_checkout_date[$i] }}</td>
                                    <td>
                                        Adult: {{ $arr_cart_adult[$i] }}<br>
                                        Children: {{ empty($arr_cart_children[$i]) ? 0 :  $arr_cart_children[$i]}}
                                    </td>
                                    <td>
                                    @php
                                        $d1 = explode('/',$arr_cart_checkin_date[$i]);
                                        $d2 = explode('/',$arr_cart_checkout_date[$i]);
                                        $d1_new = $d1[2].'-'.$d1[1].'-'.$d1[0];
                                        $d2_new = $d2[2].'-'.$d2[1].'-'.$d2[0];
                                        $t1 = strtotime($d1_new);
                                        $t2 = strtotime($d2_new);
                                        $diff = ($t2-$t1)/60/60/24;
                                        $subTotal = 0;
                                        if($diff == 0) {
                                            //echo '$'.$room_data->price;
                                            $subTotal = $room_data->price;
                                            echo'$'.$subTotal;

                                        }
                                        else{
                                            $subTotal = $room_data->price*$diff;
                                            echo '$'.$subTotal;
                                        }
                                    @endphp
                                    </td>
                                </tr>

                                @php
                                //$total_price = $total_price+($room_data->price*$diff);
                                $total_price = $total_price + $subTotal;
                                    }
                                @endphp 
                                                        
                           
                            <tr>
                                <td colspan="8" class="tar">Total:</td>
                                <td>${{ $total_price }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>                       

                <div class="checkout mb_20">
                    <a href="{{ route('checkout') }}" class="btn btn-primary bg-website">Checkout</a>
                </div>
                @else
                <div class="text-center text-danger">
                    <h1>Cart is empty!</h1>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection