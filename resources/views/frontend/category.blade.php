@extends('frontend/layouts/app')
@section('meta')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="case listing">
    <meta name="author" content="SIMANT PRAKASH">
    <title>Blog - {{ $category->name }}</title>

@endsection
@section('main-content')
    <div class="col-lg-8 col-md-6 content-area">
        <!-- Row -->
        <div class="row">
            @foreach($posts as $post)
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="type-post blog-onecolumn">
                        <div class="entry-cover">
                            <div class="post-meta">
                                <span class="post-date"><a href="#">{{ $post->created_at->toFormattedDateString() }}</a></span>
                            </div>
                            <a href="#"><img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}"/></a>
                        </div>
                        <div class="entry-content">
                            <div class="entry-header">
                                <span class="post-category"><a href="{{ route('category',$category->slug) }}"
                                                               title="Lifestyle">{{ $category->name }}</a></span>
                                <h3 class="entry-title"><a href="#" title="Trendy Summer Fashion">{{ $post->title }}</a>
                                </h3>
                            </div>
                            <p>{{ $post->subtitle }}...</p>
                            <a href="{{ route('post',$post->slug) }}" title="Read More">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
                {{ $posts->render("pagination::bootstrap-4") }}
        </div>
    </div>
@endsection

