<!doctype html>
<html class="no-js" lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>People Scape - CV Format</title>
      <!--open snas font link-->
      <link
         href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600&display=swap"
         rel="stylesheet">
      <!--fontawesome-5 icon-->
      <link rel="stylesheet" href={{ asset('frontEnd/css/fontawesome.all.min.css') }}>
      <!--bootstrap css-->
      <!-- CSS only -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
      <!--custom css-->
      <link rel="stylesheet" href={{asset('frontEnd/mycv.css')}}>
      <style>
         body {
         font-family: 'Open Sans', sans-serif;
         }
      </style>
   </head>
   <body>
      <a href="{{route('pdfdownload',['id'=>$careerInfoByid->id])}}">
      <button class="btn btn-info btn-sm">Download as pdf</button>
      </a>
      <section class="cv-format">
         <div class="container-fluid px-0">
            <div class="row no-gutters">
               <div class="col-12 col-md-4">
                  <div class="content-wrapper cv-left">
                     <img class="" src={{asset($careerInfoByid->image)}} alt="">
                     <!-- contact info -->
                     <div class="content-inner">
                        <div class="title-box">
                           <h2>{{$careerInfoByid->name}}</h2>
                        </div>
                        <ul>
                           <li>
                              <p>{{$careerInfoByid->haddress}} sdfhsd sef se s efe</p>
                           </li>
                           <li>
                              <p>{{$careerInfoByid->mobile}}</p>
                           </li>
                           <li>
                              <p>
                                 <a href="mailto:" {{$careerInfoByid->email}}>{{$careerInfoByid->email}}</a>
                              </p>
                           </li>
                        </ul>
                     </div>
                     <!-- skils -->
                     <div class="content-inner">
                        <div class="title-box">
                           <div>
                              <div class="icon-wrap">
                                 <i class="fa fa-lightbulb-o" aria-hidden="true"></i>
                              </div>
                           </div>
                           <h2>skils</h2>
                        </div>
                        <ul>
                            @if (!empty($careerInfoByid->skill))
                            @php($skills = json_decode($careerInfoByid->skill))
                             @foreach ($skills as $skill)
                             <li>
                              <p>{{$skill->competent}}</p>
                             </li>
                            @endforeach
                            @endif

                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-12 col-md-8">
                  <div class="content-wrapper cv-right">
                     <div class="logo-wrapper">
                        <img class="img-fluid" src={{asset('peoplescape_logo.png')}} alt="logo">
                        {{-- <img class="" src={{url('peoplescape_logo.png')}} alt="logo"> --}}
                        {{-- <img src="http://127.0.0.1:8000/peoplescape_logo.png" /> --}}
                        {{-- $image = str_replace(' ', '%20', $items->image); --}}
                     </div>
                     <!-- objectives -->
                     <div class="content-inner">
                        <div class="title-box">
                           <div>
                              <div class="icon-wrap">
                                 <i class="far fa-address-card"></i>
                              </div>
                           </div>
                           <h2>objectives</h2>
                        </div>
                        <p>
                            @if ($careerInfoByid->objective)
                            {{$careerInfoByid->objective}}
                            @else
                            Not Available
                            @endif
                        </p>
                     </div>
                     <!-- experience -->
                     <div class="content-inner">
                        <div class="title-box">
                           <div>
                              <div class="icon-wrap">
                                 <i class="far fa-address-card"></i>
                              </div>
                           </div>
                           <h2>experience</h2>
                        </div>
                        @if (!empty($careerInfoByid->experience))
                        @php($jsonexpdata = json_decode($careerInfoByid->experience))
                        @foreach ($jsonexpdata as $exp)

                        <div class="content-box">
                           <h3>{{$exp->title}} ({{$exp->joinedin}} > {{$exp->leftin}})</h3>
                           <p><b>Company Name:</b> {{$exp->company}}</p>
                           <p><b>Responsibilites:</b> &nbsp;&nbsp;{{$exp->responsibilites}}</p>
                        </div>
                        @endforeach
                        @endif

                     </div>
                     <!-- education -->
                     <div class="content-inner">
                        <div class="title-box">
                           <div>
                              <div class="icon-wrap">
                                 <i class="far fa-address-card"></i>
                              </div>
                           </div>
                           <h2>education</h2>
                        </div>

                        @if(!empty($careerInfoByid->academic))
                        @php($jsonaccdata = json_decode($careerInfoByid->academic))
                        @foreach($jsonaccdata as $acc)
                            <div class="content-box">
                                <h3>{{$acc->instname=='other' ? $acc->instnameoth : $acc->instname}} (Passing Year : {{$acc->pyear}})
                                </h3>
                                <p><b>Degree: </b> {{$acc->degree}}</p>
                                <p><b>CGPA: </b> &nbsp;{{$acc->cgpa}}</p>
                                <p> <b>Major:</b> &nbsp;
                                    @if(isset($acc->major))
                                        {{$acc->major}}
                                        @else
                                        Not Available
                                        @endif
                                </p>
                                <p> <b>Minor:</b> &nbsp;
                                    @if(isset($acc->minor))
                                        {{$acc->minor}}
                                        @else
                                        Not Available
                                        @endif
                                </p>
                                <p><b>Location: </b>{{$acc->location}}</p>

                            </div>
                         @endforeach
                        @endif
                     </div>
                     <!-- projects -->
                     <div class="content-inner">
                        <div class="title-box">
                           <div>
                              <div class="icon-wrap">
                                 <i class="far fa-address-card"></i>
                              </div>
                           </div>
                           <h2>personal projects</h2>
                        </div>
                        @if (!empty($careerInfoByid->project))
                         @php($projects = json_decode($careerInfoByid->project))
                         @foreach ($projects as $project)
                         <div class="content-box">
                            <h3>Project Url: {{$project->url}}</h3>
                            <h6>Project Description :</h6>
                            <p>{{$project->comment}}</p>
                         </div>
                         @endforeach
                        @endif
                     </div>
                     <!-- achivements -->
                     <div class="content-inner">
                        <div class="title-box">
                           <div>
                              <div class="icon-wrap">
                                 <i class="far fa-address-card"></i>
                              </div>
                           </div>
                           <h2>personal achivements</h2>
                        </div>
                        @if (!empty($careerInfoByid->achievement))
                        @php($jsonreferencedata = json_decode($careerInfoByid->achievement))
                        @foreach ($jsonreferencedata as $achv)

                        <div class="content-box">
                           <p><b>{{$achv->achieve}}</b></p>
                        </div>
                        @endforeach
                        @endif


                     </div>
                     <!-- interest -->
                     <div class="content-inner">
                        <div class="title-box">
                           <div>
                              <div class="icon-wrap">
                                 <i class="far fa-address-card"></i>
                              </div>
                           </div>
                           <h2>interenst(s)</h2>
                        </div>
                        <div class="content-box">
                            @if(!empty($careerInfoByid->interest))
                            <p>{{$careerInfoByid->interest}}</p>
                            @endif
                        </div>
                     </div>
                     <!-- interest -->
                     <div class="content-inner">
                        <div class="title-box">
                           <div>
                              <div class="icon-wrap">
                                 <i class="far fa-address-card"></i>
                              </div>
                           </div>
                           <h2>reference</h2>
                        </div>
                        <ol>
                            @if(!empty($careerInfoByid->reference))
                            <?php  $jsonreferencedata = json_decode($careerInfoByid->reference);?>
                           @foreach($jsonreferencedata as $ref)
                            <li>
                               <p><strong>{{$ref->title}}</strong> <br/>{{$ref->company}} <br/>{{$ref->contactinfo}} </p>
                            </li>
                           @endforeach
                          @endif
                        </ol>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!--bootstrap js-->
      <script src="assets/js/vendor/jquery-3.4.1.min.js"></script>
      <script src="assets/js/popper.min.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>
      <!--custom js-->
      <script src="assets/js/custom.js"></script>
      <script src="https://kit.fontawesome.com/f88912b5bf.js" crossorigin="anonymous"></script>
   </body>
</html>
