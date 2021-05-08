<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected function credentials(Request $request)
    {
      return [
            'email'    => $request->email,
            'password' => $request->password,
            'confirmed' => 1,
            'is_active' => 1,
        ];


    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    //   public function redirectToProvider($service)
    // {
    //     return Socialite::driver($service)->redirect();
    // }

    // *
    //  * Obtain the user information from GitHub.
    //  *
    //  * @return \Illuminate\Http\Response
     
    // public function logout(Request $request)
    // {
    //     $this->guard()->logout();

    //     $request->session()->invalidate();

    //     return redirect('/home');
    // }

    // public function handleProviderCallback($service)
    // {
    //     $userSocial = Socialite::driver($service)->user();

    //     //return $userSocial->name;
    //     $findUser=User::where('email',$userSocial->email)->first();
    //     if($findUser)
    //     {
    //          Auth::login($findUser);
    //             return '<script>if (window.opener) {window.opener.location.href="/"; window.close();}</script>';

    //     }
    //     else
    //     {
    //     $user = new User;
    //     $user->name = $userSocial->name;
    //     $user->email = $userSocial->email;
    //     $user->password = Hash::make(123456);
    //      $user->is_active=  1;
    //       $user->confirmed= 1;
    //     $user->verifyToken = Str::random(40);
    //     $user->uni_id = $random;
    //     $user->save();

    //     $this->guard()->login($user);
 
       
    //     return '<script>if (window.opener) {window.opener.location.href="/"; window.close();}</script>';
    //     }
        
    // }
}
