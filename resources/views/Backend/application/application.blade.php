@extends('Backend.backendmaster')
@section('application-active','active')
@section('title', 'PeopleScape | Application Lists')
@section('content')

<style>
    .bg_black{
        background-color: rgb(124, 115, 115);
    }
</style>
<section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">Application  List</h3>&nbsp; ||&nbsp; <button class="btn btn-primary excel btn-sm">Exportexcel</button>
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
                <th width="15%">Name</th>
                <th width="20%">Email</th>
                <th width="15%">MobileNO</th>
                <th width="15%">Last Degree</th>
                 <th width="20%">Score</th>
                  <th width="10%">Action</th>

              </tr>
              </thead>
              <tbody>
                @foreach($cv as $val)
               <tr>
                   <td>{{$loop->index + 1}}</td>
                  <td><a href="{{route('application.show',['id'=>$val->id])}}" target="_blank" style="cursor:pointer">{{$val->name}}</a></td>
                  <td>{{$val->email}}</td>
                  <td>{{$val->mobile}}</td>
                  <td>{{$val->l_degree}}</td>
                  <td>{{$val->l_score}}</td>
                   <td>
                     <a href="{{route('application.show',['id'=>$val->id])}}" target="_blank"><span class="glyphicon glyphicon-eye-open btn btn-primary btn-sm"></span></a>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
          <div class="box-body filterresultexcel" style="display:none" >
              <table id="table2excel" class="table table-bordered table-striped ">
                <thead>
                <tr class="noExl">
                  <th class="text-center ">Name</th>
                   <th class="text-center ">Email</th>
                   <th class="text-center ">Mobile No</th>
                   <th class="text-center ">Last Degree</th>
                   <th class="text-center ">Last Institution</th>
                   <th class="text-center ">Major</th>
                   <th class="text-center ">Minor</th>
                   <th class="text-center ">Last Organization</th>
                   <th class="text-center ">Year Of Experience</th>
                   <th class="text-center ">Age</th>
                   <th class="text-center ">Gender</th>

                </tr>
                <tr style="display:none">
                   <th>Name</th>
                   <th>Email</th>
                   <th>MobileNO</th>
                   <th>Last Degree</th>
                   <th>Last Institution</th>
                   <th>Major</th>
                   <th>Minor</th>
                   <th>Last Organization</th>
                   <th>Year Of Experience</th>
                   <th>Age</th>
                   <th>Gender</th>
                 </tr>
                </thead>
                <tbody class="filterdataappexcel">
                    @foreach($userid as $key=>$item)
                    <tr>
                      <td>{{ $item['name']}}</td>
                      <td>{{ $item['email']}}</td>
                      <td>{{ $item['mobile']}}</td>
                      <td>{{$item['lastdegree']}}</td>
                      <td>{{$item['lastinst']}}</td>
                      <td>{{$item['major']}}</td>
                      <td>{{$item['minor']}}</td>
                      <td>{{$item['lastcompany']}}</td>
                      <td>{{ $item['experience']}}</td>
                      <td>{{ $item['age']}}</td>
                      <td>{{ $item['gender']}}</td>
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
@push('scripts')
     <script src="{{asset('backEnd/dist/jquery.table2excel.js')}}"></script>
    <script>
    $(document).on('click','.excel',function(){
      $("#table2excel").table2excel({
        // exclude CSS class
        exclude: ".noExl",
        name: "applicant",
        filename: "SomeFile", //do not include extension
        fileext: ".xls" // file extension
      });
    });
  </script>
@endpush
