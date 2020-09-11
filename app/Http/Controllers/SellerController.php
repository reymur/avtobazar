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
        $user = User::where('status', 2)->with(['sellerTypes', 'statusName', 'whos'])->find($id);

        if (!$user) return abort(404);

        return view('users.seller.profile', compact('user'));
    }

    public function getWhos(Request $request)
    {
        if( $request->id == 3 ){
            return $this->getWhosWithId();
        }

        $users = User::where([
            'who' => $request->id,
            'status' => 2
        ])->get();

        if( ! count($users) ) {
            return response()->json([
                'errors' => 'error'
            ],404);
        }

        return response()->json([
            'users' => $users
        ],200);
    }

    private function getWhosWithId()
    {
        $users = User::where('status', 2)->get();

        if( ! count($users) ) {
            return response()->json([
                'errors' => 'error'
            ],404);
        }

        return response()->json([
            'users' => $users
        ],200);
    }
}
