<div class="site-section border-top bg-light">
    <div class="container">
        <div class="row mb-5 justify-content-center" data-aos="fade-up">
            <div class="col-md-7">
                <div class="site-section-title text-center">
                    <h2>{{ __('Ведущие специалисты') }}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @for($i=0;$i<6;$i++)
                <div class="col-md-6 col-lg-4 mb-5 mb-lg-5" data-aos="fade-up" data-aos-delay="200">
                    <div class="team-member p-4">

                        <img src="images/person_1.jpg" alt="Image" class="img-fluid rounded mb-4">

                        <div class="text">

                            <h2 class="mb-2 font-weight-light text-black h4">Megan Smith</h2>
                            <span class="d-block mb-3 text-white-opacity-05">Real Estate Agent</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi dolorem totam non quis
                                facere blanditiis praesentium est. Totam atque corporis nisi, veniam non. Tempore
                                cupiditate, vitae minus obcaecati provident beatae!</p>
                            <p>
                                <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                                <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                                <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
                            </p>
                        </div>

                    </div>
                </div>
            @endfor
        </div>
    </div>
</div>
