<?php

use App\Answer;
use App\User;
use Illuminate\Support\Facades\Auth;

    function getUserLeftBarOrderCount(){
        $new_orders = 0;
        $user = Auth::user();
        $orders = User::with('announcementUser','getMyAnswers')
            ->where('id', $user->id)
            ->first();

//        dd( $orders->announcementUser );
//        dd( $orders->getMyAnswers );
        $i = 0;
        $arr = [];

        if( $orders->getMyAnswers->count() ) {
            foreach ($orders->announcementUser as $order ) {
                foreach ( $orders->getMyAnswers   as $answer ) {
                    if (($answer->user_id == $order->user_id) &&
                        ($answer->announcement_id == $order->announcement_id)) {

                    } elseif ($answer->user_id == Auth::user()->id) {
                        $arr[$i++] = $order;
                        $new_orders++;
                    }
                }
            }
        }else{
            $new_orders = $orders->announcementUser->count();
        }

//        dd( $new_orders );

        return [$orders->announcementUser, $new_orders];
    }
