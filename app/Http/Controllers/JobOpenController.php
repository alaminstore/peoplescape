<?php

namespace App\Http\Controllers;

use App\Careercat;
use App\Careerhead;
use App\Jobnature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class JobOpenController extends Controller
{
    public function index(){
        $data = [];
        $data['cat'] = Careercat::all();
         $data['job'] =  DB::select(DB::raw("SELECT careers.*,COUNT(DISTINCT jobapplieds.applicant_id) AS totalapplicant,COUNT(DISTINCT shortlisteds.user_id) AS totalshortlisted
                        FROM careers
                        LEFT JOIN jobapplieds ON careers.id = jobapplieds.job_id
                        LEFT JOIN shortlisteds ON careers.id = shortlisteds.job_id
                        GROUP BY careers.id"));
        $data['careerhead'] = Careerhead::find(1);
        $data['jobnature'] = Jobnature::all();
        return view('Backend.career.job_open',compact('data'));
    }
}
