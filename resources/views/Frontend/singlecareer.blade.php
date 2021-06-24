<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{str_limit(strip_tags($careerByid->topdescription),100)}}"/>
    <meta name="keywords" content=""/>
    <meta property="og:title" content="{{$careerByid->title}}"/>
    <meta property="og:site_name" content="peoplescapebd.net/"/>

    <meta property="og:description" content="{{str_limit(strip_tags($careerByid->topdescription),100)}}"/>

    <meta property="og:type" content="article"/>

    <meta property="article:publisher" content="https://www.facebook.com/peoplesscap"/>

    <meta property="og:url" content="http://peoplescapebd.net/careerdetails?id={{$careerByid->id}}"/>

    <meta property="og:image" content="http://peoplescapebd.net/frontEnd/img/logo.png"/>
    <title>PeopleScape|Career|{{$careerByid->title}}</title>
    <link rel="icon" type="image/png" href="{{asset('frontEnd/img/logo.png')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('frontEnd/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{asset('frontEnd/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- ====Animate css==== -->
    <link rel="stylesheet" href="{{asset('frontEnd/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontEnd/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontEnd/css/animate.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>


    <!-- Custom styles for this template -->
    <link href="{{asset('frontEnd/css/style.css')}}" rel="stylesheet">

</head>
@section('cr','active')
<body>
@include('Frontend.include.header')

<section class="page-banner-area"
         style="background: url({{asset('frontEnd/img/slider-img/sl11.jpg')}}); background-repeat: no-repeat; background-position: center; background-size: cover; background-attachment: fixed;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="page-banner-title">Job Details</h2>
            </div>
        </div>
    </div>
</section>
@php
    use App\Cvform;
