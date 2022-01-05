<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use DB;
use Event;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      Schema::defaultStringLength(191);
      DB::connection()->enableQueryLog();
      Event::listen('kernel.handled',function($req,$res){
        if ($req->has('query-log')) {
          $qu = DB::getQueryLog();
          dd($qu);
        }
      });
    }
}
