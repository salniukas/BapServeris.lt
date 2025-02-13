<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Auth;
use Session;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider()
    {
        return \Socialite::driver('discord')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = \Socialite::driver('discord')->stateless()->user();
        $authUser = $this->findOrCreateUser($user);
        Auth::login($authUser, true);
        return back();
    }

    private function findOrCreateUser($user)
    {
        if ($authUser = User::where('discord_id', $user->getId())->first()) {
            return $authUser;
        }
        return User::create([
            'name' => $user->getName(),
            'username' => $user->getName(),
            'email' => $user->getEmail(),
            'discord_id' => $user->getId(),
            'avatar' => $user->getAvatar()
        ]);
    }
}