@endphp
<section class="job-details-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="details-left">
                    <div class="details-widget">
                        <h4 class="text-uppercase">Job Description<span class="title-img-style"><img alt=""
                                                                                                     src="{{asset('frontEnd/img/title-style.png')}}"></span>
                        </h4>
                        <p class="content">{{$careerByid->topdescription}}</p>
                    </div>
                    <div class="details-widget">
                        <h4 class="text-uppercase">Job Responsibilities<span class="title-img-style"><img alt=""
                                                                                                          src="{{asset('frontEnd/img/title-style.png')}}"></span>
                        </h4>
                        <p class="content">{{$careerByid->responsibilitiestext}}</p>
                        @php
                            $points = json_decode($careerByid->responsibilitiespoint);
                        @endphp
                        <ul class="details-widget-list">
                            @foreach($points as $point)
                                <li><i class="far fa-dot-circle"></i> {{$point->responsibilitiespoint}}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="details-widget">
                        <h4 class="text-uppercase">Minimum qualifications<span class="title-img-style"><img alt=""
                                                                                                            src="{{asset('frontEnd/img/title-style.png')}}"></span>
                        </h4>
                        @php
                            $qualities = json_decode($careerByid->qualification);
                        @endphp
                        <ul class="details-widget-list">
                            @foreach($qualities as $quality)
                                <li><i class="far fa-dot-circle"></i> {{$quality->qualification}}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="details-widget">
                        <h4 class="text-uppercase">How To Apply<span class="title-img-style"><img alt=""
                                                                                                  src="{{asset('frontEnd/img/title-style.png')}}"></span>
                        </h4>
                        <p class="content">{{$careerByid->howtoapply}}</p>

                        @if(Auth::check())
                            <?php
                            $user = Auth::user();
                            $usercv_id = Cvform::where('userid', '=', $user->id)->first();
                            if($usercv_id){
                            $cv_id = $usercv_id->id;
                            ?>
                            <a href="#" data-userid="{{$user->id}}" data-cvid="{{ $usercv_id ? $cv_id : ''  }}"
                               data-jobid="{{$careerByid->id}}" class="common-button applyjob mb-3"><i
                                    class="fa fa-spinner fa-spin buttonloader" style="display:none"></i>Apply Now</a>
                            <?php }
                            else {?>
                            <a href="#" data-userid="{{$user->id}}" data-cvid="" data-jobid="{{$careerByid->id}}"
                               class="common-button applyjob mb-3"><i class="fa fa-spinner fa-spin buttonloader"
                                                                      style="display:none"></i>Apply Now</a>
                            <?php } ?>
                        @else
                            <a href="#" data-userid="" data-jobid="{{$careerByid->id}}" data-cvid=""
                               class="common-button applyjob mb-3"><i class="fa fa-spinner fa-spin buttonloader"
                                                                      style="display:none"></i>Apply Now</a>
                        @endif
                    </div>
                    <div class="details-widget">
                        <h4 class="text-uppercase">Location<span class="title-img-style"><img alt=""
                                                                                              src="{{asset('frontEnd/img/title-style.png')}}"></span>
                        </h4>

                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.0398598988877!2d90.41115131429754!3d23.781594893502362!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c79e4fc8cde3%3A0xb4a88b59925dc020!2sPeopleScape+Ltd.!5e0!3m2!1sen!2sbd!4v1561801126384!5m2!1sen!2sbd"
                            width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>

                    </div>
                    <style>
                        .jssocials-share-logo {
                            color: #fff;
                            /* font-size: .75em!important;
                            width: 0.85em!important; */
                        }

                        /* .jssocials-share {
                           margin: 0.3em 0.3em 0.3em 0!important;
                         }
                         .jssocials-shares * {
                           box-sizing: border-box;
                           width: 45px;
                           height: 25px;
                           } */
                    </style>

                    <div>
                        <h4 class="text-uppercase">Share this job<span class="title-img-style"><img alt=""
                                                                                                    src="{{asset('frontEnd/img/title-style.png')}}"></span>
                        </h4>
                        <div class="social-media job-social-share" id="shareIcons">
                            {{-- <ul class="nav">
                                <li><a href="" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="" class="twitter"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="" class="linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="" class="google-plus"><i class="fab fa-google-plus-g"></i></a></li>
                            </ul> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="details-right">
                    <h4>Job Overview</h4>

                    <div class="job-overview">
                        <h5 class="job-position-name">{{$careerByid->title}} ({{$careerByid->experience}})</h5>
                        <h6 class="company-name">{{$careerByid->company}}</h6>
                    </div>
                    <div class="job-overview-wrap">
                        <div class="job-overview-widget">
                            <i class="far fa-calendar-alt"></i>
                            <p>
                                <span
                                    class="overview-title"><strong>Posted :</strong> <?php $date = $careerByid->created_at; $post_date = date('j F Y', strtotime($date)); echo $post_date;?> </span>
                                <!-- <span class="overview-date">October 02, 2017</span> -->
                            </p>
                        </div>
                        <div class="job-overview-widget">
                            <i class="fas fa-map-marker-alt"></i>
                            <p>
                                <span
                                    class="overview-title"><strong>Location :</strong> {{$careerByid->location}}</span>
                                <!-- <span class="overview-date">Los Angeles Califonia PO, 455001</span> -->
                            </p>
                        </div>
                        <div class="job-overview-widget">
                            <i class="fas fa-hat-wizard"></i>
                            <p>
                                <span class="overview-title"><strong>Title :</strong> {{$careerByid->title}}</span>
                                <!-- <span class="overview-date">HTML Developer</span> -->
                            </p>
                        </div>

                        <div class="job-overview-widget">
                            <i class="far fa-money-bill-alt"></i>
                            <p>
                                <span class="overview-title"><strong>Salary :</strong> {{$careerByid->salary}}</span>
                            </p>
                        </div>
                        <div class="job-overview-widget">
                            <i class="fas fa-th-list"></i>
                            <p>
                                <span class="overview-title"><strong>Category :</strong> {{$careerByid->catname}}</span>
                                <!-- <span class="overview-date">Developer</span> -->
                            </p>
                        </div>
                        <div class="job-overview-widget">
                            <i class="far fa-handshake"></i>
                            <p>
                                <span
                                    class="overview-title"><strong>Experience :</strong> {{$careerByid->experience}}</span>
                                <!-- <span class="overview-date">1+ Years Experience</span> -->
                            </p>
                        </div>
                        <div class="job-overview-widget">
                            <i class="far fa-handshake"></i>
                            <p>
                                <span class="overview-title"><strong>Jobtype :</strong> {{$careerByid->jobtype}}</span>
                                <!-- <span class="overview-date">1+ Years Experience</span> -->
                            </p>
                        </div>
                    </div>

                <!-- @if(Auth::check())
                    <?php
                    $user = Auth::user();
                    $usercv_id = Cvform::where('userid', '=', $user->id)->first();
                    if($usercv_id){
                    $cv_id = $usercv_id->id;
                    ?>
                        <a href="#" data-userid="{{$user->id}}" data-cvid="{{ $usercv_id ? $cv_id : ''  }}"  data-jobid="{{$careerByid->id}}"  class="common-button applyjob"><i class="fa fa-spinner fa-spin buttonloader" style="display:none" ></i> Apply Now</a>
                           <?php }
                    else {?>
                        <a href="#" data-userid="{{$user->id}}" data-cvid=""  data-jobid="{{$careerByid->id}}"  class="common-button applyjob"><i class="fa fa-spinner fa-spin buttonloader" style="display:none"></i> Apply Now</a>
                           <?php } ?>
                @else
                    <a href="#" data-userid="" data-jobid="{{$careerByid->id}}" data-cvid="" class="common-button applyjob"><i class="fa fa-spinner fa-spin buttonloader" style="display:none"></i> Apply Now</a>
                       @endif -->
                </div>
            </div>
        </div>
    </div>
</section>

<section class="career-page-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <!--<h3 class="jobs-number-list">Jobs: (1-10 out of 1200)</h3>-->

                <h2 class="theme-title text-left">Related Jobs <span class="title-img-style"><img
                            src="{{asset('frontEnd/img/title-style.png')}}" alt=""></span></h2>

                @foreach ($categoryWisecareer as $item)
                    <div class="single-career-box">
                        <h4>{{$item->title}} <span>{{$item->company}}</span></h4>
                        <div class="career-sub-list">
                            <p><i class="fas fa-business-time"></i>Experience:<span>{{$item->experience}}</span></p>
                            <p><i class="fas fa-chair"></i>Vacancy:<span>{{$item->vacancy}}</span></p>
                            <p><i class="fas fa-graduation-cap"></i>Education :<span>{{$item->education}}</span></p>
                            <p><i class="fas fa-calendar-alt"></i>Deadline :<span>{{$item->deadline}}</span></p>
                        </div>

                        <p class="career-short-des">{{str_limit($item->topdescription, 200, '...')}}
                        </p>
                        <a href="{!!route('career.details',['id'=>$item->id])!!}" class="common-button">Read More</a>
                        <p class="posted-time">Posted 5 days ago</p>
                    </div>
                @endforeach




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

<section class="call-to-action-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="call-to-content">
                    <h2>{{$callact->description}}</h2>
                    <a href="#" class="common-button">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.min.js"></script>

<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css"/>

<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-flat.css"/>
<link type="text/css" rel="stylesheet"
      href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-classic.css"/>
<link type="text/css" rel="stylesheet"
      href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-minima.css"/>
<link type="text/css" rel="stylesheet"
      href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-plain.css"/>
<script>
    $("#shareIcons").jsSocials({
        showLabel: false,
        showCount: false,
        shares: ["twitter", "facebook", "linkedin"]
    });
</script>
<script>
    $(document).on('click', '.applyjob', function (e) {
        e.preventDefault();
        var userid = $(this).data('userid');
        var jobid = $(this).data('jobid');
        var cvid = $(this).data('cvid');
        if (userid == '') {
            toastr.options = {
                "debug": false,
                "positionClass": "toast-bottom-right",
                "onclick": null,
                "fadeIn": 300,
                "fadeOut": 1000,
                "timeOut": 5000,
                "extendedTimeOut": 1000
            };
            toastr.warning('You have to login first!');
        } else if (userid != '' && cvid == '') {
            // alert('You have to create a cv first!');
            Swal.fire({
                title: 'Did\'t create CV ?',
                text: "Please create your cv!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Go!',

            }).then(result => {

                if (result.value) {
                    $.ajax({
                        url: "{!!route('CV.usercv')!!}",
                        type: "get",
                        data: {},
                        success: function (data) {
                            window.location.href = '{{route("CV.createcvuser")}}';
                        }
                    });
                }
            })
        } else {
            $.ajax({
                url: "{!! route('applicant.apply') !!}",
                type: "get",
                data: {
                    userid: userid,
                    jobid: jobid,
                },
                beforeSend: function () {
                    // Show image container
                    $(".buttonloader").show();
                },
                success: function (data) {
                    console.log(data);
                    if (data == 'success') {
                        toastr.options = {
                            "debug": false,
                            "positionClass": "toast-bottom-right",
                            "onclick": null,
                            "fadeIn": 300,
                            "fadeOut": 1000,
                            "timeOut": 5000,
                            "extendedTimeOut": 1000
                        };
                        toastr.success('You have successfully applied for this job!');
                    } else {
                        toastr.options = {
                            "debug": false,
                            "positionClass": "toast-bottom-right",
                            "onclick": null,
                            "fadeIn": 300,
                            "fadeOut": 1000,
                            "timeOut": 5000,
                            "extendedTimeOut": 1000
                        };
                        toastr.warning('You have already applied for this job!');
                    }
                },
                complete: function (data) {
                    $(".buttonloader").hide();
                    //$("#searchform").trigger('reset');
                }

            });
        }

        //   alert(userid);
    })
</script>
@include('Frontend.include.footer')

<!-- Bootstrap core JavaScript -->

<!--<script src="vendor/jquery/jquery.slim.min.js"></script>-->
<script src="{{asset('frontEnd/vendor/jquery/jquery.proper.min.js')}}"></script>
<script src="{{asset('frontEnd/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

<!-- Plugin JavaScript -->
<script src="{{asset('frontEnd/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('frontEnd/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- =====jQuery Waypoints==== -->
<script src="{{asset('frontEnd/js/waypoints.min.js')}}"></script>
<script src="{{asset('frontEnd/js/jquery.counterup.min.js')}}"></script>

<!-- Custom scripts for this template -->
<script src="{{asset('frontEnd/js/active.js')}}"></script>

</body>

</html>
