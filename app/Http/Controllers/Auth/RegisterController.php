<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\SellerType;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

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
                'autoNumber' => ['required', 'string',  'min:7', 'max:7', 'unique:users'],
                'password' => ['required', 'string', 'min:6'],
            ]);
        }

        if ( $data['status'] == 2 ) {
            if ( isset($data['image']) && $data['image'] !== "null" ) {
                return Validator::make($data, [
                    'name' => ['required', 'string', 'max:255', 'unique:users'],
                    'marka' => ['required'],
                    'address' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'password' => ['required', 'confirmed', 'string', 'min:8'],
                    'password_confirmation' => ['required', 'string', 'min:8'],
                    'image' => 'mimes:jpeg,bmp,png',
                ]);
            }

            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255', 'unique:users'],
                'marka' => ['required'],
                'address' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'confirmed', 'string', 'min:8'],
                'password_confirmation' => ['required', 'string', 'min:8'],
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
                'marka' => $data['marka'],
                'autoNumber' => strtoupper($data['autoNumber']),
                'password' => Hash::make($data['password']),
                'status' => $data['status']
            ]);

            return $user;
        }

        if($data['status'] == 2) {

            $user = User::create([
                'who' => $data['who'],
                'name' => $data['name'],
                'city' => $data['city'],
                'address' => $data['address'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'image' => $this->getUserNewImageName($data['image']),
                'status' => $data['status'],
            ]);

            if($user){
                $marka = explode(',', $data['marka']);

                if( isset($data['marka']) && is_array($marka) && count($marka) ){
                    $count = count($marka);
                    for($i = 0; $i < $count; $i++){
                        SellerType::create([
                            'title' => $marka[$i],
                            'user_id' => $user->id,
                        ]);
                    }
                }
            }

            if( ! is_null($user->image) ) {
                $imageName = $user->image;
                $this->makeUserImageFolderWithImages(
                            $user->id,
                            $data['image'],
                            $imageName
                        );
            }

            return $user;
        }

        return response()->json([
            'errors' => 'Whops!!!'
        ], 404);

    }

    private function getUserNewImageName($image)
    {
        if( $image != "null" && ! is_null($image) ){
            $extension = $image->getClientOriginalExtension();

            return time() .'.'. $extension;
        }

        return NULL;
    }

    private function makeUserImageFolderWithImages($id, $image, $name )
    {
        $dir = public_path("images/users/sallers/id_{$id}/" );
        $path = mkdir( $dir , 0777, true );

        if( is_dir($dir) ) {
            return Image::make( $image )
                ->resize(500, 450)
                ->save( $dir . $name );
        }
    }
}
