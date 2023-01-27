<div class="navbar-area" id="stickymenu">

    <!-- Menu For Mobile Device -->
    <div class="mobile-nav">
        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('front/') }}/uploads/logo.png" alt="">
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('front/') }}/uploads/logo.png" alt="">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">        
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="about.html" class="nav-link">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void;" class="nav-link dropdown-toggle">Room & Suite</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="room-detail.html" class="nav-link">Regular Couple Bed</a>
                                </li>
                                <li class="nav-item">
                                    <a href="room-detail.html" class="nav-link">Delux Couple Bed</a>
                                </li>
                                <li class="nav-item">
                                    <a href="room-detail.html" class="nav-link">Regular Double Bed</a>
                                </li>
                                <li class="nav-item">
                                    <a href="room-detail.html" class="nav-link">Delux Double Bed</a>
                                </li>
                                <li class="nav-item">
                                    <a href="room-detail.html" class="nav-link">Premium Suite</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void;" class="nav-link dropdown-toggle">Gallery</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="photo-gallery.html" class="nav-link">Photo Gallery</a>
                                </li>
                                <li class="nav-item">
                                    <a href="video-gallery.html" class="nav-link">Video Gallery</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="blog.html" class="nav-link">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="contact.html" class="nav-link">Contact</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
