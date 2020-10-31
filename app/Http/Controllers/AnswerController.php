<?php

namespace App\Http\Controllers;

use App\AnnouncementUser;
use App\Answer;
use App\Condition;
use App\User;
use App\Announcement;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function answersAnnounce()
    {
        if (Auth::check()) {
            $answers_all = $this->getAllAnswers();

//            dd( $answers_all->get()[5]->getanswerusers );
//            dd( mt_rand(0, 999) );

            $answers_paginate = $answers_all;
            $answers_all_paginate = $answers_paginate->orderByDesc('created_at')->paginate(2);

            return view('announcements.answers')
                ->with([
                    'answers_all' => $answers_all->get(),
                    'answers_all_paginate' => $answers_all_paginate,
                ]);
        }
    }

    public function getAllAnswers(){
        $answers_all = Announcement::with('getIsAnswers','user')
            ->where('user_id',Auth::user()->id)
            ->whereHas('getIsAnswers', function(Builder $builder){
                return $builder->where('id','!=', null);
            });

        return $answers_all ?? false;
    }

    public function answersAnnouncePostVue()
    {
        $answers = $this->getAllAnswers();

        if( $answers && $answers->get()->count() > 0 ){
            return response()->json([
                'answers_all' => $answers->get()
            ], 200);
        }

        return response()->json([
            'errors' => 'Woops answers = ' . $answers
        ], 404);
    }

    public function getAnswersDetailsVue(Request $request)
    {
        if( Auth::check() ){
            if( isset($request->answer) && !is_null($request->answer) ){

            }
        }

        return redirect()->route('home');
    }

    public function answersAnnounceCreate(Request $request)
    {
        $request->validate([
            'which' => 'required',
            'price' => 'required|numeric'
        ]);

        $answer = Answer::create([
            'announcement_id' => $request->order_id ?? 0,
            'user_id' => Auth::user()->id ?? 0,
            'which' => $request->which,
            'price' => $request->price,
        ]);

        if ($answer) {
            return response()->json([
                'message' => [
                    ['Siz ' . ".$request->spare_parts." . ' elanına cavab verdiniz.']
                ]
            ], 200);
        }

        return response()->json([
            'errors' => ['Whops' => ['Whos!!!']]
        ], 404);
    }

    public function getShowAllAnswerVue(Request $request)
    {
        if (isset($request->answer_id) && isset($request->seller_id)) {
            $answer = Answer::where([
                'announcement_id' => $request->answer_id,
                'user_id' => $request->seller_id
            ])->first();

            if ( !is_null($answer) && !empty($answer) ) {
                return response()->json([
                    'answer' => $answer
                ], 200);
            }

            return response()->json([
                'error' => 'Woops!!! for - '. $request->answer_id .'/+'. $request->seller_id
            ], 404);
        }

        return response()->json([
            'error' => 'Woops!!! for - answer_id and seller_id'. $request->answer_id .'/'. $request->seller_id
        ], 404);
    }

    public function getAnswerSellersVue(Request $request)
    {
        if( !empty($request->seller_id) ) {

            $seller = User::select('id', 'name', 'phone')->where('id', $request->seller_id)->first();

            if( !is_null($seller) && !empty($seller) ) {
                if(  !is_null($request->announcement_id) && !empty($request->announcement_id) ){
                    $updated = $this->answerSeenUpdate($request);
                }

                return response()->json([
                    'seller' => $seller,
                    'seen' => $updated
                ], 200);
            }

            return response()->json([
                'errors' => 'Satıcı tapılmadı!'
            ], 404);
        }
    }

    protected function answerSeenUpdate(Request $request){
        if(
            !is_null( $request->announcement_id ) &&
            !empty( $request->announcement_id ) &&
            !is_null( $request->seller_id ) &&
            !empty( $request->seller_id )
        ){
            $answer = Answer::where([
                'announcement_id' => $request->announcement_id,
                'user_id' => $request->seller_id,
            ])->first();

            if( ! $answer ) return null;

            if( $answer->announcement->user_id == Auth::user()->id ) {
                if($answer->seen == null ) {
                    $is_updated = $answer->update([
                        'seen' => Auth::user()->id
                    ]);

                    if( $is_updated ){
                        return response()->json([
                            'answers' => $answer,
                        ], 200);
                    }
                }

                return response()->json([
                    'answers' => $answer,
                ], 200);
            }

            return response()->json([
                'errors' => 'Uncurrent user ',
            ], 404);
        }

        return response()->json([
            'errors' => 'Failed  announcement_id and seller_id',
        ], 404);
    }

    public function getUserLeftBarAnswer(Request $request){
        if( Auth::check() ) {
            $answers = Answer::whereHas('announcement', function (Builder $query) {
                return $query->where('user_id', Auth::user()->id);
            })->get();

            if( !$answers->count() ) {
                return response()->json([
                    'errors' => 'Woops!!!'
                ], 404);
            }

            return response()->json([
                'answers' => $answers
            ], 200);
        }

        return redrect()->route('home');
    }
}
