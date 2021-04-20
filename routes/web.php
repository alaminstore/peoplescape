<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/galary', function () {

// });
// Route::get('/about-us', function () {
//     return view('Frontend.aboutus');
// });
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});
Route::get('/','Frontend\PeoplesscapeHomeController@index')->name('peoplesscape.home');
Route::get('create-cv','Frontend\PeoplesscapeHomeController@cvform')->name('CV.createcv');
Route::post('/cvformstore','Frontend\PeoplesscapeHomeController@cvformstore');

Route::resource('about-us','Frontend\AboutusController');
Route::resource('services','Frontend\ServiceController');
Route::get('detailservice','Frontend\ServiceController@detailservice')->name('service.detailservice');
Route::resource('clients','Frontend\ClientController');
Route::resource('recognitions','Frontend\RecognitionController');
Route::resource('career','Frontend\CareerController');
Route::get('careerdetails','Frontend\CareerController@careerdetails')->name('career.details');
Route::get('applybyapplicant','Frontend\CareerController@applybyapplicant')->name('applicant.apply');

Route::resource('contact-us','Frontend\ContactController');
Route::post('contactmessage/','Frontend\ContactController@store');

Route::resource('image-galary','Frontend\GaleryController');
//new for fronntend
Route::get('loginemail','Frontend\PeoplesscapeHomeController@emailchk')->name('logineamil.chk');
Route::get('loginpass','Frontend\PeoplesscapeHomeController@passchk')->name('loginpass.chk');
Route::get('pdfview','Frontend\PeoplesscapeHomeController@pdfview')->name('pdfcreate.generate');
Route::get('pdfdownload','Frontend\PeoplesscapeHomeController@pdfdownload')->name('pdfdownload');
Route::get('wordexport/{id}','Frontend\PeoplesscapeHomeController@wordExport')->name('wordexport');
Route::get('unqemailchk','Frontend\PeoplesscapeHomeController@unqemailchk')->name('unqemail.chk');
//2/12/2020
Route::get('majorminorbydegree','Frontend\PeoplesscapeHomeController@majorminorbyDegree')->name('degree.majorminor');


