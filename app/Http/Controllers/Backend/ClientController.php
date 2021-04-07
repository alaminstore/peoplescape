<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Clienthead;
use App\Clienttop;
use App\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $data = [];
        $data['clienthead'] = Clienthead::find(1);
        $data['clienttop'] = Clienttop::find(1);
        $data['clients']  = Client::all();
        return view('Backend.client.client',compact('data'));

    }
    public function clientheadupdate(Request $request){
        if($request->file('image')){
            $find_image = Clienthead::find($request->id);
            $old_img = $find_image->image;
            if($old_img){
                unlink($old_img);
            }
        $image = $request->file('image');
        $new_name = time() . '.' . $image->getClientOriginalExtension();
        $image->move('psimage/', $new_name);
        $sliderbtm = Clienthead::find($request->id);
        $sliderbtm->title = $request->title;
        $sliderbtm->image = 'psimage/'.$new_name;
        $sliderbtm->save();
        return response()->json($sliderbtm);
        }else{
        $sliderbtm = Clienthead::find($request->id);
        $sliderbtm->title = $request->title;
        $sliderbtm->save();
        return response()->json($sliderbtm);
        }
    }
    public function clienttopupdate(Request $request){
        $servetop = Clienttop::find(1);
        $servetop->title = $request->title;
        $servetop->description = $request->description;
        $servetop->save();
        return response()->json($servetop);

    }
    public function ourclientstore(Request $request){

            $image = $request->file('image');
            $new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('psimage/', $new_name);
            $sliderbtm =new Client();
            $sliderbtm->image = 'psimage/'.$new_name;
            $sliderbtm->url = $request->url;
            $sliderbtm->save();
            return response()->json($sliderbtm);
    }
    public function ourclientedit(Request $request){
        $id = $request->id;
        $client = Client::find($id);
        return response()->json($client);

    }
    public function ourclientupdate(Request $request){
        if( $request->file('image')){
            $sliderbtm = Client::find($request->id);
            $old_img = $sliderbtm->image;
            if($old_img){
                unlink($old_img);
            }
            $image = $request->file('image');
            $new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('psimage/', $new_name);
           
            $sliderbtm->image = 'psimage/'.$new_name;
            $sliderbtm->url = $request->url;
            $sliderbtm->save();
            return response()->json($sliderbtm);
        }else{
            $sliderbtm = Client::find($request->id);
            $sliderbtm->url = $request->url;
            $sliderbtm->save();
            return response()->json($sliderbtm);
        }
           
    }
    public function ourclientdelete(Request $request){
        $id = $request->id;
        $team = Client::find($id);
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
