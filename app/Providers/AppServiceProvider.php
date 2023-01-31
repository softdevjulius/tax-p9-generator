<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
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

        Model::unguard();

        view()->composer(['tax_return.generate_p9'],function ($view){
            return $view->with([
                "segment1" => @request()->segments()[0],
                "segment2" => @request()->segments()[1],
                "segment3" => @request()->segments()[2],
            ]);
        });
    }
}
