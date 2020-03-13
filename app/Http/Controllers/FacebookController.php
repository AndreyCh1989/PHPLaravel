<?php

namespace App\Http\Controllers;

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
        if (\Auth::user()) {
            return redirect()->route('index');
        }
        $user = Socialite::driver('facebook')->user();
        dd($user);
    }
}
