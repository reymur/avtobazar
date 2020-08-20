<?php

namespace App\Http\Controllers;

use App\Car;
use App\City;
use App\Motor;
use App\Select;
use App\Type;
use App\Year;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return false|\Illuminate\Contracts\Foundation\Application
     */
    public function index()
    {
        $cars= Car::all();

        if( ! $cars ) return false;

        return view('home', compact('cars'));
    }
}
