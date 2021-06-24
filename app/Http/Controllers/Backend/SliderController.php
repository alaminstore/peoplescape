<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slider;
use App\Sliderbtm;
use App\Servicetop;
use App\Allservices;
use App\Locationtop;
use App\Alllocations;
use App\Hcall;
use App\Teamtop;
use App\Teammembers;
use App\Testimonials;
use App\Monialtop;
use App\Footer;
use App\Counterpart;
use App\Degree;
use App\User;
use App\Institution;
use App\Degreemajorminor;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliderList = Slider::all();
        $sliderBottom = Sliderbtm::findorfail(1);
        $servicetop = Servicetop::findorfail(1);
        $allservices = Allservices::all();
        $locationtop = Locationtop::find(1);
        $alllocations = Alllocations::all();
        $hcall = Hcall::find(1);
        $teamTop = Teamtop::find(1);
        $teams = Teammembers::all();
        $testmonials = Testimonials::all();
        $monialTop = Monialtop::find(1);
        $footer = Footer::find(1);
        $counter =Counterpart::find(1);
        return view('Backen///////////////////////////////////////d.home.home',compact('sliderList','sliderBottom','servicetop','allservices','locationtop','alllocations','hcall','teamTop','teams','testmonials','monialTop','footer','counter'));
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
        $image = $request->file('image');
        $new_name = time().'.'.$image->getClientOriginalExtension();
        $image->move('psimage/',$new_name);
        $slider = new Slider();
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->image = 'psimage/'.$new_name;
        $slider->save();
        return response()->json($slider);
    }
    public function slideredit(Request $request){
      $id = $request->id;
      $findSlider = Slider::find($id);
      return response()->json($findSlider);

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
    public function update(Request $request)
    {
        if($request->file('image')){
            $find_image = Slider::find($request->sliderid);
            $old_img = $find_image->image;
            if($old_img){
                unlink($old_img);
            }
            $image = $request->file('image');
            $new_name = time().'.'.$image->getClientOriginalExtension();
            $image->move('psimage/',$new_name);
            $slider =Slider::find($request->sliderid);
            $slider->title = $request->title;
            $slider->description = $request->description;
            $slider->image = 'psimage/'.$new_name;
            $slider->save();
            return response()->json($slider);
        }else{

        $slider = Slider::find($request->sliderid);
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->save();
        return response()->json($slider);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $delete_sliderimg = Slider::find($id);
        $unlink_img = $delete_sliderimg->image;
        $delete_sliderimg->delete();
        unlink($unlink_img);
    }
    public function sliderbottom(Request $request){
        if($request->file('image')){
            $find_image = Sliderbtm::find($request->id);
            $old_img = $find_image->image;
            if($old_img){
                unlink($old_img);
            }
        $image = $request->file('image');
        $new_name =time().'.'.$image->getClientOriginalExtension();
        $image->move('psimage/',$new_name);
        $sliderbtm = Sliderbtm::find($request->id);
        $sliderbtm->title = $request->title;
        $sliderbtm->description = $request->description;
        $sliderbtm->image = 'psimage/'.$new_name;
        $sliderbtm->save();
        return response()->json($sliderbtm);
        }else{
        $sliderbtm = Sliderbtm::find($request->id);
        $sliderbtm->title = $request->title;
        $sliderbtm->description = $request->description;
        $sliderbtm->save();
        return response()->json($sliderbtm);
        }
    }
    public function servicetopupdate(Request $request){
        $servicetop = Servicetop::find($request->id);
        $servicetop->title = $request->title;
        $servicetop->description = $request->description;
        $servicetop->save();
        return response()->json($servicetop);
    }
    public function servicestore(Request $request){
        $image = $request->file('image');
        $new_name =time().'.'.$image->getClientOriginalExtension();
        $image->move('psimage/',$new_name);
        $serviceTop = new Allservices();
        $serviceTop->title = $request->title;
        $serviceTop->short_des = $request->short_des;
        $serviceTop->description = $request->description;
        $serviceTop->image ='psimage/'.$new_name;
        $serviceTop->save();
        return response()->json($serviceTop);

    }
    public function serviceedit(Request $request){
        $id = $request->id;
        $service = Allservices::find($id);
        return response()->json($service);


    }
    public function serviceupdate(Request $request){
        if($request->file('image')){
            $id = $request->id;
            $find_image = Allservices::find($id);
            $old_img = $find_image->image;
            if($old_img){
                unlink($old_img);
            }
            $image = $request->file('image');
            $new_name =time().'.'.$image->getClientOriginalExtension();
            $image->move('psimage/',$new_name);
            $serviceTop =  Allservices::find($id);
            $serviceTop->title = $request->title;
            $serviceTop->short_des = $request->short_des;
            $serviceTop->description = $request->description;
            $serviceTop->image ='psimage/'.$new_name;
            $serviceTop->save();
            return response()->json($serviceTop);
        }else{
            $id = $request->id;
            $serviceTop =  Allservices::find($id);
            $serviceTop->title = $request->title;
            $serviceTop->short_des = $request->short_des;
            $serviceTop->description = $request->description;
            $serviceTop->save();
            return response()->json($serviceTop);

        }


    }
    public function servicedelete(Request $request){
        $id = $request->id;
        $service = Allservices::find($id);
        $service->delete();
        return response()->json('deelted');


    }
    public function locationtop(Request $request){
        $locationTop = Locationtop::find(1);
        $locationTop->title = $request->title;
        $locationTop->description = $request->description;
        $locationTop->save();
        return response()->json($locationTop);
    }

    public function locationstore(Request $request){
        $location = new Alllocations();
        $location->title = $request->title;
        $location->description = $request->description;
        $location->link = $request->link;
        $location->save();
        return response()->json($location);

    }
    public function locationedit(Request $request){
        $id = $request->id;
        $location = Alllocations::find($id);
        return response()->json($location);


    }
    public function locationupdate(Request $request){
        $id = $request->id;
        $location =  Alllocations::find($id);
        $location->title = $request->title;
        $location->description = $request->description;
        $location->link = $request->link;
        $location->save();
        return response()->json($location);

    }
    public function locationdelete(Request $request){
        $id = $request->id;
        $location = Alllocations::find($id);
        $unlink_img = $location->image;
        $location->delete();
        unlink($unlink_img);
        return response()->json('deelted');


    }
    public function callupdate(Request $request){
        $call = Hcall::find(1);
        $call->description = $request->description;
        $call->save();
        return response()->json($call);
    }
    public function teamtop(Request $request){
        $teamTop = Teamtop::find(1);
        $teamTop->title = $request->title;
        $teamTop->description = $request->description;
        $teamTop->save();
        return response()->json($teamTop);
    }

    public function teamstore(Request $request){
        $image = $request->file('image');
        $new_name =time().'.'.$image->getClientOriginalExtension();
        $image->move('psimage/',$new_name);
        $team = new Teammembers();
        $team->name = $request->name;
        $team->designation = $request->designation;
        $team->description = $request->description;
        $team->image = 'psimage/'.$new_name;
         $team->fb_link = $request->fb_link;
        $team->tw_link = $request->tw_link;
        $team->ln_link = $request->ln_link;
        $team->gp_link = $request->gp_link;
        $team->save();
        return response()->json($team);

    }
    public function teamedit(Request $request){
        $id = $request->id;
        $team = Teammembers::find($id);
        return response()->json($team);


    }
    public function teamupdate(Request $request){
        if($request->file('image')){
            $image = $request->file('image');
            $new_name =time().'.'.$image->getClientOriginalExtension();
            $image->move('psimage/',$new_name);
            $team = Teammembers::find($request->id);
            $team->name = $request->name;
            $team->designation = $request->designation;
            $team->description = $request->description;
            $team->image = 'psimage/'.$new_name;
             $team->fb_link = $request->fb_link;
            $team->tw_link = $request->tw_link;
            $team->ln_link = $request->ln_link;
            $team->gp_link = $request->gp_link;
            $team->save();
            return response()->json($team);
        }else{
            $team = Teammembers::find($request->id);
            $team->name = $request->name;
            $team->designation = $request->designation;
            $team->description = $request->description;
             $team->fb_link = $request->fb_link;
            $team->tw_link = $request->tw_link;
            $team->ln_link = $request->ln_link;
            $team->gp_link = $request->gp_link;
            $team->save();
            return response()->json($team);
        }



    }
    public function teamdelete(Request $request){
        $id = $request->id;
        $team = Teammembers::find($id);
        $unlink_img = $team->image;
        $team->delete();
        unlink($unlink_img);
        return response()->json('deelted');
    }

    public function testimonialstore(Request $request){
        $image = $request->file('image');
        $new_name =time().'.'.$image->getClientOriginalExtension();
        $image->move('psimage/',$new_name);
        $testimonial = new Testimonials();
        $testimonial->name = $request->name;
        $testimonial->description = $request->description;
        $testimonial->image = 'psimage/'.$new_name;
        $testimonial->save();
        return response()->json($testimonial);

    }
    public function testimonialedit(Request $request){
        $id = $request->id;
        $testimonial = Testimonials::find($id);
        return response()->json($testimonial);


    }
    public function testimonialupdate(Request $request){
        if($request->file('image')){
            $image = $request->file('image');
            $new_name =time().'.'.$image->getClientOriginalExtension();
            $image->move('psimage/',$new_name);
            $testimonial = Testimonials::find($request->id);
            $testimonial->name = $request->name;
            $testimonial->description = $request->description;
            $testimonial->image = 'psimage/'.$new_name;
            $testimonial->save();
            return response()->json($testimonial);
        }else{
            $testimonial = Testimonials::find($request->id);
            $testimonial->name = $request->name;
            $testimonial->description = $request->description;
            $testimonial->save();
            return response()->json($testimonial);
        }



    }
    public function testimonialdelete(Request $request){
        $id = $request->id;
        $testimonial = Testimonials::find($id);
        $unlink_img = $testimonial->image;
        $testimonial->delete();
        unlink($unlink_img);
        return response()->json('deelted');
    }
    public function monialtopupdate(Request $request){
        $monialTop = Monialtop::find(1);
        $monialTop->title = $request->title;
        $monialTop->description = $request->description;
        $monialTop->save();
        return response()->json($monialTop);
    }
    public function counterpartupdate(Request $request){
        $counter = Counterpart::find(1);
        $counter->experience = $request->experience;
        $counter->location = $request->location;
        $counter->team = $request->team;
        $counter->employee = $request->employee;
        $counter->save();
        return response()->json($counter);
     }
    public function footerupdate(Request $request){
        if($request->file('image')){
            $find_image = Footer::find($request->id);
            $old_img = $find_image->image;
            if($old_img){
                unlink($old_img);
            }
        $image = $request->file('image');
        $new_name =time().'.'.$image->getClientOriginalExtension();
        $image->move('psimage/',$new_name);
        $footer = Footer::find($request->id);
        $footer->title = $request->title;
        $footer->subtitle = $request->subtitle;
        $footer->image = 'psimage/'.$new_name;
        $footer->address = $request->address;
        $footer->email = $request->email;
        $footer->phone = $request->phone;
        $footer->fb_link = $request->fb_link;
        $footer->ln_link = $request->ln_link;
        $footer->save();
        return response()->json($footer);
        }else{
            $footer = Footer::find($request->id);
            $footer->title = $request->title;
            $footer->subtitle = $request->subtitle;
            $footer->address = $request->address;
            $footer->email = $request->email;
            $footer->phone = $request->phone;
            $footer->fb_link = $request->fb_link;
            $footer->ln_link = $request->ln_link;
            $footer->save();
        return response()->json($footer);
        }
    }

      public function degreelist(){
        $degrees = Degree::orderBy('id','desc')->get();
        return view('Backend.user.degree',compact('degrees'));
    }
    public function degreestore(Request $request){
        $Degree = new Degree();
        $Degree->degree = $request->degree;
        $Degree->save();
        $degmajorminor = new Degreemajorminor();
        $degmajorminor->degree_id = $Degree->id;
        $degmajorminor->major = json_encode($request->major);
        $degmajorminor->minor = json_encode($request->minor);
        $degmajorminor->save();
        return response()->json($Degree);
    }
    public function degreeedit(Request $request){
        $Degree =  Degree::find($request->id);
        $degreemajorminor = Degreemajorminor::where('degree_id',$request->id)->first();
        //$degreeMajorjson = json_decode()
        return response()->json(['deg'=>$Degree,'degreemajorminor'=>$degreemajorminor]);
    }
    public function degreeupdate(Request $request){
        $Degree =  Degree::find($request->id);
        $Degree->degree = $request->degree;
        $Degree->save();
        $finids = Degreemajorminor::where('degree_id',$request->id)->first();
        $finids->delete();
        $degmajorminor = new Degreemajorminor();
        $degmajorminor->degree_id = $Degree->id;
        $degmajorminor->major = json_encode($request->major);
        $degmajorminor->minor = json_encode($request->minor);
        $degmajorminor->save();
        return response()->json($Degree);
    }
    public function degreedelete(Request $request){
        $Degree =  Degree::find($request->id);
        $Degree->delete();
        $demajorminor = Degreemajorminor::where('degree_id',$request->id)->first();
        $demajorminor->delete();
        return response()->json('success');
    }
    // public function degreelist(){
    //     $degrees = Degree::orderBy('id','desc')->get();
    //     return view('Backend.user.degree',compact('degrees'));
    // }
    // public function degreestore(Request $request){
    //     $Degree = new Degree();
    //     $Degree->degree = $request->degree;
    //     $Degree->save();
    //     return response()->json($Degree);
    // }
    // public function degreeedit(Request $request){
    //     $Degree =  Degree::find($request->id);
    //     return response()->json($Degree);
    // }
    // public function degreeupdate(Request $request){
    //     $Degree =  Degree::find($request->id);
    //     $Degree->degree = $request->degree;
    //     $Degree->save();
    //     return response()->json($Degree);
    // }
    // public function degreedelete(Request $request){
    //     $Degree =  Degree::find($request->id);
    //     $Degree->delete();
    //     return response()->json('success');
    // }
    public function usercreation(){
        $GetAdminuser = User::where('status','!=','user')->get();
        return view('Backend.user.createuser',compact('GetAdminuser'));
    }
    public function userstore(Request $request){
        $image = $request->file('image');
        $new_name = time().'.'.$image->getClientOriginalExtension();
        $image->move('careerfile',$new_name);
        $user = new User();
        $user->name= $request->name;
        $user->email= $request->email;
        $user->password=bcrypt($request->password);
        $user->mobile= $request->mobile;
        $user->status= $request->status;
        $user->image='careerfile/'.$new_name;
        $user->save();
        return response()->json($user);
    }
    public function useredit(Request $request){
        $getuserByid = User::find($request->id);
        return response()->json($getuserByid);

    }
    public function userupdate(Request $request){
        if($request->file('image')){
            $image = $request->file('image');
            $new_name = time().'.'.$image->getClientOriginalExtension();
            $image->move('careerfile',$new_name);
            $user = User::find($request->id);
            $user->name= $request->name;
            $user->email= $request->email;
            $user->mobile= $request->mobile;
            $user->status= $request->status;
            $user->image='careerfile/'.$new_name;
            $user->save();
            return response()->json($user);

        }else{
            $user = User::find($request->id);
            $user->name= $request->name;
            $user->email= $request->email;
            $user->mobile= $request->mobile;
            $user->status= $request->status;
            $user->save();
            return response()->json($user);
        }

    }
    public function userdelete(Request $request){

        $delete_user = User::find($request->id);
        $unlink_img = $delete_user->image;
        $delete_user->delete();
        unlink($unlink_img);
    }
    public function userstatus(Request $request){
        if($request->id==0){
            $user = User::find($request->userid);
            $user->activity = $request->id;
            $user->temp_pass =$user->password;
            $user->password ='';
            $user->save();
        }else{
            $user = User::find($request->userid);
            $user->activity = $request->id;
            $user->password =$user->temp_pass;
            $user->temp_pass ='';
            $user->save();
        }

        return response()->json($request->id);

    }
        //10/2/2020
    public function institutionlist(){
        $institution = Institution::orderBy('id','desc')->get();
        return view('Backend.user.institution',compact('institution'));
    }
    public function institutionstore(Request $request){
        $institution = new Institution();
        $institution->name = $request->name;
        $institution->save();
        return response()->json($institution);
    }
    public function institutionedit(Request $request){
        $institution =  Institution::find($request->id);
        return response()->json($institution);
    }
    public function institutionupdate(Request $request){
        $institution =  Institution::find($request->id);
        $institution->name = $request->name;
        $institution->save();
        return response()->json($institution);
    }
    public function institutiondelete(Request $request){
        $institution =  Institution::find($request->id);
        $institution->delete();
        return response()->json('success');
    }



}
