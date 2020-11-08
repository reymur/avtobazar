<?php

namespace App\Http\Controllers;

use App\AnnouncementUser;
use App\Answer;
use App\Http\Resources\AnswerCollection;
use App\Http\Resources\AnswerResource;
use App\User;
use App\Announcement;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

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
//            dd( new AnswerResource( Answer::first() ) );

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
        $answers_all = Announcement::with('user','getSender','getFuelType','getIsAnswers','getCondition')
            ->where('user_id',Auth::user()->id)
            ->whereHas('getIsAnswers', function(Builder $builder){
                return $builder->where('id','!=', null);
            })
            ->orderByDesc('created_at');

        return $answers_all ?? false;
    }

    public function answersAnnouncePostVue()
    {
        $answers = $this->getAllAnswers();

        if( $answers && $answers->get()->count() > 0 ){
//            return new AnswerCollection( $answers->get() );
            return ( new AnswerCollection( $answers->get() ) )
                    ->response()->setStatusCode(200);
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
        if( Auth::check() ) {
            if( $request->has('image') && $request->image !== "null" ) {
                $this->answersAnnounceCreateValidate($request, true);
                $image = $this->answersAnnounceCreateImageUpload($request);

                if( $image )
                    $this->answersAnnounceCreateWithImage($request, $image);
                else {
                    $message = 'answersAnnounceCreateImageUpload returned null';
                    return $this->errorReturn($message);
                }
            }
            else {
                $this->answersAnnounceCreateValidate($request, false);
                $this->answersAnnounceCreateWithOutImage($request);
            }
        }
    }

    public function answersAnnounceCreateImageUpload($request){
        if( $request->hasFile('image') ){
            $new_image_name = $this->generateImageName($request->image);
            $path = public_path('images/users/announcement/answers/');

            if( is_dir( $path ) && $new_image_name ){
                $img = Image::make($request->image);
                $img->resize(500, null, function($constraint){
                    $constraint->aspectRatio();
                });
                $is_saved = $img->save($path . $new_image_name );

                if( $is_saved ) return $new_image_name;
                else {
                    $message = 'Answer Image no saved';
                    return $this->errorReturn($message);
                }
            }

            $message = 'Path is not dir or new_image_name failed';
            return $this->errorReturn($message);
        }

        $message = 'Path is not dir or new_image_name failed';
        return $this->errorReturn($message);
    }

    public function errorReturn($message){
        return response()->json([
            'errors' => [
                ['image' => $message]
            ]
        ]);
    }

    public function answersAnnounceCreateWithImage($request, $image){
        $answer = Answer::create([
            'announcement_id' => $request->order_id ?? 0,
            'user_id' => Auth::user()->id ?? 0,
            'which' => $request->which ?? null,
            'price' => $request->price ?? null,
            'condition' => $request->condition ?? null,
            'image' => $image ?? null
        ]);

        return $answer;
    }

    public function generateImageName($image_name){
        if( !empty($image_name) ){
            $extension = $image_name->getClientOriginalExtension();

            $new_name = time() . '_' . random_int(0, 9999) . '.' . $extension;

            return $new_name ?? null;
        }

        return null;
    }

    public function answersAnnounceCreateWithOutImage($request){
        $answer = Answer::create([
            'announcement_id' => $request->order_id ?? 0,
            'user_id' => Auth::user()->id ?? 0,
            'which' => $request->which ?? null,
            'price' => $request->price ?? null,
            'condition' => $request->condition ?? null,
            'image' => null,
        ]);

        return $answer;
    }

    public function answersAnnounceCreateValidate($request, $image = false ){
        if( $image == true ){
            return $request->validate([
                'which' => 'required',
                'price' => 'required|numeric',
                'condition' => 'required|string',
                'image' => 'mimes:jpg,jpeg,png,bmp,gif,webp, max:8000',
            ]);
        }

        return $request->validate([
            'which' => 'required',
            'price' => 'required|numeric',
            'condition' => 'required|string',
        ]);
    }

    public function getShowAllAnswerVue(Request $request)
    {
        if (isset($request->answer_id) && isset($request->seller_id)) {
            $answer = AnswerResource::where([
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
                            'answer' => $answer,
                            'is_updated' => true,
                        ], 200);

//                        return $this->getAnswersResponse($answer, 444, 200);
                    }
                }

                return response()->json([
                    'answer' => $answer,
                    'is_updated' => false,
                ], 200);

//                return $this->getAnswersResponse($answer, 000, 200);
            }

            return response()->json([
                'errors' => 'Not user ',
            ], 404);
        }

        return response()->json([
            'errors' => 'Failed  announcement_id and seller_id',
        ], 404);
    }

    public function getAnswersResponse($model, $is_updated, $status = false){
        if( $status ) {
            return ( new AnswerResource($model, $is_updated) )
                    ->response()->setStatusCode(200);
        }

        return ( new AnswerResource($model) );
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

    }
}
