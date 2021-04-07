<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contactmail;
use App\Contactdet;
use App\Contact;
use App\Contacthead;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $data = [];
        $data['contact'] = Contactdet::find(1);
        $data['contacthead'] = Contacthead::find(1);
        return view('Frontend.contact',compact('data'));

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
       
        $this->validate($request,[
            'g-recaptcha-response'=>'required|captcha',
            'name'=>'required',
            'email'=>'required',
            'msg'=>'required',
        ]);
        // $this->validate($request,[
        //     'g-recaptcha-response'=>'required|captcha',
            
        // ]);
        // return ($request->g-recaptcha-response);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->msg = $request->msg;
        $contact->save();
        Mail::to('peoplescapemapl@gmail.com')->send(new Contactmail($contact));
        $notification = array(
            'message' => 'Success! Thaks for your message', 
            'alert-type' => 'success'
        );
        return redirect()->route('contact-us.index')->with($notification);
        // $data = $request->all();
        // return $data;
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
