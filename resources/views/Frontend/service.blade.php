@extends('Frontend.frontmaster')

@section('srv','active')

@section('title', 'Peoplesscap | Services ')

@section('frntcontent')

<section class="page-banner-area" style="background: url({{$data['servicehead']->image}}); background-repeat: no-repeat; background-position: center; background-size: cover; background-attachment: fixed;">

    <div class="container">

        <div class="row">

            <div class="col-sm-12">

                <h2 class="page-banner-title">{{$data['servicehead']->title}}</h2>

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
                 @foreach($data['allservices'] as $service)
                    <div id="head" class="common-single-s-details">
                            <div class="single-s-details">
                                <div class="single-s-slider-wrapper">
                                    <div class="single-s-slider">
                                      
                                        <figure class="item">
                                            <img alt="Services" src="{{url($service->image)}}">
                                        </figure>
                                    </div>
                                </div>
                                <div class="single-s-content">
                                    <h4 style="padding: 0 10px;">{{$service->title}}</h4>
                                    <p style="height:auto !important;text-align:justify;padding:0 10px;">{{$service->description}}
                                    </p>
                                </div>
                            </div>
                        </div>
                @endforeach

            </div>

        </div>

    </div>

</section>
 <section class="call-to-action-area">

        <div class="container">

            <div class="row">

                <div class="col-sm-12">

                    <div class="call-to-content">

                        <h2>If You have any HR Queries,feel free to </h2>

                        <a href="{{route('contact-us.index')}}" class="common-button">Contact Us</a>

                    </div>

                </div>

            </div>

        </div>

    </section>
<!-- Services Details Area END -->





@endsection