@extends('admin.layouts.app')
@section('main-content')

@section('headSection')
    <link rel="stylesheet" href="{{asset('admin/bower_components/select2/dist/css/select2.min.css')}}">
    <style>
        .file {
            position: relative;
            height: 35px;
        }

        .file > input[type="file"] {
            position: absolute;
            opacity: 0;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0
        }


    </style>
@endsection

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit post
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('post.index') }}">Posts</a></li>
            <li class="active">Edit post</li>
        </ol>
    </section>



    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">

                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Fields marked with (<span class="text-danger">*</span>) are required</h3>
                    </div>


                <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('post.update',$post->id) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="box-body">
                            @include('includes.messages')
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Post title<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" required="required" value="{{ $post->title }}">
                                </div>

                                <div class="form-group">
                                    <label for="subtitle">Short description<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Enter subtitle" required="required" value="{{ $post->subtitle }}">
                                </div>

                                <div class="form-group">
                                    <label>Select tags</label>
                                    <select class="form-control select2" multiple="multiple" data-placeholder="Select tags"
                                            style="width: 100%;" name="tags[]">
                                        @foreach($tags as $tag)
                                            <option value="{{ $tag->id }}"
                                                    @foreach($post->tags as $postTag)
                                                    @if($postTag->id == $tag->id)
                                                    selected
                                                @endif
                                                @endforeach
                                            >
                                                {{ $tag->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Select categories</label>
                                    <select class="form-control select2" multiple="multiple" data-placeholder="Select categories"
                                            style="width: 100%;border-radius:0px;" name="categories[]">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}"
                                                    @foreach($post->categories as $postCategory)
                                                    @if($postCategory->id == $category->id)
                                                    selected
                                                @endif
                                                @endforeach
                                            >{{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="col-lg-6">


                                <br>

                                <div class="form-group">
                                    <div class="checkbox col-md-6">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group text-center">
                                                    <div class="form-group text-center">
                                                        <img src="{{ Storage::url($post->image) }}"  alt="User Image" id="preview" height="200px" width="300px" onchange="previewImage(this)">
                                                    </div>
                                                    <div class="file">
                                                        <label for="avatar" class="btn bg-navy btn-flat btn-block"><span class="fa fa-upload"></span> Upload default image</label>
                                                        <input type="file" name="image" accept="image/*" class="form-control" id="default">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">SEO tags</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body pad">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">Meta author</label>
                                        <input type="text" class="form-control" id="meta_author" name="meta_author" placeholder="Enter author" value="{{ $post->meta_author }}" >
                                    </div>

                                    <div class="form-group">
                                        <label for="subtitle">Meta title</label>
                                        <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="Enter meta title" value="{{ $post->meta_title }}" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="slug">Meta description</label>
                                        <input type="text" class="form-control" id="meta_description" name="meta_description" placeholder="Enter description" value="{{ $post->meta_description }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="slug">Meta keywords</label>
                                        <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" placeholder="Enter SEO keywords separated by ," value="{{ $post->meta_keywords }}" >
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Write post here<span class="text-danger">*</span>
                                </h3>
                                <!-- tools box -->
                                <div class="pull-right box-tools">
                                    <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                                            title="Collapse">
                                        <i class="fa fa-minus"></i></button>
                                </div>
                                <!-- /. tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body pad">
                                <textarea name="body" id="editor1"
                                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                    {{ $post->body }}
                                </textarea>
                            </div>

                            @can('posts.viewAny',Auth::user() || 'posts.view',Auth::user())
                                <div class="box">
                                    <div class="box-header">
                                        <h3 class="box-title">Publish/Feature</h3>
                                    </div>
                                    <!-- /.box-header -->

                                    <div class="box-body pad">
                                        <div class="row">
                                            <div class="col-md-12">
                                                @can('posts.viewAny',Auth::user())

                                                    <div class="col-md-12">
                                                        <div class="col-md-6 col-md-offset-3 text-center">
                                                            <label>
                                                                <input type="checkbox" name="status" value="1"
                                                                       @if($post->status == 1)
                                                                       checked

                                                                    @endif
                                                                > Publish this post
                                                            </label>
                                                        </div>

                                                    </div>

                                                @endcan

                                                @can('posts.view',Auth::user())
                                                    <div class="col-md-12">
                                                        <div class="col-md-6 col-md-offset-3 text-center">
                                                            <label>
                                                                <input type="checkbox" name="featured" value="1" id="feature"
                                                                       @if($post->featured == 1)
                                                                       checked
                                                                    @endif
                                                                > Feature this post
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <br>
                                                @endcan

                                                <div class="check @if($post->featured != 1) hide @endif col-md-6 col-md-offset-3">
                                                    <div class="form-group">

                                                        <img src="@if($post->featured == 1){{ Storage::url($post->feature_image) }} @else http://placehold.it/1920x1100 @endif"  alt="User Image" id="preview1" width="100%"  onchange="previewImage(this)" class="padding-10px-bottom">
                                                        <br>
                                                        <div class="file" style="margin-top:10px;">
                                                            <label for="avatar" class="btn bg-navy btn-flat btn-block "><span class="fa fa-upload"></span> Upload feature image</label>
                                                            <input type="file" name="feature_image" accept="image/*" class="form-control" id="featured">
                                                        </div>
                                                    </div>

                                                </div>



                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endcan

                            {{--hidden fields--}}
                            <input type="hidden" name="c_default_image" value="{{ $post->image }}">
                            <input type="hidden" name="c_feature_image" value="{{ $post->feature_image }}">
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-warning" href="{{ route('post.index') }}">Back</a>
                        </div>
                    </form>
                </div>
                <!-- /.box -->


            </div>
            <!-- /.col-->
        </div>
        <!-- ./row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@section('footerSection')

    <script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('admin/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <script>
        $(function () {

            // instance, using default configuration.
            CKEDITOR.replace( 'editor1');

        })
    </script>
    <script>
    $(document).ready(function () {

            $('.select2').select2();

        });

        $('#feature').change(function(){
            if($(this).is(":checked")) {

                $('div.check').removeClass("hide");

            } else {

                $('div.check').addClass("hide");

            }
        });
    function readURL(input,loadscreen) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $(loadscreen).attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#default").change(function(){
        readURL(this,'#preview');
    });
    $("#featured").change(function(){
        readURL(this,'#preview1');
    });

    </script>
@endsection

@endsection
