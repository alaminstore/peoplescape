@extends('Backend.backendmaster')
@section('career-active','active')
@section('title', 'PeopleScape | Career|'.$data['careerbyid']->title)
@section('content')
<section class="content">
        <div class="box box-info">
             <div class="box-header with-border">
             <h3 class="box-title">Job Post</h3>
             </div>
             {!!Form::open(['route'=>'career.update','class' => 'form-horizontal','id'=>'jobupdate','enctype'=>'multipart/form-data'])!!}
             <div class="box-body">
                 <div class="form-group">
                     <label for="title" class="col-sm-2 control-label">Job Title</label>
                     <div class="col-sm-8">
                     <input type="text" class="form-control" id="title" name="title" value="{{$data['careerbyid']->title}}">
                     <input type="hidden" class="form-control" id="id" name="id" value="{{$data['careerbyid']->id}}">

                     </div>
                 </div>
                 <div class="form-group">
                    <label for="short_code" class="col-sm-2 control-label">Job Short Code</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="short_code" name="short_code"
                               placeholder="HRM,ACCOUNTANT,DEVELOPER, etc ... " value="{{$data['careerbyid']->short_code}}">
                    </div>
                </div>
                 <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Company Name</label>
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
                    <label for="title" class="col-sm-2 control-label">Job Type</label>
                    <div class="col-sm-8">
                       <select  class="form-control"  name="jobtype">
                          <option value="">Select Jobtype</option>
                          @foreach($data['jobnature'] as $type)
                              <option value="{{$type->nature}}"@if($type->nature == $data['careerbyid']->jobtype) selected = 'selected' @endif >{{$type->nature}}</option>
                          @endforeach
                      </select>
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
                    <input type="date" class="form-control" id="deadline" name="deadline" value="{{$data['careerbyid']->deadline}}">
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
                        <span  class="add_more" style="background: #28d19c;
                                                                padding: 8px 21px;
                                                                color: #fff;
                                                                border-radius: 8%;text-decoration: none; margin-bottom: 10px;cursor:pointer;">+</span><br><br>
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
                    <span  class="sadd_more" style="background: #28d19c;
                                                            padding: 8px 21px;
                                                            color: #fff;
                                                            border-radius: 8%;text-decoration: none; margin-bottom: 10px;cursor:pointer;">+</span><br><br>
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
             <div class="box-footer">
                 <button type="submit" class="btn btn-info">Update</button>
             </div>
             {!!Form::close()!!}
         </div>
     </section>
     <script>
                $(document).on('click', '.sadd_more', function () {
                        var index = $('.slist').data('index_no');
                        $('.slist').data('index_no', index + 1);
                        var html = $('.sitemWrapper .sitem_tr:last').clone().find('.form-control').each(function () {
                            this.name = this.name.replace(/\d+/, index+1);
                            this.id = this.id.replace(/\d+/, index+1);
                            this.value = '';
                        }).end();
                        $('.smoreTable').append(html);
                        var rowCount = $('.smoreTable tr').length;
                        $(this).closest('.sitemWrapper').find('.sitem_tr:last').find('.day_no').html(rowCount-1);
                        $(this).closest('.sitemWrapper').find('.sitem_tr:last').find('.dayval').val(rowCount-1);
                    });
                    $(document).on('click', '.sremove', function () {
                        var obj=$(this);
                        var count= $('.ssingle_list').length;
                        // alert(count);
                        if(count > 1) {
                            if(obj.closest('.ssingle_list').is($(this).closest('.sitemWrapper').find('.ssingle_list:last'))){
                                obj.closest('.ssingle_list').remove();
                            }else{
                                alert('You can only remove the last one!');
                            }
                        }
                    });
                    $(document).on('click', '.add_more', function () {
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
    </script>
@endsection
