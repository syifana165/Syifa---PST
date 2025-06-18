<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        // Kirim jumlah pesan dengan status 'Pengaduan' ke semua view
        View::composer('*', function ($view) {
            $jumlahPesanBaru = DB::table('tb_pengaduan')
                ->where('status', 'Pengaduan')
                ->count();

            $view->with('jumlahPesanBaru', $jumlahPesanBaru);
        });
    }
}
