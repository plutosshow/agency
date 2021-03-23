@extends('layouts.admin')
@section('title')Dashboard | {{ config('app.name') }} @endsection
@section('content')
    @include('templates.header')
    @include('templates.admin.side-bar')
@endsection
