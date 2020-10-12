<?php

use App\Answer;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

function getUserLeftBarAnswerCount(){
    $i = 0;
    $count = [];
    $answers = Answer::whereHas('announcement', function(Builder $query){
        return $query->where('user_id', Auth::user()->id);
    })->get();

//    dd( $count );

    return $answers->count() ?? 0;
}
