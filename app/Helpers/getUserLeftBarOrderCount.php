<?php

use App\Answer;
use App\User;
use Illuminate\Support\Facades\Auth;

    function getUserLeftBarOrderCount(){
        $user = Auth::user();

        if( $user->announcementUser->count() ) {
            $orders = $user->announcementUser->map(function ($user) {
                return $user->only(['announcement_id', 'user_id']);
            })->pluck('announcement_id')->toArray();

            if( $user->getMyAnswers->count() ) {
                $answers = $user->getMyAnswers->map(function ($user) {
                    return $user->only(['announcement_id', 'user_id']);
                })->pluck('announcement_id')->toArray();

                $new_orders = collect($orders)->diff( collect($answers) )->count();
                return [$user->announcementUser->count(), $new_orders];
            }

            return [
                $user->announcementUser->count(),
                $new_orders = $user->announcementUser->count()
            ];
        }

        return [
            $user->announcementUser->count(),
            $new_orders = $user->getMyAnswers->count()
        ];
    }
