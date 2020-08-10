<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarsController extends Controller
{
    public function index()
    {
        return view('pages.cars.index');
    }

    public function car()
    {
        return view('pages.cars.current_car');
    }
}
