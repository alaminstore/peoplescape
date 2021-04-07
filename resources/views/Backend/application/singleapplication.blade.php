@extends('Backend.backendmaster')
@section('application-active','active')
@section('title', 'PeopleScape | Application Lists')
@section('content')
<section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">Applicant Details Information</h3>
             <a href="{{route('pdfcreate.generate',['id'=>$careerInfoByid->id])}}" target="_blank">Create PDF</a>
             <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
             </div>
          <div class="box-body">
            <table class="table table-bordered table-striped">
                    <tr>
                        <td width="40%"><b>Name</b></td>
                        <td width="60%">{{$careerInfoByid->name}}</td>
                    </tr>
                    <tr>
                        <td width="40%"><b>Email</b></td>
                        <td width="60%">{{$careerInfoByid->email}}</td>
                    </tr>
                    <tr>
                        <td width="40%"><b>Mobile</b></td>
                        <td width="60%">{{$careerInfoByid->mobile}}</td>
                    </tr>
                    <tr>
                        <td width="40%"><b>Home Address</b></td>
                        <td width="60%">{{$careerInfoByid->haddress}}</td>
                    </tr>
                    <tr>
                        <td width="40%"><b>Permanent Address</b></td>
                        <td width="60%">{{$careerInfoByid->paddress}}</td>
                    </tr>
                    <tr>
                        <td width="40%"><b>NID/Birth/Passport/Driving</b></td>
                        <td width="60%">{{$careerInfoByid->nid}}</td>
                    </tr>
                    <tr>
                        <td width="40%"><b>Gender</b></td>
                        <td width="60%">{{$careerInfoByid->gender}}</td>
                    </tr>
                    <tr>
                        <td width="40%"><b>Marital Status</b></td>
                        <td width="60%">{{$careerInfoByid->marital_status}}</td>
                    </tr>
                    
            </table><br>
           <div class="row" style="margin:2px;">
                <div class="col-12">
                    <div class="form-group">
                    <label for="sel1"><b>Objective</b></label>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                
                <textarea name="coverletter" class="form-control" rows="8">{{$careerInfoByid->objective}}</textarea>
                </div>
            </div>
             <div class="row" style="margin:2px;">
                    <div class="col-12">
                        <div class="form-group">
                        <label for="sel1"><b>Accademic Information</b></label>
                        </div>
                    </div>
             </div>
             <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th width="15%">University</th>
                    <th width="15%">Degree</th>
                    <th width="10%">Score</th>
                    <th width="15%">Major</th>
                    <th width="15%">Minor</th>
                    <th width="15%">Location</th>
                    <th width="15%">Passing Year</th> 
                </tr>
                </thead>
                <tbody>
                   @if(!empty($careerInfoByid->academic))
                    <?php $jsonaccdata = json_decode($careerInfoByid->academic);?>
                        @foreach($jsonaccdata as $acc)
                        <tr>
                        <td>{{$acc->instname=='other' ? $acc->instnameoth : $acc->instname }}</td>
                        <td>{{$acc->degree}}</td>
                        <td>{{$acc->cgpa}}</td>
                        <td>
                             @if(array_key_exists('major', $acc))
                            {{$acc->major}}
                            @else
                            {{N/A}}
                            @endif
                        </td>
                        <td>
                            @if(array_key_exists('minor', $acc))
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
            </table><br>
      
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
              <th width="40%">URL</th>
              <th width="60%">Details</th>
          </tr>
          </thead>
          <tbody>
              @if(!empty($careerInfoByid->project))
                 <?php  $jsonprojectdata = json_decode($careerInfoByid->project);?>
              
              
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
                      
                      @if(!empty($careerInfoByid->achievement))
                         <?php  $jsonachievementdata = json_decode($careerInfoByid->achievement);?>
                      
                      
                      @foreach($jsonachievementdata as $achv)
                      <tr>
                     
                      <td>{{$achv->achieve}}</td>
                      </tr>
                    @endforeach
                    @endif
                  </tbody>
                 </table><br>
                 <div class="row" style="margin:2px;">
                    <div class="col-12">
                        <div class="form-group">
                        <label for="sel1"><b>Professional or technical skills</b></label>
                        </div>
                    </div>
                    </div>
                      <table class="table table-bordered table-striped">
                          <thead>
                          <tr>
                             
                              <th>Skills</th>
                          </tr>
                          </thead>
                          <tbody>
                              
                              @if(!empty($careerInfoByid->skill))
                                 <?php  $jsonskilldata = json_decode($careerInfoByid->skill);?>
                              
                              
                              @foreach($jsonskilldata as $sk)
                              <tr>
                             
                              <td>{{$sk->competent}}</td>
                              </tr>
                            @endforeach
                            @endif
                          </tbody>
                         </table><br>
         <div class="row" style="margin:2px;">
            <div class="col-12">
                <div class="form-group">
                <label for="sel1"><b>Coverletter</b></label>
                
                <textarea name="coverletter" class="form-control" rows="8">{{$careerInfoByid->interest}}</textarea>
                </div>
            </div>
     </div>
     <div class="row" style="margin:2px;">
        <div class="col-12">
            <div class="form-group">
            <label for="sel1"><b>Reference Name</b></label>
            </div>
        </div>
        </div>
          <table class="table table-bordered table-striped">
              <thead>
              <tr>
                 
                  <th width="30%">Title</th>
                  <th width="30%">Company</th>
                  <th width="30%">Contact Info</th>
              </tr>
              </thead>
              <tbody>
                  
                  @if(!empty($careerInfoByid->reference))
                     <?php  $jsonreferencedata = json_decode($careerInfoByid->reference);?>
                  
                  
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
         @if($careerInfoByid->cv)
         <div class="row" style="margin:2px;">
          <div class="col-12">
              <div class="form-group">
              <label for="sel1"><b>Download CV</b></label>
              <a href="{{url('/'.$careerInfoByid->cv)}}"> Download</a>
            </div>
          </div>
          </div>
          @endif
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
</section>
@endsection