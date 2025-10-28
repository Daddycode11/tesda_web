<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Exception;

class SocialAuthController extends Controller
{
    // ✅ Redirect to provider
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    // ✅ Handle callback
    public function handleProviderCallback($provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            return redirect('/')->with('error', 'Unable to login with ' . ucfirst($provider));
        }

        // Find or create the user
        $user = User::updateOrCreate(
            ['email' => $socialUser->getEmail()],
            [
                'name'     => $socialUser->getName() ?? $socialUser->getNickname(),
                'email'    => $socialUser->getEmail(),
                'password' => bcrypt(str()->random(16)),
                'role'     => 'user',
            ]
        );

        Auth::login($user);

        // ✅ Add SweetAlert session flag
        return redirect('/user')->with('social_success', [
            'provider' => ucfirst($provider),
            'name'     => $user->name,
        ]);
    }
}
