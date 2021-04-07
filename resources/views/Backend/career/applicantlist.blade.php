@extends('Backend.backendmaster')
@section('career-active','active')
@section('title', 'PeopleScape | Application Lists')
@section('content')
<section class="content">
        <style>
                .common-button{
                    border: 1px solid #3c8dbc;
                    padding: 4px 11px;
                    border-radius: 3px;
                    background: #00c0ef;
                    color: #fff;
                    font-weight: bold;
                    margin-left: 12px;
                    font-size: 15px;
                    cursor: pointer;
                }
                .common-button:hover{
                  background: transparent;
                  color:teal;
                  font-weight: bolder;
                  font-size: 15px;
                }
                .rightportion{
                    padding-right: 182px;
        
                }
                .loader{
                  position: absolute;
                    top: 246px;
                    left: 437px;
                }
                </style>
 @php
    use App\Shortlisted;
@endphp
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">Applicant  List <span class="countnumber"><small class="textcount">{{count($countApplicant)}}</small></span></h3>
            <div class="rightportion"><a  data-toggle="modal" data-target="#emailmodal" data-type="bulk" class="common-button pull-right commonmailsort" style="display:none">Sendmail</a><a  data-toggle="modal" data-target="#emailmodal" data-type="bulk" class="common-button pull-right commonmail">Sendmail</a><a href="{{route('shortlisted.applicantlist',['id'=>$id])}}" class="common-button pull-right">Shortlisted Applicant</a><a href="{{route('careerjob.detail',['id'=>$id])}}" class="pull-right common-button">Go Back</a>@if(count($applicantByjobid) > 0)<a href="{{route('zip.singlecv',['id'=>$id])}}" class="pull-right common-button cmnfilter">Export PDF</a>@endif<button  class="pull-right filteritemPdf common-button" style="display:none">Export PDF</button><button class="exel pull-right common-button" style="display:none">Excel</button></div>
             <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
             </div>
             
             <div class="box-header">
              {!!Form::open(['class' => 'form-horizontal','id'=>'searchform'])!!}
              <div class="col-md-12" style="margin-bottom:10px;">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="title" class="col-sm-4 control-label">Area:</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="area" id="area">
                        <option value="">SelectOption</option>
                        <option value="Dhaka">Dhaka</option>
                        <option value="Rajshahi">Rajshahi</option>
                        <option value="Khulna">Khulna</option>
                        <option value="Chittagong">Chittagong</option>
                        <option value="Barisal">Barisal</option>
                        <option value="Mymensingh">Mymensingh</option>
                        <option value="Rangpur">Rangpur </option>
                        <option value="Sylhet">Sylhet </option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="title" class="col-sm-4 control-label">age:</label>
                    <div class="col-sm-8">
                          <select class="form-control" name="age" id="age">
                            <option value="">SelectOption</option>
                            <option value="18-25">18-25</option>
                            <option value="26-35">26-35</option>
                            <option value="36-45">36-45</option>
                            <option value="46-55">46-55</option>
                          </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="title" class="col-sm-4 control-label">Date:</label>
                    <div class="col-sm-8">
                    <input type="date" class="form-control" id="date" name="dateee" name="dateee" placeholder="Enter User Email">
                    <input type="hidden" class="form-control" id="jobbid" name="id" value="{{$id}}">

                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="title" class="col-sm-4 control-label">Degree:</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="degree" id="degree">
                                <option value="">SelectOption</option>
                                @foreach($degrees as $degree)
                                 <option value="{{$degree->degree}}">{{$degree->degree}}</option>
                                @endforeach
                            </select>
                        </div>
                      </div>
                </div>
              </div> <br>
              <div class="col-md-12">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="title" class="col-sm-4 control-label">CGPA:</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="cgpa" id="cgpa">
                                <option value="">SelectOption</option>
                                <option value="3.6-4.0">3.6-4.0</option>
                                <option value="3.0-3.5">3.0-3.5</option>
                                <option value="2.5-2.9">2.5-2.9</option>
                            </select>
                        </div>
                      </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="title" class="col-sm-4 control-label">Gender:</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="gender" id="gender">
                            <option value="">SelectOption</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                      <label for="title" class="col-sm-4 control-label"></label>
                      <div class="col-sm-8">
                          <div>
                              <button type="submit" class="btn btn-success btn-block">Submit</button>
                          </div>
                      </div>
                    </div>
                  </div>
              </div>
             {!!Form::close()!!}
            </div>
           <button class="btn btn-primary excel">Exportexcel</button>  
          <div class="box-body hiden">
          
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
               <th width="5%">S.I</th>
                <th width="20%">Name</th>
                <th width="20%">Email</th> 
                <th width="20%">MobileNO</th>
                <th width="15%">Shortlist</th>
                <th width="20%">Sendmail</th>
                
              </tr>
              </thead>
              <tbody id="applicantlistforemail">
                @foreach($applicantByjobid as $val)
               <tr>
              <td>{{$loop->index + 1}}</td>
               <td><a href="{{route('application.show',['id'=>$val->cvid])}}" style="cursor:pointer">{{$val->name}}</a></td>
                  <td class="bulkemail" id="{{$val->email}}">{{$val->email}}</td>
                  <td>{{$val->mobile}}</td>
               <td>
                 @php
                   $find = Shortlisted::where('job_id',$val->jobid)->where('user_id',$val->id)->first();
                 @endphp
                 @if($find )
                  <span class="unsortedlist stargreen" data-filterchk="{{$val->id}}" data-jobid="{{$val->jobid}}" data-userid="{{$val->id}}" style="cursor:pointer;font-size:24px;"><i class="fa fa-star"></i></span>
                @else
                  <span class="sortedlist stardeem" data-filterchk="{{$val->id}}" data-jobid="{{$val->jobid}}" data-userid="{{$val->id}}" style="cursor:pointer;font-size:24px;"><i class="fa fa-star"></i></span>
                @endif
                </td>
                <td><a  data-toggle="modal" data-target="#emailmodal" data-id="{{$val->email}}" data-type="single" class="common-button singlecommonmail">Sendmail</a></td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
          <div class="box-body filterresultexcel" style="display:none">
              <table id="table3excel" class="table table-bordered table-striped ">
                <thead>
                <tr class="noExl">
                  <th >Name</th>
                   <th >Email</th> 
                   <th >MobileNO</th>
                   <th >Last Degree</th>
                   <th >Last Institution</th>
                   <th >Major</th>
                   <th >Minor</th>
                   <th >Last Organization</th>
                   <th >Year Of Experience</th>
                   <th>Age</th>
                   <th >Gender</th>       
                  
                </tr>
                <tr style="display:none">
                   <th>Name</th>
                   <th>Email</th> 
                   <th >MobileNO</th>
                   <th>Last Degree</th>
                   <th>Last Institution</th>
                   <th>Major</th>
                   <th>Minor</th>
                   <th>Last Organization</th>
                   <th>Year Of Experience</th>
                   <th>Age</th>
                   <th>Gender</th>                   
                 </tr>
                </thead>
                <tbody class="">
                   @foreach($userid as $key=>$item)
                        <tr>
                          <td>{{ $item['name']}}</td>
                          <td>{{ $item['email']}}</td>
                          <td>{{ $item['mobile']}}</td>
                            <td>{{$item['lastdegree']}}</td>
                          <td>{{$item['lastinst']}}</td>
                          <td>{{$item['major']}}</td>
                          <td>{{$item['minor']}}</td>
                          <td>{{$item['lastcompany']}}</td>
                          <td>{{ $item['experience']}}</td>
                          <td>{{ $item['age']}}</td>
                          <td>{{ $item['gender']}}</td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          <div class="loader" style="display: none">
              <div style="background:url(/frontEnd/loader1.gif) no-repeat center center;width:150px;height:150px;"></div>
           </div>
          <div class="box-body filterresult" style="display:none">
              <table id="" class="table table-bordered table-striped">
                <thead>
                <tr>
                 <th width="5%">S.I</th>
                  <th width="20%">Name</th>
                  <th width="20%">Email</th> 
                  <th width="20%">MobileNO</th>
                  <th width="15%">Shortlist</th>
                   <th width="20%">Email</th>
                  
                </tr>
                </thead>
                <tbody class="filterdataapp" id="applicantlistforemailsort">
                </tbody>
              </table>
            </div>
            <div class="box-body filterresultexcel" style="display:none">
              <table id="table2excel" class="table table-bordered table-striped ">
                <thead>
                <tr class="noExl">
                  <th >Name</th>
                   <th >Email</th> 
                   <th >MobileNO</th>
                   <th >Last Degree</th>
                   <th >Last Institution</th>
                   <th >Major</th>
                   <th >Minor</th>
                   <th >Last Organization</th>
                   <th >Year Of Experience</th>
                   <th>Age</th>
                   <th >Gender</th>       
                  
                </tr>
                <tr style="display:none">
                   <th>Name</th>
                   <th>Email</th> 
                   <th >MobileNO</th>
                   <th>Last Degree</th>
                   <th>Last Institution</th>
                   <th>Major</th>
                   <th>Minor</th>
                   <th>Last Organization</th>
                   <th>Year Of Experience</th>
                   <th>Age</th>
                   <th>Gender</th>                   
                 </tr>
                </thead>
                <tbody class="filterdataappexcel">
               
                </tbody>
              </table>
            </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
