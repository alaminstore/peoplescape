@extends('Frontend.frontmaster')
@section('rg','active')
@section('title', 'Peoplesscap | Recognitions ')
@section('frntcontent')
<section class="page-banner-area" style="background: url({{$data['recoghead']->image}}); background-repeat: no-repeat; background-position: center; background-size: cover; background-attachment: fixed;">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h2 class="page-banner-title">{{$data['recoghead']->title}}</h2>
        </div>
      </div>
    </div>
  </section>
  
  <section class="recognitions-page-area">
      <div class="container">
          <div class="row">
              <!--Start Single Recognitions Page Area-->
              @foreach($data['recog'] as $recog)
              <div class="col-sm-12">
                  <div class="recognitions-single-box">
                      <img src="{{url($recog->image)}}" alt="Recognitions">
  
                      <div class="recognitions-content-box">
                          <h4>{{$recog->title}}</h4>
                          <p>{{$recog->description}}
                          </p>
                      </div>
                  </div>
              </div>
              @endforeach
              <!--End Single Recognitions Page Area-->
              <!--Start Single Recognitions Page Area-->
              {{-- <div class="col-sm-12">
                  <div class="recognitions-single-box">
                      <img src="img/recognitions-img/1.jpg" alt="Recognitions">
  
                      <div class="recognitions-content-box">
                          <h4>Recognitions Title Here</h4>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda cumque eveniet minima obcaecati quod sapiente tenetur velit voluptates! Architecto culpa deserunt enim illo incidunt minus mollitia quibusdam ullam! Adipisci asperiores dolores fugit mollitia
                          </p>
                      </div>
                  </div>
              </div> --}}
              <!--End Single Recognitions Page Area-->
              <!--Start Single Recognitions Page Area-->
              {{-- <div class="col-sm-12">
                  <div class="recognitions-single-box">
                      <img src="img/recognitions-img/1.jpg" alt="Recognitions">
  
                      <div class="recognitions-content-box">
                          <h4>Recognitions Title Here</h4>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda cumque eveniet minima obcaecati quod sapiente tenetur velit voluptates! Architecto culpa deserunt enim illo incidunt minus mollitia quibusdam ullam! Adipisci asperiores dolores fugit mollitia
                          </p>
                      </div>
                  </div>
              </div> --}}
              <!--End Single Recognitions Page Area-->
              <!--Start Single Recognitions Page Area-->
              {{-- <div class="col-sm-12">
                  <div class="recognitions-single-box">
                      <img src="img/recognitions-img/1.jpg" alt="Recognitions">
  
                      <div class="recognitions-content-box">
                          <h4>Recognitions Title Here</h4>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda cumque eveniet minima obcaecati quod sapiente tenetur velit voluptates! Architecto culpa deserunt enim illo incidunt minus mollitia quibusdam ullam! Adipisci asperiores dolores fugit mollitia
                          </p>
                      </div>
                  </div>
              </div> --}}
              <!--End Single Recognitions Page Area-->
              <!--Start Single Recognitions Page Area-->
              {{-- <div class="col-sm-12">
                  <div class="recognitions-single-box">
                      <img src="img/recognitions-img/1.jpg" alt="Recognitions">
  
                      <div class="recognitions-content-box">
                          <h4>Recognitions Title Here</h4>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda cumque eveniet minima obcaecati quod sapiente tenetur velit voluptates! Architecto culpa deserunt enim illo incidunt minus mollitia quibusdam ullam! Adipisci asperiores dolores fugit mollitia
                          </p>
                      </div>
                  </div>
              </div> --}}
              <!--End Single Recognitions Page Area-->
          </div>
      </div>
  </section>

@endsection