<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('customer_home') }}">Customer Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('customer_home') }}"></a>
        </div>

        <ul class="sidebar-menu">

            <li class="{{ Request::is('customer/home') ? 'active' : '' }}"><a class="nav-link" href="{{ route('customer_home') }}"><i class="fas fa-hand-point-right"></i> <span>Dashboard</span></a></li>

            <li class="{{ Request::is('customer/order/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('customer_order_view') }}"><i class="fas fa-hand-point-right"></i> <span>Orders</span></a></li>
          


        </ul>
    </aside>
</div>