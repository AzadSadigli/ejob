<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vacancy;
use Auth;
use Lang;
class JobController extends Controller
{
    public function jobdetails($id){
      $vac = Vacancy::where('vac_id',$id)->first();
      return view('job.jobdetails',compact('vac'));
    }
    public function all_my_vacancies(){
      $vacs = Vacancy::where('user_id',Auth::user()->id)->get();
      return view('job.myjobs',compact('vacs'));
    }
    public function addvacancy(){
      return view('job.addvacancy');
    }
    public function jobs(){
      return view('job.joblist');
    }
    public function test(){
      $num = rand(10000000,20000000);
      while ($num != 15000000) {
        $num = rand(10000000,20000000);
      }
      // $token = md5(microtime().Auth::user()->id);
      // while ($token == '015e6dd94c52d8413db8ea8444912bdf') {
      //   $token = md5(microtime());
      // }
      echo $num;
    }
    public function addjob(Request $req){
      $vac = new Vacancy;
      $vac->user_id = Auth::user()->id;
      $vac->lang = config('app.locale');
        $num = rand(10000000,20000000);
        while (Vacancy::where('vac_id',$num)->count() != 0) {
          $num = rand(10000000,20000000);
        }
      $vac->vac_id = $num;
      $vac->token = md5(microtime());
      $vac->title = $req->title;
      $vac->status = 1;
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
      return redirect('/all-vacancies')->with('success',Lang::get('app.Added'));
    }
}
