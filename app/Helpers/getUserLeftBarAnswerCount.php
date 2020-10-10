<?php

use App\Answer;
use App\User;
use Illuminate\Support\Facades\Auth;

function getUserLeftBarAnswerCount(){
    $i = 0;
    $count = [];
    $answers = Answer::all();

//    dd( $answers );

    foreach ($answers as $answer) {
        if( !is_null($answer->answerAnnounce->first()) ) {

            if ($answer->answerAnnounce->first()->user_id == Auth::user()->id) {

                $count[$i++] = $answer->answerAnnounce;
            }
        }
    }

//    dd( $count );

    return count($count);
}
