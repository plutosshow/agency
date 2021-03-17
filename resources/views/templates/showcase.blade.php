@foreach($flats as $flat)
    <div class="col-md-6 col-lg-4 mb-4">
        <a href="{{ route('property', $flat->id) }}" class="prop-entry d-block">
            <figure>
                <img src="images/img_1.jpg" alt="Image" class="img-fluid">
            </figure>
            <div class="prop-text">
                <div class="inner">
                    <span class="price rounded">₽ {{ $flat->price }} </span>
                    <h3 class="title">{{ $flat->region }}</h3>
                    <p class="location">{{ $flat->city }}, {{ $flat->street }},  {{ $flat->zip }}</p>
                </div>
                <div class="prop-more-info">
                    <div class="inner d-flex">
                        <div class="col">
                            <span>Площадь:</span>
                            <strong>{{ $flat->commonSquare }}<sup>2</sup></strong>
                        </div>
                        <div class="col">
                            <span>Этаж:</span>
                            <strong>{{ $flat->floor }}</strong>
                        </div>
                        <div class="col">
                            <span>Тип:</span>
                            <strong>{{ $flat->type }}</strong>
                        </div>
{{--                        <div class="col">--}}
{{--                            <span>Garages:</span>--}}
{{--                            <strong>1</strong>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </a>
    </div>
@endforeach

