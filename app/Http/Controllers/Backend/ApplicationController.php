<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cvform;
use App\User;
use DB;
use App\Degree;
use App\Jobapplied;
use App\Institution;
use App\Degreemajorminor;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
      

        $this->middleware('accesscontrol', ['only' => ['index']]);

    }
    public function index()
    {  
        $cv = Cvform::orderBy('id','desc')->get();
         $userid=[];
        $leftIn=[];
        $i=0;
        foreach($cv as $us){
            $i++; 
            $sum=0;        
            $decoded = json_decode($us->experience);
            $initiallef=0;
           
            foreach($decoded as $key=>$exp){
                $expjoin = strtotime($exp->joinedin);
                $expleft = strtotime($exp->leftin);
                $diff = $expleft - $expjoin;
                $day = $diff / 86400;
                $sum = $sum + $day; 
                if(strtotime($exp->leftin) > $initiallef ){
                    $userid[$i]['lastleftin']=$exp->leftin;
                    $userid[$i]['lastcompany']=$exp->company;
                }else{
                    $userid[$i]['lastcompany']='Wrong format'; 
                }
                $initiallef=strtotime($exp->leftin);
                
            }
            $decoded1 = json_decode($us->academic);
            $intitialpyear=0;
            foreach($decoded1 as $acc){
                if(strtotime($acc->pyear) > $intitialpyear){
                    $userid[$i]['lastinst']=$acc->instname;
                    if($userid[$i]['lastinst']=='other'){
                        $userid[$i]['lastinst']=$acc->instnameoth; 
                    }
                    $userid[$i]['lastdegree']=$acc->degree; 
                   if(array_key_exists('major', $acc)){
                      $userid[$i]['major']=$acc->major;
                    }else{
                        $userid[$i]['major']='No Data'; 
                    }
                   if(array_key_exists('minor', $acc)){
                      $userid[$i]['minor']=$acc->minor;
                   }else{
                        $userid[$i]['minor']='No Data'; 
                    }
                }else{
                     $userid[$i]['lastinst']='wrong format';
                     $userid[$i]['lastdegree']='wrong format';
                     $userid[$i]['major']='wrong format';
                     $userid[$i]['minor']='wrong format';
                }
                $intitialpyear = strtotime($acc->pyear);
            }
            $userid[$i]['name']=$us->name;
            $userid[$i]['email']=$us->email;
            $userid[$i]['mobile']=$us->mobile;
            $userid[$i]['userid']=$us->userid;
            $userid[$i]['experience']=round(($sum/365),1);
            $userid[$i]['age']=$us->age;
            $userid[$i]['gender']=$us->gender;
        }
        return view('Backend.application.application',compact('cv','userid'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {  
        $careerInfoByid = Cvform::findorfail($id);
        return view('Backend.application.singleapplication',compact('careerInfoByid'));
    }
    public function cvformforuserdash(){
        $data['deg'] = Degree::orderBy('id','desc')->get();
         $data['inst'] = Institution::orderBy('id','desc')->get();
        return view('Backend.application.createyourcv',compact('data'));
    }
     public function applicantprofile(Request $request){
        $id = $request->id;
        $user_info = User::findorfail($id);
        $findCv = Cvform::where('userid','=',$id)->first();
        $data['deg'] = Degree::orderBy('id','desc')->get();
         $data['inst'] = Institution::orderBy('id','desc')->get();
        return view('Backend.application.profile',compact('user_info','findCv','data'));
    }
    public function personalinfoupdate(Request $request){
        if($request->file('cv')){
            $findPrevious = Cvform::where('userid','=',$request->userid)->first();
            if($findPrevious){
                $oldfile =  $findPrevious->cv;
                unlink($oldfile);
                $image = $request->file('cv');
                $new_name =time().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('careerfile'), $new_name);
                $findPrevious->haddress = $request->haddress;
                $findPrevious->paddress = $request->paddress;
                $findPrevious->birthdate = $request->birthdate;
                $findPrevious->objective = $request->objective;
                $findPrevious->interest = $request->interest;
                $findPrevious->cv ='careerfile/'.$new_name;
                $findPrevious->save();
           }
        }
        $cvinfo = Cvform::where('userid','=',$request->userid)->first();
        $cvinfo->haddress = $request->haddress;
        $cvinfo->paddress = $request->paddress;
        $cvinfo->birthdate = $request->birthdate;
        $cvinfo->objective = $request->objective;
        $cvinfo->interest = $request->interest;
        $cvinfo->dateee=date('Y-m-d');
        $cvinfo->save();
        return $request->userid;

    }
    public function basicinfop(Request $request){
        $id = $request->userid;
       
        $user = User::find($id);
        if($request->file('image')){
            $user = User::find($id);
            $old_image = $user->image;
            unlink($old_image);
            $image = $request->file('image');
            $new_name_image =time().'.'. $image->getClientOriginalExtension();
            $image->move(public_path('careerfile'),$new_name_image);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->image = 'careerfile/'.$new_name_image;
            $user->save();
            $cvinfo = Cvform::where('userid','=',$request->userid)->first();
            $cvinfo->name = $request->name;
            $cvinfo->email = $request->email;
            $cvinfo->mobile = $request->mobile;
            $cvinfo->dateee=date('Y-m-d');
            $cvinfo->save();
            return $id;
        }else{
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->save();
            $cvinfo = Cvform::where('userid','=',$request->userid)->first();
            $cvinfo->name = $request->name;
            $cvinfo->email = $request->email;
            $cvinfo->mobile = $request->mobile;
            $cvinfo->dateee=date('Y-m-d');
            $cvinfo->save();
            return $id;
        }
        
    }
    public function educationalinfo(Request $request){
        $id = $request->userid;
        $cvform = Cvform::where('userid','=',$id)->first();
        if($request->academic){
            $cvform->academic = json_encode($request->academic);
            $cvform->dateee=date('Y-m-d');
        }
        $cvform->save();
        return $id;

    }
    public function expinfo(Request $request){
        $id = $request->userid;
        $cvform = Cvform::where('userid','=',$id)->first();

        if($request->experience){
            $cvform->experience =json_encode($request->experience);
        }
        if($request->project){
            $cvform->project =json_encode($request->project);
        }
        if($request->achievement){
            $cvform->achievement = json_encode($request->achievement);
        }
         $cvform->dateee=date('Y-m-d');
        $cvform->save();
        return $id; 
    }
    public function skillupdate(Request $request){
        $id = $request->userid;
        $cvform = Cvform::where('userid','=',$id)->first();
        if($request->skill){
            $cvform->skill = json_encode($request->skill);
            $cvform->dateee=date('Y-m-d');
        }
        $cvform->save();
        return $id;
    }
    public function refinfo(Request $request){
        $id = $request->userid;
        $cvform = Cvform::where('userid','=',$id)->first();
        if($request->reference){
            $cvform->reference = json_encode($request->reference);
            $cvform->dateee=date('Y-m-d');
        }
        $cvform->save();
        return $id;
    }
    public function yourcvstore(Request $request){
        //return $request->all();
        $image = $request->file('cv');
        $new_name =time().'.'.$image->getClientOriginalExtension();
        $image->move('careerfile/',$new_name);
        $cvform  = new Cvform();
        $cvform->userid = $request->userid;
        $cvform->name = $request->name;
        $cvform->birthdate = $request->birthdate;
        $cvform->paddress = $request->paddress;
        $cvform->haddress = $request->haddress;
        $cvform->mobile = $request->mobile;
        $cvform->email = $request->email;
        $cvform->interest = $request->interest;
        $cvform->objective = $request->objective;
        $cvform->l_degree = $request->l_degree;
        $cvform->l_score = $request->l_score;
        $cvform->cv ='careerfile/'.$new_name;
        $birthDate = $request->birthdate;
        //explode the date to get month, day and year
        $birthDate = explode("-", $birthDate);
        //get age from date or birthdate
        $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md")
            ? ((date("Y") - $birthDate[0]) - 1)
            : (date("Y") - $birthDate[0]));
        //return "Age is:" . $age;
        $cvform->age=$age;
        $cvform->area=$request->area;
        $cvform->gender=$request->gender;
        $cvform->dateee=date('Y-m-d');
         $cvform->marital_status=$request->marital_status;
          $cvform->nid=$request->nid;

        if($request->academic){
            $cvform->academic = json_encode($request->academic);
        }
        if($request->experience){
            $cvform->experience =json_encode($request->experience);
        }
        if($request->project){
            $cvform->project =json_encode($request->project);
        }
        if($request->achievement){
            $cvform->achievement = json_encode($request->achievement);
        }
        if($request->skill){
            $cvform->skill = json_encode($request->skill);
        }if($request->reference){
            $cvform->reference = json_encode($request->reference);
        }
        $cvform->save();
        $image = $request->file('image');
        $new_name_image =time().'.'.$image->getClientOriginalExtension();
        $image->move('careerfile/',$new_name_image);
        
        $user = User::find($request->userid);
        $user->image = 'careerfile/'.$new_name_image;
        $user->save();
        
        $notification = array(
            'message' => 'Your Cv has submitted successfully', 
            'alert-type' => 'success'
        );
        
        return redirect('/home')->with($notification);
    }
    public function usercv(){
        return response()->json('redirect');
    }
    public function applyhistory(Request $request){
        $id  = $request->id;
        $applicantByjobid = DB::table('users')
                             ->select('users.id','jobapplieds.job_id as jobid','careers.title','careers.company','careers.deadline','jobapplieds.applied_time')
                             ->LeftJoin('jobapplieds','users.id','=','jobapplieds.applicant_id')
                             ->LeftJoin('careers','careers.id','=','jobapplieds.job_id')
                             ->where('jobapplieds.applicant_id','=',$id)
                             ->get();
        $numberofJob = Jobapplied::where('applicant_id',$id)->get();
        return view('Backend.application.appliedhistory',compact('applicantByjobid','numberofJob'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
