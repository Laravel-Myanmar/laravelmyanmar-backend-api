<?php

namespace App\Providers;

use App\Observers\ArticleObserver;
use Illuminate\Support\ServiceProvider;
use App\Modules\Articles\Models\Article;

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
        Article::observe(ArticleObserver::class);
    }
}
