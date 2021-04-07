<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Recognitionhead;
use App\Recognition;
class RecognitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=[];
        $data['recoghead'] = Recognitionhead::find(1);
        $data['recog'] = Recognition::all();
        return view('Backend.recognition.recognition',compact('data'));

    }
    
    public function recogheadstore(Request $request){
        if($request->file('image')){
            $find_image = Recognitionhead::find($request->id);
            $old_img = $find_image->image;
            if($old_img){
                unlink($old_img);
            }
        $image = $request->file('image');
        $new_name = time() . '.' . $image->getClientOriginalExtension();
        $image->move('psimage/', $new_name);
        $sliderbtm = Recognitionhead::find($request->id);
        $sliderbtm->title = $request->title;
        $sliderbtm->image = 'psimage/'.$new_name;
        $sliderbtm->save();
        return response()->json($sliderbtm);
        }else{
        $sliderbtm = Recognitionhead::find($request->id);
        $sliderbtm->title = $request->title;
        $sliderbtm->save();
        return response()->json($sliderbtm);
        }
    }

    public function recogstore(Request $request){

        $image = $request->file('image');
        $new_name = time() . '.' . $image->getClientOriginalExtension();
        $image->move('psimage/', $new_name);
        $sliderbtm =new Recognition();
        $sliderbtm->image = 'psimage/'.$new_name;
        $sliderbtm->title = $request->title;
        $sliderbtm->description = $request->description;
        $sliderbtm->save();
        return response()->json($sliderbtm);
}
public function recogedit(Request $request){
    $id = $request->id;
    $client = Recognition::find($id);
    return response()->json($client);

}
public function recogupdate(Request $request){
    if($request->file('image')){
        $image = $request->file('image');
        $new_name = time() . '.' . $image->getClientOriginalExtension();
        $image->move('psimage/',$new_name);
        $sliderbtm = Recognition::find($request->id);
        $sliderbtm->image = 'psimage/'.$new_name;
        $sliderbtm->title = $request->title;
        $sliderbtm->description = $request->description;
        $sliderbtm->save();
        return response()->json($sliderbtm);
    }else{
        $sliderbtm = Recognition::find($request->id);
        $sliderbtm->title = $request->title;
        $sliderbtm->description = $request->description;
        $sliderbtm->save();
        return response()->json($sliderbtm);
    }
       
}
public function recogdelete(Request $request){
    $id = $request->id;
    $team = Recognition::find($id);
    $unlink_img = $team->image;
    $team->delete();
    unlink($unlink_img);
    return response()->json('deelted');
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
