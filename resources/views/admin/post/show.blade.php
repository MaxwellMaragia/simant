@extends('admin.layouts.app')
@section('headSection')
    <link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('main-content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Blog posts
            </h1>
            <ol class="breadcrumb">
                <li class="active">Posts</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="box">
                <div class="box-header">
                      <a href="{{ route('post.create') }}" class="btn btn-primary"><span class="fa fa-plus"></span>   Add new</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @include('includes.messages')
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>S.no</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Created</th>
                                <th>Published</th>
                                <th>Featured</th>
                                <th>Actions</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>
                                        <img

                                                @if($post->image)
                                                src="{{ Storage::url($post->image) }}"
                                                @else
                                                src="{{ Storage::url('public/noimage.jpg') }}"
                                                @endif

                                                alt="" height="70px" width="70px">
                                    </td>
                                    <td>
                                        <strong>{{ $post->title }}</strong>
                                    </td>
                                    <td>
                                        {{ $post->created_at->toFormattedDateString() }}
                                    </td>
                                    <td>
                                        @if($post->status == 1)
                                            <span class="badge bg-green">Yes</span>
                                        @else
                                            <span class="badge bg-red">No</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($post->featured == 1)
                                            <span class="badge bg-green">Yes</span>
                                        @else
                                            <span class="badge bg-red">No</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a data-toggle="tooltip" data-placement="bottom" title="Edit" href="{{ route('post.edit',$post->id) }}" class="badge bg-light-blue " disabled><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        <form id="delete-form-{{ $post->id }}" action="{{ route('post.destroy',$post->id) }}" style="display: none;" method="post">
                                            {{@csrf_field()}}
                                            {{@method_field('DELETE')}}
                                        </form>
                                        <a data-toggle="tooltip" data-placement="bottom" title="Delete" onclick="
                                                if(confirm('Are you sure you want to delete this post?'))
                                                {event.preventDefault();
                                                document.getElementById('delete-form-{{ $post->id }}').submit();
                                                }
                                                else{
                                                event.preventDefault();
                                                }
                                                " class="badge bg-red"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>S.no</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Created</th>
                                <th>Published</th>
                                <th>Featured</th>
                                <th>Actions</th>

                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>

        </section>
        <!-- /.content -->
    </div>


@section('footerSection')
    <script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>
@endsection
@endsection
