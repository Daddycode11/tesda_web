<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();

        $redirect = Auth::user()->role === 'admin' ? '/admin' : '/user';

        // ✅ Keep existing SweetAlert-ready JSON for login
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Login successful!',
                'redirect' => $redirect,
            ]);
        }

        return redirect($redirect);
    }

    /**
     * Destroy an authenticated session (with SweetAlert support).
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // ✅ If AJAX logout (for future use)
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'You have successfully logged out!',
                'redirect' => '/',
            ]);
        }

        // ✅ Non-AJAX logout fallback
        return redirect('/')
            ->with('success', 'You have successfully logged out!');
    }
}
