<div class="top">
    <div class="container">
        <div class="row">
            <div class="col-md-6 left-side">
                <ul>
                    <li class="phone-text">{{ $global_setting_data->top_bar_phone }}</li>
                    <li class="email-text">{{ $global_setting_data->top_bar_email }}</li>
                </ul>
            </div>
            <div class="col-md-6 right-side">
                <ul class="right">
                    <li class="menu"><a href="{{ route('cart') }}">Cart</a></li>
                    <li class="menu"><a href="{{ route('checkout') }}">Checkout</a></li>
                    @if(!Auth::guard('customer')->check())
                        <li class="menu"><a href="{{ route('customer_signup') }}">Sign Up</a></li>
                        <li class="menu"><a href="{{ route('customer_login') }}">Login</a></li>
                    @else
                        <li class="menu"><a href="{{ route('customer_home') }}">Dashboard</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>