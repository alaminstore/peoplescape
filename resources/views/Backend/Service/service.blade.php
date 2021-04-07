@extends('Backend.backendmaster')
@section('service-active','active')
@section('title', 'PeopleScape | Service')
@section('content')
<section class="content" >
    <div class="box box-info">
            <div class="box-header with-border">
            <h3 class="box-title">Service Options</h3>
                <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
            </div>
            <ul class="nav nav-tabs">
               <li class="active commonlitabforcash"><a data-toggle="tab" href="#tab1">Service head</a></li>
               <li class="commonlitabforcash"><a data-toggle="tab" href="#tab2">Service Top</a></li>
               <li class="commonlitabforcash"><a data-toggle="tab" href="#tab3">Head Hunting</a></li>
               <li class="commonlitabforcash"><a data-toggle="tab" href="#tab4">Manpower Outsourcing</a></li>
               <li class="commonlitabforcash"><a data-toggle="tab" href="#tab5">Payroll Management</a></li>
               <li class="commonlitabforcash"><a data-toggle="tab" href="#tab6">Medical marketing</a></li>
               <li class="commonlitabforcash" style="margin-top:3px"><a data-toggle="tab" href="#tab7">Assessment Centner</a></li>
               <li class="commonlitabforcash" style="margin-top:3px"><a data-toggle="tab" href="#tab8">Recruitment Process Management</a></li>
               <li class="commonlitabforcash" style="margin-top:3px"><a data-toggle="tab" href="#tab9">Training & Development</a></li>
               <li class="commonlitabforcash" style="margin-top:3px"><a data-toggle="tab" href="#tab10">Health Screening</a></li>
               <li class="commonlitabforcash" style="margin-top:3px"><a data-toggle="tab" href="#tab11">Service Call</a></li>


           </ul>
        <div class="tab-content">
            <div id="tab1" class="tab-pane fade in active">
            <section class="content" id="serviceheadref">
            <div class="box box-info">
                    <div class="box-header with-border">
                    <h3 class="box-title">Service Head</h3>
                    
                    </div>
                    {!!Form::open(['class' => 'form-horizontal','id'=>'servicehead','enctype'=>'multipart/form-data'])!!}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">Title</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="title" name="title" value="{{$servicehead->title}}">
                            <input type="hidden" class="form-control" id="id" name="id" value="{{$servicehead->id}}">
    
                        </div>
                        </div>
                    
                    <div class="form-group">
                            <label for="title" class="col-sm-2 control-label"></label>
                            <div class="col-md-10">
                            <img id="myImage" class="img-responsive" width="200" height="100" src="{{url('/'.$servicehead->image)}}" alt="">
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
                $('#servicehead').validate({ 
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
                $(document).on('submit','#servicehead',function(e){
                    e.preventDefault();
                    //var data = $(this).serialize();
                    if ($('#servicehead').valid()) {
                    $.ajax({
                    url:"{!! route('serviceop.store') !!}",
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
                            
                
                        $("#serviceheadref").load(location.href + " #serviceheadref");
                        }
                        
                    });
                }
            })
          </script>
         </div>
         <div id="tab2" class="tab-pane fade in">
                <section class="content" id="servetopref">
                <div class="box box-info">
                        <div class="box-header with-border">
                        <h3 class="box-title">Service Top</h3>
                        
                        </div>
                        {!!Form::open(['class' => 'form-horizontal','id'=>'servetop','enctype'=>'multipart/form-data'])!!}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">Title</label>
                                <div class="col-sm-8">
                                <input type="text" class="form-control" id="title" name="title" value="{{$servetop->title}}">
                                <input type="hidden" class="form-control" id="id" name="id" value="{{$servetop->id}}">
        
                            </div>
                            </div>
                        
                            <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">Description (40)</label>
                            <div class="col-sm-8">
                            <textarea type="text" class="form-control"  name="description" rows="8" placeholder="Enter  Description">{{$servetop->description}}</textarea>
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
                        $('#servetop').validate({ 
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
                        $(document).on('submit','#servetop',function(e){
                            e.preventDefault();
                            //var data = $(this).serialize();
                            if ($('#servetop').valid()) {
                            $.ajax({
                                url:"{!! route('servetop.update') !!}",
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
                                    
                        
                                $("#servetopref").load(location.href + " #servetopref");
                                }
                                
                            });
                        }
                    })
                </script>
            </div>
            <div id="tab3" class="tab-pane fade in">
                    <section class="content" id="huntingref">
                    <div class="box box-info">
                            <div class="box-header with-border">
                            <h3 class="box-title">Head Hunting</h3>
                            
                            </div>
                            {!!Form::open(['class' => 'form-horizontal','id'=>'hunting','enctype'=>'multipart/form-data'])!!}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="title" class="col-sm-2 control-label">Title</label>
                                    <div class="col-sm-8">
                                    <input type="text" class="form-control" id="title" name="title" value="{{$data['hunting']->title}}">
                                    <input type="hidden" class="form-control" id="id" name="id" value="{{$data['hunting']->id}}">
            
                                </div>
                                </div>
                            
                                <div class="form-group">
                                <label for="description" class="col-sm-2 control-label">Description (40)</label>
                                <div class="col-sm-8">
                                <textarea type="text" class="form-control"  name="description" rows="8" placeholder="Enter  Description">{{$data['hunting']->description}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                    <label for="title" class="col-sm-2 control-label"></label>
                                    <div class="col-md-10">
                                    <img id="myImage" class="img-responsive" width="200" height="100" src="{{url('/'.$data['hunting']->image)}}" alt="">
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
                            $('#hunting').validate({ 
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
                            $(document).on('submit','#hunting',function(e){
                                e.preventDefault();
                                //var data = $(this).serialize();
                                if ($('#hunting').valid()) {
                                $.ajax({
                                    url:"{!! route('hunting.update') !!}",
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
                                        
                            
                                    $("#huntingref").load(location.href + " #huntingref");
                                    }
                                    
                                });
                            }
                        })
                    </script>
             </div>
             <div id="tab4" class="tab-pane fade in">
                    <section class="content" id="manpowerref">
                    <div class="box box-info">
                            <div class="box-header with-border">
                            <h3 class="box-title">Manpower Outsourcing</h3>
                            
                            </div>
                            {!!Form::open(['class' => 'form-horizontal','id'=>'manpower','enctype'=>'multipart/form-data'])!!}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="title" class="col-sm-2 control-label">Title</label>
                                    <div class="col-sm-8">
                                    <input type="text" class="form-control" id="title" name="title" value="{{$data['manpower']->title}}">
                                    <input type="hidden" class="form-control" id="id" name="id" value="{{$data['manpower']->id}}">
            
                                </div>
                                </div>
                            
                                <div class="form-group">
                                <label for="description" class="col-sm-2 control-label">Description (40)</label>
                                <div class="col-sm-8">
                                <textarea type="text" class="form-control"  name="description" rows="8" placeholder="Enter  Description">{{$data['manpower']->description}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                    <label for="title" class="col-sm-2 control-label"></label>
                                    <div class="col-md-10">
                                    <img id="myImage" class="img-responsive" width="200" height="100" src="{{url('/'.$data['manpower']->image)}}" alt="">
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
                            $('#manpower').validate({ 
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
                            $(document).on('submit','#manpower',function(e){
                                e.preventDefault();
                                //var data = $(this).serialize();
                                if ($('#manpower').valid()) {
                                $.ajax({
                                    url:"{!! route('manpower.update') !!}",
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
                                        
                            
                                    $("#manpowerref").load(location.href + " #manpowerref");
                                    }
                                    
                                });
                            }
                        })
                    </script>
                 </div>
                 <div id="tab5" class="tab-pane fade in">
                        <section class="content" id="payrollref">
                        <div class="box box-info">
                                <div class="box-header with-border">
                                <h3 class="box-title">Payroll Management</h3>
                                
                                </div>
                                {!!Form::open(['class' => 'form-horizontal','id'=>'payroll','enctype'=>'multipart/form-data'])!!}
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="title" class="col-sm-2 control-label">Title</label>
                                        <div class="col-sm-8">
                                        <input type="text" class="form-control" id="title" name="title" value="{{$data['payroll']->title}}">
                                        <input type="hidden" class="form-control" id="id" name="id" value="{{$data['payroll']->id}}">
                
                                    </div>
                                    </div>
                                
                                    <div class="form-group">
                                    <label for="description" class="col-sm-2 control-label">Description (40)</label>
                                    <div class="col-sm-8">
                                    <textarea type="text" class="form-control"  name="description" rows="8" placeholder="Enter  Description">{{$data['payroll']->description}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label for="title" class="col-sm-2 control-label"></label>
                                        <div class="col-md-10">
                                        <img id="myImage" class="img-responsive" width="200" height="100" src="{{url('/'.$data['payroll']->image)}}" alt="">
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
                                $('#payroll').validate({ 
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
                                $(document).on('submit','#payroll',function(e){
                                    e.preventDefault();
                                    //var data = $(this).serialize();
                                    if ($('#payroll').valid()) {
                                    $.ajax({
                                        url:"{!! route('payroll.update') !!}",
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
                                            
                                
                                        $("#payrollref").load(location.href + " #payrollref");
                                        }
                                        
                                    });
                                }
                            })
                        </script>
                     </div>
                     <div id="tab6" class="tab-pane fade in">
                            <section class="content" id="medicalref">
                            <div class="box box-info">
                                    <div class="box-header with-border">
                                    <h3 class="box-title">Medical marketing</h3>
                                    
                                    </div>
                                    {!!Form::open(['class' => 'form-horizontal','id'=>'medical','enctype'=>'multipart/form-data'])!!}
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="title" class="col-sm-2 control-label">Title</label>
                                            <div class="col-sm-8">
                                            <input type="text" class="form-control" id="title" name="title" value="{{$data['medical']->title}}">
                                            <input type="hidden" class="form-control" id="id" name="id" value="{{$data['medical']->id}}">
                    
                                        </div>
                                        </div>
                                    
                                        <div class="form-group">
                                        <label for="description" class="col-sm-2 control-label">Description (40)</label>
                                        <div class="col-sm-8">
                                        <textarea type="text" class="form-control"  name="description" rows="8" placeholder="Enter  Description">{{$data['medical']->description}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="title" class="col-sm-2 control-label"></label>
                                            <div class="col-md-10">
                                            <img id="myImage" class="img-responsive" width="200" height="100" src="{{url('/'.$data['medical']->image)}}" alt="">
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
                                    $('#medical').validate({ 
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
                                    $(document).on('submit','#medical',function(e){
                                        e.preventDefault();
                                        //var data = $(this).serialize();
                                        if ($('#medical').valid()) {
                                        $.ajax({
                                            url:"{!! route('medical.update') !!}",
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
                                                
                                    
                                            $("#medicalref").load(location.href + " #medicalref");
                                            }
                                            
                                        });
                                    }
                                })
                            </script>
                         </div>
                         <div id="tab7" class="tab-pane fade in">
                                <section class="content" id="assesref">
                                <div class="box box-info">
                                        <div class="box-header with-border">
                                        <h3 class="box-title">Assessment Centner</h3>
                                        
                                        </div>
                                        {!!Form::open(['class' => 'form-horizontal','id'=>'asses','enctype'=>'multipart/form-data'])!!}
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="title" class="col-sm-2 control-label">Title</label>
                                                <div class="col-sm-8">
                                                <input type="text" class="form-control" id="title" name="title" value="{{$data['asses']->title}}">
                                                <input type="hidden" class="form-control" id="id" name="id" value="{{$data['asses']->id}}">
                        
                                            </div>
                                            </div>
                                        
                                            <div class="form-group">
                                            <label for="description" class="col-sm-2 control-label">Description (40)</label>
                                            <div class="col-sm-8">
                                            <textarea type="text" class="form-control"  name="description" rows="8" placeholder="Enter  Description">{{$data['asses']->description}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                                <label for="title" class="col-sm-2 control-label"></label>
                                                <div class="col-md-10">
                                                <img id="myImage" class="img-responsive" width="200" height="100" src="{{url('/'.$data['asses']->image)}}" alt="">
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
                                        $('#asses').validate({ 
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
                                        $(document).on('submit','#asses',function(e){
                                            e.preventDefault();
                                            //var data = $(this).serialize();
                                            if ($('#asses').valid()) {
                                            $.ajax({
                                                url:"{!! route('asses.update') !!}",
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
                                                    
                                        
                                                $("#assesref").load(location.href + " #assesref");
                                                }
                                                
                                            });
                                        }
                                    })
                                </script>
                             </div>
                             <div id="tab8" class="tab-pane fade in">
                                    <section class="content" id="recruitref">
                                    <div class="box box-info">
                                            <div class="box-header with-border">
                                            <h3 class="box-title">Recruitment Process Management</h3>
                                            
                                            </div>
                                            {!!Form::open(['class' => 'form-horizontal','id'=>'recruit','enctype'=>'multipart/form-data'])!!}
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <label for="title" class="col-sm-2 control-label">Title</label>
                                                    <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="title" name="title" value="{{$data['recruit']->title}}">
                                                    <input type="hidden" class="form-control" id="id" name="id" value="{{$data['recruit']->id}}">
                            
                                                </div>
                                                </div>
                                            
                                                <div class="form-group">
                                                <label for="description" class="col-sm-2 control-label">Description (40)</label>
                                                <div class="col-sm-8">
                                                <textarea type="text" class="form-control"  name="description" rows="8" placeholder="Enter  Description">{{$data['recruit']->description}}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                    <label for="title" class="col-sm-2 control-label"></label>
                                                    <div class="col-md-10">
                                                    <img id="myImage" class="img-responsive" width="200" height="100" src="{{url('/'.$data['recruit']->image)}}" alt="">
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
                                            $('#recruit').validate({ 
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
                                            $(document).on('submit','#recruit',function(e){
                                                e.preventDefault();
                                                //var data = $(this).serialize();
                                                if ($('#recruit').valid()) {
                                                $.ajax({
                                                    url:"{!! route('recruit.update') !!}",
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
                                                        
                                            
                                                    $("#recruitref").load(location.href + " #recruitref");
                                                    }
                                                    
                                                });
                                            }
                                        })
                                    </script>
                                 </div>
                                 <div id="tab9" class="tab-pane fade in">
                                        <section class="content" id="trainingref">
                                        <div class="box box-info">
                                                <div class="box-header with-border">
                                                <h3 class="box-title">Training & Development</h3>
                                                
                                                </div>
                                                {!!Form::open(['class' => 'form-horizontal','id'=>'training','enctype'=>'multipart/form-data'])!!}
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="title" class="col-sm-2 control-label">Title</label>
                                                        <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="title" name="title" value="{{$data['training']->title}}">
                                                        <input type="hidden" class="form-control" id="id" name="id" value="{{$data['training']->id}}">
                                
                                                    </div>
                                                    </div>
                                                
                                                    <div class="form-group">
                                                    <label for="description" class="col-sm-2 control-label">Description (40)</label>
                                                    <div class="col-sm-8">
                                                    <textarea type="text" class="form-control"  name="description" rows="8" placeholder="Enter  Description">{{$data['training']->description}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                        <label for="title" class="col-sm-2 control-label"></label>
                                                        <div class="col-md-10">
                                                        <img id="myImage" class="img-responsive" width="200" height="100" src="{{url('/'.$data['training']->image)}}" alt="">
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
                                                $('#training').validate({ 
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
                                                $(document).on('submit','#training',function(e){
                                                    e.preventDefault();
                                                    //var data = $(this).serialize();
                                                    if ($('#training').valid()) {
                                                    $.ajax({
                                                        url:"{!! route('training.update') !!}",
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
                                                            
                                                
                                                        $("#trainingref").load(location.href + " #trainingref");
                                                        }
                                                        
                                                    });
                                                }
                                            })
                                        </script>
                                     </div>
                                     <div id="tab10" class="tab-pane fade in">
                                            <section class="content" id="healthref">
                                            <div class="box box-info">
                                                    <div class="box-header with-border">
                                                    <h3 class="box-title">Health Screening</h3>
                                                    
                                                    </div>
                                                    {!!Form::open(['class' => 'form-horizontal','id'=>'health','enctype'=>'multipart/form-data'])!!}
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label for="title" class="col-sm-2 control-label">Title</label>
                                                            <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="title" name="title" value="{{$data['health']->title}}">
                                                            <input type="hidden" class="form-control" id="id" name="id" value="{{$data['health']->id}}">
                                    
                                                        </div>
                                                        </div>
                                                    
                                                        <div class="form-group">
                                                        <label for="description" class="col-sm-2 control-label">Description (40)</label>
                                                        <div class="col-sm-8">
                                                        <textarea type="text" class="form-control"  name="description" rows="8" placeholder="Enter  Description">{{$data['health']->description}}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                            <label for="title" class="col-sm-2 control-label"></label>
                                                            <div class="col-md-10">
                                                            <img id="myImage" class="img-responsive" width="200" height="100" src="{{url('/'.$data['health']->image)}}" alt="">
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
                                                    $('#health').validate({ 
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
                                                    $(document).on('submit','#health',function(e){
                                                        e.preventDefault();
                                                        //var data = $(this).serialize();
                                                        if ($('#health').valid()) {
                                                        $.ajax({
                                                            url:"{!! route('health.update') !!}",
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
                                                                
                                                    
                                                            $("#healthref").load(location.href + " #healthref");
                                                            }
                                                            
                                                        });
                                                    }
                                                })
                                            </script>
                                         </div>
                                         <div id="tab11" class="tab-pane fade in">
                                                <section class="content" id="scallpref">
                                                <div class="box box-info">
                                                        <div class="box-header with-border">
                                                        <h3 class="box-title">Call to action</h3>
                                                        
                                                        </div>
                                                        {!!Form::open(['class' => 'form-horizontal','id'=>'scall','enctype'=>'multipart/form-data'])!!}
                                                        <div class="box-body">
                                                            
                                                            <div class="form-group">
                                                            <label for="description" class="col-sm-2 control-label">Description</label>
                                                            <div class="col-sm-8">
                                                            <textarea type="text" class="form-control"  name="description" rows="8" placeholder="Enter  Description">{{$data['scall']->description}}</textarea>
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
                                                        $('#scall').validate({ 
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
                                                        $(document).on('submit','#scall',function(e){
                                                            e.preventDefault();
                                                            //var data = $(this).serialize();
                                                            if ($('#scall').valid()) {
                                                            $.ajax({
                                                                url:"{!! route('scall.update') !!}",
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
                                                                    
                                                        
                                                                $("#scallref").load(location.href + " #scallref");
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