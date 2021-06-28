@extends('Backend.backendmaster')
@section('career-active','active')
@section('title', 'PeopleScape | Career')
@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Career Options</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i>
                    </button>
                </div>
            </div>
            <ul class="nav nav-tabs">
                <li class="active commonlitabforcash"><a data-toggle="tab" href="#tab2">Post Job</a></li>
                @if(Auth::user()->status !='moderator')

                @endif
            </ul>
            <div class="tab-content">

                {{-- tab1 here --}}
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
                                        <label for="title" class="col-sm-2 control-label">Job Title</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="title"
                                                   placeholder="Enter category Title" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="title" class="col-sm-2 control-label">Job Short Code</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="shotsavecode" name="short_code"
                                                   placeholder="HRM,ACCOUNTANT,DEVELOPER,D ... " required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="title" class="col-sm-2 control-label">Company Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="company" name="company"
                                                   placeholder="Enter Company Name" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="title" class="col-sm-2 control-label">Experience</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="experience" name="experience"
                                                   placeholder="Enter experience" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="title" class="col-sm-2 control-label">Vacancy</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="vacancy" name="vacancy"
                                                   placeholder="Enter vacancy " required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="title" class="col-sm-2 control-label">Job Nature</label>
                                        <div class="col-sm-6">
                                            <select class="form-control job_nature_selection" id="job_nature_selection"
                                                    name="jobtype" required>
                                                <option value="">Select Job Nature</option>
                                                @foreach($data['jobnature'] as $type)
                                                    <option value="{{$type->nature}}">{{$type->nature}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="pull-right">
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#exampleModalCenter">
                                                    <i class="fa fa-plus" aria-hidden="true"></i> &nbsp; Add New Job Nature
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="title" class="col-sm-2 control-label">Education</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="education" name="education"
                                                   placeholder="Enter education" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="title" class="col-sm-2 control-label">Deadline</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control" id="deadline" name="deadline"
                                                   placeholder="Enter deadline" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="title" class="col-sm-2 control-label">Location</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="location" name="location"
                                                   placeholder="Enter location" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="title" class="col-sm-2 control-label">Salary</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="salary" name="salary"
                                                   placeholder="Enter Salary" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="department" class="col-sm-2 control-label">Career Category</label>
                                        <div class="form_with_button style="
                                             display: flex;
                                             justify-content: space-between;
                                             align-items: center;
                                        ">
                                        <div class="col-sm-6">
                                            <select id="category" class="form-control career_cat_selection"
                                                    name="catid" required>
                                                <option value="">Select Category</option>
                                                @foreach($data['cat'] as $category)
                                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="pull-right">
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target=".bd-example-modal-lg">
                                                    <i class="fa fa-plus" aria-hidden="true"></i> &nbsp; Add New
                                                    Category
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="title" class="col-sm-2 control-label">Job Description</label>
                                    <div class="col-sm-8">
                                        <textarea type="text" class="form-control" id="topdescription"
                                                  name="topdescription" placeholder="Enter Job Description"
                                                  rows="8" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="title" class="col-sm-2 control-label">Responsibilities Text</label>
                                    <div class="col-sm-8">
                                        <textarea type="text" class="form-control" id="responsibilitiestext"
                                                  name="responsibilitiestext"
                                                  placeholder="Enter Job responsibilitiestext" rows="5" required></textarea>
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
                                                    <td><input type="text" class="form-control"
                                                               name="program[0][responsibilitiespoint]"><br></td>
                                                    <td><span class="remove"
                                                              style="background: #ed3610;padding: 8px 10px;color: #fff;border-radius: 6%;text-decoration: none;cursor:pointer">-</span>
                                                    </td>
                                                </tr>

                                            </table>
                                            <span class="add_more" style="background: #28d19c;
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
                                                    <td><input type="text" class="form-control" id="pro_description"
                                                               name="qualification[0][qualification]" required><br></td>
                                                    <td><span class="sremove"
                                                              style="background: #ed3610;padding: 8px 10px;color: #fff;border-radius: 6%;text-decoration: none;cursor:pointer">-</span>
                                                    </td>
                                                </tr>

                                            </table>
                                            <span class="sadd_more" style="background: #28d19c;
                                                                        padding: 8px 21px;
                                                                        color: #fff;
                                                                        border-radius: 8%;text-decoration: none; margin-bottom: 10px;cursor:pointer;">+</span><br><br>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="title" class="col-sm-2 control-label">How To Apply Text</label>
                                    <div class="col-sm-8">
                                        <textarea type="text" class="form-control" id="howtoapply" name="howtoapply"
                                                  placeholder="Enter howtoapply" rows="5" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-info">Submit</button>
                            </div>
                        {!!Form::close()!!}
                </div>


            {{-- Modal start --}}

            <!-- Button trigger modal -->


                <!-- Modal Job Nature -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Job Nature</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div id="tab4" class="tab-pane fade in">
                                    <div class="row">
                                        <div class="col-md-12"><br>
                                            <div class="box box-info">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Job Nature</h3>
                                                </div>
                                                <div class="col-md-12">
                                                    <section class="content">
                                                        {!!Form::open(['class' => 'form-horizontal','id'=>'jobnature'])!!}
                                                        <div class="box-body">
                                                            <div class="form-group">
                                                                <label for="title"
                                                                       class="col-sm-2 control-label">Nature </label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control"
                                                                           name="nature" placeholder="Ex: Full Time.." required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="box-footer">
                                                            <button type="submit" class="btn btn-info">Submit</button>
                                                        </div>
                                                        {!!Form::close()!!}
                                                    </section>
                                                </div>
                                                <div class="col-md-12">
                                                    <section class="content">
                                                        <div class="row">
                                                            <div class="col-xs-12">
                                                                <div class="box-body">
                                                                    <table id="example1"
                                                                           class="table table-bordered table-striped ">
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
                                                                                    <a data-id="{{$jn->id}}"
                                                                                       data-toggle="modal"
                                                                                       data-target="#degreeupdatemodal"
                                                                                       class="editjobnature"><span
                                                                                            class="glyphicon glyphicon-edit btn btn-primary btn-sm"></span></a>
                                                                                    <a class="deletejobnature"
                                                                                       data-id="{{$jn->id}}"><span
                                                                                            class="glyphicon glyphicon-trash btn btn-danger btn-sm"></span></a>
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
                                                                    <div class="header">
                                                                        <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true"></span></button>
                                                                        <h4 class="modal-title">Job Nature Info</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-body">
                                                                    {!!Form::open(['class' => 'form-horizontal','id'=>'updatejobnature'])!!}
                                                                    <div class="box-body">
                                                                        <div class="form-group">
                                                                            <label for="link"
                                                                                   class="col-sm-2 control-label">Nature</label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control"
                                                                                       id="nature" name="nature" required>
                                                                                <input type="hidden"
                                                                                       class="form-control" id="id"
                                                                                       name="id">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="box-footer">
                                                                        <button type="submit" class="btn btn-info">
                                                                            Update
                                                                        </button>
                                                                    </div>
                                                                    {!!Form::close()!!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <script>
                                                    $(document).ready(function () {
                                                        // $('#jobnature').validate({
                                                        //     rules: {
                                                        //         nature:
                                                        //             {
                                                        //                 required: true,

                                                        //             },
                                                        //     },

                                                        //     highlight: function (element) {
                                                        //         $(element).parent().addClass('has-error');
                                                        //     },
                                                        //     unhighlight: function (element) {
                                                        //         $(element).parent().removeClass('has-error');
                                                        //     },
                                                        // });

                                                    });
                                                    $('#jobnature').on('submit', function (e) {
                                                        e.preventDefault();
                                                        // if ($('#jobnature').valid()) {
                                                            $.ajax({
                                                                url: "{{route('jobnature.store')}}",
                                                                method: "POST",
                                                                data: new FormData(this),
                                                                dataType: 'JSON',
                                                                contentType: false,
                                                                cache: false,
                                                                processData: false,
                                                                success: function (data) {
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
                                                                    $('.jobnatureappend').prepend(`<tr class='unqjobnature` + data.id + `'>
                                                                          <td>` + data.nature + `</td>
                                                                          <td>
                                                                              <a data-id ="` + data.id + `" data-toggle="modal" data-target="#degreeupdatemodal" class="editjobnature"><span class="glyphicon glyphicon-edit btn btn-primary btn-sm"></span></a>
                                                                              <a class="deletejobnature" data-id ="` + data.id + `" ><span class="glyphicon glyphicon-trash btn btn-danger btn-sm"></span></a>
                                                                          </td>
                                                                          </tr>`);
                                                                    $('#jobnature').trigger('reset');
                                                                    $('.job_nature_selection').append(`<option value="` + data.nature + `">` + data.nature + `</option>`);

                                                                    $('#job_nature_selection').trigger('reset');
                                                                }

                                                            });
                                                        // }
                                                    });
                                                    $(document).on('click', '.editjobnature', function () {
                                                        var id = $(this).data('id');
                                                        $.ajax({
                                                            url: "{!! route('jobnature.edit') !!}",
                                                            type: "get",
                                                            data: {
                                                                id: id,
                                                            },
                                                            success: function (data) {

                                                                $('#updatejobnature').find('#id').val(data.id);
                                                                $('#updatejobnature').find('#nature').val(data.nature);


                                                            }
                                                        });
                                                    })
                                                    $(document).ready(function () {
                                                        // $('#updatejobnature').validate({
                                                        //     rules: {


                                                        //         nature:
                                                        //             {
                                                        //                 required: true,

                                                        //             },


                                                        //     },

                                                        //     highlight: function (element) {
                                                        //         $(element).parent().addClass('has-error');
                                                        //     },
                                                        //     unhighlight: function (element) {
                                                        //         $(element).parent().removeClass('has-error');
                                                        //     },
                                                        // });

                                                    });

                                                    $(document).on('submit', '#updatejobnature', function (e) {
                                                        e.preventDefault();
                                                        // if ($('#updatejobnature').valid()) {
                                                            $.ajax({
                                                                url: "{!! route('jobnature.update') !!}",
                                                                method: "POST",
                                                                data: new FormData(this),
                                                                dataType: 'JSON',
                                                                contentType: false,
                                                                cache: false,
                                                                processData: false,
                                                                success: function (data) {
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
                                                                    $('.unqjobnature' + data.id).replaceWith(`<tr class='unqjobnature` + data.id + `'>
                                                                              <td>` + data.nature + `</td>
                                                                              <td>
                                                                                  <a data-id ="` + data.id + `" data-toggle="modal" data-target="#degreeupdatemodal" class="editjobnature"><span class="glyphicon glyphicon-edit btn btn-primary btn-sm"></span></a>
                                                                                  <a class="deletejobnature" data-id ="` + data.id + `" ><span class="glyphicon glyphicon-trash btn btn-danger btn-sm"></span></a>
                                                                              </td>
                                                                              </tr>`);
                                                                    setTimeout(function () {
                                                                        $('#degreeupdatemodal').modal('hide');
                                                                    }, 1500);

                                                                    $('#updatejobnature').trigger('reset');
                                                                }

                                                            });
                                                        // }

                                                    })
                                                    $(document).on('click', '.deletejobnature', function (e) {
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
                                                                        success: function (data) {
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
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Modal Career Category-->
                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Career Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div>
                                    <section class="content">
                                        <div class="box box-info">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">Career Category</h3>
                                            </div>
                                            {{-- <form id="category" action="{{route('careercat.store')}}" method="post"> --}}
                                            {!!Form::open(['class' => 'form-horizontal','id'=>'categoryAdd','enctype'=>'multipart/form-data'])!!}
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <label for="title" class="col-sm-2 control-label">Title</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control"  name="title"
                                                               placeholder="Enter category Title" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="box-footer">
                                                <button type="submit" class="btn btn-info">Submit</button>
                                            </div>
                                            {!!Form::close()!!}
                                            </form>
                                        </div>
                                    </section>
                                    <section class="content">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="box box-info">
                                                    <div class="box-header">
                                                        <h3 class="box-title">Category List</h3>
                                                        <div class="box-tools pull-right">
                                                            <button type="button" class="btn btn-box-tool"
                                                                    data-widget="collapse"><i class="fa fa-minus"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-box-tool"
                                                                    data-widget="remove"><i class="fa fa-remove"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="box-body">
                                                        <table id="example2"
                                                               class="table table-bordered table-striped catprepend">
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
                                                                        <a data-id="{{$category->id}}"
                                                                           data-toggle="modal" data-target="#catupdate"
                                                                           class="editcat bd-example-modal-sm"><span
                                                                                class="glyphicon glyphicon-edit btn btn-primary btn-sm"></span></a>
                                                                        <a class="deletecat"
                                                                           data-id="{{$category->id}}"><span
                                                                                class="glyphicon glyphicon-trash btn btn-danger btn-sm"></span></a>
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
                                    <div class="modal  fade bd-example-modal-sm" id="catupdate">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true"></span></button>
                                                    <h4 class="modal-title">Edit Category Info</h4>
                                                </div>
                                                <div class="modal-body">
                                                    {!!Form::open(['class' => 'form-horizontal','id'=>'updatecat','enctype'=>'multipart/form-data'])!!}
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label for="title"
                                                                   class="col-sm-2 control-label">Title</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" id="title"
                                                                       name="title" placeholder="Enter  Title" required>
                                                                <input type="hidden" class="form-control"
                                                                       name="id" placeholder="Enter Image Title">

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
                                                // $('#categoryAdd').validate({
                                                //     rules: {
                                                //         title:
                                                //             {
                                                //                 required: true,

                                                //             },

                                                //     },

                                                //     highlight: function (element) {
                                                //         $(element).parent().addClass('has-error');
                                                //     },
                                                //     unhighlight: function (element) {
                                                //         $(element).parent().removeClass('has-error');
                                                //     },
                                                // });
                                            });
                                            //Form validation Script
                                            $(document).ready(function () {
                                                // $('#updatecat').validate({
                                                //     rules: {
                                                //         title:
                                                //             {
                                                //                 required: true,

                                                //             },

                                                //     },

                                                //     highlight: function (element) {
                                                //         $(element).parent().addClass('has-error');
                                                //     },
                                                //     unhighlight: function (element) {
                                                //         $(element).parent().removeClass('has-error');
                                                //     },
                                                // });
                                            });

                                            $(document).on('submit', '#categoryAdd', function (e) {
                                                e.preventDefault();
                                                var selectedVal = $("select option:selected").val();
                                                console.log(selectedVal);
                                                // var prod_id=$(this).val();
                                                //  console.log('id',prod_id);
                                                // alert('ok');
                                                //var data = $(this).serialize();
                                                // if ($('#categoryAdd').valid()) {
                                                    $.ajax({
                                                        url: "{{route('careercat.store')}}",
                                                        method: "POST",
                                                        data: new FormData(this),
                                                        dataType: 'JSON',
                                                        contentType: false,
                                                        cache: false,
                                                        processData: false,
                                                        success: function (data) {
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
                                                            $('.catappend').prepend(`<tr class='unqcat` + data.id + `'>
                                                                        <td>` + data.title + `</td>
                                                                        <td>` + data.created_at + `</td>
                                                                        <td>
                                                                          <a data-id ="` + data.id + `" data-toggle="modal" data-target="#catupdate" class="editcat"><span class="glyphicon glyphicon-edit btn btn-primary btn-sm"></span></a>
                                                                          <a class="deletecat" data-id ="` + data.id + `" ><span class="glyphicon glyphicon-trash btn btn-danger btn-sm"></span></a>
                                                                        </td>
                                                                      </tr>`);
                                                            $('#categoryAdd').trigger('reset');
                                                            $('.career_cat_selection').append(`<option value="` + data.id + `">` + data.title + `</option>`)
                                                        }

                                                    });
                                                // }
                                            });
                                            $(document).on('click', '.editcat', function () {
                                                var id = $(this).data('id');
                                                $.ajax({
                                                    url: "{!! route('careercat.edit') !!}",
                                                    type: "get",
                                                    data: {
                                                        id: id,
                                                    },
                                                    success: function (data) {

                                                        $('#updatecat').find('#title').val(data.title);
                                                        $('#updatecat').find('#id').val(data.id);


                                                    }
                                                });
                                            })
                                            $(document).on('submit', '#updatecat', function (e) {
                                                e.preventDefault();
                                                //var data = $(this).serialize();
                                                // if ($('#updatecat').valid()) {
                                                    $.ajax({
                                                        url: "{!! route('careercat.update') !!}",
                                                        method: "POST",
                                                        data: new FormData(this),
                                                        dataType: 'JSON',
                                                        contentType: false,
                                                        cache: false,
                                                        processData: false,
                                                        success: function (data) {
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
                                                            $('.unqcat' + data.id).replaceWith(`<tr class='unqcat` + data.id + `'>
                                                                        <td>` + data.title + `</td>
                                                                        <td>` + data.created_at + `</td>
                                                                        <td>
                                                                          <a data-id ="` + data.id + `" data-toggle="modal" data-target="#catupdate" class="editcat"><span class="glyphicon glyphicon-edit btn btn-primary btn-sm"></span></a>
                                                                          <a class="deletecat" data-id ="` + data.id + `" ><span class="glyphicon glyphicon-trash btn btn-danger btn-sm"></span></a>
                                                                        </td>
                                                                      </tr>`);
                                                            setTimeout(function () {
                                                                $('#catupdate').modal('hide');
                                                            }, 1500);

                                                            $('#updatecat').trigger('reset');
                                                        }

                                                    });
                                                // }
                                            })
                                            $(document).on('click', '.deletecat', function (e) {
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
                                                                success: function (data) {
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
                            <div class="modal-footer">
                                {{-- onclick="javascript:window.location.reload()" --}}
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>

        {{-- Modal end --}}


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
                this.name = this.name.replace(/\d+/, index + 1);
                this.id = this.id.replace(/\d+/, index + 1);
                this.value = '';
            }).end();
            $('.smoreTable').append(html);
            var rowCount = $('.smoreTable tr').length;
            $(this).closest('.sitemWrapper').find('.sitem_tr:last').find('.day_no').html(rowCount - 1);
            $(this).closest('.sitemWrapper').find('.sitem_tr:last').find('.dayval').val(rowCount - 1);
        });
        $(document).on('click', '.sremove', function () {
            var obj = $(this);
            var count = $('.ssingle_list').length;
            // alert(count);
            if (count > 1) {
                if (obj.closest('.ssingle_list').is($(this).closest('.sitemWrapper').find('.ssingle_list:last'))) {
                    obj.closest('.ssingle_list').remove();
                } else {
                    alert('You can only remove the last one!');
                }
            }
        });
        $(document).on('click', '.add_more', function () {
            var index = $('.list').data('index_no');
            $('.list').data('index_no', index + 1);
            var html = $('.itemWrapper .item_tr:last').clone().find('.form-control').each(function () {
                this.name = this.name.replace(/\d+/, index + 1);
                this.id = this.id.replace(/\d+/, index + 1);
                this.value = '';
            }).end();
            $('.moreTable').append(html);
            var rowCount = $('.moreTable tr').length;
            $(this).closest('.itemWrapper').find('.item_tr:last').find('.day_no').html(rowCount - 1);
            $(this).closest('.itemWrapper').find('.item_tr:last').find('.dayval').val(rowCount - 1);
        });
        $(document).on('click', '.remove', function () {
            var obj = $(this);
            var count = $('.single_list').length;
            // alert(count);
            if (count > 1) {
                if (obj.closest('.single_list').is($(this).closest('.itemWrapper').find('.single_list:last'))) {
                    obj.closest('.single_list').remove();
                } else {
                    alert('You can only remove the last one!');
                }
            }
        });
        // $('#myjob').validate({
        //     rules: {
        //         title:
        //             {
        //                 required: true,

        //             },
        //     short_code:
        //             {
        //                 required: true,

        //             },
        //         company:
        //             {
        //                 required: true,

        //             },
        //         jobtype: {
        //             required: true,
        //         },
        //         experience:
        //             {
        //                 required: true,

        //             },
        //         vacancy:
        //             {
        //                 required: true,

        //             },
        //         education:
        //             {
        //                 required: true,

        //             },
        //         deadline:
        //             {
        //                 required: true,

        //             },
        //         location:
        //             {
        //                 required: true,

        //             },
        //         salary:
        //             {
        //                 required: true,

        //             },
        //         topdescription:
        //             {
        //                 required: true,

        //             },
        //         responsibilitiestext:
        //             {
        //                 required: true,

        //             },
        //         howtoapply:
        //             {
        //                 required: true,

        //             },
        //         howtoapply:
        //             {
        //                 required: true,

        //             },
        //         catid:
        //             {
        //                 required: true,

        //             },

        //     },

        //     // highlight: function (element) {
        //     //     $(element).parent().addClass('has-error');
        //     // },
        //     // unhighlight: function (element) {
        //     //     $(element).parent().removeClass('has-error');
        //     // },
        // });
        $('#myjob').on('submit', function (e) {
            e.preventDefault();
            //alert('ok');
            //var data = $(this).serialize();
            // if ($('#myjob').valid()) {
            // var $form = $(this);
            // if(! $form.valid()) return false;
                $.ajax({
                    url: "{{route('careerop.store')}}",
                    method: "POST",
                    data: new FormData(this),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
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
                        $('#myjob').trigger('reset');
                        toastr.success('Data Inserted Successfully');
                        $('.jobappend').prepend(`<tr class='unqjob` + data.id + `'>
                                    <td>` + data.title + `</td>
                                    <td>` + data.company + `</td>
                                    <td>` + data.experience + `</td>
                                    <td>` + data.salary + `</td>
                                    <td>` + data.location + `</td>
                                    <td>
                                      <a href="` + url + `"  class="editjob"><span class="glyphicon glyphicon-edit btn btn-primary btn-sm"></span></a>
                                      <a class="deletejob" data-id ="` + data.id + `" ><span class="glyphicon glyphicon-trash btn btn-danger btn-sm"></span></a>
                                    </td>
                                  </tr>`);
                        $('#myjob').trigger('reset');
                    }

                });
            // }
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

        $(document).on('click', '.deletejob', function (e) {
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
                            success: function (data) {
                            }
                        });

                        $(this).closest('tr').hide();

                    }
                }
            )
        });
        $(document).on('click', '.jobdeactive', function () {
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
                success: function (data) {
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
                error: function (xhr) {
                    //Do Something to handle error
                }
            });
        });
        $(document).on('click', '.jobactive', function () {
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
                success: function (data) {
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
                error: function (xhr) {
                    //Do Something to handle error
                }
            });
        });
    </script>
    </div>
    {{-- here...... tab 4 --}}
    </div>
    </section>

@endsection
