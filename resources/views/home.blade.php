@extends('layouts.main')
@section('title')Главная | {{ config('app.name') }}@endsection
@section('content')
    @include('templates.slider',['slides' => $slides])
    @include('templates.filter')
    <div class="site-section site-section-sm bg-light-gray">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <div class="site-section-title">
                        <h2>Последние предложения для вас</h2>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                @include('templates.showcase', ['flats' => $allFlats])
            </div>
        </div>
    </div>
@endsection
{{--    <div class="col-lg-8 col-md-12 col-sm-6" id="app22222">--}}
{{--        <ajax-component></ajax-component>--}}
{{--    </div>--}}



