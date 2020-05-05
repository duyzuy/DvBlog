<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Posts;


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
        Schema::defaultStringLength(191);
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //option 1

        // View::share('postsRecent', Posts::orderBy('id', 'desc')->paginate(2));
        

        //option 2
        
        // view::composer(['frontend.posts.detail', 'frontend.posts.lists'], function($view){

        //     $view->with('postsRecent', Posts::orderBy('id', 'desc')->paginate(3));
        // });
        

        //option 3: make view composer

        view::composer(
            ['frontend.posts.detail', 'frontend.posts.lists'],
            'App\Http\View\Composers\PostsComposer'
        
        );
    }

 
}
