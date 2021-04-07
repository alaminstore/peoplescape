@extends('Frontend.frontmaster')

@section('con','active')

@section('title', 'Peoplesscap | Contact ')

@section('frntcontent')

<section class="page-banner-area" style="background: url({{$data['contacthead']->image}}); background-repeat: no-repeat; background-position: center; background-size: cover; background-attachment: fixed;">

    <div class="container">

      <div class="row">

        <div class="col-sm-12">

          <h2 class="page-banner-title">{{ $data['contacthead']->title}}</h2>

        </div>

      </div>

    </div>

  </section>

  

  <!-- Contact Us Area Start -->

  <section class="contact-us-area">

      <div class="container">

          <div class="row">

              <div class="col-sm-6">

                  <h2>Get In Touch</h2>

                  <!--Contact Form Start-->

                  {{-- {!!Form::open(['route'=>['contact-us.store'],'id'=>'contactform', 'enctype'=>'multipart/form-data'])!!} --}}

                 <form action="{{url('/contactmessage')}}" method="post">

                      @csrf

                  <div class="form-group col-sm-12 padding-zero">

                          <div class="form-group col-sm-6 pl-0">

                              <input type="text" name="name" class="form-control" placeholder="Name">

                          </div>

                          <div class="form-group col-sm-6 pl-0">

                              <input type="email" name="email" class="form-control" placeholder="Email">

                          </div>

                      </div>

                      <div class="form-group col-sm-12 pl-0">

                          <textarea name="msg" placeholder="Type your Message"></textarea>

                      </div>



                      <div class="form-group col-sm-12 pl-0">

                         

                         <button class="common-button" type="submit"  style="border: 0; cursor:pointer;">Send</button>

  

                            

                      </div>

                      @captcha

                    </form>

                     

              </div>

              <script>

                //    $(document).ready(function () {

                //     $('#contactform').validate({ 

                //         rules: {

                //             name: 

                //             {

                //                 required: true,

                                

                //             },

                //             email: 

                //             {

                //                 required: true,

                                

                //             },

                //             msg: 

                //             {

                //                 required: true,

                                

                //             },

                            

                //         },

                        

                //         highlight: function(element) {

                //             $(element).parent().addClass('has-error');

                //         },

                //         unhighlight: function(element) {

                //             $(element).parent().removeClass('has-error');

                //         },

                //     });

                // });

                </script>

              <div class="col-sm-6">

                  <div class="address-part-area">

                      <h2>How To Find Us</h2>

                      <div class="single-address-box">

                          <p> If you have any questions, just fill in the contact form, and we will answer you shortly. If you are living nearby, come visit us.</p>

                      </div>

                      <div class="single-address-box">

                          <!--<i class="fa fa-map-marker"></i>-->

                          <h4>Headquarter:</h4>

                          <p><i class="fas fa-map-marked"></i><span>Location: </span>{{$data['contact']->address}}</p>

                          <p><i class="fas fa-phone"></i> Telephone: <a href="tel:{{$data['contact']->phone}}">{{$data['contact']->telephone}}</a></p>

                          <p><i class="fas fa-envelope"></i> Email: <a href="mailto:{{$data['contact']->email}}">{{$data['contact']->email}}</a></p>

                      </div>

                  </div>

              </div>

          </div>

      </div>

  

      <!--Google Map Start-->

      <div class="map-area">

          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.0398598988877!2d90.41115131429754!3d23.781594893502362!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c79e4fc8cde3%3A0xb4a88b59925dc020!2sPeopleScape+Ltd.!5e0!3m2!1sen!2sbd!4v1561801126384!5m2!1sen!2sbd" width="100%" height="500px" frameborder="0" style="border:0" allowfullscreen></iframe>

       

        </div>

      <!--Google Map End-->

  

  </section>

  <!-- Contact Us Area End -->

  

  <section class="call-to-action-area">

      <div class="container">

          <div class="row">

              <div class="col-sm-12">

                  <div class="call-to-content">

                      <h2>FIND JOBS AND REGISTER ON OUR SITE</h2>

                      <a href="#" class="common-button">Learn More</a>

                  </div>

              </div>

          </div>

      </div>
<script>
  @if(Session::has('message'))
            toastr.options = {
                            "debug": false,
                            "positionClass": "toast-bottom-right",
                            "onclick": null,
                            "fadeIn": 300,
                            "fadeOut": 1000,
                            "timeOut": 5000,
                            "extendedTimeOut": 1000
                        };
            toastr.success("{{ Session::get('message') }}");
           @endif
</script>
  </section>

@endsection