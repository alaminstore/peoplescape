@extends('Frontend.frontmaster')
@section('srv','active')
@section('title', 'Peoplesscap | '.$data['detailservice']->title)
@section('frntcontent')
<section class="page-banner-area" style="background: url({{'/'.$data['servicehead']->image}}); background-repeat: no-repeat; background-position: center; background-size: cover; background-attachment: fixed;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="page-banner-title">{{$data['detailservice']->title}}</h2>
            </div>
        </div>
    </div>
</section>

<!-- Services Details Area START -->
<section class="services-details-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="theme-title">{{ $data['servicetop']->title}} <span class="title-img-style"><img src="{{asset('frontEnd/img/title-style.png')}}" alt=""></span></h2>
                <p class="theme-para">{{ $data['servicetop']->description}} </p>
            </div>
            
            <div class="col-sm-12 all-s-details">
                <div id="head" class="common-single-s-details">
                    <div class="single-s-details">
                        <div class="single-s-slider-wrapper">
                            <div class="single-s-slider">
                                <!-- Wrapper for slides -->
                                <figure class="item">
                                    <img alt="Services" src="{{url($data['detailservice']->image)}}">
                                </figure>
                            </div>
                        </div>
                        <div class="single-s-content">
                            <h4 style="padding: 0 10px">{{$data['detailservice']->title}}</h4>
                            <p style="height:auto !important;text-align: justify;padding:0 10px;">{{$data['detailservice']->description}}
                            </p>
                        </div>
                    </div>
                </div>
                </div>
        </div>
    </div>
</section>

@endsection