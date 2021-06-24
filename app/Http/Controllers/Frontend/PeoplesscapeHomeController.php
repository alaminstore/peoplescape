<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use PDF;
use App\Slider;
use App\Sliderbtm;
use App\Servetop;
use App\Allservices;
use App\Locationtop;
use App\Alllocations;
use App\Hcall;
use App\Teamtop;
use App\Teammembers;
use App\Monialtop;
use App\Testimonials;
use App\Counterpart;
use App\Servicehead;
use App\Cvform;
use App\User;
use App\Degree;
use App\Institution;
use App\Degreemajorminor;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\TemplateProcessor;

class PeoplesscapeHomeController extends Controller
{
    public function index()
    {
        $data = [];
        $data['slider'] = Slider::orderBy('id', 'desc')->get();
        $data['sliderbtm'] = Sliderbtm::find(1);
        $data['servtop'] = Servetop::find(1);
        $data['allservice'] = Allservices::all();
        $data['locationtop'] = Locationtop::find(1);
        $data['alllocations'] = Alllocations::all();
        $data['hcall'] = Hcall::find(1);
        $data['teamtop'] = Teamtop::find(1);
        $data['teammembers'] = Teammembers::all();
        $data['monialtop'] = Monialtop::find(1);
        $data['testimonial'] = Testimonials::all();
        $data['counterpart'] = Counterpart::find(1);
        return view('Frontend.home', compact('data'));
    }

    public function cvform()
    {
        $data = [];
        $data['servicehead'] = Servicehead::find(1);
        $data['deg'] = Degree::orderBy('id', 'desc')->get();
        $data['inst'] = Institution::orderBy('id', 'desc')->get();
        return view('Frontend.cvcreate', compact('data'));
    }

    public function cvformstore(Request $request)
    {
        // return $request->all();
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'mobile' => 'required|min:11|numeric',
            'gender' => 'required',
            'marital_status' => 'required',
            'division' => 'required',
            'password' => 'required',
            'birthdate' => 'required',
            'paddress' => 'required',
            'haddress' => 'required',
            'interest' => 'required',
            'objective' => 'required',
            'l_degree' => 'required',
            'l_score' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png|',
            'cv' => 'required|mimes:doc,docx,pdf|max:250',

        ]);
        $image = $request->file('image');
        $new_name_image = time() . '.' . $image->getClientOriginalExtension();
        $image->move('careerfile/', $new_name_image);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->gender = $request->gender;
        $user->status = "user";
        $user->password = bcrypt($request->password);
        $user->image = 'careerfile/' . $new_name_image;
        $user->save();

        $image = $request->file('cv');
        $new_name = time() . '.' . $image->getClientOriginalExtension();
        $image->move('careerfile/', $new_name);
        $user_image = $user->image;
        $cvform = new Cvform();
        $cvform->userid = $user->id;
        $cvform->name = $request->name;
        $cvform->birthdate = $request->birthdate;
        $cvform->paddress = $request->paddress;
        $cvform->haddress = $request->haddress;
        $cvform->mobile = $request->mobile;
        $cvform->email = $request->email;
        $cvform->interest = $request->interest;
        $cvform->objective = $request->objective;
        $cvform->l_degree = $request->l_degree;
        $cvform->l_score = $request->l_score;
        $cvform->cv = 'careerfile/' . $new_name;
        $cvform->marital_status = $request->marital_status;
        $cvform->nid = $request->nid;
        if ($request->academic) {
            $cvform->academic = json_encode($request->academic);
        }
        if ($request->experience) {
            $cvform->experience = json_encode($request->experience);
        }
        if ($request->project) {
            $cvform->project = json_encode($request->project);
        }
        if ($request->achievement) {
            $cvform->achievement = json_encode($request->achievement);
        }
        if ($request->skill) {
            $cvform->skill = json_encode($request->skill);
        }
        if ($request->reference) {
            $cvform->reference = json_encode($request->reference);
        }
        $birthDate = $request->birthdate;
        //explode the date to get month, day and year
        $birthDate = explode("-", $birthDate);
        //get age from date or birthdate
        $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md")
            ? ((date("Y") - $birthDate[0]) - 1)
            : (date("Y") - $birthDate[0]));
        //return "Age is:" . $age;
        $cvform->age = $age;
        $cvform->area = $request->division;
        $cvform->gender = $request->gender;
        $cvform->image = $user_image;
        $cvform->dateee = date('Y-m-d');
        $cvform->save();


        $notification = array(
            'message' => 'Success! You can Login Now',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function pdfview(Request $request)
    {
        $id = $request->id;
        $careerInfoByid = Cvform::findorfail($id);
        view()->share('careerInfoByid', $careerInfoByid);
        // $pdf = PDF::loadView( 'myPDF', compact('careerInfoByid'))->save( 'careerfile/pdfname.pdf' );
        $pdf = PDF::loadView('myPDF');
        return view('myPDF', compact('careerInfoByid'));
        // return $pdf->download('itsolutionstuff.pdf');
    }

    public function pdfdownload(Request $request)
    {
        $id = $request->id;
        $careerInfoByid = Cvform::findorfail($id);
        view()->share('careerInfoByid', $careerInfoByid);

        // return $pdf->download('download.pdf');

        $pdf = PDF::loadView('download');
        $pdf->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);


        $filename = "generatepdf.pdf";
        // Save file to the directory
        // $pdf->save('careerfile/'.$filename);
        //Download Pdf
        return $pdf->stream($careerInfoByid->name . '.pdf');
    }


    public function wordExport($id)
    {
        $user = Cvform::findOrFail($id);
        $templateProcessor = new TemplateProcessor('word-template/word.docx');
        $templateProcessor->setValue('id', $user->id);
        $templateProcessor->setValue('name', $user->name);
        $templateProcessor->setValue('email', $user->email);
        $templateProcessor->setValue('mobile', $user->mobile);
        $templateProcessor->setValue('gender', $user->gender);
        $templateProcessor->setValue('address', $user->haddress);
        $templateProcessor->setValue('objective', $user->objective);
        $templateProcessor->setValue('skill', $user->skill);
        $templateProcessor->setValue('academic', $user->academic);
        $templateProcessor->setValue('experience', $user->experience);
        $templateProcessor->setValue('achievement', $user->achievement);
        $templateProcessor->setValue('project', $user->project);
        $templateProcessor->setValue('reference', $user->reference);

        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();
        // Add Header
        $header = $section->addHeader();
        // $templateProcessor->setValue('image',$header->addImage(asset(img.png)));


        $templateProcessor->setImageValue('image', array('path' => $user->image, 'width' => 300, 'height' => 300, 'ratio' => true));


        $fileName = $user->name;
        $templateProcessor->saveAs($fileName . '.docx');
        return response()->download($fileName . '.docx')->deleteFileAfterSend(true);
    }

    public function emailchk(Request $request)
    {
        $email = $request->email_address;
        $find_email = User::where('email', '=', $email)->first();
        if ($find_email) {
            return response()->json('Exist');
        } else {
            return response()->json('NotExist');
        }
    }

    public function unqemailchk()
    {
        $user = User::where('email', Input::get('email'))->first();
        if ($user) {
            return response()->json('Email is already taken');
        } else {

            return response()->json('true');
        }
    }

    //2/12/2020
    public function majorminorbyDegree(Request $request)
    {
        $findmajorminorBydegree = Degreemajorminor::where('degree_id', $request->id)->first();
        return response()->json($findmajorminorBydegree);
    }


    public function word()
    {
        return view('word_doc');
    }

}
