<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::if('admin',function(){
            if(auth()->user()->role == 1){
                return true;
            } else{
                return false;
            }
        });

        Blade::if('student',function(){
            if(auth()->user()->role == 2){
                return true;
            } else {
                return false;
            }
        });

        Blade::if('enterprise',function(){
            if(auth()->user()->role == 3){
                return true;
            } else {
                return false;
            }
        });

        Blade::if('academic',function(){
            if(auth()->user()->role == 4){
                return true;
            } else{
                return false;
            }
        });
    }
}
