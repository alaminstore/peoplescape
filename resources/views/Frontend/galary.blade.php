@extends('Frontend.frontmaster')
@section('gl','active')
@section('title', 'Peoplesscap | Galary ')
@section('frntcontent')
<section class="page-banner-area" style="background: url({{$data['contacthead']->image}}); background-repeat: no-repeat; background-position: center; background-size: cover; background-attachment: fixed;">
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <h2 class="page-banner-title">Image Gallery</h2>
            </div>
          </div>
        </div>
    </section>
    <style>
        
    </style>
    <section class="client-logo-area slider-area carousel slide" id="carouselExampleIndicators" data-ride="">
            <div class="container">
              <div class="row">
                <div class="col-sm-12">
                <h2 class="theme-title" style="margin-top: 50px; margin-bottom: 45px">Gallery <span class="title-img-style"><img src="{{asset('frontEnd/img/title-style.png')}}" alt=""></span></h2>
                </div>
                <div class="col-sm-12">
            
            <div class="carousel-inner" style="margin-bottom:30px" role="listbox">
                <!-- Slide One - Set the background image for this slide in the line below -->
                @foreach($data['slider'] as $slider)
                <div class="diprnt carousel-item <?php if($loop->index == 0) echo 'active' ?>" style="background-image: url({{$slider->image}})">
                        <div class="overlay">{{$slider->caption}}</div>
                    </div>
                @endforeach
            </div>
        
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
                </div>
        </div>
    </div>
</section>  
    
@endsection
