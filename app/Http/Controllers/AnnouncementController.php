<?php

namespace App\Http\Controllers;

use App\AnnouncementUser;
use App\Answer;
use App\Condition;
use App\Events\OrdersCount;
use App\User;
use App\Announcement;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SendAnnounceRequest;
use Intervention\Image\Facades\Image;
use NunoMaduro\Collision\Provider;

class AnnouncementController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $arr = [1,2];
        return view('announcements.index')->with( 'sends', $arr);
    }

    public function flash()
    {
        if ( Auth::check() ) {
            return redirect()->route('send')
                ->with('send_flash', 1);
        }
    }

    public function getOrders(){
        if( Auth::check() ){
            $user = Auth::user();
            $orders = AnnouncementUser::where('user_id', $user->id)->get();
            $ansers = Answer::where('user_id',$user->id)->get();

            $announce_ids = $orders->pluck('announcement_id');
            $my_answers = $ansers->whereIn('announcement_id', $announce_ids)
                ->where('user_id',$user->id);

            return response()->json([
                'orders' => $this->getNewOrderCount($announce_ids, $my_answers)
            ]);
        }
    }

    public function getNewOrderCount($announce_ids, $my_answers){
        if( $announce_ids->count() > 0 && $my_answers->count() > 0 ){
            $ord =    (int)$announce_ids->count();
            $my_ans = (int)$my_answers->count();

            return ($ord - $my_ans);
        }else {
            return $announce_ids->count();
        }
    }

    public function sendAnnounce(Request $request)
    {
        $this->announceValidate($request);

        $user = Auth::user();
        event( new OrdersCount($user) );

        $when = [];

        if ($request->when) {
            $when = explode(',', $request->when);
        }

        if ($request->when === 'Hamısı' && $request->image != 'null') {
            $pin = mt_rand(0, 999999);
            $image_saved = $this->whenWithAllWithImage($request, $pin, $when);

            return $this->jsonReturn($request, $image_saved);
        } elseif ($request->when === 'Hamısı' && $request->image == 'null') {
            $pin = mt_rand(0, 999999);
            $image_saved = $this->whenWithAllWithoutImage($request, $pin);

            return $this->jsonReturn($request, $image_saved);
        } elseif ($request->when !== 'Hamısı' && $request->image != 'null') {
            if (count($when) > 0) {
                $pin = mt_rand(0, 999999);
                $image_saved = $this->whenWithoutAllWithImage($request, $when, $pin, $withimage = true);

                return $this->jsonReturn($request, $image_saved);
            }

            return false;
        } elseif ($request->when !== 'Hamısı' && $request->image == 'null') {
            if (count($when) > 0) {
                $pin = mt_rand(0, 999999);
                $image_saved = $this->whenWithoutAllWithoutImage($request, $when, $pin, $withimage = false);

                return $this->jsonReturn($request, $image_saved);
            }

            return false;
        }

        return response()->json([
            'errors' => 'is fail'
        ], 404);
    }

    protected function jsonReturn($request, $image_saved)
    {
        if ( $image_saved ) {
            return response()->json([
                'data' => [
                    'user_id' => Auth::user()->id,
                    'image' => $request->image,
                    'texpassport' => $request->texpassport,
                ]
            ], 200);
        } else {
            return response()->json([
                'data' => [
                    'errors' => ['has_seller_types' => ['Axtardığınız markaya uyğun "EHTIYAT HISƏLƏRİ" hələlik dəstəklənmir!']],
                ]
            ], 333);
        }

    }

    protected function whenWithoutAllWithImage($request, $when, $pin, $withimage)
    {
        return $this->createAnnounce($request, $when, $pin, $withimage);
    }

    protected function whenWithoutAllWithoutImage($request, $when, $pin, $withimage)
    {
        return $this->createAnnounce($request, $when, $pin, $withimage);
    }

    protected function createAnnounce($request, $when, $pin, $withimage)
    {
        $time = time();
        $has_seller_type = 0;
        $new_image_name = 0;

        if ($request->image && $withimage) {
            $new_image_name = $this->announceImageSave($request->image, $time);
        }

        if (isset($when) && count($when) > 0) {
            $announce = Announcement::create([
                'user_id' => Auth::user()->id,
                'spare_parts' => $request->spare_parts ?? NULL,
                'marka' => $request->marka ?? NULL,
                'model' => $request->model ?? NULL,
                'year' => $request->year ?? NULL,
                'motor' => $request->motor ?? NULL,
                'fuel_type' => $request->fuel_type ?? NULL,
                'condition' => $request->condition ?? NULL,
                'texpassport' => $request->texpassport ?? NULL,
                'city' => $request->city ?? NULL,
                'pin' => $pin,
                'image' => $withimage ? $new_image_name : NULL,
            ]);

            foreach ($when as $name) {
                $user = User::with('sellerTypes')->where(['name' => $name, 'status' => 2])->first();

                if ($user && $user->sellerTypes->count() > 0) {
                    foreach ($user->sellerTypes as $seller_type) {
                        if ($seller_type->title == $request->marka) {
                            $announce->user()->attach($user);
                            $has_seller_type++;
                        }
                    }
                }
            }
        }

        if ($has_seller_type == 0) return $has_seller_type;

        return $withimage ? $new_image_name : $announce ;
    }

    protected function whenWithAllWithImage($request, $pin, $when)
    {
        $time = time();
        $status = Auth::user()->status;
        $has_seller_type = 0;

        if ($request->image) {
            $image_new_name = $this->announceImageSave($request->image, $time);
        }

        if( $image_new_name ) {
            $users = User::with('sellerTypes')->where(['who' => $request->who, 'status' => 2])->get();

            if ($request->who == 3) {
                $users = User::with('sellerTypes')->where(['status' => 2])->get();
            }

            if (count($users) > 0) {
                $announce = Announcement::create([
                    'user_id' => Auth::user()->id,
                    'spare_parts' => $request->spare_parts ?? NULL,
                    'marka' => $request->marka ?? NULL,
                    'model' => $request->model ?? NULL,
                    'year' => $request->year ?? NULL,
                    'motor' => $request->motor ?? NULL,
                    'fuel_type' => $request->fuel_type ?? NULL,
                    'condition' => $request->condition ?? NULL,
                    'texpassport' => $request->texpassport ?? NULL,
                    'city' => $request->city ?? NULL,
                    'pin' => $pin,
                    'image' => $image_new_name ?? NULL,
                ]);

                foreach ($users as $user) {
                    if ($user->id != Auth::user()->id) {
                        foreach ($user->sellerTypes as $seller_type) {
                            if ($seller_type->title == $request->marka) {
                                $announce->user()->attach($user);
                                $has_seller_type++;
                            }
                        }
                    }
                }
            }

            if ($has_seller_type == 0) return $has_seller_type;

            return $image_new_name;
        }

        return false;
    }

    protected function whenWithAllWithoutImage($request, $pin)
    {
        $has_seller_type = 0;
        $users = User::with('sellerTypes')->where(['who' => $request->who, 'status' => 2])->get();

        if ($request->who == 3) {
            $users = User::with('sellerTypes')->where(['status' => 2])->get();
        }

        if (count($users) > 0) {
            $announce = Announcement::create([
                'user_id' => Auth::user()->id,
                'spare_parts' => $request->spare_parts ?? NULL,
                'marka' => $request->marka ?? NULL,
                'model' => $request->model ?? NULL,
                'year' => $request->year ?? NULL,
                'motor' => $request->motor ?? NULL,
                'fuel_type' => $request->fuel_type ?? NULL,
                'condition' => $request->condition ?? NULL,
                'texpassport' => $request->texpassport ?? NULL,
                'city' => $request->city ?? NULL,
                'image' => NULL,
                'pin' => $pin,
            ]);

            foreach ($users as $user) {
                if ($user->id != Auth::user()->id) {
                    foreach ($user->sellerTypes as $seller_type) {
                        if ($seller_type->title == $request->marka) {
                            $announce->user()->attach($user);
                            $has_seller_type++;
                        }
                    }
                }
            }
        }

        return $has_seller_type;
    }

    protected function setImageName($time, $image)
    {
        if ($image) {
            $extension = $image->getClientOriginalExtension();
            return $name = $time . '.' . $extension;
        }
    }

    protected function announceImageSave($file, $time)
    {
        if ($file && $time) {
            $extension = $file->getClientOriginalExtension();
            $new_name = $time .'_'. mt_rand(0,$time) .'.'. $extension;
            $path = public_path('images/users/announcement/orders/');

            if ( is_dir($path) ) {
                $img = Image::make($file);
                $img->resize(650, 450 );
                $img->save($path . $new_name);

                $img_small = Image::make($file);
                $img->resize(150, 120 );
                $img->save($path . 'small_'.$new_name);
            }

            return $img ? $new_name : $new_name;
        }
    }

    public function Send()
    {
        if (Auth::check()) {
            $announce = Announcement::with('getSeller', 'getAllSellers', 'getImageByName')
                ->where(['user_id' => Auth::user()->id]);

            $announce_all = $announce;
            $announce = $announce->get();
            $announce_all = $announce_all->orderByDesc('created_at')->paginate(5);

            if ($announce && $announce->count() > 0) {
                $condition = Condition::where('id', (int)$announce->last()->condition)->first();
            } else {
                $condition = null;
            }

            if ($announce && $announce->count() > 0) {
                $stores = [];
                $pin = $announce->last()->pin;
                $store = $announce->last()->user->where('who', 1);
                $morg = $announce->last()->user->where('who', 2);
            }

            if ($announce->count() == 0) {
                $announce = null;
            }

            return view('announcements.send')
                        ->with([
                            'announce' => $announce ? $announce->last() : NULL,
                            'announce_all' => $announce_all,
                            'announce_answer' => $announce ? $this->getLastAnnounceAnswe($announce->last()) : NULL,
                            'condition' => $condition,
                            'store' => $store ?? NULL,
                            'morg' => $morg ?? NULL,
                        ]);
        }
    }

    public function getLastAnnounceAnswe($announce)
    {
        if( !empty($announce) && $announce->count() > 0 ){
            return $announce->getIsAnswers->count() > 0 ? $announce->getIsAnswers : false ;
        }

        return false;
    }

    public function SendTo(Request $request)
    {
        if (!$request->who && !$request->pin) return abort(404);

        $announce = Announcement::with('user', 'getSeller')->where([
            'pin' => $request->pin,
            'user_id' => Auth::user()->id
        ])->first();

        if ($announce->count() == 0) return abort(404);

        $sellers = $announce->user->where('who', $request->who);

        if ($sellers->count() == 0) return abort(404);

        return view('announcements.send_to')->with([
            'sellers' => $sellers,
            'sends' => Auth::user()->getSends,
        ]);
    }

    public function answersAnnounce()
    {
        if (Auth::check()) {
            $answers_all = $this->getAllAnswers();

//            dd( $answers_all->get()[5]->getanswerusers );
//            dd( mt_rand(0, 999) );

            $answers_all = $answers_all;
            $answers_all_paginate = $answers_all->orderByDesc('created_at')->paginate(2);

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

    public function ordersAnnounce()
    {
        if( Auth::check() ) {
            $user = Auth::user();
            $orders = AnnouncementUser::with('user','announcement','getSellerAnswers')
                        ->whereIn('user_id', [ auth()->user()->id] )
                        ->orderByDesc('created_at')
                        ->get();

//            dd( $orders->first() );

            return view('announcements.orders', [
                'orders' => $orders
            ]);
        }
        else {
            return redirect()->route('home');
        }
    }

    protected function announceValidate($request)
    {
        if( $request->who == 1 ){
            if( $request->image == 'null' ){
                $request->validate([
                    'spare_parts' => 'required',
                    'when' => 'required',
                    'texpassport' => 'required',
                ]);
            }
            elseif( $request->image != 'null' ){
                $request->validate([
                    'spare_parts' => 'required',
                    'when' => 'required',
                    'texpassport' => 'required',
                    'image' => 'mimes:jpeg,png,bmp,gif,svg,webp, max:6000',
                ]);
            }
        }
        elseif( $request->who == 2 ){
            if( $request->image == 'null' ){
                $request->validate([
                    'spare_parts' => 'required',
                    'when' => 'required',
                ]);
            }
            elseif( $request->image != 'null' ){
                $request->validate([
                    'spare_parts' => 'required',
                    'when' => 'required',
                    'image' => 'mimes:jpeg,png,bmp,gif,svg,webp, max:4000',
                ]);
            }
        }
        elseif( $request->who == 3 ){
            if( $request->image == 'null' ){
                $request->validate([
                    'spare_parts' => 'required',
                    'when' => 'required',
                    'texpassport' => 'required',
                ]);
            }
            elseif( $request->image != 'null' ){
                $request->validate([
                    'spare_parts' => 'required',
                    'when' => 'required',
                    'texpassport' => 'required',
                    'image' => 'mimes:jpeg,png,bmp,gif,svg,webp, max:4000',
                ]);
            }
        }
    }

    public function getOrdersPaginate($orders, $count)
    {
        return $orders->first()->announcementUser()
            ->orderByDesc('id')->paginate($count);
    }

    public function orderAnnounceDelete($id)
    {
        if( Auth::check() ) {
            if( Auth::user()->status == 2 ){
//                dd( $id );
                $order = Announcement::find($id);

                if( ! $order ) return redirect()->back();

                $order->user()->detach(Auth::user()->id); // Delete on AnnouncementUser table

                $this->deleteMyAnswer( $order );

                return redirect()->back();
            }
        }
    }

    protected function deleteMyAnswer($order){
        $is_answer = Answer::where([
            'user_id' => Auth::user()->id,
            'announcement_id' => $order->id
        ])->get();

        if( $is_answer->count() > 0 ){
            foreach ( $is_answer as $answer ) {
                $this->imagedelete($answer, 'answers');

                $answer->delete();
            }
        }
    }

    protected function imagedelete($model, $path){
        if($model->image && $path){
            $path = public_path("images/users/announcement/{$path}/" );

            if( is_dir($path) ){
                if( is_file($path . $model->image) )
                    unlink($path . $model->image);
                if( is_file($path . 'small_' . $model->image) )
                    unlink($path . 'small_' . $model->image);
            }
        }
    }

    public function buyerAnnounceADelete($id)
    {
        if( Auth::check() ) {
            $announce = Announcement::find($id);
            $image = $announce->image ?? false;
            $path = public_path('images/users/announcement/orders/');

            if( !$announce ) return redirect()->back();

            if( $announce->user_id == Auth::user()->id ){
                $deleted_announce = $announce->delete();
                $this->imagedelete($announce, 'orders');

                if( $deleted_announce ) {
                    $this->deleteOnAnnouncementUsers($announce);
                    $this->deleteOnAnswers($announce);

                    return redirect()->back();
                }
            }

            return redirect()->back();
        }
    }

    protected function deleteOnAnnouncementUsers($announce){
        if( $announce ) {
            $announcement_users = AnnouncementUser::where('announcement_id', $announce->id)->get();

            if ($announcement_users->count() > 0) {
                foreach ($announcement_users as $announcement) {
                    $announcement->delete();
                }
            }
        }
    }

    protected function deleteOnAnswers($announce){
        if( $announce ) {
            $answers = Answer::where('announcement_id', $announce->id)->get();

            if ($answers->count() > 0) {
                foreach ($answers as $answer) {
                    $answer->delete();
                    $this->imagedelete($answer, 'answers');
                }
            }
        }
    }

    protected function buyerImageDelete($path, $image)
    {
        if( isset($path) && isset($image) ){
            if( is_dir($path) ){
                if( is_file( $path.'/'.$image ) ){
                    unlink($path.'/'.$image );

                    return true;
                }
            }
        }

        return false;
    }
}
