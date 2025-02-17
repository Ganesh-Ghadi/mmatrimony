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
        if ($user && (
                Auth::attempt(['email' => $user->email, 'password' => $credentials['password']]) ||
                Auth::attempt(['mobile' => $user->mobile, 'password' => $credentials['password']])
            )) {
    
            // Regenerate session to prevent session fixation
            $request->session()->regenerate();
    
            // Check if the login request is for admin login
            $isAdminRequest = $request->input('is_admin'); // expected to be "true" or null
    
            if ($isAdminRequest == "true" || $isAdminRequest === true) {
                // Admin login path: ensure the user has admin privileges
                if (auth()->user()->roles->pluck('name')->first() === 'admin') {
                    return redirect()->intended('/admin');
                } else {
                    Auth::logout();
                    throw ValidationException::withMessages([
                        'email' => ['You do not have admin privileges to log in as admin.'],
                    ]);
                }
            } else {
                // Regular login path: allow only members to log in
                if (auth()->user()->roles->pluck('name')->first() === 'member') {
                    return redirect()->route('basic_details.index');
                } else {
                    // If an admin user tries to log in via the regular login page, disallow login
                    Auth::logout();
                    throw ValidationException::withMessages([
                        'email' => ['Invalid Email.'],
                     ]);
                }
            }
        }
    
        // If authentication fails, throw an error
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