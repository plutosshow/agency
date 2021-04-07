@extends('layouts.main')
@section('title')О нас | {{ config('app.name') }} @endsection
@section('content')
    <div class="site-wrap">
        @foreach($default_blocks as $blocks)
        <div class="site-section @if($blocks->color) bg-{{$blocks->color}} @endif">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 @if($blocks->position == 'right') order-md-2 @endif" data-aos="fade-up" data-aos-delay="100">
                        <img src="{{asset('uploads/pages/'.$blocks->image)}}" alt="Image" class="img-fluid">
                    </div>
                    <div class="col-md-5 @if($blocks->position == 'right') mr-auto order-md-1 @endif " data-aos="fade-up" data-aos-delay="200">
                        <div class="site-section-title mb-3">
                            <h2>{{$blocks->title}}</h2>
                        </div>
                        <p>{{$blocks->sub_title ?? ''}}</p>
                        <p>{{$blocks->text}}</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @include('templates.leadership')
        @include('templates.banner')


    </div>
@endsection
