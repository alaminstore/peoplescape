@extends('Backend.backendmaster')
@section('exams-active','active')
@section('title', 'PeopleScape | Admit Card')
@section('content')
<style>
    .clr{clear: both;}
    .col-md-offset-3.col-md-6.diplay-flex {
        display: flex;
        justify-content: space-around;
        align-items: center;
    }
    h4.reg_no_bg b {
        background: antiquewhite;
        padding: 10px;
    }
    .col-md-offset-3.col-md-6.diplay-flex2 {
        display: flex;
        justify-content: space-evenly;
        align-items: center;
        margin-top: 25px;
    }
    img.admit_img {
        border: 2px solid #c4c4c4;
        border-radius: 8px;
    }
    .input_fld h4 {
        line-height: 30px;
    }
    span.bdr_bottom {
        border-bottom: 1px solid #000;
    }
    h4.com_info {
        line-height: 23px;
        margin-top: 50px;
    }
    h4.admit_inst {
        margin-top: 22px;
        font-size: 15px;
    }
    h4.admit_header {
        line-height: 30px;
        padding-bottom: 15px;
    }
    </style>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title"><b>Admit Card</b></h3>
                        <button class="btn btn-primary btn-sm" onclick="printPage()">Print Admit Card</button>
                            {{-- <div class="top-buttons"> --}}
                                {{-- <button type="button" class="btn btn-primary btn-xs m-r-1" onclick="window.print();">
                                    <i class="fa fa-print icon_size"></i>
                                </button> --}}

                            {{-- </div> --}}

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                    class="fa fa-remove"></i></button>
                        </div>
                    </div>
                    <div class="box-body">

                        <div class="container" id="printable">
                            <div class="row">
                                <br><br>
                                <div class="col-md-offset-3 col-md-6" style="padding-right:0; display: flex;justify-content: space-evenly;align-items: center;">
                                    <div class="img_portion">
                                        <img src="https://www.peoplescapebd.net/frontEnd/img/logo.png" width="65" alt="logo">
                                    </div>
                                    <h4 style="line-height: 30px; padding-bottom: 15px;">
                                        <b>Apprentice Recruitment Examination Admit Card</b><br>
                                        <span><b>Venue:</b> {{$exams_data->vanue}}</span>
                                    </h4>
                                </div>
                                <div class="col-md-offset-3 col-md-6 reg_no text-center">
                                    <h4><b style="background: antiquewhite;padding: 10px;">Reg No. {{$careers->short_code}} {{Auth::User()->id}}</b></h4>
                                </div>
                                <div class="clr"></div>
                                <div class="col-md-offset-3 col-md-6" style="display: flex;
                                                                                        justify-content: space-evenly;
                                                                                        align-items: center;
                                                                                        margin-top: 25px;">
                                    <div>
                                        <h4 style="line-height: 30px;"><b>Name:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{Auth::User()->name}} <br> <b>Mobile No:&nbsp;</b>{{Auth::user()->mobile}}</h4>
                                    </div>
                                    <img src="{{asset(Auth::user()->image)}}" style="border: 2px solid #c4c4c4; border-radius: 8px;" width="90" alt="logo">
                                </div>
                                <div class="col-md-offset-3 col-md-6 descipe_pepolescape text-center">
                                      <h4 class="com_info" style="line-height: 23px; margin-top: 50px;">
                                          <b>Peoplescape Limited</b><br>
                                          H#8, R#23/C, Gulshan-1, Dhaka-1212 <br>
                                          <span class="bdr_bottom" style="border-bottom: 1px solid #000">hr@peoplescapebd.net</span>
                                      </h4>
                                      <h4 style="margin-top: 22px;font-size: 15px;">
                                          <b>(Please keep the Admit Card safely for viva Examination) <br>
                                          Note: Any kinf of Money transaction is strongly prohibited</b>
                                      </h4>
                                </div>
                            </div><br><br>
                            <div class="row">
                                <h4 class="text-center"><b>Rules & Regulations</b></h4>
                                <div class=".rules_reg">
                                    <div class="col-md-offset-2 col-md-offset-8">
                                        {!!$exams_data->rules!!}
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
  function printPage(e){
      var body = document.getElementById('bodyPrint').innerHTML;
      var data = document.getElementById('printable').innerHTML;
      document.getElementById('bodyPrint').innerHTML = data;
      window.print();
  }

</script>

@endsection

