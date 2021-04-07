@extends('Backend.backendmaster')
@section('home-active','active')
@section('title', 'PeopleScape | home')
@section('content')
<section class="content" >
    <div class="box box-info">
            <div class="box-header with-border">
            <h3 class="box-title">Home Options</h3>
                <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
            </div>
            <ul class="nav nav-tabs">
               <li class="active commonlitabforcash"><a data-toggle="tab" href="#tab1">Slider</a></li>
               <li class="commonlitabforcash"><a data-toggle="tab" href="#tab2">Slider Bottom</a></li>
               <li class="commonlitabforcash"><a data-toggle="tab" href="#tab3">Service Top </a></li>
               <li class="commonlitabforcash"><a data-toggle="tab" href="#tab4">All Services</a></li>
               <li class="commonlitabforcash"><a data-toggle="tab" href="#tab5">Location Top</a></li>
               <li class="commonlitabforcash"><a data-toggle="tab" href="#tab6">All Locations</a></li>
               <li class="commonlitabforcash"><a data-toggle="tab" href="#tab7">Call To Action</a></li>
               <li class="commonlitabforcash"><a data-toggle="tab" href="#tab8">Team Top</a></li>
               <li class="commonlitabforcash" style="margin-top:3px"><a data-toggle="tab" href="#tab9">Team Members</a></li>
               <li class="commonlitabforcash" style="margin-top:3px"><a data-toggle="tab" href="#tab13">Counter Part</a></li>
               <li class="commonlitabforcash" style="margin-top:3px"><a data-toggle="tab" href="#tab10">Testimonials Top</a></li>
               <li class="commonlitabforcash" style="margin-top:3px"><a data-toggle="tab" href="#tab11">Testimonials</a></li>
               <li class="commonlitabforcash" style="margin-top:3px"><a data-toggle="tab" href="#tab12">Footer</a></li>


           </ul>
           <div class="tab-content">
                <div id="tab1" class="tab-pane fade in active">
                    <section class="content">
                       <div class="box box-info">
                            <div class="box-header with-border">
                            <h3 class="box-title">Home Slider</h3>
                            </div>
                            {!!Form::open(['class' => 'form-horizontal','id'=>'mainsliderform','enctype'=>'multipart/form-data'])!!}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="title" class="col-sm-2 control-label">Title (2/3)</label>
                                    <div class="col-sm-8">
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Image Title">
                                      <input type="hidden" name="path" id="path" value="{{url('/')}}">
                                    </div>
                                </div>
                            
                                <div class="form-group">
                                <label for="description" class="col-sm-2 control-label"> Description (3/4)</label>
                                <div class="col-sm-8">
                                <textarea type="text" class="form-control"  name="description" placeholder="Enter Image Description"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">Image (1600X900)</label>
                                <div class="col-sm-8">
                                <input type="file" class="form-control" id="image" name="image">
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
                                    <h3 class="box-title">Slider  List</h3>
                                     <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                                      </div>
                                     </div>
                                  <div class="box-body">
                                    <table id="example1" class="table table-bordered table-striped deprtmentprepend">
                                      <thead>
                                      <tr>
                                        <th width="20%">Title</th>
                                        <th width="20%">Description</th>
                                        <th width="35%">Photo</th>  
                                        <th width="15%">Action</th>
                                      </tr>
                                      </thead>
                                      <tbody class="sliderimgappend">
                                        @foreach($sliderList as $slider)
                                       <tr class='unqsliderimg{{$slider->id}}'>
                                          <td>{{$slider->title}}</td>
                                          <td>{{$slider->description}}</td>
                                         
                                        <td><img src="{{url('/'.$slider->image)}}" width="150" height="70"></td>
                                          <td>
                                            <a data-sliderid ="{{$slider->id}}" data-toggle="modal" data-target="#sliderupdate" class="editsliderimg"><span class="glyphicon glyphicon-edit btn btn-primary btn-sm"></span></a>
                                            <a class="deletesliderimage" data-sliderid ="{{$slider->id}}"><span class="glyphicon glyphicon-trash btn btn-danger btn-sm"></span></a>
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
                        <div class="modal fade" id="sliderupdate">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                      <h4 class="modal-title">Edit Slider Info</h4>
                                    </div>
                                      <div class="modal-body">
                                          {!!Form::open(['class' => 'form-horizontal','id'=>'updatesliderimg','enctype'=>'multipart/form-data'])!!}
                                          <div class="box-body">
                                              <div class="form-group">
                                                  <label for="title" class="col-sm-2 control-label">Title (2/3)</label>
                                                  <div class="col-sm-8">
                                                  <input type="text" class="form-control" id="title" name="title" placeholder="Enter Image Title">
                                                  <input type="hidden" class="form-control" id="sliderid" name="sliderid" placeholder="Enter Image Title">
                      
                                                  </div>
                                              </div>
                                             
                                              <div class="form-group">
                                                 <label for="description" class="col-sm-2 control-label"> Description (3/4)</label>
                                                 <div class="col-sm-8">
                                                 <textarea type="text" class="form-control"  name="description" id="description" rows="5" placeholder="Enter Image Description"></textarea>
                                                  
                                                 </div>
                                             </div>
                                             
                                             <div class="form-group">
                                                 <label for="title" class="col-sm-2 control-label">Image (1600)X900)</label>
                                                 <div class="col-sm-8">
                                                 <input type="file" class="form-control" id="image" name="image">
                                                 </div>
                                             </div>
                                             <div class="form-group">
                                                <label for="title" class="col-sm-2 control-label"></label>
                                                <div class="col-md-10">
                                                    <img id="myImage" class="img-responsive" width="100" height="50" src="" alt="">
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
                <script>
                    $(document).ready(function () {
                        $('#mainsliderform').validate({ 
                        rules: {
                                title: 
                                {
                                required: true,
                                
                                },
                                description: 
                                {
                                required: true,
                                
                                },
                                image: 
                                {
                                required: true,
                                
                                }
                        },
                        
                        highlight: function(element) {
                            $(element).parent().addClass('has-error');
                        },
                        unhighlight: function(element) {
                            $(element).parent().removeClass('has-error');
                        },
                        });
                        
                    });
                    $('#mainsliderform').on('submit',function(e){
                        e.preventDefault();
                        //var data = $(this).serialize();
                        var base_url = $('#mainsliderform').find('#path').val();
                        //alert (base_url)
                        if ($('#mainsliderform').valid()) {
                            $.ajax({
                            url:"{{route('slider.store')}}",
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
                                $('.sliderimgappend').prepend(`<tr class='unqsliderimg`+data.id+`'>
                                <td>`+data.title+`</td>
                                <td>`+data.description+`</td>
                                <td><img src="`+base_url+`/`+data.image+`" width="150" height="70"></td> 
                                <td>
                                    <a data-sliderid ="`+data.id+`" data-toggle="modal" data-target="#sliderupdate" class="editsliderimg"><span class="glyphicon glyphicon-edit btn btn-primary btn-sm"></span></a>
                                    <a class="deletesliderimage" data-sliderid ="`+data.id+`" data-deptid=""><span class="glyphicon glyphicon-trash btn btn-danger btn-sm"></span></a>
                                </td>
                                </tr>`);          
                                $('#mainsliderform').trigger('reset');
                            }
                            
                        });
                        }
                    });
                    $(document).on('click','.editsliderimg',function(){
                        var id = $(this).data('sliderid');
                         var base_url = $('#mainsliderform').find('#path').val();
                        $.ajax({
                        url: "{!! route('slider.edit') !!}",
                        type: "get", 
                        data: {  
                            id: id, 
                        },
                        success: function(data) {
                            var img = data.image;
                            var srcimg=base_url+'/'+img;
                            $('#sliderupdate #myImage ').attr("src", srcimg);
                            $('#sliderupdate').find('#title').val(data.title);
                            $('#sliderupdate').find('#sliderid').val(data.id);
                        
                            $('#sliderupdate').find('#description').val(data.description);
                         }
                        });
                    })
                    $(document).ready(function () {
                        $('#updatesliderimg').validate({ 
                        rules: {
                                title: 
                                {
                                required: true,
                                
                                },
                                description: 
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
                    $(document).on('submit','#updatesliderimg',function(e){
                        e.preventDefault();
                            //var data = $(this).serialize();
                             var base_url = $('#mainsliderform').find('#path').val();
                            if ($('#updatesliderimg').valid()) {
                                $.ajax({
                                url:"{!! route('slider.update') !!}",
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
                                    $('.unqsliderimg'+data.id).replaceWith(`<tr class='unqsliderimg`+data.id+`'>
                                    <td>`+data.title+`</td>
                                    <td>`+data.description+`</td>
                                    <td><img src="`+base_url+`/`+data.image+`" width="150" height="70"></td> 
                                    <td>
                                        <a data-sliderid ="`+data.id+`" data-toggle="modal" data-target="#sliderupdate" class="editsliderimg"><span class="glyphicon glyphicon-edit btn btn-primary btn-sm"></span></a>
                                        <a class="deletesliderimage"  data-sliderid ="`+data.id+`"><span class="glyphicon glyphicon-trash btn btn-danger btn-sm"></span></a>
                                    </td>
                                    </tr>`);    
                                    setTimeout(function() {$('#sliderupdate').modal('hide');}, 1500);
                        
                                    $('#updatesliderimg').trigger('reset');
                                }
                                
                            });
                        }
                    })
                    $(document).on('click','.deletesliderimage',function(e) {
                        e.preventDefault();
                        var id = $(this).data('sliderid');
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
                            url: "{!! route('slider.delete') !!}",
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
             <div id="tab13" class="tab-pane fade in">
                    <section class="content" id="counterpartref">
                    <div class="box box-info">
                            <div class="box-header with-border">
                            <h3 class="box-title">Counter Part</h3>
                            
                            </div>
                            {!!Form::open(['class' => 'form-horizontal','id'=>'counterpart','enctype'=>'multipart/form-data'])!!}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="title" class="col-sm-2 control-label">Experience</label>
                                    <div class="col-sm-8">
                                    <input type="text" class="form-control" id="experience" name="experience" value="{{$counter->experience}}">
                                    <input type="hidden" class="form-control" id="id" name="id" value="{{$sliderBottom->id}}">
            
                                </div>
                                </div>
                                <div class="form-group">
                                        <label for="title" class="col-sm-2 control-label">Support Team</label>
                                        <div class="col-sm-8">
                                        <input type="text" class="form-control" id="team" name="team" value="{{$counter->team}}">                
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label for="title" class="col-sm-2 control-label">Location</label>
                                        <div class="col-sm-8">
                                        <input type="text" class="form-control" id="location" name="location" value="{{$counter->location}}">                
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label for="title" class="col-sm-2 control-label">Employee</label>
                                        <div class="col-sm-8">
                                        <input type="text" class="form-control" id="employee" name="employee" value="{{$counter->employee}}">                
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
                            $('#counterpart').validate({ 
                                rules: {
                                    experience: 
                                    {
                                        required: true,
                                        
                                    },
                                    location: 
                                    {
                                        required: true,
                                        
                                    },
                                    team: 
                                    {
                                        required: true,
                                        
                                    },
                                    employee: 
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
                            $(document).on('submit','#counterpart',function(e){
                                e.preventDefault();
                                //var data = $(this).serialize();
                                if ($('#counterpart').valid()) {
                                $.ajax({
                                    url:"{!! route('counterpart.update') !!}",
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
                                        
                            
                                    $("#counterpartref").load(location.href + " #counterpartref");
                                    }
                                    
                                });
                            }
                        })
                    </script>
                 </div>
             <div id="tab2" class="tab-pane fade in">
                <section class="content" id="sliderbtmref">
                <div class="box box-info">
                        <div class="box-header with-border">
                        <h3 class="box-title">Slider Bottom</h3>
                        
                        </div>
                        {!!Form::open(['class' => 'form-horizontal','id'=>'sliderbtm','enctype'=>'multipart/form-data'])!!}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">Title</label>
                                <div class="col-sm-8">
                                <input type="text" class="form-control" id="title" name="title" value="{{$sliderBottom->title}}">
                                <input type="hidden" class="form-control" id="id" name="id" value="{{$sliderBottom->id}}">
        
                            </div>
                            </div>
                        
                            <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">Description (40)</label>
                            <div class="col-sm-8">
                            <textarea type="text" class="form-control"  name="description" rows="8" placeholder="Enter  Description">{{$sliderBottom->description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                                <label for="title" class="col-sm-2 control-label"></label>
                                <div class="col-md-10">
                                <img id="myImage" class="img-responsive" width="200" height="100" src="{{url('/'.$sliderBottom->image)}}" alt="">
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
                        $('#sliderbtm').validate({ 
                            rules: {
                                title: 
                                {
                                    required: true,
                                    
                                },
                                description: 
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
                        $(document).on('submit','#sliderbtm',function(e){
                            e.preventDefault();
                            //var data = $(this).serialize();
                            if ($('#sliderbtm').valid()) {
                            $.ajax({
                                url:"{!! route('sliderbtm.update') !!}",
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
                                    
                        
                                $("#sliderbtmref").load(location.href + " #sliderbtmref");
                                }
                                
                            });
                        }
                    })
                </script>
             </div>
             <div id="tab3" class="tab-pane fade in">
                    <section class="content" id="servicetopref">
                    <div class="box box-info">
                            <div class="box-header with-border">
                            <h3 class="box-title">Service Top</h3>
                            
                            </div>
                            {!!Form::open(['class' => 'form-horizontal','id'=>'servicetop','enctype'=>'multipart/form-data'])!!}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="title" class="col-sm-2 control-label">Title</label>
                                    <div class="col-sm-8">
                                    <input type="text" class="form-control" id="title" name="title" value="{{$servicetop->title}}">
                                    <input type="hidden" class="form-control" id="id" name="id" value="{{$servicetop->id}}">
            
                                </div>
                                </div>
                            
                                <div class="form-group">
                                <label for="description" class="col-sm-2 control-label">Description (40)</label>
                                <div class="col-sm-8">
                                <textarea type="text" class="form-control"  name="description" rows="8" placeholder="Enter  Description">{{$servicetop->description}}</textarea>
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
                            $('#servicetop').validate({ 
                                rules: {
                                    title: 
                                    {
                                        required: true,
                                        
                                    },
                                    description: 
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
                            $(document).on('submit','#servicetop',function(e){
                                e.preventDefault();
                                //var data = $(this).serialize();
                                if ($('#servicetop').valid()) {
                                $.ajax({
                                    url:"{!! route('servicetop.update') !!}",
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
                                        
                            
                                    $("#servicetopref").load(location.href + " #servicetopref");
                                    }
                                    
                                });
                            }
                        })
                    </script>
                </div>
                 <div id="tab4" class="tab-pane fade in">
                    <section class="content">
                       <div class="box box-info">
                            <div class="box-header with-border">
                            <h3 class="box-title">All Services</h3>
                            </div>
                            {!!Form::open(['class' => 'form-horizontal','id'=>'allservices','enctype'=>'multipart/form-data'])!!}
                            <div class="box-body">
                               
                                <div class="form-group">
                                    <label for="title" class="col-sm-2 control-label">Title (2/3)</label>
                                    <div class="col-sm-8">
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Image Title">
                                    </div>
                                </div>
                                 <div class="form-group">
                                        <label for="title" class="col-sm-2 control-label">Short Description</label>
                                        <div class="col-sm-8">
                                        <input type="text" class="form-control" id="short_des" name="short_des" placeholder="Enter Description Not more than 50 Words">
                                        </div>
                                </div>
                             <div class="form-group">
                                <label for="description" class="col-sm-2 control-label"> Description (3/4)</label>
                                <div class="col-sm-8">
                                <textarea type="text" class="form-control"  name="description" placeholder="Enter Image Description"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                    <label for="link" class="col-sm-2 control-label">Image</label>
                                    <div class="col-sm-8">
                                    <input type="file" class="form-control" id="image" name="image">
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
                                    <h3 class="box-title">All Services</h3>
                                     <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                                      </div>
                                     </div>
                                  <div class="box-body">
                                    <table id="example1" class="table table-bordered table-striped servicesprepend">
                                      <thead>
                                      <tr>
                                        <th width="20%">Title</th>
                                        <th width="20%">Description</th>
                                        <th width="20%">Image</th>  
                                        
                                        <th width="15%">Action</th>
                                      </tr>
                                      </thead>
                                      <tbody class="">
                                        @foreach($allservices as $service)
                                       <tr class='unqservice{{$service->id}}'>
                                           <td>{{$service->title}}</td>
                                           <td>{{$service->short_des}}</td>
                                           <td><img src="{{url('/'.$service->image)}}" width="150" height="70"></td>
                                           
                                            <td>
                                                <a data-id ="{{$service->id}}" data-toggle="modal" data-target="#serviceupdate" class="editservice"><span class="glyphicon glyphicon-edit btn btn-primary btn-sm"></span></a>
                                                <a class="deleteservice" data-id ="{{$service->id}}"><span class="glyphicon glyphicon-trash btn btn-danger btn-sm"></span></a>
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
                        <div class="modal fade" id="serviceupdate">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                      <h4 class="modal-title">Edit Service Info</h4>
                                    </div>
                                      <div class="modal-body">
                                          {!!Form::open(['class' => 'form-horizontal','id'=>'updateservice','enctype'=>'multipart/form-data'])!!}
                                          <div class="box-body">
                                              <div class="form-group">
                                                  <label for="title" class="col-sm-2 control-label">Title (2/3)</label>
                                                  <div class="col-sm-8">
                                                  <input type="text" class="form-control" id="title" name="title" placeholder="Enter Image Title">
                                                  <input type="hidden" class="form-control" id="id" name="id" placeholder="Enter Image Title">
                      
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                    <label for="title" class="col-sm-2 control-label">Short Description</label>
                                                    <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="short_des" name="short_des" >
                                                    </div>
                                            </div>
                                              <div class="form-group">
                                                 <label for="description" class="col-sm-2 control-label"> Description (3/4)</label>
                                                 <div class="col-sm-8">
                                                 <textarea type="text" class="form-control"  name="description" id="description" rows="5" placeholder="Enter Image Description"></textarea>
                                                 </div>
                                             </div>
                                             <div class="form-group">
                                                <label for="link" class="col-sm-2 control-label">Image</label>
                                                <div class="col-sm-8">
                                                <input type="file" class="form-control" id="image" name="image" placeholder="">
                                                </div>
                                              </div>
                                              <div class="form-group">
                                                <label for="title" class="col-sm-2 control-label"></label>
                                                <div class="col-md-10">
                                                    <img id="myImage" class="img-responsive" width="150" height="70" src="" alt="">
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
                <script>
                    $(document).ready(function () {
                        $('#allservices').validate({ 
                        rules: {
                                title: 
                                {
                                required: true,
                                
                                },
                                short_des:{
                                   required: true, 
                                },
                                description: 
                                {
                                required: true,
                                
                                },
                                image: 
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
                    $('#allservices').on('submit',function(e){
                        e.preventDefault();
                        //var data = $(this).serialize();
                         var base_url = $('#mainsliderform').find('#path').val();
                        if ($('#allservices').valid()) {
                            $.ajax({
                            url:"{{route('service.store')}}",
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
                                $('.servicesprepend').prepend(`<tr class='unqservice`+data.id+`'>
                                <td>`+data.title+`</td>
                                <td>`+data.short_des+`</td>
                                 <td><img src="`+base_url+`/`+data.image+`" width="150" height="70"></td>
                                
                                <td>
                                    <a data-id ="`+data.id+`" data-toggle="modal" data-target="#serviceupdate" class="editservice"><span class="glyphicon glyphicon-edit btn btn-primary btn-sm"></span></a>
                                    <a class="deleteservice" data-id ="`+data.id+`" ><span class="glyphicon glyphicon-trash btn btn-danger btn-sm"></span></a>
                                </td>
                                </tr>`);          
                                $('#allservices').trigger('reset');
                            }
                            
                        });
                        }
                    });
                    $(document).on('click','.editservice',function(){
                        var id = $(this).data('id');
                         var base_url = $('#mainsliderform').find('#path').val();
                        $.ajax({
                        url: "{!! route('service.edit') !!}",
                        type: "get", 
                        data: {  
                            id: id, 
                        },
                        success: function(data) {
                           var img = data.image;
                            var srcimg=base_url+'/'+img;
                           $('#updateservice #myImage ').attr("src", srcimg);
                            $('#updateservice').find('#title').val(data.title);
                            $('#updateservice').find('#id').val(data.id);
                            $('#updateservice').find('#short_des').val(data.short_des);
                            $('#updateservice').find('#description').val(data.description);
                         }
                        });
                    })
                    $(document).ready(function () {
                        $('#updateservice').validate({ 
                        rules: {
                                title: 
                                {
                                required: true,
                                
                                },
                                short_des: 
                                {
                                required: true,
                                },
                                description: 
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
                    $(document).on('submit','#updateservice',function(e){
                        e.preventDefault();
                            //var data = $(this).serialize();
                             var base_url = $('#mainsliderform').find('#path').val();
                            if ($('#updateservice').valid()) {
                                $.ajax({
                                url:"{!! route('service.update') !!}",
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
                                    $('.unqservice'+data.id).replaceWith(`<tr class='unqservice`+data.id+`'>
                                    <td>`+data.title+`</td>
                                    <td>`+data.short_des+`</td>
                                     <td><img src="`+base_url+`/`+data.image+`" width="150" height="70"></td>
                                    
                                    <td>
                                        <a data-id ="`+data.id+`" data-toggle="modal" data-target="#serviceupdate" class="editservice"><span class="glyphicon glyphicon-edit btn btn-primary btn-sm"></span></a>
                                        <a class="deleteservice"  data-id ="`+data.id+`"><span class="glyphicon glyphicon-trash btn btn-danger btn-sm"></span></a>
                                    </td>
                                    </tr>`);    
                                    setTimeout(function() {$('#serviceupdate').modal('hide');}, 1500);
                        
                                    $('#updateservice').trigger('reset');
                                }
                                
                            });
                        }
                    })
                    $(document).on('click','.deleteservice',function(e) {
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
                            url: "{!! route('service.delete') !!}",
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
           
                <div id="tab5" class="tab-pane fade in">
                    <section class="content" id="locationtopref">
                    <div class="box box-info">
                            <div class="box-header with-border">
                            <h3 class="box-title">Location Top</h3>
                            
                            </div>
                            {!!Form::open(['class' => 'form-horizontal','id'=>'locationtop','enctype'=>'multipart/form-data'])!!}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="title" class="col-sm-2 control-label">Title</label>
                                    <div class="col-sm-8">
                                    <input type="text" class="form-control" id="title" name="title" value="{{$locationtop->title}}">
                                    <input type="hidden" class="form-control" id="id" name="id" value="{{$locationtop->id}}">
            
                                </div>
                                </div>
                            
                                <div class="form-group">
                                <label for="description" class="col-sm-2 control-label">Description (40)</label>
                                <div class="col-sm-8">
                                <textarea type="text" class="form-control"  name="description" rows="8" placeholder="Enter  Description">{{$locationtop->description}}</textarea>
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
                            $('#locationtop').validate({ 
                                rules: {
                                    title: 
                                    {
                                        required: true,
                                        
                                    },
                                    description: 
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
                            $(document).on('submit','#locationtop',function(e){
                                e.preventDefault();
                                //var data = $(this).serialize();
                                if ($('#servicetop').valid()) {
                                $.ajax({
                                    url:"{!! route('locationtop.update') !!}",
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
                                        
                            
                                    $("#locationtopref").load(location.href + " #locationtopref");
                                    }
                                    
                                });
                            }
                        })
                    </script>
                </div>
                <div id="tab6" class="tab-pane fade in">
                    <section class="content">
                       <div class="box box-info">
                            <div class="box-header with-border">
                            <h3 class="box-title">All Locations</h3>
                            </div>
                            {!!Form::open(['class' => 'form-horizontal','id'=>'alllocations','enctype'=>'multipart/form-data'])!!}
                            <div class="box-body">
                               
                                <div class="form-group">
                                    <label for="title" class="col-sm-2 control-label">Main Add (2/3)</label>
                                    <div class="col-sm-8">
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Image Title">
                                    </div>
                                </div>
                             <div class="form-group">
                                <label for="description" class="col-sm-2 control-label"> Sub Add (3/4)</label>
                                <div class="col-sm-8">
                                <textarea type="text" class="form-control"  name="description" placeholder="Enter Image Description"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                    <label for="link" class="col-sm-2 control-label">Link</label>
                                    <div class="col-sm-8">
                                    <input type="text" class="form-control" id="link" name="link" placeholder="Enter Link">
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
                                    <h3 class="box-title">All Locations</h3>
                                     <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                                      </div>
                                     </div>
                                  <div class="box-body">
                                    <table id="example1" class="table table-bordered table-striped locationsprepend">
                                      <thead>
                                      <tr>
                                        <th width="20%">Title</th>
                                        <th width="20%">Description</th>
                                        <th width="20%">Link</th>  
                                        <th width="15%">Action</th>
                                      </tr>
                                      </thead>
                                      <tbody class="">
                                        @foreach($alllocations as $location)
                                       <tr class='unqlocation{{$location->id}}'>
                                           <td>{{$location->title}}</td>
                                           <td>{{$location->description}}</td>
                                           <td>{{$location->link}}</td>
                                            <td>
                                                <a data-id ="{{$location->id}}" data-toggle="modal" data-target="#locationupdate" class="editlocation"><span class="glyphicon glyphicon-edit btn btn-primary btn-sm"></span></a>
                                                <a class="deletelocation" data-id ="{{$location->id}}"><span class="glyphicon glyphicon-trash btn btn-danger btn-sm"></span></a>
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
                        <div class="modal fade" id="locationupdate">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                      <h4 class="modal-title">Edit Location Info</h4>
                                    </div>
                                      <div class="modal-body">
                                          {!!Form::open(['class' => 'form-horizontal','id'=>'updatelocation','enctype'=>'multipart/form-data'])!!}
                                          <div class="box-body">
                                              <div class="form-group">
                                                  <label for="title" class="col-sm-2 control-label">Main Add (2/3)</label>
                                                  <div class="col-sm-8">
                                                  <input type="text" class="form-control" id="title" name="title" placeholder="Enter Image Title">
                                                  <input type="hidden" class="form-control" id="id" name="id" placeholder="Enter">
                      
                                                  </div>
                                              </div>
                                             
                                              <div class="form-group">
                                                 <label for="description" class="col-sm-2 control-label"> Sub Add (3/4)</label>
                                                 <div class="col-sm-8">
                                                 <textarea type="text" class="form-control"  name="description" id="description" rows="5" placeholder="Enter Image Description"></textarea>
                                                 </div>
                                             </div>
                                             <div class="form-group">
                                                    <label for="link" class="col-sm-2 control-label">Link</label>
                                                    <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="link" name="link" >
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
                <script>
                    $(document).ready(function () {
                        $('#alllocations').validate({ 
                        rules: {
                                title: 
                                {
                                required: true,
                                
                                },
                                description: 
                                {
                                required: true,
                                
                                },
                                link: 
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
                    $('#alllocations').on('submit',function(e){
                        e.preventDefault();
                        //var data = $(this).serialize();
                        if ($('#alllocations').valid()) {
                            $.ajax({
                            url:"{{route('location.store')}}",
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
                                $('.locationsprepend').prepend(`<tr class='unqlocation`+data.id+`'>
                                <td>`+data.title+`</td>
                                <td>`+data.description+`</td>
                                <td>`+data.link+`</td>
                             <td>
                                    <a data-id ="`+data.id+`" data-toggle="modal" data-target="#locationupdate" class="editlocation"><span class="glyphicon glyphicon-edit btn btn-primary btn-sm"></span></a>
                                    <a class="deletelocation" data-id ="`+data.id+`" ><span class="glyphicon glyphicon-trash btn btn-danger btn-sm"></span></a>
                                </td>
                                </tr>`);          
                                $('#alllocations').trigger('reset');
                            }
                            
                        });
                        }
                    });
                    $(document).on('click','.editlocation',function(){
                        var id = $(this).data('id');
                        $.ajax({
                        url: "{!! route('location.edit') !!}",
                        type: "get", 
                        data: {  
                            id: id, 
                        },
                        success: function(data) {
                            
                            $('#updatelocation').find('#title').val(data.title);
                            $('#updatelocation').find('#link').val(data.link);
                            $('#updatelocation').find('#id').val(data.id);
                            $('#updatelocation').find('#description').val(data.description);
                         }
                        });
                    })
                    $(document).ready(function () {
                        $('#updatelocation').validate({ 
                        rules: {
                                title: 
                                {
                                required: true,
                                
                                },
                                description: 
                                {
                                required: true,
                                },
                                link: 
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
                    $(document).on('submit','#updatelocation',function(e){
                        e.preventDefault();
                            //var data = $(this).serialize();
                            if ($('#updatelocation').valid()) {
                                $.ajax({
                                url:"{!! route('location.update') !!}",
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
                                    $('.unqlocation'+data.id).replaceWith(`<tr class='unqlocation`+data.id+`'>
                                    <td>`+data.title+`</td>
                                    <td>`+data.description+`</td>
                                    <td>`+data.link+`</td> 
                                    <td>
                                        <a data-id ="`+data.id+`" data-toggle="modal" data-target="#locationupdate" class="editlocation"><span class="glyphicon glyphicon-edit btn btn-primary btn-sm"></span></a>
                                        <a class="deletelocation"  data-id ="`+data.id+`"><span class="glyphicon glyphicon-trash btn btn-danger btn-sm"></span></a>
                                    </td>
                                    </tr>`);    
                                    setTimeout(function() {$('#locationupdate').modal('hide');}, 1500);
                        
                                    $('#updatelocation').trigger('reset');
                                }
                                
                            });
                        }
                    })
                    $(document).on('click','.deletelocation',function(e) {
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
                            url: "{!! route('location.delete') !!}",
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
            <div id="tab7" class="tab-pane fade in">
                <section class="content" id="callref">
                <div class="box box-info">
                        <div class="box-header with-border">
                        <h3 class="box-title">Call to action</h3>
                        
                        </div>
                        {!!Form::open(['class' => 'form-horizontal','id'=>'call','enctype'=>'multipart/form-data'])!!}
                        <div class="box-body">
                            
                            <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-8">
                            <textarea type="text" class="form-control"  name="description" rows="8" placeholder="Enter  Description">{{$hcall->description}}</textarea>
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
                        $('#call').validate({ 
                            rules: {
                               
                                description: 
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
                        $(document).on('submit','#call',function(e){
                            e.preventDefault();
                            //var data = $(this).serialize();
                            if ($('#call').valid()) {
                            $.ajax({
                                url:"{!! route('call.update') !!}",
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
                                    
                        
                                $("#callref").load(location.href + " #callref");
                                }
                                
                            });
                        }
                    })
                </script>
            </div>
            <div id="tab8" class="tab-pane fade in">
                <section class="content" id="teamtopref">
                <div class="box box-info">
                        <div class="box-header with-border">
                        <h3 class="box-title">Team Top</h3>
                        
                        </div>
                        {!!Form::open(['class' => 'form-horizontal','id'=>'teamtop','enctype'=>'multipart/form-data'])!!}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">Title</label>
                                <div class="col-sm-8">
                                <input type="text" class="form-control" id="title" name="title" value="{{$teamTop->title}}">
                                <input type="hidden" class="form-control" id="id" name="id" value="{{$teamTop->id}}">
        
                            </div>
                            </div>
                        
                            <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">Description (40)</label>
                            <div class="col-sm-8">
                            <textarea type="text" class="form-control"  name="description" rows="8" placeholder="Enter  Description">{{$teamTop->description}}</textarea>
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
                        $('#teamtop').validate({ 
                            rules: {
                                title: 
                                {
                                    required: true,
                                    
                                },
                                description: 
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
                        $(document).on('submit','#teamtop',function(e){
                            e.preventDefault();
                            //var data = $(this).serialize();
                            if ($('#teamtop').valid()) {
                            $.ajax({
                                url:"{!! route('teamtop.update') !!}",
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
                                    
                        
                                $("#teamtopref").load(location.href + " #teamtopref");
                                }
                                
                            });
                        }
                    })
                </script>
            </div>
            <div id="tab9" class="tab-pane fade in">
                <section class="content">
                   <div class="box box-info">
                        <div class="box-header with-border">
                        <h3 class="box-title">Team Members</h3>
                        </div>
                        {!!Form::open(['class' => 'form-horizontal','id'=>'myteam','enctype'=>'multipart/form-data'])!!}
                        <div class="box-body">
                           
                            <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">Name (2/3)</label>
                                <div class="col-sm-8">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">Designation (2/3)</label>
                                <div class="col-sm-8">
                                <input type="text" class="form-control" id="designation" name="designation" placeholder="Enter designation">
                                </div>
                            </div>
                         <div class="form-group">
                            <label for="description" class="col-sm-2 control-label"> Description (3/4)</label>
                            <div class="col-sm-8">
                            <textarea type="text" class="form-control"  name="description" placeholder="Enter Image Description"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                                <label for="link" class="col-sm-2 control-label">FB Link</label>
                                <div class="col-sm-8">
                                <input type="text" class="form-control" id="fb_link" name="fb_link" placeholder="Enter fb_link">
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="link" class="col-sm-2 control-label">TW Link</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="ftw_link" name="tw_link" placeholder="Enter tw_link">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="link" class="col-sm-2 control-label">LN Link</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="ln_link" name="ln_link" placeholder="Enter ln_link">
                            </div>
                       </div>
                        <div class="form-group">
                            <label for="link" class="col-sm-2 control-label">GP Link</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="gp_link" name="gp_link" placeholder="Enter gp_link">
                            </div>
                       </div>
                       <div class="form-group">
                        <label for="link" class="col-sm-2 control-label">Image</label>
                        <div class="col-sm-8">
                        <input type="file" class="form-control" id="image" name="image" placeholder="">
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
                                <h3 class="box-title">Team Members</h3>
                                 <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                                  </div>
                                 </div>
                              <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped teamprepend">
                                  <thead>
                                  <tr>
                                    <th width="20%">Name</th>
                                    <th width="20%">Designation</th>
                                    <th width="20%">Photo</th>  
                                    <th width="15%">Action</th>
                                  </tr>
                                  </thead>
                                  <tbody class="">
                                    @foreach($teams as $team)
                                   <tr class='unqteam{{$team->id}}'>
                                       <td>{{$team->name}}</td>
                                       <td>{{$team->designation}}</td>
                                       <td><img src="{{url('/'.$team->image)}}" width="150" height="70"></td>
                                        <td>
                                            <a data-id ="{{$team->id}}" data-toggle="modal" data-target="#teamupdate" class="editteam"><span class="glyphicon glyphicon-edit btn btn-primary btn-sm"></span></a>
                                            <a class="deleteteam" data-id ="{{$team->id}}"><span class="glyphicon glyphicon-trash btn btn-danger btn-sm"></span></a>
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
                    <div class="modal fade" id="teamupdate">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                  <h4 class="modal-title">Edit Team Info</h4>
                                </div>
                                  <div class="modal-body">
                                      {!!Form::open(['class' => 'form-horizontal','id'=>'updateteam','enctype'=>'multipart/form-data'])!!}
                                      <div class="box-body">
                           
                                        <div class="form-group">
                                            <label for="title" class="col-sm-2 control-label">Name (2/3)</label>
                                            <div class="col-sm-8">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                                            <input type="hidden" class="form-control" id="id" name="id" placeholder="Enter name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="title" class="col-sm-2 control-label">Designation (2/3)</label>
                                            <div class="col-sm-8">
                                            <input type="text" class="form-control" id="designation" name="designation" placeholder="Enter designation">
                                            </div>
                                        </div>
                                     <div class="form-group">
                                        <label for="description" class="col-sm-2 control-label"> Description (3/4)</label>
                                        <div class="col-sm-8">
                                        <textarea type="text" class="form-control"  id="description" name="description" placeholder="Enter Image Description"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="link" class="col-sm-2 control-label">FB Link</label>
                                            <div class="col-sm-8">
                                            <input type="text" class="form-control" id="fb_link" name="fb_link" placeholder="Enter fb_link">
                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="link" class="col-sm-2 control-label">TW Link</label>
                                        <div class="col-sm-8">
                                        <input type="text" class="form-control" id="tw_link" name="tw_link" placeholder="Enter tw_link">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="link" class="col-sm-2 control-label">LN Link</label>
                                        <div class="col-sm-8">
                                        <input type="text" class="form-control" id="ln_link" name="ln_link" placeholder="Enter ln_link">
                                        </div>
                                   </div>
                                    <div class="form-group">
                                        <label for="link" class="col-sm-2 control-label">GP Link</label>
                                        <div class="col-sm-8">
                                        <input type="text" class="form-control" id="gp_link" name="gp_link" placeholder="Enter gp_link">
                                        </div>
                                   </div>
                                   <div class="form-group">
                                    <label for="link" class="col-sm-2 control-label">Image</label>
                                    <div class="col-sm-8">
                                    <input type="file" class="form-control" id="image" name="image" placeholder="">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="title" class="col-sm-2 control-label"></label>
                                    <div class="col-md-10">
                                        <img id="myImage" class="img-responsive" width="150" height="70" src="" alt="">
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
            <script>
                $(document).ready(function () {
                    $('#myteam').validate({ 
                    rules: {
                            name: 
                            {
                            required: true,
                            
                            },
                            designation: 
                            {
                            required: true,
                            
                            },
                            image: 
                            {
                            required: true,
                            
                            },
                            description: 
                            {
                            required: true,
                            
                            },
                            fb_link: 
                            {
                            required: true,
                            
                            },
                            tw_link: 
                            {
                            required: true,
                            
                            },
                            ln_link: 
                            {
                            required: true,
                            
                            },
                            gp_link: 
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
                $('#myteam').on('submit',function(e){
                    e.preventDefault();
                    //var data = $(this).serialize();
                     var base_url = $('#mainsliderform').find('#path').val();
                    if ($('#myteam').valid()) {
                        $.ajax({
                        url:"{{route('team.store')}}",
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
                            $('.teamprepend').prepend(`<tr class='unqteam`+data.id+`'>
                            <td>`+data.name+`</td>
                            <td>`+data.designation+`</td>
                            <td><img src="`+base_url+`/`+data.image+`" width="150" height="70"></td>
                         <td>
                                <a data-id ="`+data.id+`" data-toggle="modal" data-target="#teamupdate" class="editteam"><span class="glyphicon glyphicon-edit btn btn-primary btn-sm"></span></a>
                                <a class="deleteteam" data-id ="`+data.id+`" ><span class="glyphicon glyphicon-trash btn btn-danger btn-sm"></span></a>
                            </td>
                            </tr>`);          
                            $('#myteam').trigger('reset');
                        }
                        
                    });
                    }
                });
                $(document).on('click','.editteam',function(){
                    var id = $(this).data('id');
                     var base_url = $('#mainsliderform').find('#path').val();
                    $.ajax({
                    url: "{!! route('team.edit') !!}",
                    type: "get", 
                    data: {  
                        id: id, 
                    },
                    success: function(data) {
                        var img = data.image;
                        var srcimg=base_url+'/'+img;
                        $('#updateteam #myImage ').attr("src", srcimg);
                        $('#updateteam').find('#name').val(data.name);
                        $('#updateteam').find('#id').val(data.id);
                        $('#updateteam').find('#designation').val(data.designation);
                        $('#updateteam').find('#description').val(data.description);
                        $('#updateteam').find('#fb_link').val(data.fb_link);
                        $('#updateteam').find('#tw_link').val(data.tw_link);
                        $('#updateteam').find('#ln_link').val(data.ln_link);
                        $('#updateteam').find('#gp_link').val(data.gp_link);

                     }
                    });
                })
                $(document).ready(function () {
                    $('#updateteam').validate({ 
                    rules: {
                        name: 
                            {
                            required: true,
                            
                            },
                            designation: 
                            {
                            required: true,
                            
                            },
                            
                            description: 
                            {
                            required: true,
                            
                            },
                            fb_link: 
                            {
                            required: true,
                            
                            },
                            tw_link: 
                            {
                            required: true,
                            
                            },
                            ln_link: 
                            {
                            required: true,
                            
                            },
                            gp_link: 
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
                $(document).on('submit','#updateteam',function(e){
                    e.preventDefault();
                        //var data = $(this).serialize();
                        var base_url = $('#mainsliderform').find('#path').val();
                        if ($('#updateteam').valid()) {
                            $.ajax({
                            url:"{!! route('team.update') !!}",
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
                                $('.unqteam'+data.id).replaceWith(`<tr class='unqteam`+data.id+`'>
                                <td>`+data.name+`</td>
                                <td>`+data.designation+`</td>
                                <td><img src="`+base_url+`/`+data.image+`" width="150" height="70"></td>
                                <td>
                                    <a data-id ="`+data.id+`" data-toggle="modal" data-target="#teamupdate" class="editteam"><span class="glyphicon glyphicon-edit btn btn-primary btn-sm"></span></a>
                                    <a class="deleteteam" data-id ="`+data.id+`" ><span class="glyphicon glyphicon-trash btn btn-danger btn-sm"></span></a>
                                </td>
                                </tr>`);    
                                setTimeout(function() {$('#teamupdate').modal('hide');}, 1500);
                    
                                $('#updateteam').trigger('reset');
                            }
                            
                        });
                    }
                })
                $(document).on('click','.deleteteam',function(e) {
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
                        url: "{!! route('team.delete') !!}",
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
        <div id="tab10" class="tab-pane fade in">
            <section class="content" id="monialtopref">
            <div class="box box-info">
                    <div class="box-header with-border">
                    <h3 class="box-title">Team Top</h3>
                    
                    </div>
                    {!!Form::open(['class' => 'form-horizontal','id'=>'monialtop','enctype'=>'multipart/form-data'])!!}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">Title</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="title" name="title" value="{{$monialTop->title}}">
                            <input type="hidden" class="form-control" id="id" name="id" value="{{$monialTop->id}}">
    
                        </div>
                        </div>
                    
                        <div class="form-group">
                        <label for="description" class="col-sm-2 control-label">Description (40)</label>
                        <div class="col-sm-8">
                        <textarea type="text" class="form-control"  name="description" rows="8" placeholder="Enter  Description">{{$monialTop->description}}</textarea>
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
                    $('#monialtop').validate({ 
                        rules: {
                            title: 
                            {
                                required: true,
                                
                            },
                            description: 
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
                    $(document).on('submit','#monialtop',function(e){
                        e.preventDefault();
                        //var data = $(this).serialize();
                        if ($('#monialtop').valid()) {
                        $.ajax({
                            url:"{!! route('monialtop.update') !!}",
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
                                
                    
                            $("#monialtopref").load(location.href + " #monialtopref");
                            }
                            
                        });
                    }
                })
            </script>
        </div>
        <div id="tab11" class="tab-pane fade in">
            <section class="content">
               <div class="box box-info">
                    <div class="box-header with-border">
                    <h3 class="box-title">Testimonials </h3>
                    </div>
                    {!!Form::open(['class' => 'form-horizontal','id'=>'monials','enctype'=>'multipart/form-data'])!!}
                    <div class="box-body">
                       
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">Name (2/3)</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                            </div>
                        </div>
                        
                     <div class="form-group">
                        <label for="description" class="col-sm-2 control-label"> Description (3/4)</label>
                        <div class="col-sm-8">
                        <textarea type="text" class="form-control"  name="description" placeholder="Enter Image Description"></textarea>
                        </div>
                    </div>
                    
                   <div class="form-group">
                    <label for="link" class="col-sm-2 control-label">Image</label>
                    <div class="col-sm-8">
                    <input type="file" class="form-control" id="image" name="image" placeholder="">
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
                            <h3 class="box-title">Testimonials</h3>
                             <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                              </div>
                             </div>
                          <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped mymonials">
                              <thead>
                              <tr>
                                <th width="20%">Name</th>
                                <th width="20%">Description</th>
                                <th width="20%">Photo</th>  
                                <th width="15%">Action</th>
                              </tr>
                              </thead>
                              <tbody class="mymonials">
                                @foreach($testmonials as $monials)
                               <tr class='unqmonials{{$monials->id}}'>
                                   <td>{{$monials->name}}</td>
                                   <td>{{$monials->description}}</td>
                                   <td><img src="{{url('/'.$monials->image)}}" width="150" height="70"></td>
                                    <td>
                                        <a data-id ="{{$monials->id}}" data-toggle="modal" data-target="#monialsupdate" class="editmonials"><span class="glyphicon glyphicon-edit btn btn-primary btn-sm"></span></a>
                                        <a class="deletemonials" data-id ="{{$monials->id}}"><span class="glyphicon glyphicon-trash btn btn-danger btn-sm"></span></a>
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
                <div class="modal fade" id="monialsupdate">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Edit Team Info</h4>
                            </div>
                              <div class="modal-body">
                                  {!!Form::open(['class' => 'form-horizontal','id'=>'updatemonials','enctype'=>'multipart/form-data'])!!}
                                  <div class="box-body">
                       
                                    <div class="form-group">
                                        <label for="title" class="col-sm-2 control-label">Name (2/3)</label>
                                        <div class="col-sm-8">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                                        <input type="hidden" class="form-control" id="id" name="id" placeholder="Enter name">
                                        </div>
                                    </div>
                                   
                                 <div class="form-group">
                                    <label for="description" class="col-sm-2 control-label"> Description (3/4)</label>
                                    <div class="col-sm-8">
                                    <textarea type="text" class="form-control"  id="description" name="description" placeholder="Enter Image Description"></textarea>
                                    </div>
                                </div>
                                
                               <div class="form-group">
                                <label for="link" class="col-sm-2 control-label">Image</label>
                                <div class="col-sm-8">
                                <input type="file" class="form-control" id="image" name="image" placeholder="">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="title" class="col-sm-2 control-label"></label>
                                <div class="col-md-10">
                                    <img id="myImage" class="img-responsive" width="150" height="70" src="" alt="">
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
        <script>
            $(document).ready(function () {
                $('#monials').validate({ 
                rules: {
                        name: 
                        {
                        required: true,
                        
                        },
                        
                        image: 
                        {
                        required: true,
                        
                        },
                        description: 
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
            $('#monials').on('submit',function(e){
                e.preventDefault();
                //var data = $(this).serialize();
                  var base_url = $('#mainsliderform').find('#path').val();
                if ($('#monials').valid()) {
                    $.ajax({
                    url:"{{route('monial.store')}}",
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
                        $('.mymonials').prepend(`<tr class='unqmonials`+data.id+`'>
                        <td>`+data.name+`</td>
                        <td>`+data.description+`</td>
                        <td><img src="`+base_url`+/`+data.image+`" width="150" height="70"></td>
                     <td>
                            <a data-id ="`+data.id+`" data-toggle="modal" data-target="#monialsupdate" class="editmonials"><span class="glyphicon glyphicon-edit btn btn-primary btn-sm"></span></a>
                            <a class="deletemonials" data-id ="`+data.id+`" ><span class="glyphicon glyphicon-trash btn btn-danger btn-sm"></span></a>
                        </td>
                        </tr>`);          
                        $('#monials').trigger('reset');
                    }
                    
                });
                }
            });
            $(document).on('click','.editmonials',function(){
                var id = $(this).data('id');
                  var base_url = $('#mainsliderform').find('#path').val();
                $.ajax({
                url: "{!! route('monial.edit') !!}",
                type: "get", 
                data: {  
                    id: id, 
                },
                success: function(data) {
                    var img = data.image;
                    var srcimg=base_url+'/'+img;
                    $('#updatemonials #myImage ').attr("src", srcimg);
                    $('#updatemonials').find('#name').val(data.name);
                    $('#updatemonials').find('#id').val(data.id);
                    $('#updatemonials').find('#description').val(data.description);

                 }
                });
            })
            $(document).ready(function () {
                $('#updatemonials').validate({ 
                rules: {
                    name: 
                        {
                        required: true,
                        
                        },
                        
                        description: 
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
            $(document).on('submit','#updatemonials',function(e){
                e.preventDefault();
                    //var data = $(this).serialize();
                      var base_url = $('#mainsliderform').find('#path').val();
                    if ($('#updatemonials').valid()) {
                        $.ajax({
                        url:"{!! route('monial.update') !!}",
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
                            $('.unqmonials'+data.id).replaceWith(`<tr class='unqmonials`+data.id+`'>
                                <td>`+data.name+`</td>
                                <td>`+data.description+`</td>
                                <td><img src="`+base_url+`/`+data.image+`" width="150" height="70"></td>
                                <td>
                                    <a data-id ="`+data.id+`" data-toggle="modal" data-target="#monialsupdate" class="editmonials"><span class="glyphicon glyphicon-edit btn btn-primary btn-sm"></span></a>
                                    <a class="deletemonials" data-id ="`+data.id+`" ><span class="glyphicon glyphicon-trash btn btn-danger btn-sm"></span></a>
                                </td>
                                </tr>`);    
                            setTimeout(function() {$('#monialsupdate').modal('hide');}, 1500);
                
                            $('#updatemonials').trigger('reset');
                        }
                        
                    });
                }
            })
            $(document).on('click','.deletemonials',function(e) {
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
                    url: "{!! route('monial.delete') !!}",
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
      <div id="tab12" class="tab-pane fade in">
        <section class="content" id="footerref">
        <div class="box box-info">
                <div class="box-header with-border">
                <h3 class="box-title">Footer</h3>
                
                </div>
                {!!Form::open(['class' => 'form-horizontal','id'=>'footer','enctype'=>'multipart/form-data'])!!}
                <div class="box-body">
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="title" name="title" value="{{$footer->title}}">
                        <input type="hidden" class="form-control" id="id" name="id" value="{{$footer->id}}">

                     </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Sub Title</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{$footer->subtitle}}">

                     </div>
                    </div>
                
                  
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">Address</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="address" name="address" value="{{$footer->address}}">
    
                         </div>
                        </div>
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="email" name="email" value="{{$footer->email}}">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Phone</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="phone" name="phone" value="{{$footer->phone}}">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="link" class="col-sm-2 control-label">FB Link</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="fb_link" name="fb_link" value="{{$footer->fb_link}}">
                        </div>
                </div>
                
                <div class="form-group">
                    <label for="link" class="col-sm-2 control-label">LN Link</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="ln_link" name="ln_link" value="{{$footer->ln_link}}">
                    </div>
               </div>
                
               <div class="form-group">
                <label for="title" class="col-sm-2 control-label"></label>
                <div class="col-md-10">
                <img id="myImage" class="img-responsive" width="200" height="100" src="{{url('/'.$footer->image)}}" alt="">
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
                $('#footer').validate({ 
                    rules: {
                        title: 
                        {
                            required: true,
                            
                        },
                        subtitle: 
                        {
                            required: true,
                            
                        },
                       
                        address: 
                        {
                            required: true,
                            
                        },
                        email: 
                        {
                            required: true,
                            
                        },
                        phone: 
                        {
                            required: true,
                            
                        },
                        fb_link: 
                        {
                            required: true,
                            
                        },
                        
                        
                        ln_link: 
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
                $(document).on('submit','#footer',function(e){
                    e.preventDefault();
                    //var data = $(this).serialize();
                    if ($('#footer').valid()) {
                    $.ajax({
                        url:"{!! route('footer.update') !!}",
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
                            
                
                        $("#footerref").load(location.href + " #footerref");
                        }
                        
                    });
                }
            })
        </script>
     </div>
     </div>
    </div>
</section>
@endsection