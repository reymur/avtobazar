<?php

use App\Answer;
use App\User;
use Illuminate\Support\Facades\Auth;

function getUserLeftBarOrderCount(){
    $new_orders = 0;
    $user = Auth::user();
    $orders = User::with('announcement')
        ->where('id', $user->id)
        ->first();

    foreach ($orders->announcement  as $item) {
        if( ! $item->getSellerAnswers->count() ){
            $new_orders++;
        }
    }

    return [$orders->first()->announcement,$new_orders];
}
