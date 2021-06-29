@extends('Backend.backendmaster')
@section('exams-active','active')
@section('title', 'PeopleScape | Exams-List')
@section('content')
    <style>
        .p-0 {padding-right: 0;}
        span.select2-selection.select2-selection--single {height: 31px;}
        div.dataTables_wrapper div.dataTables_filter input {min-width: 177px;}
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
                                    <th class="text-center" width="15%">Job Title</th>
                                    <th class="text-center" width="15%">Company</th>
                                    <th class="text-center" width="15%">Exam Name</th>
                                    <th class="text-center" width="15%">Venue</th>
                                    <th class="text-center" width="15%">Exam Date</th>
                                    <th class="text-center" width="22%">Action</th>
                                </tr>
                                </thead>
                                <tbody id="loadnow">
                                    @foreach ($examlists as $exam)
                                        <tr class="text-center">
                                            <td>{{$exam->getCareer->title}}</td>
                                            <td>{{$exam->getCareer->company}}</td>
                                            <td>{{$exam->exam_name}}</td>
                                            <td>{{$exam->vanue}}</td>
                                            <td>{{$exam->exam_date}}</td>
                                            <td>
                                                {{-- view --}}
                                                <a class="viewData" data-id="{{$exam->exam_id}}"><span class="glyphicon glyphicon-eye-open btn btn-info btn-sm"></span></a>
                                                {{-- delete --}}
                                                <a class="deletejob" data-id="{{$exam->exam_id}}"><span
                                                        class="glyphicon glyphicon-trash btn btn-danger btn-sm"></span></a>
                                                {{-- edit --}}
                                                <a class="editjob" data-id="{{$exam->exam_id}}"><span
                                                        class="glyphicon glyphicon-edit btn btn-primary btn-sm"></span></a>
                                                <label class="switch">
                                                    <input type="checkbox" {{$exam->active ==1 ? 'checked':''}}>
                                                    <span data-jobid="{{$exam->exam_id}}" data-ofid="0" data-onid="1" class="slider round {{$exam->active == 1 ? 'examdeactive':'examactive'}}"></span>
                                                </label>
                                                @if($exam->status == 'running')
                                                <a id="comstatus"  class="btn btn-primary runningstatus btn-sm" data-type="run" data-jobid="{{$exam->exam_id}}">Running</a>
                                                @else
                                                    <a id="comstatus"  class="btn btn-success btn-sm runningstatus" data-type="com" data-jobid="{{$exam->exam_id}}">Complete</a>
                                                @endif
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
                                        <label for="job category" class="col-sm-3 col-md-3 col-form-label">Select Job</label>
                                        <div class="col-sm-9 col-md-9">
                                            <select class="jobcatfind" style="width: 100%;" name="job_id"  id="jobtocat"
                                                    required>
                                                <option value=""></option>
                                                @foreach ($jobs as $job)

                                                   <?php $exitOrNot = App\Exam::where('job_id', '=', $job->id)->first();
                                                    if ($exitOrNot === null) {?>
                                                     <option value="{{$job->id}}">{{$job->title}}</option>
                                                   <?php }?>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-froup row">
                                        <div class="col-md-12">
                                            <input type="hidden" name="careercat_id" id="careercat_id">
                                            <input type="hidden" name="job_name" id="job_nameid">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-3 col-form-label">Exam Title</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="exam_name"
                                                   placeholder="Exam Name Here..." required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="name" class="col-sm-3 col-form-label">Venue</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="vanue"
                                                   placeholder="Venue Here..." required>
                                        </div>
                                    </div>
                                    {{-- <div class="form-group row">
                                        <label for="url" class="col-sm-3 col-form-label">Designation</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" id="designation" name="designation"
                                                   placeholder="Designation Here..." required>
                                        </div>
                                    </div> --}}
                                    <div class="form-group row">
                                        <label for="url" class="col-sm-3 col-form-label">Exam Date</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="date" name="exam_date"
                                                   placeholder="Designation Here..." required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="url" class="col-sm-3 col-form-label">Rules & regulations</label>
                                        <div class="col-sm-9">
                                            <textarea class="summernote" name="rulesregulations" cols="30" rows="10" placeholder="Rules & regulations Here..." required></textarea>
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
                                        <label for="job category" class="col-sm-3 col-md-3 col-form-label">Select Job</label>
                                        <div class="col-sm-9 col-md-9">
                                            <select class="jobcatfind2 form-control" style="width: 100%;" name="job_id"  id="jobtocat2"
                                                    required>
                                                <option disabled value="">Select Job...</option>
                                                @foreach ($jobs as $job)
                                                    <option value="{{$job->id}}">{{$job->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-froup row">
                                        <div class="col-md-12">
                                            <input type="hidden" name="careercat_id" id="careercat_id2">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-3 col-form-label">Exam Name</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="exam_name" id='exam_name2'
                                                   placeholder="Exam Name Here..." required>
                                            <input type="hidden" name="category_id" id="category-edit-id" class="form-control">
                                            <input type="hidden" name="job_name" id="job_nameid2">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="name" class="col-sm-3 col-form-label">Vanue</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="vanue" id="venue2"
                                                   placeholder="Vanue Here..." required>
                                        </div>
                                    </div>
                                    {{-- <div class="form-group row">
                                        <label for="url" class="col-sm-3 col-form-label">Designation</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="designation" id="designation2"
                                                   placeholder="Designation Here..." required>
                                        </div>
                                    </div> --}}
                                    <div class="form-group row">
                                        <label for="url" class="col-sm-3 col-form-label">Exam Date</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="date" name="exam_date" id="exam_date2"
                                                   placeholder="Designation Here..." required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="url" class="col-sm-3 col-form-label">Exam Date</label>
                                        <div class="col-sm-9">
                                            <textarea class="summernote" name="rulesregulations" id="rules" cols="30" rows="10" placeholder="Rules & regulations Here..." required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row  pull-right">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-success waves-effect waves-light">
                                                Update
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
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title" id="exampleModalLongTitle">Exam Details</h4>
                            </div>
                            <div class="modal-body" style="background: #f5f5f5;">
                                <div class="Catname">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-2" style="padding-right: 0;">
                                                <p><b>Job:</b></p>
                                            </div>
                                            <div class="col-sm-10" style="padding-left:0;">
                                                <div id="jobview"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="Catname">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-2" style="padding-right: 0;">
                                                <p><b>Exam Name:</b></p>
                                            </div>
                                            <div class="col-sm-10" style="padding-left:0;">
                                                <div id="examview"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="Catname">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-2" style="padding-right: 0;">
                                                <p><b>Exam Date:</b></p>
                                            </div>
                                            <div class="col-sm-10" style="padding-left:0;">
                                                <div id="dateview"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="Catname">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-2" style="padding-right: 0;">
                                                <p><b>Venue:</b></p>
                                            </div>
                                            <div class="col-sm-10" style="padding-left:0;">
                                                <div id="vanueview"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="Catname">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-2" style="padding-right: 0;">
                                                <p><b>Designation:</b></p><br>
                                            </div>
                                            <div class="col-sm-10" style="padding-left:0;">
                                                <div id="designationview"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

<script>
    $("#createExam").validate({
    rules: {
        job_id: {
            required:true,
        },
        job_name: {
            required:true,
            maxlength: 100,
        },
        exam_name: {
            required:true,
            maxlength: 100,
        },
        vanue: {
            required:true,
            maxlength: 200,
        },
        designation: {
            required:true,
            maxlength: 200,
        },
        exam_date: {
            required:true,
        },
        rulesregulations: {
            required:true,
        },

        }
    });
    $("#updateExam").validate({
        rules: {
        job_id: {
            required:true,
        },
        job_name: {
            required:true,
            maxlength: 100,
        },
        exam_name: {
            required:true,
            maxlength: 100,
        },
        vanue: {
            required:true,
            maxlength: 200,
        },
        designation: {
            required:true,
            maxlength: 200,
        },
        exam_date: {
            required:true,
        },
        rulesregulations: {
            required:true,
        },

        }
    });
    </script>
<script>
    $(document).ready(function () {
        $('.jobcatfind').select2({
            placeholder: "Job Selection"
        });
        $('.summernote').summernote({
            height: 120,
            width: "100%",
            styleTags: [
                'p',
                { title: 'Blockquote', tag: 'blockquote', className: 'blockquote', value: 'blockquote' },
                'pre', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'
            ],
        });

        //edit data...
        $('#reload-category').on('click', '.editjob', function () {
                let id = $(this).attr('data-id');
                console.log('edit:',id);

                $.ajax({
                    url: '{{ route('exams.edit') }}',
                    method: 'get',
                    data: {
                        id
                    },
                    dataType: 'json',
                    success: function (response) {
                        console.log('data', response.data);
                        // $('#updateExam').find('#jobtocat2').val(response.data.job_id);
                       var job_active =  $('#jobtocat2').val(response.data.job_id);
                        $('#careercat_id2').val(response.data.careercat_id);
                        $('#exam_name2').val(response.data.exam_name);
                        $('#venue2').val(response.data.vanue);
                        $('#designation2').val(response.data.designation);
                        $('#exam_date2').val(response.data.exam_date);
                        $('#category-edit-id').val(response.data.exam_id);
                        $('#job_nameid2').val(response.data.job_name);
                        $('#rules').summernote('code', response.data.rulesregulations);
                        $('#updateModal').modal('show');


                    },
                    error: function (error) {
                        if (error.status == 404) {
                            toastr.error('Not found!');
                        }
                    }
                });
            });

            // $('#jobtocat2').select2({placeholder:job_active});
        //view data
        $('#reload-category').on('click', '.viewData', function () {
            let id = $(this).attr('data-id');
            console.log('id--', id);
            $.ajax({
                url: '{{ route('exams.show') }}',
                method: 'get',
                data: {
                    id
                },
                dataType: 'json',
                success: function (response) {
                        let url = window.location.origin;
                        console.log('data', response);
                        $('#jobview').html(response.data.job_name);
                        $('#examview').html(response.data.exam_name);
                        $('#dateview').html(response.data.exam_date);
                        $('#designationview').html(response.data.designation);
                        $('#vanueview').html(response.data.vanue);
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
            var $form = $(this);
            if(! $form.valid()) return false;
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
                    $('#examSave').trigger('reset');
                    $('#examSave').modal('hide');
                    setTimeout(function () {
                        $("#loadnow").load(location.href + " #loadnow>*", "");
                    }, 1);
                    toastr.success('Data Inserted Successfully');

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
            var $form = $(this);
            if(! $form.valid()) return false;

            $.ajax({
                url: "{{route('exams.update')}}",
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
                    if(data.success = true){
                        $('#updateExam').trigger('reset');
                        $("#loadnow").load(location.href + " #loadnow>*", "");
                        toastr.success('Data Updated Successfully');
                    }else{
                        toastr.error('Something went wrong!');
                    }

                }
            });
        });
    });
</script>

<script>

    //jobcatfind Add
    $(document).on('change', '.jobcatfind', function (e) {
        e.preventDefault();
        let id = $(this).val();
        console.log(id);
        $.ajax({
            url: '{{ route('exams.catview') }}',
            method: 'get',
            data: {
                id
            },
            dataType: 'json',
            success: function (response) {
                console.log('result',response);
                $('#careercat_id').val(response.data.catid);
                $('#job_nameid').val(response.data.title);
            },
            error: function (err) {
                console.log(err)
            }
        })

    });
    //jobcatfind edit
    $(document).on('change', '.jobcatfind2', function (e) {
        e.preventDefault();
        let id = $(this).val();
        console.log(id);
        $.ajax({
            url: '{{ route('exams.catview2') }}',
            method: 'get',
            data: {
                id
            },
            dataType: 'json',
            success: function (response) {
                console.log('result',response);
                $('#careercat_id2').val(response.data.catid);
                $('#job_nameid2').val(response.data.title);
            },
            error: function (err) {
                console.log(err)
            }
        })

    });
</script>
<script>
    $(document).on('click','.examdeactive',function(){
        var id = $(this).data('ofid');
        var jobid = $(this).data('jobid');
        $(this).removeClass('examdeactive');
        $(this).addClass('examactive');
        $.ajax({
          url: "{!! route('exam.status') !!}",
          type: "get",
          data: {
            id: id,
            jobid: jobid,

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
          toastr.success('Exam Was  Deactivated Successfully');
          },
          error: function(xhr) {
            //Do Something to handle error
          }
        });
    });
    $(document).on('click','.examactive',function(){
        var id = $(this).data('onid');
        var jobid = $(this).data('jobid');
        $(this).removeClass('examactive');
        $(this).addClass('examdeactive');
        $.ajax({
          url: "{!! route('exam.status') !!}",
          type: "get",
          data: {
            id: id,
            jobid: jobid,
          },
          success: function(data) {
            toastr.options = {
                  "debug": false,
                  "positionClass": "toast-bottom-right",
                  "onclick": null,
                  "fadeIn": 300,
                  "fadeOut": 1000,
                  "timeOut": 5000,
                  "extendedTimeOut": 1000
                };
          toastr.success('Exam Was  activated Successfully');
          },
          error: function(xhr) {
            //Do Something to handle error
          }
        });
    });
</script>
<script>

$(document).on('click','.runningstatus',function(){
    var jobid = $(this).data('jobid');
        var sttype = $(this).attr('data-type');


            // $("#comstatus").load(location.href + " #comstatus");
                //console.log(sttype);

        $.ajax({
            url: "{!! route('exams.completestatus') !!}",
            type: "get",
            data: {
            jobid: jobid,
            sttype: sttype,

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
            toastr.success('Job Status Updated');
            },
            error: function(xhr) {
            //Do Something to handle error
            }
        });
        if(sttype=='run'){
                $(this).removeClass('btn-primary');
                $(this).addClass('btn-success');
                $(this).attr("data-type","com");
                $(this).text('Complete');
        }else if(sttype=='com'){
            $(this).removeClass('btn-success');
            $(this).addClass('btn-primary');
                $(this).attr("data-type","run");
            $(this).text('Running');
        }

    });
</script>
@endsection
