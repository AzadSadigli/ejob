<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resume;
use Lang;
use Auth;
use App\Edu;
use App\Exp;
use Session;
use DB;
use Hash;
use App\Socnet;
use App\Skill;
class ResumeController extends Controller
{
    public function addresume(){
      return view('resume.add-resume');
    }
    public function deletesocnet($id){
      Socnet::find($id)->delete($id);
      return response()->json(['success'=>Lang::get('app.Added'),'error' => Lang::get('app.Failed')]);
    }
    public function addsocnet(Request $req){
      $sn = new Socnet;
      $sn->site = $req->site;
      $sn->user_id = $req->user_id;
      $sn->res_id = $req->res_id;
      if ($req->site == 'facebook'){
        $sn->icon = 'fa fa-facebook';
      }
      if ($req->site == 'whatsapp'){
        $sn->icon = 'fa fa-whatsapp';
      }
      if ($req->site == 'instagram'){
        $sn->icon = 'fa fa-instagram';
      }
      if ($req->site == 'linkedin'){
        $sn->icon = 'fa fa-linkedin';
      }
      if ($req->site == 'telegram'){
        $sn->icon = 'fa fa-telegram';
      }
      if ($req->site == 'google-plus'){
        $sn->icon = 'fa fa-google-plus';
      }
      if ($req->site == 'twitter') {
        $sn->icon = 'fa fa-twitter';
      }
      $sn->company_id = $req->company_id;
      $sn->link = $req->link;
      $sn->save();
      return response()->json(['success'=>Lang::get('app.Added'),'error' => Lang::get('app.Failed')]);
    }
    public function allresumes(){
      $resumes = Resume::where('user_id',Auth::user()->id)->get();
      return view('resume.resume',compact('resumes'));
    }
    public function getresume($id){
      $res = Resume::where('username',$id)->first();
      return view('resume.res',compact('res'));
    }
    public function myresume($id){
      $res = Resume::find($id);
      return view('resume.resume',compact('res'));
    }
    public function hideres(Request $req,$id){
      $res = Resume::find($id);
      if ($res->user_id == Auth::user()->id) {
        $res->status = 0;
        $res->update();
        return response()->json(['success'=>Lang::get('app.Added'),'error' => Lang::get('app.Failed')]);
      }else{
        return response()->json(['success'=>Lang::get('app.Added'),'error' => Lang::get('app.Failed')]);
      }
    }
    public function showres(Request $req,$id){
      $res = Resume::find($id);
      if ($res->user_id == Auth::user()->id) {
        $res->status = 1;
        $res->update();
        return response()->json(['success'=>Lang::get('app.Added'),'error' => Lang::get('app.Failed')]);
      }else{
        return response()->json(['success'=>Lang::get('app.Added'),'error' => Lang::get('app.Failed')]);
      }
    }
    public function editresume(Request $req, $id){
      $res = Resume::find($id);
      if ($res->user_id == Auth::user()->id) {
        $res->title = $req->title;
        $res->full_name = $req->full_name;
        if ($req->status == 0) {
          $res->status = 0;
        }else{
          $res->status = 1;
        }
        if (empty($req->username)) {
          $num = rand(10000000,20000000);
          while (Resume::where('username',$num)->where('id','!=',$id)->count() != 0) {
            $num = rand(10000000,20000000);
          }
          $res->username = $num;
        }else{
          $res->username = $req->username;
        }
        $res->email = $req->official_email;
        $res->about_me = $req->about;
        $res->website = $req->website;
        $res->location = $req->location;
        $res->phone_number = $req->phone_number;
        $res->update();
      }
      return response()->json(['success'=>Lang::get('app.Added'),'error' => Lang::get('app.Failed')]);
    }
    public function addnewresume(Request $req){
      $this->validate($req,[
        'full_name' => 'required|string|min:2',
        'username' => 'required|unique:resumes',
        'title' => 'required|string',
        'official_email' => 'required|string|min:5',
        // 'about' => '',
        'website' => 'string',
        'location' => 'integer',
        'phone_number' => 'string',
      ]);
      $res = new Resume;
      $res->user_id = Auth::user()->id;
      $res->full_name = $req->full_name;
      if (empty($req->username)) {
        $num = rand(10000000,20000000);
        while (Resume::where('username',$num)->count() != 0) {
          $num = rand(10000000,20000000);
        }
        $res->username = $num;
      }else{
        $res->username = $req->username;
      }
      $res->title = $req->title;
      $res->email = $req->official_email;
      $res->about_me = $req->about;
      $res->image = 0;
      $res->website = $req->website;
      $res->location = $req->location;
      $res->phone_number = $req->phone_number;
      $res->status = 1;

      $res->resume = $req->resume;
      $res->cover_letter = $req->cover_letter;
      $res->save();
      $skills  = $req->get('skills');
      foreach($skills as $skill) {
        Skill::create([
          'skill' => $skill,
          'res_id' => $res->id,
        ]);
      }
      return redirect('my-resume/'.$res->id)->with('primary',Lang::get('app.Resume_created'));
    }
    public function addskill(Request $req){
      $skill = new Skill;
      $skill->skill = $req->skill;
      $skill->res_id = $req->res_id;
      $skill->save();
      return response()->json(['success'=>Lang::get('app.Added'),'error' => Lang::get('app.Failed')]);
    }
    public function deleteskill($id){
      Skill::find($id)->delete($id);
      return response()->json(['success'=>Lang::get('app.Added'),'error' => Lang::get('app.Failed')]);
    }
    public function addexperience(Request $req){
        $exp = new Exp;
        $exp->res_id = $req->res_id;
        $exp->company = $req->company;
        $exp->position = $req->position;
        $exp->description = $req->description;
        $exp->start_date = $req->start_date;
        $exp->present = 1;
        $exp->end_date = $req->end_date;
        $exp->save();
        return response()->json(['success'=>Lang::get('app.Added'),'error' => Lang::get('app.Failed')]);
    }
    public function addeducation(Request $req){
        $edu = new Edu;
        $edu->res_id = $req->res_id;
        $edu->degree = $req->degree;
        $edu->field = $req->field;
        $edu->school = $req->school;
        $edu->description = 0;
        $edu->start_date = $req->start_date;
        $edu->present = 1;
        $edu->end_date = $req->end_date;
        $edu->save();
        return response()->json(['success'=>Lang::get('app.Added'),'error' => Lang::get('app.Failed')]);
    }
    public function deletedu($id){
      Edu::find($id)->delete($id);
      return response()->json(['success'=>Lang::get('app.Added'),'error' => Lang::get('app.Failed')]);
    }
    public function deletexp($id){
      Exp::find($id)->delete($id);
      return response()->json(['success'=>Lang::get('app.Added'),'error' => Lang::get('app.Failed')]);
    }
    public function deleteresume(Request $req,$id){
      $this->validate($req,[
        'password' => 'required'
      ]);
      if (Hash::check($req->password, Auth::user()->password)) {
        Resume::find($id)->delete($id);
        return redirect()->back()->with('danger',Lang::get('app.Resume_deleted'));
      }else{
        return redirect()->back()->with('danger',Lang::get('app.Failed_to_delete'));
      }
    }
}
