<?php

namespace App\Http\Controllers;

use App\Announcement;
use App\Car;
use App\City;
use App\SellerType;
use App\Status;
use App\User;
use App\Who;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Symfony\Component\Console\Input\Input;

class BuyerController extends Controller
{
    public function index()
    {

    }

    public function profile($id)
    {
        $user = User::with('getSends')->find($id);

        if( ! $user ) return abort(404);

        return view('users.buyer.profile', [
            'user' => $user,
        ]);
    }

    public function show(User $user, $slug)
    {
        if( $user->id !== Auth::user()->id ){
            return redirect()->back();
        }

        $cars = Car::all();

        return view('users.buyer.partials.buyer_cruds')
            ->with([
                'slug' => $slug,
                'cars' => $cars,
            ]);
    }

    public function edit(Request $request, $id, $slug)
    {
        $user = User::find($id);

        if( ! $user && $user->id !== Auth::user()->id ) return redirect()->back();

        if( $slug == 'avto_number' ) {
            $request->validate([
                'avto_number' => 'required|alpha_dash|min:7|max:7'
            ]);

            $uppercase = strtoupper( $request->input('avto_number') );

            $user->update([
                'autoNumber' => $uppercase
            ]);
        }
        elseif( $slug == 'marka' ){
            $request->validate([
                'marka' => 'required'
            ]);

            if( $request->input('marka') ){
                $user->update([
                    'marka' => $request->input('marka') ?? $request->input('marka')
                ]);
            }
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

            return redirect()->route('buyer.profile', Auth::user()->id)
                ->with('message','"Parol" uğurla yeniləndi');
        }

        return redirect()->route('buyer.profile', Auth::user()->id);
    }

}
