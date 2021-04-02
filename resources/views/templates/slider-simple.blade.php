<div class="slider-control ">
    @foreach($images as $img)
        <div class="slider-cover bg-light" data-aos="fade">
            <img src="{{asset('uploads/'.$img->image)}}">
        </div>
    @endforeach
</div>
