@extends('frontend/layouts/app')
@section('meta')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="case listing">
    <meta name="author" content="CODEI SYSTEMS">
    <title>Search results</title>
@endsection
@section('main-content')
<div class="col-lg-8 col-md-6 content-area">
    <div class="row">
        <div class="col-lg-12 col-md-6 text-md-left" style="margin-bottom:20px;">
            <!-- start page title -->
            <h4>Search results for "{{ $keywords }}"</h4>
            <small>({{ $results->count() }}) Total results found</small>
            <!-- end page title -->
        </div>
    @if($results->count()>0)
        @foreach($results as $result)
                <div class="col-12 col-md-12 col-sm-6 blog-paralle">
                    <div class="type-post">
                        <div class="entry-cover">
                            <div class="post-meta">
                                <span class="post-date"><a href="#">{{ $result->created_at->toFormattedDateString() }}</a></span>
                            </div>
                            <a href="{{ route('post',$result->slug) }}"><img src="{{ Storage::url($result->image ) }}" alt="{{ $result->title }}" /></a>
                        </div>
                        <div class="entry-content">
                            <div class="entry-header">
                                <span class="post-category">
                                    @foreach($result->categories as $category)
                                        <a href="{{ route('category',$category->slug) }}">{{  $category->name }}</a>
                                        @if( !$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                </span>
                                <h3 class="entry-title"><a href="{{ route('post',$result->slug) }}" title="Traffic Jams Solved">{{ $result->title }}</a></h3>
                            </div>
                            <p>{{ $result->subtitle }}...</p>
                            <a href="{{ route('post',$result->slug) }}" title="Read More">Read More</a>
                        </div>
                    </div>
                </div>


            @endforeach

        @else
            <blockquote class="border-color-deep-pink">
                <p class="text-danger">Ops! No article could be found with the search term <span class="text-info">"{{ $keywords }}"</span>, please refine your search and try again</p>
            </blockquote>
        @endif
    </div>
</div>
@endsection

