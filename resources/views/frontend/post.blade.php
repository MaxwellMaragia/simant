@extends('frontend/layouts/app')
@section('meta')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="{{ $post->meta_author }}">
    <!-- description -->
    <meta name="title" content="{{ $post->meta_title }}">
    <meta name="description" content="{{ $post->meta_description }}">
    <!-- keywords -->
    <meta name="keywords" content="{{ $post->meta_keywords }}">
    <title>{{ $post->title }}</title>

@endsection
@section('main-content')
    <div class="col-xl-8 col-lg-8 col-md-6 col-12 content-area">
        <article class="type-post">
            <div class="entry-cover">
                <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" />
            </div>
            <div class="entry-content">
                <div class="entry-header">
                    <span class="post-category">
                       @foreach($post->categories as $category)
                            <a href="{{ route('category',$category->slug) }}">{{  $category->name }}</a>
                            @if( !$loop->last)
                                ,
                            @endif
                        @endforeach
                    </span>
                    <h3 class="entry-title">{{ $post->title }}</h3>
                    <div class="post-meta">
                        <span class="post-date">{{ $post->created_at->toFormattedDateString() }}</span>
                    </div>
                </div>
                {!! htmlspecialchars_decode($post->body) !!}
            </div>
        </article>

        <!-- About Author -->

    </div>
@endsection

