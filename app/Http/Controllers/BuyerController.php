<?php

namespace App\Http\Controllers;

use App\Announcement;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuyerController extends Controller
{
    public function index()
    {

    }

    public function profile($id)
    {
        $user = User::with('getSends')->find($id);

        if( ! $user ) return abort(404);

        return view('users.buyer.profile', [
            'user' => $user,
        ]);
    }

}
