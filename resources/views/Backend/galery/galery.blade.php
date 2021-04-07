@extends('Backend.backendmaster')
@section('contact-active','active')
@section('title', 'PeopleScape | Contact')
@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> 
<style>
        #sortable { 
          list-style-type: none; 
          margin: 0; 
          padding: 0; 
          width: 90%; 
        }
        #sortable li { 
          margin: 3px 3px 3px 0; 
          padding: 1px; 
          float: left; 
          border: 0;
          background: none;
        }
        #sortable li img{
          width: 180px;
          height: 140px;
        }
        </style>
<section class="content" >
    <div class="box box-info">
            <div class="box-header with-border">
            <h3 class="box-title">Galery Options</h3>
                <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
            </div>
            <ul class="nav nav-tabs">
               <li class="commonlitabforcash active"><a data-toggle="tab" href="#tab1">Galery Info</a></li>
               <li class="commonlitabforcash "><a data-toggle="tab" href="#tab2">Image Order</a></li>
           </ul>
        <div class="tab-content">
                <div id="tab2" class="tab-pane fade in">
                        <section class="content" id="shortref">
                        <div class="box box-info">
                                <div class="box-header with-border">
                                <h3 class="box-title">Short Image</h3>
                                </div>
                                        {!!Form::open(['class' => 'form-horizontal','id'=>'serialgalery','enctype'=>'multipart/form-data'])!!}
                                        <div style='float: left; width: 100%;'>
                                        <div class="box-body">
           
                                        <ul id="sortable" style="width: 100%" >
                                                @foreach($allPhotoes as $galery)
                                                    <li class="ui-state-default" id="{{$galery->id}}">
                                                    <img src="{{url('/'.$galery->image)}}" title="'{{$galery->caption}}'" >
                                                    </li>
                                                @endforeach
                                        
                                       
                                       
                                        </ul>
                                      </div>
                                </div>
                                    
                                <div class="box-footer">
                                    <button type="submit" id="submit" class="btn btn-info">Sort</button>
                                </div>
                                {!!Form::close()!!}
                            </div>
                        </section>
                        <script>
                            $(document).ready(function(){
                               $( "#sortable" ).sortable();
                                $('#submit').on('click',function(e){
                                 e.preventDefault();
                                var data = [];
                                // get image ids order
                                $('#sortable li').each(function(){
                                var id = $(this).attr('id');
                               
                                data.push(id);
                                });
                                 $.ajax({
                                url: "{!!route('galeryserial.update')!!}",
                                type:"GET",
                                data: {imageids: data},
                                 success: function(response){
                                    toastr.options = {
                                        "debug": false,
                                        "positionClass": "toast-bottom-right",
                                        "onclick": null,
                                        "fadeIn": 300,
                                        "fadeOut": 1000,
                                        "timeOut": 5000,
                                        "extendedTimeOut": 1000
                                    };
                                     toastr.success('Image Sorted Successfully');
                                  }

                                  });
                                 });
                                });
                            </script>
                </div>
            <div id="tab1" class="tab-pane fade in active">
            <section class="content" id="contactref">
            <div class="box box-info">
                    <div class="box-header with-border">
                    <h3 class="box-title">Image Info</h3>
                    
                    </div>
                    {!!Form::open(['class' => 'form-horizontal','id'=>'galery','enctype'=>'multipart/form-data'])!!}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">Image</label>
                            <div class="col-sm-8">
                            <input type="file" class="form-control" id="image" name="image">
    
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">Caption</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="caption" name="caption" >
                              <input type="hidden" name="path" id="path" value="{{url('/')}}">
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
                                <th width="20%">Caption</th>
                                <th width="35%">Photo</th>  
                                <th width="15%">Action</th>
                              </tr>
                              </thead>
                              <tbody class="galeryimgappend">
                                @foreach($allPhotoes as $galery)
                               <tr class='unqgaleryimg{{$galery->id}}'>
                                  <td>{{$galery->caption}}</td>
                                 
                                <td><img src="{{url('/'.$galery->image)}}" width="150" height="70"></td>
                                  <td>
                                    <a data-id ="{{$galery->id}}" data-toggle="modal" data-target="#galeryupdate" class="editgaleryimg"><span class="glyphicon glyphicon-edit btn btn-primary btn-sm"></span></a>
                                    <a class="deletegaleryimage" data-id ="{{$galery->id}}"><span class="glyphicon glyphicon-trash btn btn-danger btn-sm"></span></a>
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
                <div class="modal fade" id="galeryupdate">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Edit Galary Info</h4>
                            </div>
                              <div class="modal-body">
                                  {!!Form::open(['class' => 'form-horizontal','id'=>'updategaleryimg','enctype'=>'multipart/form-data'])!!}
                                  <div class="box-body">
                                      <div class="form-group">
                                          <label for="title" class="col-sm-2 control-label">Caption (2/3)</label>
                                          <div class="col-sm-8">
                                          <input type="text" class="form-control" id="caption" name="caption" >
                                          <input type="hidden" class="form-control" id="id" name="id">
              
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
                $('#galery').validate({ 
                    rules: {
                        image: 
                        {
                            required: true,
                            
                        },
                        caption: 
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
                $('#galery').on('submit',function(e){
                        e.preventDefault();
                        //var data = $(this).serialize();
                         var base_url = $('#galery').find('#path').val();
                        if ($('#galery').valid()) {
                            $.ajax({
                            url:"{{route('galeryop.store')}}",
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
                                $('.galeryimgappend').prepend(`<tr class='unqgaleryimg`+data.id+`'>
                                <td>`+data.caption+`</td>
                                <td><img src="`+base_url+`/`+data.image+`" width="150" height="70"></td> 
                                <td>
                                    <a data-id ="`+data.id+`" data-toggle="modal" data-target="#galeryupdate" class="editgaleryimg"><span class="glyphicon glyphicon-edit btn btn-primary btn-sm"></span></a>
                                    <a class="deletegaleryimage" data-sliderid ="`+data.id+`" data-deptid=""><span class="glyphicon glyphicon-trash btn btn-danger btn-sm"></span></a>
                                </td>
                                </tr>`);          
                                $('#galery').trigger('reset');
                                // $("#shortref").load(location.href + " #shortref");

                            }
                            
                        });
                        }
                    });
                    $(document).on('click','.editgaleryimg',function(){
                        var id = $(this).data('id');
                         var base_url = $('#galery').find('#path').val();
                        $.ajax({
                        url: "{!! route('galeryopt.edit') !!}",
                        type: "get", 
                        data: {  
                            id: id, 
                        },
                        success: function(data) {
                            var img = data.image;
                            var srcimg=base_url+'/'+img;
                            $('#updategaleryimg #myImage ').attr("src", srcimg);
                            $('#updategaleryimg').find('#caption').val(data.caption);
                            $('#updategaleryimg').find('#id').val(data.id);
                        
                         }
                        });
                    });
                    $(document).ready(function () {
                $('#updategaleryimg').validate({ 
                    rules: {
                        
                        caption: 
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

                    
                    $(document).on('submit','#updategaleryimg',function(e){
                        e.preventDefault();
                            //var data = $(this).serialize();
                             var base_url = $('#galery').find('#path').val();
                            if ($('#updategaleryimg').valid()) {
                                $.ajax({
                                url:"{!! route('galeryopt.infoupdate') !!}",
                                method:"POST",
                                data:new FormData(this),
                                dataType:'JSON',
                                contentType: false,
                                cache: false,
                                processData: false,
                                success:function(data)
                                {
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
                                    toastr.success('Data Updated Successfully');
                                    $('.unqgaleryimg'+data.id).replaceWith(`<tr class='unqgaleryimg`+data.id+`'>
                                        <td>`+data.caption+`</td>
                                        <td><img src="`+base_url+`/`+data.image+`" width="150" height="70"></td> 
                                        <td>
                                            <a data-id ="`+data.id+`" data-toggle="modal" data-target="#galeryupdate" class="editgaleryimg"><span class="glyphicon glyphicon-edit btn btn-primary btn-sm"></span></a>
                                            <a class="deletegaleryimage" data-sliderid ="`+data.id+`" data-deptid=""><span class="glyphicon glyphicon-trash btn btn-danger btn-sm"></span></a>
                                        </td>
                                        </tr>`);    
                                    setTimeout(function() {$('#galeryupdate').modal('hide');}, 1500);
                        
                                    $('#updategaleryimg').trigger('reset');
                                }
                                
                            });
                        }
                    })
                    $(document).on('click','.deletegaleryimage',function(e) {
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
                            url: "{!! route('galeryopt.delete') !!}",
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