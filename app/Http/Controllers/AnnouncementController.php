<?php

namespace App\Http\Controllers;

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
        if( Auth::check() ){
            $announce = Announcement::where('user_id', Auth::user()->id)->latest()->first();

            if (!$announce) $announce = null;

            return view('announcements.index')
                ->with(['announce' => $announce]);
        }

    }

    public function sendAnnounce(Request $request){

        $this->announceValidate($request);

        $when = [];
        if( $request->when ) {
            $when = explode(',', $request->when);
        }

        if( $request->who === "1" && $request->when === 'Hamısı' && $request->image != 'null' ){
            $this->whenWithAllWithImage($request);

            return response()->json([
                'sss' => 3333333333
            ]);
        }
        elseif ( $request->who === "1" && $request->when === 'Hamısı' && $request->image == 'null'){
            $this->whenWithAllWithoutImage($request);

            return response()->json([
                'sss' => 3333333333
            ]);
        }

        return response()->json([
            'qqqq' => $request->who
        ]);
    }

    protected function whenWithAllWithImage($request)
    {
        $announce = Announcement::create([
            'user_id'     => Auth::user()->id,
            'spare_parts' => $request->spare_parts                ?? NULL,
            'marka'       => $request->marka                      ?? NULL,
            'model'       => $request->model                      ?? NULL,
            'year'        => $request->year                       ?? NULL,
            'motor'       => $request->motor                      ?? NULL,
            'store'       => $request->who                        ?? NULL,
            'condition'   => $request->condition                  ?? NULL,
            'texpassport' => $request->texpassport                ?? NULL,
            'city'        => $request->city                       ?? NULL,
            'image'       => $this->setImageName($request->image) ?? NULL,
        ]);

        if( isset($announce->image) ){
            if( $request->image )
                $this->announceImageSave($request->image, $announce->image, $announce->id);
        }
    }

    protected function whenWithAllWithoutImage($request)
    {
        $announce = Announcement::create([
            'user_id'     => Auth::user()->id,
            'spare_parts' => $request->spare_parts                ?? NULL,
            'marka'       => $request->marka                      ?? NULL,
            'model'       => $request->model                      ?? NULL,
            'year'        => $request->year                       ?? NULL,
            'motor'       => $request->motor                      ?? NULL,
            'store'       => $request->who                        ?? NULL,
            'condition'   => $request->condition                  ?? NULL,
            'texpassport' => $request->texpassport                ?? NULL,
            'city'        => $request->city                       ?? NULL,
            'image'       =>                                         NULL,
        ]);
    }

    protected function setImageName($image)
    {
        if( $image ){
            $extension = $image->getClientOriginalExtension();
            return $name = time() .'.'. $extension;
        }
    }

    protected function announceImageSave($file, $image, $id)
    {
        if( $file && $image && $id ){
            $dir = mkdir('images/users/announcement/id_'. $id );
            $path = public_path('images/users/announcement/id_'. $id);

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
        if( $request->image === "null" ){
            $request->validate([
                'spare_parts' => 'required',
                'when' => 'required',
                'texpassport' => 'required',
            ]);
        }
        else {
            $request->validate([
                'spare_parts' => 'required',
                'when' => 'required',
                'texpassport' => 'required',
                'image' => 'mimes:jpeg,png,bmp,gif,svg,webp, max:4000',
            ]);
        }
    }
}
