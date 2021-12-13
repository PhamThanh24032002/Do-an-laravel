<?php

namespace App\Providers;

use App\Models\category;
use App\Models\Contact;
use App\Models\logo;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
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
      
        view()->composer('*',function($view){
            $logo = logo::where('status',1)->first();
            $contact = Contact::all();
            $category = category::all();
            $view->with([  
                'logo'=>$logo,
                'contact'=>$contact,
                'category'=>$category
            ]);
        });
        Paginator::useBootstrap();
    }
}
