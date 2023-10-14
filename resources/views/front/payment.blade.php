@extends('front.layouts.app')
@section('title', 'Payment')
@section('main_content')

<script src="https://www.paypalobjects.com/api/checkout.js"></script>

<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $global_page_data->payment_heading }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row cart">
            <div class="col-lg-4 col-md-4 checkout-left mb_30">

                @php
                $arr_cart_room_id = array();
                $i=0;
                foreach(session()->get('cart_room_id') as $value) {
                    $arr_cart_room_id[$i] = $value;
                    $i++;
                }
                $arr_cart_checkin_date = array();
                $i=0;
                foreach(session()->get('cart_checkin_date') as $value) {
                    $arr_cart_checkin_date[$i] = $value;
                    $i++;
                }
                $arr_cart_checkout_date = array();
                $i=0;
                foreach(session()->get('cart_checkout_date') as $value) {
                    $arr_cart_checkout_date[$i] = $value;
                    $i++;
                }
                $arr_cart_adult = array();
                $i=0;
                foreach(session()->get('cart_adult') as $value) {
                    $arr_cart_adult[$i] = $value;
                    $i++;
                }
                $arr_cart_children = array();
                $i=0;
                foreach(session()->get('cart_children') as $value) {
                    $arr_cart_children[$i] = $value;
                    $i++;
                }
                $total_price = 0;
                for($i=0;$i<count($arr_cart_room_id);$i++)
                {
                    $room_data = DB::table('rooms')->where('id',$arr_cart_room_id[$i])->first();                            
                    $d1 = explode('/',$arr_cart_checkin_date[$i]);
                    $d2 = explode('/',$arr_cart_checkout_date[$i]);
                    $d1_new = $d1[2].'-'.$d1[1].'-'.$d1[0];
                    $d2_new = $d2[2].'-'.$d2[1].'-'.$d2[0];
                    $t1 = strtotime($d1_new);
                    $t2 = strtotime($d2_new);
                    $diff = ($t2-$t1)/60/60/24;
                    $total_price = $total_price+($room_data->price*$diff);
                }
                @endphp
                
                <h4>Make Payment</h4>
                <select name="payment_method" class="form-control select2" id="paymentMethodChange" autocomplete="off">
                    <option value="">Select Payment Method</option>
                    <option value="PayPal">PayPal</option>
                    <option value="Stripe">Stripe</option>
                </select>

                <div class="paypal mt_20">
                    <h4>Pay with PayPal</h4>
                    <div id="paypal-button"></div>
                </div>

                <div class="stripe mt_20">
                    <h4>Pay with Stripe</h4>
                    @php
                    $cents = $total_price*100;
                    $customer_email = Auth::guard('customer')->user()->email;
                    $stripe_publishable_key = 'pk_test_51O1AHbDt0n7FRPagGl0XxUCNa2X7RswaqkNkVj66mISMVJP71LccDB25AUITyNipcUKs0h4KKdcIk92lKCUuxDPq00mCshJDKn';
                    @endphp
                    <form action="{{ route('stripe',$total_price) }}" method="post">
                        @csrf
                        <script
                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                            data-key="{{ $stripe_publishable_key }}"
                            data-amount="{{ $cents }}"
                            data-name="{{ env('APP_NAME') }}"
                            data-description=""
                            data-image="{{ asset('images/stripe.png') }}"
                            data-currency="usd"
                            data-email="{{ $customer_email }}"
                        >
                        </script>
                    </form>
                </div>

            </div>

            <div class="col-lg-4 col-md-4 checkout-right mb_30">
                <div class="inner">
                    <h4 class="mb_10">Billing Info</h4>
                    <hr />
                    <div class="table-responsive">
                        <table class="table">
                            <tbody> 
                                <tr>
                                    <td><b>Billing Name:</b></td>
                                    <td class="p_price">{{ session()->get('billing_name') }}</td>
                                </tr>
                                <tr>
                                    <td><b>Billing Email:</b></td>
                                    <td class="p_price">{{ session()->get('billing_email') }}</td>
                                </tr>
                                <tr>
                                    <td><b>Billing Phone:</b></td>
                                    <td class="p_price">{{ session()->get('billing_phone') }}</td>
                                </tr>
                                <tr>
                                    <td><b>Billing Country:</b></td>
                                    <td class="p_price">{{ session()->get('billing_country') }}</td>
                                </tr>
                                <tr>
                                    <td><b>Billing Address:</b></td>
                                    <td class="p_price">{{ session()->get('billing_address') }}</td>
                                </tr>
                                <tr>
                                    <td><b>Billing State:</b></td>
                                    <td class="p_price">{{ session()->get('billing_state') }}</td>
                                </tr>
                                <tr>
                                    <td><b>Billing City:</b></td>
                                    <td class="p_price">{{ session()->get('billing_city') }}</td>
                                </tr>
                                <tr>
                                    <td><b>Billing Zip:</b></td>
                                    <td class="p_price">{{ session()->get('billing_zip') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 checkout-right">
                <div class="inner">
                    <h4 class="mb_10">Cart Details</h4>
                    <hr />
                    <div class="table-responsive">
                        <table class="table">
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
                                        {{ $room_data->name }}
                                        <br>
                                        ({{ $arr_cart_checkin_date[$i] }} - {{ $arr_cart_checkout_date[$i] }})
                                        <br>
                                        Adult: {{ $arr_cart_adult[$i] }}, Children: {{ $arr_cart_children[$i] }}
                                    </td>
                                    <td class="p_price">
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
                                    <td><b>Total:</b></td>
                                    <td class="p_price"><b>${{ $total_price }}</b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@php
    $client = 'ASYm3z5ngakNNA_etGcKXXc7vWmIAt3ghUKE_6Br0WkDHYdJSPJ3t-njTMhpxs0OlIMp39hLdiUxQA4c';
    //$final_price = '5';
@endphp
<script>
	paypal.Button.render({
		env: 'sandbox',
		client: {
			sandbox: '{{ $client }}',
			production: '{{ $client }}'
		},
		locale: 'en_US',
		style: {
			size: 'medium',
			color: 'blue',
			shape: 'rect',
		},
		// Set up a payment
		payment: function (data, actions) {
			return actions.payment.create({
				redirect_urls:{
					return_url: '{{ url("payment/paypal/$total_price") }}'
				},
				transactions: [{
					amount: {
						total: '{{ $total_price }}',
						currency: 'USD'
					}
				}]
			});
		},
		// Execute the payment
		onAuthorize: function (data, actions) {
			return actions.redirect();
		}
	}, '#paypal-button');
</script>
@endsection