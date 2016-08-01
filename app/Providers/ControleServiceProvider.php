<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class ControleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Using class based composers...
//        view()->composer(
//            'profile', 'App\Http\ViewComposers\ProfileComposer'
//        );

        // Using Closure based composers...
        $views = ['layout.controle', 'controle.permissao.index'];
        view()->composer($views, function ($view) {
            $usuario = Auth::user();
            $view->with('usuario', $usuario);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
