<div class="top-nav">

    <div class="container">

        <div class="row">

            <div class="col-sm-8">

                <!--<ul class="left-top-menu">-->

                <!--    <li><a href="#"><span><i class="fas fa-map-marked"></i>Address</span>  HOUSE-8, ROAD-23/C, GULSHAN-1, DHAKA-1212</a></li>-->

                <!--    <li><a href="#"><span><i class="fas fa-envelope"></i>Email</span>info@peoplescapebd.net</a></li>-->

                <!--    <li><a href="#"><span><i class="fas fa-phone"></i>Contact</span>+8801713254887</a></li>-->

                <!--</ul>-->

            </div>

            <div class="col-sm-4">

                <ul class="right-top-menu">

                    <!--<li><a href="#" class="btn" data-toggle="modal" data-target="#myModal"><i class="fas fa-edit"></i>Sign UP</a></li>-->

                     <li><a a href="{{route('CV.createcv')}}" class="btn" ><i class="fas fa-edit"></i>Create CV</a></li>

                     @if(Auth::user())

                     <!-- <div class="pull-right">

                        <form method="POST" action="{{route('logout')}}">

                          @csrf

                          <li><button class="btn"><i class="fas fa-user"></i> Log Out </button></li>



                          {{-- <button class="btn btn-default btn-flat"> Sign Out </button> --}}

                        </form>

                      </div> -->

                        <li><a href="#" class="btn"></i></a></li>

                      @else

                      <li><a href="#" class="btn" data-toggle="modal" data-target="#myModal2"><i class="fas fa-user"></i>Login</a></li>

                      @endif







                    <!-- Modal for first time Start -->

                    <div id="myModal" class=" first-modal modal fade" role="dialog">

                        <div class="modal-dialog">

                            <!-- Modal content-->

                            <div class="modal-content text-center">

                                <div class="modal-header">

                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                </div>

                                <div class="modal-body">



                                    <h4 class="modal-title">Sign UP</h4>

                                    <form method="POST" action="{{ route('register') }}">

                                        @csrf

                                        <fieldset class="form-fieldset">

                                            <!--<legend class="form-legend">Registration Form</legend>-->

                                            <div class="form-element form-input">

                                                <input id="name" type="text" class="form-element-field" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                <div class="form-element-bar"></div>

                                                <label class="form-element-label" for="name">Name</label>

                                            </div>

                                            <div class="form-element form-input">

                                                <input id="email" type="email" class="form-element-field" name="email" value="{{ old('email') }}" required autocomplete="email">

                                                <div class="form-element-bar"></div>

                                                <label class="form-element-label" for="email">Email</label>

                                                <!--<small class="form-element-hint">Please provide your email</small>-->
                                              <span id="regem_error" style="color:red"></span>
                                            </div>




                                            <div class="form-element form-input">

                                                <input id="mobile" name="mobile" class="form-element-field" placeholder="Ex:01751227498" type="number" required />

                                                <div class="form-element-bar"></div>

                                                <label class="form-element-label" for="mobile">Mobile</label>

                                                <input id="password-confirm" type="hidden" name="status" class="form-control" name="status" required value="user">



                                            </div>

                                            <div class="form-element form-input">

                                                <input id="password" type="password" class="form-element-field" name="password" required autocomplete="new-password">

                                                <div class="form-element-bar"></div>

                                                <label class="form-element-label" for="password">Password (At least 8 characters)</label>

                                            </div>



                                            <div class="form-element form-input">

                                                <input id="password-confirm" type="password" class="form-element-field" name="password_confirmation" required autocomplete="new-password">

                                                <div class="form-element-bar"></div>

                                                <label class="form-element-label" for="con_password">Confirm Password

                                                </label>

                                            </div>

                                            <div class="form-radio form-radio-inline">

                                                <div class="form-radio-legend">Gender</div>

                                                <label class="form-radio-label">

                                                    <input name=gender class="form-radio-field" type="radio" required value="Male" />

                                                    <i class="form-radio-button"></i>

                                                    <span>Male</span>

                                                </label>

                                                <label class="form-radio-label">

                                                    <input name=gender class="form-radio-field" type="radio" required value="Female" />

                                                    <i class="form-radio-button"></i>

                                                    <span>Female</span>

                                                </label>

                                            </div>

                                        </fieldset>

                                        <div class="form-actions">

                                                <button class="form-btn regbtn" type="submit">Submit</button>

                                            </div>

                                    </form>

                                 </div>

                            </div>



                        </div>

                    </div>

                    <!--Modal for first time End-->



                    <!-- Modal for 2nd time Start -->

                    <div id="myModal2" class="modal fade" role="dialog">

                        <div class="modal-dialog">

                            <!-- Modal content-->

                            <div class="modal-content text-center">

                                <div class="modal-header">

                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                </div>

                                <div class="modal-body">

                                    <h4 class="modal-title">Login Form</h4>
                                    <span id="erroremail" style="color:red"></span>

                                    <form method="POST" class="form-card" action="{{ route('login') }}">

                                        @csrf

                                            <fieldset class="form-fieldset">

                                            <div class="form-element form-input">

                                                <input name="email" id="login_email" class="form-element-field" placeholder=""

                                                       type="email" required />

                                                <div class="form-element-bar"></div>

                                                <label class="form-element-label" for="email">Email</label>

                                            </div>



                                            <div class="form-element form-input">

                                                <input id="login_password" name="password" class="form-element-field" placeholder=""

                                                       type="password" required />

                                                <div class="form-element-bar"></div>

                                                <label class="form-element-label" for="password">Password</label>

                                            </div>

                                        </fieldset>

                                        <div class="form-actions">

                                            <button class="form-btn loginform" type="submit">Login</button>

                                            <p class="first-button" data-toggle="modal" data-target="#myModal">Haven't registered yet! <a>Register Now</a></p>
                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link" style="color: #000" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif

                                        </div>



                                    </form>



                                </div>

                            </div>



                        </div>

                    </div>

                    <!--Modal for 2nd time End-->



                </ul>

            </div>

        </div>

    </div>

