<!DOCTYPE html>
<html lang="en">
  <head>
    <title>HomeSpace &mdash; Colorlib Website Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  </head>
  <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
              <a class="navbar-brand" href="#">Navbar</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="#">Home</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="#">Link</a>
                      </li>
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Dropdown
                          </a>
                          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <li><a class="dropdown-item" href="#">Action</a></li>
                              <li><a class="dropdown-item" href="#">Another action</a></li>
                              <li><hr class="dropdown-divider"></li>
                              <li><a class="dropdown-item" href="#">Something else here</a></li>
                          </ul>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                      </li>
                  </ul>
                  <form class="d-flex">
                      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                      <button class="btn btn-outline-success" type="submit">Search</button>
                  </form>
              </div>
          </div>
      </nav>
  </header>
  <body>
{{--    <div class="site-navbar">--}}
{{--        <div class="container py-1">--}}
{{--          <div class="row align-items-center">--}}
{{--            <div class="col-8 col-md-8 col-lg-4">--}}
{{--              <h1 class=""><a href="tets.blade.php" class="h5 text-uppercase text-black"><strong>HomeSpace<span class="text-danger">.</span></strong></a></h1>--}}
{{--            </div>--}}
{{--            <div class="col-4 col-md-4 col-lg-8">--}}
{{--              <nav class="site-navigation text-right text-md-right" role="navigation">--}}

{{--                <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>--}}

{{--                <ul class="site-menu js-clone-nav d-none d-lg-block">--}}
{{--                  <li class="active">--}}
{{--                    <a href="tets.blade.php">Home</a>--}}
{{--                  </li>--}}
{{--                  <li class="has-children">--}}
{{--                    <a href="#">Properties</a>--}}
{{--                    <ul class="dropdown">--}}
{{--                      <li><a href="#">Buy</a></li>--}}
{{--                      <li><a href="#">Rent</a></li>--}}
{{--                      <li><a href="#">Lease</a></li>--}}
{{--                      <li class="has-children">--}}
{{--                        <a href="#">Menu</a>--}}
{{--                        <ul class="dropdown">--}}
{{--                          <li><a href="#">Menu One</a></li>--}}
{{--                          <li><a href="#">Menu Two</a></li>--}}
{{--                          <li><a href="#">Menu Three</a></li>--}}
{{--                        </ul>--}}
{{--                      </li>--}}
{{--                    </ul>--}}
{{--                  </li>--}}
{{--                  <li><a href="blog.html">Blog</a></li>--}}
{{--                  <li><a href="about.html">About</a></li>--}}
{{--                  <li><a href="contact.html">Contact</a></li>--}}
{{--                </ul>--}}
{{--              </nav>--}}
{{--            </div>--}}


