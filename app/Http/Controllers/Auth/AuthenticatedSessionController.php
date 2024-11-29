<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Profile;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Validation\ValidationException;

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
    // old code start 
        // $request->authenticate($request);

        // $request->session()->regenerate();

        // if (auth()->user()->roles->pluck('name')->first() === 'member') {
        //     // dd('working');
        //     // return redirect()->route('basic_details.index');
        //     return redirect()->route('basic_details.index');
        // }
        // return redirect()->intended(RouteServiceProvider::HOME);
        //  old code end

        // Retrieve the input fields
        $credentials = $request->only('email', 'password');

        // Check if the input is an email or mobile number
        if (filter_var($credentials['email'], FILTER_VALIDATE_EMAIL)) {
            // It's an email, so authenticate with email
            $user = User::where('email', $credentials['email'])->first();
        } else {
            // Otherwise, assume it's a mobile number and authenticate with mobile number
            $user = User::where('mobile', $credentials['email'])->first();
        }

        // Check if the user exists and the password matches
        if ($user && Auth::attempt(['email' => $user->email, 'password' => $credentials['password']]) || 
            ($user && Auth::attempt(['mobile' => $user->mobile, 'password' => $credentials['password']]))) {

            // Regenerate session to prevent session fixation
            $request->session()->regenerate();

            // Redirect user based on role or other conditions
            if (auth()->user()->roles->pluck('name')->first() === 'member') {
                return redirect()->route('basic_details.index');
            }

            return redirect()->intended(RouteServiceProvider::HOME);
        }

        // If authentication fails, redirect back with an error message
        throw ValidationException::withMessages([
            'password' => ['The provided credentials are incorrect.'],
        ]);
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