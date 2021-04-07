@extends('Backend.backendmaster')
@section('career-active','active')
@section('title', 'PeopleScape | Career')
@section('content')
<section class="content" >
    <div class="box box-info">
            <div class="box-header with-border">
            <h3 class="box-title">Career Options</h3>
                <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
            </div>
            <ul class="nav nav-tabs">
                <li class="active commonlitabforcash"><a data-toggle="tab" href="#tab2">Post Job</a></li>
                @if(Auth::user()->status !='moderator')
                <li class=" commonlitabforcash"><a data-toggle="tab" href="#tab1">Career  Category</a></li>
                <li class="commonlitabforcash"><a data-toggle="tab" href="#tab4">Job Nature</a></li>
                <li class=" commonlitabforcash"><a data-toggle="tab" href="#tab3">Career  Head</a></li>
                @endif
            </ul>
        <div class="tab-content">
            <div id="tab3" class="tab-pane fade in">
                <section class="content" id="careerheadref">
                <div class="box box-info">
                        <div class="box-header with-border">
                        <h3 class="box-title">Career Head</h3>
                        
                        </div>
                        {!!Form::open(['class' => 'form-horizontal','id'=>'careerhead','enctype'=>'multipart/form-data'])!!}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">Title</label>
                                <div class="col-sm-8">
                                <input type="text" class="form-control" id="title" name="title" value="{{$data['careerhead']->title}}">
                                <input type="hidden" class="form-control" id="id" name="id" value="{{$data['careerhead']->id}}">
        
                            </div>
                            </div>
                        
                        <div class="form-group">
                                <label for="title" class="col-sm-2 control-label"></label>
                                <div class="col-md-10">
                                <img id="myImage" class="img-responsive" width="200" height="100" src="{{url('/'.$data['careerhead']->image)}}" alt="">
                                </div>
                                </div>
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">Image (748X530)</label>
                            <div class="col-sm-8">
                            <input type="file" class="form-control" id="image" name="image">
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
                    $(document).ready(function () {
                    $('#careerhead').validate({ 
                        rules: {
                            title: 
                            {
                                required: true,
                                
                            },
                            
                            
                            
                        },
                        
                        highlight: function(element) {
                            $(element).parent().addClass('has-error');
                        },
                        unhighlight: function(element) {
                            $(element).parent().removeClass('has-error');
                        },
                    });
                    });
                    $(document).on('submit','#careerhead',function(e){
                        e.preventDefault();
                        //var data = $(this).serialize();
                        if ($('#careerhead').valid()) {
                        $.ajax({
                        url:"{!! route('careerhead.update') !!}",
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
                            toastr.success('Data Updated Successfully');
                                
                    
                            $("#careerheadref").load(location.href + " #careerheadref");
                            }
                            
                        });
                    }
                })
              </script>
             </div>
            <div id="tab1" class="tab-pane fade in ">
                <section class="content">
                        <div class="box box-info">
                             <div class="box-header with-border">
                             <h3 class="box-title">Career Category</h3>
                             </div>
                             {!!Form::open(['class' => 'form-horizontal','id'=>'category','enctype'=>'multipart/form-data'])!!}
                             <div class="box-body">
                                 <div class="form-group">
                                     <label for="title" class="col-sm-2 control-label">Title (2)</label>
                                     <div class="col-sm-8">
                                     <input type="text" class="form-control" id="title" name="title" placeholder="Enter category Title">
                                     </div>
                                 </div>
                             </div>
                             <div class="box-footer">
                                 <button type="submit" class="btn btn-info">Submit</button>
                             </div>
                             {!!Form::close()!!}
                         </div>
                     </section>
                    <section class="content">
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="box box-info">
                            <div class="box-header">
                              <h3 class="box-title">Category  List</h3>
                               <div class="box-tools pull-right">
                                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                                </div>
                               </div>
                            <div class="box-body">
                              <table id="example2" class="table table-bordered table-striped catprepend">
                                <thead>
                                <tr>
                                  <th width="20%">Title</th>
                                  <th width="40%">Created At</th>
                                   <th width="15%">Action</th>
                                </tr>
                                </thead>
                                <tbody class="catappend">
                                  @foreach($data['cat'] as $category)
                                 <tr class='unqcat{{$category->id}}'>
                                    <td>{{$category->title}}</td>
                                    <td>{{$category->created_at}}</td>
                                     <td>
                                      <a data-id ="{{$category->id}}" data-toggle="modal" data-target="#catupdate" class="editcat"><span class="glyphicon glyphicon-edit btn btn-primary btn-sm"></span></a>
                                      <a class="deletecat" data-id ="{{$category->id}}"><span class="glyphicon glyphicon-trash btn btn-danger btn-sm"></span></a>
                                    </td>
                                  </tr>
                                @endforeach
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
                        {{-- //department edit modal --}}
                        <div class="modal fade" id="catupdate">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                  <h4 class="modal-title">Edit Category Info</h4>
                                </div>
                                  <div class="modal-body">
                                      {!!Form::open(['class' => 'form-horizontal','id'=>'updatecat','enctype'=>'multipart/form-data'])!!}
                                      <div class="box-body">
                                          <div class="form-group">
                                              <label for="title" class="col-sm-2 control-label">Title (2)</label>
                                              <div class="col-sm-8">
                                              <input type="text" class="form-control" id="title" name="title" placeholder="Enter  Title">
                                              <input type="hidden" class="form-control" id="id" name="id" placeholder="Enter Image Title">
                  
                                              </div>
                                          </div>
                                         
        
                                      <div class="box-footer">
                                          <button type="submit" class="btn btn-info">Update</button>
                                      </div>
                                      {!!Form::close()!!}
                                </div>
                              </div>
                           </div>
                    </div>
                    <script>
                    //Form validation Script
                    $(document).ready(function () {
                      $('#category').validate({ 
                        rules: {
                              title: 
                              {
                                required: true,
                                
                              },
                             
                        },
                        
                        highlight: function(element) {
                            $(element).parent().addClass('has-error');
                        },
                        unhighlight: function(element) {
                            $(element).parent().removeClass('has-error');
                        },
                      });
                    });
                    //Form validation Script
                    $(document).ready(function () {
                      $('#updatecat').validate({ 
                        rules: {
                              title: 
                              {
                                required: true,
                                
                              },
                              
                              
                        },
                        
                        highlight: function(element) {
                            $(element).parent().addClass('has-error');
                        },
                        unhighlight: function(element) {
                            $(element).parent().removeClass('has-error');
                        },
                      });
                    });
                       $('#category').on('submit',function(e){
                            e.preventDefault();
                            //alert('ok');
                            //var data = $(this).serialize();
                            if ($('#category').valid()) {
                             $.ajax({
                                url:"{{route('careercat.store')}}",
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
                                  toastr.success('Data Inserted Successfully');
                                   $('.catappend').prepend(`<tr class='unqcat`+data.id+`'>
                                    <td>`+data.title+`</td>
                                    <td>`+data.created_at+`</td>
                                    <td>
                                      <a data-id ="`+data.id+`" data-toggle="modal" data-target="#catupdate" class="editcat"><span class="glyphicon glyphicon-edit btn btn-primary btn-sm"></span></a>
                                      <a class="deletecat" data-id ="`+data.id+`" ><span class="glyphicon glyphicon-trash btn btn-danger btn-sm"></span></a>
                                    </td>
                                  </tr>`);          
                                  $('#category').trigger('reset');
                                }
                                
                            });
                            }
                       });
                    $(document).on('click','.editcat',function(){
                      var id = $(this).data('id');
                      $.ajax({
                        url: "{!! route('careercat.edit') !!}",
                        type: "get", 
                        data: {  
                            id: id, 
                        },
                        success: function(data) {
                           
                            $('#updatecat').find('#title').val(data.title);
                            $('#updatecat').find('#id').val(data.id);

                        
                         }
                        });
                    })
                    $(document).on('submit','#updatecat',function(e){
                      e.preventDefault();
                            //var data = $(this).serialize();
                            if ($('#updatecat').valid()) {
                                $.ajax({
                                url:"{!! route('careercat.update') !!}",
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
                                    toastr.success('Data Updated Successfully');
                                    $('.unqcat'+data.id).replaceWith(`<tr class='unqcat`+data.id+`'>
                                    <td>`+data.title+`</td>
                                    <td>`+data.created_at+`</td>
                                    <td>
                                      <a data-id ="`+data.id+`" data-toggle="modal" data-target="#catupdate" class="editcat"><span class="glyphicon glyphicon-edit btn btn-primary btn-sm"></span></a>
                                      <a class="deletecat" data-id ="`+data.id+`" ><span class="glyphicon glyphicon-trash btn btn-danger btn-sm"></span></a>
                                    </td>
                                  </tr>`);    
                                    setTimeout(function() {$('#catupdate').modal('hide');}, 1500);
                        
                                    $('#updatecat').trigger('reset');
                                }
                                
                            });
                        }
                    })
                    $(document).on('click','.deletecat',function(e) {
                        e.preventDefault();
                        var id = $(this).data('id');
                        //alert(role);
                        Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!',
                        
                        }).then(result => {
                        
                        if (result.value) {
                            $.ajax({
                            url: "{!! route('careercat.delete') !!}",
                            type: "get", 
                            data: {  
                                id: id, 
                            },
                            success: function(data) {
                                }
                            });
                            
                            $(this).closest('tr').hide();
                            
                        }
                        }
                    )
                });
            </script>
        </div>
        </div>
        <div id="tab2" class="tab-pane fade in active">
            @if(Auth::user()->status !='moderator')
            <section class="content">
                    <div class="box box-info">
                         <div class="box-header with-border">
                         <h3 class="box-title">Job Post</h3>
                         </div>
                         {!!Form::open(['class' => 'form-horizontal','id'=>'myjob','enctype'=>'multipart/form-data'])!!}
                         <div class="box-body">
                             <div class="form-group">
                                 <label for="title" class="col-sm-2 control-label">Job Title (2)</label>
                                 <div class="col-sm-8">
                                 <input type="text" class="form-control" id="title" name="title" placeholder="Enter category Title">
                                 </div>
                             </div>
                             <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">Company Name (2)</label>
                                <div class="col-sm-8">
                                <input type="text" class="form-control" id="company" name="company" placeholder="Enter Company Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">Experience</label>
                                <div class="col-sm-8">
                                <input type="text" class="form-control" id="experience" name="experience" placeholder="Enter experience">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">Vacancy</label>
                                <div class="col-sm-8">
                                <input type="text" class="form-control" id="vacancy" name="vacancy" placeholder="Enter vacancy ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">Job Type</label>
                                <div class="col-sm-8">
                                   <select  class="form-control"  name="jobtype">
                                      <option value="">Select Jobtype</option>
                                      @foreach($data['jobnature'] as $type)
                                          <option value="{{$type->nature}}" >{{$type->nature}}</option>
                                      @endforeach
                                  </select> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">Education</label>
                                <div class="col-sm-8">
                                <input type="text" class="form-control" id="education" name="education" placeholder="Enter education">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">Deadline</label>
                                <div class="col-sm-8">
                                <input type="date" class="form-control" id="deadline" name="deadline" placeholder="Enter deadline">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">Location</label>
                                <div class="col-sm-8">
                                <input type="text" class="form-control" id="location" name="location" placeholder="Enter location">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">Salary</label>
                                <div class="col-sm-8">
                                <input type="text" class="form-control" id="salary" name="salary" placeholder="Enter Salary">
                                </div>
                            </div>
                           
                            <div class="form-group">
                                <label for="department"  class="col-sm-2 control-label">Select Category</label>
                                <div class="col-sm-8">
                                  <select id="category" class="form-control"  name="catid">
                                      <option value="">Select Category</option>
                                      @foreach($data['cat'] as $category)
                                          <option value="{{$category->id}}" >{{$category->title}}</option>
                                      @endforeach
                                  </select>
                                </div>
                              </div>
                            
                            <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">Job Description</label>
                                <div class="col-sm-8">
                                <textarea type="text" class="form-control" id="topdescription" name="topdescription" placeholder="Enter Job Description" rows="8"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">Responsibilities Text</label>
                                <div class="col-sm-8">
                                <textarea type="text" class="form-control" id="responsibilitiestext" name="responsibilitiestext" placeholder="Enter Job responsibilitiestext" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">Responsibilities</label>
                            <div class="list col-sm-8 " data-index_no="1000">
                                <div class="itemWrapper">
                                    <table class="table table-bordered moreTable">
                                        <tr>
                                            <th width="5%">Serial No</th>
                                            <th width="50%">Responsibilities</th>
                                            <th width="15%">Option</th>
                                        </tr>
                                         
                                            <tr class="item_tr single_list">
                                                <td class="day_no">1</td>
                                                <td><input type="text" class="form-control" id="pro_description" name="program[0][responsibilitiespoint]" ><br></td>
                                                <td><span class="remove" style="background: #ed3610;padding: 8px 10px;color: #fff;border-radius: 6%;text-decoration: none;cursor:pointer">-</span></td>
                                            </tr>
                                       
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
                        <div class="slist col-sm-8 " data-index_no="1000">
                            <div class="sitemWrapper">
                                <table class="table table-bordered smoreTable">
                                    <tr>
                                        <th width="5%">Serial No</th>
                                        <th width="50%">Qualification</th>
                                        <th width="15%">Option</th>
                                    </tr>
                                     
                                        <tr class="sitem_tr ssingle_list">
                                            <td class="day_no">1</td>
                                            <td><input type="text" class="form-control" id="pro_description" name="qualification[0][qualification]" ><br></td>
                                            <td><span class="sremove" style="background: #ed3610;padding: 8px 10px;color: #fff;border-radius: 6%;text-decoration: none;cursor:pointer">-</span></td>
                                        </tr>
                                 
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
                        <textarea type="text" class="form-control" id="howtoapply" name="howtoapply" placeholder="Enter howtoapply" rows="5"></textarea>
                        </div>
                    </div>
                         </div>
                         <div class="box-footer">
                             <button type="submit" class="btn btn-info">Submit</button>
                         </div>
                         {!!Form::close()!!}
                     </div>
                 </section>
                 @endif
                <!--<section class="content">-->
                <!--  <div class="row">-->
                <!--    <div class="col-xs-12">-->
                <!--      <div class="box box-info">-->
                <!--        <div class="box-header">-->
                <!--          <h3 class="box-title">Job  List</h3>-->
                <!--           <div class="box-tools pull-right">-->
                <!--              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>-->
                <!--              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>-->
                <!--            </div>-->
                <!--           </div>-->
                <!--        <div class="box-body">-->
                <!--          <table id="example1" class="table table-bordered table-striped jobprepend">-->
                <!--            <thead>-->
                <!--            <tr>-->
                <!--                <th width="15%">Title</th>-->
                <!--               <th width="15%">Company</th>-->
                <!--               <th width="15%">Experience</th>-->
                <!--               <th width="15%">Total Applicant</th>-->
                <!--               <th width="15%">Shortlisted Applicant</th>-->
                <!--               <th width="20%">Action</th>-->
                <!--            </tr>-->
                <!--            </thead>-->
                <!--            <tbody class="jobappend">-->
                <!--              @foreach($data['job'] as $job)-->
                <!--             <tr class='unqjob{{$job->id}}'>-->
                <!--                <td>-->
                <!--                  <a href="{{route('careerjob.detail',['id'=>$job->id])}}" target="_blank">{{$job->title}}</a>-->
                <!--                </td>-->
                <!--                <td>{{$job->company}}</td>-->
                <!--                <td>{{$job->experience}}</td>-->
                <!--                <td><span class="countnumber"><small class="textcount">{{$job->totalapplicant}}</small></span></td>-->
                <!--                <td><span class="countnumber"><small class="textcount">{{$job->totalshortlisted}}</small></span></td>-->
                <!--                 @if(Auth::user()->status =='moderator')-->
                <!--                 <td>N/A</td>-->
                <!--                  @else-->
                <!--                 <td>-->
                <!--                  <a href="{{ route('career.edit',['id'=>$job->id]) }}"><span class="glyphicon glyphicon-edit btn btn-primary btn-sm"></span></a>-->
                <!--                  <a class="deletejob" data-id="{{$job->id}}"><span class="glyphicon glyphicon-trash btn btn-danger btn-sm"></span></a>-->
                <!--                   <a href="{{route('careerjob.detail',['id'=>$job->id])}}" target="_blank"><span class="glyphicon glyphicon-eye-open btn btn-info btn-sm"></span></a>-->
                <!--                  <label class="switch">-->
                <!--                      <input type="checkbox" {{$job->status ==1 ? 'checked':''}}>-->
                <!--                      <span data-jobid="{{$job->id}}" data-ofid="0" data-onid="1" class="slider round {{$job->status == 1 ? 'jobdeactive':'jobactive'}}"></span>-->
                <!--                  </label>-->
                <!--                </td>-->
                <!--               @endif-->
                <!--              </tr>-->
                <!--            @endforeach-->
                <!--            </tbody>-->
                <!--          </table>-->
                <!--        </div>-->
                        <!-- /.box-body -->
                <!--      </div>-->
                      <!-- /.box -->
                <!--    </div>-->
                    <!-- /.col -->
                <!--  </div>-->
                <!--</section>-->
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
                    $('#myjob').validate({ 
                        rules: {
                              title: 
                              {
                                required: true,
                                
                              },
                              company: 
                              {
                                required: true,
                                
                              },
                              jobtype:{
                                  required: true,
                              },
                              experience: 
                              {
                                required: true,
                                
                              },
                              vacancy: 
                              {
                                required: true,
                                
                              },
                              education: 
                              {
                                required: true,
                                
                              },
                              deadline: 
                              {
                                required: true,
                                
                              },
                              location: 
                              {
                                required: true,
                                
                              },
                              salary: 
                              {
                                required: true,
                                
                              },
                              topdescription: 
                              {
                                required: true,
                                
                              },
                              responsibilitiestext: 
                              {
                                required: true,
                                
                              },
                              howtoapply: 
                              {
                                required: true,
                                
                              },
                              howtoapply: 
                              {
                                required: true,
                                
                              },
                                 catid: 
                              {
                                required: true,
                                
                              },
                             
                        },
                        
                        highlight: function(element) {
                            $(element).parent().addClass('has-error');
                        },
                        unhighlight: function(element) {
                            $(element).parent().removeClass('has-error');
                        },
                    });
                    $('#myjob').on('submit',function(e){
                            e.preventDefault();
                            //alert('ok');
                            //var data = $(this).serialize();
                             if ($('#myjob').valid()) {
                             $.ajax({
                                url:"{{route('careerop.store')}}",
                                method:"POST",
                              data:new FormData(this),
                              dataType:'JSON',
                              contentType: false,
                              cache: false,
                              processData: false,
                                success:function(data)
                                {
                                 //console.log(data);
                                //  var newid = data.id;
                                //   var base = "{!! route('career.edit') !!}";
                                //   var url = base+'?id='+id ;
                                //   window.location.href=url;
                             //console.log(url);
                                  toastr.options = {
                                          "debug": false,
                                          "positionClass": "toast-bottom-right",
                                          "onclick": null,
                                          "fadeIn": 300,
                                          "fadeOut": 1000,
                                          "timeOut": 5000,
                                          "extendedTimeOut": 1000
                                        };
                                  toastr.success('Data Inserted Successfully');
                                   $('.jobappend').prepend(`<tr class='unqjob`+data.id+`'>
                                    <td>`+data.title+`</td>
                                    <td>`+data.company+`</td>
                                    <td>`+data.experience+`</td>
                                    <td>`+data.salary+`</td>
                                    <td>`+data.location+`</td>
                                    <td>
                                      <a href="`+url+`"  class="editjob"><span class="glyphicon glyphicon-edit btn btn-primary btn-sm"></span></a>
                                      <a class="deletejob" data-id ="`+data.id+`" ><span class="glyphicon glyphicon-trash btn btn-danger btn-sm"></span></a>
                                    </td>
                                  </tr>`);          
                                  $('#myjob').trigger('reset');
                                }
                                
                            });
                           }
                       });

                    //    $(document).on('click','.editjob',function(){
                    //     var id = $(this).data('id');
                    //     $.ajax({
                    //       url: "{!! route('career.edit') !!}",
                    //       type: "get", 
                    //       data: {  
                    //           id: id, 
                    //       },
                    //       success: function(data) {
                            
                    //         // var newid = data.id;
                    //         // var base = "{!! route('career.edit') !!}";
                    //         // var url = base+'?id='+id ;
                    //         //  window.location.href=url;
                    //          //console.log(url);

                          
                    //       }
                    //     });
                    // })

                       $(document).on('click','.deletejob',function(e) {
                        e.preventDefault();
                        var id = $(this).data('id');
                        //alert(role);
                        Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!',
                        
                        }).then(result => {
                        
                        if (result.value) {
                            $.ajax({
                            url: "{!! route('career.delete') !!}",
                            type: "get", 
                            data: {  
                                id: id, 
                            },
                            success: function(data) {
                                }
                            });
                            
                            $(this).closest('tr').hide();
                            
                        }
                        }
                    )
                });
       $(document).on('click','.jobdeactive',function(){
        var id = $(this).data('ofid');
        var jobid = $(this).data('jobid');
        $(this).removeClass('jobdeactive');
        $(this).addClass('jobactive');
        $.ajax({
          url: "{!! route('job.status') !!}",
          type: "get", 
          data: {  
            id: id, 
            jobid: jobid, 

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
          toastr.success('Job Was  Deactivated Successfully');
          },
          error: function(xhr) {
            //Do Something to handle error
          }
        });
    });
    $(document).on('click','.jobactive',function(){
        var id = $(this).data('onid');
        var jobid = $(this).data('jobid');
        $(this).removeClass('jobactive');
        $(this).addClass('jobdeactive');
        $.ajax({
          url: "{!! route('job.status') !!}",
          type: "get", 
          data: {  
            id: id, 
            jobid: jobid, 
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
          toastr.success('Job Was  activated Successfully');
          },
          error: function(xhr) {
            //Do Something to handle error
          }
        });
    });
         </script>
    </div>
    <div id="tab4" class="tab-pane fade in">
            <div class="row">
              <div class="col-md-12"><br>
                <div class="box box-info">
                  <div class="box-header with-border">
                    <h3 class="box-title">Job Nature</h3>                   
                    </div>
                  <div class="col-md-4">
                    <section class="content">
                     {!!Form::open(['class' => 'form-horizontal','id'=>'jobnature'])!!}
                          <div class="box-body">
                              <div class="form-group">
                                  <label for="title" class="col-sm-2 control-label">Nature </label>
                                  <div class="col-sm-8">
                                  <input type="text" class="form-control" id="nature" name="nature" placeholder="Ex: Full Time..">
                                  </div>
                              </div>
                          </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info btn-block">Submit</button>
                        </div>
                      {!!Form::close()!!}
                     </section>
                  </div>
                  <div class="col-md-8">
                      <section class="content">
                              <div class="row">
                              <div class="col-xs-12">
                              <div class="box-body">
                                  <table id="example1" class="table table-bordered table-striped ">
                                      <thead>
                                      <tr>
                                      <th width="50%">Nature</th>
                                      <th width="30%">Action</th>
                                      </tr>
                                      </thead>
                                      <tbody class="jobnatureappend">
                                        @foreach($data['jobnature'] as $jn )
                                        <tr class="unqjobnature{{$jn->id}}">
                                          <td>{{$jn->nature}}</td>
                                          <td>
                                              <a data-id ="{{$jn->id}}" data-toggle="modal" data-target="#degreeupdatemodal" class="editjobnature"><span class="glyphicon glyphicon-edit btn btn-primary btn-sm"></span></a>
                                              <a class="deletejobnature" data-id ="{{$jn->id}}" ><span class="glyphicon glyphicon-trash btn btn-danger btn-sm"></span></a>
                                          </td>
                                      </tr>
                                      @endforeach
                                      </tbody>
                                  </table>
                                  </div>
                              </div>                             
                          </div>
                      </section>
                      <div class="modal fade" id="degreeupdatemodal">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Jobnature Info</h4>
                                  </div>
                                    <div class="modal-body">
                                        {!!Form::open(['class' => 'form-horizontal','id'=>'updatejobnature'])!!}
                                        <div class="box-body">
                                      <div class="form-group">
                                          <label for="link" class="col-sm-2 control-label">Nature</label>
                                          <div class="col-sm-8">
                                              <input type="text" class="form-control" id="nature" name="nature">
                                              <input type="hidden" class="form-control" id="id" name="id">
                                          </div>
                                      </div>
                                  </div>
                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-info">Update</button>
                                        </div>
                                        {!!Form::close()!!}
                                  </div>
                                </div>
                             </div>
                      </div>
                  </div>
                  <script>
                      $(document).ready(function () {
                          $('#jobnature').validate({ 
                          rules:{
                              nature: 
                                  {
                                  required: true,
                                  
                              },
                         },
                          
                          highlight: function(element) {
                              $(element).parent().addClass('has-error');
                          },
                          unhighlight: function(element) {
                              $(element).parent().removeClass('has-error');
                          },
                          });
                          
                      });
                      $('#jobnature').on('submit',function(e){
                          e.preventDefault();
                          if ($('#jobnature').valid()) {
                              $.ajax({
                              url:"{{route('jobnature.store')}}",
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
                                  toastr.success('Data Inserted Successfully');
                                  $('.jobnatureappend').prepend(`<tr class='unqjobnature`+data.id+`'>
                                  <td>`+data.nature+`</td>
                                  <td>
                                      <a data-id ="`+data.id+`" data-toggle="modal" data-target="#degreeupdatemodal" class="editjobnature"><span class="glyphicon glyphicon-edit btn btn-primary btn-sm"></span></a>
                                      <a class="deletejobnature" data-id ="`+data.id+`" ><span class="glyphicon glyphicon-trash btn btn-danger btn-sm"></span></a>
                                  </td>
                                  </tr>`);          
                                  $('#jobnature').trigger('reset');
                              }
                              
                          });
                          }
                      });
                      $(document).on('click','.editjobnature',function(){
                          var id = $(this).data('id');
                          $.ajax({
                          url: "{!! route('jobnature.edit') !!}",
                          type: "get", 
                          data: {  
                              id: id, 
                          },
                          success: function(data) {
                             
                              $('#updatejobnature').find('#id').val(data.id);
                              $('#updatejobnature').find('#nature').val(data.nature);
                              
              
                              }
                          });
                      })
                      $(document).ready(function () {
                          $('#updatejobnature').validate({ 
                          rules: {
                                  
                                  
                                  nature: 
                                  {
                                  required: true,
                                  
                                  },
                                  
                                  
                          },
                          
                          highlight: function(element) {
                              $(element).parent().addClass('has-error');
                          },
                          unhighlight: function(element) {
                              $(element).parent().removeClass('has-error');
                          },
                          });
                          
                      });
                  
                      $(document).on('submit','#updatejobnature',function(e){
                          e.preventDefault();
                              if ($('#updatejobnature').valid()) {
                                  $.ajax({
                                  url:"{!! route('jobnature.update') !!}",
                                  method:"POST",
                                  data:new FormData(this),
                                  dataType:'JSON',
                                  contentType: false,
                                  cache: false,
                                  processData: false,
                                  success:function(data)
                                  {
                                      toastr.options = {
                                              "debug": false,
                                              "positionClass": "toast-bottom-right",
                                              "onclick": null,
                                              "fadeIn": 300,
                                              "fadeOut": 1000,
                                              "timeOut": 5000,
                                              "extendedTimeOut": 1000
                                          };
                                      toastr.success('Data Updated Successfully');
                                          $('.unqjobnature'+data.id).replaceWith(`<tr class='unqjobnature`+data.id+`'>
                                      <td>`+data.nature+`</td>
                                      <td>
                                          <a data-id ="`+data.id+`" data-toggle="modal" data-target="#degreeupdatemodal" class="editjobnature"><span class="glyphicon glyphicon-edit btn btn-primary btn-sm"></span></a>
                                          <a class="deletejobnature" data-id ="`+data.id+`" ><span class="glyphicon glyphicon-trash btn btn-danger btn-sm"></span></a>
                                      </td>
                                      </tr>`);    
                                      setTimeout(function() {$('#degreeupdatemodal').modal('hide');}, 1500);
                          
                                      $('#updatejobnature').trigger('reset');
                                  }
                                  
                              });
                              }
                          
                      })
                      $(document).on('click','.deletejobnature',function(e) {
                          e.preventDefault();
                          var id = $(this).data('id');
                          //alert(role);
                          Swal.fire({
                          title: 'Are you sure?',
                          text: "You won't be able to revert this!",
                          type: 'warning',
                          showCancelButton: true,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'Yes, delete it!',
                          
                          }).then(result => {
                          
                          if (result.value) {
                              $.ajax({
                              url: "{!! route('jobnature.delete') !!}",
                              type: "get", 
                              data: {  
                                  id: id, 
                              },
                              success: function(data) {
                                  }
                              });
                              
                              $(this).closest('tr').hide();
                              
                          }
                          }
                      )
                  });
                  </script>
              </div>
              </div>
            </div>
         </div>
    </div>
</section>
@endsection