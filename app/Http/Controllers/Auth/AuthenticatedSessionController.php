<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $role = strtolower(Auth::user()->rolename ?? '');

        return redirect()->intended(match($role) {
            'patient' => route('patient.index', absolute: false),
            'tandarts' => route('tandarts.index', absolute: false),
            'mondhygienist' => route('mondhygienist.index', absolute: false),
            'assistent' => route('assistent.index', absolute: false),
            'praktijkmanagement' => route('praktijkmanagement.index', absolute: false),
            default => route('welcome', absolute: false),
        });
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
