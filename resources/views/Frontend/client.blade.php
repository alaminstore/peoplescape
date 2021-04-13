@extends('Frontend.frontmaster')
@section('cl','active')
@section('title', 'Peoplesscap | Client ')
@section('frntcontent')
<section class="page-banner-area" style="background: url({{$data['clienthead']->image}}); background-repeat: no-repeat; background-position: center; background-size: cover; background-attachment: fixed;">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h2 class="page-banner-title">{{$data['clienthead']->title}}</h2>
        </div>
      </div>
    </div>
  </section>
  
  <section class="client-logo-area">
      <div class="container">
          <div class="row">
              <div class="col-sm-12">
              <h2 class="theme-title">{{$data['clienttop']->title}} <span class="title-img-style"><img src="{{asset('frontEnd/img/title-style.png')}}" alt=""></span></h2>
              <!--<p class="theme-para">{{$data['clienttop']->description}}</p>-->
              </div>
              <div class="col-sm-12 text-center">
                  @foreach( $data['clients'] as $client)
                  <div class="client-logo">
                      <a href="#"><img src="{{url($client->image)}}" alt="GP"></a>
                  </div>
                  @endforeach
                  {{-- <div class="client-logo">
                      <a href=""><img src="img/client-logo/grameenphone-logo-6C1403D0AB-seeklogo.com.png" alt="GP"></a>
                  </div>
                  <div class="client-logo">
                      <a href=""><img src="img/client-logo/grameenphone-logo-6C1403D0AB-seeklogo.com.png" alt="GP"></a>
                  </div>
                  <div class="client-logo">
                      <a href=""><img src="img/client-logo/grameenphone-logo-6C1403D0AB-seeklogo.com.png" alt="GP"></a>
                  </div>
                  <div class="client-logo">
                      <a href=""><img src="img/client-logo/grameenphone-logo-6C1403D0AB-seeklogo.com.png" alt="GP"></a>
                  </div>
                  <div class="client-logo">
                      <a href=""><img src="img/client-logo/grameenphone-logo-6C1403D0AB-seeklogo.com.png" alt="GP"></a>
                  </div>
                  <div class="client-logo">
                      <a href=""><img src="img/client-logo/grameenphone-logo-6C1403D0AB-seeklogo.com.png" alt="GP"></a>
                  </div>
                  <div class="client-logo">
                      <a href=""><img src="img/client-logo/grameenphone-logo-6C1403D0AB-seeklogo.com.png" alt="GP"></a>
                  </div>
                  <div class="client-logo">
                      <a href=""><img src="img/client-logo/grameenphone-logo-6C1403D0AB-seeklogo.com.png" alt="GP"></a>
                  </div>
                  <div class="client-logo">
                      <a href=""><img src="img/client-logo/grameenphone-logo-6C1403D0AB-seeklogo.com.png" alt="GP"></a>
                  </div>
                  <div class="client-logo">
                      <a href=""><img src="img/client-logo/grameenphone-logo-6C1403D0AB-seeklogo.com.png" alt="GP"></a>
                  </div>
                  <div class="client-logo">
                      <a href=""><img src="img/client-logo/grameenphone-logo-6C1403D0AB-seeklogo.com.png" alt="GP"></a>
                  </div>
                  <div class="client-logo">
                      <a href=""><img src="img/client-logo/grameenphone-logo-6C1403D0AB-seeklogo.com.png" alt="GP"></a>
                  </div>
                  <div class="client-logo">
                      <a href=""><img src="img/client-logo/grameenphone-logo-6C1403D0AB-seeklogo.com.png" alt="GP"></a>
                  </div>
                  <div class="client-logo">
                      <a href=""><img src="img/client-logo/grameenphone-logo-6C1403D0AB-seeklogo.com.png" alt="GP"></a>
                  </div> --}}
              </div>
          </div>
      </div>
  </section>
@endsection