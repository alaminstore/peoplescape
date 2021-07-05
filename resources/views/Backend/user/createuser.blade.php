@extends('Backend.backendmaster')
@section('create-user-active','active')
@section('title', 'PeopleScape | Create USer')
@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="col-md-6">
        <section class="content">
        <div class="box box-info">
             <div class="box-header with-border">
             <h3 class="box-title">Create User</h3>
             </div>
             {!!Form::open(['class' => 'form-horizontal','id'=>'usercreate','enctype'=>'multipart/form-data'])!!}
             <div class="box-body">
                 <div class="form-group">
                     <label for="title" class="col-sm-2 control-label">Name </label>
                     <div class="col-sm-8">
                     <input type="text" class="form-control" id="title" name="name" placeholder="Enter User Name">
                     </div>
                 </div>
                 <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Email </label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter User Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Role </label>
                        <div class="col-sm-8">
                          <select name="status" class="form-control">
                              <option value="">Select One</option>
                            <option value="AppAdmin">AppAdmin</option>
                            <option value="CMSAdmin">CMSAdmin</option>
                            <option value="moderator">Moderator</option>
                            <!--<option value="Manager">Manager</option>-->
                            <!--<option value="Editor">Editor</option>-->
                          </select>
                        </div>
                    </div>
                    <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">Mobile </label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter User Mobile">
                            </div>
                        </div>
             <div class="form-group">
                 <label for="title" class="col-sm-2 control-label">Image </label>
                 <div class="col-sm-8">
                 <input type="file" class="form-control" id="image" name="image">
                 </div>
             </div>
             <div class="form-group">
                <label for="title" class="col-sm-2 control-label">Password </label>
                <div class="col-sm-8">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
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
    <div class="col-xs-6">
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box box-info">
              <div class="box-header">
                <h3 class="box-title">User List</h3>
                 <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                  </div>
                 </div>
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped ">
                  <thead>

                  <tr>
                    <th>Name</th>
                    <th>Role</th>
                   <th>Action</th>
                  </tr>

                  </thead>
                  <tbody class="userappend">
                  @foreach($GetAdminuser as $user)
                  <tr class="unquser{{$user->id}}">
                     <td>{{$user->name}}</td>
                     <td>{{$user->status}}</td>
                     <td>
                        <a data-id="{{$user->id}}" data-toggle="modal" data-target="#usermodal" class="edituser"><span class="glyphicon glyphicon-edit btn btn-primary user-btn-size"></span></a>
                        <a class="deleteuser" data-id ="{{$user->id}}" ><span class="glyphicon glyphicon-trash btn btn-danger user-btn-size"></span></a>
                        <label class="userswitch">
                          <input type="checkbox" {{$user->activity ==1 ? 'checked':''}}>
                        <span id="test" data-userid="{{$user->id}}" data-ofid="0" data-onid="1"  class="userslider round {{$user->activity == 1 ? 'userdeactive':'useractive'}}"></span>

                      </label>
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
        <div class="modal fade" id="usermodal">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">User Info</h4>
                </div>
                  <div class="modal-body">
                      {!!Form::open(['class' => 'form-horizontal','id'=>'updateuser','enctype'=>'multipart/form-data'])!!}

                      <div class="box-body">
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">Name </label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter User Name">
                            </div>
                        </div>
                        <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">Email </label>
                                <div class="col-sm-8">
                                <input type="text" class="form-control" id="email" name="email" placeholder="Enter User Email">
                                <input type="hidden"  id="path" value="{{url('/')}}">
                              </div>
                            </div>
                            <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">Role </label>
                                <div class="col-sm-8">
                                  <select name="status" id="status" class="form-control">
                                    <option value="AppAdmin">AppAdmin</option>
                                    <option value="CMSAdmin">CMSAdmin</option>
                                    <option value="moderator">Moderator</option>
                                    <option value="Manager">Manager</option>
                                    <option value="Editor">Editor</option>
                                  </select>
                                </div>
                            </div>
                                <div class="form-group">
                                    <label for="title" class="col-sm-2 control-label">Mobile </label>
                                    <div class="col-sm-8">
                                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter User Mobile">
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
                          <button type="submit" class="btn btn-info btn-block">Update</button>
                      </div>
                      {!!Form::close()!!}
                </div>
              </div>
          </div>
    </div>
     <script>
           $(document).on('click','.userdeactive',function(){
            var id = $(this).data('ofid');
        var userid = $(this).data('userid');
        $(this).removeClass('userdeactive');
        $(this).addClass('useractive');
        $.ajax({
          url: "{!! route('user.status') !!}",
          type: "get",
          data: {
            id: id,
            userid: userid,

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
          toastr.success('User Was  Deactivated Successfully');


          },
          error: function(xhr) {
            //Do Something to handle error
          }
        });
    });
    $(document).on('click','.useractive',function(){
        var id = $(this).data('onid');
        var userid = $(this).data('userid');
        $(this).removeClass('useractive');
        $(this).addClass('userdeactive');
        $.ajax({
          url: "{!! route('user.status') !!}",
          type: "get",
          data: {
            id: id,
            userid: userid,
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
          toastr.success('User activated Successfully');

          },
          error: function(xhr) {
            //Do Something to handle error
          }
        });
    });

      $(document).ready(function () {
        $('#usercreate').validate({
        rules: {
                name:
                {
                required: true,

                },
                email:
                {
                required: true,

                },
                password:
                {
                required: true,

                },
                mobile:
                {
                required: true,

                },
                status:
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
    $('#usercreate').on('submit',function(e){
        e.preventDefault();
          var base_url = $('#updateuser').find('#path').val();
        //var data = $(this).serialize();
        if ($('#usercreate').valid()) {
            $.ajax({
            url:"{{route('maintainuser.store')}}",
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

                $('.userappend').prepend(`<tr class='unquser`+data.id+`'>
                <td>`+data.name+`</td>
                <td>`+data.status+`</td>
                <td>
                    <a data-id ="`+data.id+`" data-toggle="modal" data-target="#usermodal" class="edituser"><span class="glyphicon glyphicon-edit btn btn-primary btn-sm"></span></a>
                    <a class="deleteuser" data-id ="`+data.id+`"><span class="glyphicon glyphicon-trash btn btn-danger btn-sm"></span></a>
                </td>
                </tr>`);
                $('#usercreate').trigger('reset');
            }

        });
        }
    });
    $(document).on('click','.edituser',function(){
        var id = $(this).data('id');
          var base_url = $('#updateuser').find('#path').val();
        $.ajax({
        url: "{!! route('maintainuser.edit') !!}",
        type: "get",
        data: {
            id: id,
        },
        success: function(data) {
          console.log(data);
            var img = data.image;
            var srcimg=base_url+'/'+img;
            $('#updateuser #myImage ').attr("src", srcimg);
            $('#updateuser').find('#id').val(data.id);
            $('#updateuser').find('#name').val(data.name);
            $('#updateuser').find('#email').val(data.email);
            $('#updateuser').find('#mobile').val(data.mobile);
            $('#updateuser').find('#status').append(`<option selected='selected' value=`+data.status+`>`+data.status+`</option>`);
          }
        });
    })
    $(document).ready(function () {
        $('#updateuser').validate({
        rules: {
              name:
                {
                  required: true,
                },
                email:
                {
                  required: true,
                },
                mobile:
                {
                  required: true,
                },
                status:
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

    $(document).on('submit','#updateuser',function(e){
        e.preventDefault();
            //var data = $(this).serialize();
              var base_url = $('#client').find('#path').val();
            if ($('#updateuser').valid()) {
                $.ajax({
                url:"{!! route('maintainuser.update') !!}",
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
                        $('.unquser'+data.id).replaceWith(`<tr class='unquser`+data.id+`'>
                        <td>`+data.name+`</td>
                      <td>`+data.status+`</td>

                      <td>
                            <a data-id ="`+data.id+`" data-toggle="modal" data-target="#usermodal" class="edituser"><span class="glyphicon glyphicon-edit btn btn-primary btn-sm"></span></a>
                            <a class="deleteuser" data-id ="`+data.id+`" ><span class="glyphicon glyphicon-trash btn btn-danger btn-sm"></span></a>
                        </td>
                </tr>`);
                    setTimeout(function() {$('#usermodal').modal('hide');}, 1500);

                    $('#updateuser').trigger('reset');
                }

            });
            }

    })
    $(document).on('click','.deleteuser',function(e) {
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
            url: "{!! route('maintainuser.delete') !!}",
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
@endsection
