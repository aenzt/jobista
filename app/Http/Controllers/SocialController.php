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

        return redirect('/');
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

    public function profile()
    {
        return view('profile', [
            'title' => 'Profile',
            'user' => Auth::user()
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->name = $request->name;
        if ($request->current_password != null) {
            $request->validate([
                'current_password' => 'required | min:8',
                'new_password' => 'required | min:8',
            ]);
            if (password_verify($request->current_password, $user->password)) {
                $user->password = bcrypt($request->new_password);
            } else {
                return redirect()->back()->with('errors', 'Credentials Error');
            }
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect('/profile')->with('success', 'Profile Updated Successfully');
    }
}
