<div class="slider bx-wrapper">
    @foreach($slides as $slide)
        <div class="site-blocks-cover" data-aos="fade" data-stellar-background-ratio="0.5">
            <img src="{{asset('uploads/'.$slide->image)}}">
            <div class="text">
                <h2>{{$slide->city.","}} {{$slide->street}}</h2>
                <p class="mb-2 small text-gray-600"><span class="property-icon icon-room"></span>{{$slide->district}} {{$slide->city.","}} {{$slide->zip}}</p>
                <p class="mb-2"><strong>₽ {{ number_format($slide->price, 0, '', ' ') }}</strong></p>
                <p class="mb-0"><a href="{{ route('property', $slide->id) }}" class="text-uppercase small letter-spacing-1 font-weight-bold">Подробнее</a>
                </p>
            </div>
        </div>
    @endforeach
</div>

