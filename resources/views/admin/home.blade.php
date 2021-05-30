@extends('admin.layouts.app')

@section('main-content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{ $posts->count() }}</h3>

                            <p>Total posts</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-image"></i>
                        </div>
                        <a href="{{ route('post.index') }}" class="small-box-footer">View all <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{ $unpublished->count() }}</h3>

                            <p>Unpublished posts</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person"></i>
                        </div>
                        <a href="{{ route('post.index') }}" class="small-box-footer">View all <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{ $users->count() }}</h3>

                            <p>Total users</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-laptop"></i>
                        </div>
                        <a href="{{ route('user.index') }}" class="small-box-footer">View all <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>
                                {{ $unactivated->count() }}
                            </h3>

                            <p>Unactivated users</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-email"></i>
                        </div>
                        <a href="{{ url('admin/users') }}" class="small-box-footer">View all <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <div class="row">
                <div class="col-md-6">
                    <!-- USERS LIST -->
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">Latest Members</h3>

                            <div class="box-tools pull-right">
                                <span class="label label-danger">Members list</span>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <ul class="users-list clearfix">
                                @foreach($users as $member)
                                    <li>
                                        <img src="{{ Storage::url($member->avatar) }}" alt="User Image" style="max-width: 70px;">
                                        <a class="users-list-name text-danger" href="{{ route('user.edit',$member->id) }}">{{ $member->name }}</a>
                                        @if($member->status == 1)
                                            <span class="badge success">active</span>
                                        @else
                                            <span class="badge success">Not active</span>
                                            @endif

                                    </li>
                                    @endforeach

                            </ul>
                            <!-- /.users-list -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-center">
                            <a href="{{ route('user.index') }}" class="uppercase">View All Users</a>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!--/.box -->
                </div>
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Recently Added Posts</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <ul class="products-list product-list-in-box">
                                @foreach($latest as $post)
                                    <li class="item">
                                        <div class="product-img">
                                            <img src="{{ Storage::url($post->image) }}" alt="Product Image">
                                        </div>
                                        <div class="product-info">
                                            @if($post->status == 1)
                                                <span class="label label-success pull-right">Published</span>
                                            @else
                                                <span class="label label-danger pull-right">Unpublished</span>
                                                @endif

                                                <a href="{{ route('post.edit',$post->id) }}">
                                                    <span class="product-description">
                                                      {{ $post->title }}
                                                    </span>
                                                </a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-center">
                            <a href="javascript:void(0)" class="uppercase">View All Products</a>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->

    </div>

    @endsection
