@extends('Backend.backendmaster')
@section('contact-active','active')
@section('title', 'Peoplescape | Contact')
@section('content')
<section class="content" >
    <div class="box box-info">
            <div class="box-header with-border">
            <h3 class="box-title">Contact Options</h3>
                <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
            </div>
            <ul class="nav nav-tabs">
               <li class="active commonlitabforcash"><a data-toggle="tab" href="#tab1">Contact Info</a></li>
           </ul>
        <div class="tab-content">
            <div id="tab1" class="tab-pane fade in active">
            <section class="content" id="recogheadref">
            <div class="box box-info">
                    <div class="box-header with-border">
                    <h3 class="box-title">Contact Info</h3>
                    
                    </div>
                    {!!Form::open(['class' => 'form-horizontal','id'=>'contact','enctype'=>'multipart/form-data'])!!}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">Address</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="address" name="address" value="{{$data['contact']->address}}">
                            <input type="hidden" class="form-control" id="id" name="id" value="{{$data['contact']->id}}">
    
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">Phone</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="phone" name="phone" value="{{$data['contact']->phone}}">
                          </div>
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="email" name="email" value="{{$data['contact']->email}}">
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
                $('#contact').validate({ 
                    rules: {
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
                        
                        
                        
                    },
                    
                    highlight: function(element) {
                        $(element).parent().addClass('has-error');
                    },
                    unhighlight: function(element) {
                        $(element).parent().removeClass('has-error');
                    },
                });
                });
                $(document).on('submit','#contact',function(e){
                    e.preventDefault();
                    //var data = $(this).serialize();
                    if ($('#contact').valid()) {
                    $.ajax({
                    url:"{!! route('contactop.store') !!}",
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
                          $("#contactref").load(location.href + " #contactref");
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