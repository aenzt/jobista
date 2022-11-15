<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        $user = Socialite::driver('google')->user();

        $this->_registerOrLoginGoogle($user);

        return redirect('/dashboard');
    }

    protected function _registerOrLoginGoogle($incomingUser)
    {
        $user = User::where('google_id', $incomingUser->id)->first();

        if ($user) {
            Auth::login($user);
        } else {
            $user = new User();
            $user->name = $incomingUser->name;
            $user->email = $incomingUser->email;
            $user->google_id = $incomingUser->id;
            $user->save();
            Auth::login($user);
        }
    }
}
