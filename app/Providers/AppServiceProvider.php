<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('Debugbar', \Barryvdh\Debugbar\Facades\Debugbar::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        setlocale(LC_ALL, 'ru_RU.UTF-8');

        Carbon::setLocale('ru');
        $Carbone = Carbon::now()->locale('ru_RU');


        $verticalMenuJson = file_get_contents(base_path('resources/admin/data/menus/vertical-menu.json'));
        $verticalMenuData = json_decode($verticalMenuJson);


        // share all menuData to all the views
        \View::share('menuData', [$verticalMenuData]);
        \View::share('Carbone', $Carbone);

        Relation::enforceMorphMap([
            'product' => 'App\Models\Product',
            'firm' => 'App\Models\Firm',
            'user' => 'App\Models\User',
           // 'posts' => 'App\Models\Post',
        ]);
    }
}
