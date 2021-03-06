@extends('layouts.admin')
@section('title')Таблица "Квартиры" | {{ config('app.name') }} @endsection
@section('content')
    @include('templates.header')
    @include('templates.admin.templates.side-bar', ['activeParent' => 'tables', 'active'=>'flats'])
    @include('templates.admin.templates.navbar')
    <div class="content-wrapper">
        @include('templates.admin.templates.breadcrumb', ['breadcrumb'=>'Квартиры'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12"  id="app">
                        <div class="card bg-light" id="app">
                            <meta name="csrf-token" content="{{ csrf_token() }}">
                            <table-flats-component></table-flats-component>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @include('templates.footer')
    </div>
@endsection
