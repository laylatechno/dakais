<?php

namespace App\Providers;

use App\Models\Link;
use App\Models\Profil;
use App\Models\Siswa; // Tambahkan model Siswa
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        $profil = Profil::where('id', 1)->first();
        View::share('profil', $profil);

        // Bagikan data link
        $link = Link::all(); // Atau sesuaikan dengan kondisi yang Anda butuhkan
        View::share('link', $link);

        View::composer('*', function ($view) {
            if (Auth::guard('siswa')->check()) {
                $view->with('loggedInSiswa', Auth::guard('siswa')->user());
            }
        });
    }
}
