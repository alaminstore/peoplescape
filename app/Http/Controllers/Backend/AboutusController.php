<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Abouthead;
use App\Aboutchoose;
use App\Aboutcall1;
use App\Aboutcall2;
use App\Advantage;
use App\Success;
use App\Ourmission;
use App\Ourvision;


class AboutusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $data = [];
        $data['abouthead']= Abouthead::find(1);
        $data['choose']= Aboutchoose::find(1);
        $data['call1']= Aboutcall1::find(1);
        $data['call2']= Aboutcall2::find(1);
        $data['advantage'] =Advantage ::find(1);
        $data['success'] =Success ::find(1);
        $data['mission'] = Ourmission ::find(1);
        $data['vision'] = Ourvision ::find(1);

        return view('Backend.aboutus.aboutus',compact('data'));
    }
    public function aboutheadupdate(Request $request){
        if($request->file('image')){
            $find_image = Abouthead::find($request->id);
            $old_img = $find_image->image;
            if($old_img){
                unlink($old_img);
            }
        $image = $request->file('image');
        $new_name = time(). '.' . $image->getClientOriginalExtension();
        $image->move('psimage/',$new_name);
        $sliderbtm = Abouthead::find($request->id);
        $sliderbtm->title = $request->title;
        $sliderbtm->image = 'psimage/'.$new_name;
        $sliderbtm->save();
        return response()->json($sliderbtm);
        }else{
        $sliderbtm = Abouthead::find($request->id);
        $sliderbtm->title = $request->title;
        $sliderbtm->save();
        return response()->json($sliderbtm);
        }
    }
    public function chooseupdate(Request $request){
        if($request->file('image')){
            $find_image = Aboutchoose::find($request->id);
            $old_img = $find_image->image;
            if($old_img){
                unlink($old_img);
            }
        $image = $request->file('image');
        $new_name = time(). '.' . $image->getClientOriginalExtension();
        $image->move('psimage/', $new_name);
        $sliderbtm = Aboutchoose::find($request->id);
        $sliderbtm->title = $request->title;
        $sliderbtm->description = $request->description;
        $sliderbtm->image = 'psimage/'.$new_name;
        $sliderbtm->save();
        return response()->json($sliderbtm);
        }else{
        $sliderbtm = Aboutchoose::find($request->id);
        $sliderbtm->title = $request->title;
        $sliderbtm->description = $request->description;
        $sliderbtm->save();
        return response()->json($sliderbtm);
        }
    }
    public function call1update(Request $request){
        $call = Aboutcall1::find(1);
        $call->description = $request->description;
        $call->save();
        return response()->json($call);
    }
    public function call2update(Request $request){
        $call = Aboutcall2::find(1);
        $call->description = $request->description;
        $call->save();
        return response()->json($call);
    }
    public function advantageupdate(Request $request){
        if($request->file('image')){
              $find_image = Advantage::find($request->id);
            $old_img = $find_image->image;
            if($old_img){
                unlink($old_img);
            }
             $find_image->delete();
            $image = $request->file('image');
            $new_name = time(). '.' . $image->getClientOriginalExtension();
            $image->move('psimage/',$new_name);
            $data = new Advantage();
            $data->title = $request->title;
            $data->id = 1;
            $all_des = json_encode($request->program);
            $data->description = $all_des;
            $data->image = 'psimage/'.$new_name;
            $data->save();
            return response()->json($data);
        }else{
        $data =  Advantage::find(1);
        $data->title = $request->title;
        $data->id = 1;
        $all_des = json_encode($request->program);
        $data->description = $all_des;
        $data->save();
        return response()->json($data);
        }
        
     }
     public function successupdate(Request $request){
        if($request->file('image')){
              $find_image = Success::find($request->id);
            $old_img = $find_image->image;
            if($old_img){
                unlink($old_img);
            }
            $find_image->delete();
            $image = $request->file('image');
            $new_name = time(). '.' . $image->getClientOriginalExtension();
            $image->move('psimage/', $new_name);
            $data = new Success();
            $data->title = $request->title;
            $data->id = 1;
            $all_des = json_encode($request->program);
            $data->description = $all_des;
            $data->image = 'psimage/'.$new_name;
            $data->save();
            return response()->json($data);
        }else{
        $data =  Success::find(1);
        $data->title = $request->title;
        $data->id = 1;
        $all_des = json_encode($request->program);
        $data->description = $all_des;
        $data->save();
        return response()->json($data);
        }
        
     }
     public function missionupdate(Request $request){
         $id = $request->id;
        $mission = Ourmission::find($id);
        $mission->title = $request->title;
        $mission->description = $request->description;
        $mission->save();
        return response()->json($mission);
     }
     public function visionupdate(Request $request){
        $id = $request->id;
        $vision = Ourvision::find($id);
        $vision->title = $request->title;
        $vision->description = $request->description;
        $vision->save();
        return response()->json($vision);
         
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
