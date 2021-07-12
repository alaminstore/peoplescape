<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\InvitationMail;
use Illuminate\Support\Facades\Mail;
use App\Careercat;
use App\Career;
use App\Careerhead;
use App\Shortlisted;
use App\Jobapplied;
use App\Jobnature;
use App\Cvform;
use App\Degree;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Zipper;
class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['cat'] = Careercat::all();
        //$data['job'] = Career::all();
         $data['job'] =  DB::select(DB::raw("SELECT careers.*,COUNT(DISTINCT jobapplieds.applicant_id) AS totalapplicant,COUNT(DISTINCT shortlisteds.user_id) AS totalshortlisted
                        FROM careers
                        LEFT JOIN jobapplieds ON careers.id = jobapplieds.job_id
                        LEFT JOIN shortlisteds ON careers.id = shortlisteds.job_id
                        GROUP BY careers.id"));
        $data['careerhead'] = Careerhead::find(1);
        $data['jobnature'] = Jobnature::all();
        return view('Backend.career.career',compact('data'));
    }
    public function joblist(){
        $data = [];
        $data['cat'] = Careercat::all();
        //$data['job'] = Career::all();
         $data['job'] =  DB::select(DB::raw("SELECT careers.*,COUNT(DISTINCT jobapplieds.applicant_id) AS totalapplicant,COUNT(DISTINCT shortlisteds.user_id) AS totalshortlisted
                        FROM careers
                        LEFT JOIN jobapplieds ON careers.id = jobapplieds.job_id
                        LEFT JOIN shortlisteds ON careers.id = shortlisteds.job_id
                        GROUP BY careers.id"));
        // return $data['job'];

        $data['careerhead'] = Careerhead::find(1);
        return view('Backend.career.joblist',compact('data'));
    }
    public function careerheadupdate(Request $request){
        $id = $request->id;
        $careerHead = Careerhead::find($id);
        if($request->file('image')){
            $find_image = Careerhead::find($id);
            $old_img = $find_image->image;
            if($old_img){
                unlink($old_img);
            }
        $image = $request->file('image');
        $new_name =time().'.'.$image->getClientOriginalExtension();
        $image->move('psimage/',$new_name);
        $careerHead = Careerhead::find($id);
        $careerHead->title = $request->title;
        $careerHead->image ='psimage/'.$new_name;
        $careerHead->save();
        return response()->json($careerHead);
        }else{
        $careerHead = Careerhead::find($request->id);
        $careerHead->title = $request->title;
        $careerHead->save();
        return response()->json($careerHead);
        }
    }
    public function careercatstore(Request $request){

        $careerCat = new Careercat();
        $careerCat->title = $request->title;
        $careerCat->save();
        return response()->json($careerCat);
    }

    public function careercatedit(Request $request){
        $id = $request->id;
        $careerCat = Careercat::find($id);
        return response()->json($careerCat);
    }
    public function careercatupdate(Request $request){
        $id = $request->id;
        $careerCat = Careercat::find($id);
        $careerCat->title = $request->title;
        $careerCat->save();
        return response()->json($careerCat);
    }
    public function careercatdelete(Request $request){
        $id = $request->id;
        $careerCat = Careercat::find($id);
        $careerCat->delete();
        return response()->json('deleted');
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
        $validator = Validator::make($request->all(),[
            'title' => 'required | string | max: 200  | unique:careers',
            'short_code' => 'required | string | max:20 | unique:careers',
            'admit_or_invitation' => 'required',
            'company' => 'required',
            'experience' => 'required',
            'vacancy' => 'required',
            'education' => 'required',
            'jobtype' => 'required',
            'deadline' => 'required',
            'location' => 'required',
            'salary' => 'required',
            'catid' => 'required',
            'topdescription' => 'required',


        ]);
        if(!$validator->passes()){
            return response()->json(['status'=> 0,'error'=>$validator->errors()->toArray()]);
        }else{
            $career = new Career();
            $career->title = $request->title;
            $career->short_code = $request->short_code;
            $career->admit_or_invitation = $request->admit_or_invitation;
            $career->company = $request->company;
            $career->experience = $request->experience;
            $career->vacancy = $request->vacancy;
            $career->education = $request->education;
            $career->jobtype = $request->jobtype;
            $career->deadline = $request->deadline;
            $career->location = $request->location;
            $career->salary = $request->salary;
            $career->catid = $request->catid;
            $career->posteddate = date('d/m/Y');
            $career->topdescription = $request->topdescription;
            $career->howtoapply = $request->howtoapply;
            $career->responsibilitiestext = $request->responsibilitiestext;
            if($request->program){
                $career->responsibilitiespoint = json_encode($request->program);
            }
            if($request->qualification){
                $career->qualification = json_encode($request->qualification);
            }
             $career->save();
             return response()->json($career);
        }
    }
    public function careeredit(Request $request){
     $id = $request->id;
     $data['careerbyid']  = Career::find($id);
     $data['cat'] = Careercat::all();
      $data['jobnature'] = Jobnature::all();
     return view('Backend.career.editcareer',compact('data'));

    }
    public function careerupdate(Request $request){

        $validator = Validator::make($request->all(),[

            'title' => 'unique:careers,title,'.$request->id,
            'short_code' => 'unique:careers,short_code,'.$request->id,
            'admit_or_invitation' => 'required',
            'company' => 'required',
            'experience' => 'required',
            'vacancy' => 'required',
            'education' => 'required',
            'jobtype' => 'required',
            'deadline' => 'required',
            'location' => 'required',
            'salary' => 'required',
            'catid' => 'required',
            'topdescription' => 'required',


        ]);
        if(!$validator->passes()){
            return response()->json(['status'=> 0,'error'=>$validator->errors()->toArray()]);
        }else{
            $career = Career::find($request->id);
            $career->title = $request->title;
            $career->short_code = $request->short_code;
            $career->admit_or_invitation = $request->admit_or_invitation;
            $career->company = $request->company;
            $career->experience = $request->experience;
            $career->vacancy = $request->vacancy;
            $career->education = $request->education;
            $career->jobtype = $request->jobtype;
            $career->deadline = $request->deadline;
            $career->location = $request->location;
            $career->salary = $request->salary;
            $career->catid = $request->catid;
            $career->topdescription = $request->topdescription;
            $career->howtoapply = $request->howtoapply;
            $career->responsibilitiestext = $request->responsibilitiestext;
            if($request->program){
                $career->responsibilitiespoint = json_encode($request->program);
            }
            if($request->qualification){
                $career->qualification = json_encode($request->qualification);
            }

            // return redirect()->route('careerop.index');
            if($career->save()){
                return response()->json(['status'=>true]);
            }

        }
    }
    public function careerdelete(Request $request){
     $id = $request->id;
     $careerByid  = Career::find($id);
     $careerByid->delete();
    }

    public function detailsjob(Request $request){
        $id = $request->id;
        $data['careerbyid']  = Career::find($id);
        $data['cat'] = Careercat::all();
        return view('Backend.career.detailjob',compact('data','id'));

    }
    public function applicantlist(Request $request){
        $id = $request->id;
        $applicantByjobid = DB::table('users')
                             ->select('users.name','users.email','users.mobile','users.id','cvforms.id as cvid','cvforms.gender','cvforms.age','cvforms.experience','cvforms.academic','jobapplieds.job_id as jobid')
                             ->LeftJoin('jobapplieds','users.id','=','jobapplieds.applicant_id')
                             ->LeftJoin('cvforms','users.id','=','cvforms.userid')
                             ->where('jobapplieds.job_id','=',$id)
                             ->get();
        $userid=[];
        $leftIn=[];
        $i=0;
        foreach($applicantByjobid as $us){
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
                //    if(array_key_exists('major', $acc)){
                    if(isset($acc->major)){
                      $userid[$i]['major']=$acc->major;
                    }else{
                        $userid[$i]['major']='No Data';
                    }
                //    if(array_key_exists('minor', $acc)){
                    if(isset($acc->minor)){
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
            $userid[$i]['experience']=round(($sum/365),1);
            $userid[$i]['age']=$us->age;
            $userid[$i]['gender']=$us->gender;
        }
         $countApplicant =Jobapplied::where('job_id',$id)->get();
          $degrees = Degree::orderBy('id','desc')->get();
        return view('Backend.career.applicantlist',compact('applicantByjobid','id','countApplicant','degrees','userid'));

    }

    public function shortlistedapplicantlist(Request $request){
        $jobid = $request->id;
        $findShortlistedapplicant = DB::table('users')
                                   ->select('users.name','users.email','users.mobile','users.id','cvforms.gender','cvforms.age','cvforms.experience','cvforms.academic','cvforms.id as cvformsid','shortlisteds.id as shortlistid')
                                   ->LeftJoin('cvforms','cvforms.userid','=','users.id')
                                   ->LeftJoin('shortlisteds','shortlisteds.user_id','users.id')
                                   ->where('shortlisteds.job_id',$jobid)
                                   ->get();
         $userid=[];
        $leftIn=[];
        $i=0;
        foreach($findShortlistedapplicant as $us){
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
                //    if(array_key_exists('major', $acc)){
                    if($acc->major){
                      $userid[$i]['major']=$acc->major;
                    }else{
                        $userid[$i]['major']='No Data';
                    }
                //    if(array_key_exists('minor', $acc)){
                    if($acc->minor){
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
            $userid[$i]['experience']=round(($sum/365),1);
            $userid[$i]['age']=$us->age;
            $userid[$i]['gender']=$us->gender;
        }
         $countsortApplicant = Shortlisted::where('job_id',$jobid)->get();
          $degrees = Degree::orderBy('id','desc')->get();
        return view('Backend.career.shortlistedapplicantlist',compact('findShortlistedapplicant','jobid','countsortApplicant','degrees','userid'));
    }
    public function unsort(Request $request){
      $id = $request->id;
      $findunSortid = Shortlisted::find($id);
      $findunSortid->delete();
      return response()->json('deleted');
    }
    public function singlezip(Request $request){
        $id = $request->id;
        $zipableFile = Jobapplied::where('job_id','=',$id)->get();
          unlink('appliedcv.zip');
        foreach($zipableFile as $article) {
            $files =('careerfile/'.$article->pdf);
              \Zipper::make('appliedcv.zip')->add($files)->close();
            }
            return $response = response()->download('appliedcv.zip');


    }
    public function shortlistedzip(Request $request){
        $id = $request->id;

        $zipper = new \Chumper\Zipper\Zipper;
         $zipableFile = Shortlisted::where('job_id','=',$id)->get();
         unlink('shortappliedcv.zip');
        foreach($zipableFile as $article) {
            $files =('careerfile/'.$article->pdf);
              \Zipper::make('shortappliedcv.zip')->add($files)->close();
            }
            return $response = response()->download('shortappliedcv.zip');
    }
        //11.12.2019
    public function filterApplicant(Request $request, Cvform $user){
  $area=$request->area;
        $age=$request->age;
        if(!empty($age)){
            $ageArray = \explode('-',$age);
        }
        $dateee=$request->dateee;
        $degree=$request->degree;
        $cgpa=$request->cgpa;
        if(!empty($cgpa)){
            $cgpaArray = \explode('-',$cgpa);
        }
        $gender=$request->gender;
        $user = $user->newQuery();
        $appLieduer=Jobapplied::where('job_id',$request->id)->pluck('applicant_id');
        //return $appLieduer;
        if(!empty($area)) {

            $user->whereIn('userid',$appLieduer)->where('area',$area);
        }
        if(!empty($age)) {
            $user->whereIn('userid',$appLieduer)->whereBetween('age',$ageArray);
        }
        if(!empty($dateee)) {
            $user->whereIn('userid',$appLieduer)->where('dateee',$dateee);
        }

       if(!empty($degree)) {
        //$user->whereJsonContains('academic',['H.S.C']);
            $user->whereIn('userid',$appLieduer)->where('academic','like', '%"'.$degree.'"%');
        }
       if(!empty($cgpa)) {
            $user->whereIn('userid',$appLieduer)->whereBetween('cgpa',$cgpaArray);
        }

        if(!empty($gender)) {
            $user->whereIn('userid',$appLieduer)->where('gender',$gender);
        }
        $user=$user->get();
        $userid=[];
        $leftIn=[];
        $i=0;
        foreach($user as $us){
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
                    $userid[$i]['major']=$acc->major;
                    $userid[$i]['minor']=$acc->minor;
                }
                $intitialpyear = strtotime($acc->pyear);
            }
            //$expcount[$us->id] = $sum / 365;
            $appLieduer= Shortlisted::where('job_id',$request->id)->where('user_id',$us->userid)->first();
            if($appLieduer){
                $userid[$i]['status'] = 'sortlisted';
            }else{
                $userid[$i]['status'] = 'unsortlisted';
            }

            $userid[$i]['name']=$us->name;
            $userid[$i]['email']=$us->email;
            $userid[$i]['mobile']=$us->mobile;
            $userid[$i]['userid']=$us->userid;
            $userid[$i]['experience']=round(($sum/365),1);
            $userid[$i]['age']=$us->age;
            $userid[$i]['gender']=$us->gender;
        }
        return response()->json($userid);
    }
        public function filtersortApplicant(Request $request, Cvform $user){
        $area=$request->area;
        $age=$request->age;
        if(!empty($age)){
            $ageArray = \explode('-',$age);
        }
        $dateee=$request->dateee;
        $degree=$request->degree;
        $cgpa=$request->cgpa;
        if(!empty($cgpa)){
            $cgpaArray = \explode('-',$cgpa);
        }
        $gender=$request->gender;
        $user = $user->newQuery();
        $appLieduer= Shortlisted::where('job_id',$request->id)->pluck('user_id');
        //return $appLieduer;
        if(!empty($area)) {

            $user->whereIn('userid',$appLieduer)->where('area',$area);
        }
        if(!empty($age)) {
            $user->whereIn('userid',$appLieduer)->whereBetween('age',$ageArray);
        }
        if(!empty($dateee)) {
            $user->whereIn('userid',$appLieduer)->where('dateee','>=',$dateee);
        }

       if(!empty($degree)) {
            $user->whereIn('userid',$appLieduer)->where('academic','like', '%"'.$degree.'"%');
        }
       if(!empty($cgpa)) {
            $user->whereIn('userid',$appLieduer)->whereBetween('cgpa',$cgpaArray);
        }

        if(!empty($gender)) {
            $user->whereIn('userid',$appLieduer)->where('gender',$gender);
        }

        $user=$user->get();
        $userid=[];
        $leftIn=[];
        $i=0;
        foreach($user as $us){
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
                    $userid[$i]['major']=$acc->major;
                    $userid[$i]['minor']=$acc->minor;
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
        return response()->json($userid);

    }

    public function status(Request $request){
          $findJob = Career::find($request->jobid);
          $findJob->status = $request->id;
          $findJob->save();
          return response()->json($request->jobid);
    }
    public function completestatus(Request $request){
        if($request->sttype=='run'){
          $findJob = Career::find($request->jobid);
            $findJob->comstatus = 'complete';
            $findJob->save();
        }else{
             $findJob = Career::find($request->jobid);
            $findJob->comstatus = 'running';
            $findJob->save();

        }
          //$findJob->status = $request->id;
          //$findJob->save();
          return response()->json($request->sttype);
    }


     public function unshortlistapplicatn(Request $request){

        $shortlistedApplicant = Shortlisted::where('job_id',$request->jobid)->where('user_id',$request->userid)->first();
        $id = $shortlistedApplicant->id;
        $findid = Shortlisted::find($id);
        $findid->delete();
        return response()->json('success');
    }
    public function shortlistapplicatn(Request $request){

        $shortlistedApplicant = new Shortlisted();
        $shortlistedApplicant->job_id = $request->jobid;
        $shortlistedApplicant->user_id = $request->userid;
        $shortlistedApplicant->pdf = $request->userid.'.pdf';
        $shortlistedApplicant->save();
        return response()->json('success');

    }
    public function filteredzip(Request $request){
        $ids = $request->ids;
        unlink('filtered.zip');
        foreach($ids as $id) {
               $orgid = $id.'.pdf';
            $files =('careerfile/'.$orgid);
              \Zipper::make('filtered.zip')->add($files)->close();
            }
            // \Zipper->close();
            return $response = response()->download('filtered.zip');

    }
     public function sortfilteredzip(Request $request){
        $ids = $request->ids;
        unlink('sortfiltered.zip');
        foreach($ids as $id) {
               $orgid = $id.'.pdf';
            $files = ('careerfile/'.$orgid);
              \Zipper::make('sortfiltered.zip')->add($files)->close();
            }
            // \Zipper->close();
            return $response = response()->download('sortfiltered.zip');
    }
    public function filterunsort(Request $request){
        $jobid = $request->jobid;
        $userid = $request->userid;
        $findunSortid = Shortlisted::where('job_id',$jobid)->where('user_id',$userid)->first();
        $deleteitem = Shortlisted::find($findunSortid ->id);
        $deleteitem->delete();
        return response()->json('deleted');
      }

     public function sendBulkmail(Request $request){
        $data = $request->data;
        $emailbody = $request->emailbody;
        Mail::to($data)->queue(new InvitationMail($emailbody));
        return response()->json($data);

     }
         public function jobnaturestore(Request $request){
            $jobNature = new Jobnature();
            $jobNature->nature = $request->nature;
            $jobNature->save();
            return response()->json($jobNature);
        }
        public function jobnatureedit(Request $request){
            $jobNature =  Jobnature::find($request->id);
            return response()->json($jobNature);
        }
        public function jobnaturupdate(Request $request){
            $jobNature =  Jobnature::find($request->id);
            $jobNature->nature = $request->nature;
            $jobNature->save();
            return response()->json($jobNature);
        }
        public function jobnaturdelete(Request $request){
            $jobNature =  Jobnature::find($request->id);
            $jobNature->delete();
            return response()->json('success');
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
