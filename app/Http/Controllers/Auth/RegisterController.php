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
            if( $data['phone'] ) $data['phone'] = $this->setPhoneNumber( $data['phone'] );

            if ( isset($data['image']) && $data['image'] !== "null" ) {
                return Validator::make($data, [
                    'name' => ['required', 'string', 'max:255', 'unique:users'],
                    'marka' => ['required'],
                    'address' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'phone' => ['required', 'unique:users', 'min:10','max:10'],
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
                'phone' => ['required', 'unique:users', 'min:10','max:10'],
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

            $image_name = $this->makeUserImageFolderWithImages( $data['image'] );

            $user = User::create([
                'who' => $data['who'],
                'name' => $data['name'],
                'city' => $data['city'],
                'address' => $data['address'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'password' => Hash::make($data['password']),
                'image' => $image_name ?? null,
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

            return $user;
        }

        return response()->json([
            'errors' => 'Whops!!!'
        ], 404);

    }

    private function makeUserImageFolderWithImages( $image )
    {
        $dir = public_path("images/users/sellers/" );

//        $this->clearSellerDir($dir);

        if( is_dir($dir) ) {
            $new_name = $this->makeNewImageName($image);

            $is_saved = $this->makeImage($image, 650, 500, $dir, $new_name);
            $is_saved_small = $this->makeImage($image, 150, 120, $dir, 'small_'.$new_name);

            return ($is_saved && $is_saved_small) ? $new_name : null;
        }
    }

    public function makeImage($file, $width, $height, $dir, $new_name){
        if( $file && $width && $height && $dir && $new_name ){
            $img = Image::make( $file );
            $img->resize($width, $height);
            $saved = $img->save( $dir .'/'. $new_name );

            return $saved ? $new_name : null;
        }
    }

    public function makeNewImageName($image){
        if( $image ){
            $extension = $image->getClientOriginalExtension();
            return time() .'_'. random_int( 0, time() ) .'.'. $extension;
        }
    }

    private function setPhoneNumber($phone)
    {
        $new_phone = '';

        if( empty($phone) ) return false;

        for($i=0; $i < (int)strlen($phone); $i++){
            if($phone[$i] !== " ") {
                $new_phone .= $phone[$i];
            }
        }

        return $new_phone;
    }

    private function clearSellerDir($dir):bool
    {
        if( is_dir( $dir ) ){
            foreach ( glob($dir.'/*') as $file ){
                if( !empty($file) ) unlink($file);
            }

            rmdir($dir);
        }

        if( ! is_dir( $dir ) ) return true;
        else return false;
    }
}
