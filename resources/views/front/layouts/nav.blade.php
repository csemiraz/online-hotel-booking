<div class="navbar-area" id="stickymenu">

    <!-- Menu For Mobile Device -->
    <div class="mobile-nav">
        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('images/'.$global_setting_data->logo) }}" alt="">
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('images/'.$global_setting_data->logo) }}" alt="">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">        
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link">Home</a>
                        </li>
                        @if($global_page_data->about_status==1)
                        <li class="nav-item">
                            <a href="{{ route('about') }}" class="nav-link">About</a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a href="javascript:void;" class="nav-link dropdown-toggle">Room & Suite</a>
                            <ul class="dropdown-menu">
                                @foreach($global_room_data as $item)
                                <li class="nav-item">
                                    <a href="{{ route('room_detail', $item->id) }}" class="nav-link">{{ $item->name }}</a>
                                </li>
                               @endforeach
                            </ul>
                        </li>
                        @if($global_page_data->photo_gallery_status==1 || $global_page_data->video_gallery_status==1)
                        <li class="nav-item">
                            <a href="javascript:void;" class="nav-link dropdown-toggle">Gallery</a>
                            <ul class="dropdown-menu">
                                @if($global_page_data->photo_gallery_status==1)
                                <li class="nav-item">
                                    <a href="{{ route('photo_gallery') }}" class="nav-link">Photo Gallery</a>
                                </li>
                                @endif
                                @if($global_page_data->video_gallery_status==1)
                                <li class="nav-item">
                                    <a href="{{ route('video_gallery') }}" class="nav-link">Video Gallery</a>
                                </li>
                                @endif
                            </ul>
                        </li>
                        @endif
                        @if($global_page_data->blog_status==1)
                        <li class="nav-item">
                            <a href="{{ route('posts') }}" class="nav-link">Blog</a>
                        </li>
                        @endif
                        @if($global_page_data->contact_status==1)
                        <li class="nav-item">
                            <a href="{{ route('contact') }}" class="nav-link">Contact</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
