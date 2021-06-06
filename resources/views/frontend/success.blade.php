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
    <div class="col-lg-8 col-md-6 col-sm-12 content-area">
        <div class="alert alert-success alert-dismissible" style="margin-top:60px;">
            <h4><i class="icon fa fa-check"></i> Success!</h4>
            {{$message ?? 'Action was successful'}}
        </div>
    </div>
@endsection

