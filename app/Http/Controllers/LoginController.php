<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginVk() {
        session()->get('soc.token');
        if (Auth::id()) {
            return redirect()->route('home');
        }

        return Socialite::with('vkontakte')->redirect();
    }

    public function responseVk(UserRepository $userRepository) {
        if (Auth::id()) {
            return redirect()->route('home');
        }

        $user = Socialite::driver('vkontakte')->user();
        session(['soc.token' => $user->token]);
        $userInSystem = $userRepository->getUserBySocId($user, 'vk');
        Auth::login($userInSystem);
//        dd($user);
        return redirect()->route('home');
    }

    public function loginFb() {
        session()->get('soc.token');
        if (Auth::id()) {
            return redirect()->route('home');
        }

        return Socialite::with('facebook')->redirect();
    }

    public function responseFb(UserRepository $userRepository) {
        if (Auth::id()) {
            return redirect()->route('home');
        }

        $user = Socialite::driver('facebook')->user();
        session(['soc.token' => $user->token]);
        $userInSystem = $userRepository->getUserBySocId($user, 'fb');
        Auth::login($userInSystem);
//        dd($user);
        return redirect()->route('home');
    }



}
