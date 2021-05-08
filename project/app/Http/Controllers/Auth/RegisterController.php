<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\UserSocial;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Input;
use Laravel\Socialite\Facades\Socialite;

use Mail;
use App\Mail\verifyEmail;
use Illuminate\Support\Str;
use Session;
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


//social lab login
 public function redirectToProvider($service)
    {
        return Socialite::driver($service)->redirect();
    }

  // *
    //  * Obtain the user information from GitHub.
    //  *
    //  * @return \Illuminate\Http\Response
     
    public function handleProviderCallback($service)
    {
        $userSocial = Socialite::driver($service)->user();

        //return $userSocial->name;
        $findUser=User::where('email',$userSocial->email)->first();
        if($findUser)
        {
             Auth::login($findUser);
                return '<script>if (window.opener) {window.opener.location.href="/files/public"; window.close();}</script>';

        }
        else
        {
        $user = new User;
        $user->name = $userSocial->name;
        $user->email = $userSocial->email;
        $user->password = Hash::make(123456);
         $user->is_active=  1;
          $user->confirmed= 1;
        $user->verifyToken = Str::random(40);
        $user->uni_id = $random;
        $user->save();

        $this->guard()->login($user);
 
       
        return '<script>if (window.opener) {window.opener.location.href="/files/public"; window.close();}</script>';
        }
        
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator, 'register');
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $uni_col = array(User::pluck('uni_id'));

        do {
          $random = str_random(5);
        } while (in_array($random, $uni_col));

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'is_active' => 1,
            'confirmed' =>1,
            'image' => 'defaultuser.png',
            'verifyToken' => Str::random(40),
            'uni_id' => $random
        ]);
        

        $thisUser  = User::findOrFail($user->id);
       // $this->sendEmail($thisUser);
        return $user;
    }

    public function sendEmail($thisUser){
        Mail::to($thisUser['email'])->send(new verifyEmail($thisUser));
    }

    public function verifyEmailFirst(){
          // Session::flash('ankit', 'Verification Email has been sent to your email');
         
          return redirect()->route('login')->with('success', 'Verification Email has been sent to your email');


    }

    public function sendEmailDone($email, $verifyToken){
        $user = User::where(['email' => $email, 'verifyToken' => $verifyToken])->first();

        if($user){
            User::where(['email' => $email, 'verifyToken' => $verifyToken])->update(['confirmed'=>1,'verifyToken'=>NULL, 'is_active' => 1]);
            // Session::flash('ankit', 'Email Verification Successfull');

            // Mail :: to($user->email)->send(new WelcomeUser($user));
            return redirect()->route('login',$user)->with('success', 'Email Verification Successfull');
        }else{
            return 'No User Found';
        }


    }
}
