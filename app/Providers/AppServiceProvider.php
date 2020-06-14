<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Notifikasi;
use Auth;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (Auth::check()) {
              
            $getNotif = Notifikasi::where([
                ['idStakeholder', '=', Auth::user()->id],
                ['status', '=', 'unread']
            ])->get();
            View::share('data', $getNotif);
                // $view->with('data', );
          
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    
}
