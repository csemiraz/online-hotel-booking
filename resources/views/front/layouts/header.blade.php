<div class="top">
    <div class="container">
        <div class="row">
            <div class="col-md-6 left-side">
                <ul>
                    <li class="phone-text">111-222-3333</li>
                    <li class="email-text">contact@arefindev.com</li>
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