</section>
<div class="modal fade" id="emailmodal">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Email Description</h4>
                    </div>
                      <div class="modal-body">
                          {!!Form::open(['class' => 'form-horizontal','id'=>'mailapplicant'])!!}
                          <div class="box-body">
                            <div class="form-group">
                            <label for="link" class="col-sm-2 control-label">To:</label>
                            <div class="col-sm-10">
                                <textarea  class="form-control" id="singledata" rows="3" readonly></textarea>
                                <input type="hidden" id ="type" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="link" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <textarea  class="form-control" id="emailbody" name="emailbody" placeholder="Write Description" rows="8" required></textarea>
                            </div>
                        </div>
                    </div>
                          <div class="box-footer">
                            <button type="submit" class="btn btn-info"><i class="fa fa-spinner fa-spin buttonloader" style="display:none"></i> Send</button>
                          </div>
                          {!!Form::close()!!}
                    </div>
                  </div>
               </div>
        </div>
<script>
$(document).on('click','.commonmailsort',function(e){
    e.preventDefault();
    var emailbody = $('#mailapplicant').find('#emailbody').val();
     var data=[];
    // get image ids order
    $('#applicantlistforemailsort .bulkemail').each(function(){
        var id = $(this).attr('id');
        data.push(id);
    });
     $('#mailapplicant').find('#singledata').val(data);
    $('#mailapplicant').find('#type').val('bulksort');
    console.log(data);
})
$(document).on('click','.singlecommonmail',function(e){
    e.preventDefault();
    $('#mailapplicant').find('#type').val($(this).data('type'));
    $('#mailapplicant').find('#singledata').val($(this).data('id'));
})
$(document).on('click','.commonmail',function(e){
    e.preventDefault();
     var data=[];
        var emailbody = $('#mailapplicant').find('#emailbody').val();
        // get image ids order
        $('#applicantlistforemail .bulkemail').each(function(){
            var id = $(this).attr('id');
            data.push(id);
        });
         $('#mailapplicant').find('#singledata').val(data);
    $('#mailapplicant').find('#type').val($(this).data('type'));
})
$(document).on('submit','#mailapplicant',function(e){
    e.preventDefault();
    var type = $('#mailapplicant').find('#type').val();
    if(type =='bulk' || type =='bulksort' ){
        if(type =='bulk'){
           var data=[];
        var emailbody = $('#mailapplicant').find('#emailbody').val();
        // get image ids order
        $('#applicantlistforemail .bulkemail').each(function(){
            var id = $(this).attr('id');
            data.push(id);
        }); 
        }
        if(type =='bulksort'){
           var data=[];
            var emailbody = $('#mailapplicant').find('#emailbody').val();
            // get image ids order
            $('#applicantlistforemailsort .bulkemail').each(function(){
                var id = $(this).attr('id');
                data.push(id);
            });  
        }
        
        console.log(data.length);
        if(data.length > 0){
           $.ajax({
          url: "{!! route('send.bulkmail') !!}",
          type: "get", 
          data: {  
              data:data, 
              emailbody:emailbody,
          },
          beforeSend: function(){
                  // Show image container
                  $(".buttonloader").show();
                },
            success: function(data) {
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
            toastr.success('Mail was sent Successfully!');
             $('#mailapplicant').trigger('reset');
            setTimeout(function() {$('#emailmodal').modal('hide');}, 1500);
                console.log(data);
            },
             complete:function(data){
             $(".buttonloader").hide();
              //$("#searchform").trigger('reset');
            }
        }); 
        }else{
            toastr.options = {
                    "debug": false,
                    "positionClass": "toast-bottom-right",
                    "onclick": null,
                    "fadeIn": 300,
                    "fadeOut": 1000,
                    "timeOut": 5000,
                    "extendedTimeOut": 1000
                };
            toastr.warning('No Mail Address Was Selected!');
        }
        
            
    }else{
        
        var emailbody = $('#mailapplicant').find('#emailbody').val();
        var data = $('#mailapplicant').find('#singledata').val();
        if(data){
            $.ajax({
          url: "{!! route('send.bulkmail') !!}",
          type: "get", 
          data: {  
              data:data, 
              emailbody:emailbody,
          },
          beforeSend: function(){
                  // Show image container
                  $(".buttonloader").show();
                },
            success: function(data) {
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
            toastr.success('Mail was sent Successfully!');
             $('#mailapplicant').trigger('reset');
            setTimeout(function() {$('#emailmodal').modal('hide');}, 1500);
                console.log(data);
            },
             complete:function(data){
             $(".buttonloader").hide();
              //$("#searchform").trigger('reset');
            }
        });
        }else{
            toastr.options = {
                    "debug": false,
                    "positionClass": "toast-bottom-right",
                    "onclick": null,
                    "fadeIn": 300,
                    "fadeOut": 1000,
                    "timeOut": 5000,
                    "extendedTimeOut": 1000
                };
            toastr.warning('No Mail Address Was Selected!');
        }
        
        
    }
    
     
})
$(document).on('submit','#searchform',function(e){
      e.preventDefault();
      let jobid = $('#jobbid').val();
      let area = $('#area').val();
      let age = $('#age').val();
      let dateee = $('#dateee').val();
      let cgpa = $('#cgpa').val();
      let gender = $('#gender').val();
      let degree = $('#degree').val();
      if(area =='' && age =='' &&  cgpa == '' && gender== '' && degree== '' && degree==''){
          alert('Please atleast select one option');
      }else{
        $('.filterdataapp').empty();
        $('.hiden').hide();
        $('.filterresult').show();
         $('.exel').show();
         $('.excel').hide();
        $('.filterdataappexcel').empty();
        $.ajax({
              url:"{!! route('applicant.filter') !!}",
              method:"POST",
              data:new FormData(this),
              dataType:'JSON',
              contentType: false,
              cache: false,
              processData: false,
                beforeSend: function(){
                  // Show image container
                  $(".loader").show();
                },
                  success:function(data)
                  {
                       $('.commonmailsort').show();
                         $('.commonmail').remove();
                     var countKey = Object.keys(data).length;
                    //console.log(countKey);
                    if(countKey> 0){
                        $('.cmnfilter').hide();
                        $('.filteritemPdf').show()
                       
                    
                    toastr.options = {
                            "debug": false,
                            "positionClass": "toast-bottom-right",
                            "onclick": null,
                            "fadeIn": 300,
                            "fadeOut": 1000,
                            "timeOut": 5000,
                            "extendedTimeOut": 1000
                            };
                    toastr.success('Data Was Filtered Successfully');
                      var i=0;
                        $.each(data,function(index,filterdata){ 
                          i++
                          if(filterdata.status=='sortlisted'){
                              $('.filterdataapp').append(`<tr id="`+filterdata.userid+`">
                                <td>`+ i +`</td>
                              <td scope="row">`+filterdata.name+`</td>
                              <td class="bulkemail" id="`+filterdata.email+`">`+filterdata.email+`</td>
                              <td>`+filterdata.mobile+`</td>
                              <td> 
                                  <span class="unsortedlist stargreen"  data-jobid="`+jobid+`" data-userid="`+filterdata.userid+`" style="cursor:pointer;font-size:24px;"><i class="fa fa-star"></i></span>              
                              </td>
                              <td><a  data-toggle="modal" data-target="#emailmodal" data-id="`+filterdata.email+`" data-type="single" class="common-button singlecommonmail">Sendmail</a></td>
                            </tr>`);
                            
                          }else{
                            $('.filterdataapp').append(`<tr id="`+filterdata.userid+`">
                                <td>`+ i +`</td>
                              <td scope="row">`+filterdata.name+`</td>
                              <td class="bulkemail" id="`+filterdata.email+`">`+filterdata.email+`</td>
                              <td>`+filterdata.mobile+`</td>
                              <td> 
                                  <span class="sortedlist stardeem" data-jobid="`+jobid+`" data-userid="`+filterdata.userid+`" style="cursor:pointer;font-size:24px;"><i class="fa fa-star"></i></span>
                  
                              </td>
                              <td><a  data-toggle="modal" data-target="#emailmodal" data-id="`+filterdata.email+`" data-type="single" class="common-button singlecommonmail">Sendmail</a></td>
                            </tr>`);
                          }
                          $('.filterdataappexcel').append(`<tr>
                          <td scope="row">`+filterdata.name+`</td>
                          <td>`+filterdata.email+`</td>
                          <td>`+filterdata.mobile+`</td>
                          <td>`+filterdata.lastdegree+`</td>
                          <td>`+filterdata.lastinst+`</td>
                          <td>`+filterdata.major+`</td>
                          <td>`+filterdata.minor+`</td>
                          <td>`+filterdata.lastcompany+`</td>
                          <td>`+filterdata.experience +` years</td>
                          <td>`+filterdata.age+`</td>
                          <td>`+filterdata.gender+`</td>
                        </tr>`);
                          
                        })  
                         $('.textcount').text(i); 
                    }else{
                        toastr.options = {
                            "debug": false,
                            "positionClass": "toast-bottom-right",
                            "onclick": null,
                            "fadeIn": 300,
                            "fadeOut": 1000,
                            "timeOut": 5000,
                            "extendedTimeOut": 1000
                            };
                    toastr.warning('Sorry!No data found');
                    $('.filterdataapp').append(`<tr><td></td><td></td><td width="30%"><h3>No data found!!</h3></td><td></td></tr>`);
                        
                    }
              },
                complete:function(data){
              $(".loader").hide();
              //$("#searchform").trigger('reset');
            }
                          
         });

      }

    });
        $(document).on('click','.sortedlist',function(e){
        e.preventDefault();
        $(this).removeClass('stardeem');
        $(this).removeClass('sortedlist');
        $(this).addClass('stargreen');
        $(this).addClass('unsortedlist');
        var jobid = $(this).data('jobid');
        var userid = $(this).data('userid');
        $.ajax({
      url: "{!! route('shortlist.applicant') !!}",
      type: "get", 
      data: {  
          jobid: jobid, 
          userid: userid, 
      },
        success: function(data) {
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
            toastr.success('Applicant was shortlisted!');          
         } 
    });
    })
    $(document).on('click','.unsortedlist',function(e){
        e.preventDefault();
        $(this).removeClass('stargreen');
        $(this).removeClass('unsortedlist');
        $(this).addClass('stardeem');
        $(this).addClass('sortedlist');
        var jobid = $(this).data('jobid');
        var userid = $(this).data('userid');
        $.ajax({
    url: "{!! route('unshortlist.applicant') !!}",
    type: "get", 
    data: {  
        jobid: jobid, 
        userid: userid, 
    },
        success: function(data) {
            toastr.options = {
                    "debug": false,
                    "positionClass": "toast-bottom-right",
                    "onclick": null,
                    "fadeIn": 300,
                    "fadeOut": 1000,
                    "timeOut": 5000,
                    "extendedTimeOut": 1000
                };
            toastr.warning('Applicant was Un-shortlisted !');
          } 
      });
    })
    $(document).on('click','.filteritemPdf',function(e){
      e.preventDefault();
      var ids = [];
      // get image ids order
      $('.filterdataapp tr').each(function(){
      var id = $(this).attr('id');
        ids.push(id);
      });
      $.ajax({
      url: "{!! route('filterd.pdf') !!}",
      type: "get", 
      data: {  
            ids: ids, 
          },
          success: function(response) {
            //console.log('success');
            window.location='/filtered.zip';
          }
        });
      console.log(ids);

    })
    </script>
@endsection

@push('scripts')
    <script src="{{asset('backEnd/dist/jquery.table2excel.js')}}"></script>

    <script>
    $(document).on('click','.exel',function(){
      $("#table2excel").table2excel({
        // exclude CSS class
        exclude: ".noExl",
        name: "applicant",
        filename: "SomeFile", //do not include extension
        fileext: ".xls" // file extension
      }); 
    });
     $(document).on('click','.excel',function(){
      $("#table3excel").table2excel({
        // exclude CSS class
        exclude: ".noExl",
        name: "applicant",
        filename: "SomeFile", //do not include extension
        fileext: ".xls" // file extension
      }); 
    });
    
  </script>
@endpush