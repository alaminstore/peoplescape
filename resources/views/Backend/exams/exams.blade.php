@extends('Backend.backendmaster')
@section('exams-active','active')
@section('title', 'PeopleScape | Exams-List')
@section('content')
    <style>
        .p-0 {
            padding-right: 0;
        }
        span.select2-selection.select2-selection--single {
            height: 31px;
        }
        div.dataTables_wrapper div.dataTables_filter input {
            min-width: 177px;
        }
    </style>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title"><b>Exam List</b></h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                    class="fa fa-remove"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class=" pull-right col-sm-2 p-0">
                            <div class="pull-right">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#examSave">
                                    <i class="fa fa-plus" aria-hidden="true"></i> &nbsp; Create New Exam Date
                                </button>
                            </div>
                        </div>
                        <br><br><br>
                        <div id="reload-category">
                            <table id="examlist" class="table table-bordered table-striped jobprepend">
                                <thead>
                                <tr>
                                    <th class="text-center" width="15%">Job Category</th>
                                    <th class="text-center" width="15%">Exam Name</th>
                                    <th class="text-center" width="15%">Vanue</th>
                                    <th class="text-center" width="15%">Exam Date</th>
                                    <th class="text-center" width="15%">Designation</th>
                                    <th class="text-center" width="22%">Action</th>
                                </tr>
                                </thead>
                                <tbody id="loadnow">
                                    @foreach ($examlists as $exam)
                                        <tr class="text-center">
                                            <td>{{$exam->getCareercat->title}}</td>
                                            <td>{{$exam->exam_name}}</td>
                                            <td>{{$exam->vanue}}</td>
                                            <td>{{$exam->exam_date}}</td>
                                            <td>{{ \Illuminate\Support\Str::limit($exam->designation, 20, $end='...') }}</td>
                                            <td>

                                                <a class="viewData" data-id="{{$exam->exam_id}}"><span class="glyphicon glyphicon-eye-open btn btn-info btn-sm"></span></a>
                                                <a class="deletejob" data-id="{{$exam->exam_id}}"><span
                                                        class="glyphicon glyphicon-trash btn btn-danger btn-sm"></span></a>
                                                <a class="editjob" data-id="{{$exam->exam_id}}"><span
                                                        class="glyphicon glyphicon-edit btn btn-primary btn-sm"></span></a>
                                            </td>
                                        </tr>
                                   @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{--Save Modal --}}
                    <div class="modal fade" id="examSave" role="dialog"
                         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h4 class="modal-title" id="exampleModalLongTitle">Add New Exam Schedule</h4>
                                </div>
                                <div class="modal-body">
                                    {!!Form::open(['class' => 'form-horizontal','id'=>'createExam'])!!}
                                    @csrf
                                    <div class="form-group row">
                                        <label for="job category" class="col-sm-3 col-md-3 col-form-label">Select Job
                                            Category</label>
                                        <div class="col-sm-9 col-md-9">
                                            <select style="width: 100%;" name="careercat_id" class="jobcat form-control"
                                                    required>
                                                <option value=""></option>
                                                @foreach ($jobCat as $cat)
                                                    <option value="{{$cat->id}}">{{$cat->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-3 col-form-label">Exam Name</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="exam_name"
                                                   placeholder="Exam Name Here..." required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="name" class="col-sm-3 col-form-label">Vanue</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="vanue"
                                                   placeholder="Vanue Here..." required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="url" class="col-sm-3 col-form-label">Designation</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" id="url" name="designation"
                                                   placeholder="Designation Here..." required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="url" class="col-sm-3 col-form-label">Exam Date</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="date" name="exam_date"
                                                   placeholder="Designation Here..." required>
                                        </div>
                                    </div>
                                    <div class="form-group row  pull-right">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                Submit
                                            </button>
                                            <button type="reset" class="btn btn-secondary waves-effect m-l-5"
                                                    data-dismiss="modal">
                                                Close
                                            </button>
                                        </div>
                                    </div>
                                    {!!Form::close()!!}
                                </div>
                                <br>
                                <div class="modal-footer">
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--Update Modal --}}
                    <div class="modal fade" id="updateModal" role="dialog"
                         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h4 class="modal-title" id="exampleModalLongTitle">Update The Exam Schedule</h4>
                                </div>
                                <div class="modal-body">
                                    {!!Form::open(['class' => 'form-horizontal','id'=>'updateExam'])!!}
                                    @csrf
                                    <div class="form-group row">
                                        <label for="job category" class="col-sm-3 col-md-3 col-form-label">Select Job
                                            Category</label>
                                        <div class="col-sm-9 col-md-9">
                                            <select style="width: 100%;" name="careercat_id" id="jobcat2" class="jobcat form-control"
                                                    required>
                                                <option value=""></option>
                                                @foreach ($jobCat as $cat)
                                                    <option value="{{$cat->id}}">{{$cat->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-3 col-form-label">Exam Name</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" id="exam_name2" name="exam_name"
                                                   placeholder="Exam Name Here..." required>
                                            <input type="text" name="category_id" id="category-edit-id" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="name" class="col-sm-3 col-form-label">Vanue</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" id="vanue2" name="vanue"
                                                   placeholder="Vanue Here..." required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="url" class="col-sm-3 col-form-label">Designation</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" id="designation2" name="designation"
                                                   placeholder="Designation Here..." required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="url" class="col-sm-3 col-form-label">Exam Date</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="date" id="exam_date2" name="exam_date"
                                                   placeholder="Designation Here..." required>
                                        </div>
                                    </div>

                                    <div class="form-group row  pull-right">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                Submit
                                            </button>
                                            <button type="reset" class="btn btn-secondary waves-effect m-l-5"
                                                    data-dismiss="modal">
                                                Close
                                            </button>
                                        </div>
                                    </div>
                                    {!!Form::close()!!}
                                </div>
                                <br>
                                <div class="modal-footer">
                                </div>
                            </div>
                        </div>
                    </div>



    {{-- View Modal --}}

    <div id="viewModel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myLargeModalLabel">Portfolio Category Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body" style="background: #f5f5f5;">

                    <div class="Catname d-flex">
                        <p><b>Portfolio Category Name:&nbsp;&nbsp;&nbsp;</b></p>
                        <div id="viewName"></div>
                        <br>
                    </div>

                    <div class="desc">
                        <p><b>Portfolio Category Description:&nbsp;&nbsp;&nbsp;</b></p>
                        <div id="viewDescription"></div>
                    </div>
                    <div class="iconview">
                        <p><b>Portfolio Category Icon:&nbsp;&nbsp;&nbsp;</b></p>
                        <div id="viewIcon" class="text-center"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


                </div>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function () {
            $('.jobcat').select2({
                placeholder: "Select job category"
            });

            // Edit Data...
            $('#reload-category').on('click', '.editjob', function () {
                let id = $(this).attr('data-id');
                console.log('id:',id);
                $.ajax({
                    url: "{{url('examedt')}}/" + id + '/edit',
                    method: "get",
                    data: {},
                    dataType: 'json',
                    success: function (response) {
                        console.log('data', response);
                        $('#exam_name2').val(response.data.exam_name);
                        $('#category-edit-id').val(response.data.exam_id);
                        $('#updateModal').modal('show');
                    },
                    error: function (error) {
                        if (error.status == 404) {
                            toastr.error('Not found!');
                        }
                    }
                });
            });

            //view data
            $('#reload-category').on('click', '.viewData', function () {
                let id = $(this).attr('data-id');
                console.log('id--', id);
                $.ajax({
                    url: "{{url('exams-view')}}/" + id,
                    method: "get",
                    data: {},
                    dataType: 'json',
                    success: function (response) {
                        console.log(response.data);
                        // $('#viewName').text(response.data.name);
                        // $('#viewDescription').text(response.data.description);
                        // $('#viewIcon').html(`<img width="300" height="300" class="img-fluid"  src="${url}/${response.data.icon}" class="dropify"/>`);
                        $('#viewModel').modal('show');
                    },
                    error: function (error) {
                        if (error.status == 404) {
                            toastr.error('Not found!');
                        }
                    }
                });
            });

            //save data
            $('#createExam').on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    url: "{{route('exams.store')}}",
                    method: "POST",
                    data: new FormData(this),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        console.log('save', data);
                        toastr.options = {
                            "debug": false,
                            "positionClass": "toast-bottom-right",
                            "onclick": null,
                            "fadeIn": 300,
                            "fadeOut": 1000,
                            "timeOut": 5000,
                            "extendedTimeOut": 1000
                        };
                        $('#examSave').modal('hide');
                        setTimeout(function () {
                            $("#loadnow").load(location.href + " #loadnow>*", "");
                        }, 1);
                        toastr.success('Data Inserted Successfully');
                        $('#examSave').trigger('reset');
                    }
                });
            });
            //Delete data
            $(document).on('click', '.deletejob', function (e) {
                e.preventDefault();
                var id = $(this).data('id');
                console.log('id: ', id);
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
                                url: "{!! route('exams.destroy') !!}",
                                type: "get",
                                data: {
                                    id: id,
                                },
                            });
                            toastr.success('Data Deleted Successfully');
                            $(this).closest('tr').hide();
                        }
                    }
                )
            });

            //Update data
            $('#updateExam').on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    url: "{{route('exams.updated')}}",
                    method: "POST",
                    data: new FormData(this),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        console.log('update', data);
                        toastr.options = {
                            "debug": false,
                            "positionClass": "toast-bottom-right",
                            "onclick": null,
                            "fadeIn": 300,
                            "fadeOut": 1000,
                            "timeOut": 5000,
                            "extendedTimeOut": 1000
                        };
                        $('#updateModal').modal('hide');
                        setTimeout(function () {
                            $("#loadnow").load(location.href + " #loadnow>*", "");
                        }, 1);
                        toastr.success('Data Updated Successfully');
                        $('#updateExam').trigger('reset');
                    }
                });
            });
        });
    </script>

@endsection
