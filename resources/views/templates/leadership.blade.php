<div class="site-section bg-light-gray">
    <div class="container">
        <div class="row mb-5 justify-content-center" data-aos="fade-up">
            <div class="col-md-7">
                <div class="site-section-title text-center">
                    <h2>{{ __('Ведущие специалисты') }}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($employees as $employee)
                <div class="col-md-6 col-lg-4 mb-5 mb-lg-5" data-aos="fade-up" data-aos-delay="200">
                    <div class="team-member p-4">

                        <img src="{{asset('uploads/employees/'.$employee->image)}}" alt="Image" class="img-fluid rounded mb-4">

                        <div class="text">

                            <h2 class="mb-2 font-weight-light text-black h4">{{$employee->surname}} {{$employee->name}} {{$employee->patronymic}}</h2>
                            <span class="d-block mb-3 text-white-opacity-05">{{$employee->post}}</span>
                            <p>{{$employee->desc}}</p>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
