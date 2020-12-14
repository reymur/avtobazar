<?php

namespace App\Providers;

use App\Car;
use App\City;
use App\Condition;
use App\FuelType;
use App\Motor;
use App\Type;
use App\Who;
use App\Year;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class GlobalVarsProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $who = Who::get();
        $cars = Car::with('types')->get();
        $types = Type::get();

        $cities = City::all();
        $years = Year::orderBy('id','desc')->get();
        $motors = Motor::all();
        $fuel_types = FuelType::all();

        $conditions = Condition::all();

        View::share([
            'who' => $who,
            'cars' => $cars,
            'types' => $types,
            'cities' => $cities,
            'years' => $years,
            'motors' => $motors,
            'fuel_types' => $fuel_types,
            'conditions' => $conditions
        ]);
    }
}
