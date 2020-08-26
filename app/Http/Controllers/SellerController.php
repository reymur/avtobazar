<?php

namespace App\Http\Controllers;

use App\Car;
use App\City;
use App\Motor;
use App\Type;
use App\User;
use App\Year;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function index()
    {
        return view('users.seller');
    }

    public function profile($id)
    {
        $user = User::with(['statusName'])->find($id);

        if( ! $user ) return abort(404);

        return view('users.profiles.profile', compact('user'));
    }
}
