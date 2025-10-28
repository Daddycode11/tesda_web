<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;

class RegisteredUserController extends Controller
{
    /**
     * Show registration page.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle new user registration.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name'     => ['required', 'string', 'max:255'],
                'email'    => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
                'gender'   => ['required', 'in:male,female,other'],
                'age'      => ['required', 'integer', 'min:1', 'max:120'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            $user = User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'gender'   => $request->gender,
                'age'      => $request->age,
                'password' => Hash::make($request->password),
                'role'     => 'user', // Default role
            ]);

            event(new Registered($user));
            Auth::login($user);

            // ✅ Return success JSON for AJAX
            if ($request->ajax()) {
                return response()->json([
                    'success'  => true,
                    'message'  => 'Registration successful! Welcome, ' . $user->name . ' 🎉',
                    'redirect' => '/user',
                ]);
            }

            return redirect('/user');

        } catch (ValidationException $e) {
            // Handle AJAX validation errors
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'errors'  => $e->errors(),
                ], 422);
            }

            throw $e; // Non-AJAX fallback
        } catch (\Exception $e) {
            // Handle unexpected errors (like 500)
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Oops! Something went wrong. Please try again.',
                ], 500);
            }

            throw $e; // Non-AJAX fallback
        }
    }
}
