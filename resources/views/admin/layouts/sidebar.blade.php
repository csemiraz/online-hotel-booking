<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin_home') }}">Admin Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin_home') }}"></a>
        </div>

        <ul class="sidebar-menu">

            <li class="{{ Request::is('admin/home') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_home') }}"><i class="fas fa-hand-point-right"></i> <span>Dashboard</span></a></li>

            {{-- <li class="nav-item dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Dropdown Items</span></a>
                <ul class="dropdown-menu">
                    <li class="active"><a class="nav-link" href=""><i class="fas fa-angle-right"></i> Item 1</a></li>
                    <li class=""><a class="nav-link" href=""><i class="fas fa-angle-right"></i> Item 2</a></li>
                </ul>
            </li> --}}

            <li class="{{ Request::is('admin/slide/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin_slide_view') }}"><i class="fas fa-hand-point-right"></i> <span>Slide</span>
                </a>
            </li>

            <li class="{{ Request::is('admin/feature/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin_feature_view') }}"><i class="fas fa-hand-point-right"></i> <span>Feature</span>
                </a>
            </li>

            <li class="{{ Request::is('admin/testimonial/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin_testimonial_view') }}"><i class="fas fa-hand-point-right"></i> <span>Testimonial</span>
                </a>
            </li>

            <li class="{{ Request::is('admin/post/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin_post_view') }}"><i class="fas fa-hand-point-right"></i> <span>Post</span>
                </a>
            </li>

            <li class="{{ Request::is('admin/photo/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin_photo_view') }}"><i class="fas fa-hand-point-right"></i> <span>Photo</span>
                </a>
            </li>

            <li class="{{ Request::is('admin/video/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin_video_view') }}"><i class="fas fa-hand-point-right"></i> <span>Video</span>
                </a>
            </li>


        </ul>
    </aside>
</div>