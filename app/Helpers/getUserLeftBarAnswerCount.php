<?php

use App\Answer;
use App\User;
use Illuminate\Support\Facades\Auth;

function getUserLeftBarAnswerCount(){

    $count = 0;
    $answers = Answer::all();

    foreach ($answers as $answer) {
        if( !is_null($answer->answerAnnounce->first()) ) {

            if ($answer->answerAnnounce->first()->user_id === Auth::user()->id) {

                $count++;
            }
        }
    }

    return $count;
}
