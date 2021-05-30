@extends('frontend/layouts/app')
@section('meta')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="case listing">
    <meta name="author" content="CODEI SYSTEMS">
    <title>SIMANT PRAKASH</title>
@endsection
@section('main-content')
    @section('slider')
    <div class="container-fluid no-left-padding no-right-padding slider-section">
        <div id="mm-slider-1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="mm-slider-1" data-source="gallery">
            <!-- START REVOLUTION SLIDER 5.4.1 fullwidth mode -->
            <div id="mm-slider-1" class="rev_slider fullwidthabanner" data-version="5.4.1">
                <ul>
                    @foreach($sliders as $slide)


                            <li data-index="rs-{{ $slide->id }}" data-transition="random-static,random-premium,random,boxslide,slotslide-horizontal,slotslide-vertical,boxfade,slotfade-horizontal,slotfade-vertical" data-slotamount="default,default,default,default,default,default,default,default,default,default" data-hideafterloop="0" data-hideslideonmobile="off"  data-randomtransition="on" data-easein="default,default,default,default,default,default,default,default,default,default" data-easeout="default,default,default,default,default,default,default,default,default,default" data-masterspeed="default,default,default,default,default,default,default,default,default,default"  data-rotate="0,0,0,0,0,0,0,0,0,0"  data-saveperformance="off"  class="slide-overlay" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                <!-- MAIN IMAGE -->
                                <img src="{{ Storage::url($slide->feature_image) }}"  alt="" title="slide-1"  width="1920" height="600" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                                <!-- LAYERS -->

                                <!-- LAYER NR. 4 -->
                                <a class="slidecnt1 tp-caption tp-layer-selectable tp-resizeme category-link" href="{{ route('post',$slide->slug) }}" target="_self" rel="nofollow" id="slide-28-layer-1"
                                   data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                   data-y="['middle','middle','middle','middle']" data-voffset="['-56','-70','-70','-57']"
                                   data-fontsize="['14','14','18','18']"
                                   data-height="none"
                                   data-whitespace="nowrap"
                                   data-type="text"
                                   data-actions=''
                                   data-responsive_offset="on"
                                   data-frames='[{"delay":0,"speed":1000,"frame":"0","from":"z:0;rX:0deg;rY:0;rZ:0;sX:2;sY:2;skX:0;skY:0;opacity:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power2.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"0","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgb(255,255,255);br:0px 0px 0px 0px;"}]'
                                   data-textAlign="['inherit','inherit','inherit','inherit']"
                                   data-paddingtop="[0,0,0,0]"
                                   data-paddingright="[0,0,0,0]"
                                   data-paddingbottom="[0,0,0,0]"
                                   data-paddingleft="[0,0,0,0]">TRAVEL </a>

                                <!-- LAYER NR. 5 -->
                                <a class="slidecnt2 tp-caption tp-layer-selectable tp-resizeme slide-title" href="{{ route('post',$slide->slug) }}" target="_self" rel="nofollow" id="slide-28-layer-2"
                                   data-x="['center','center','center','center']" data-hoffset="['0','-1','-1','-1']"
                                   data-y="['middle','middle','middle','middle']" data-voffset="['6','-5','-5','-5']"
                                   data-fontsize="['40','30','30','23']"
                                   data-lineheight="['40','40','40','30']"
                                   data-width="['601','601','601','435']"
                                   data-height="['81','81','81','none']"
                                   data-whitespace="normal"
                                   data-type="text"
                                   data-actions=''
                                   data-responsive_offset="on"
                                   data-frames='[{"delay":0,"speed":1500,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                                   data-textAlign="['center','center','center','center']"
                                   data-paddingtop="[0,0,0,0]"
                                   data-paddingright="[0,0,0,0]"
                                   data-paddingbottom="[0,0,0,0]"
                                   data-paddingleft="[0,0,0,0]">{{ $slide->title }}
                                    and Advanced</a>

                                <!-- LAYER NR. 6 -->
                                <a class="slidecnt3 tp-caption rev-btn tp-layer-selectable" href="{{ route('post',$slide->slug) }}" target="_self" rel="nofollow" id="slide-28-layer-3"
                                   data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                   data-y="['middle','middle','middle','middle']" data-voffset="['80','73','73','59']"
                                   data-width="none"
                                   data-height="none"
                                   data-whitespace="nowrap"
                                   data-type="button"
                                   data-actions=''
                                   data-responsive_offset="on"
                                   data-responsive="off"
                                   data-frames='[{"delay":0,"speed":1000,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power2.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"0","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgb(21,21,21);bg:rgba(255,255,255,1);"}]'
                                   data-textAlign="['inherit','inherit','inherit','inherit']"
                                   data-paddingtop="[2,2,2,2]"
                                   data-paddingright="[20,20,20,20]"
                                   data-paddingbottom="[0,0,0,0]"
                                   data-paddingleft="[20,20,20,20]">READ MORE </a>
                            </li>


                    @endforeach

                </ul>
                <div class="tp-bannertimer tp-bottom"></div>
            </div>
        </div><!-- END REVOLUTION SLIDER -->
    </div>
    @endsection
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
                            @foreach($post->categories as $category)
                                <a href="{{ route('category',$category->slug) }}">{{  $category->name }}</a>
                                @if( !$loop->last)
                                    ,
                                    @endif
                                    @endforeach
                                </span>
                            <h3 class="entry-title"><a href="#" title="Trendy Summer Fashion">{{ $post->title }}</a>
                            </h3>
                        </div>
                        <p>{{ $post->subtitle }}...</p>
                        <a href="{{ route('post',$post->slug) }}" title="Read More">Read More</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div><!-- Row /- -->
    <!-- Pagination -->
    {{ $posts->render("pagination::bootstrap-4") }}
</div>
@endsection

