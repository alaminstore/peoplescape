<html>
    <head>
        <title>CV FORMAT</title>
        {{-- <link rel="stylesheet" href="CSS/styles.css"> --}}
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >


        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    </head>
    <style>
        .body {
    font-family: 'Montserrat', sans-serif;
}

.mycontainer {
    margin: 30px;
}

.myheader {
    line-height: 6px;
    float: right;
    text-align: right;
    width:200px
}

.mytitle {
    width: 650px;
    padding: 10px;
    background-color: #418AB3;
    display: inline-block;
}

/* .mycontent {
    padding: 50px 25px;
} */

.myleft {
    width:150px;
    float: left;
    text-align: left;
    color: #418AB3
}

.myelement {
    margin-left: 150px;
}
.myobjelement{
    margin-left: 150px;
}

.myline {
    border: 1px solid #418AB3;
    margin: 30px 0;
}

 td, th {
    border: 1px solid #dddddd;
    /* text-align: left; */
}
/*

table {
    border-collapse: collapse;
    width: 600px;
} */
    </style>
    <body>
            <div class="mycontainer">
                    <div class="myheader">
                        <p>{{$careerInfoByid->haddress}}</p>
                        <p>{{$careerInfoByid->mobile}}</p>
                        <p>{{$careerInfoByid->email}}</p>
                    </div><br><br>
                    <div class="name" style="margin-bottom:10px">
                        <h3 class="mytitle">{{$careerInfoByid->name}}</h3>
                    </div>
                    <div class="mycontent">
                        <div class="myobjective">
                            <div class="myleft">
                                <p>OBJECTIVE</p>
                            </div>
                            <div class="myobjelement">
                                    {{$careerInfoByid->objective}}
                            </div>
                        </div>

                        <hr class="myline">

                        <div class="myobjective">
                            <div class="myleft">
                                <p>PROFESSIONAL ACHIEVEMENTS</p>
                            </div>
                            <div class="myelement">
                                    @if(!empty($careerInfoByid->achievement))
                                    <?php  $jsonachievementdata = json_decode($careerInfoByid->achievement);?>
                                    @foreach($jsonachievementdata as $achv)
                                    <span>. {{ $achv->achieve }}</span><br>
                                    @endforeach
                               @endif
                             </div>
                        </div>

                        <hr class="myline">

                        <div class="myobjective">
                            <div class="myleft">
                                <p>SKILLS</p>
                            </div>
                            <div class="myelement">
                                @if(!empty($careerInfoByid->skill))
                                    <?php  $jsonskilldata = json_decode($careerInfoByid->skill);?>
                                  @foreach($jsonskilldata as $sk)
                                  <span>.{{$sk->competent}}</span><br>
                                   @endforeach
                               @endif
                            </div>
                        </div>

                        <hr class="myline">

                        <div class="myobjective">
                            <div class="myleft">
                                <p>WORK HISTORY</p>
                            </div>
                            <div class="myelement">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>JOB TITLE</th>
                                        <th>COMPANY NAME</th>
                                        <th>RESPONSIBILITES</th>
                                        <th>From</th>
                                        <th>To</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @if(!empty($careerInfoByid->experience))
                                        <?php $jsonexpdata = json_decode($careerInfoByid->experience);?>
                                         @foreach($jsonexpdata as $exp)
                                        <tr>
                                            <td>{{$exp->title}}</td>
                                            <td>{{$exp->company}}</td>
                                            <td>{{$exp->responsibilites}}</td>
                                            <td>{{$exp->joinedin}}</td>
                                            <td>{{$exp->leftin}}</td>
                                        </tr>
                                      @endforeach
                                      @endif
                                     </tbody>
                                </table>
                            </div>
                        </div>

                        <hr class="myline">

                        <div class="myobjective">
                            <div class="myleft">
                                <p>EDUCATION</p>
                            </div>
                            <div class="myelement">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                        <th>DEGREE</th>
                                        <th>INSTITUTE</th>
                                        <th>GRADE</th>
                                        <th>MAJOR</th>
                                        <th>MINOR</th>
                                        <th>LOCATION</th>
                                        <th>DATE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            @if(!empty($careerInfoByid->academic))
                                            <?php $jsonaccdata = json_decode($careerInfoByid->academic);?>


                                        @foreach($jsonaccdata as $acc)
                                        <tr>
                                            <td>{{$acc->degree}}</td>
                                            <td>{{$acc->instname=='other' ? $acc->instnameoth : $acc->instname}}</td>
                                            <td>{{$acc->cgpa}}</td>
                                            <td>
        									   {{-- @if(array_key_exists('major', $acc)) --}}
        									   @if($acc->major == "No Data Found"))
                                                  @php
                                                      echo "No"
                                                  @endphp
                                                @else
                                                {{N/A}}
                                                @endif
        									 </td>
        									<td>
        									     {{-- @if(array_key_exists('minor', $acc)) --}}
        									     @if(isset($acc->minor))
                                                {{$acc->minor}}
                                                @else
                                                {{N/A}}
                                                @endif
        									</td>
                                            <td>{{$acc->location}}</td>
                                            <td>{{$acc->pyear}}</td>
                                        </tr>
                                      @endforeach
                                      @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <hr class="myline">

                        {{-- <div class="myobjective">


                            <div class="myleft">
                                <p>REFERENCE</p>
                            </div>
                            <div class="">
                                @foreach($jsonreferencedata as $ref)
                                  <div>
                                    {{$ref->title}}<br>
                                    {{$ref->company}}<br>
                                    {{$ref->contactinfo}}<br>
                                  </div><br>
                                @endforeach
                             </div>
                            @endif
                        </div> --}}
                        @if(!empty($careerInfoByid->reference))
                        <?php  $jsonreferencedata = json_decode($careerInfoByid->reference);?>
                        <div class="objective">
                                <div class="myleft">
                                    <p>REFERENCE</p>
                                </div>
                               <div class="row">
                                        @foreach($jsonreferencedata as $ref)
                                        <div class="col-sm-6">
                                            <div class="myelement">
                                                <strong>{{$ref->title}}</strong><br>
                                                {{$ref->company}} <br>
                                                {{$ref->contactinfo}}
                                            </div>
                                        </div><br>
                                    @endforeach
                                </div>

                            </div>
                        @endif
                    </div>
                </div>
    </body>
</html>
