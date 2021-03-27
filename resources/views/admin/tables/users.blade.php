@extends('layouts.admin')
@section('title')Запросы на звонок | {{ config('app.name') }} @endsection
@section('content')
    @include('templates.header')
    @include('templates.admin.templates.side-bar', ['activeParent' => 'tables', 'active'=>'users'])
    @include('templates.admin.templates.navbar')
    <div class="content-wrapper">
        @include('templates.admin.templates.breadcrumb', ['breadcrumb'=>'Пользователи'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 bg-light" id="app">
                        <div class="card bg-light" id="app">
                            <meta name="csrf-token" content="{{ csrf_token() }}">
                            <table-users-component></table-users-component>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @include('templates.footer')
@endsection
