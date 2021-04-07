<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Servicehead;
use App\Servetop;
use App\Headhunting;
use App\Healthscreening;
use App\Manpoweroutsourcing;
use App\Medicalmrk;
use App\Payrollmng;
use App\Remng;
use App\Servicecall;
use App\Trainingdev;
use App\Asscenter;
use App\Allservices;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data=[]; 
        $data['servicehead'] = Servicehead::find(1);
        $data['servicetop'] = Servetop::find(1);
        $data['hunting'] = Headhunting::find(1);
        $data['manpower'] = Manpoweroutsourcing::find(1);
        $data['payroll'] = Payrollmng::find(1);
        $data['medical'] = Medicalmrk::find(1);
        $data['asses'] = Asscenter::find(1);
        $data['recruit'] = Remng::find(1);
        $data['training'] = Trainingdev::find(1);
        $data['health'] = Healthscreening::find(1);
        $data['scall'] = Servicecall::find(1);
        $data['allservices']=Allservices::all();

        return view('Frontend.service',compact('data'));
    }

    public function detailservice(Request $request){
         $id = $request->id;
        // return $id;
        $data=[]; 
        $data['servicehead'] = Servicehead::find(1);
        $data['servicetop'] = Servetop::find(1);
        $data['detailservice'] = Allservices::findorfail($id);
        return view('Frontend.detailservice',compact('data'));

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
