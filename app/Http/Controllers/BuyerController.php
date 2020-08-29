<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class BuyerController extends Controller
{
    public function index()
    {

    }

    public function profile($id)
    {
        $user = User::find($id);

        if( ! $user ) return abort(404);

        return view('users.buyer.profile', [
            'user' => $user
        ]);
    }

}
