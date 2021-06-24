<?php

namespace App\Http\Controllers;

use App\Career;
use App\Careercat;
use App\Exam;
use Carbon\CarbonTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
Use \Carbon\Carbon;

class ExamController extends Controller
{
    public function examView(Request $request){
        $jobs = Career::all();
        $cat_id = $request->id;
        $filterExam = Exam::where('careercat_id',$cat_id)->get();
        $examlists = Exam::with('getCareer')->get();
        return view('Backend.exams.exams',compact('jobs','examlists','filterExam'));
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'careercat_id'=>'required',
            'exam_name'=>'required',
            'vanue'=>'required',
            'vanue'=>'required',
            'exam_date'=>'required',
        ]);
        if(!$validator->passes()){
            return response()->json(['status'=> 0,'error'=>$validator->errors()->toArray()]);
        }else{
            $exm= new Exam();
            $exm->job_id = $request->job_id;
            $exm->careercat_id = $request->careercat_id;
            $exm->job_name = $request->job_name;
            $exm->exam_name = $request->exam_name;
            $exm->vanue = $request->vanue;
            $exm->designation = $request->designation;
            $exm->exam_date = $request->exam_date;
            $exm->post_date = Carbon::now();
            $exm->active = 1;
            $exm->save();
            return response()->json($exm);

        }
    }
    public function edit(Request $request){

        $data=Exam::where('exam_id',$request->id)->first();

        if($data){
          return response()->json([
              'success' => true,
              'data' => $data
            ]);
        }
        else{
          return response()->json([
              'success' => false,
              'data' => 'Job Info Not found'
            ]);
        }
    }

    public function examPopup(Request $request){
        $data=Exam::where('exam_id',$request->id)->first();
        if($data){
          return response()->json([
              'success' => true,
              'data' => $data
            ]);
        }
        else{
          return response()->json([
              'success' => false,
              'data' => 'No data found'
            ]);
        }
    }
    public function updateExam(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'careercat_id'=>'required',
            'exam_name'=>'required',
            'vanue'=>'required',
            'vanue'=>'required',
            'exam_date'=>'required',
        ]);
        if(!$validator->passes()){
            return response()->json(['status'=> 0,'error'=>$validator->errors()->toArray()]);
        }else{
            $exm = Exam::find($request->category_id);
            $exm->job_id = $request->job_id;
            $exm->careercat_id = $request->careercat_id;
            $exm->exam_name = $request->exam_name;
            $exm->vanue = $request->vanue;
            $exm->designation = $request->designation;
            $exm->exam_date = $request->exam_date;
            if($exm->save()){
                return response()->json(['success'=>true,'data'=>$exm]);
            }
        }

    }


    public function destroy(Request $request){
        $exam = Exam::find($request->id);
        if($exam->delete()){
            return response()->json($exam);
        }
    }

    public function jobToCat(Request $request){
        $data=Career::where('id',$request->id)->first();
        if($data){
          return response()->json([
              'success' => true,
              'data' => $data
            ]);
        }
        else{
          return response()->json([
              'success' => false,
              'data' => 'Job Info Not found'
            ]);
        }

    }

    public function jobToCat2(Request $request){
        $data=Career::where('id',$request->id)->first();
        if($data){
          return response()->json([
              'success' => true,
              'data' => $data
            ]);
        }
        else{
          return response()->json([
              'success' => false,
              'data' => 'Job Info Not found'
            ]);
        }

    }
}
