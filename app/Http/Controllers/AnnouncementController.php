<?php

namespace App\Http\Controllers;

use App\User;
use App\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SendAnnounceRequest;
use Intervention\Image\Facades\Image;

class AnnouncementController extends Controller
{
    public function index()
    {
        return view('announcements.index');
    }

    public function flash()
    {
        if (Auth::check()) {
            $announce = Announcement::where('user_id', Auth::user()->id)->latest()->first();

            if (!$announce) $announce = null;

            return view('announcements.index')
                ->with(['announce' => $announce]);
        }

    }

    public function sendAnnounce(Request $request)
    {

        $this->announceValidate($request);

        $when = [];
        if ($request->when) {
            $when = explode(',', $request->when);
        }

        if ( $request->when === 'Hamısı' && $request->image != 'null' ) {
            $this->whenWithAllWithImage($request);

            return response()->json([
                'data' => [
                    'image' => $request->image,
                    'texpassport' => $request->texpassport,
                ]
            ], 200);
        }
        elseif ( $request->when === 'Hamısı' && $request->image == 'null' ) {
            $this->whenWithAllWithoutImage($request);

            return response()->json([
                'data' => [
                    'image' => $request->image,
                    'texpassport' => $request->texpassport,
                ]
            ], 200);
        }
        elseif ( $request->when !== 'Hamısı' && $request->image != 'null' ) {
            if (count($when) > 0) {
                $this->whenWithoutAllWithImage($request, $when, $withimage= true);
            }

            return response()->json([
                'data' => [
                    'image' => $request->image,
                    'texpassport' => $request->texpassport,
                ]
            ], 200);
        }
        elseif ( $request->when !== 'Hamısı' && $request->image == 'null' ) {
            if (count($when) > 0) {
                $this->whenWithoutAllWithoutImage($request, $when, $withimage= false);
            }

            return response()->json([
                'data' => [
                    'image' => $request->image,
                    'texpassport' => $request->texpassport,
                ]
            ], 200);
        }

        return response()->json([
            'errors' => 'is fail'
        ], 404);
    }

    protected function whenWithoutAllWithImage($request, $when, $withimage)
    {
        $this->createAnnounce($request, $when, $withimage);
    }

    protected function whenWithoutAllWithoutImage($request, $when, $withimage)
    {
        $this->createAnnounce($request, $when, $withimage);
    }

    protected function createAnnounce($request, $when, $withimage)
    {
        $time = time();

        foreach ( $when  as $item ) {
            $announce = Announcement::create([
                'user_id'     => Auth::user()->id,
                'name'        => $item                                ?? NULL,
                'spare_parts' => $request->spare_parts                ?? NULL,
                'marka'       => $request->marka                      ?? NULL,
                'model'       => $request->model                      ?? NULL,
                'year'        => $request->year                       ?? NULL,
                'motor'       => $request->motor                      ?? NULL,
                'store'       => $request->who                        ?? NULL,
                'condition'   => $request->condition                  ?? NULL,
                'texpassport' => $request->texpassport                ?? NULL,
                'city'        => $request->city                       ?? NULL,
                'image'       => $withimage ? $this->setImageName($time, $request->image) : NULL,
            ]);
        }

        if( isset($announce->image) && $withimage ){
            if( $request->image )
                $this->announceImageSave($request->image, $announce->image, $announce->user_id);
        }
    }

    protected function whenWithAllWithImage($request)
    {
        $time = time();

        $users = User::where(['who' => $request->who, 'status' => 2])->get();

        if( $request->who == 3 ){
            $users = User::where(['status' => 2])->get();
        }

        if( count($users) > 0 ){
            foreach ( $users as $user ) {
                $announce = Announcement::create([
                    'user_id'     => Auth::user()->id,
                    'name'        => $user->name                          ?? NULL,
                    'spare_parts' => $request->spare_parts                ?? NULL,
                    'marka'       => $request->marka                      ?? NULL,
                    'model'       => $request->model                      ?? NULL,
                    'year'        => $request->year                       ?? NULL,
                    'motor'       => $request->motor                      ?? NULL,
                    'store'       => $request->who                        ?? NULL,
                    'condition'   => $request->condition                  ?? NULL,
                    'texpassport' => $request->texpassport                ?? NULL,
                    'city'        => $request->city                       ?? NULL,
                    'image'       => $this->setImageName($time, $request->image) ?? NULL,
                ]);
            }
        }

        if( isset($announce->image) ){
            if( $request->image )
                $this->announceImageSave($request->image, $announce->image, $announce->id);
        }
    }

    protected function whenWithAllWithoutImage($request)
    {
        $users = User::where(['who' => $request->who, 'status' => 2])->get();

        if( $request->who == 3 ){
            $users = User::where(['status' => 2])->get();
        }

        if( count($users) > 0 ){
            foreach ( $users as $user ) {
                $announce = Announcement::create([
                    'user_id'     => Auth::user()->id,
                    'name'        => $user->name                          ?? NULL,
                    'spare_parts' => $request->spare_parts                ?? NULL,
                    'marka'       => $request->marka                      ?? NULL,
                    'model'       => $request->model                      ?? NULL,
                    'year'        => $request->year                       ?? NULL,
                    'motor'       => $request->motor                      ?? NULL,
                    'store'       => $request->who                        ?? NULL,
                    'condition'   => $request->condition                  ?? NULL,
                    'texpassport' => $request->texpassport                ?? NULL,
                    'city'        => $request->city                       ?? NULL,
                    'image'       => NULL,
                ]);
            }
        }
    }

    protected function setImageName($time, $image)
    {
        if( $image ){
            $extension = $image->getClientOriginalExtension();
            return $name = $time .'.'. $extension;
        }
    }

    protected function announceImageSave($file, $image, $User_id)
    {
        if( $file && $image && $User_id ){
            $path = public_path('images/users/announcement/');

            if( is_dir($path) ){
                Image::make($file)->resize(550, 450)
                    ->save($path .'/'. $image);
            }
        }
    }

    public function Send()
    {
        if (Auth::check()) {
            $announce = Announcement::where('user_id', Auth::user()->id)->latest()->first();

            if (!$announce) $announce = null;

            return view('announcements.send')
                ->with(['announce' => $announce]);
        }
    }

    public function incomingAnnounce()
    {
        return view('announcements.incoming');
    }

    protected function announceValidate($request)
    {
        if( $request->texpassport == '' && $request->image == 'null' ){
            $request->validate([
                'spare_parts' => 'required',
                'when' => 'required',
            ]);
        }
        elseif( $request->texpassport != '' && $request->image == 'null' ){
            $request->validate([
                'spare_parts' => 'required',
                'when' => 'required',
                'texpassport' => 'required',
            ]);
        }
        elseif( $request->texpassport == '' && $request->image != 'null' ){
            $request->validate([
                'spare_parts' => 'required',
                'when' => 'required',
                'image' => 'mimes:jpeg,png,bmp,gif,svg,webp, max:4000',
            ]);
        }
        else{
            $request->validate([
                'spare_parts' => 'required',
                'when' => 'required',
                'texpassport' => 'required',
                'image' => 'mimes:jpeg,png,bmp,gif,svg,webp, max:4000',
            ]);
        }
    }
}