Route::get('/accessdenied', function() {
   return view('denied');
})->name('errorroute');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Backend Routelist
Route::group(['prefix' => 'admin'], function(){
    Route::group(['prefix' => 'home'], function(){
           Route::resource('slider', 'Backend\SliderController');
           Route::get('slideredit', 'Backend\SliderController@slideredit')->name('slider.edit');
           Route::post('sliderupdate', 'Backend\SliderController@update')->name('slider.update');
           Route::get('sliderdelete', 'Backend\SliderController@destroy')->name('slider.delete');
           Route::post('slidertmupdate', 'Backend\SliderController@sliderbottom')->name('sliderbtm.update');
           Route::post('servicetop', 'Backend\SliderController@servicetopupdate')->name('servicetop.update');
           Route::post('allservice', 'Backend\SliderController@servicestore')->name('service.store');
           Route::get('allserviceedit', 'Backend\SliderController@serviceedit')->name('service.edit');
           Route::post('allserviceupdate', 'Backend\SliderController@serviceupdate')->name('service.update');
           Route::get('allservicedelete', 'Backend\SliderController@servicedelete')->name('service.delete');
           Route::post('locationtop', 'Backend\SliderController@locationtop')->name('locationtop.update');
           Route::post('location', 'Backend\SliderController@locationstore')->name('location.store');
           Route::get('locationedit', 'Backend\SliderController@locationedit')->name('location.edit');
           Route::post('locationupdate', 'Backend\SliderController@locationupdate')->name('location.update');
           Route::get('locationdelete', 'Backend\SliderController@locationdelete')->name('location.delete');
           Route::post('call', 'Backend\SliderController@callupdate')->name('call.update');
           Route::post('teamtop', 'Backend\SliderController@teamtop')->name('teamtop.update');
           Route::post('team', 'Backend\SliderController@teamstore')->name('team.store');
           Route::get('teamedit', 'Backend\SliderController@teamedit')->name('team.edit');
           Route::post('teamupdate', 'Backend\SliderController@teamupdate')->name('team.update');
           Route::get('teamdelete', 'Backend\SliderController@teamdelete')->name('team.delete');
           Route::post('testimonialstore', 'Backend\SliderController@testimonialstore')->name('monial.store');
           Route::get('testimonialedit', 'Backend\SliderController@testimonialedit')->name('monial.edit');
           Route::post('testimonialupdate', 'Backend\SliderController@testimonialupdate')->name('monial.update');
           Route::get('testimonialdelete', 'Backend\SliderController@testimonialdelete')->name('monial.delete');
           Route::post('monialtop', 'Backend\SliderController@monialtopupdate')->name('monialtop.update');
           Route::post('footer', 'Backend\SliderController@footerupdate')->name('footer.update');
           Route::post('counterpartupdate', 'Backend\SliderController@counterpartupdate')->name('counterpart.update');
           //new
            Route::get('createuser','Backend\SliderController@usercreation')->name('maintainuser.create');
           Route::post('storeuser','Backend\SliderController@userstore')->name('maintainuser.store');
           Route::get('edituser','Backend\SliderController@useredit')->name('maintainuser.edit');
           Route::post('updateuser','Backend\SliderController@userupdate')->name('maintainuser.update');
           Route::get('deleteuser','Backend\SliderController@userdelete')->name('maintainuser.delete');
           Route::get('status','Backend\SliderController@userstatus')->name('user.status');


           Route::get('degree','Backend\SliderController@degreelist')->name('degree.create');
           Route::post('degree','Backend\SliderController@degreestore')->name('degree.store');
           Route::get('degreeedit','Backend\SliderController@degreeedit')->name('degree.edit');
           Route::post('degreeupdate','Backend\SliderController@degreeupdate')->name('degree.update');
           Route::get('degreedelete','Backend\SliderController@degreedelete')->name('degree.delete');
           //02/10/2020
              Route::get('institution','Backend\SliderController@institutionlist')->name('institution.create');
              Route::post('institutionstore','Backend\SliderController@institutionstore')->name('institution.store');
              Route::get('institutionedit','Backend\SliderController@institutionedit')->name('institution.edit');
              Route::post('institutionupdate','Backend\SliderController@institutionupdate')->name('institution.update');
              Route::get('institutiondelete','Backend\SliderController@institutiondelete')->name('institution.delete');


   });
   Route::group(['prefix' => 'service'], function(){
          Route::resource('serviceop', 'Backend\ServiceController');
          Route::post('servetop', 'Backend\ServiceController@servetopupdate')->name('servetop.update');
          Route::post('hunting', 'Backend\ServiceController@huntingupdate')->name('hunting.update');
          Route::post('manpower', 'Backend\ServiceController@manpowerupdate')->name('manpower.update');
          Route::post('payroll', 'Backend\ServiceController@payrollupdate')->name('payroll.update');
          Route::post('medical', 'Backend\ServiceController@medicalupdate')->name('medical.update');
          Route::post('asses', 'Backend\ServiceController@assesupdate')->name('asses.update');
          Route::post('recruit', 'Backend\ServiceController@recruitupdate')->name('recruit.update');
          Route::post('training', 'Backend\ServiceController@trainingupdate')->name('training.update');
          Route::post('health', 'Backend\ServiceController@healthupdate')->name('health.update');
          Route::post('scall', 'Backend\ServiceController@scallupdate')->name('scall.update');

  });
  Route::group(['prefix' => 'client'], function(){
    Route::resource('clientop', 'Backend\ClientController');
    Route::post('clienthead', 'Backend\ClientController@clientheadupdate')->name('clienthead.update');
    Route::post('clienttop', 'Backend\ClientController@clienttopupdate')->name('clienttop.update');
    Route::post('ourclientstore', 'Backend\ClientController@ourclientstore')->name('ourclient.store');
    Route::get('ourclientedit', 'Backend\ClientController@ourclientedit')->name('ourclient.edit');
    Route::post('ourclientupdate', 'Backend\ClientController@ourclientupdate')->name('ourclient.update');
    Route::get('ourclientdelete', 'Backend\ClientController@ourclientdelete')->name('ourclient.delete');

  });
  Route::group(['prefix' => 'recognition'], function(){
    Route::resource('recog', 'Backend\RecognitionController');
    Route::post('recoghead', 'Backend\RecognitionController@recogheadstore')->name('recoghead.update');
    Route::post('recogstore', 'Backend\RecognitionController@recogstore')->name('recog.store');
    Route::get('recogedit', 'Backend\RecognitionController@recogedit')->name('recog.edit');
    Route::post('recogupdate', 'Backend\RecognitionController@recogupdate')->name('recog.update');
    Route::get('recogdelete', 'Backend\RecognitionController@recogdelete')->name('recog.delete');

  });
  Route::group(['prefix' => 'aboutus'], function(){
    Route::resource('aboutusop', 'Backend\AboutusController');
    Route::post('aboutheadupdate', 'Backend\AboutusController@aboutheadupdate')->name('about.update');
    Route::post('chooseupdate', 'Backend\AboutusController@chooseupdate')->name('choose.update');
    Route::post('call1update', 'Backend\AboutusController@call1update')->name('call1.update');
    Route::post('call2update', 'Backend\AboutusController@call2update')->name('call2.update');
    Route::post('advantageupdate', 'Backend\AboutusController@advantageupdate')->name('advantage.update');
    Route::post('successupdate', 'Backend\AboutusController@successupdate')->name('success.update');
    Route::post('missionupdate', 'Backend\AboutusController@missionupdate')->name('mission.update');
    Route::post('visionupdate', 'Backend\AboutusController@visionupdate')->name('vision.update');


  });
  Route::group(['prefix' => 'career'], function(){
    Route::resource('careerop', 'Backend\CareerController');
    Route::post('careerheadupdate','Backend\CareerController@careerheadupdate')->name('careerhead.update');
    Route::get('careerdelete', 'Backend\CareerController@careerdelete')->name('career.delete');
    Route::get('careeredit', 'Backend\CareerController@careeredit')->name('career.edit');
    Route::post('careerupdate', 'Backend\CareerController@careerupdate')->name('career.update');

    Route::post('careercatstore', 'Backend\CareerController@careercatstore')->name('careercat.store');
    Route::get('careercatedit', 'Backend\CareerController@careercatedit')->name('careercat.edit');
    Route::post('careercatupdate', 'Backend\CareerController@careercatupdate')->name('careercat.update');
    Route::get('careercatdelete', 'Backend\CareerController@careercatdelete')->name('careercat.delete');
    Route::get('detailjob','Backend\CareerController@detailsjob')->name('careerjob.detail');
    Route::get('applicantlist','Backend\CareerController@applicantlist')->name('career.applicantlist')->middleware('accesscontrol');
    Route::get('shortlist','Backend\CareerController@shortlistapplicatn')->name('shortlist.applicant');
    Route::get('shortlistedapplicant','Backend\CareerController@shortlistedapplicantlist')->name('shortlisted.applicantlist')->middleware('accesscontrol');
    Route::get('unsort','Backend\CareerController@unsort')->name('shortlisted.remove');
    Route::get('filterunsort','Backend\CareerController@filterunsort')->name('filtershortlisted.remove')->middleware('accesscontrol');
    Route::get('singlezip','Backend\CareerController@singlezip')->name('zip.singlecv');
    Route::get('shortlistedzip','Backend\CareerController@shortlistedzip')->name('zip.shortlisted');
    //11.12.2019
    Route::get('sortfilterededzip','Backend\CareerController@sortfilteredzip')->name('sortfilterd.pdf');
    Route::post('/searchapplicant','Backend\CareerController@filterApplicant')->name('applicant.filter');
    Route::post('/searchsortapplicant','Backend\CareerController@filtersortApplicant')->name('shortapplicant.filter');
    Route::get('jobstatus','Backend\CareerController@status')->name('job.status');
    Route::get('jobcompletestatus','Backend\CareerController@completestatus')->name('job.completestatus');
    Route::get('shortlist','Backend\CareerController@shortlistapplicatn')->name('shortlist.applicant');
    Route::get('unshortlist','Backend\CareerController@unshortlistapplicatn')->name('unshortlist.applicant');
    Route::get('filterededzip','Backend\CareerController@filteredzip')->name('filterd.pdf');
    Route::get('sendbulkmail','Backend\CareerController@sendBulkmail')->name('send.bulkmail');
    Route::get('joblist','Backend\CareerController@joblist')->name('job.list');
    Route::get('Job-open','JobOpenController@index')->name('job.open');
    //02/10/2020
    Route::post('jobnaturestore','Backend\CareerController@jobnaturestore')->name('jobnature.store');
    Route::get('jobnaturedit','Backend\CareerController@jobnatureedit')->name('jobnature.edit');
    Route::post('jobnaturupdate','Backend\CareerController@jobnaturupdate')->name('jobnature.update');
    Route::get('jobnaturdelete','Backend\CareerController@jobnaturdelete')->name('jobnature.delete');



});
  Route::group(['prefix' => 'contact'], function(){
    Route::resource('contactop', 'Backend\ContactController');
    Route::post('contactheadupdate','Backend\ContactController@contactheadupdate')->name('contacthead.update');

  });
  Route::group(['prefix' => 'galary'], function(){
    Route::resource('galeryop', 'Backend\GaleryController');
    Route::get('galeryserial','Backend\GaleryController@serialupdate')->name('galeryserial.update');
    Route::get('galeryedit','Backend\GaleryController@galeryedit')->name('galeryopt.edit');
    Route::post('galeryupdate','Backend\GaleryController@galeryupdate')->name('galeryopt.infoupdate');
    Route::get('galerydelete','Backend\GaleryController@galerydelete')->name('galeryopt.delete');

  });
  Route::group(['prefix' => 'application'], function(){
    Route::resource('application','Backend\ApplicationController');
    Route::get('applicantprofile','Backend\ApplicationController@applicantprofile')->name('applicant.profile');
    Route::get('create-yourcv','Backend\ApplicationController@cvformforuserdash')->name('CV.createcvuser');
    Route::post('your-cvstore','Backend\ApplicationController@yourcvstore')->name('application.yourcvstore');
    Route::get('create-usercv','Backend\ApplicationController@usercv')->name('CV.usercv');
    Route::get('appliedhistory','Backend\ApplicationController@applyhistory')->name('application.appliedhistory');
    Route::post('personalinfo','Backend\ApplicationController@personalinfoupdate')->name('personalinfo.update');
    Route::post('educationalinfo','Backend\ApplicationController@educationalinfo')->name('educationalinfo.update');
    Route::post('expinfo','Backend\ApplicationController@expinfo')->name('expinfo.update');
    Route::post('skillupdate','Backend\ApplicationController@skillupdate')->name('skillinfo.update');
    Route::post('refinfo','Backend\ApplicationController@refinfo')->name('refinfo.update');
    Route::post('basicinfop','Backend\ApplicationController@basicinfop')->name('basicinfop.update');

  });
});
