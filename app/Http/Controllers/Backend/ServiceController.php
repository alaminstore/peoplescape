<?php

namespace App\Http\Controllers\Backend;

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
        $servicehead = Servicehead::find(1);
        $servetop = Servetop::find(1);
        $data['hunting'] = Headhunting::find(1);
        $data['manpower'] = Manpoweroutsourcing::find(1);
        $data['payroll'] = Payrollmng::find(1);
        $data['medical'] = Medicalmrk::find(1);
        $data['asses'] = Asscenter::find(1);
        $data['recruit'] = Remng::find(1);
        $data['training'] = Trainingdev::find(1);
        $data['health'] = Healthscreening::find(1);
        $data['scall'] = Servicecall::find(1);

        return view('Backend.Service.service',compact('servicehead','servetop','data'));
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
        if($request->file('image')){
            $find_image = Servicehead::find($request->id);
            $old_img = $find_image->image;
            if($old_img){
                unlink($old_img);
            }
        $image = $request->file('image');
        $new_name = time() . '.' . $image->getClientOriginalExtension();
        $image->move('psimage/', $new_name);
        $sliderbtm = Servicehead::find($request->id);
        $sliderbtm->title = $request->title;
        $sliderbtm->image = 'psimage/'.$new_name;
        $sliderbtm->save();
        return response()->json($sliderbtm);
        }else{
        $sliderbtm = Servicehead::find($request->id);
        $sliderbtm->title = $request->title;
        $sliderbtm->save();
        return response()->json($sliderbtm);
        }
    }
    public function servetopupdate(Request $request){
        $servetop = Servetop::find(1);
        $servetop->title = $request->title;
        $servetop->description = $request->description;
        $servetop->save();
        return response()->json($servetop);

    }

    public function huntingupdate(Request $request)
    {
        if($request->file('image')){
            $find_image = Headhunting::find($request->id);
            $old_img = $find_image->image;
            if($old_img){
                unlink($old_img);
            }
        $image = $request->file('image');
        $new_name = time() . '.' . $image->getClientOriginalExtension();
        $image->move('psimage/', $new_name);
        $hunting = Headhunting::find($request->id);
        $hunting->title = $request->title;
        $hunting->description = $request->description;
        $hunting->image = 'psimage/'.$new_name;
        $hunting->save();
        return response()->json($hunting);
        }else{
        $hunting = Headhunting::find($request->id);
        $hunting->title = $request->title;
        $hunting->description = $request->description;
        $hunting->save();
        return response()->json($hunting);
        }
    }
    public function manpowerupdate(Request $request)
    {
        if($request->file('image')){
            $find_image = Manpoweroutsourcing::find($request->id);
            $old_img = $find_image->image;
            if($old_img){
                unlink($old_img);
            }
        $image = $request->file('image');
        $new_name = time() . '.' . $image->getClientOriginalExtension();
        $image->move('psimage/', $new_name);
        $hunting = Manpoweroutsourcing::find($request->id);
        $hunting->title = $request->title;
        $hunting->description = $request->description;
        $hunting->image = 'psimage/'.$new_name;
        $hunting->save();
        return response()->json($hunting);
        }else{
        $hunting = Manpoweroutsourcing::find($request->id);
        $hunting->title = $request->title;
        $hunting->description = $request->description;
        $hunting->save();
        return response()->json($hunting);
        }
    }
    public function payrollupdate(Request $request)
    {
        if($request->file('image')){
            $find_image = Payrollmng::find($request->id);
            $old_img = $find_image->image;
            if($old_img){
                unlink($old_img);
            }
        $image = $request->file('image');
        $new_name = time() . '.' . $image->getClientOriginalExtension();
        $image->move('psimage/', $new_name);
        $hunting = Payrollmng::find($request->id);
        $hunting->title = $request->title;
        $hunting->description = $request->description;
        $hunting->image = 'psimage/'.$new_name;
        $hunting->save();
        return response()->json($hunting);
        }else{
        $hunting = Payrollmng::find($request->id);
        $hunting->title = $request->title;
        $hunting->description = $request->description;
        $hunting->save();
        return response()->json($hunting);
        }
    }
    public function medicalupdate(Request $request)
    {
        if($request->file('image')){
            $find_image = Medicalmrk::find($request->id);
            $old_img = $find_image->image;
            if($old_img){
                unlink($old_img);
            }
        $image = $request->file('image');
        $new_name = time() . '.' . $image->getClientOriginalExtension();
        $image->move('psimage/', $new_name);
        $hunting = Medicalmrk::find($request->id);
        $hunting->title = $request->title;
        $hunting->description = $request->description;
        $hunting->image = 'psimage/'.$new_name;
        $hunting->save();
        return response()->json($hunting);
        }else{
        $hunting = Medicalmrk::find($request->id);
        $hunting->title = $request->title;
        $hunting->description = $request->description;
        $hunting->save();
        return response()->json($hunting);
        }
    }
    public function assesupdate(Request $request)
    {
        if($request->file('image')){
            $find_image = Asscenter::find($request->id);
            $old_img = $find_image->image;
            if($old_img){
                unlink($old_img);
            }
        $image = $request->file('image');
        $new_name = time() . '.' . $image->getClientOriginalExtension();
        $image->move('psimage/', $new_name);
        $hunting = Asscenter::find($request->id);
        $hunting->title = $request->title;
        $hunting->description = $request->description;
        $hunting->image = 'psimage/'.$new_name;
        $hunting->save();
        return response()->json($hunting);
        }else{
        $hunting = Asscenter::find($request->id);
        $hunting->title = $request->title;
        $hunting->description = $request->description;
        $hunting->save();
        return response()->json($hunting);
        }
    }
    public function recruitupdate(Request $request)
    {
        if($request->file('image')){
            $find_image = Remng::find($request->id);
            $old_img = $find_image->image;
            if($old_img){
                unlink($old_img);
            }
        $image = $request->file('image');
        $new_name = time() . '.' . $image->getClientOriginalExtension();
        $image->move('psimage/', $new_name);
        $hunting = Remng::find($request->id);
        $hunting->title = $request->title;
        $hunting->description = $request->description;
        $hunting->image = 'psimage/'.$new_name;
        $hunting->save();
        return response()->json($hunting);
        }else{
        $hunting = Remng::find($request->id);
        $hunting->title = $request->title;
        $hunting->description = $request->description;
        $hunting->save();
        return response()->json($hunting);
        }
    }
    public function trainingupdate(Request $request)
    {
        if($request->file('image')){
            $find_image = Trainingdev::find($request->id);
            $old_img = $find_image->image;
            if($old_img){
                unlink($old_img);
            }
        $image = $request->file('image');
        $new_name = time() . '.' . $image->getClientOriginalExtension();
        $image->move('psimage/', $new_name);
        $hunting = Trainingdev::find($request->id);
        $hunting->title = $request->title;
        $hunting->description = $request->description;
        $hunting->image = 'psimage/'.$new_name;
        $hunting->save();
        return response()->json($hunting);
        }else{
        $hunting = Trainingdev::find($request->id);
        $hunting->title = $request->title;
        $hunting->description = $request->description;
        $hunting->save();
        return response()->json($hunting);
        }
    }
    public function healthupdate(Request $request)
    {
        if($request->file('image')){
            $find_image = Healthscreening::find($request->id);
            $old_img = $find_image->image;
            if($old_img){
                unlink($old_img);
            }
        $image = $request->file('image');
        $new_name = time() . '.' . $image->getClientOriginalExtension();
        $image->move('psimage/', $new_name);
        $hunting = Healthscreening::find($request->id);
        $hunting->title = $request->title;
        $hunting->description = $request->description;
        $hunting->image = 'psimage/'.$new_name;
        $hunting->save();
        return response()->json($hunting);
        }else{
        $hunting = Healthscreening::find($request->id);
        $hunting->title = $request->title;
        $hunting->description = $request->description;
        $hunting->save();
        return response()->json($hunting);
        }
    }
    public function scallupdate(Request $request)
    {
        $call = Servicecall::find(1);
        $call->description = $request->description;
        $call->save();
        return response()->json($call);
        
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
