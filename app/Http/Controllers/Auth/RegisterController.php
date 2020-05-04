<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

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
   // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         if (Auth::check() && in_array(Auth::user()->role, [0, 1, 2])) {
            $this->redirectTo=route('admin.dashboard');
        }else{
             $this->redirectTo='/';
        }
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
        return Validator::make($data, [
            'name' => ['required','min:5','string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile' => ['required','unique:users'],
            'district_id' => ['required'],
            'types' => ['required'],
            'gender' => ['required'],
            'address' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
         $role=2;$image='storage/app/public/profile/male.jpg';
             if ($data['types']=='photographer') {
                 $role=1;
             }
             if ($data['gender']=='female') {
                $image='storage/app/public/profile/female.jpg';
             }
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'district_id' => $data['district_id'],
            'types' => $data['types'],
            'gender' => $data['gender'],
            'role' => $role,
            'image' => $image,
            'address' => $data['address'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
