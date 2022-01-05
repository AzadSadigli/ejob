<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Vacancy;
use Illuminate\Support\Facades\Crypt;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){
      $vacs = Vacancy::where('status',1)->take(24)->get();
      return view('index',compact('vacs'));
    }
    public function contact(){
      return view('pages.contact');
    }
    private function gettest($mynum){
      echo "max number is <b>".$mynum."</b>";
    }
    public function testing(){
      // $text = "Testing";
      // $text = Crypt::encryptString($text);
      // $text = Crypt::decryptString($text);
      // echo $text;

      $arr = [676,10,23,5,23,6,27,56,999,345,234,23,65];
      $max = 0;
      for ($i=0; $i < count($arr); $i++) {
        if ($i != 0) {
          if ($arr[$i] > $max) {$max = $arr[$i];}
        }else if($arr[0] > $max){
          $max = $arr[0];
        }
      }
      $this->gettest($max);
      // return $max;
    }
}
