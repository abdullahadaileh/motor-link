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
            // البحث عن المستخدم بواسطة البريد الإلكتروني
            $finduser = User::where('email', $user->getEmail())->first();

            if ($finduser) {
                // إذا كان المستخدم موجودًا ويمتلك social_id، قم بتسجيل الدخول
                if ($finduser->social_id) {
                    Auth::login($finduser);
                } else {
                    // إذا كان المستخدم موجودًا ولكن بدون social_id، قم بتحديث بياناته
                    $finduser->update([
                        'social_id' => $user->id,
                        'social_type' => 'google',
                    ]);
                    Auth::login($finduser);
                }
                return redirect('/motor-link');
            } else {
                // إذا كان المستخدم غير موجود، قم بإنشاء حساب جديد
                $newUser = User::create([
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
            // البحث عن المستخدم بواسطة البريد الإلكتروني
            $finduser = User::where('email', $user->getEmail())->first();

            if ($finduser) {
                // إذا كان المستخدم موجودًا ويمتلك social_id، قم بتسجيل الدخول
                if ($finduser->social_id) {
                    Auth::login($finduser);
                } else {
                    // إذا كان المستخدم موجودًا ولكن بدون social_id، قم بتحديث بياناته
                    $finduser->update([
                        'social_id' => $user->id,
                        'social_type' => 'facebook',
                    ]);
                    Auth::login($finduser);
                }
                return redirect('/motor-link');
            } else {
                // إذا كان المستخدم غير موجود، قم بإنشاء حساب جديد
                $newUser = User::create([
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
