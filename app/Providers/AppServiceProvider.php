<?php

namespace App\Providers;

use App\Models\Language;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
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

        Paginator::useBootstrapFive();

       if(Schema::hasTable((new Language)->getTable())){

     $this->setDefaultLanguage();


     $this->setFallbackLanguage();
       }
//Просмотр количества запросов к базе
       DB::listen(function($query){

        info($query->sql,$query->bindings);

       });

//////////////////////////////////////////////
    }

    private function setDefaultLanguage(){


        $language = Language::findDefault();
        $language && $this->app->setLocale($language->id);
    }

    private function setFallbackLanguage(){
        $language = Language::findFallback();
        $language && app()->setFallbackLocale($language->id);
    }
}
