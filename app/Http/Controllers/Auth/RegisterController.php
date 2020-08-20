<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;


    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/sends';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if( $data['status'] == 1 ) {
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8'],
            ]);
        }

        if ( $data['status'] == 2 ) {
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255', 'unique:users'],
                'address' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'confirmed', 'string', 'min:8'],
//            'image' => ['image', 'bmp', 'png', 'jpg'],
            ]);
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \Illuminate\Http\JsonResponse
     */
    protected function create(array $data)
    {
        if ($data['status'] == 1) {

            $user = User::create([
                'name' => $data['name'],
                'password' => Hash::make($data['password']),
                'status' => $data['status']
            ]);

            if( $user ) {
               response()->json([
                    'data' => 'user where status "2" has been created successfully'
                ], 200);
            }

            return $user;
        }

        if($data['status'] == 2) {

            $user = User::create([
                'type' => $data['type'],
                'name' => $data['name'],
                'city' => $data['city'],
                'address' => $data['address'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'image' => '',
                'status' => $data['status'],

            ]);

            if( $user ) {
                response()->json([
                    'data' => 'user where status "2" has been created successfully'
                ], 200);
            }

            return $user;
        }

        return response()->json([
            'errors' => 'Whops!!!'
        ], 404);

    }
}
