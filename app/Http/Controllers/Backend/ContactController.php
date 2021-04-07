<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contactdet;
use App\Contacthead;
use App\Contact;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $data['contact'] = Contactdet::find(1);
        $data['contacthead'] = Contacthead::find(1);
        $data['msgs'] = Contact::orderBy('id','desc')->get();
       return view('Backend.contact.contact',compact('data'));
    }

    public function contactheadupdate(Request $request){
        $id = $request->id;
        $careerHead = Contacthead::find($id);
        if($request->file('image')){
            $find_image = Contacthead::find($id);
            $old_img = $find_image->image;
            if($old_img){
                unlink($old_img);
            }
        $image = $request->file('image');
        $new_name = time() . '.' . $image->getClientOriginalExtension();
        $image->move('psimage/', $new_name);
        $careerHead = Contacthead::find($id);
        $careerHead->title = $request->title;
        $careerHead->image = 'psimage/'.$new_name;
        $careerHead->save();
        return response()->json($careerHead);
        }else{
        $careerHead = Contacthead::find($request->id);
        $careerHead->title = $request->title;
        $careerHead->save();
        return response()->json($careerHead);
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
       $id = $request->id;
       $contactAddress = Contactdet::find($id);
       $contactAddress->address = $request->address;
       $contactAddress->telephone = $request->telephone;
       $contactAddress->email = $request->email;
       $contactAddress->save();
       return response()->json($contactAddress);

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
