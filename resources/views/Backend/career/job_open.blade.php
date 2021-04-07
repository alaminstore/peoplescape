@extends('Backend.backendmaster')
@section('jobopen-active','active')
@section('title', 'PeopleScape | Job Open')
@section('content')
<div id="tab3" class="tab-pane fade in">
    <section class="content" id="careerheadref">
    <div class="box box-info">
            <div class="box-header with-border">
            <h3 class="box-title">Career Head</h3>

            </div>
            {!!Form::open(['class' => 'form-horizontal','id'=>'careerhead','enctype'=>'multipart/form-data'])!!}
            <div class="box-body">
                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="title" name="title" value="{{$data['careerhead']->title}}">
                    <input type="hidden" class="form-control" id="id" name="id" value="{{$data['careerhead']->id}}">

                </div>
                </div>

            <div class="form-group">
                    <label for="title" class="col-sm-2 control-label"></label>
                    <div class="col-md-10">
                    <img id="myImage" class="img-responsive" width="200" height="100" src="{{url('/'.$data['careerhead']->image)}}" alt="">
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
        $('#careerhead').validate({
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
        $(document).on('submit','#careerhead',function(e){
            e.preventDefault();
            //var data = $(this).serialize();
            if ($('#careerhead').valid()) {
            $.ajax({
            url:"{!! route('careerhead.update') !!}",
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


                $("#careerheadref").load(location.href + " #careerheadref");
                }

            });
        }
    })
  </script>
 </div>
@endsection
