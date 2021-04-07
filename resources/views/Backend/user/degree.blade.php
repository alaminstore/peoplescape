@extends('Backend.backendmaster')
@section('user-active','active')
@section('title', 'Peoplescape | Create Degree')
@section('content')
<div class="row">
<div class="col-md-12">
    <div class="col-md-4">
        <section class="content">
        <div class="box box-info">
                <div class="box-header with-border">
                <h3 class="box-title">Create Degree</h3>
                </div>
                {!!Form::open(['class' => 'form-horizontal','id'=>'degree','enctype'=>'multipart/form-data'])!!}
                <div class="box-body">
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Name </label>
                        <div class="col-sm-12">
                        <input type="text" class="form-control" id="degree" name="degree" placeholder="Ex:M.B.A">
                        </div>
                    </div>
                    <div id="degreecontent">
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Major </label>
                        <div class="sklist col-sm-12 " data-index_no="1000">
                            <div class="skitemWrapper">
                                <table class="table table-bordered skmoreTable">
                                    <tr>
                                        <th width="5%" class="labelclass">S.N</th>
                                        <th width="70%" class="labelclass">Name</th>
                                       <th width="10%" class="labelclass">Remove</th>
                                    </tr>
                                    <tr class="skitem_tr sksingle_list">
                                            <td class="day_no labelclass">1</td>
                                            <td><input type="text" class="form-control" id="skill"  name="major[0][major]" placeholder="Eg: Marketing.."><br></td>
                                           <td><span class="skremove" style="background: #ed3610;
                                            padding: 0px 7px;;
                                            color: #fff;
                                            border-radius: 8%;
                                            text-decoration: none;
                                            margin-bottom: 10px;
                                            cursor: pointer;">-</span></td>
                                        </tr>                                   
                                </table>
                                <span  class="skadd_more" style="background: #0d72ba;
                                padding: 0px 7px;;
                                color: #fff;
                                border-radius: 8%;
                                text-decoration: none;
                                margin-bottom: 10px;
                                cursor: pointer;">+</span><br><br>
                            </div>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Minor </label>
                        <div class="ssklist col-sm-12 " data-index_no="2000">
                            <div class="sskitemWrapper">
                                <table class="table table-bordered sskmoreTable">
                                    <tr>
                                        <th width="5%" class="labelclass">S.N</th>
                                        <th width="70%" class="labelclass">Name</th>
                                       <th width="10%" class="labelclass">Remove</th>
                                    </tr>
                                    <tr class="sskitem_tr ssksingle_list">
                                            <td class="day_no labelclass">1</td>
                                            <td><input type="text" class="form-control" id="skill"  name="minor[0][minor]" placeholder="Eg: Marketing.."><br></td>
                                           <td><span class="sskremove" style="background: #ed3610;
                                            padding: 0px 7px;;
                                            color: #fff;
                                            border-radius: 8%;
                                            text-decoration: none;
                                            margin-bottom: 10px;
                                            cursor: pointer;">-</span></td>
                                        </tr>                                   
                                </table>
                                <span  class="sskadd_more" style="background: #0d72ba;
                                padding: 0px 7px;;
                                color: #fff;
                                border-radius: 8%;
                                text-decoration: none;
                                margin-bottom: 10px;
                                cursor: pointer;">+</span><br><br>
                            </div>
                        </div>
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
                    <h3 class="box-title">Degree List</h3>
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
                        <tbody class="degreeappend">
                            @foreach($degrees as $deg)
                        <tr class="unqdegree{{$deg->id}}">
                            <td>{{$deg->degree}}</td>
                            <td>
                                <a data-id ="{{$deg->id}}" data-toggle="modal" data-target="#degreeupdatemodal" class="editdegree"><span class="glyphicon glyphicon-edit btn btn-primary btn-sm"></span></a>
                                <a class="deletedegree" data-id ="{{$deg->id}}" ><span class="glyphicon glyphicon-trash btn btn-danger btn-sm"></span></a>
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
                      <h4 class="modal-title">Degree Info</h4>
                    </div>
                      <div class="modal-body">
                          {!!Form::open(['class' => 'form-horizontal','id'=>'updatedegree'])!!}
                          <div class="box-body">
                            <div class="form-group">
                                <label for="link" class="col-sm-2">Degree</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="degree" name="degree" placeholder="EX:M.B.A">
                                    <input type="hidden" class="form-control" id="id" name="id">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="title" class="col-sm-2">Major </label>
                                <div class="seklist col-sm-12 " data-index_no="1000">
                                    <div class="sekitemWrapper">
                                        <table class="table table-bordered sekmoreTable">
                                            <thead>
                                            <tr>
                                              <th width="70%" class="labelclass">Name</th>
                                               <th width="10%" class="labelclass">Remove</th>
                                            </tr>
                                            </thead>
                                           <tbody class="majorapp">
                                                
                                            </tbody>                                  
                                        </table>
                                        <span  class="sekadd_more" style="background: #0d72ba;
                                        padding: 0px 7px;;
                                        color: #fff;
                                        border-radius: 8%;
                                        text-decoration: none;
                                        margin-bottom: 10px;
                                        cursor: pointer;">+</span><br><br>
                                    </div>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="title" class="col-sm-2">Minor </label>
                                <div class="sseklist col-sm-12 " data-index_no="2000">
                                    <div class="ssekitemWrapper">
                                        <table class="table table-bordered ssekmoreTable">
                                            <thead>
                                            <tr>
                                               <th width="70%" class="labelclass">Name</th>
                                               <th width="10%" class="labelclass">Remove</th>
                                            </tr>
                                            <thead>
                                           <tbody class="minorapp">
                                               
                                            </tbody>                                  
                                        </table>
                                        <span  class="ssekadd_more" style="background: #0d72ba;
                                        padding: 0px 7px;;
                                        color: #fff;
                                        border-radius: 8%;
                                        text-decoration: none;
                                        margin-bottom: 10px;
                                        cursor: pointer;">+</span><br><br>
                                    </div>
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
         $(document).on('click','.skadd_more',function(){
        var index = $('.sklist').data('index_no');
        $('.sklist').data('index_no', index + 1);
        var html = $('.skitemWrapper .skitem_tr:last').clone().find('.form-control').each(function () {
            this.name = this.name.replace(/\d+/, index+1);
            this.id = this.id.replace(/\d+/, index+1);
            this.value = '';
        }).end();
        $('.skmoreTable').append(html);
        var rowCount = $('.skmoreTable tr').length;
        $(this).closest('.skitemWrapper').find('.skitem_tr:last').find('.day_no').html(rowCount-1);
        $(this).closest('.skitemWrapper').find('.skitem_tr:last').find('.dayval').val(rowCount-1);
    });
    $(document).on('click', '.skremove', function () {
        var obj=$(this);
        var count= $('.sksingle_list').length;
        // alert(count);
        if(count > 1) {
            if(obj.closest('.sksingle_list').is($(this).closest('.skitemWrapper').find('.sksingle_list:last'))){
                obj.closest('.sksingle_list').remove();
            }else{
                alert('You can only remove the last one!');
            }
        }
     });
     $(document).on('click','.sskadd_more',function(){
        var index = $('.ssklist').data('index_no');
        $('.ssklist').data('index_no', index + 1);
        var html = $('.sskitemWrapper .sskitem_tr:last').clone().find('.form-control').each(function () {
            this.name = this.name.replace(/\d+/, index+1);
            this.id = this.id.replace(/\d+/, index+1);
            this.value = '';
        }).end();
        $('.sskmoreTable').append(html);
        var rowCount = $('.sskmoreTable tr').length;
        $(this).closest('.sskitemWrapper').find('.sskitem_tr:last').find('.day_no').html(rowCount-1);
        $(this).closest('.sskitemWrapper').find('.sskitem_tr:last').find('.dayval').val(rowCount-1);
    });
    $(document).on('click', '.sskremove', function () {
        var obj=$(this);
        var count= $('.ssksingle_list').length;
        // alert(count);
        if(count > 1) {
            if(obj.closest('.ssksingle_list').is($(this).closest('.sskitemWrapper').find('.ssksingle_list:last'))){
                obj.closest('.ssksingle_list').remove();
            }else{
                alert('You can only remove the last one!');
            }
        }
     });
        $(document).ready(function () {
            $('#degree').validate({ 
            rules:{
                degree: 
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
        $('#degree').on('submit',function(e){
            e.preventDefault();
            if ($('#degree').valid()) {
                $.ajax({
                url:"{{route('degree.store')}}",
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
                    $('.degreeappend').prepend(`<tr class='unqdegree`+data.id+`'>
                    <td>`+data.degree+`</td>
                    <td>
                        <a data-id ="`+data.id+`" data-toggle="modal" data-target="#degreeupdatemodal" class="editdegree"><span class="glyphicon glyphicon-edit btn btn-primary btn-sm"></span></a>
                        <a class="deletedegree" data-id ="`+data.id+`" ><span class="glyphicon glyphicon-trash btn btn-danger btn-sm"></span></a>
                    </td>
                    </tr>`);          
                    $('#degree').trigger('reset');
                    $("#degreecontent").load(location.href + " #degreecontent");
                }
                
            });
            }
        });
        $(document).on('click','.editdegree',function(){
            var id = $(this).data('id');
            $.ajax({
            url: "{!! route('degree.edit') !!}",
            type: "get", 
            data: {  
                id: id, 
            },
            success: function(data) {
                $('.majorapp').empty();
                $('.minorapp').empty();               
               //console.log(data);            
                $.each(JSON.parse(data.degreemajorminor.major),function(index, majordegree){
                   if(majordegree.major==null){
                        $('.majorapp').prepend(`<tr class="sekitem_tr seksingle_list">
                                                    <td><input type="text" class="form-control" id="skill"  name="major[0][major]" placeholder="Eg: Marketing.."><br></td>
                                                    <td><span class="sekremove" style="background: #ed3610;
                                                    padding: 0px 7px;;
                                                    color: #fff;
                                                    border-radius: 8%;
                                                    text-decoration: none;
                                                    margin-bottom: 10px;
                                                    cursor: pointer;">-</span>
                                                    </td>
                                                </tr>`);
                    }else{
                        $('.majorapp').prepend(`
                            <tr class="sekitem_tr seksingle_list">
                                    <td><input type="text" class="form-control" id="skill"  name="major[0][major]" value="`+majordegree.major +`"><br></td>
                                    <td><span class="sekremove" style="background: #ed3610;
                                    padding: 0px 7px;;
                                    color: #fff;
                                    border-radius: 8%;
                                    text-decoration: none;
                                    margin-bottom: 10px;
                                    cursor: pointer;">-</span></td>
                                </tr>
                        `);
                    }                
               });
              
              
                   
                    $.each(JSON.parse(data.degreemajorminor.minor),function(index,minordegree){
                        if(minordegree.minor==null){
                            $('.minorapp').prepend(`<tr class="ssekitem_tr sseksingle_list">
                                                   <td><input type="text" class="form-control" id="skill"  name="minor[0][minor]" placeholder="Eg: Marketing.."><br></td>
                                                    <td><span class="ssekremove" style="background: #ed3610;
                                                        padding: 0px 7px;;
                                                        color: #fff;
                                                        border-radius: 8%;
                                                        text-decoration: none;
                                                        margin-bottom: 10px;
                                                        cursor: pointer;">-</span></td>
                                                    </tr> `);
               
                        }else{
                            $('.minorapp').prepend(`
                            <tr class="ssekitem_tr sseksingle_list">
                                                        <td><input type="text" class="form-control" id="skill"  name="minor[0][minor]" value="`+minordegree.minor+`"><br></td>
                                                    <td><span class="ssekremove" style="background: #ed3610;
                                                        padding: 0px 7px;;
                                                        color: #fff;
                                                        border-radius: 8%;
                                                        text-decoration: none;
                                                        margin-bottom: 10px;
                                                        cursor: pointer;">-</span></td>
                                                    </tr>
                            `);
                        }
                   
                });
                           
                $('#updatedegree').find('#id').val(data.deg.id);
                $('#updatedegree').find('#degree').val(data.deg.degree);
                

                }
            });
        })
        $(document).on('click','.sekadd_more',function(){
            var index = $('.seklist').data('index_no');
            $('.seklist').data('index_no', index + 1);
            var html = $('.sekitemWrapper .sekitem_tr:last').clone().find('.form-control').each(function () {
                this.name = this.name.replace(/\d+/, index+1);
                this.id = this.id.replace(/\d+/, index+1);
                this.value = '';
            }).end();
            $('.sekmoreTable').append(html);
            var rowCount = $('.sekmoreTable tr').length;
            $(this).closest('.sekitemWrapper').find('.sekitem_tr:last').find('.day_no').html(rowCount-1);
            $(this).closest('.sekitemWrapper').find('.sekitem_tr:last').find('.dayval').val(rowCount-1);
        });
        $(document).on('click', '.sekremove', function () {
            var obj=$(this);
            var count= $('.seksingle_list').length;
            // alert(count);
            if(count > 1) {
                if(obj.closest('.seksingle_list').is($(this).closest('.sekitemWrapper').find('.seksingle_list:last'))){
                    obj.closest('.seksingle_list').remove();
                }else{
                    alert('You can only remove the last one!');
                }
            }
        });
        $(document).on('click','.ssekadd_more',function(){
            var index = $('.sseklist').data('index_no');
            $('.sseklist').data('index_no', index + 1);
            var html = $('.ssekitemWrapper .ssekitem_tr:last').clone().find('.form-control').each(function () {
                this.name = this.name.replace(/\d+/, index+1);
                this.id = this.id.replace(/\d+/, index+1);
                this.value = '';
            }).end();
            $('.ssekmoreTable').append(html);
            var rowCount = $('.ssekmoreTable tr').length;
            $(this).closest('.ssekitemWrapper').find('.ssekitem_tr:last').find('.day_no').html(rowCount-1);
            $(this).closest('.ssekitemWrapper').find('.ssekitem_tr:last').find('.dayval').val(rowCount-1);
        });
        $(document).on('click', '.ssekremove', function () {
            var obj=$(this);
            var count= $('.sseksingle_list').length;
             //alert(count);
            if(count > 1) {
                if(obj.closest('.sseksingle_list').is($(this).closest('.ssekitemWrapper').find('.sseksingle_list:last'))){
                    obj.closest('.sseksingle_list').remove();
                }else{
                    alert('You can only remove the last one!');
                }
            }
        });
        $(document).ready(function () {
            $('#updatedegree').validate({ 
            rules: {
                    degree: 
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
    
        $(document).on('submit','#updatedegree',function(e){
            e.preventDefault();
                if ($('#updatedegree').valid()) {
                    $.ajax({
                    url:"{!! route('degree.update') !!}",
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
                            $('.unqdegree'+data.id).replaceWith(`<tr class='unqdegree`+data.id+`'>
                        <td>`+data.degree+`</td>
                        <td>
                            <a data-id ="`+data.id+`" data-toggle="modal" data-target="#degreeupdatemodal" class="editdegree"><span class="glyphicon glyphicon-edit btn btn-primary btn-sm"></span></a>
                            <a class="deletedegree" data-id ="`+data.id+`" ><span class="glyphicon glyphicon-trash btn btn-danger btn-sm"></span></a>
                        </td>
                        </tr>`);    
                        setTimeout(function() {$('#degreeupdatemodal').modal('hide');}, 1500);
            
                        $('#updatedegree').trigger('reset');
                    }
                    
                });
                }
            
        })
        $(document).on('click','.deletedegree',function(e) {
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
                url: "{!! route('degree.delete') !!}",
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