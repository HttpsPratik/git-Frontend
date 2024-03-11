@extends('frontend.layouts.app', ['title'=> "गृहपृष्ठ"])
@section('content')
    @include('frontend.containers.latest-grivances')
    @include('frontend.containers.reports')
    @include('frontend.containers.get-started')
@endsection
