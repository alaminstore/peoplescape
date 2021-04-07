@extends('Backend.backendmaster')
@section('about-active','active')
@section('title', 'PeopleScape | About Us')
@section('content')
<section class="content" >
    <div class="box box-info">
            <div class="box-header with-border">
            <h3 class="box-title">About Us Options</h3>
                <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
            </div>
            <ul class="nav nav-tabs">
               <li class="active commonlitabforcash"><a data-toggle="tab" href="#tab1">About Us head</a></li>
               <li class="commonlitabforcash"><a data-toggle="tab" href="#tab2">About Choose Us</a></li>
               <li class="commonlitabforcash"><a data-toggle="tab" href="#tab3">About Call first</a></li>
               <li class="commonlitabforcash"><a data-toggle="tab" href="#tab4">Advantages</a></li>
               <li class="commonlitabforcash"><a data-toggle="tab" href="#tab5">Success</a></li>
               <li class="commonlitabforcash"><a data-toggle="tab" href="#tab6">Mission Vision</a></li>
               <li class="commonlitabforcash"><a data-toggle="tab" href="#tab7">About Call second</a></li>
            </ul>
        <div class="tab-content">
            <div id="tab1" class="tab-pane fade in active">
            <section class="content" id="aboutheadref">
            <div class="box box-info">
                    <div class="box-header with-border">
                    <h3 class="box-title">Aboutus Head</h3>
                    
                    </div>
                    {!!Form::open(['class' => 'form-horizontal','id'=>'about','enctype'=>'multipart/form-data'])!!}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">Title</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="title" name="title" value="{{$data['abouthead']->title}}">
                            <input type="hidden" class="form-control" id="id" name="id" value="{{$data['abouthead']->id}}">
    
                        </div>
                        </div>
                    
                    <div class="form-group">
                            <label for="title" class="col-sm-2 control-label"></label>
                            <div class="col-md-10">
                            <img id="myImage" class="img-responsive" width="200" height="100" src="{{url('/'.$data['abouthead']->image)}}" alt="">
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
                $('#about').validate({ 
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
                $(document).on('submit','#about',function(e){
                    e.preventDefault();
                    //var data = $(this).serialize();
                    if ($('#about').valid()) {
                    $.ajax({
                    url:"{!! route('about.update') !!}",
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
                            
                
                        $("#aboutheadref").load(location.href + " #aboutheadref");
                        }
                        
                    });
                }
            })
          </script>
         </div>
         <div id="tab2" class="tab-pane fade in">
            <section class="content" id="chooseref">
            <div class="box box-info">
                    <div class="box-header with-border">
                    <h3 class="box-title">Why Choose Head</h3>
                    
                    </div>
                    {!!Form::open(['class' => 'form-horizontal','id'=>'choose','enctype'=>'multipart/form-data'])!!}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">Title</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="title" name="title" value="{{$data['choose']->title}}">
                            <input type="hidden" class="form-control" id="id" name="id" value="{{$data['choose']->id}}">
    
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">Title</label>
                            <div class="col-sm-8">
                            <textarea type="text" class="form-control" id="description" name="description" rows="8" >{{$data['choose']->description}}</textarea>
    
                        </div>
                        </div>
                    
                    <div class="form-group">
                            <label for="title" class="col-sm-2 control-label"></label>
                            <div class="col-md-10">
                            <img id="myImage" class="img-responsive" width="200" height="100" src="{{url('/'.$data['choose']->image)}}" alt="">
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
                $('#about').validate({ 
                    rules: {
                        title: 
                        {
                            required: true,
                            
                        },
                        description: 
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
                $(document).on('submit','#choose',function(e){
                    e.preventDefault();
                    //var data = $(this).serialize();
                    if ($('#choose').valid()) {
                    $.ajax({
                    url:"{!! route('choose.update') !!}",
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
                            
                
                        $("#chooseref").load(location.href + " #chooseref");
                        }
                        
                    });
                }
            })
          </script>
         </div>
         <div id="tab3" class="tab-pane fade in">
            <section class="content" id="call1ref">
            <div class="box box-info">
                    <div class="box-header with-border">
                    <h3 class="box-title">Call to action</h3>
                    
                    </div>
                    {!!Form::open(['class' => 'form-horizontal','id'=>'call1','enctype'=>'multipart/form-data'])!!}
                    <div class="box-body">
                        
                        <div class="form-group">
                        <label for="description" class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-8">
                        <textarea type="text" class="form-control"  name="description" rows="8" placeholder="Enter  Description">{{$data['call1']->description}}</textarea>
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
                    $('#call1').validate({ 
                        rules: {
                           
                            description: 
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
                    $(document).on('submit','#call1',function(e){
                        e.preventDefault();
                        //var data = $(this).serialize();
                        if ($('#call1').valid()) {
                        $.ajax({
                            url:"{!! route('call1.update') !!}",
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
                                
                    
                            $("#call1ref").load(location.href + " #call1ref");
                            }
                            
                        });
                    }
                })
            </script>
        </div>
        <div id="tab5" class="tab-pane fade in ">
            @php
                  $description = json_decode($data['success']->description);
                    $i = 0;
                  @endphp
                  {!!Form::open(['class' =>'form-horizontal','id'=>'success','enctype'=>'multipart/form-data'])!!}
                  <div id='refreshtab5'>
                  <div class="box-body">
                        <h3>Advantage</h3>
                      <div class="form-group">
                          <label for="title" class="col-sm-2 control-label">Title</label>
                          <div class="col-sm-8">
                          <input type="text" class="form-control" id="title" name="title" value="{{$data['success']->title}}">
                          <input type="hidden" class="form-control" id="id" name="id" value="{{$data['success']->id}}">
         
                         </div>
                      </div>
                      <div class="form-group">
                              <label for="title" class="col-sm-2 control-label"></label>
                              <div class="col-md-10">
                              <img id="myImage" class="img-responsive" width="200" height="100" src="{{url('/'.$data['success']->image)}}" alt="">
                              </div>
                            </div>
                      <div class="form-group">
                          <label for="title" class="col-sm-2 control-label">Image</label>
                          <div class="col-sm-8">
                          <input type="file" class="form-control" id="image" name="image">
                          </div>
                      </div>
                      <div class="form-group">
                              <label for="title" class="col-sm-2 control-label">Description</label>
                          <div class="slist col-sm-8 " data-index_no="1000">
                              <div class="sitemWrapper">
                                  <table class="table table-bordered smoreTable">
                                      <tr>
                                          <th width="5%">Serial No</th>
                                          <th width="30%">title</th>
                                          <th width="50%">description</th>
                                          <th width="15%">Option</th>
                                      </tr>
                                       @foreach($description as $val)
                                       <?php $i++ ?>
                                          <tr class="sitem_tr ssingle_list">
                                              <td class="day_no">{{$i}}</td>
                                          <td><input class="form-control" id="pro_title" name="program[{{$i}}][ptitle]" value="{{$val->ptitle}}"><br></td>
                                              <td><textarea class="form-control" id="pro_description" name="program[{{$i}}][description]" rows="5">{{$val->description}}</textarea><br></td>
                                              {{-- <input type="hidden" name="program[0][day]" class="form-control dayval" value="1"> --}}
                                              <td><span class="sremove" style="background: #ed3610;padding: 8px 10px;color: #fff;border-radius: 6%;text-decoration: none;cursor:pointer">-</span></td>
                                          </tr>
                                      @endforeach
                                  </table>
                                  <span  class="sadd_more" style="background: #28d19c;
                                                                          padding: 8px 21px;
                                                                          color: #fff;
                                                                          border-radius: 8%;text-decoration: none; margin-bottom: 10px;cursor:pointer;">+</span><br><br>
                              </div>
                          </div>
                      </div>     
                  </div>
                  <div class="box-footer">
                      <button type="submit" class="btn btn-info">Update</button>
                  </div>
              </div>
                  {!!Form::close()!!} 
                 <script>
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

                     $('#success').validate({ 
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
                    $(document).on('submit','#success',function(e){
                        e.preventDefault();
                            //var data = $(this).serialize();
                        if ($('#success').valid()) {
                        $.ajax({
                            url:"{!! route('success.update') !!}",
                            method:"POST",
                        data:new FormData(this),
                        dataType:'JSON',
                        contentType: false,
                        cache: false,
                        processData: false,
                            success:function(data)
                            {
                            // console.log(data);
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
                                

                            $("#tab5").load(location.href + " #tab5");
                            }
                            
                        });
                        }
                    })
                </script>
         </div>
         <div id="tab4" class="tab-pane fade in ">
            @php
                  $description = json_decode($data['advantage']->description);
                    $i = 0;
                  @endphp
                  {!!Form::open(['class' =>'form-horizontal','id'=>'advantage','enctype'=>'multipart/form-data'])!!}
                  <div id='refreshtab5'>
                  <div class="box-body">
                        <h3>Advantage</h3>
                      <div class="form-group">
                          <label for="title" class="col-sm-2 control-label">Title</label>
                          <div class="col-sm-8">
                          <input type="text" class="form-control" id="title" name="title" value="{{$data['advantage']->title}}">
                          <input type="hidden" class="form-control" id="id" name="id" value="{{$data['advantage']->id}}">
         
                         </div>
                      </div>
                      <div class="form-group">
                              <label for="title" class="col-sm-2 control-label"></label>
                              <div class="col-md-10">
                              <img id="myImage" class="img-responsive" width="200" height="100" src="{{url('/'.$data['advantage']->image)}}" alt="">
                              </div>
                            </div>
                      <div class="form-group">
                          <label for="title" class="col-sm-2 control-label">Image</label>
                          <div class="col-sm-8">
                          <input type="file" class="form-control" id="image" name="image">
                          </div>
                      </div>
                      <div class="form-group">
                              <label for="title" class="col-sm-2 control-label">Description</label>
                          <div class="list col-sm-8 " data-index_no="1000">
                              <div class="itemWrapper">
                                  <table class="table table-bordered moreTable">
                                      <tr>
                                          <th width="5%">Serial No</th>
                                          <th width="30%">title</th>
                                          <th width="50%">description</th>
                                          <th width="15%">Option</th>
                                      </tr>
                                       @foreach($description as $val)
                                       <?php $i++ ?>
                                          <tr class="item_tr single_list">
                                              <td class="day_no">{{$i}}</td>
                                          <td><input class="form-control" id="pro_title" name="program[{{$i}}][ptitle]" value="{{$val->ptitle}}"><br></td>
                                              <td><textarea class="form-control" id="pro_description" name="program[{{$i}}][description]" rows="5">{{$val->description}}</textarea><br></td>
                                              {{-- <input type="hidden" name="program[0][day]" class="form-control dayval" value="1"> --}}
                                              <td><span class="remove" style="background: #ed3610;padding: 8px 10px;color: #fff;border-radius: 6%;text-decoration: none;cursor:pointer">-</span></td>
                                          </tr>
                                      @endforeach
                                  </table>
                                  <span  class="add_more" style="background: #28d19c;
                                                                          padding: 8px 21px;
                                                                          color: #fff;
                                                                          border-radius: 8%;text-decoration: none; margin-bottom: 10px;cursor:pointer;">+</span><br><br>
                              </div>
                          </div>
                      </div>     
                  </div>
                  <div class="box-footer">
                      <button type="submit" class="btn btn-info">Update</button>
                  </div>
              </div>
                  {!!Form::close()!!} 
                 <script>
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

                     $('#advantage').validate({ 
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
                    $(document).on('submit','#advantage',function(e){
                        e.preventDefault();
                            //var data = $(this).serialize();
                        if ($('#advantage').valid()) {
                        $.ajax({
                            url:"{!! route('advantage.update') !!}",
                            method:"POST",
                        data:new FormData(this),
                        dataType:'JSON',
                        contentType: false,
                        cache: false,
                        processData: false,
                            success:function(data)
                            {
                            // console.log(data);
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
                                

                            $("#tab4").load(location.href + " #tab4");
                            }
                            
                        });
                        }
                    })
                </script>
         </div>
         <div id="tab6" class="tab-pane fade in">
            <section class="content" id="ourmission">
                    <div class="box box-info">
                         <div class="box-header with-border">
                         <h3 class="box-title">Our Mission</h3>
                             
                         </div>
                         {!!Form::open(['class' => 'form-horizontal','id'=>'mission','enctype'=>'multipart/form-data'])!!}
                         <div class="box-body">
                             <div class="form-group">
                                 <label for="title" class="col-sm-2 control-label">Title</label>
                                 <div class="col-sm-8">
                                 <input type="text" class="form-control" id="title" name="title" value="{{$data['mission']->title}}">
                                 <input type="hidden" class="form-control" id="id" name="id" value="{{$data['mission']->id}}">
            
                                </div>
                             </div>
                            
                             <div class="form-group">
                                <label for="description" class="col-sm-2 control-label">Description (40)</label>
                                <div class="col-sm-8">
                                <textarea type="text" class="form-control"  name="description" rows="10" placeholder="Enter Image Description">{{$data['mission']->description}}</textarea>
                                </div>
                            </div>
                            
                             
                         </div>
                         <div class="box-footer">
                             <button type="submit" class="btn btn-info">Update</button>
                         </div>
                         {!!Form::close()!!}
                     </div>
                 </section>
                 <section class="content" id="ourvision">
                        <div class="box box-info">
                             <div class="box-header with-border">
                             <h3 class="box-title">Our Vision </h3>
                                 <div class="box-tools pull-right">
                                 <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                 <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                             </div>
                             </div>
                             {!!Form::open(['class' => 'form-horizontal','id'=>'vision','enctype'=>'multipart/form-data'])!!}
                             <div class="box-body">
                                 <div class="form-group">
                                     <label for="title" class="col-sm-2 control-label">Title</label>
                                     <div class="col-sm-8">
                                     <input type="text" class="form-control" id="title" name="title" value="{{$data['vision']->title}}">
                                     <input type="hidden" class="form-control" id="id" name="id" value="{{$data['vision']->id}}">
                
                                    </div>
                                 </div>
                                
                                 <div class="form-group">
                                    <label for="description" class="col-sm-2 control-label">Description (40)</label>
                                    <div class="col-sm-8">
                                    <textarea type="text" class="form-control"  name="description" rows="10" placeholder="Enter Image Description">{{$data['vision']->description}}</textarea>
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
               
                $('#mission').validate({ 
                  rules: {
                        title: 
                        {
                          required: true,
                          
                        },
                        description: 
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
              
            
              $('#vision').validate({ 
                  rules: {
                        title: 
                        {
                          required: true,
                          
                        },
                        description: 
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
              
              $(document).on('submit','#mission',function(e){
                e.preventDefault();
                      //var data = $(this).serialize();
                      if ($('#mission').valid()) {
                       $.ajax({
                          url:"{!! route('mission.update') !!}",
                          method:"POST",
                        data:new FormData(this),
                        dataType:'JSON',
                        contentType: false,
                        cache: false,
                        processData: false,
                          success:function(data)
                          {
                          //  console.log(data);
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
                             
                  
                            $("#ourmission").load(location.href + " #ourmission");
                          }
                          
                      });
                  }
              });
            
              $(document).on('submit','#vision',function(e){
                e.preventDefault();
                      //var data = $(this).serialize();
                      if ($('#vision').valid()) {
                       $.ajax({
                          url:"{!!route('vision.update')!!}",
                          method:"POST",
                        data:new FormData(this),
                        dataType:'JSON',
                        contentType: false,
                        cache: false,
                        processData: false,
                          success:function(data)
                          {
                          //  console.log(data);
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
                             
                  
                            $("#ourvision").load(location.href + " #ourvision");
                          }
                          
                      });
                  }
              })
          
            </script>
         </div>
        <div id="tab7" class="tab-pane fade in">
            <section class="content" id="call2ref">
            <div class="box box-info">
                    <div class="box-header with-border">
                    <h3 class="box-title">Call to action</h3>
                    
                    </div>
                    {!!Form::open(['class' => 'form-horizontal','id'=>'call2','enctype'=>'multipart/form-data'])!!}
                    <div class="box-body">
                        
                        <div class="form-group">
                        <label for="description" class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-8">
                        <textarea type="text" class="form-control"  name="description" rows="8" placeholder="Enter  Description">{{$data['call2']->description}}</textarea>
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
                    $('#call2').validate({ 
                        rules: {
                           
                            description: 
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
                    $(document).on('submit','#call2',function(e){
                        e.preventDefault();
                        //var data = $(this).serialize();
                        if ($('#call2').valid()) {
                        $.ajax({
                            url:"{!! route('call2.update') !!}",
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
                                
                    
                            $("#call2ref").load(location.href + " #call2ref");
                            }
                            
                        });
                    }
                })
            </script>
        </div>

        </div>
    </div>
</section>
@endsection