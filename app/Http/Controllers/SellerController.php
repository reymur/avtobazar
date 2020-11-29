<?php

namespace App\Http\Controllers;

use App\Announcement;
use App\Car;
use App\City;
use App\Motor;
use App\SellerType;
use App\Status;
use App\Type;
use App\User;
use App\Who;
use App\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;
use Intervention\Image\Facades\Image;

class SellerController extends Controller
{
    public function index()
    {
        return view('users.seller');
    }

    public function SellerStore($id)
    {
        $user = $id ? User::find($id) : null;

        if( ! $user ) return abort(404);

        if( $user->status == 2 ){
            return view('users.seller.partials.seller_store')
                ->with('user',$user);
        }
    }

    public function profile($id)
    {
        $user = User::where('status', 2)->with(['sellerTypes', 'statusName', 'whos'])->find($id);

        if (!$user) return abort(404);

        return view('users.seller.profile')->with([
            'user' => $user,
            'orders_count' => $this->getOrdersCount()
        ]);
    }

    public function getWhos(Request $request)
    {
        if( $request->id == 3 ){
            return $this->getWhosWithId();
        }

        $users = User::where([
            'who' => $request->id,
            'status' => 2
        ])->get();

        if( $users->count() == 0 ) {
            return response()->json([
                'errors' => 'error'
            ],404);
        }

        return response()->json([
            'users' => $users
        ],200);
    }

    private function getWhosWithId()
    {
        $users = User::where('status', 2)->get();

        if( $users->count() == 0 ) {
            return response()->json([
                'errors' => 'error'
            ],404);
        }

        return response()->json([
            'users' => $users
        ],200);
    }

    public function getOrdersCount()
    {
        $user = Auth::user();
        $orders = User::with('announcements')->where('id', $user->id);

        return $orders->first()->announcements->count();
    }

    public function show(User $user, $slug)
    {
        if( $user->id !== Auth::user()->id ){
            return redirect()->back();
        }

        $whos = Who::all();
        $statuses = Status::all();
        $cars = Car::all();
        $cities = City::all();

        return view('users.seller.partials.seller_cruds')
                ->with([
                    'slug' => $slug,
                    'whos' => $whos,
                    'statuses' => $statuses,
                    'cars' => $cars,
                    'cities' => $cities,
                ]);
    }

    public function edit(Request $request, $id, $slug)
    {
        $user = User::find($id);

        if( ! $user && $user->id !== Auth::user()->id ) return redirect()->back();

        if( $slug == 'name' ) {
            $request->validate([
                'name' => 'required|alpha|min:3,max:20'
            ]);

            $user->update([
                'name' => $request->input('name') ?? $request->input('name')
            ]);
        }

        elseif( $slug == 'who' ){
            $user->update([
                'who' => $request->input('who') ?? $request->input('who')
            ]);
        }
        elseif( $slug == 'status' ){
            $user->update([
                'status' => $request->input('status') ?? $request->input('status')
            ]);
        }
        elseif( $slug == 'marka' ){
            $request->validate([
                'marka' => 'required'
            ]);

            if( $request->input('marka') ){
                if( count($request->input('marka')) > 0 ){
                   $my_car_types = SellerType::where('user_id', Auth::user()->id)->get();
                    if( $my_car_types->count() > 0 ) {
                        foreach ( $my_car_types as $type ) {
                            $type->delete();
                        }
                    }

                   foreach ($request->input('marka') as $type) {
                       $user->sellerTypes()->create([
                           'title' => $type,
                           'user_id' => Auth::user()->id
                       ]);
                   }
                }
            }
        }
        elseif( $slug == 'city' ){
            $user->update([
                'city' => $request->input('city') ?? $request->input('city')
            ]);
        }
        elseif( $slug == 'address' ){
            $request->validate([
                'address' => 'required|min:3'
            ]);

            $user->update([
                'address' => $request->input('address') ?? $request->input('address')
            ]);
        }
        elseif( $slug == 'email' ){
            $request->validate([
                'email' => [
                    'required',
                    'email',
                    'min:4',
                    Rule::unique('users')->ignore(Auth::user()->id)
                ]
            ]);

            $user->update([
                'email' => $request->input('email') ?? $request->input('email')
            ]);
        }
        elseif( $slug == 'phone' ){
            $request->validate([
                'phone' => 'required|alpha_num|min:10|max:10'
            ]);

            $user->update([
                'phone' => $request->input('phone') ?? $request->input('phone')
            ]);
        }
        elseif( $slug == 'password' ){

            $request->validate([
                'old_pass' => 'required|string|min:6|max:20',
                'new_pass' => 'required|string|min:6|max:20',
            ]);

            $user = Auth::user();
            $old_pass = $request->input('old_pass');
            $new_pass = $request->input('new_pass');

            if( Hash::check($old_pass, $user->password) ) {
                $user->update([
                    'password' => Hash::make($new_pass)
                ]);
            }
            else{
                return redirect()->back()
                    ->with('old_pass', 'Old password does not match!');
            }

            return redirect()->route('seller.profile', Auth::user()->id)
                ->with('message','"Parol" uğurla yeniləndi');
        }

        return redirect()->route('seller.profile', Auth::user()->id);
    }

    public function saveUserImage(Request $request){
        $request->validate([
            'image' => 'required|image|max:8000'
        ]);

        if( $request->hasFile('image') && Auth::check() ){
            $user = Auth::user();
            $path = public_path('/images/users/sellers/');
            $file = $path . $user->image;
            $file2 = $path . 'small_'.$user->image;

            if( is_file($file) && is_file($file2) ){
                unlink($file);
                unlink($file2);
            }

            if( !is_file($file) && !is_file($file2) ){
                $file = $request->image;
                $new_name = $this->makeNewName($file);
                $is_saved = $this->makeImage($file, 650, 500, $path, $new_name);
                $is_small_saved = $this->makeImage($file, 150, 120, $path, 'small_'.$new_name);

                if( $is_saved && $is_small_saved ){
                    $is_updated = $user->update([
                        'image' => $new_name
                    ]);

                    return response()->json('image is updated',200 );
                }
            }
        }
    }

    public function makeImage($file, $width, $height, $path, $new_name){
        if( !empty($file) ){
            $img = Image::make( $file );
            $img->resize($width, $height);
            $is_saved = $img->save($path . $new_name );

            return $is_saved ? true : false;
        }

        return false;
    }

    public function makeNewName($file){
        if( !empty($file) ){
            $extension = $file->getClientOriginalExtension();
            return time() . random_int(0, time()) .'.'. $extension;
        }
    }
}
