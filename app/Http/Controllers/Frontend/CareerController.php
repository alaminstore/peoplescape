<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Careercat;
use App\Career;
use App\Cvform;
use PDF;
use App\Careerhead;
use App\Aboutcall2;
use App\Jobapplied;
use DB;
class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobDetail = DB::table('careers')
                     ->select('careers.*','careercats.title as catname')
                     ->leftJoin('careercats','careers.catid','=','careercats.id')
                     ->where('careers.status',1)
                     ->where('careers.comstatus','running')
                     ->paginate(2);
        $data['careerhead'] = Careerhead::find(1);
        return view('Frontend.career',\compact('jobDetail','data'));
    }
    public function careerdetails(Request $request){
     $id = $request->id;
     $careerByid = DB::table('careers')
                ->select('careers.*','careercats.title as catname')
                ->select('careers.*','careercats.title as catname','careercats.id as catid')
                ->leftJoin('careercats','careers.catid','=','careercats.id')
                ->where('careers.id','=',$id)
                ->first();
     $catid = $careerByid->catid;
    $categoryWisecareer = DB::table('careers')
                        ->select('careers.*','careercats.title as catname')
                        ->select('careers.*','careercats.title as catname')
                        ->leftJoin('careercats','careers.catid','=','careercats.id')
                        ->where('careers.catid','=',$catid)
                        ->where('careers.id','!=',$id)
                        ->get();
     $callact= Aboutcall2::find(1);
     return view('Frontend.singlecareer',compact('careerByid','callact','categoryWisecareer'));
    }
        public function applybyapplicant(Request $request){

        $userid = $request->userid;
        $jobid = $request->jobid;
        $findApplieduserbyid = Jobapplied::where('applicant_id','=', $userid)->where('job_id','=',$jobid)->first();
        if($findApplieduserbyid){
            return response()->json('warning');
        }else{

            $appliedJob = new Jobapplied();
            $appliedJob->job_id = $jobid;
            $appliedJob->applicant_id =$userid;
            $appliedJob->applied_time = date('Y-m-d');
            $appliedJob->pdf = $userid.'.pdf';
            $appliedJob->save();
            $careerInfoByid = Cvform::where('userid','=',$userid)->first();
            view()->share('careerInfoByid',$careerInfoByid);
           $pdf = PDF::loadView('download');
           $pdf->setOptions(['isPhpEnabled' => true,'isRemoteEnabled' => true]);
           $filename = $userid.".pdf";
           $pdf->save('careerfile/'.$filename);
            return response()->json('success');
        }

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
