<?php

namespace App\Http\Controllers\Frontend;

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
use App\Alllocations;
use App\Locationtop;
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
        $data['alllocations']= Alllocations::all();
        $data['locationtop']= Locationtop::find(1);
        return view('Frontend.aboutus',compact('data'));
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
