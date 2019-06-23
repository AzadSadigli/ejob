<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;
use Lang;
class UserController extends Controller
{
    public function changepassword(){
        return view('pages.change_password');
    }
    public function acc_settings(){
      return view('pages.change_password');
    }
    public function edituser(Request $req){
      $this->validate($req,[
        'name' => 'string|min:2|required',
        'surname' => 'string|min:2|required',
        'username' => 'string|min:2|unique:users,username,'.Auth::user()->id,
        'email' => 'string|min:4|unique:users,email,'.Auth::user()->id,
        'birthdate' => 'date|required',
      ]);
      $user = User::find(Auth::user()->id);
      $user->name = $req->name;
      $user->surname = $req->surname;
      $user->username = $req->username;
      $user->email = $req->email;
      $user->birthdate = $req->birthdate;
      $user->update();
      return redirect()->back()->with('success',Lang::get('app.Profile_settings_changed'));
    }
    public function changepass(Request $req){
      if (password_verify($req->old_password, Auth::user()->password)) {
        $this->validate($req,[
            'password' =>'required|string|min:6|confirmed'
        ]);
        $user = User::find(Auth::user()->id);
        $user->password = Hash::make($req->password);
        $user->update();
        return redirect()->back()->with('success',Lang::get('app.Password_updated'));
      }else{
        return redirect()->back()->with('danger',Lang::get('app.Password_does_not_match'));
      }
    }
}