{{--          </div>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}

    <div class="slide-one-item home-slider owl-carousel">

      <div class="site-blocks-cover" style="background-image: url(images/hero_bg_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">

        <div class="text">
          <h2>853 S Lucerne Blvd</h2>
          <p class="location"><span class="property-icon icon-room"></span> Los Angeles, CA 90005</p>
          <p class="mb-2"><strong>$2,250,500</strong></p>


          <p class="mb-0"><a href="#" class="text-uppercase small letter-spacing-1 font-weight-bold">More Details</a></p>

        </div>
      </div>

      <div class="site-blocks-cover" style="background-image: url(images/hero_bg_3.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">

        <div class="text">
          <h2>625 S. Berendo St</h2>
          <p class="location"><span class="property-icon icon-room"></span>607 Los Angeles, CA 90005</p>
          <p class="mb-2"><strong>$2,250,500</strong></p>


          <p class="mb-0"><a href="#" class="text-uppercase small letter-spacing-1 font-weight-bold">More Details</a></p>

        </div>

      </div>

    </div>

    <div class="py-5">
      <div class="container">
        <form class="row mb-5">

          <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="select-wrap">
              <span class="icon icon-arrow_drop_down"></span>
              <select name="offer-types" id="offer-types" class="form-control d-block rounded-0">
                <option value="">Lot Area</option>
                <option value="1000">1000</option>
                <option value="800">800</option>
                <option value="600">600</option>
                <option value="400">400</option>
                <option value="200">200</option>
                <option value="100">100</option>
              </select>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="select-wrap">
              <span class="icon icon-arrow_drop_down"></span>
              <select name="offer-types" id="offer-types" class="form-control d-block rounded-0">
                <option value="">Property Status</option>
                <option value="For Sale">For Sale</option>
                <option value="For Rent">For Rent</option>
              </select>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="select-wrap">
              <span class="icon icon-arrow_drop_down"></span>
              <select name="offer-types" id="offer-types" class="form-control d-block rounded-0">
                <option value="">Location</option>
                <option value="United States">United States</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="Canada">Canada</option>
                <option value="Belgium">Belgium</option>
              </select>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="select-wrap">
              <span class="icon icon-arrow_drop_down"></span>
              <select name="offer-types" id="offer-types" class="form-control d-block rounded-0">
                <option value="">Lot Area</option>
                <option value="1000">1000</option>
                <option value="800">800</option>
                <option value="600">600</option>
                <option value="400">400</option>
                <option value="200">200</option>
                <option value="100">100</option>
              </select>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="select-wrap">
              <span class="icon icon-arrow_drop_down"></span>
              <select name="offer-types" id="offer-types" class="form-control d-block rounded-0">
                <option value="">Bedrooms</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5+">5+</option>
              </select>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="select-wrap">
              <span class="icon icon-arrow_drop_down"></span>
              <select name="offer-types" id="offer-types" class="form-control d-block rounded-0">
                <option value="">Bathrooms</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5+">5+</option>
              </select>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="mb-4">
              <div id="slider-range" class="border-primary"></div>
              <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white" disabled="" />
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <input type="submit" class="btn btn-primary btn-block form-control-same-height rounded-0" value="Search">
          </div>

        </form>

        <div class="row">
          <div class="col-md-6 col-lg-4 mb-3 mb-lg-0">
            <div class="feature d-flex align-items-start">
              <span class="icon mr-3 flaticon-house"></span>
              <div class="text">
                <h2 class="mt-0">Wide Range of Properties</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit rem sint debitis porro quae dolorum neque.</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-3 mb-lg-0">
            <div class="feature d-flex align-items-start">
              <span class="icon mr-3 flaticon-rent"></span>
              <div class="text">
                <h2 class="mt-0">Rent or Sale</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit rem sint debitis porro quae dolorum neque.</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-3 mb-lg-0">
            <div class="feature d-flex align-items-start">
              <span class="icon mr-3 flaticon-location"></span>
              <div class="text">
                <h2 class="mt-0">Property Location</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit rem sint debitis porro quae dolorum neque.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="site-section site-section-sm bg-light">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12">
            <div class="site-section-title">
              <h2>New Properties for You</h2>
            </div>
          </div>
        </div>
        <div class="row mb-5">
          <div class="col-md-6 col-lg-4 mb-4">
            <a href="property-details.html" class="prop-entry d-block">
              <figure>
                <img src="images/img_1.jpg" alt="Image" class="img-fluid">
              </figure>
              <div class="prop-text">
                <div class="inner">
                  <span class="price rounded">$1,930,000</span>
                  <h3 class="title">853 S Lucerne Blvd</h3>
                  <p class="location">Los Angeles, CA 90005</p>
                </div>
                <div class="prop-more-info">
                  <div class="inner d-flex">
                    <div class="col">
                      <span>Area:</span>
                      <strong>240m<sup>2</sup></strong>
                    </div>
                    <div class="col">
                      <span>Beds:</span>
                      <strong>2</strong>
                    </div>
                    <div class="col">
                      <span>Baths:</span>
                      <strong>2</strong>
                    </div>
                    <div class="col">
                      <span>Garages:</span>
                      <strong>1</strong>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-md-6 col-lg-4 mb-4">
            <a href="property-details.html" class="prop-entry d-block">
              <figure>
                <img src="images/img_2.jpg" alt="Image" class="img-fluid">
              </figure>
              <div class="prop-text">
                <div class="inner">
                  <span class="price rounded">$2,438,000</span>
                  <h3 class="title">853 S Lucerne Blvd</h3>
                  <p class="location">Los Angeles, CA 90005</p>
                </div>
                <div class="prop-more-info">
                  <div class="inner d-flex">
                    <div class="col">
                      <span>Area:</span>
                      <strong>240m<sup>2</sup></strong>
                    </div>
                    <div class="col">
                      <span>Beds:</span>
                      <strong>2</strong>
                    </div>
                    <div class="col">
                      <span>Baths:</span>
                      <strong>2</strong>
                    </div>
                    <div class="col">
                      <span>Garages:</span>
                      <strong>1</strong>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-md-6 col-lg-4 mb-4">
            <a href="property-details.html" class="prop-entry d-block">
              <figure>
                <img src="images/img_3.jpg" alt="Image" class="img-fluid">
              </figure>
              <div class="prop-text">
                <div class="inner">
                  <span class="price rounded">$5,320,000</span>
                  <h3 class="title">853 S Lucerne Blvd</h3>
                  <p class="location">Los Angeles, CA 90005</p>
                </div>
                <div class="prop-more-info">
                  <div class="inner d-flex">
                    <div class="col">
                      <span>Area:</span>
                      <strong>240m<sup>2</sup></strong>
                    </div>
                    <div class="col">
                      <span>Beds:</span>
                      <strong>2</strong>
                    </div>
                    <div class="col">
                      <span>Baths:</span>
                      <strong>2</strong>
                    </div>
                    <div class="col">
                      <span>Garages:</span>
                      <strong>1</strong>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>

          <div class="col-md-6 col-lg-4 mb-4">
            <a href="property-details.html" class="prop-entry d-block">
              <figure>
                <img src="images/img_4.jpg" alt="Image" class="img-fluid">
              </figure>
              <div class="prop-text">
                <div class="inner">
                  <span class="price rounded">$2,350,000</span>
                  <h3 class="title">853 S Lucerne Blvd</h3>
                  <p class="location">Los Angeles, CA 90005</p>
                </div>
                <div class="prop-more-info">
                  <div class="inner d-flex">
                    <div class="col">
                      <span>Area:</span>
                      <strong>240m<sup>2</sup></strong>
                    </div>
                    <div class="col">
                      <span>Beds:</span>
                      <strong>2</strong>
                    </div>
                    <div class="col">
                      <span>Baths:</span>
                      <strong>2</strong>
                    </div>
                    <div class="col">
                      <span>Garages:</span>
                      <strong>1</strong>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-md-6 col-lg-4 mb-4">
            <a href="property-details.html" class="prop-entry d-block">
              <figure>
                <img src="images/img_5.jpg" alt="Image" class="img-fluid">
              </figure>
              <div class="prop-text">
                <div class="inner">
                  <span class="price rounded">$1,550,000</span>
                  <h3 class="title">853 S Lucerne Blvd</h3>
                  <p class="location">Los Angeles, CA 90005</p>
                </div>
                <div class="prop-more-info">
                  <div class="inner d-flex">
                    <div class="col">
                      <span>Area:</span>
                      <strong>240m<sup>2</sup></strong>
                    </div>
                    <div class="col">
                      <span>Beds:</span>
                      <strong>2</strong>
                    </div>
                    <div class="col">
                      <span>Baths:</span>
                      <strong>2</strong>
                    </div>
                    <div class="col">
                      <span>Garages:</span>
                      <strong>1</strong>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-md-6 col-lg-4 mb-4">
            <a href="property-details.html" class="prop-entry d-block">
              <figure>
                <img src="images/img_6.jpg" alt="Image" class="img-fluid">
              </figure>
              <div class="prop-text">
                <div class="inner">
                  <span class="price rounded">$4,291,000</span>
                  <h3 class="title">853 S Lucerne Blvd</h3>
                  <p class="location">Los Angeles, CA 90005</p>
                </div>
                <div class="prop-more-info">
                  <div class="inner d-flex">
                    <div class="col">
                      <span>Area:</span>
                      <strong>240m<sup>2</sup></strong>
                    </div>
                    <div class="col">
                      <span>Beds:</span>
                      <strong>2</strong>
                    </div>
                    <div class="col">
                      <span>Baths:</span>
                      <strong>2</strong>
                    </div>
                    <div class="col">
                      <span>Garages:</span>
                      <strong>1</strong>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>

        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            <div class="site-pagination">
              <a href="#" class="active">1</a>
              <a href="#">2</a>
              <a href="#">3</a>
              <a href="#">4</a>
              <a href="#">5</a>
              <span>...</span>
              <a href="#">10</a>
            </div>
          </div>
        </div>

      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 text-center mb-5">
            <div class="site-section-title">
              <h2>Our Services</h2>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-4 mb-4">
            <a href="#" class="service text-center border rounded">
              <span class="icon flaticon-house"></span>
              <h2 class="service-heading">Research Subburbs</h2>
              <p><span class="read-more">Learn More</span></p>
            </a>
          </div>
          <div class="col-md-6 col-lg-4 mb-4">
            <a href="#" class="service text-center border rounded">
              <span class="icon flaticon-sold"></span>
              <h2 class="service-heading">Sold Houses</h2>
              <p><span class="read-more">Learn More</span></p>
            </a>
          </div>
          <div class="col-md-6 col-lg-4 mb-4">
            <a href="#" class="service text-center border rounded">
              <span class="icon flaticon-camera"></span>
              <h2 class="service-heading">Security Priority</h2>
              <p><span class="read-more">Learn More</span></p>
            </a>
          </div>

          <div class="col-md-6 col-lg-4 mb-4">
            <a href="#" class="service text-center border rounded">
              <span class="icon flaticon-house"></span>
              <h2 class="service-heading">Research Subburbs</h2>
              <p><span class="read-more">Learn More</span></p>
            </a>
          </div>
          <div class="col-md-6 col-lg-4 mb-4">
            <a href="#" class="service text-center border rounded">
              <span class="icon flaticon-sold"></span>
              <h2 class="service-heading">Sold Houses</h2>
              <p><span class="read-more">Learn More</span></p>
            </a>
          </div>
          <div class="col-md-6 col-lg-4 mb-4">
            <a href="#" class="service text-center border rounded">
              <span class="icon flaticon-camera"></span>
              <h2 class="service-heading">Security Priority</h2>
              <p><span class="read-more">Learn More</span></p>
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center">
            <div class="site-section-title">
              <h2>Our Blog</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="100">
            <a href="#"><img src="images/img_4.jpg" alt="Image" class="img-fluid"></a>
            <div class="p-4 bg-white">
              <span class="d-block text-secondary small text-uppercase">Jan 20th, 2019</span>
              <h2 class="h5 text-black mb-3"><a href="#">When To Sell &amp; How Much To Sell?</a></h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias enim, ipsa exercitationem veniam quae sunt.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="200">
            <a href="#"><img src="images/img_2.jpg" alt="Image" class="img-fluid"></a>
            <div class="p-4 bg-white">
              <span class="d-block text-secondary small text-uppercase">Jan 20th, 2019</span>
              <h2 class="h5 text-black mb-3"><a href="#">When To Sell &amp; How Much To Sell?</a></h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias enim, ipsa exercitationem veniam quae sunt.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="300">
            <a href="#"><img src="images/img_3.jpg" alt="Image" class="img-fluid"></a>
            <div class="p-4 bg-white">
              <span class="d-block text-secondary small text-uppercase">Jan 20th, 2019</span>
              <h2 class="h5 text-black mb-3"><a href="#">When To Sell &amp; How Much To Sell?</a></h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias enim, ipsa exercitationem veniam quae sunt.</p>
            </div>
          </div>

        </div>

      </div>
    </div>


    <div class="site-section">
    <div class="container">
      <div class="row mb-5 justify-content-center">
        <div class="col-md-7">
          <div class="site-section-title text-center">
            <h2>Our Agents</h2>
          </div>
        </div>
      </div>
      <div class="row block-13">

        <div class="nonloop-block-13 owl-carousel">

          <div class="slide-item">
            <div class="team-member text-center">
              <img src="images/person_1.jpg" alt="Image" class="img-fluid mb-4 w-50 rounded-circle mx-auto">
              <div class="text p-3">
                <h2 class="mb-2 font-weight-light text-black h4">Megan Smith</h2>
                <span class="d-block mb-3 text-white-opacity-05">Real Estate Agent</span>
                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi dolorem totam non quis facere blanditiis praesentium est. </p>
                <p>
                  <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
                </p>
              </div>
            </div>
          </div>

          <div class="slide-item">
            <div class="team-member text-center">
              <img src="images/person_2.jpg" alt="Image" class="img-fluid mb-4 w-50 rounded-circle mx-auto">
              <div class="text p-3">
                <h2 class="mb-2 font-weight-light text-black h4">Brooke Cagle</h2>
                <span class="d-block mb-3 text-white-opacity-05">Real Estate Agent</span>
                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi dolorem totam non quis facere blanditiis praesentium est. </p>
                <p>
                  <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
                </p>
              </div>
            </div>
          </div>

          <div class="slide-item">
            <div class="team-member text-center">
              <img src="images/person_3.jpg" alt="Image" class="img-fluid mb-4 w-50 rounded-circle mx-auto">
              <div class="text p-3">
                <h2 class="mb-2 font-weight-light text-black h4">Philip Martin</h2>
                <span class="d-block mb-3 text-white-opacity-05">Real Estate Agent</span>
                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi dolorem totam non quis facere blanditiis praesentium est. </p>
                <p>
                  <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
                </p>
              </div>
            </div>
          </div>

          <div class="slide-item">
            <div class="team-member text-center">
              <img src="images/person_1.jpg" alt="Image" class="img-fluid mb-4 w-50 rounded-circle mx-auto">
              <div class="text p-3">
                <h2 class="mb-2 font-weight-light text-black h4">Megan Smith</h2>
                <span class="d-block mb-3 text-white-opacity-05">Real Estate Agent</span>
                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi dolorem totam non quis facere blanditiis praesentium est. </p>
                <p>
                  <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
                </p>
              </div>
            </div>
          </div>

          <div class="slide-item">
            <div class="team-member text-center">
              <img src="images/person_2.jpg" alt="Image" class="img-fluid mb-4 w-50 rounded-circle mx-auto">
              <div class="text p-3">
                <h2 class="mb-2 font-weight-light text-black h4">Brooke Cagle</h2>
                <span class="d-block mb-3 text-white-opacity-05">Real Estate Agent</span>
                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi dolorem totam non quis facere blanditiis praesentium est. </p>
                <p>
                  <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
                </p>
              </div>
            </div>
          </div>

          <div class="slide-item">
            <div class="team-member text-center">
              <img src="images/person_3.jpg" alt="Image" class="img-fluid mb-4 w-50 rounded-circle mx-auto">
              <div class="text p-3">
                <h2 class="mb-2 font-weight-light text-black h4">Philip Martin</h2>
                <span class="d-block mb-3 text-white-opacity-05">Real Estate Agent</span>
                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi dolorem totam non quis facere blanditiis praesentium est. </p>
                <p>
                  <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
                </p>
              </div>
            </div>
          </div>

          <div class="slide-item">
            <div class="team-member text-center">
              <img src="images/person_1.jpg" alt="Image" class="img-fluid mb-4 w-50 rounded-circle mx-auto">
              <div class="text p-3">
                <h2 class="mb-2 font-weight-light text-black h4">Megan Smith</h2>
                <span class="d-block mb-3 text-white-opacity-05">Real Estate Agent</span>
                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi dolorem totam non quis facere blanditiis praesentium est. </p>
                <p>
                  <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
                </p>
              </div>
            </div>
          </div>

          <div class="slide-item">
            <div class="team-member text-center">
              <img src="images/person_2.jpg" alt="Image" class="img-fluid mb-4 w-50 rounded-circle mx-auto">
              <div class="text p-3">
                <h2 class="mb-2 font-weight-light text-black h4">Brooke Cagle</h2>
                <span class="d-block mb-3 text-white-opacity-05">Real Estate Agent</span>
                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi dolorem totam non quis facere blanditiis praesentium est. </p>
                <p>
                  <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
                </p>
              </div>
            </div>
          </div>

          <div class="slide-item">
            <div class="team-member text-center">
              <img src="images/person_3.jpg" alt="Image" class="img-fluid mb-4 w-50 rounded-circle mx-auto">
              <div class="text p-3">
                <h2 class="mb-2 font-weight-light text-black h4">Philip Martin</h2>
                <span class="d-block mb-3 text-white-opacity-05">Real Estate Agent</span>
                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi dolorem totam non quis facere blanditiis praesentium est. </p>
                <p>
                  <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
                </p>
              </div>
            </div>
          </div>

        </div>

      </div>
      </div>
    </div>

    <div class="site-section site-section-sm bg-primary">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-8">
            <h2 class="text-white">Wide Range of Properties Just For You</h2>
            <p class="lead text-white-5">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
          </div>
          <div class="col-md-4 text-center">
            <a href="#" class="btn btn-outline-primary btn-block py-3 btn-lg">See Properties</a>
          </div>
        </div>
      </div>
    </div>


    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="mb-5">
              <h3 class="footer-heading mb-4">About HomeSpace</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe pariatur reprehenderit vero atque, consequatur id ratione, et non dignissimos culpa? Ut veritatis, quos illum totam quis blanditiis, minima minus odio!</p>
            </div>



          </div>
          <div class="col-lg-4 mb-5 mb-lg-0">
            <div class="row mb-5">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Navigations</h3>
              </div>
              <div class="col-md-6 col-lg-6">
                <ul class="list-unstyled">
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Buy</a></li>
                  <li><a href="#">Rent</a></li>
                  <li><a href="#">Properties</a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-6">
                <ul class="list-unstyled">
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Privacy Policy</a></li>
                  <li><a href="#">Contact Us</a></li>
                  <li><a href="#">Terms</a></li>
                </ul>
              </div>
            </div>


          </div>

          <div class="col-lg-4 mb-5 mb-lg-0">
            <h3 class="footer-heading mb-4">Follow Us</h3>

                <div>
                  <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                  <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                  <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                  <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
                </div>



          </div>

        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
          </div>

        </div>
      </div>
    </footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>  </body>
</html>
