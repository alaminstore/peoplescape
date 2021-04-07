@extends('Backend.backendmaster')
@section('recog-active','active')
@section('title', 'PeopleScape | Recognition')
@section('content')
<section class="content" >
    <div class="box box-info">
            <div class="box-header with-border">
            <h3 class="box-title">Recognition Options</h3>
                <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
            </div>
            <ul class="nav nav-tabs">
               <li class="active commonlitabforcash"><a data-toggle="tab" href="#tab1">Recognition head</a></li>
               <li class="commonlitabforcash"><a data-toggle="tab" href="#tab2">Recognitions</a></li>

           </ul>
        <div class="tab-content">
            <div id="tab1" class="tab-pane fade in active">
            <section class="content" id="recogheadref">
            <div class="box box-info">
                    <div class="box-header with-border">
                    <h3 class="box-title">Recognition Head</h3>
                    
                    </div>
                    {!!Form::open(['class' => 'form-horizontal','id'=>'recoghead','enctype'=>'multipart/form-data'])!!}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">Title</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="title" name="title" value="{{$data['recoghead']->title}}">
                            <input type="hidden" class="form-control" id="id" name="id" value="{{$data['recoghead']->id}}">
    
                        </div>
                        </div>
                    
                    <div class="form-group">
                            <label for="title" class="col-sm-2 control-label"></label>
                            <div class="col-md-10">
                            <img id="myImage" class="img-responsive" width="200" height="100" src="{{url('/'.$data['recoghead']->image)}}" alt="">
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
                $('#recoghead').validate({ 
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
                $(document).on('submit','#recoghead',function(e){
                    e.preventDefault();
                    //var data = $(this).serialize();
                    if ($('#recoghead').valid()) {
                    $.ajax({
                    url:"{!! route('recoghead.update') !!}",
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
                            
                
                        $("#recogheadref").load(location.href + " #recogheadref");
                        }
                        
                    });
                }
            })
          </script>
         </div>
        <div id="tab2" class="tab-pane fade in">
                    <section class="content">
                       <div class="box box-info">
                            <div class="box-header with-border">
                            <h3 class="box-title">Our Recognition </h3>
                            </div>
                            {!!Form::open(['class' => 'form-horizontal','id'=>'recognition','enctype'=>'multipart/form-data'])!!}
                            <div class="box-body">
                            <div class="form-group">
                                    <label for="link" class="col-sm-2 control-label">Title</label>
                                    <div class="col-sm-8">
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                                    </div>
                             </div>
                             <div class="form-group">
                                    <label for="link" class="col-sm-2 control-label">Description</label>
                                    <div class="col-sm-8">
                                    <textarea  class="form-control" id="description" name="description" placeholder="description" rows="8"></textarea>
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
                                    <h3 class="box-title">Recognitions</h3>
                                     <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                                      </div>
                                     </div>
                                  <div class="box-body">
                                    <table id="example1" class="table table-bordered table-striped recogprepend">
                                      <thead>
                                      <tr>
                                        <th width="20%">Title</th>
                                        <th width="30%">Description</th>
                                        <th width="20%">Photo</th>  
                                        <th width="15%">Action</th>
                                      </tr>
                                      </thead>
                                      <tbody class="">
                                        @foreach($data['recog'] as $recog)
                                       <tr class='unqrecog{{$recog->id}}'>
                                           <td>{{$recog->title}}</td>
                                           <td>{{$recog->description}}</td>
                                           <td><img src="{{url('/'.$recog->image)}}" width="150" height="70"></td>
                                            <td>
                                                <a data-id ="{{$recog->id}}" data-toggle="modal" data-target="#recogupdate" class="editrecog"><span class="glyphicon glyphicon-edit btn btn-primary btn-sm"></span></a>
                                                <a class="deleterecog" data-id ="{{$recog->id}}"><span class="glyphicon glyphicon-trash btn btn-danger btn-sm"></span></a>
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
                        <div class="modal fade" id="recogupdate">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                      <h4 class="modal-title">Recognition Info</h4>
                                    </div>
                                      <div class="modal-body">
                                          {!!Form::open(['class' => 'form-horizontal','id'=>'updaterecog','enctype'=>'multipart/form-data'])!!}
                                          <div class="box-body">
                                        <div class="form-group">
                                                <label for="link" class="col-sm-2 control-label">Title</label>
                                                <div class="col-sm-8">
                                                <input type="text" class="form-control" id="title" name="title" placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="link" class="col-sm-2 control-label">Description</label>
                                                <div class="col-sm-8">
                                                <textarea  class="form-control" id="description" name="description" placeholder="description" rows="8"></textarea>
                                                </div>
                                        </div>
                                        <div class="form-group">
                                                <label for="title" class="col-sm-2 control-label"></label>
                                                <div class="col-md-10">
                                                    <img id="myImage" class="img-responsive" width="150" height="70" src="" alt="">
                                                </div>
                                              </div>
                                    <div class="form-group">
                                        <label for="link" class="col-sm-2 control-label">Image</label>
                                        <div class="col-sm-8">
                                        <input type="file" class="form-control" id="image" name="image" placeholder="">
                                        <input type="hidden" class="form-control" id="id" name="id" placeholder="">

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
                        $('#recognition').validate({ 
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
                    $('#recognition').on('submit',function(e){
                        e.preventDefault();
                        //var data = $(this).serialize();
                        if ($('#recognition').valid()) {
                            $.ajax({
                            url:"{{route('recog.store')}}",
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
                                $('.recogprepend').prepend(`<tr class='unqrecog`+data.id+`'>
                                <td>`+data.title+`</td>
                                <td>`+data.description+`</td>
                                <td><img src="/`+data.image+`" width="150" height="70"></td>
                             <td>
                                    <a data-id ="`+data.id+`" data-toggle="modal" data-target="#recogupdate" class="editrecog"><span class="glyphicon glyphicon-edit btn btn-primary btn-sm"></span></a>
                                    <a class="deleterecog" data-id ="`+data.id+`" ><span class="glyphicon glyphicon-trash btn btn-danger btn-sm"></span></a>
                                </td>
                                </tr>`);          
                                $('#recognition').trigger('reset');
                            }
                            
                        });
                        }
                    });
                    $(document).on('click','.editrecog',function(){
                        var id = $(this).data('id');
                        $.ajax({
                        url: "{!! route('recog.edit') !!}",
                        type: "get", 
                        data: {  
                            id: id, 
                        },
                        success: function(data) {
                            var img = data.image;
                            var srcimg='/'+img;
                            $('#updaterecog #myImage ').attr("src", srcimg);
                            $('#updaterecog').find('#id').val(data.id);
                            $('#updaterecog').find('#title').val(data.title);
                            $('#updaterecog').find('#description').val(data.description);
                           
        
                         }
                        });
                    })
                    $(document).ready(function () {
                        $('#updaterecog').validate({ 
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
             
                    $(document).on('submit','#updaterecog',function(e){
                        e.preventDefault();
                            //var data = $(this).serialize();
                            if ($('#updaterecog').valid()) {
                                $.ajax({
                                url:"{!! route('recog.update') !!}",
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
                                        $('.unqrecog'+data.id).replaceWith(`<tr class='unqrecog`+data.id+`'>
                                <td>`+data.title+`</td>
                                <td>`+data.description+`</td>
                                <td><img src="/`+data.image+`" width="150" height="70"></td>
                                  <td>
                                    <a data-id ="`+data.id+`" data-toggle="modal" data-target="#recogupdate" class="editrecog"><span class="glyphicon glyphicon-edit btn btn-primary btn-sm"></span></a>
                                    <a class="deleterecog" data-id ="`+data.id+`" ><span class="glyphicon glyphicon-trash btn btn-danger btn-sm"></span></a>
                                </td>
                                </tr>`);    
                                    setTimeout(function() {$('#recogupdate').modal('hide');}, 1500);
                        
                                    $('#updaterecog').trigger('reset');
                                }
                                
                            });
                            }
                        
                    })
                    $(document).on('click','.deleterecog',function(e) {
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
                            url: "{!! route('recog.delete') !!}",
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