@extends('Backend.backendmaster')
@section('career-active','active')
@section('title', 'PeopleScape | Career|'.$data['careerbyid']->title)
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
        </style>
        <div class="box box-info">
             <div class="box-header with-border">
                              <h3 class="box-title">{{$data['careerbyid']->title}}</h3><div class="rightportion">
                                   <?php if(Auth::check()){ 
                                            if(Auth::user()->status =='superadmin' || Auth::user()->status =='moderator' || Auth::user()->status =='AppAdmin')
                                            { ?>
                                               <a href="{{route('shortlisted.applicantlist',['id'=>$id])}}" class="common-button pull-right">Shortlisted Applicant</a>
                                               <a href="{{route('career.applicantlist',['id'=>$id])}}" class="pull-right common-button">Applicant List</a></div>
                                    <?php
                                            } 
                                        } else {
                                            return redirect()->route('login');
                                        }
                                     ?>
                                     
             </div>
             {!!Form::open(['class' => 'form-horizontal','id'=>'jobupdate','enctype'=>'multipart/form-data'])!!}
             <div class="box-body">
                 <div class="form-group">
                     <label for="title" class="col-sm-2 control-label">Job Title (2)</label>
                     <div class="col-sm-8">
                     <input type="text" class="form-control" id="title" name="title" value="{{$data['careerbyid']->title}}">
                     <input type="hidden" class="form-control" id="id" name="id" value="{{$data['careerbyid']->id}}">

                     </div>
                 </div>
                 <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Company Name (2)</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="company" name="company" value="{{$data['careerbyid']->company}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Experience</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="experience" name="experience" value="{{$data['careerbyid']->experience}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Vacancy</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="vacancy" name="vacancy" value="{{$data['careerbyid']->vacancy}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Education</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="education" name="education" value="{{$data['careerbyid']->education}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Deadline</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="deadline" name="deadline" value="{{$data['careerbyid']->deadline}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Location</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="location" name="location" value="{{$data['careerbyid']->location}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Salary</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="salary" name="salary" value="{{$data['careerbyid']->salary}}">
                    </div>
                </div>
               
                <div class="form-group">
                    <label for="department"  class="col-sm-2 control-label">Select Category</label>
                    <div class="col-sm-8">
                      <select id="category" class="form-control"  name="catid">
                          <option value="">Select Category</option>
                          @foreach($data['cat'] as $category)
                              <option value="{{$category->id}}"@if($category->id == $data['careerbyid']->catid) selected = 'selected' @endif >{{$category->title}}</option>
                          @endforeach
                      </select>
                    </div>
                  </div>
                
                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Job Description</label>
                    <div class="col-sm-8">
                    <textarea type="text" class="form-control" id="topdescription" name="topdescription"  rows="8">{{$data['careerbyid']->topdescription}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Responsibilities Text</label>
                    <div class="col-sm-8">
                    <textarea type="text" class="form-control" id="responsibilitiestext" name="responsibilitiestext"  rows="5">{{$data['careerbyid']->responsibilitiestext}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Responsibilities</label>
                    @php
                      $program = json_decode($data['careerbyid']->responsibilitiespoint);
                    @endphp
                <div class="list col-sm-8 " data-index_no="1000">
                    <div class="itemWrapper">
                        <table class="table table-bordered moreTable">
                            <tr>
                                <th width="5%">Serial No</th>
                                <th width="50%">Responsibilities</th>
                                <th width="15%">Option</th>
                            </tr>
                             @foreach ($program as $item)
                                 
                            
                                <tr class="item_tr single_list">
                                    <td class="day_no">{{$loop->index +1}}</td>
                                    <td><input type="text" class="form-control" id="pro_description" name="program[{{$loop->index +1}}][responsibilitiespoint]" value="{{$item->responsibilitiespoint}}" ><br></td>
                                    <td><span class="remove" style="background: #ed3610;padding: 8px 10px;color: #fff;border-radius: 6%;text-decoration: none;cursor:pointer">-</span></td>
                                </tr>
                                @endforeach
                        </table>
            
                    </div>
                </div>
            </div> 
            <div class="form-group">
                <label for="title" class="col-sm-2 control-label">Qualifications</label>
                @php
                $qualification = json_decode($data['careerbyid']->qualification);
              @endphp
            <div class="slist col-sm-8 " data-index_no="1000">
                <div class="sitemWrapper">
                    <table class="table table-bordered smoreTable">
                        <tr>
                            <th width="5%">Serial No</th>
                            <th width="50%">Qualification</th>
                            <th width="15%">Option</th>
                        </tr>
                        @foreach ($qualification as $quali)
                            <tr class="sitem_tr ssingle_list">
                                <td class="day_no">{{$loop->index +1}}</td>
                            <td><input type="text" class="form-control" id="pro_description" name="qualification[{{$loop->index +1}}][qualification]" value="{{$quali->qualification}}" ><br></td>
                                <td><span class="sremove" style="background: #ed3610;padding: 8px 10px;color: #fff;border-radius: 6%;text-decoration: none;cursor:pointer">-</span></td>
                            </tr>
                     @endforeach
                    </table>
                    
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">How To Apply Text</label>
            <div class="col-sm-8">
            <textarea type="text" class="form-control" id="howtoapply" name="howtoapply"  rows="5">{{$data['careerbyid']->howtoapply}}</textarea>
            </div>
        </div>
             </div>
            
             {!!Form::close()!!}
         </div>
     </section>
@endsection