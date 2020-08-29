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
        $user = User::where('status', 2)->with(['sellerTypes', 'statusName'])->find($id);

        if( ! $user ) return abort(404);

        return view('users.seller.profile', compact('user'));
    }
}
