@extends('Frontend.frontmaster')
@section('title', 'Peoplesscap | Cv-Create ')
@section('frntcontent')
{{-- <link rel="stylesheet" href="{{ asset('frontEnd/form-wizard/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('frontEnd/form-wizard/fonts/themeify-icons/themify-icons.css') }}"> --}}
<section class="page-banner-area" style="background: url({{'/'.$data['servicehead']->image}}); background-repeat: no-repeat; background-position: center; background-size: cover; background-attachment: fixed;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="page-banner-title">Cv Form</h2>
            </div>
        </div>
    </div>
</section>
<style>
    .labelclass{
        font-weight: normal!important;
    }
.custombtn{
    border: 1px solid #0d72ba;
    background: #0d72ba;
    color: #e4d8d8;
    font-weight: 700;
    font-size: 17px;
}
.cbtn button:hover{
  background: transparent!important;
  cursor: pointer;
}





/* Custom Style Start */

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {

}

.btn_prev, .btn_next{
    padding: 5px 80px;
    font-size: 20px;
    font-weight: 700;
}
/* Make circles that indicate the steps of the form: */
.step {
  margin: 0 2px;
  background-color: rgb(148, 122, 122)2);
  border: none;
  border-radius: 4%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
  color:#fff;
  background-color: #007bff;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  opacity: 1;
  background-color: #4CAF50;
}
/* Custom Style End */







    </style>
