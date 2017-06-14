<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Person;
use App\Material;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share([
            'allPersons'=> Person::all(),
            'allrests'=> Person::sum('rest'),
            'allPersonsCount'=> Person::get()->count(),
            'allMaterials'=> Material::all(),
            'allKridis'=> Material::sum('price'),
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
