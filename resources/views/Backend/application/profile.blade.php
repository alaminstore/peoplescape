@extends('Backend.backendmaster')
@section('applicationprofile-active','active')
@section('title', 'PeopleScape | Application Profile')
@section('content')
<style>
    .commonaccrodion{
        /* background: #2686be; */
        font-size: 17px;
        color: #413769;
        font-weight: bold;
        text-decoration: none;
    }
    .btn-link:hover{
        text-decoration: none;
    }
    .custombtn{
        background: #0d72ba;
        color: #fff;

    }
    .acchead{
        background: #43759014;
        margin: 5px;
    }
    .text-center.profile_image img {
        height: 220px;
        width: 220px;
    }
</style>
@php
   use App\Degreemajorminor;
   use App\Degree;
@endphp
<section class="content">
        <div class="row">
          <div class="col-xs-3">
            <div class="box box-info">
              <div class="box-header">
                <h3 class="box-title">Basic Info</h3>
                 <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                  </div>
                 </div>
                  <div class="box-body">
                      <div class="basicpifo">
                            <div class="pull-right">
                                <i title="Edit"  class="fa fa-pencil basicinfo" style="font-size:20px;cursor:pointer;color:#0d72ba;"></i>
                            </div>
                             <div class="text-center profile_image">
                             <img src="{{url($user_info->image)}}" style="border-radius:50%"/>
                             </div> <br>
                              <table class="table table-bordered table-striped">
                                <tr>
                                    <td width="40%"><b>Name</b></td>
                                <td width="60%">{{$user_info->name}}</td>
                                </tr>
                                <tr>
                                    <td width="40%"><b>Email</b></td>
                                <td width="60%">{{$user_info->email}}</td>
                                </tr>
                                <tr>
                                    <td width="40%"><b>Mobile</b></td>
                                    <td width="60%">{{$user_info->mobile}}</td>
                                </tr>
                                 <tr>
                                    <td width="40%"><b>Gender</b></td>
                                    <td width="60%">{{$user_info->gender}}</td>
                                </tr>


                        </table><br>
                  </div>
                </div>
                <div class="basicpinfoupdate" style="display:none">
                               <div class="text-center profile_image">
                                <img src="{{url($user_info->image)}}" style="border-radius:50%"/>
                                </div> <br>
                                <form id="basicinfoformup">
                                    @csrf
                                 <table class="table table-bordered table-striped">
                                  <tr>
                                    <td width="20%"><b>Image</b></td>
                                    <td width="80%"><input class="form-control" type="file" name="image"></td>
                                    <input type="hidden" class="form-control" id="" name="userid" value="{{$findCv->userid}}">
                                    </tr>
                                   <tr>
                                    <td width="20%"><b>Name</b></td>
                                   <td width="80%"><input class="form-control" type="text" name="name" value="{{$user_info->name}}"></td>
                                   </tr>
                                   <tr>
                                       <td width="20%"><b>Email</b></td>
                                   <td width="80%"><input type="text" class="form-control" name="email" value="{{$user_info->email}}"></td>
                                   </tr>
                                   <tr>
                                       <td width="20%"><b>Mobile</b></td>
                                       <td width="80%"><input type="text" class="form-control" name="mobile" value="{{$user_info->mobile}}"></td>
                                   </tr>

                                  <tr>
                                       <td width="40%"><b></b></td>
                                       <td width="60%"><button class='btn  custombtn' type="submit">UPDATE</button></td>
                                   </tr>

                           </table><br>
                        </form>
                </div>
             </div>
          </div>
          <script>
              $(document).on('click','.basicinfo',function(e){
                  e.preventDefault();
                 $('.basicpifo').css('display','none');
                 $('.basicpinfoupdate').css('display','block');
              })
              $('#basicinfoformup').on('submit',function(e){
                e.preventDefault();
                //var data = $(this).serialize();
                var base_url = $('#mainsliderform').find('#path').val();
                //alert (base_url)

                    $.ajax({
                    url:"{{route('basicinfop.update')}}",
                    method:"POST",
                    data:new FormData(this),
                    dataType:'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(data)
                    {
                        //console.log(data);
                        toastr.options = {
                                "debug": false,
                                "positionClass": "toast-bottom-right",
                                "onclick": null,
                                "fadeIn": 300,
                                "fadeOut": 1000,
                                "timeOut": 5000,
                                "extendedTimeOut": 1000
                            };
                            $('.basicpifo').css('display','block');
                           $('.basicpinfoupdate').css('display','none');
                        $( ".basicpifo" ).load(window.location.href + " .basicpifo" );
                        toastr.success('Data Inserted Successfully');

                    }
                 });
            });
          </script>
          <div class="col-xs-9">
                <div class="box box-info">
                  <div class="box-header">
                    <h3 class="box-title">Others Info</h3>
                     <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                      </div>
                     </div>

                  <div class="box-body">
                        <div id="accordion">
                                <div class="card">
                                  <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0 acchead">
                                      <button class="btn btn-link collapsed commonaccrodion " data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Personal Information
                                      </button>
                                    </h5>
                                  </div>

                                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="card-body personalinfodiv">
                                        <div class="col-md-12">
                                            <div class="pull-right">
                                                <i title="Edit" class="fa fa-pencil updatepinfo" style="font-size:20px;cursor:pointer;color:#0d72ba"></i>
                                            </div>
                                             <div class="form-group">
                                                 <label for="haddress" class="control-label"><span style="color:red">*</span> Home Address</label>
                                                 <div>
                                                    {{$findCv->haddress}}
                                                 </div>
                                             </div>
                                             </div>

                                             <div class="col-md-12">
                                             <div class="form-group">
                                                 <label for="paddress" class="control-label"><span style="color:red">*</span> Permanent Address</label>
                                                 <div>
                                                        {{$findCv->paddress}}
                                                 </div>
                                             </div>
                                              <div class="form-group">
                                                 <label for="paddress" class="control-label"><span style="color:red">*</span>NID/Birth/Passport/Driving</label>
                                                 <div>
                                                        {{$findCv->nid}}
                                                 </div>
                                             </div>
                                             </div>

                                             <div class="col-md-12">
                                                 <div class="form-group">
                                                     <label for="birthdate" class="control-label"><span style="color:red">*</span> Birthdate</label>
                                                     <div>
                                                            {{$findCv->birthdate}}
                                                     </div>
                                                 </div>
                                                 </div>
                                                <div class="col-md-12">
                                                  <div class="form-group">
                                                     <label for="birthdate" class="control-label"><span style="color:red">*</span> Objective</label>
                                                     <div>
                                                            {{$findCv->objective}}
                                                   </div>
                                             </div>
                                             </div>
                                             <div class="col-md-12">
                                                 <div class="form-group">
                                                     <label for="birthdate" class="control-label"><span style="color:red">*</span> Cover Letter</label>
                                                     <div>
                                                            {{$findCv->interest}}
                                                     </div>
                                                 </div>
                                             </div>
                                               <div class="col-md-12">
                                                     <div class="form-group">
                                                         <label for="sel1" class="labelclass"> Your Cv</label>
                                                         <a href="{{url($findCv->cv)}}" style="color:#0d72ba">Your CV</a>
                                                     </div>
                                                 </div>

                                       </div>
                                     <form id="personalinfo" enctype="multipart/form-data">
                                        @csrf
                                     <div class="card-body personalinfodivupdate" style="display:none">
                                       <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="haddress" class="control-label"><span style="color:red">*</span> Home Address</label>
                                                <div>
                                                <input type="text" class="form-control" id="haddress" name="haddress" value="{{$findCv->haddress}}">
                                                <input type="hidden" class="form-control" id="" name="userid" value="{{$findCv->userid}}">

                                                </div>
                                            </div>
                                            </div>

                                            <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="paddress" class="control-label"><span style="color:red">*</span> Permanent Address</label>
                                                <div>
                                                <input type="text" class="form-control" id="paddress" name="paddress" value="{{$findCv->paddress}}">
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <label for="paddress" class="control-label"><span style="color:red">*</span>NID/Birth/Passport/Driving</label>
                                                <div>
                                                    <input type="text" class="form-control" id="nid" name="nid" value="{{$findCv->nid}}">
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="birthdate" class="control-label"><span style="color:red">*</span> Birthdate</label>
                                                    <div>
                                                        <input type="text" class="form-control" id="birthdate" name="birthdate" value="{{$findCv->birthdate}}">
                                                    </div>
                                                </div>
                                                </div>
                                               <div class="col-md-12">
                                                 <div class="form-group">
                                                    <label for="birthdate" class="control-label"><span style="color:red">*</span> Objective</label>
                                                    <div>
                                                        <textarea name="objective" class="form-control" rows="8">{{$findCv->objective}}</textarea>
                                                  </div>
                                            </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="birthdate" class="control-label"><span style="color:red">*</span> Cover Letter</label>
                                                    <div>
                                                        <textarea name="interest" class="form-control" rows="8">{{$findCv->interest}}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                                <div class="col-md-12">
                                                        <div class="form-group">
                                                         <a href="{{url($findCv->cv)}}" style="color:#0d72ba">Your CV</a>
                                                      </div>
                                                    <div class="form-group">
                                                        <label for="sel1" class="labelclass">Upload Your Cv(doc,pdf)</label>
                                                        <input type="file" class="form-control" name='cv'>
                                                    </div>
                                                </div>
                                            <div class="row cbtn" style="margin:2px;">
                                                <div class="col-12">
                                                    <button class='btn btn-block custombtn' type="submit">UPDATE</button>
                                                </div>
                                            </div>
                                      </div>
                                    </form>
                                    </div>
                                </div>
                                <script>
                                    $(document).on('click','.updatepinfo',function(e){
                                        e.preventDefault();
                                        //alert('hi');
                                        $('.personalinfodivupdate').css('display','block');
                                        $('.personalinfodiv').css('display','none');
                                    })
                                    $('#personalinfo').on('submit',function(e){
                                        e.preventDefault();
                                        //var data = $(this).serialize();
                                        var base_url = $('#mainsliderform').find('#path').val();
                                        //alert (base_url)

                                            $.ajax({
                                            url:"{{route('personalinfo.update')}}",
                                            method:"POST",
                                            data:new FormData(this),
                                            dataType:'JSON',
                                            contentType: false,
                                            cache: false,
                                            processData: false,
                                            success:function(data)
                                            {
                                                //console.log(data);
                                                toastr.options = {
                                                        "debug": false,
                                                        "positionClass": "toast-bottom-right",
                                                        "onclick": null,
                                                        "fadeIn": 300,
                                                        "fadeOut": 1000,
                                                        "timeOut": 5000,
                                                        "extendedTimeOut": 1000
                                                    };
                                                $('.personalinfodivupdate').css('display','none');
                                                $('.personalinfodiv').css('display','block');
                                                $( ".personalinfodiv" ).load(window.location.href + " .personalinfodiv" );
                                                toastr.success('Data Inserted Successfully');

                                            }

                                        });

                                    });
                                </script>

                                <div class="card">
                                  <div class="card-header " id="headingThree">
                                    <h5 class="mb-0 acchead">
                                      <button class="btn btn-link collapsed commonaccrodion" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Educational Qualification
                                      </button>
                                    </h5>
                                  </div>
                                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="eduinfo">
                                              <div class="pull-right">
                                                    <i title="Edit" class="fa fa-pencil updateeduinfo" style="font-size:20px;cursor:pointer;color:#0d72ba;"></i>
                                                </div><br><br>
                                             <table class="table table-bordered table-striped">
                                                <thead>
                                                <tr>
                                                    <th width="20%">University</th>
                                                    <th width="20%">Degree</th>
                                                    <th width="20%">Score</th>
                                                    <th width="20%">Location</th>
                                                    <th width="20%">Passing Year</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                    @if(!empty($findCv->academic))
                                                        <?php $jsonaccdata = json_decode($findCv->academic);?>


                                                    @foreach($jsonaccdata as $acc)
                                                    <tr>
                                                    <td>{{$acc->instname=='other' ? $acc->instnameoth : $acc->instname}}</td>
                                                    <td>{{$acc->degree}}</td>
                                                    <td>{{$acc->cgpa}}</td>
                                                    <td>{{$acc->location}}</td>
                                                    <td>{{$acc->pyear}}</td>
                                                    </tr>
                                                  @endforeach
                                                  @endif
                                                </tbody>
                                            </table>
                                          </div>
                                        <form id="educationalinfo">
                                                @csrf
                                            <div class="col-md-12 eduupdateinfo" style="display:none" >
                                                    <div class="form-group">
                                                            <input type="hidden" class="form-control" id="" name="userid" value="{{$findCv->userid}}">
                                                            <div class="alist col-sm-12 " data-index_no="1000">
                                                            <div class="aitemWrapper" style="position: relative; width:722px;overflow-x: auto;">
                                                                <table class="table table-bordered amoreTable" style="width: 894px;">
                                                                    <tr>
                                                                       <th width="15%" class="labelclass">Degree</th>
                                                                        <th width="15%" class="labelclass">Institution Name</th>
                                                                        <th width="10%" class="labelclass">Score</th>
                                                                        <th width="15%" class="labelclass">Major</th>
                                                                         <th width="15%" class="labelclass">Minor</th>
                                                                        <th width="15%" class="labelclass">Location</th>
                                                                        <th width="10%" class="labelclass">Pyear</th>
                                                                        <th width="5%" class="labelclass">Option</th>
                                                                    </tr>
                                                                    @if(!empty($findCv->academic))
                                                                    <?php $jsonaccdata = json_decode($findCv->academic);?>
                                                                    @foreach($jsonaccdata as $acc)

                                                                        <tr class="aitem_tr asingle_list">
                                                                            <td>
                                                                                <select class="form-control degreeonchange" name="academic[{{$loop->index +1}}][degree]" id="degree">
                                                                                    <option value="">SelectOption</option>
                                                                                    @foreach ($data['deg'] as $item)
                                                                                        <option value="{{$item->degree}}"  data-id="{{$item->id}}" @if($acc->degree == $item->degree) selected = "selected" @endif>{{$item->degree}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <!--<input type="text" class="form-control"  name="academic[{{$loop->index +1}}][degree]" value="{{$acc->degree}}"><br>-->
                                                                            </td>
                                                                             <td class="otherapp deloapp">
                                                                           <select class="form-control institute delinst"  name="academic[{{$loop->index +1}}][instname]">
                                                                                <option value="">Select</option>
                                                                                @foreach ($data['inst'] as $insti)
                                                                                    <option value="{{$insti->name}}"@if($acc->instname == $insti->name) selected = "selected" @endif >{{$insti->name}}</option>
                                                                                @endforeach
                                                                                <option value="other"@if($acc->instname == 'other') selected = "selected" @endif>Other</option>
                                                                            </select>
                                                                            @if($acc->instname =='other')
                                                                             <input type="text" class="form-control"  name="academic[{{$loop->index +1}}][instnameoth]" value="{{$acc->instnameoth}}">
                                                                             @endif

                                                                             <input type="text" class="form-control otherinst"  name="academic[{{$loop->index +1}}][instnameoth]" placeholder="Enter Institute Name" style="display:none" >

                                                                             </td>
                                                                            <!--<td>-->

                                                                                <!--<input type="text" class="form-control"  name="academic[{{$loop->index +1}}][instname]" value="{{$acc->instname}}"><br>-->
                                                                            <!--</td>-->
                                                                            <td><input type="text" class="form-control"  name="academic[{{$loop->index +1}}][cgpa]" value="{{$acc->cgpa}}"><br></td>
                                                                            <td>
                                                                                @php
                                                                                 $degree = Degree::where('degree',$acc->degree)->first();
                                                                                 $majorMinor = Degreemajorminor::where('degree_id',$degree->id)->first();
                                                                                 $decodemajor = json_decode($majorMinor->major);
                                                                                 $decodeminor = json_decode($majorMinor->minor);

                                                                                @endphp

                                                                                @if(isset($acc))
                                                                                    <select class="form-control majorapp"  name="academic[{{$loop->index +1}}][major]">
                                                                                        <option value="">Select</option>
                                                                                        @foreach($decodemajor as $maj)
                                                                                          <option value="{{$maj->major}}" @if($maj->major == $acc->major) selected = "selected" @endif>{{$maj->major}}</option>

                                                                                        @endforeach
                                                                                    </select>
                                                                                <!--<input type="text" class="form-control"  name="academic[{{$loop->index +1}}][major]" value="{{$acc->major}}"><br>-->
                                                                                @else
                                                                                 <select class="form-control majorapp"  name="academic[{{$loop->index +1}}][major]">
                                                                                        <option value="">Select</option>
                                                                                         @foreach($decodemajor as $maj)
                                                                                          <option value="{{$maj->major}}">{{$maj->major}}</option>

                                                                                        @endforeach
                                                                                    </select>
                                                                                 @endif
                                                                            </td>
                                                                               <td>
                                                                                   @if(isset($acc))
                                                                                    <select class="form-control minorapp"  name="academic[{{$loop->index +1}}][minor]">
                                                                                        <option value="">Select</option>
                                                                                        @foreach($decodeminor as $min)
                                                                                          <option value="{{$min->minor}}" @if($min->minor == $acc->minor) selected = "selected" @endif>{{$min->minor}}</option>

                                                                                        @endforeach
                                                                                    </select>
                                                                                <!--<input type="text" class="form-control"  name="academic[{{$loop->index +1}}][major]" value="{{$acc->major}}"><br>-->
                                                                                @else
                                                                                 <select class="form-control minorapp"  name="academic[{{$loop->index +1}}][minor]">
                                                                                        <option value="">Select</option>
                                                                                          @foreach($decodeminor as $min)
                                                                                          <option value="{{$min->minor}}">{{$min->minor}}</option>

                                                                                        @endforeach
                                                                                    </select>
                                                                                 @endif

                                                                                </td>

                                                                            <td><input type="text" class="form-control"  name="academic[{{$loop->index +1}}][location]" value="{{$acc->location}}"><br></td>
                                                                            <td><input type="date" class="form-control pyear"  name="academic[{{$loop->index +1}}][pyear]" value="{{$acc->pyear}}"><br></td>

                                                                            <td><span class="aremove" style="background: #ed3610;
                                                                            padding: 0px 7px;;
                                                                            color: #fff;
                                                                            border-radius: 8%;
                                                                            text-decoration: none;
                                                                            margin-bottom: 10px;
                                                                            cursor: pointer;">-</span></td>
                                                                        </tr>
                                                                    @endforeach
                                                                    @endif
                                                                </table>
                                                                <span  class="aadd_more" style="background: #0d72ba;
                                                                padding: 0px 7px;;
                                                                color: #fff;
                                                                border-radius: 8%;
                                                                text-decoration: none;
                                                                margin-bottom: 10px;
                                                                cursor: pointer;">+</span><br><br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row cbtn" style="margin:2px;">
                                                        <div class="col-12">
                                                            <button class='btn btn-block custombtn' type="submit">SUBMIT</button>
                                                        </div>
                                                    </div>
                                            </div>
                                          </form>
                                            <script>
                                                $(document).on('click','.updateeduinfo',function(e){
                                                    e.preventDefault;
                                                    $('.eduinfo').css('display','none');
                                                    $('.eduupdateinfo').css('display','block');
                                                })
                                                $('#educationalinfo').on('submit',function(e){
                                                    e.preventDefault();
                                                    //var data = $(this).serialize();
                                                    //alert (base_url)

                                                        $.ajax({
                                                        url:"{{route('educationalinfo.update')}}",
                                                        method:"POST",
                                                        data:new FormData(this),
                                                        dataType:'JSON',
                                                        contentType: false,
                                                        cache: false,
                                                        processData: false,
                                                        success:function(data)
                                                        {
                                                            //console.log(data);
                                                            toastr.options = {
                                                                    "debug": false,
                                                                    "positionClass": "toast-bottom-right",
                                                                    "onclick": null,
                                                                    "fadeIn": 300,
                                                                    "fadeOut": 1000,
                                                                    "timeOut": 5000,
                                                                    "extendedTimeOut": 1000
                                                                };
                                                                $('.eduinfo').css('display','block');
                                                               $('.eduupdateinfo').css('display','none');
                                                             $( ".eduinfo" ).load(window.location.href + " .eduinfo" );
                                                            toastr.success('Data Inserted Successfully');

                                                        }

                                                    });

                                                });
                                                $(document).on('click','.aadd_more',function(){
                                                     var pyear =  $(this).closest('.aitemWrapper').find('.aitem_tr:last').find('.pyear').val();
                                                        if(pyear==''){
                                                            alert('You have to Fill Passing year!');

                                                        }else{
                                                    var index = $('.alist').data('index_no');
                                                    $('.alist').data('index_no', index + 1);
                                                    var html = $('.aitemWrapper .aitem_tr:last').clone().find('.form-control').each(function () {
                                                        this.name = this.name.replace(/\d+/, index+1);
                                                        this.id = this.id.replace(/\d+/, index+1);
                                                        this.value = '';
                                                    }).end();
                                                    $('.amoreTable').append(html);
                                                    var rowCount = $('.amoreTable tr').length;
                                                    $(this).closest('.aitemWrapper').find('.aitem_tr:last').find('.day_no').html(rowCount-1);
                                                    $(this).closest('.aitemWrapper').find('.aitem_tr:last').find('.dayval').val(rowCount-1);
                                                        }
                                                });
                                                    $(document).on('click', '.aremove', function () {
                                                        var obj=$(this);
                                                        var count= $('.asingle_list').length;
                                                        // alert(count);
                                                        if(count > 1) {
                                                            if(obj.closest('.asingle_list').is($(this).closest('.aitemWrapper').find('.asingle_list:last'))){
                                                                obj.closest('.asingle_list').remove();
                                                            }else{
                                                                alert('You can only remove the last one!');
                                                            }
                                                        }
                                                    });
                                        </script>
                                    </div>
                                  </div>
                                </div>
                                <div class="card">
                                    <div class="card-header " id="headingFour">
                                        <h5 class="mb-0 acchead">
                                        <button class="btn btn-link collapsed commonaccrodion" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            Personal Experience
                                        </button>
                                        </h5>
                                    </div>
                                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                                        <div class="card-body">
                                              <div class="expsection">
                                                <div class="pull-right">
                                                        <i title="Edit" class="fa fa-pencil updateexpinfo" style="font-size:20px;cursor:pointer;color:#0d72ba;"></i>
                                                    </div><br><br>
                                                <div class="row" style="margin:2px;">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                            <label for="sel1"><b>Work Experience In Details</b></label>
                                                            </div>
                                                        </div>
                                                   </div>
                                                   <table class="table table-bordered table-striped">
                                                      <thead>
                                                      <tr>
                                                          <th width="20%">Job Title</th>
                                                          <th width="20%">Company Name</th>
                                                          <th width="20%">Responsibilities</th>
                                                          <th width="20%">Joined On</th>
                                                          <th width="20%">Left On</th>
                                                      </tr>
                                                      </thead>
                                                      <tbody>

                                                          @if(!empty($findCv->experience))
                                                              <?php $jsonexpdata = json_decode($findCv->experience);?>

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
                                                  </table><br>
                                                  <div class="row" style="margin:2px;">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                        <label for="sel1"><b>Project Info</b></label>
                                                        </div>
                                                    </div>
                                                    </div>
                                                      <table class="table table-bordered table-striped">
                                                          <thead>
                                                          <tr>
                                                              <th width="50%">URL</th>
                                                              <th width="50%">Details</th>
                                                          </tr>
                                                          </thead>
                                                          <tbody>

                                                              @if(!empty($findCv->project))
                                                                 <?php  $jsonprojectdata = json_decode($findCv->project);?>
                                                              @foreach($jsonprojectdata as $pro)
                                                              <tr>
                                                                <td>{{$pro->url}}</td>
                                                                <td>{{$pro->comment}}</td>
                                                              </tr>
                                                                @endforeach
                                                            @endif
                                                          </tbody>
                                                         </table><br>
                                                         <div class="row" style="margin:2px;">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                <label for="sel1"><b>Personal Achievements</b></label>
                                                                </div>
                                                            </div>
                                                            </div>
                                                              <table class="table table-bordered table-striped">
                                                                  <thead>
                                                                  <tr>
                                                                     <th>Achievements</th>
                                                                  </tr>
                                                                  </thead>
                                                                  <tbody>

                                                                      @if(!empty($findCv->achievement))
                                                                         <?php  $jsonachievementdata = json_decode($findCv->achievement);?>
                                                                        @foreach($jsonachievementdata as $achv)
                                                                      <tr>
                                                                        <td>{{$achv->achieve}}</td>
                                                                      </tr>
                                                                    @endforeach
                                                                    @endif
                                                                  </tbody>
                                                                 </table><br>
                                                        </div>
                                               <div class="expupdate" style="display:none">
                                            <form id="experienceform">
                                                @csrf
                                                <div class="col-md-12">
                                                        <div class="form-group">
                                                                <input type="hidden" class="form-control" id="" name="userid" value="{{$findCv->userid}}">
                                                                <label for="experience" class="control-label"><span style="color:red">*</span> Experience</label>
                                                            </div>
                                                        <div class="form-group">
                                                            <div class="list col-sm-12 " data-index_no="1000">
                                                                <div class="itemWrapper">
                                                                    <table class="table table-bordered moreTable">
                                                                        <tr>
                                                                            <th width="25%" class="labelclass">Job Title</th>
                                                                            <th width="15%" class="labelclass">Company Name</th>
                                                                            <th width="25%" class="labelclass">Responsibilities</th>
                                                                            <th width="15%" class="labelclass">Joined In</th>
                                                                            <th width="15%" class="labelclass">Left In</th>
                                                                            <th width="5%" class="labelclass">Option</th>
                                                                        </tr>
                                                                        @if(!empty($findCv->experience))
                                                                           <?php $jsonexpdata = json_decode($findCv->experience);?>
                                                                           @foreach($jsonexpdata as $exp)
                                                                            <tr class="item_tr single_list">
                                                                                <td><input type="text" class="form-control" id="pro_role" name="experience[{{$loop->index + 1}}][title]" value="{{$exp->title}}"><br></td>
                                                                                <td><input type="text" class="form-control" id="pro_role" name="experience[{{$loop->index + 1}}][company]" value="{{$exp->company}}"><br></td>
                                                                                <td><textarea type="text"  class="form-control" id="pro_role" name="experience[{{$loop->index + 1}}][responsibilites]" rows="4" >{{$exp->responsibilites}}</textarea><br></td>
                                                                                <td><input type="date" class="form-control joinon" id="pro_role" name="experience[{{$loop->index + 1}}][joinedin]" value="{{$exp->joinedin}}"><br></td>
                                                                                <td><input type="date" class="form-control lefton" id="pro_role" name="experience[{{$loop->index + 1}}][leftin]" value="{{$exp->leftin}}"><br></td>
                                                                                <td><span class="remove" style="background: #ed3610;
                                                                                    padding: 0px 7px;;
                                                                                    color: #fff;
                                                                                    border-radius: 8%;
                                                                                    text-decoration: none;
                                                                                    margin-bottom: 10px;
                                                                                    cursor: pointer;">-</span></td>
                                                                            </tr>
                                                                        @endforeach
                                                                        @endif
                                                                    </table>
                                                                    <span  class="add_more" style="background: #0d72ba;
                                                                    padding: 0px 7px;;
                                                                    color: #fff;
                                                                    border-radius: 8%;
                                                                    text-decoration: none;
                                                                    margin-bottom: 10px;
                                                                    cursor: pointer;">+</span><br><br>
                                                                </div>
                                                            </div>
                                                        </div>
                                                     </div>
                                                     <div class="col-md-12">
                                                            <div class="form-group">
                                                                    <label for="experience" class="control-label"><span style="color:red">*</span> Project Url</label>
                                                                </div>
                                                            <div class="form-group">
                                                                <div class="wlist col-sm-12 " data-index_no="1000">
                                                                    <div class="witemWrapper">
                                                                        <table class="table table-bordered wmoreTable">
                                                                            <tr>

                                                                                <th width="30%" class="labelclass">Url</th>
                                                                                <th width="50%" class="labelclass">Project Details</th>
                                                                                <th width="10%" class="labelclass">Option</th>
                                                                            </tr>
                                                                            @if(!empty($findCv->project))
                                                                                <?php  $jsonprojectdata = json_decode($findCv->project);?>
                                                                                @foreach($jsonprojectdata as $pro)
                                                                                <tr class="witem_tr wsingle_list">

                                                                                    <td><input type="text" class="form-control" id="pro_url" name="project[{{$loop->index + 1}}][url]" value="{{$pro->url}}"><br></td>
                                                                                <td><textarea class="form-control" id="pro_comment" name="project[{{$loop->index + 1}}][comment]">{{$pro->comment}}</textarea><br></td>
                                                                                  <td><span class="wremove" style="background: #ed3610;
                                                                                    padding: 0px 7px;;
                                                                                    color: #fff;
                                                                                    border-radius: 8%;
                                                                                    text-decoration: none;
                                                                                    margin-bottom: 10px;
                                                                                    cursor: pointer;">-</span></td>
                                                                                </tr>
                                                                                @endforeach
                                                                          @endif
                                                                        </table>
                                                                        <span  class="wadd_more" style="background: #0d72ba;
                                                                        padding: 0px 7px;;
                                                                        color: #fff;
                                                                        border-radius: 8%;
                                                                        text-decoration: none;
                                                                        margin-bottom: 10px;
                                                                        cursor: pointer;">+</span><br><br>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                         <div class="col-md-12">
                                                                <div class="form-group">
                                                                        <label for="experience" class="control-label"><span style="color:red">*</span> Personal Achievements</label>
                                                                    </div>
                                                                    <div class="form-group">
                                                                            <div class="aclist col-sm-12 " data-index_no="1000">
                                                                                <div class="acitemWrapper">
                                                                                    <table class="table table-bordered acmoreTable">
                                                                                        <tr>
                                                                                            <th width="5%" class="labelclass">S.N</th>
                                                                                            <th width="700%" class="labelclass">Achievements</th>
                                                                                           <th width="10%" class="labelclass">Remove</th>
                                                                                        </tr>
                                                                                        @if(!empty($findCv->achievement))
                                                                                            <?php  $jsonachievementdata = json_decode($findCv->achievement);?>
                                                                                            @foreach($jsonachievementdata as $achv)
                                                                                            <tr class="acitem_tr acsingle_list">
                                                                                            <td class="day_no labelclass">{{$loop->index + 1}}</td>
                                                                                                <td><textarea type="text" class="form-control" id="achievement" rows="3" name="achievement[{{$loop->index + 1}}][achieve]">{{$achv->achieve}}</textarea><br></td>
                                                                                               <td><span class="acremove" style="background: #ed3610;
                                                                                                padding: 0px 7px;;
                                                                                                color: #fff;
                                                                                                border-radius: 8%;
                                                                                                text-decoration: none;
                                                                                                margin-bottom: 10px;
                                                                                                cursor: pointer;">-</span></td>
                                                                                            </tr>

                                                                                     @endforeach
                                                                                     @endif
                                                                                    </table>
                                                                                    <span  class="acadd_more" style="background: #0d72ba;
                                                                                    padding: 0px 7px;;
                                                                                    color: #fff;
                                                                                    border-radius: 8%;
                                                                                    text-decoration: none;
                                                                                    margin-bottom: 10px;
                                                                                    cursor: pointer;">+</span><br><br>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                             </div>
                                                        <div class="row cbtn" style="margin:2px;">
                                                            <div class="col-12">
                                                                <button class='btn btn-block custombtn' type="submit">SUBMIT</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                          </div>
                                     </div>
                                    </div>
                                    <script>
          //new 2.17.2020
           $(document).on('change','.degreeonchange',function(){
            var id = $(this).find(":selected").attr('data-id');
            //$(this).closest('.aitem_tr').find('.majorapp').append('<option value="gdfg">sdfgsdfg</option>');
            var $this = $(this);
            //var id = $(this).data('id');
            $.ajax({
            url: "{!! route('degree.majorminor') !!}",
            type: "get",
            data: {
                id: id,
            },
            //context: this,
            success: function(data) {
                console.log(data);
                $this.closest('.aitem_tr').find('.majorapp').empty();
                $this.closest('.aitem_tr').find('.minorapp').empty();
                $.each(JSON.parse(data.major),function(index, majordegree){
                   if(majordegree.major==null){
                        $this.closest('.aitem_tr').find('.majorapp').append('<option >No data found</option>');
                    }else{
                        $this.closest('.aitem_tr').find('.majorapp').append('<option value="'+majordegree.major+'">'+majordegree.major+'</option>');
                    }
               });
               $.each(JSON.parse(data.minor),function(index, minordegree){
                   if(minordegree.minor==null){
                    $this.closest('.aitem_tr').find('.minorapp').append('<option >No Data Found</option>');
                    }else{
                        $this.closest('.aitem_tr').find('.minorapp').append('<option value="'+minordegree.minjor+'">'+minordegree.minor+'</option>');
                    }
               });
            }
        })
        });
        $(document).on('change','.institute',function(){
            if(this.value =='other'){

                $(this).closest('.aitem_tr').find('.otherinst').show();
            }else{
                $(this).closest('.aitem_tr').find('.otherinst').hide();
            }
        })
        //end new

                                         $(document).on('click','.updateexpinfo',function(e){
                                            e.preventDefault;
                                            $('.expsection').css('display','none');
                                            $('.expupdate').css('display','block');
                                        })
                                        $('#experienceform').on('submit',function(e){
                                                    e.preventDefault();
                                                    //var data = $(this).serialize();
                                                    //alert (base_url)

                                                        $.ajax({
                                                        url:"{{route('expinfo.update')}}",
                                                        method:"POST",
                                                        data:new FormData(this),
                                                        dataType:'JSON',
                                                        contentType: false,
                                                        cache: false,
                                                        processData: false,
                                                        success:function(data)
                                                        {
                                                            //console.log(data);
                                                            toastr.options = {
                                                                    "debug": false,
                                                                    "positionClass": "toast-bottom-right",
                                                                    "onclick": null,
                                                                    "fadeIn": 300,
                                                                    "fadeOut": 1000,
                                                                    "timeOut": 5000,
                                                                    "extendedTimeOut": 1000
                                                                };
                                                                $('.expsection').css('display','block');
                                                               $('.expupdate').css('display','none');
                                                             $( ".expsection" ).load(window.location.href + " .expsection" );
                                                            toastr.success('Data Inserted Successfully');
                                               }
                                           });
                                      });
                                    </script>
                                    <div class="card">
                                    <div class="card-header" id="headingFive">
                                        <h5 class="mb-0 acchead">
                                        <button class="btn btn-link collapsed commonaccrodion" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                              Skills
                                        </button>
                                        </h5>
                                    </div>
                                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="skillpart">
                                                    <div class="pull-right">
                                                            <i title="Edit" class="fa fa-pencil updateskillinfo" style="font-size:20px;cursor:pointer;color:#0d72ba;"></i>
                                                        </div><br><br>
                                                <table class="table table-bordered table-striped">
                                                        <thead>
                                                        <tr>

                                                            <th>Skills</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                            @if(!empty($findCv->skill))
                                                               <?php  $jsonskilldata = json_decode($findCv->skill);?>
                                                            @foreach($jsonskilldata as $sk)
                                                            <tr>
                                                              <td>{{$sk->competent}}</td>
                                                            </tr>
                                                          @endforeach
                                                          @endif
                                                        </tbody>
                                                       </table><br>
                                                 </div>

                                                 <div class="skillupdate" style="display:none">
                                                 <form id="skillform">
                                                  <div class="col-md-12" >
                                                     @csrf
                                                        <div class="form-group">
                                                                <label for="experience" class="control-label"><span style="color:red">*</span> Skills</label>
                                                                <input type="hidden" class="form-control" id="" name="userid" value="{{$findCv->userid}}">
                                                            </div>
                                                            <div class="form-group">
                                                                    <div class="sklist col-sm-12 " data-index_no="1000">
                                                                            <div class="skitemWrapper">
                                                                                <table class="table table-bordered skmoreTable">
                                                                                    <tr>
                                                                                        <th width="5%" class="labelclass">S.N</th>
                                                                                        <th width="700%" class="labelclass">Professional Or Technical Skills</th>
                                                                                       <th width="10%" class="labelclass">Remove</th>
                                                                                    </tr>
                                                                                    @if(!empty($findCv->skill))
                                                                                       <?php  $jsonskilldata = json_decode($findCv->skill);?>
                                                                                        @foreach($jsonskilldata as $sk)
                                                                                            <tr class="skitem_tr sksingle_list">
                                                                                                <td class="day_no labelclass">{{$loop->index + 1}}</td>
                                                                                                <td><input type="text" class="form-control" id="skill"  name="skill[{{$loop->index + 1}}][competent]" value="{{$sk->competent}}"><br></td>
                                                                                                <td><span class="skremove" style="background: #ed3610;
                                                                                                padding: 0px 7px;;
                                                                                                color: #fff;
                                                                                                border-radius: 8%;
                                                                                                text-decoration: none;
                                                                                                margin-bottom: 10px;
                                                                                                cursor: pointer;">-</span></td>
                                                                                            </tr>
                                                                                       @endforeach
                                                                                    @endif
                                                                                </table>
                                                                                <span  class="skadd_more" style="background: #0d72ba;
                                                                                padding: 0px 7px;;
                                                                                color: #fff;
                                                                                border-radius: 8%;
                                                                                text-decoration: none;
                                                                                margin-bottom: 10px;
                                                                                cursor: pointer;">+</span><br><br>
                                                                            </div>
                                                                        </div>
                                                            </div>
                                                     </div>
                                                     <div class="row cbtn" style="margin:2px;">
                                                            <div class="col-12">
                                                                <button class='btn btn-block custombtn' type="submit">SUBMIT</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                 </div>

                                        </div>
                                    </div>
                            </div>
                            <script>
                                $(document).on('click','.updateskillinfo',function(e){
                                    e.preventDefault;
                                    $('.skillpart').css('display','none');
                                    $('.skillupdate').css('display','block');
                                })
                                $('#skillform').on('submit',function(e){
                                            e.preventDefault();
                                            $.ajax({
                                                url:"{{route('skillinfo.update')}}",
                                                method:"POST",
                                                data:new FormData(this),
                                                dataType:'JSON',
                                                contentType: false,
                                                cache: false,
                                                processData: false,
                                                success:function(data)
                                                {
                                                console.log(data);
                                                toastr.options = {
                                                        "debug": false,
                                                        "positionClass": "toast-bottom-right",
                                                        "onclick": null,
                                                        "fadeIn": 300,
                                                        "fadeOut": 1000,
                                                        "timeOut": 5000,
                                                        "extendedTimeOut": 1000
                                                };
                                                $('.skillpart').css('display','block');
                                                $('.skillupdate').css('display','none');
                                                $( ".skillpart" ).load(window.location.href + " .skillpart" );
                                                    toastr.success('Data Inserted Successfully');
                                        }
                                    });
                               });
                            </script>
                            <div class="card">
                                    <div class="card-header" id="headingSix">
                                        <h5 class="mb-0 acchead">
                                        <button class="btn btn-link collapsed commonaccrodion" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                                Reference Name
                                        </button>
                                        </h5>
                                    </div>
                                    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
                                        <div class="card-body">
                                                <div class="refpart">
                                                        <div class="pull-right">
                                                                <i title="Edit" class="fa fa-pencil updaterefinfo" style="font-size:20px;cursor:pointer;color:#0d72ba;"></i>
                                                            </div><br><br>
                                                            <table class="table table-bordered table-striped">
                                                                    <thead>
                                                                    <tr>
                                                                       <th width="30%">Title</th>
                                                                        <th width="30%">Company</th>
                                                                        <th width="30%">Contact Info</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                        @if(!empty($findCv->reference))
                                                                           <?php  $jsonreferencedata = json_decode($findCv->reference);?>
                                                                        @foreach($jsonreferencedata as $ref)
                                                                        <tr>

                                                                        <td>{{$ref->title}}</td>
                                                                        <td>{{$ref->company}}</td>
                                                                        <td>{{$ref->contactinfo}}</td>
                                                                        </tr>
                                                                      @endforeach
                                                                      @endif
                                                                    </tbody>
                                                    </table><br>
                                                </div>
                                                <div class="refupdate" style="display:none">
                                                    <form id="refform">
                                                        @csrf
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                                <input type="hidden" class="form-control" id="" name="userid" value="{{$findCv->userid}}">
                                                                <label for="experience" class="control-label"><span style="color:red">*</span> Refarence</label>
                                                            </div>
                                                            <div class="form-group">
                                                                    <div class="relist col-sm-12 " data-index_no="1000">
                                                                            <div class="reitemWrapper">
                                                                                <table class="table table-bordered remoreTable">
                                                                                    <tr>
                                                                                        <th width="5%" class="labelclass">S.N</th>
                                                                                        <th width="20%" class="labelclass">Title</th>
                                                                                        <th width="20%" class="labelclass">Company</th>
                                                                                        <th width="40%" class="labelclass">Contactinfo</th>
                                                                                        <th width="15%" class="labelclass">Remove</th>
                                                                                    </tr>
                                                                                    @if(!empty($findCv->reference))
                                                                                      <?php  $jsonreferencedata = json_decode($findCv->reference);?>
                                                                                        @foreach($jsonreferencedata as $ref)
                                                                                        <tr class="reitem_tr resingle_list">
                                                                                        <td class="day_no labelclass" >{{$loop->index + 1}}</td>
                                                                                            <td><input type="text" class="form-control"  name="reference[{{$loop->index + 1}}][title]" value="{{$ref->title}}"><br></td>
                                                                                            <td><input type="text" class="form-control"  name="reference[{{$loop->index + 1}}][company]" value="{{$ref->company}}"><br></td>
                                                                                            <td><input type="text" class="form-control"  name="reference[{{$loop->index + 1}}][contactinfo]" value="{{$ref->contactinfo}}"><br></td>
                                                                                            <td><span class="reremove" style="background: #ed3610;
                                                                                            padding: 0px 7px;;
                                                                                            color: #fff;
                                                                                            border-radius: 8%;
                                                                                            text-decoration: none;
                                                                                            margin-bottom: 10px;
                                                                                            cursor: pointer;">-</span></td>
                                                                                        </tr>
                                                                                        @endforeach
                                                                                    @endif
                                                                                </table>
                                                                                <span  class="readd_more" style="background: #0d72ba;
                                                                                padding: 0px 7px;;
                                                                                color: #fff;
                                                                                border-radius: 8%;
                                                                                text-decoration: none;
                                                                                margin-bottom: 10px;
                                                                                cursor: pointer;">+</span><br><br>
                                                                            </div>
                                                                        </div>
                                                            </div>
                                                     </div>
                                                     <div class="row cbtn" style="margin:2px;">
                                                            <div class="col-12">
                                                                <button class='btn btn-block custombtn' type="submit">SUBMIT</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    </div>
                                        </div>
                                    </div>
                            </div>
                    </div>
                    <script>
                                $(document).on('click','.updaterefinfo',function(e){
                                    e.preventDefault;
                                    $('.refpart').css('display','none');
                                    $('.refupdate').css('display','block');
                                })
                                $('#refform').on('submit',function(e){
                                            e.preventDefault();
                                            $.ajax({
                                                url:"{{route('refinfo.update')}}",
                                                method:"POST",
                                                data:new FormData(this),
                                                dataType:'JSON',
                                                contentType: false,
                                                cache: false,
                                                processData: false,
                                                success:function(data)
                                                {
                                                console.log(data);
                                                toastr.options = {
                                                        "debug": false,
                                                        "positionClass": "toast-bottom-right",
                                                        "onclick": null,
                                                        "fadeIn": 300,
                                                        "fadeOut": 1000,
                                                        "timeOut": 5000,
                                                        "extendedTimeOut": 1000
                                                };
                                                $('.refpart').css('display','block');
                                                $('.refupdate').css('display','none');
                                                $( ".refpart" ).load(window.location.href + " .refpart" );
                                                    toastr.success('Data Inserted Successfully');
                                        }
                                    });
                               });
                    </script>
                    <script>
                           $(document).on('click','.add_more',function(){
                               var lefton =  $(this).closest('.itemWrapper').find('.item_tr:last').find('.lefton').val();
                                var joinon =  $(this).closest('.itemWrapper').find('.item_tr:last').find('.joinon').val();

                                    if(joinon=='' || lefton =='' ){
                                        alert('You have to Fill Left In and Join In must.If status is running choose current date!');
                                    }else{
                                    var index = $('.list').data('index_no');
                                    $('.list').data('index_no', index + 1);
                                    var html = $('.itemWrapper .item_tr:last').clone().find('.form-control').each(function () {
                                        this.name = this.name.replace(/\d+/, index+1);
                                        this.id = this.id.replace(/\d+/, index+1);
                                        this.value = '';
                                    }).end();
                                    $('.moreTable').append(html);
                                    var rowCount = $('.moreTable tr').length;
                                    $(this).closest('.itemWrapper').find('.item_tr:last').find('.day_no').html(rowCount-1);
                                    $(this).closest('.itemWrapper').find('.item_tr:last').find('.dayval').val(rowCount-1);
                                    }
                                });
                                $(document).on('click', '.remove', function () {
                                    var obj=$(this);
                                    var count= $('.single_list').length;
                                    // alert(count);
                                    if(count > 1) {
                                        if(obj.closest('.single_list').is($(this).closest('.itemWrapper').find('.single_list:last'))){
                                            obj.closest('.single_list').remove();
                                        }else{
                                            alert('You can only remove the last one!');
                                        }
                                    }
                                });
                                $(document).on('click','.wadd_more',function(){
                                var index = $('.wlist').data('index_no');
                                $('.wlist').data('index_no', index + 1);
                                var html = $('.witemWrapper .witem_tr:last').clone().find('.form-control').each(function () {
                                    this.name = this.name.replace(/\d+/, index+1);
                                    this.id = this.id.replace(/\d+/, index+1);
                                    this.value = '';
                                }).end();
                                $('.wmoreTable').append(html);
                                var rowCount = $('.wmoreTable tr').length;
                                $(this).closest('.witemWrapper').find('.witem_tr:last').find('.day_no').html(rowCount-1);
                                $(this).closest('.witemWrapper').find('.witem_tr:last').find('.dayval').val(rowCount-1);
                            });
                            $(document).on('click', '.wremove', function () {
                                var obj=$(this);
                                var count= $('.wsingle_list').length;
                                // alert(count);
                                if(count > 1) {
                                    if(obj.closest('.wsingle_list').is($(this).closest('.witemWrapper').find('.wsingle_list:last'))){
                                        obj.closest('.wsingle_list').remove();
                                    }else{
                                        alert('You can only remove the last one!');
                                    }
                                }
                            });
                            $(document).on('click','.acadd_more',function(){
                                var index = $('.aclist').data('index_no');
                                $('.aclist').data('index_no', index + 1);
                                var html = $('.acitemWrapper .acitem_tr:last').clone().find('.form-control').each(function () {
                                    this.name = this.name.replace(/\d+/, index+1);
                                    this.id = this.id.replace(/\d+/, index+1);
                                    this.value = '';
                                }).end();
                                $('.acmoreTable').append(html);
                                var rowCount = $('.acmoreTable tr').length;
                                $(this).closest('.acitemWrapper').find('.acitem_tr:last').find('.day_no').html(rowCount-1);
                                $(this).closest('.acitemWrapper').find('.acitem_tr:last').find('.dayval').val(rowCount-1);
                            });
                            $(document).on('click', '.acremove', function () {
                                var obj=$(this);
                                var count= $('.acsingle_list').length;
                                // alert(count);
                                if(count > 1) {
                                    if(obj.closest('.acsingle_list').is($(this).closest('.acitemWrapper').find('.acsingle_list:last'))){
                                        obj.closest('.acsingle_list').remove();
                                    }else{
                                        alert('You can only remove the last one!');
                                    }
                                }
                            });
                            $(document).on('click','.skadd_more',function(){
                            var index = $('.sklist').data('index_no');
                            $('.sklist').data('index_no', index + 1);
                            var html = $('.skitemWrapper .skitem_tr:last').clone().find('.form-control').each(function () {
                                this.name = this.name.replace(/\d+/, index+1);
                                this.id = this.id.replace(/\d+/, index+1);
                                this.value = '';
                            }).end();
                            $('.skmoreTable').append(html);
                            var rowCount = $('.skmoreTable tr').length;
                            $(this).closest('.skitemWrapper').find('.skitem_tr:last').find('.day_no').html(rowCount-1);
                            $(this).closest('.skitemWrapper').find('.skitem_tr:last').find('.dayval').val(rowCount-1);
                        });
                        $(document).on('click', '.skremove', function () {
                            var obj=$(this);
                            var count= $('.sksingle_list').length;
                            // alert(count);
                            if(count > 1) {
                                if(obj.closest('.sksingle_list').is($(this).closest('.skitemWrapper').find('.sksingle_list:last'))){
                                    obj.closest('.sksingle_list').remove();
                                }else{
                                    alert('You can only remove the last one!');
                                }
                            }
                        });
                        $(document).on('click','.readd_more',function(){
                            var index = $('.relist').data('index_no');
                            $('.relist').data('index_no', index + 1);
                            var html = $('.reitemWrapper .reitem_tr:last').clone().find('.form-control').each(function () {
                                this.name = this.name.replace(/\d+/, index+1);
                                this.id = this.id.replace(/\d+/, index+1);
                                this.value = '';
                            }).end();
                            $('.remoreTable').append(html);
                            var rowCount = $('.remoreTable tr').length;
                            $(this).closest('.reitemWrapper').find('.reitem_tr:last').find('.day_no').html(rowCount-1);
                            $(this).closest('.reitemWrapper').find('.reitem_tr:last').find('.dayval').val(rowCount-1);
                        });
                        $(document).on('click', '.reremove', function () {
                            var obj=$(this);
                            var count= $('.resingle_list').length;
                            // alert(count);
                            if(count > 1) {
                                if(obj.closest('.resingle_list').is($(this).closest('.reitemWrapper').find('.resingle_list:last'))){
                                    obj.closest('.resingle_list').remove();
                                }else{
                                    alert('You can only remove the last one!');
                                }
                            }
                        });

                    </script>
                  </div>
                 </div>
              </div>
        </div>
    </section>
@endsection
