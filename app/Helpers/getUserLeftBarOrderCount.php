<?php

use App\User;
use Illuminate\Support\Facades\Auth;

function getUserLeftBarOrderCount(){
    $user = Auth::user();
    $orders = User::with('announcement')->where('id', $user->id);

    return $orders->first()->announcement->count();
}
