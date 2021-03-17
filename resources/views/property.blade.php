@extends('layouts.main')
@section('title')Подробно | {{ config('app.name') }}@endsection

@section('content')
    <div class="site-section site-section-sm  bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 pl-md-7">
                    <figure>
                        <img src="{{ __('image') }}" alt="Image" class="img-fluid">
                    </figure>
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <strong class="text-success h1 mb-3">₽ {{ $price }} </strong>
                        </div>
                        <div class="col-md-6">
                            <ul class="property-specs-wrap mb-3 mb-lg-0  float-lg-right">
                                <li>
                                    <span class="property-specs">Общая площадь</span>
                                    <span class="property-specs-number">{{ $flat->commonSquare }} м<sup>2</sup></span>
                                </li>
                                <li>
                                    <span class="property-specs">Жилая площадь</span>
                                    <span class="property-specs-number">{{ $flat->livedSquare }} м<sup>2</sup></span>

                                </li>
                                <li>
                                    <span class="property-specs">Этаж</span>
                                    <span class="property-specs-number">{{ $flat->floor }}</span>

                                </li>
                                <li>
                                    <span class="property-specs">Количество комнат</span>
                                    <span class="property-specs-number">{{ $flat->rooms }}</span>

                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-md-6 col-lg-4 text-left border-bottom border-top py-3">
                            <span class="d-inline-block text-black mb-0 caption-text">Тип</span>
                            <strong class="d-block">{{ $flat->type }}</strong>
                        </div>
                        <div class="col-md-6 col-lg-4 text-left border-bottom border-top py-3">
                            <span class="d-inline-block text-black mb-0 caption-text">Год постройки</span>
                            <strong class="d-block">{{ $flat->year }}</strong>
                        </div>
                        <div class="col-md-6 col-lg-4 text-left border-bottom border-top py-3">
                            <span class="d-inline-block text-black mb-0 caption-text">Цена/м<sup>2</sup></span>
                            <strong class="d-block">{{ $priceSquare }}</strong>
                        </div>
                    </div>
                    <h2 class="h4 text-black">Больше информации</h2>
                    <p>{{ $flat->comments }}</p>

                        @include('templates.slider-simple')

                </div>



                <div class="col-lg-4 pl-md-6">
                    <div class="bg-white widget border rounded">
                        <h3 class="h4 text-black widget-title mb-3">Связаться с агентом</h3>
                        <form action="" class="form-contact-agent" method="POST" id="answer">
                            <div class="form-group">
                                <label for="name">Имя</label>
                                <input type="text" name="Name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="name">Телефон</label>
                                <input type="text" name="Phone" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Отправить запрос">
                            </div>
                        </form>
                    </div>
                    <div class="bg-white widget border rounded">
                        <h3 class="h4 text-black widget-title mb-3">О агенте</h3>
                        <p>Понравилось предложение, хотите купить или, наоборот, продать с помощью нашего агенства
                            недвижимости. Оставляйте запрос и наш агент свяжеться с вами.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
