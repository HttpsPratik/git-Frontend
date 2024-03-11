<!DOCTYPE html>
<html lang="en">
<head><meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{config('app.name')}}</title>

    {{--<!-- jQuery -->--}}
    {{--<script src="{{url('/backend/plugins/jquery/jquery.min.js')}}"></script>--}}
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
    {{--<!-- Google Font: Source Sans Pro -->--}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    {{--<!-- Font Awesome -->--}}
    <link rel="stylesheet" href="{{url('/backend/plugins/fontawesome-free/css/all.min.css')}}">
    {{--<!-- icheck bootstrap -->--}}
    <link rel="stylesheet" href="{{url('/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    {{--<!-- Theme style -->--}}
    <link rel="stylesheet" href="{{url('backend/dist/css/adminlte.min.css')}}">

</head>
<body class="hold-transition login-page">
<div class="login-box">
    {{--<!-- /.login-logo -->--}}
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="{{url('/')}}" class="h1"><b>{{config('app.name')}}</b></a>
        </div>
        <div class="card-body">
