<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vacancy;
use Auth;
use App\Locations;
use Lang;
use Session;
use App\User;
use App\Resume;
use App\Jobreq;
use App\Mail\Contact;
use Mail;

class JobController extends Controller
{
    public function jobdetails($id){
      $vac = Vacancy::where('vac_id',$id)->first();
      return view('job.jobdetails',compact('vac'));
    }
    public function applyforjob(Request $req){
      $this->validate($req,[
        'vac_id' => 'string|required'
      ]);
      $jr = new Jobreq;
      $jr->vac_id = $req->vac_id;
      $num = rand(100000,200000000);
      while (Jobreq::where('application_id',$num)->count() != 0) {
        $num = rand(100000,200000000);
      }
      $jr->application_id = $num;
      $jr->description = $req->description;
      if (Auth::check()) {
        $jr->res_id = $req->res_id;
      }else{
        $jr->email = $req->email;
        $jr->name = $req->name;
      }
      $jr->resume = $req->resume;
      $jr->cover_letter = $req->cover_letter;
      $jr->save();
      return response()->json(['success'=>"Added"]);
    }
    public function location_jobs($id){
      $loc = Locations::find($id);
      $vacs = Vacancy::where('location',$loc->id)->where('status',1)->get();
      return view('job.joblist',compact('vacs'));
    }
    public function comp_vacancies($comp){
      $vacs = Vacancy::where('company',$comp)->where('status',1)->get();
      return view('job.joblist',compact('vacs'));
    }
    public function myres_list(Request $req){
      $res = Resume::where('user_id',Auth::user()->id)->get();
      return response()->json($res);
    }
    public function user_vacancies($us){
      $user = User::where('username',$us)->first();
      if (!empty($user)) {
        $vacs = Vacancy::where('user_id',$user->id)->where('status',1)->get();
        return view('job.joblist',compact('vacs'));
      }else{
        return redirect('/');
      }
    }
    public function jobtype($type){
      if ($type == "part-time") {
        $vacs = Vacancy::where('type',1)->where('status',1)->get();
      }elseif($type == "full-time"){
        $vacs = Vacancy::where('type',2)->where('status',1)->get();
      }elseif($type == "intern"){
        $vacs = Vacancy::where('type',0)->where('status',1)->get();
      }elseif($type == "remote"){
        $vacs = Vacancy::where('type',3)->where('status',1)->get();
      }else{
        return redirect('/');
      }
      return view('job.joblist',compact('vacs'));
    }
    public function getjobsearchdata(Request $req){
      if (!empty($req->word)) {
        $word = $req->word;
        if ($req->location != 0) {
          $vacs = Vacancy::where('location',$req->location)->where('status',1)
                          ->where(function ($query) use ($word,$req){
                            $query->where('title','LIKE','%' .$req->word. '%')
                                  ->orWhere('company','LIKE','%'.$req->word.'%')
                                  ->orWhere('description','LIKE','%'.$req->word.'%')
                                  ->orWhere('requirements','LIKE','%'.$req->word.'%');
                          })->get();
        }else{
          $vacs = Vacancy::where('status',1)->where(function ($query) use ($word, $req){
                            $query->where('title','LIKE','%' .$req->word. '%')
                                  ->orWhere('description','LIKE','%'.$req->word.'%')
                                  ->orWhere('requirements','LIKE','%'.$req->word.'%');
                                })->get();
        }
      }else{
        $vacs = Vacancy::where('status',1)->orderBy('created_at','desc')->get();
      }
      // Session::forget('joblist');
      // $list = array();
      // foreach ($vacs as $key => $vac) {
      //   $list[] = array($vac->id);
      // }
      // Session::push('joblist', $list);
      $this->jobs($vacs);
      return response()->json(['success'=>$vacs]);
    }
    public function hideres(Request $req,$id){
      $vac = Vacancy::find($id);
      if ($vac->user_id == Auth::user()->id) {
        $vac->status = 0;
        $vac->update();
        return response()->json(['success'=>Lang::get('app.Added'),'error' => Lang::get('app.Failed')]);
      }else{
        return response()->json(['success'=>Lang::get('app.Added'),'error' => Lang::get('app.Failed')]);
      }
    }
    public function showres(Request $req,$id){
      $vac = Vacancy::find($id);
      if ($vac->user_id == Auth::user()->id) {
        $vac->status = 1;
        $vac->update();
        return response()->json(['success'=>Lang::get('app.Added'),'error' => Lang::get('app.Failed')]);
      }else{
        return response()->json(['success'=>Lang::get('app.Added'),'error' => Lang::get('app.Failed')]);
      }
    }
    public function all_my_vacancies(){
      $vacs = Vacancy::where('user_id',Auth::user()->id)->get();
      return view('job.myjobs',compact('vacs'));
    }
    public function addvacancy(){
      return view('job.addvacancy');
    }
    public function jobs($vacs = null){
      if ($vacs == null) {
        $vacs = Vacancy::orderBy('created_at','desc')->get();
      }else{
        // $vacs = Vacancy::whereIn('id',$vacs)->orderBy('created_at','desc')->get();
      }
      // print_r(Session::get('joblist'));
      echo $vacs;
      // return view('job.joblist',compact('vacs'));
    }
    public function unreg_jobs($token){
      $vac = Vacancy::where('token',$token)->first();
      return view('job.jobdetails',compact('vac'));
    }
    public function deletejob($token){
      $vac = Vacancy::where('token',$token)->first();
      Vacancy::find($vac->id)->delete($vac->id);
      return redirect('/')->with('danger',Lang::get('app.You_have_deleted_your_vacancy'));
    }
    public function test(){
      $num = rand(10000000,20000000);
      while (Vacancy::where('vac_id',$num)->count() != 0) {
        $num = rand(10000000,20000000);
      }
      echo $num;
    }
    public function addjob(Request $req){
      $this->validate($req,[
        'title' => 'string|required',
        'description' => 'required',
        'requirements' => 'required',
        'company' => 'string|required',
        'type' => 'required',
        'location' => 'integer|required',
        'category' => 'integer|required',
        'website' => 'string',
        'contact_type' => 'required',
        'contact_email' => 'string|required',
        'contact_number' => 'required',
        'salary' => 'required',
        'salary_type' => 'required',
      ]);
      $vac = new Vacancy;
      if (Auth::check()) {
        $vac->user_id = Auth::user()->id;
      }else{
        $vac->user_id = 0;
        $vac->user_name = $req->person_name;
      }
      $vac->lang = config('app.locale');
        $num = rand(10000000,20000000);
        while (Vacancy::where('vac_id',$num)->count() != 0) {
          $num = rand(10000000,20000000);
        }
      $vac->vac_id = $num;
      $token = md5(microtime());
      $vac->token = $token;
      $vac->title = $req->title;
      if (Auth::check()) {
        $vac->status = 1;
      }else{
        $vac->status = 0;
        $url = "http://localhost:8000/unregistered/my-vacancy/".$token;
        $data = array(
          'name' => $req->user_name,
          'email' => $req->contact_email,
          'message' => Lang::get('app.Vac_verify_text',['url' => $url]),
        );
        Mail::to($req->contact_email)->send(new Contact($data));
      }
      $vac->description = $req->description;
      $vac->requirements = $req->requirements;
      $vac->company = $req->company;
      $vac->type = $req->type;
      $vac->location = $req->location;
      $vac->category = $req->category;
      $vac->website = $req->website;
      $vac->end_date = $req->end_date;
      $vac->image = $req->image;
      $vac->contact_type = $req->contact_type;
      $vac->contact_email = $req->contact_email;
      $vac->contact_number = $req->contact_number;
      $vac->salary = $req->salary;
      $vac->salary_type = $req->salary_type;
      $vac->save();
      if (Auth::check()) {
        return redirect('/all-vacancies')->with('success',Lang::get('app.Vacancy_started_successfully'));
      }else{
        return redirect()->back()->with('success',Lang::get('app.Added_Confirmation_email_sent'));
      }
    }
    public function act_job(Request $req,$id){
      $vac = Vacancy::find($id);
      $vac->status = 1;
      $vac->update();
      return response()->json(['success'=>Lang::get('app.Updated')]);
    }
}
