<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Exception;

class SocialAuthController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->user();

            $user = User::updateOrCreate(
                ['email' => $socialUser->getEmail()],
                [
                    'name' => $socialUser->getName() ?? $socialUser->getNickname(),
                    'password' => Hash::make(uniqid()),
                    'provider' => $provider,
                    'provider_id' => $socialUser->getId(),
                    'role' => 'user',
                ]
            );

            Auth::login($user);
            return redirect('/user')->with('success', 'Welcome, ' . $user->name . ' 🎉');
            

        } catch (Exception $e) {
            return redirect('/')->with('error', 'Login with ' . ucfirst($provider) . ' failed.');
        }
    }
}
