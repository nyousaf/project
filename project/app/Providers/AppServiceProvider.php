<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Settings;
use App\Social;
use App\Pages;
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
        Schema::defaultStringLength(191);

        view()->composer('*', function ($view)
        {
            $general = Settings::first();
            $auth = Auth::user();
            $social = Social::all();
            $f_menu = Pages::all();
            $settings = Settings::first();
            // if (Auth::check()) {
            //     $auth1 = Auth::user();
            //     $last_wallet = Wallet::where('user_id', $auth1->id)->get()->first();
            // }
            $view->with(['general' => $general, 'auth' => $auth, 'social' => $social, 'f_menu' => $f_menu, 'settings' => $settings]);
        });
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
