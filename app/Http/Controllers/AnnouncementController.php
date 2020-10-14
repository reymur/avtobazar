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
use App\Http\Requests\SendAnnounceRequest;
use Intervention\Image\Facades\Image;
use NunoMaduro\Collision\Provider;

class AnnouncementController extends Controller
{
    public function index()
    {
        return view('announcements.index')->with('sends', $this->sendsCount());
    }

    public function flash()
    {
        if (Auth::check()) {
            return redirect()->route('send')
                ->with('send_flash', 1);
        }
    }

    public function sendAnnounce(Request $request)
    {
        $this->announceValidate($request);

        $when = [];

        if ($request->when) {
            $when = explode(',', $request->when);
        }

        if ($request->when === 'Hamısı' && $request->image != 'null') {
            $pin = mt_rand(0, 999999);
            $has_seller_types = $this->whenWithAllWithImage($request, $pin, $when);

            return $this->jsonReturn($request, $has_seller_types);
        } elseif ($request->when === 'Hamısı' && $request->image == 'null') {
            $pin = mt_rand(0, 999999);
            $has_seller_types = $this->whenWithAllWithoutImage($request, $pin);

            return $this->jsonReturn($request, $has_seller_types);
        } elseif ($request->when !== 'Hamısı' && $request->image != 'null') {
            if (count($when) > 0) {
                $pin = mt_rand(0, 999999);
                $has_seller_types = $this->whenWithoutAllWithImage($request, $when, $pin, $withimage = true);

                return $this->jsonReturn($request, $has_seller_types);
            }

            return false;
        } elseif ($request->when !== 'Hamısı' && $request->image == 'null') {
            if (count($when) > 0) {
                $pin = mt_rand(0, 999999);
                $has_seller_types = $this->whenWithoutAllWithoutImage($request, $when, $pin, $withimage = false);

                return $this->jsonReturn($request, $has_seller_types);
            }

            return false;
        }

        return response()->json([
            'errors' => 'is fail'
        ], 404);
    }

    protected function jsonReturn($request, $has_seller_types)
    {
        if ($has_seller_types != 0) {
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
                'image' => $withimage ? $this->setImageName($time, $request->image) : NULL,
            ]);

            foreach ($when as $name) {
                $user = User::with('sellerTypes')->where(['name' => $name, 'status' => 2])->first();

                if (($user->count() > 0) && ($user->sellerTypes->count() > 0)) {
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

        if (isset($announce->image) && $withimage) {
            if ($request->image)
                $this->announceImageSave($request->image, $announce->image, $announce->user_id);
        }

        return $has_seller_type;
    }

    protected function whenWithAllWithImage($request, $pin, $when)
    {
        $time = time();
        $status = Auth::user()->status;
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
                'pin' => $pin,
                'image' => $this->setImageName($time, $request->image) ?? NULL,
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

        if (isset($announce->image)) {
            if ($request->image)
                $this->announceImageSave($request->image, $announce->image, $announce->id);
        }

        return $has_seller_type;
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

    protected function announceImageSave($file, $image, $User_id)
    {
        if ($file && $image && $User_id) {
            $path = public_path('images/users/announcement/');

            if (is_dir($path)) {
                Image::make($file)->resize(550, 450)
                    ->save($path . '/' . $image);
            }
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

            if ($announce->count() < 0) {
                $announce = null;
            }

            return view('announcements.send')
                ->with([
                    'announce' => $announce->last(),
                    'announce_all' => $announce_all,
                    'condition' => $condition,
                    'store' => $store ?? NULL,
                    'morg' => $morg ?? NULL,
                ]);
        }
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
            $user = user::with('userAnnounces')
                ->where('id', Auth::user()->id)->first();

            $answers_all = $user->userAnnounces()->orderByDesc('created_at')->paginate(2);

            return view('announcements.answers')
                ->with([
                    'answers_all' => $answers_all,
                ]);
        }
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
        }

        if (!is_null($answer) && $answer->count()) {
            return response()->json([
                'answer' => $answer
            ], 200);
        }

        return response()->json([
            'error' => 'Woops!!!'
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

    protected function answerSeenUpdate($request){
        $answer = Answer::where([
            'announcement_id' => $request->announcement_id,
            'user_id' => $request->seller_id,
        ])->first();

        if( ! $answer ) return null;

        if( $answer->announcement->user_id == Auth::user()->id ) {
            if($answer->seen == null ) {
                $is_updated = $answer->updateSeen();

                return $is_updated ? $answer->id : null;
            }

            return null;
        }

        return null;;
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
            $orders = User::with('announcementUser')->where('id', $user->id);

            if ( $orders->get()->count() == 0 && $orders->first()->announcement->count() == 0 ) {
                return abort(404);
            }

            return view('announcements.orders', [
                'orders' => $orders,
                'ordersPaginate' => $this->getOrdersPaginate($orders, 2)
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
                    'image' => 'mimes:jpeg,png,bmp,gif,svg,webp, max:4000',
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
            $order = Announcement::find($id);

            if( $order->count() == 0 ) redirect()->back();

            $order->user()->detach(Auth::user()->id);

            return redirect()->back();
        }
    }

    public function buyerAnnounceADelete($id)
    {
        if( Auth::check() ) {
            $user = Auth::user();
            $announce = Announcement::find($id);
            $image = $announce->image ?? false;
            $path = public_path('images/users/announcement/');

            if( !$announce ) return redirect()->back();

            if( $announce->user_id == $user->id ){
                $deleted = $announce->delete();

                if( $deleted ) {
                    $deleted = AnnouncementUser::where('announcement_id',$announce->id)->delete();

                    if( $deleted ) {
                        $this->buyerImageDelete($path, $image);
                    }

                    return redirect()->back();
                }
            }

            return redirect()->back();
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
