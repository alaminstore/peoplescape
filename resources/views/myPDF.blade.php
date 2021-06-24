<!doctype html>
<html class="no-js" lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
      <!-- CSS only -->
      <title>People Scape - CV Format</title>

<style>
    @charset "utf-8";
    *,::after,::before{margin:0;padding:0;outline:0;box-sizing:border-box;-webkit-box-sizing:border-box;-moz-box-sizing:border-box}html{text-size-adjust:100%;-webkit-text-size-adjust:100%;-moz-text-size-adjust:100%;scroll-behavior:smooth}body{position:relative;overflow-x:hidden}ul{list-style:none}.h1,.h2,.h3,.h4,.h5,.h6,h1,h2,h3,h4,h5,h6{margin:0;padding:0}p{margin:0;padding:0}a{text-decoration:none}a:active,a:focus,a:hover{outline:0}input[type=button]:focus,input[type=email]:focus,input[type=number]:focus,input[type=password]:focus,input[type=reset]:focus,input[type=search]:focus,input[type=submit]:focus,input[type=tel]:focus,input[type=text]:focus,input[type=url]:focus,select:focus,textarea:focus{outline:0;box-shadow:none;-webkit-box-shadow:none}.btn.focus,.btn:focus{outline:0;box-shadow:none}.cv-format{max-width:794px;margin:8px auto;border:1px solid #d5d5d5;padding:1.25rem;background:#e9e8e8}.cv_format{max-width:794px;margin:8px auto;background:#f6f6f6;overflow:hidden;box-shadow:0 0 3px 0 #888}.content-wrapper{width:100%;padding:0 16px 42px;position:relative}.content-wrapper.cv-left{background-color:#f6f6f6}.content-wrapper.cv-right{background-color:#fff}.content-wrapper img{width:100%}.logo-wrapper{position:absolute;width:62px;top:8px;right:16px}.content-inner{padding-top:4rem}.content-inner h2{font-size:18px;font-weight:600;color:#fcb34b;align-self:center;text-transform:uppercase}.content-inner .content-box:not(:nth-child(2)){margin-top:3rem}.content-box h3{font-size:17px;font-weight:600;color:#111;text-transform:uppercase;padding-bottom:.75rem}.content-inner p{font-size:15px;font-weight:300;color:rgba(0,0,0,.7)}.content-inner .title-box{display:flex;padding-bottom:1rem}.content-inner .title-box>div:first-child{margin-right:.5rem;flex-basis:32px}.content-inner .title-box .icon-wrap{width:32px;height:32px;background:#909cdf;border-radius:50%;text-align:center;line-height:32px}.content-inner ul{margin-bottom:0;list-style:none;padding:0}.content-inner ul li:not(:last-child){margin-bottom:.25rem}.content-inner ol{padding-left:16px}.page-break{page-break-after:always}.alignleft{float:left;width:35%}.alignright{float:right;width:65%}.skill_header{width:100%}.skill_image{height:20px;width:28px;float:left;margin-right:10px}.export_buttons{max-width:794px;margin:0 auto;padding:10px 0}table.bg_icon{width:25px;padding:0}.btn{display:inline-block;font-weight:400;line-height:1.5;color:#212529;text-align:center;text-decoration:none;vertical-align:middle;cursor:pointer;-webkit-user-select:none;-moz-user-select:none;user-select:none;background-color:transparent;border:1px solid transparent;padding:.375rem .75rem;font-size:13px;border-radius:.25rem;transition:color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out}.btn-primary{color:#fff;background-color:#0d6efd;border-color:#0d67ee}
</style>
   </head>
   <body>
       <div class="export_buttons" style="display: flex;justify-content:space-between;">
        <a href="{{route('pdfdownload',['id'=>$careerInfoByid->id])}}">
            <button class="btn btn-primary btn-sm">Download as pdf</button>
            </a>
            <a href="https://smallpdf.com/pdf-to-word" target="_blank">
                <button class="btn">Pdf to Word Convert Link</button>
            </a>
            {{-- <a href="{{ url('wordexport/' . $careerInfoByid->id) }}">
                <button class="btn">Export Word</button>
            </a> --}}
       </div><br>
      <section class="cv_format">
               <div class="alignleft">
                  <div class="content-wrapper cv-left">
                    {{-- <img class="" src={{url($careerInfoByid->image)}}> --}}
                    {{-- <img class="" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path($careerInfoByid->image))) }}"> --}}
                    <img class="" src="{{asset($careerInfoByid->image)}}">



                     <!-- contact info -->
                     <div class="content-inner">
                        <div class="title-box">
                           <h2>{{$careerInfoByid->name}}</h2>
                        </div>
                        <ul>
                           <li>
                              <p><b>Home Address: </b> {{$careerInfoByid->haddress}}</p>
                           </li>
                           <li>
                              <p><b>Mobile: </b>{{$careerInfoByid->mobile}}</p>
                           </li>
                           <li>
                              <p>
                                 <b>Email: </b><a href="mailto:" {{$careerInfoByid->email}}>{{$careerInfoByid->email}}</a>
                              </p>
                           </li>
                           <li>
                              <p>
                                 <b>Marital Status: </b>{{$careerInfoByid->marital_status}}
                              </p>
                           </li>
                        </ul>
                     </div>
                     <!-- skils -->



                     <div class="content-inner">


                        <table>
                            <td>
                                <table class="bg_icon">
                                    <td><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('pdficon/skill.jpg'))) }}"></td>
                                </table>
                            </td>
                            <td><h2>skills</h2></td>
                        </table>
