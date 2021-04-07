@extends('Frontend.frontmaster')

@section('cr','active')

@section('title', 'Peoplesscap | Career ')

@section('frntcontent')

<section class="page-banner-area" style="background: url({{$data['careerhead']->image}}); background-repeat: no-repeat; background-position: center; background-size: cover; background-attachment: fixed;">

    <div class="container">

      <div class="row">

        <div class="col-sm-12">

          <h2 class="page-banner-title">{{$data['careerhead']->title}}</h2>

        </div>

      </div>

    </div>

  </section>

   @php

   
    use Carbon\Carbon;

  @endphp 

  <section class="career-page-area">

      <div class="container">

          <div class="row">

              <div class="col-sm-12">

  

              <h3 class="jobs-number-list">Jobs: ({{$jobDetail->firstItem()}} - {{$jobDetail->lastItem()}} out of {{$jobDetail->total()}})</h3>

  

                  <!--Single Job Post Start-->

                  @foreach ($jobDetail as $item)

                  <div class="single-career-box">

                      <h4>{{$item->title}} <span>{{$item->company}}</span> </h4>

                      <div class="career-sub-list">

                          <p><i class="fas fa-business-time"></i>Experience:<span>{{$item->experience}}</span></p>

                          <p><i class="fas fa-chair"></i>Vacancy:<span>{{$item->vacancy}}</span></p>

                          <p><i class="fas fa-graduation-cap"></i>Education :<span>{{$item->education}}</span></p>

                          <p><i class="fas fa-calendar-alt"></i>Deadline :<span>{{$item->deadline}}</span></p>

                      </div>

  

                      <p class="career-short-des">{{str_limit($item->topdescription, 200, '...')}}

                      </p>

                    <a href="{!!route('career.details',['id'=>$item->id])!!}" class="common-button">Read More</a>

                      <p class="posted-time">

                      <?php

                       $date = Carbon::parse($item->created_at);

                            $dat_pro =  $date->diffForHumans(Carbon::now());

                           echo $dat_pro;

                         ?>

                         

                        </p>

                  </div>

                  @endforeach

                  {{$jobDetail->links()}}



  

                  {{-- <ul class="pagination">

                      <li class="page-item disabled"><span class="page-link"><i class="fas fa-angle-double-left"></i></span> </li>

                      <li class="page-item"><a class="page-link" href="#">1</a></li>

                      <li class="page-item active"><span class="page-link">2<span class="sr-only">(current)</span> </span></li>

                      <li class="page-item"><a class="page-link" href="#">3</a></li>

                      <li class="page-item"><a class="page-link" href="#">4</a></li>

                      <li class="page-item"><a class="page-link" href="#">5</a></li>

                      <li class="page-item"><a class="page-link" href="#">6</a></li>

                      <li class="page-item"><a class="page-link" href="#">7</a></li>

                      <li class="page-item"><a class="page-link" href="#">8</a></li>

                      <li class="page-item"><a class="page-link" href="#">9</a></li>

                      <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-double-right"></i></a></li>

                  </ul> --}}

  

              </div>

          </div>

      </div>

  </section>

  

@endsection