<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Anhskohbo\NoCaptcha\Facades\NoCaptcha;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        // Kirim jumlah artikel ke semua view
        View::composer('*', function ($view) {
            $jumlahArtikel = DB::table('tb_artikel')->count();

            $view->with('jumlahArtikel', $jumlahArtikel);
        });
    }
}
