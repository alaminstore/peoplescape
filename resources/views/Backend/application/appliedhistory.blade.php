@extends('Backend.backendmaster')
@section('application-active','active')
@section('title', 'PeopleScape | Application Lists')
@section('content')
<section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-info">
          <div class="box-header">
          <h3 class="box-title">Applied Job  List <span class="countnumber"><small class="textcount">{{count($numberofJob)}}</small></span></h3>
             <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
             </div>
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
               <th width="5%">S.I</th>
                <th width="23%">Job Title</th>
                <th width="23%">Company</th>
                <th width="15%">Applied At</th>
                <th width="15%">Deadline</th>
                <th width="39%">Details</th>

              </tr>
              </thead>
              <tbody>
                @foreach($applicantByjobid as $val)
               <tr>
                  <td>{{$loop->index + 1}}</td>
                  <td><a href="{!!route('career.details',['id'=>$val->jobid])!!}" target="_blank" style="cursor:pointer">{{$val->title}}</a></td>
                  <td>{{$val->company}}</td>
                  <td>{{$val->applied_time}}</td>
                  <td>{{$val->deadline}}</td>
                  <td>
                      <a href="{!!route('career.details',['id'=>$val->jobid])!!}" target="_blank"><span class="glyphicon glyphicon-eye-open btn btn-info btn-sm"></span></a>
                      <?php
                          $active = App\Exam::where('job_id','=',$val->jobid)
                                            ->where('active','=',1)
                                            ->where('status','running')->first();
                          if($active){?>
                          <a href="/admin/career/admitcard/{{$val->jobid}}"><button class="btn btn-primary btn-sm">Admit Card</button></a>
                        <?php } ?>

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
@endsection