</div>



<!-- Navigation -->

<nav class="navbar navbar-expand-md navbar-light sticky-top" id="mainNav">

  <div class="container">

    <a class="navbar-brand" href="{{url('/')}}">

    <img src="{{asset('frontEnd/img/logo.png')}}" alt="People Scape">

    </a>

    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">

      <i class="fas fa-bars"></i>

    </button>

    <div class="collapse navbar-collapse" id="navbarResponsive">

      <ul class="navbar-nav ml-auto">

        <li class="nav-item">

        <a class="nav-link @yield('hm')" href="{{route('peoplesscape.home')}}">Home</a>

        </li>

        <li class="nav-item">

          <a class="nav-link @yield('abt')" href="{{route('about-us.index')}}">About Us</a>

        </li>

        <!--<li class="nav-item dropdown">-->

        <!--  <a class="nav-link dropdown-toggle @yield('srv')" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->

        <!--      Service-->

        <!--  </a>-->

        <!--  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">-->

        <!--      <a class="dropdown-item" href="{{route('services.index')}}/#head"><i class="fas fa-hat-wizard"></i>Head Hunting</a>-->

        <!--      <a class="dropdown-item" href="{{route('services.index')}}/#manpower"><i class="fas fa-book-reader"></i>Manpower Outsourcing</a>-->

        <!--      <a class="dropdown-item" href="{{route('services.index')}}/#payroll"><i class="far fa-credit-card"></i>Payroll Management</a>-->

        <!--      <a class="dropdown-item" href="{{route('services.index')}}/#medical"><i class="fas fa-briefcase-medical"></i>Medical marketing</a>-->

        <!--      <a class="dropdown-item" href="{{route('services.index')}}/#assessment"><i class="fas fa-hotel"></i>Assessment Centner</a>-->

        <!--      <a class="dropdown-item" href="{{route('services.index')}}/#recruitment"><i class="fas fa-recycle"></i>Recruitment Process Management</a>-->

        <!--      <a class="dropdown-item" href="{{route('services.index')}}/#training"><i class="fab fa-dev"></i>Training & Development</a>-->

        <!--  </div>-->

        <!--  </li>-->

          <li class="nav-item">

          <a class="nav-link @yield('srv')" href="{{route('services.index')}}">Services</a>

        </li>

        <li class="nav-item">

          <a class="nav-link @yield('cl')" href="{{route('clients.index')}}">Clients</a>

        </li>

        <!--<li class="nav-item">-->

        <!--  <a class="nav-link @yield('rg')" href="{{route('recognitions.index')}}">Certificates</a>-->

        <!--</li>-->

        <li class="nav-item">

                <a class="nav-link @yield('gl')" href="{{route('image-gallery.index')}}">Gallery</a>

              </li>

        <li class="nav-item">

          <a class="nav-link @yield('cr')" href="{{route('career.index')}}">Job Opening</a>

        </li>

        <li class="nav-item">

          <a class="nav-link @yield('con')" href="{{route('contact-us.index')}}">Contact Us</a>

        </li>

        <li class="nav-item">

          <a class="nav-link" href="JavaScript:Void(0);">

              <form action="#">

                  <div class="wrapper">

                      <div class="search-box">

                          <div class="fixed_block"></div>

                          <input type="text" placeholder="Type your keyword & press enter" class="input" id="search_result">

                          <span class="search-btn"><i class="fas fa-search"></i></span>

                      </div>

                  </div>

              </form>

          </a>

          </li>

      </ul>

    </div>

  </div>
<script>
    $("#login_email").blur(function(){
        let email_address = $(this).val();
        $.ajax({
                url: "{!! route('logineamil.chk') !!}",
                type: "get",
                data: {
                    email_address: email_address,
                },
                success: function(data) {
                    console.log(data);
                    if(data =='NotExist'){
                      $('#erroremail').text('Unauthorized Email or Password!!');
                      $('.loginform').attr("disabled", true);
                    }else{
                        $('#erroremail').text('');
                        $('.loginform').attr("disabled", false);
                    }
                }
        });
    });

        $("#email").blur(function(){
        let email = $(this).val();
        $.ajax({
                url: "{!! route('logineamil.chk') !!}",
                type: "get",
                data: {
                    email_address: email,
                },
                success: function(data) {
                    console.log(data);
                    if(data =='Exist'){
                      $('#regem_error').text('Email is already taken!!');
                      $('.regbtn').attr("disabled", true);
                    }else{
                        $('#regem_error').text('');
                        $('.regbtn').attr("disabled", false);
                    }
                }

        });
      });
//   $("#login_password").blur(function(){
//         let pass = $(this).val();
//         let email = $("#login_email").val();
//         $.ajax({
//                 url: "{!! route('loginpass.chk') !!}",
//                 type: "get",
//                 data: {
//                     pass: pass,
//                     email: email,
//                 },
//                 success: function(data) {
//                     console.log(data);
//                     if(data =='NotExist'){
//                       $('#erroremail').text('Unauthorized Email or Password!!');
//                       $('.loginform').attr("disabled", true);
//                     }else{
//                         $('#erroremail').text('');
//                         $('.loginform').attr("disabled", false);
//                     }
//                 }
//         });
//     //    alert(email_address);
  //});
</script>
</nav>
