<?php

namespace App\Http\Controllers;

use App\User;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    public function open() {
        if (\Auth::user()) {
            return redirect()->route('index');
        }
        return Socialite::with('facebook')->redirect();
    }

    public function redirect() {
        if (\Auth::user() || (!$this->request->has('code') || $this->request->has('denied'))) {
            return redirect()->route('index');
        }

        $user = Socialite::driver('facebook')->user();

        $appUser = User::where('email', $user->email)->first();
        if (!$appUser) {
            $appUser = new User();
            $appUser->email = $user->email;
            $appUser->name = $user->name;
            $appUser->ext_id = $user->id;
            $appUser->password = bcrypt($user->token);
            $appUser->save();
        }

        \Auth::login($appUser);
        return redirect()->route('index');
    }
}
