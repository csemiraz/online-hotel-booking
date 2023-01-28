@extends('front.layouts.app')
@section('title', 'Posts')
@section('main_content')
<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Posts</h2>
            </div>
        </div>
    </div>
</div>

<div class="blog-item">
    <div class="container">
        <div class="row">
            @foreach($posts as $post)
            <div class="col-md-4">
                <div class="inner">
                    <div class="photo">
                        <img src="{{ asset('images/'.$post->photo) }}" alt="">
                    </div>
                    <div class="text">
                        <h2><a href="{{ route('post_detail', $post->id) }}">{{ $post->title }}</a></h2>
                        <div class="short-des">
                            <p>
                                {{ Str::limit(strip_tags($post->content), 150) }} 
                            </p>
                        </div>
                        <div class="button">
                            <a href="{{ route('post_detail', $post->id) }}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-12">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>
@endsection