<!-- Services Details Area START -->
<section class="services-details-area">
    <div class="container">
        <div class="row">
         <div class="col-sm-12 all-s-details">
             @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            {{-- to be form in tab form --}}
            {{-- {!!Form::open(['method' => 'post', 'url' => '/cvformstore','class' => 'form-horizontal','id'=>'cvcreateform','enctype'=>'multipart/form-data'])!!} --}}
               <form action="{{url('/cvformstore')}}" method="post" id="cvcreateform" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item step">
                          <a class="nav-link " id="pills-information-tab" data-toggle="pill" href="#pills-information" role="tab" aria-controls="pills-info" aria-selected="true"><i class="fas fa-user"></i> Personal Information</a>
                        </li>
                        <li class="nav-item step">
                          <a class="nav-link" id="pills-education-tab" data-toggle="pill" href="#pills-education" role="tab" aria-controls="pills-education" aria-selected="false"><i class="fas fa-book-open"></i> Educational Qualification</a>
                        </li>
                        <li class="nav-item step">
                          <a class="nav-link" id="pills-experience-tab" data-toggle="pill" href="#pills-experience" role="tab" aria-controls="pills-experience" aria-selected="false"><i class="far fa-file-alt"></i> Experience</a>
                        </li>
                        <li class="nav-item step">
                          <a class="nav-link" id="pills-skills-tab" data-toggle="pill" href="#pills-skills" role="tab" aria-controls="pills-skills" aria-selected="false"><i class="fas fa-archive"></i> Skills</a>
                        </li>
                        <li class="nav-item step">
                          <a class="nav-link" id="pills-reference-tab" data-toggle="pill" href="#pills-reference" role="tab" aria-controls="pills-reference" aria-selected="false"><i class="far fa-share-square"></i> Reference</a>
                        </li>
                    </ul>


                <div class="tab-content" id="pills-tabContent">

             {{-- Tab 1 --}}
            <div class="tab">
                            <div class="row" style="margin:2px;">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="sel1" style="font-size: 22px;">Personal Information</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="title" class="col-sm-4 control-label labelclass"><span style="color:red">*</span> Name</label>
                                        <div class="col-sm-10" style="max-width: 100%">
                                            <input type="text" oninput="this.className = ''" style="width: 100%;" class="form-control" id="name" name="name" value="{{old('name')}}" placeholder="Enter Your Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="birthdate" class="col-sm-4 control-label labelclass"><span style="color:red">*</span> Birthdate</label>
                                        <div class="col-sm-10" style="max-width: 100%">
                                            <input type="date"  oninput="this.className = ''" style="width: 100%;" class="form-control" id="birthdate" name="birthdate" value="{{old('birthday')}}" placeholder="Enter Your Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="haddress" class="col-4 control-label labelclass"><span style="color:red">*</span> Home Address</label>
                                        <div class="col-10" style="max-width: 100%">
                                            <input type="text" oninput="this.className = ''" style="width: 100%;" class="form-control" id="haddress" name="haddress" value="{{old('haddress')}}" placeholder="Enter  Address">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="paddress" class="col-6 control-label labelclass"><span style="color:red">*</span> Permanent Address</label>
                                        <div class="col-10" style="max-width: 100%">
                                            <input type="text" oninput="this.className = ''"   style="width: 100%;" class="form-control" id="paddress" name="paddress" value="{{old('paddress')}}" placeholder="Enter  Address">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="title" class="col-4 control-label labelclass"><span style="color:red">*</span> Phone No</label>
                                        <div class="col-10"  style="max-width: 100%">
                                            <input type="text" oninput="this.className = ''" style="width: 100%;" class="form-control" id="mobile" name="mobile" value="{{old('mobile')}}" placeholder="Enter  Mobile Number">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="title" class="col-4 control-label labelclass"><span style="color:red">*</span> Email </label>
                                        <div class="col-10" style="max-width: 100%">
                                        <input type="email" oninput="this.className = ''" style="width: 100%;" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="Enter Email Address">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="title" class="col-8 control-label labelclass"><span style="color:red">*</span> Password(At least 8 characters) </label>
                                        <div class="col-10" style="max-width: 100%">
                                            <input type="password" oninput="this.className = ''" style="width: 100%;" class="form-control" id="matchpassword" name="password" placeholder="Enter password">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="title" class="col-8 control-label labelclass"><span style="color:red">*</span> Confirm Password </label>
                                        <div class="col-10" style="max-width: 100%">
                                            <input type="password" oninput="this.className = ''" style="width: 100%;" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-radio form-radio-inline">
                                        <div style="padding-left:6px;font-size: 1rem" class="form-radio-legend "><span style="color:red">*</span> Gender</div>

                                        &nbsp;&nbsp;&nbsp; <input type="radio" oninput="this.className = ''"   name=gender class="form-radio-field"  type="radio" required value="Male" />
                                            <span>Male</span>
                                            &nbsp;&nbsp;&nbsp; <input type="radio" oninput="this.className = ''"   name=gender class="form-radio-field" type="radio" required value="Female" />
                                            <span>Female</span>
                                        </label>
                                    </div>
                                </div>
                                 <div class="col-6">
                                    <div class="form-group">
                                        <label for="title" class="col-8 control-label labelclass"><span style="color:red">*</span> Division</label>
                                        <div class="col-10" style="max-width: 100%">
                                            <!--<input type="password" class="form-control" id="matchpassword" name="password" placeholder="Enter password">-->
                                         <select class="form-control" name="area" id="area">
                                            <option value="">SelectOption</option>
                                            <option value="Dhaka">Dhaka</option>
                                            <option value="Rajshahi">Rajshahi</option>
                                            <option value="Khulna">Khulna</option>
                                            <option value="Chittagong">Chittagong</option>
                                            <option value="Barisal">Barisal</option>
                                            <option value="Mymensingh">Mymensingh</option>
                                            <option value="Rangpur">Rangpur </option>
                                            <option value="Sylhet">Sylhet </option>
                                          </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-radio form-radio-inline">
                                        <div style="padding-left:6px;font-size: 1rem" class="form-radio-legend "><span style="color:red">*</span> Marital Status</div>

                                           &nbsp;&nbsp;&nbsp; <input name="marital_status" oninput="this.className = ''" class="form-radio-field" type="radio"  required value="Married" />
                                            <span>Married</span>


                                            &nbsp;&nbsp;&nbsp; <input name="marital_status" oninput="this.className = ''" class="form-radio-field" type="radio" required value="Unmarried" />
                                            <span>Unmarried</span>

                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="title" class="col-8 control-label labelclass"><span style="color:red">*</span> NID/Birth/Passport/Driving </label>
                                        <div class="col-10" style="max-width: 100%">
                                            <input type="text" class="form-control" style="width: 100%;" oninput="this.className = ''" id="matchpassword" name="nid" value="{{old('nid')}}" placeholder="NID/Passport/Birth Cirtificate/Driving license">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row" style="margin:2px;">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="sel1" style="font-size: 22px;">Objective</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin:2px;">
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea name="objective" class="form-control" rows="4" placeholder="Write Objective....">
                                            {{old('objective')}}
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin:2px;">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="sel1" style="font-size: 22px;"> Personal Interest</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin:2px;">
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea name="interest" class="form-control" rows="4" placeholder="Write About Yourself....">
                                            {{old('interest')}}
                                        </textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row" style="margin:10px 2px 2px 2px;">
                                <div class="col-6">
                                    <div>
                                        <label for="sel1" class="labelclass">Upload Your Photo</label><br>
                                        <input type="file" oninput="this.className = ''" name='image' value="{{old('image')}}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div>
                                        <label for="sel1" class="labelclass">Upload Your Cv(doc,pdf)</label>
                                        <input type="file" oninput="this.className = ''" name='cv' value="{{old('cv')}}">
                                    </div>
                                </div>
                            </div> <br>


            </div>
                        {{-- Tab 2 --}}
            <div class="tab">
                                    <div class="row" style="margin:2px;">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="sel1" style="font-size: 22px;"> Educational Qualification</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" >
                                        <div class="col-12">
                                               <div class="form-group">
                                                        <div class="alist col-sm-12 " data-index_no="1000">
                                                        <div class="aitemWrapper">
                                                            <table class="table table-bordered amoreTable">
                                                                <tr>
                                                                    <th width="5%" class="labelclass">S.N</th>
                                                                    <th width="15%" class="labelclass">Degree</th>
                                                                    <th width="15%" class="labelclass">Institution Name</th>
                                                                    <th width="10%" class="labelclass">Score</th>
                                                                    <th width="15%" class="labelclass">Major</th>
                                                                    <th width="15%" class="labelclass">Minor</th>
                                                                    <th width="10%" class="labelclass">Location</th>
                                                                    <th width="10%" class="labelclass">Passing Year</th>
                                                                    <th width="5%" class="labelclass">Remove</th>
                                                                </tr>

                                                                    <tr class="aitem_tr asingle_list">
                                                                        <td class="day_no labelclass" >1</td>
                                                                        <td>
                                                                            <select class="form-control degreeonchange" name="academic[0][degree]" id="degree">
                                                                                <option value="">SelectOption</option>
                                                                                @foreach ($data['deg'] as $item)
                                                                                    <option value="{{$item->degree}}" data-id="{{$item->id}}">{{$item->degree}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </td>
                                                                        <td class="otherapp deloapp">
                                                                           <select class="form-control institute delinst"  name="academic[0][instname]">
                                                                                <option value="">Select</option>
                                                                                @foreach ($data['inst'] as $insti)
                                                                                    <option value="{{$insti->name}}">{{$insti->name}}</option>
                                                                                @endforeach
                                                                                <option value="other">Other</option>
                                                                            </select>
                                                                            <input type="text" class="form-control otherinst"  name="academic[0][instnameoth]" placeholder="Enter Institute Name" style="display:none" >

                                                                        </td>
                                                                        <td><input type="text" class="form-control"  name="academic[0][cgpa]" placeholder="EX:3.80 "><br></td>
                                                                        <td>
                                                                            <select class="form-control majorapp"  name="academic[0][major]">
                                                                             </select>
                                                                         </td>
                                                                         <td>
                                                                            <select class="form-control minorapp"  name="academic[0][minor]">
                                                                             </select>
                                                                         </td>
                                                                        <td><input type="text" class="form-control"  name="academic[0][location]" placeholder="Enter Location "><br></td>
                                                                        <td><input type="date" class="form-control pyear"  name="academic[0][pyear]" placeholder=" "><br></td>

                                                                         <td><span class="aremove" style="background: #ed3610;
                                                                        padding: 0px 7px;;
                                                                        color: #fff;
                                                                        border-radius: 8%;
                                                                        text-decoration: none;
                                                                        margin-bottom: 10px;
                                                                        cursor: pointer;">-</span></td>
                                                                    </tr>

                                                            </table>
                                                            <span  class="aadd_more" style="background: #0d72ba;
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
                                        <div class="col-6">
                                        <div class="form-group">
                                            <label for="title" class="col-4 control-label labelclass"><span style="color:red">*</span> Last Degree</label>
                                            <div class="col-10" style="max-width: 100%">
                                                <!--<input type="text" class="form-control" id="l_degree" name="l_degree" placeholder="EX:M.B.A" required>-->
                                                <select class="form-control" name="l_degree">
                                                    <option value="">SelectOption</option>
                                                    @foreach ($data['deg'] as $item)
                                                        <option value="{{$item->degree}}" data-id="{{$item->id}}">{{$item->degree}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="title" class="col-8 control-label labelclass"><span style="color:red">*</span> Score of Last Degree </label>
                                        <div class="col-10" style="max-width: 100%">
                                        <input type="text" class="form-control" id="l_score" name="l_score" placeholder="EX:3.80" required>
                                        </div>
                                    </div>
                                </div>
                                    </div>

            </div>

                        {{-- Tab 3 --}}
            <div class="tab">
                                <div class="row" style="margin:2px;">
                                        <div class="col-12">
                                            <div class="form-group">
                                            <label for="sel1" style="font-size: 22px;"> Experience</label>
                                            </div>
                                        </div>
                                </div>
                                <div class="row" >
                                    <div class="col-12">
                                      <div class="form-group">
                                          <div class="list col-sm-12 " data-index_no="1000">
                                              <div class="itemWrapper">
                                                  <table class="table table-bordered moreTable">
                                                      <tr>
                                                          <th width="5%" class="labelclass">S.N</th>
                                                          <th width="15%" class="labelclass">Job Title</th>
                                                          <th width="15%" class="labelclass">Company Name</th>
                                                          <th width="20%" class="labelclass">Responsibilities</th>
                                                          <th width="15%" class="labelclass">Joined On</th>
                                                          <th width="15%" class="labelclass">Left On</th>
                                                          <th width="10%" class="labelclass">Remove</th>
                                                      </tr>

                                                          <tr class="item_tr single_list">
                                                              <td class="day_no labelclass" >1</td>
                                                              <td><input type="text" class="form-control" id="pro_role" name="experience[0][title]" placeholder="Enter Job Title"><br></td>
                                                              <td><input type="text" class="form-control" id="pro_role" name="experience[0][company]" placeholder="Enter Company Name"><br></td>
                                                              <td><input type="text" class="form-control" id="pro_role" name="experience[0][responsibilites]" placeholder="Enter Responsibilites"><br></td>
                                                              <td><input type="date" class="form-control joinon" id="pro_role" name="experience[0][joinedin]" placeholder="Enter Joined date EX:dd-mm-yy"><br></td>
                                                              <td><input type="date" class="form-control lefton" id="pro_role" name="experience[0][leftin]" placeholder="Enter Leftin date EX:dd-mm-yy"><br></td>
                                                              <td><span class="remove" style="background: #ed3610;
                                                                  padding: 0px 7px;;
                                                                  color: #fff;
                                                                  border-radius: 8%;
                                                                  text-decoration: none;
                                                                  margin-bottom: 10px;
                                                                  cursor: pointer;">-</span></td>
                                                          </tr>

                                                  </table>
                                                  <span  class="add_more" style="background: #0d72ba;
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
                        <div class="row" style="margin:2px;">
                                <div class="col-12">
                                    <div class="form-group">
                                    <label for="sel1" style="font-size: 22px;"> Personal Project</label>
                                    </div>
                                </div>
                        </div>
                        <div class="row" >
                            <div class="col-12">
                                    <div class="form-group">
                                        <div class="wlist col-sm-12 " data-index_no="1000">
                                            <div class="witemWrapper">
                                                <table class="table table-bordered wmoreTable">
                                                    <tr>
                                                        <th width="5%" class="labelclass">S.N</th>
                                                        <th width="30%" class="labelclass">Url</th>
                                                        <th width="50%" class="labelclass">Project Details</th>
                                                        <th width="10%" class="labelclass">Remove</th>
                                                    </tr>

                                                        <tr class="witem_tr wsingle_list">
                                                            <td class="day_no labelclass">1</td>
                                                            <td><input type="text" class="form-control" id="pro_url" name="project[0][url]" placeholder="Enter Project Url"><br></td>
                                                            <td><textarea type="text" class="form-control" id="pro_comment" name="project[0][comment]" placeholder="Enter Description About Project"></textarea><br></td>
                                                           <td><span class="wremove" style="background: #ed3610;
                                                            padding: 0px 7px;;
                                                            color: #fff;
                                                            border-radius: 8%;
                                                            text-decoration: none;
                                                            margin-bottom: 10px;
                                                            cursor: pointer;">-</span></td>
                                                        </tr>

                                                </table>
                                                <span  class="wadd_more" style="background: #0d72ba;
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
                            <div class="row" style="margin:2px;">
                                <div class="col-12">
                                    <div class="form-group">
                                    <label for="sel1" style="font-size: 22px;"> Personal Achievements</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row" >
                                <div class="col-12">
                                        <div class="form-group">
                                            <div class="aclist col-sm-12 " data-index_no="1000">
                                                <div class="acitemWrapper">
                                                    <table class="table table-bordered acmoreTable">
                                                        <tr>
                                                            <th width="5%" class="labelclass">S.N</th>
                                                            <th width="700%" class="labelclass">Achievements</th>
                                                           <th width="10%" class="labelclass">Remove</th>
                                                        </tr>

                                                            <tr class="acitem_tr acsingle_list">
                                                                <td class="day_no labelclass">1</td>
                                                                <td><textarea type="text" class="form-control" id="achievement" rows="3" name="achievement[0][achieve]" placeholder="Enter Your personal achievement">
                                                                    {{old('achievement[0][achieve]')}}
                                                                </textarea><br></td>
                                                               <td><span class="acremove" style="background: #ed3610;
                                                                padding: 0px 7px;;
                                                                color: #fff;
                                                                border-radius: 8%;
                                                                text-decoration: none;
                                                                margin-bottom: 10px;
                                                                cursor: pointer;">-</span></td>
                                                            </tr>

                                                    </table>
                                                    <span  class="acadd_more" style="background: #0d72ba;
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

            </div>
                        {{-- TB 4 --}}
                <div class="tab">
                            <div class="row" style="margin:2px;">
                                <div class="col-12">
                                    <div class="form-group">
                                    <label for="sel1" style="font-size: 22px;"> Skills</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row" >
                                <div class="col-12">
                                        <div class="form-group">
                                            <div class="sklist col-sm-12 " data-index_no="1000">
                                                <div class="skitemWrapper">
                                                    <table class="table table-bordered skmoreTable">
                                                        <tr>
                                                            <th width="5%" class="labelclass">S.N</th>
                                                            <th width="700%" class="labelclass">Professional Or Technical Skills</th>
                                                        <th width="10%" class="labelclass">Remove</th>
                                                        </tr>

                                                            <tr class="skitem_tr sksingle_list">
                                                                <td class="day_no labelclass">1</td>
                                                                <td><input type="text" class="form-control" id="skill"  name="skill[0][competent]" placeholder="Eg:HTML,CSS,JS"><br></td>
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
                                </div>
                            </div>

                </div>
                        {{-- Tab 5 --}}
                <div class="tab">
                                <div class="row" style="margin:2px;">
                                        <div class="col-12">
                                            <div class="form-group">
                                            <label for="sel1" style="font-size: 22px;"> Reference Name</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" >
                                        <div class="col-12">
                                           <div class="form-group">
                                                    <div class="relist col-sm-12 " data-index_no="1000">
                                                    <div class="reitemWrapper">
                                                        <table class="table table-bordered remoreTable">
                                                            <tr>
                                                                <th width="5%" class="labelclass">S.N</th>
                                                                <th width="20%" class="labelclass">Title</th>
                                                                <th width="20%" class="labelclass">Company</th>
                                                                <th width="40%" class="labelclass">Contact info</th>
                                                                <th width="15%" class="labelclass">Remove</th>
                                                            </tr>

                                                                <tr class="reitem_tr resingle_list">
                                                                    <td class="day_no labelclass" >1</td>
                                                                    <td><input type="text" class="form-control"  name="reference[0][title]" placeholder="Enter Degree  Name"><br></td>
                                                                    <td><input type="text" class="form-control"  name="reference[0][company]" placeholder="Enter Institute Name"><br></td>
                                                                    <td><input type="text" class="form-control"  name="reference[0][contactinfo]" placeholder="Enter Score "><br></td>
                                                                    <td><span class="reremove" style="background: #ed3610;
                                                                    padding: 0px 7px;;
                                                                    color: #fff;
                                                                    border-radius: 8%;
                                                                    text-decoration: none;
                                                                    margin-bottom: 10px;
                                                                    cursor: pointer;">-</span></td>
                                                                </tr>

                                                        </table>
                                                        <span  class="readd_more" style="background: #0d72ba;
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

                </div>
                <div class="tab">
                    <h2 class="text-center">Almost there...</h2>
                </div>
            </div>


                    <br>
                    <div style="overflow:auto;" id="sub_btn">
                        <div class="text-center">
                          <button type="button" class="btn btn-info btn-lg btn_prev"  id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                          <button type="button" class="btn btn-success btn-lg btn_next" id="nextBtn" onclick="nextPrev(1)"><b>Next</b></button>
                        </div>
                      </div>


                      {{-- <div style="text-align:center;margin-top:40px;">
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                      </div> --}}

                </form>

          </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    {{-- <script src="{{ asset('frontEnd/form-wizard/js/main.js') }}"></script> --}}


   <script>
       var currentTab = 0; // Current tab is set to be the first tab (0)
       showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if(n == (x.length - 1)){
    document.getElementById("nextBtn").type = "submit";
    $("#sub_btn").click(function(){
    $("#sub_btn").hide();
  });
  }
  if (n == (x.length - 2)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  console.log('tab length',x.length);  //tab length 4
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:;
    document.getElementById("cvcreateform").submit();
    return true;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
   </script>


















    <script>
   //new 2.17.2020
           $(document).on('change','.degreeonchange',function(){
            var id = $(this).find(":selected").attr('data-id');
            //$(this).closest('.aitem_tr').find('.majorapp').append('<option value="gdfg">sdfgsdfg</option>');
            var $this = $(this);
            //var id = $(this).data('id');
            $.ajax({
            url: "{!! route('degree.majorminor') !!}",
            type: "get",
            data: {
                id: id,
            },
            //context: this,
            success: function(data) {
                console.log(data);
                $this.closest('.aitem_tr').find('.majorapp').empty();
                $this.closest('.aitem_tr').find('.minorapp').empty();
                $.each(JSON.parse(data.major),function(index, majordegree){
                   if(majordegree.major==null){
                        $this.closest('.aitem_tr').find('.majorapp').append('<option >Not Available</option>');
                    }else{
                        $this.closest('.aitem_tr').find('.majorapp').append('<option value="'+majordegree.major+'">'+majordegree.major+'</option>');
                    }
               });
               $.each(JSON.parse(data.minor),function(index, minordegree){
                   if(minordegree.minor==null){
                    $this.closest('.aitem_tr').find('.minorapp').append('<option >Not Available</option>');
                    }else{
                        $this.closest('.aitem_tr').find('.minorapp').append('<option value="'+minordegree.minjor+'">'+minordegree.minor+'</option>');
                    }
               });
            }
        })
        });
        $(document).on('change','.institute',function(){
            if(this.value =='other'){

                $(this).closest('.aitem_tr').find('.otherinst').show();
            }else{
                $(this).closest('.aitem_tr').find('.otherinst').hide();
                $(this).closest('.aitem_tr').find('.otherinst').val("other");
            }
        })

        $(document).ready(function () {
            $.validator.addMethod('filesize', function (value, element, arg) {
            if(element.files[0].size<=arg){
                return true;
            }else{
                return false;
            }
        });
        $('#cvcreateform').validate({
        rules: {
                name:
                {
                required: true,

                },
                birthdate:
                {
                required: true,

                },
                haddress:
                {
                required: true,

                },
                paddress:
                {
                required: true,

                },

                mobile:
                {
                    required: true,
                    number: true,
                    minlength: 11,
                    maxlength: 11

                },
                email:
                {
                required: true,
                email:true,
                remote:
                    {
                      url: "{{route('unqemail.chk')}}"
                    },
                },
                password:
                {
                   required: true,
                   minlength: 8
                },
                password_confirmation : {
                    equalTo : "#matchpassword"
                },
                area:{
                    required: true,
                },
                image:
                {
                 required: true,
                 extension: "jpg|png|jpeg"
                },
                cv:
                {
                 required: true,
                 extension: "pdf|doc|docx",
                 filesize: 200000,
                },
                objective:{
                    required: true,
                }
        },
        messages:
          {
            confirmpassword: " Enter Confirm Password Same as Password",
            password:{
                maxlength:"Password length must not be less than 8 characters",
            },
            email:
            {
                email:"Please enter a valid email address",
                // remote:("Email is already in use"),
            },
            image:
            {
                extension:("Only jpg,png,jpeg image is accepted"),
            },
            cv:
            {
                extension:("Only Pdf,Doc,Docx is accepted"),
                filesize:("file size must be less than 200 KB."),
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
      $(document).on('click','.aadd_more',function(){
        var pyear =  $(this).closest('.aitemWrapper').find('.aitem_tr:last').find('.pyear').val();
        if(pyear==''){
            alert('You have to Fill Passing year!');

        }else{
        var index = $('.alist').data('index_no');
        $('.alist').data('index_no', index + 1);
        var html = $('.aitemWrapper .aitem_tr:last').clone().find('.form-control').each(function () {
            this.name = this.name.replace(/\d+/, index+1);
            this.id = this.id.replace(/\d+/, index+1);
            this.value = '';
        }).end();
        console.log('clone:   ',html);
        $('.amoreTable').append(html);
        var rowCount = $('.amoreTable tr').length;
        $(this).closest('.aitemWrapper').find('.aitem_tr:last').find('.day_no').html(rowCount-1);
        $(this).closest('.aitemWrapper').find('.aitem_tr:last').find('.dayval').val(rowCount-1);
         $(this).closest('.aitemWrapper').find('.aitem_tr:last').find('.otherinst').hide();
        }
    });
    $(document).on('click', '.aremove', function () {
        var obj=$(this);
        var count= $('.asingle_list').length;
        // alert(count);
        if(count > 1) {
            if(obj.closest('.asingle_list').is($(this).closest('.aitemWrapper').find('.asingle_list:last'))){
                obj.closest('.asingle_list').remove();
            }else{
                alert('You can only remove the last one!');
            }
        }
    });
    $(document).on('click','.add_more',function(){

    var lefton =  $(this).closest('.itemWrapper').find('.item_tr:last').find('.lefton').val();
    var joinon =  $(this).closest('.itemWrapper').find('.item_tr:last').find('.joinon').val();

        if(joinon=='' || lefton =='' ){
            alert('You have to Fill Left In and Join In must.If status is running choose current date!');
        }else{
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
        }
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
    $(document).on('click','.wadd_more',function(){
        var index = $('.wlist').data('index_no');
        $('.wlist').data('index_no', index + 1);
        var html = $('.witemWrapper .witem_tr:last').clone().find('.form-control').each(function () {
            this.name = this.name.replace(/\d+/, index+1);
            this.id = this.id.replace(/\d+/, index+1);
            this.value = '';
        }).end();
        $('.wmoreTable').append(html);
        var rowCount = $('.wmoreTable tr').length;
        $(this).closest('.witemWrapper').find('.witem_tr:last').find('.day_no').html(rowCount-1);
        $(this).closest('.witemWrapper').find('.witem_tr:last').find('.dayval').val(rowCount-1);
    });
    $(document).on('click', '.wremove', function () {
        var obj=$(this);
        var count= $('.wsingle_list').length;
        // alert(count);
        if(count > 1) {
            if(obj.closest('.wsingle_list').is($(this).closest('.witemWrapper').find('.wsingle_list:last'))){
                obj.closest('.wsingle_list').remove();
            }else{
                alert('You can only remove the last one!');
            }
        }
    });
    $(document).on('click','.acadd_more',function(){
        var index = $('.aclist').data('index_no');
        $('.aclist').data('index_no', index + 1);
        var html = $('.acitemWrapper .acitem_tr:last').clone().find('.form-control').each(function () {
            this.name = this.name.replace(/\d+/, index+1);
            this.id = this.id.replace(/\d+/, index+1);
            this.value = '';
        }).end();
        $('.acmoreTable').append(html);
        var rowCount = $('.acmoreTable tr').length;
        $(this).closest('.acitemWrapper').find('.acitem_tr:last').find('.day_no').html(rowCount-1);
        $(this).closest('.acitemWrapper').find('.acitem_tr:last').find('.dayval').val(rowCount-1);
    });
    $(document).on('click', '.acremove', function () {
        var obj=$(this);
        var count= $('.acsingle_list').length;
        // alert(count);
        if(count > 1) {
            if(obj.closest('.acsingle_list').is($(this).closest('.acitemWrapper').find('.acsingle_list:last'))){
                obj.closest('.acsingle_list').remove();
            }else{
                alert('You can only remove the last one!');
            }
        }
    });
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
     $(document).on('click','.readd_more',function(){
        var index = $('.relist').data('index_no');
        $('.relist').data('index_no', index + 1);
        var html = $('.reitemWrapper .reitem_tr:last').clone().find('.form-control').each(function () {
            this.name = this.name.replace(/\d+/, index+1);
            this.id = this.id.replace(/\d+/, index+1);
            this.value = '';
        }).end();
        $('.remoreTable').append(html);
        var rowCount = $('.remoreTable tr').length;
        $(this).closest('.reitemWrapper').find('.reitem_tr:last').find('.day_no').html(rowCount-1);
        $(this).closest('.reitemWrapper').find('.reitem_tr:last').find('.dayval').val(rowCount-1);
    });
    $(document).on('click', '.reremove', function () {
        var obj=$(this);
        var count= $('.resingle_list').length;
        // alert(count);
        if(count > 1) {
            if(obj.closest('.resingle_list').is($(this).closest('.reitemWrapper').find('.resingle_list:last'))){
                obj.closest('.resingle_list').remove();
            }else{
                alert('You can only remove the last one!');
            }
        }
    });
    </script>
    <script>
            @if(Session::has('message'))
            toastr.options = {
                            "debug": false,
                            "positionClass": "toast-bottom-right",
                            "onclick": null,
                            "fadeIn": 300,
                            "fadeOut": 1000,
                            "timeOut": 5000,
                            "extendedTimeOut": 1000
                        };
            toastr.success("{{ Session::get('message') }}");
           @endif
          </script>
    <script>
        // INFORMATION TO EDUCATION ROUTE
        function infoToedu(){
            document.getElementById("pills-information-tab").classList.remove("active");
            document.getElementById("pills-education-tab").classList.add("active");
        }
        function eduToinfo(){
            document.getElementById("pills-education-tab").classList.remove("active");
            document.getElementById("pills-information-tab").classList.add("active");
        }
        // ROUTE ENDS

        // EDUCATION TO EXPERIENCE ROUTE
        function eduToexp(){
            document.getElementById("pills-education-tab").classList.remove("active");
            document.getElementById("pills-experience-tab").classList.add("active");
        }
        function expToedu(){
            document.getElementById("pills-experience-tab").classList.remove("active");
            document.getElementById("pills-education-tab").classList.add("active");
        }
        // ROUTE ENDS

        // EXPERIENCE TO SKILLS ROUTE
        function expToski(){
            document.getElementById("pills-experience-tab").classList.remove("active");
            document.getElementById("pills-skills-tab").classList.add("active");
        }
        function skiToexp(){
            document.getElementById("pills-skills-tab").classList.remove("active");
            document.getElementById("pills-experience-tab").classList.add("active");
        }
        // ROUTE ENDS

        // SKILLS TO REFERENCE ROUTE
        function skiToref(){
            document.getElementById("pills-skills-tab").classList.remove("active");
            document.getElementById("pills-reference-tab").classList.add("active");
        }
        function refToski(){
            document.getElementById("pills-reference-tab").classList.remove("active");
            document.getElementById("pills-skills-tab").classList.add("active");
        }
        // ROUTE ENDS


    </script>
</section>

@endsection
