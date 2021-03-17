@extends('layouts.main')
@section('title')О нас | {{ config('app.name') }} @endsection
@section('content')
    <div class="site-wrap">
        <div class="site-section border-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <img src="images/img_1.jpg" alt="Image" class="img-fluid">
                    </div>
                    <div class="col-md-5 ml-auto" data-aos="fade-up" data-aos-delay="200">
                        <div class="site-section-title mb-3">
                            <h2>Наша компания</h2>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus in cum odio.</p>
                        <p>Illum repudiandae ratione facere explicabo. Consequatur dolor optio iusto, quos autem
                            voluptate ea? Sunt laudantium fugiat, mollitia voluptate? Modi blanditiis veniam nesciunt
                            architecto odit voluptatum tempore impedit magnam itaque natus!</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="site-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 order-md-2" data-aos="fade-up" data-aos-delay="100">
                        <img src="images/hero_bg_4.jpg" alt="Image" class="img-fluid">
                    </div>
                    <div class="col-md-5 mr-auto order-md-1" data-aos="fade-up" data-aos-delay="200">
                        <div class="site-section-title mb-3">
                            <h2>Наш офис</h2>
                        </div>
                        <p>О́фис (англ. office) или конто́ра (нем. Kontor) — помещение, здание, комплекс зданий, в котором работают служащие предприятия (фирмы). В офисе (конторе) принимают клиентов, хранят и обрабатывают документы, архивы и тому подобное.</p>
                        <p>Главный офис (главная контора) — офис (контора), в котором находится руководство предприятия (фирмы), место пребывания центрального аппарата компании или предприятия, где размещаются топ-менеджмент компании или предприятия, дирекция, секретариат и другие важные административные подразделения. Место расположения главного офиса указывается при регистрации фирмы. Некоторые для придания важности называют свой главный офис (контору) штаб-квартирой, что является неправильным применением этого термина.</p>
                    </div>
                </div>
            </div>
        </div>
        @include('templates.leadership')
        @include('templates.banner')


    </div>
@endsection
