@extends('Backend.backendmaster')
@section('joblist-active','active')
@section('title', 'PeopleScape | Joblist')
@section('content')
        <section class="content">
                  <div class="row">
                    <div class="col-xs-12">
                      <div class="box box-info">
                        <div class="box-header">
                          <h3 class="box-title">Job  List</h3>
                           <div class="box-tools pull-right">
                              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                            </div>
                           </div>
                        <div class="box-body">
                          <table id="joblist" class="table table-bordered table-striped jobprepend">
                            <thead>
                            <tr>
                               <th class="text-center" width="15%">Title</th>
                               <th class="text-center" width="15%">Company</th>
                               <th class="text-center" width="15%">Experience</th>
                               <th class="text-center" width="10%">Total Applicant</th>
                               <th class="text-center" width="13%">Shortlisted Applicant</th>
                               <th class="text-center" width="27%">Action</th>
                            </tr>
                            </thead>
                            <tbody class="jobappend">
                              @foreach($data['job'] as $job)
                             <tr class='unqjob{{$job->id}}'>
                                <td class="text-center">
                                  <a href="{{route('careerjob.detail',['id'=>$job->id])}}" target="_blank">{{$job->title}}</a>
                                </td>
                                <td class="text-center">{{$job->company}}</td>
                                <td class="text-center">{{$job->experience}}</td>
                                <td class="text-center"><span class="countnumber"><small class="textcount">{{$job->totalapplicant}}</small></span></td>
                                <td class="text-center"><span class="countnumber"><small class="textcount">{{$job->totalshortlisted}}</small></span></td>
                                 @if(Auth::user()->status =='moderator')
                                 <td class="text-center">N/A</td>
                                  @else
                                 <td>
                                  <a href="{{route('careerjob.detail',['id'=>$job->id])}}" target="_blank"><span class="glyphicon glyphicon-eye-open btn btn-info btn-sm"></span></a>
                                  <a href="{{ route('career.edit',['id'=>$job->id]) }}"><span class="glyphicon glyphicon-edit btn btn-primary btn-sm"></span></a>
                                  <a class="deletejob" data-id="{{$job->id}}"><span class="glyphicon glyphicon-trash btn btn-danger btn-sm"></span></a>
                                  <label class="switch">
                                      <input type="checkbox" {{$job->status ==1 ? 'checked':''}}>
                                      <span data-jobid="{{$job->id}}" data-ofid="0" data-onid="1" class="slider round {{$job->status == 1 ? 'jobdeactive':'jobactive'}}"></span>
                                  </label>
                                        @if($job->comstatus == 'running')
                                         <a id="comstatus"  class="btn btn-primary runningstatus btn-sm" data-type="run" data-jobid="{{$job->id}}">Running</a>
                                        @else
                                             <a id="comstatus"  class="btn btn-success btn-sm runningstatus" data-type="com" data-jobid="{{$job->id}}">Complete</a>
                                        @endif
                                    <a href="{{route('exams.view',['id'=>$job->catid])}}" target="_blank"><span class="btn btn-info btn-sm">Exam</span></a>
                                  <!--<button class="btn btn-success completestatus "data-jobid="{{$job->id}}" data-id="1">Complete</</button>-->
                                </td>
                               @endif
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
                <script>
                $(document).on('click','.runningstatus',function(){
                    var jobid = $(this).data('jobid');
                    var sttype = $(this).attr('data-type');


                        // $("#comstatus").load(location.href + " #comstatus");
                         //console.log(sttype);

                    $.ajax({
                      url: "{!! route('job.completestatus') !!}",
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

                })
                    $(document).on('click', '.sadd_more', function () {
                    var index = $('.slist').data('index_no');
                    $('.slist').data('index_no', index + 1);
                    var html = $('.sitemWrapper .sitem_tr:last').clone().find('.form-control').each(function () {
                        this.name = this.name.replace(/\d+/, index+1);
                        this.id = this.id.replace(/\d+/, index+1);
                        this.value = '';
                    }).end();
                    $('.smoreTable').append(html);
                    var rowCount = $('.smoreTable tr').length;
                    $(this).closest('.sitemWrapper').find('.sitem_tr:last').find('.day_no').html(rowCount-1);
                    $(this).closest('.sitemWrapper').find('.sitem_tr:last').find('.dayval').val(rowCount-1);
                });
                    $(document).on('click', '.sremove', function () {
                        var obj=$(this);
                        var count= $('.ssingle_list').length;
                        // alert(count);
                        if(count > 1) {
                            if(obj.closest('.ssingle_list').is($(this).closest('.sitemWrapper').find('.ssingle_list:last'))){
                                obj.closest('.ssingle_list').remove();
                            }else{
                                alert('You can only remove the last one!');
                            }
                        }
                    });
                    $(document).on('click', '.add_more', function () {
                        var index = $('.list').data('index_no');
                        $('.list').data('index_no', index + 1);
                        var html = $('.itemWrapper .item_tr:last').clone().find('.form-control').each(function () {
                            this.name = this.name.replace(/\d+/, index+1);
                            this.id = this.id.replace(/\d+/, index+1);
                            this.value = '';
                        }).end();
                        $('.moreTable').append(html);
                        var rowCount = $('.moreTable tr').length;
                        $(this).closest('.itemWrapper').find('.item_tr:last').find('.day_no').html(rowCount-1);
                        $(this).closest('.itemWrapper').find('.item_tr:last').find('.dayval').val(rowCount-1);
                    });
                    $(document).on('click', '.remove', function () {
                        var obj=$(this);
                        var count= $('.single_list').length;
                        // alert(count);
                        if(count > 1) {
                            if(obj.closest('.single_list').is($(this).closest('.itemWrapper').find('.single_list:last'))){
                                obj.closest('.single_list').remove();
                            }else{
                                alert('You can only remove the last one!');
                            }
                        }
                    });
                    $('#myjob').validate({
                        rules: {
                              title:
                              {
                                required: true,

                              },
                              company:
                              {
                                required: true,

                              },
                              experience:
                              {
                                required: true,

                              },
                              vacancy:
                              {
                                required: true,

                              },
                              education:
                              {
                                required: true,

                              },
                              deadline:
                              {
                                required: true,

                              },
                              location:
                              {
                                required: true,

                              },
                              salary:
                              {
                                required: true,

                              },
                              topdescription:
                              {
                                required: true,

                              },
                              responsibilitiestext:
                              {
                                required: true,

                              },
                              howtoapply:
                              {
                                required: true,

                              },
                              howtoapply:
                              {
                                required: true,

                              },
                                 catid:
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
                    $('#myjob').on('submit',function(e){
                            e.preventDefault();
                            //alert('ok');
                            //var data = $(this).serialize();
                             if ($('#myjob').valid()) {
                             $.ajax({
                                url:"{{route('careerop.store')}}",
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
                                  toastr.success('Data Inserted Successfully');
                                   $('.jobappend').prepend(`<tr class='unqjob`+data.id+`'>
                                    <td>`+data.title+`</td>
                                    <td>`+data.company+`</td>
                                    <td>`+data.experience+`</td>
                                    <td>`+data.salary+`</td>
                                    <td>`+data.location+`</td>
                                    <td>
                                      <a href="`+url+`"  class="editjob"><span class="glyphicon glyphicon-edit btn btn-primary btn-sm"></span></a>
                                      <a class="deletejob" data-id ="`+data.id+`" ><span class="glyphicon glyphicon-trash btn btn-danger btn-sm"></span></a>
                                    </td>
                                  </tr>`);
                                  $('#myjob').trigger('reset');
                                }

                            });
                           }
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

                       $(document).on('click','.deletejob',function(e) {
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
                            success: function(data) {
                                }
                            });

                            $(this).closest('tr').hide();

                        }
                        }
                    )
                });
       $(document).on('click','.jobdeactive',function(){
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
          toastr.success('Job Was  Deactivated Successfully');
          },
          error: function(xhr) {
            //Do Something to handle error
          }
        });
    });
    $(document).on('click','.jobactive',function(){
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
          toastr.success('Job Was  activated Successfully');
          },
          error: function(xhr) {
            //Do Something to handle error
          }
        });
    });
</script>
@endsection
