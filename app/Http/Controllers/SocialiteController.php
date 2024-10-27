<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        try {
            $finduser = User::where('social_id',$user->id)->first();
            if ($finduser) {
                Auth::login($finduser);
                return redirect('/motor-link');
            }else
            {
                $newUser = User::create
                ([
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'social_id' => $user->id,
                    'social_type' => 'google',
                    'password' => encrypt('my-google'),
                ]);

                Auth::login($newUser);
                return redirect('/motor-link');
            }



        } catch (\Throwable $th) {
            dd('error' . $th->getMessage());
        }
    }


    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();

        try {
            $finduser = User::where('social_id',$user->id)->first();
            if ($finduser) {
                Auth::login($finduser);
                return redirect('/motor-link');
            }else
            {
                $newUser = User::create
                ([
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'social_id' => $user->id,
                    'social_type' => 'facebook',
                    'password' => encrypt('my-facebook'),
                ]);

                Auth::login($newUser);
                return redirect('/motor-link');
            }



        } catch (\Throwable $th) {
            dd('error' . $th->getMessage());
        }
    }
}

