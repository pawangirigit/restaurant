<div id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="left-content">
                        <div class="inner-content">
                            <h4>KlassyCafe</h4>
                            <h6>THE BEST EXPERIENCE</h6>
                            <div class="main-white-button scroll-to-section">
                                <a href="#reservation">Make A Reservation</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="main-banner header-text">
                        <div class="Modern-Slider">
                          <!-- Item -->
                          @foreach($banner as $k=>$v)
                          <div class="item">
                            <div class="img-fill">
                            <img src="{{asset('banner/'.$v->image)}}"  alt="">
                            </div>
                          </div>
                          @endforeach
                          <!-- // Item -->  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>