<br>
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
               <div class="alignright">
                  <div class="content-wrapper cv-right">
                     <div class="logo-wrapper">
                        <img src="/images/peoplescape_logo.png" alt="">
                     </div>
                     <!-- objectives -->
                     <div class="content-inner">
                        <div class="title-box">
                            <table>
                                <td>
                                    <table class="bg_icon">
                                        <td><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('pdficon/file.png'))) }}"></td>
                                    </table>
                                </td>
                                <td><h2> &nbsp;Objectives</h2></td>
                            </table>
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
                            <table>
                                <td>
                                    <table class="bg_icon">
                                        {{-- <td><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('pdficon/briefcase.png'))) }}"></td> --}}
                                        <td><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('pdficon/briefcase.png'))) }}"></td>
                                    </table>
                                </td>
                                <td><h2> &nbsp;Experience</h2></td>
                            </table>
                        </div>
                        @if (!empty($careerInfoByid->experience))
                        @php($jsonexpdata = json_decode($careerInfoByid->experience))
                        @foreach ($jsonexpdata as $exp)
                        @if ($exp->company != null)
                            <div class="content-box">
                                <h3>{{$exp->title}} ({{$exp->joinedin}} > {{$exp->leftin}})</h3>
                                <p><b>Company Name:</b> {{$exp->company}}</p>
                                <p><b>Responsibilites:</b> &nbsp;&nbsp;{{$exp->responsibilites}}</p>
                            </div>
                            @else
                            <h3>Fresher</h3>
                        @endif
                        @endforeach
                        @endif

                     </div>
                     <!-- education -->
                     <div class="content-inner">
                        <div class="title-box">
                            <table>
                                <td>
                                    <table class="bg_icon">
                                        <td><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('pdficon/book.png'))) }}"></td>
                                    </table>
                                </td>
                                <td><h2> &nbsp;Education</h2></td>
                            </table>
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
                     <div class="page-break"></div>
                     <!-- projects -->
                     <div class="content-inner">
                        <div class="title-box">
                            <table>
                                <tr>
                                    <td>
                                        <table class="bg_icon">
                                            <td><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('pdficon/project2.png'))) }}"></td>
                                        </table>
                                    </td>
                                    <td><h2> &nbsp;personal_projects</h2></td>
                                </tr>
                            </table>
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
                            <table>
                                <tr>
                                    <td>
                                        <table class="bg_icon">
                                            <td><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('pdficon/work.png'))) }}"></td>
                                        </table>
                                    </td>
                                    <td><h2> &nbsp;personal_achivements</h2></td>
                                </tr>
                            </table>
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
                            <table>
                                <tr>
                                    <td>
                                        <table class="bg_icon">
                                            <td><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('pdficon/like.png'))) }}"></td>
                                        </table>
                                    </td>
                                    <td><h2> &nbsp;interenst(s)</h2></td>
                                </tr>
                            </table>
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
                            <table>
                                <tr>
                                    <td>
                                        <table class="bg_icon">
                                            <td><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('pdficon/group.png'))) }}"></td>
                                        </table>
                                    </td>
                                    <td><h2> &nbsp;reference</h2></td>
                                </tr>
                            </table>
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
      </section>
      <script src="https://kit.fontawesome.com/f88912b5bf.js" crossorigin="anonymous"></script>

   </body>
</html>
