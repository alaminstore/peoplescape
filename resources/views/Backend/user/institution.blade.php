@extends('Backend.backendmaster')
@section('institution-active','active')
@section('title', 'Peoplescape | Institution')
@section('content')
<div class="row">
<div class="col-md-12">
    <div class="col-md-4">
        <section class="content">
        <div class="box box-info">
                <div class="box-header with-border">
                <h3 class="box-title">Institution</h3>
                </div>
                {!!Form::open(['class' => 'form-horizontal','id'=>'institution','enctype'=>'multipart/form-data'])!!}
                <div class="box-body">
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Name </label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Ex: Dhaka University">
                        </div>
                    </div>
               </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-info btn-block">Submit</button>
                </div>
                {!!Form::close()!!}
            </div>
        </section>
    </div>
    <div class="col-md-8">
        <section class="content">
                <div class="row">
                <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-header">
                    <h3 class="box-title">institution List</h3>
                        <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                        </div>
                        </div>
                    <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped ">
                        <thead>
                        <tr>
                        <th width="50%">Name</th>
                        <th width="30%">Action</th>
                        </tr>
                        </thead>
                        <tbody class="institutionappend">
                            @foreach($institution as $inst)
                        <tr class="unqinstitution{{$inst->id}}">
                            <td>{{$inst->name}}</td>
                            <td>
                                <a data-id ="{{$inst->id}}" data-toggle="modal" data-target="#degreeupdatemodal" class="editinst"><span class="glyphicon glyphicon-edit btn btn-primary btn-sm"></span></a>
                                <a class="deleteinst" data-id ="{{$inst->id}}" ><span class="glyphicon glyphicon-trash btn btn-danger btn-sm"></span></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
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
                      <h4 class="modal-title">Institution Info</h4>
                    </div>
                      <div class="modal-body">
                          {!!Form::open(['class' => 'form-horizontal','id'=>'updateinstitution'])!!}
                          <div class="box-body">
                        <div class="form-group">
                            <label for="link" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="name" name="name">
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
            $('#institution').validate({ 
            rules:{
                name: 
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
        $('#institution').on('submit',function(e){
            e.preventDefault();
            if ($('#institution').valid()) {
                $.ajax({
                url:"{{route('institution.store')}}",
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
                    $('.institutionappend').prepend(`<tr class='unqinstitution`+data.id+`'>
                    <td>`+data.name+`</td>
                    <td>
                        <a data-id ="`+data.id+`" data-toggle="modal" data-target="#degreeupdatemodal" class="editinst"><span class="glyphicon glyphicon-edit btn btn-primary btn-sm"></span></a>
                        <a class="deleteinst" data-id ="`+data.id+`" ><span class="glyphicon glyphicon-trash btn btn-danger btn-sm"></span></a>
                    </td>
                    </tr>`);          
                    $('#institution').trigger('reset');
                }
                
            });
            }
        });
        $(document).on('click','.editinst',function(){
            var id = $(this).data('id');
            $.ajax({
            url: "{!! route('institution.edit') !!}",
            type: "get", 
            data: {  
                id: id, 
            },
            success: function(data) {
               
                $('#updateinstitution').find('#id').val(data.id);
                $('#updateinstitution').find('#name').val(data.name);
                

                }
            });
        })
        $(document).ready(function () {
            $('#updateinstitution').validate({ 
            rules: {
                    name: 
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
    
        $(document).on('submit','#updateinstitution',function(e){
            e.preventDefault();
                if ($('#updateinstitution').valid()) {
                    $.ajax({
                    url:"{!!route('institution.update')!!}",
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
                            $('.unqinstitution'+data.id).replaceWith(`<tr class='unqinstitution`+data.id+`'>
                        <td>`+data.name+`</td>
                        <td>
                            <a data-id ="`+data.id+`" data-toggle="modal" data-target="#degreeupdatemodal" class="editinst"><span class="glyphicon glyphicon-edit btn btn-primary btn-sm"></span></a>
                            <a class="deleteinst" data-id ="`+data.id+`" ><span class="glyphicon glyphicon-trash btn btn-danger btn-sm"></span></a>
                        </td>
                        </tr>`);    
                        setTimeout(function() {$('#degreeupdatemodal').modal('hide');}, 1500);
            
                        $('#updateinstitution').trigger('reset');
                    }
                    
                });
                }
            
        })
        $(document).on('click','.deleteinst',function(e) {
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
                url: "{!! route('institution.delete') !!}",
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
@endsection