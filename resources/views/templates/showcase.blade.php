@for($i = 0; $i<9; $i++)
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
@endfor
