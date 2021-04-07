@extends('Backend.backendmaster')
@section('client-active','active')
@section('title', 'PeopleScape | Client')
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
               <li class="active commonlitabforcash"><a data-toggle="tab" href="#tab1">Client head</a></li>
               <li class="commonlitabforcash"><a data-toggle="tab" href="#tab2">Client Top</a></li>
               <li class="commonlitabforcash"><a data-toggle="tab" href="#tab3">Clients</a></li>

           </ul>
        <div class="tab-content">
            <div id="tab1" class="tab-pane fade in active">
            <section class="content" id="clientheadref">
            <div class="box box-info">
                    <div class="box-header with-border">
                    <h3 class="box-title">Client Head</h3>
                    
                    </div>
                    {!!Form::open(['class' => 'form-horizontal','id'=>'clienthead','enctype'=>'multipart/form-data'])!!}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">Title</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="title" name="title" value="{{$data['clienthead']->title}}">
                            <input type="hidden" class="form-control" id="id" name="id" value="{{$data['clienthead']->id}}">
    
                        </div>
                        </div>
                    
                    <div class="form-group">
                            <label for="title" class="col-sm-2 control-label"></label>
                            <div class="col-md-10">
                            <img id="myImage" class="img-responsive" width="200" height="100" src="{{url('/'.$data['clienthead']->image)}}" alt="">
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
                $('#clienthead').validate({ 
                    rules: {
                        title: 
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
                $(document).on('submit','#clienthead',function(e){
                    e.preventDefault();
                    //var data = $(this).serialize();
                    if ($('#clienthead').valid()) {
                    $.ajax({
                    url:"{!! route('clienthead.update') !!}",
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
                            
                
                        $("#clientheadref").load(location.href + " #clientheadref");
                        }
                        
                    });
                }
            })
          </script>
         </div>
         <div id="tab2" class="tab-pane fade in">
                <section class="content" id="clientopref">
                <div class="box box-info">
                        <div class="box-header with-border">
                        <h3 class="box-title">Client Top</h3>
                        
                        </div>
                        {!!Form::open(['class' => 'form-horizontal','id'=>'clienttop','enctype'=>'multipart/form-data'])!!}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">Title</label>
                                <div class="col-sm-8">
                                <input type="text" class="form-control" id="title" name="title" value="{{$data['clienttop']->title}}">
                                <input type="hidden" class="form-control" id="id" name="id" value="{{$data['clienttop']->id}}">
        
                            </div>
                            </div>
                        
                            <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">Description (40)</label>
                            <div class="col-sm-8">
                            <textarea type="text" class="form-control"  name="description" rows="8" placeholder="Enter  Description">{{$data['clienttop']->description}}</textarea>
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
                        $('#clienttop').validate({ 
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
                        $(document).on('submit','#clienttop',function(e){
                            e.preventDefault();
                            //var data = $(this).serialize();
                            if ($('#clienttop').valid()) {
                            $.ajax({
                                url:"{!! route('clienttop.update') !!}",
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
                                    
                        
                                $("#clienttopref").load(location.href + " #clienttopref");
                                }
                                
                            });
                        }
                    })
                </script>
            </div>
            <div id="tab3" class="tab-pane fade in">
                    <section class="content">
                       <div class="box box-info">
                            <div class="box-header with-border">
                            <h3 class="box-title">Our Clients </h3>
                            </div>
                            {!!Form::open(['class' => 'form-horizontal','id'=>'client','enctype'=>'multipart/form-data'])!!}
                            <div class="box-body">
                            
                           <div class="form-group">
                            <label for="link" class="col-sm-2 control-label">Client Logo</label>
                            <div class="col-sm-8">
                            <input type="file" class="form-control" id="image" name="image" placeholder="">
                            <input type="hidden" name="path" id="path" value="{{url('/')}}">
                            </div>
                          </div>
                          <div class="form-group">
                                <label for="link" class="col-sm-2 control-label">Client Site Url</label>
                                <div class="col-sm-8">
                                <input type="text" class="form-control" id="url" name="url" placeholder="http://weaverbd.com">
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
                                    <h3 class="box-title">Clients</h3>
                                     <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                                      </div>
                                     </div>
                                  <div class="box-body">
                                    <table id="example1" class="table table-bordered table-striped clientprepend">
                                      <thead>
                                      <tr>
                                        <th width="20%">URL</th>
                                        <th width="20%">Photo</th>
                                        <th width="15%">Action</th>
                                      </tr>
                                      </thead>
                                      <tbody class="">
                                        @foreach($data['clients'] as $client)
                                       <tr class='unqclient{{$client->id}}'>
                                           <td>{{$client->url}}</td>
                                           <td><img src="{{url('/'.$client->image)}}" width="150" height="70"></td>
                                            <td>
                                                <a data-id ="{{$client->id}}" data-toggle="modal" data-target="#clientupdate" class="editclient"><span class="glyphicon glyphicon-edit btn btn-primary btn-sm"></span></a>
                                                <a class="deleteclient" data-id ="{{$client->id}}"><span class="glyphicon glyphicon-trash btn btn-danger btn-sm"></span></a>
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
                        <div class="modal fade" id="clientupdate">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                      <h4 class="modal-title">Client Info</h4>
                                    </div>
                                      <div class="modal-body">
                                          {!!Form::open(['class' => 'form-horizontal','id'=>'updateclient','enctype'=>'multipart/form-data'])!!}
                                          <div class="box-body">
                                        <div class="form-group">
                                            <label for="link" class="col-sm-2 control-label">Client Site Url</label>
                                            <div class="col-sm-8">
                                            <input type="text" class="form-control" id="url" name="url" placeholder="http://weaverbd.com">
                                            </div>
                                        </div>
                                    <div class="form-group">
                                        <label for="link" class="col-sm-2 control-label">Image</label>
                                        <div class="col-sm-8">
                                        <input type="file" class="form-control" id="image" name="image" placeholder="">
                                        <input type="hidden" class="form-control" id="id" name="id" placeholder="">

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
                        $('#client').validate({ 
                        rules: {
                                
                                
                                image: 
                                {
                                required: true,
                                
                                },
                                url: 
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
                    $('#client').on('submit',function(e){
                        e.preventDefault();
                         var base_url = $('#client').find('#path').val();
                        //var data = $(this).serialize();
                        if ($('#client').valid()) {
                            $.ajax({
                            url:"{{route('ourclient.store')}}",
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
                                $('.clientprepend').prepend(`<tr class='unqclient`+data.id+`'>
                                <td>`+data.url+`</td>
                                <td><img src="`+base_url+`/`+data.image+`" width="150" height="70"></td>
                             <td>
                                    <a data-id ="`+data.id+`" data-toggle="modal" data-target="#clientupdate" class="editclient"><span class="glyphicon glyphicon-edit btn btn-primary btn-sm"></span></a>
                                    <a class="deleteclient" data-id ="`+data.id+`" ><span class="glyphicon glyphicon-trash btn btn-danger btn-sm"></span></a>
                                </td>
                                </tr>`);          
                                $('#client').trigger('reset');
                            }
                            
                        });
                        }
                    });
                    $(document).on('click','.editclient',function(){
                        var id = $(this).data('id');
                         var base_url = $('#client').find('#path').val();
                        $.ajax({
                        url: "{!! route('ourclient.edit') !!}",
                        type: "get", 
                        data: {  
                            id: id, 
                        },
                        success: function(data) {
                            var img = data.image;
                            var srcimg=base_url+'/'+img;
                            $('#updateclient #myImage ').attr("src", srcimg);
                            $('#updateclient').find('#id').val(data.id);
                            $('#updateclient').find('#url').val(data.url);
                           
        
                         }
                        });
                    })
                    $(document).ready(function () {
                        $('#updateclient').validate({ 
                        rules: {
                                
                                
                                url: 
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
             
                    $(document).on('submit','#updateclient',function(e){
                        e.preventDefault();
                            //var data = $(this).serialize();
                             var base_url = $('#client').find('#path').val();
                            if ($('#updateclient').valid()) {
                                $.ajax({
                                url:"{!! route('ourclient.update') !!}",
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
                                        $('.unqclient'+data.id).replaceWith(`<tr class='unqclient`+data.id+`'>
                                    <td>`+data.url+`</td>
                                    <td><img src="`+base_url+`/`+data.image+`" width="150" height="70"></td>
                                    <td>
                                        <a data-id ="`+data.id+`" data-toggle="modal" data-target="#clientupdate" class="editclient"><span class="glyphicon glyphicon-edit btn btn-primary btn-sm"></span></a>
                                        <a class="deleteclient" data-id ="`+data.id+`" ><span class="glyphicon glyphicon-trash btn btn-danger btn-sm"></span></a>
                                    </td>
                                    </tr>`);    
                                    setTimeout(function() {$('#clientupdate').modal('hide');}, 1500);
                        
                                    $('#updatclient').trigger('reset');
                                }
                                
                            });
                            }
                        
                    })
                    $(document).on('click','.deleteclient',function(e) {
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
                            url: "{!! route('ourclient.delete') !!}",
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
</section>
@endsection