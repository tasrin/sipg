<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Schema;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        require_once app_path('Helpers/Helper.php');
    }

    public function boot()
    {
        Schema::defaultStringLength(191);
        
        $page = Request::segment(1);
        $sub = Request::segment(2);
        $user = Auth::user();
        View::share([
            'page'=>$page,
            'sub'=>$sub,
            'user' => $user,
        ]);
    }
}
