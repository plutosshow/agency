@extends('layouts.main')
@section('title')Главная | {{ config('app.name') }}@endsection
@section('content')
    @include('templates.slider',['slides' => $slides])
    <div class="site-section site-section-sm bg-light-gray">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <div class="site-section-title">
                        <h2>Последние предложения для вас</h2>
                    </div>
                </div>
            </div>
            <div id="app">
             <show-flats-component></show-flats-component>
            </div>
        </div>
    </div>
@endsection




