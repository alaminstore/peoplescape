<?php 
use App\Footer;
$data['footer'] = Footer::find(1);

?>
<footer>
    <div class="top-footer text-center">
        <div class="container">
            <div class="row">

                <div class="col-sm-12">
                    <div class="footer-widget-logo">
                        <img src="{{url($data['footer']->image)}}" alt="Market Scape Ltd">
                        <h4 class="text-uppercase">{{$data['footer']->title}}</h4>
                        <h5>{{$data['footer']->subtitle}}</h5>
                    </div>
                </div>
                <div class="col-sm-12">
                    <!--<div class="padding-zero">-->
                        <div class="footer-widget">
                            <h4><i class="fas fa-map-marked"></i></h4>
                            <p> {{$data['footer']->address}}</p>
                        </div>
                    <!--</div>-->
                    <!--<div class="col-sm-4 padding-zero">-->
                        <div class="footer-widget">
                            <h4><i class="fas fa-envelope"></i></h4>
                            <p>{{$data['footer']->email}}</p>
                        </div>
                    <!--</div>-->
                    <!--<div class="col-sm-4 padding-zero">-->
                        <div class="footer-widget">
                            <h4><i class="fas fa-phone"></i></h4>
                            <p>{{$data['footer']->phone}}</p>
                        </div>
                    <!--</div>-->
                </div>
                <div class="col-sm-12">
                    <div class="social-media">
                        <ul class="nav">
                            <li><a href="{{$data['footer']->fb_link}}" target="_blank" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                            <!--<li><a href="{{$data['footer']->ln_link}}" class="twitter"><i class="fab fa-twitter"></i></a></li>-->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <div class="bottom-footer text-center">
      <div class="container">
          <div class="row">
              <div class="col-sm-12">
              <p>© <a href="www.peoplescape.com">Peoplescape Ltd</a> 2019. All Rights Reserved. Developed by <a
                      href="www.weaverbd.com">Weaver Innovations Ltd</a></p></div>
          </div>
      </div>
  </div>
</footer>