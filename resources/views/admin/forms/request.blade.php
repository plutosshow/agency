@extends('layouts.admin')
@section('title')Запросы на звонок | {{ config('app.name') }} @endsection
@section('content')
    @include('templates.header')
    @include('templates.admin.templates.side-bar', ['active'=>'forms'])
    @include('templates.admin.templates.navbar')
    <div class="content-wrapper">
        @include('templates.admin.templates.breadcrumb', ['breadcrumb'=>'Запросы на звонок'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card bg-light">
                            <div class="card-body" id="app">
                                <form-request></form-request>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @include('templates.footer')
@endsection
