<?php

namespace App\Providers;

use App\Models\Cart;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Number;
use Illuminate\Support\ServiceProvider;
use Opcodes\LogViewer\Facades\LogViewer;

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
       // Model::shouldBeStrict();
        Number::useLocale('ru');

        setlocale(LC_ALL, 'ru_RU.UTF-8');

        Carbon::setLocale('ru');
        $Carbone = Carbon::now()->locale('ru_RU');

        $verticalMenuJson = file_get_contents(base_path('resources/admin/data/menus/vertical-menu.json'));
        $verticalMenuData = json_decode($verticalMenuJson);


        // share all menuData to all the views
        \View::share('menuData', [$verticalMenuData]);
        \View::share('Carbone', $Carbone);

        LogViewer::auth(function () {
            return Auth::check();
        });

        Relation::enforceMorphMap([
            'product' => 'App\Models\Product',
            'firm' => 'App\Models\Firm',
            'slider' => 'App\Models\Slider',
            'user' => 'App\Models\User',
            'collection' => 'App\Models\Collection',
          //  'attribute' => 'App\Models\Attribute',
        ]);
    }
}
