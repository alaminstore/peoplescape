<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Gallery;

class GaleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $allPhotoes = Gallery::orderBy('sort','asc')->get();
        return view('Backend.galery.galery',compact('allPhotoes'));
    }

    public function galeryedit(Request $request){
        $id = $request->id;
        $galary = Gallery::find($id);
        return response()->json($galary);
    }

    public function galeryupdate(Request $request){
        if($request->file('image')){
            $find_image = Gallery::find($request->id);
            $old_img = $find_image->image;
            if($old_img){
                unlink($old_img);
            }
            $image = $request->file('image');
            $new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('psimage/', $new_name);
            $slider = Gallery::find($request->id);
            $slider->caption = $request->caption;
            $slider->image = 'psimage/'.$new_name;
            $slider->save();
            return response()->json($slider);
        }else{
          
        $slider = Gallery::find($request->id);
        $slider->caption = $request->caption;
        $slider->save();
        return response()->json($slider);
        }
    }
    public function galerydelete(Request $request)
    {   
        $id = $request->id;
        $delete_sliderimg = Gallery::find($id);
        $unlink_img = $delete_sliderimg->image;
        $delete_sliderimg->delete();
        unlink($unlink_img);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('image');
        $new_name = time() . '.' . $image->getClientOriginalExtension();
        $image->move('psimage/', $new_name);
        $slider = new Gallery();
        $slider->caption = $request->caption;
        $slider->image = 'psimage/'.$new_name;
        $slider->save();
        return response()->json($slider);
    }
    public function serialupdate(Request $request){
      
        $data = $request->get('imageids');
        $position= 1;
        foreach($data as $neworder){
            $galary = Gallery::find($neworder);
            $galary->sort = $position; 
            $galary->save();
            $position++;
        }
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
