<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile' => ['required', 'digits:10'],
            'date_of_birth' => ['required', 'date'],    
             'password' => ['required', 'confirmed', Rules\Password::defaults()],
             'role'=>  ['required'],
        ]);
        // dd($request);

        $fullName = trim($request->first_name . ' ' . $request->middle_name . ' ' . $request->last_name);

        $user = User::create([
            'name' => $fullName,
            'email' => $request->email,
            'mobile' => $request->mobile,
             'date_of_birth' => $request->date_of_birth,
             'password' => Hash::make($request->password),
        ]);
        // dd($user->id);
           if($request->role ==='bride'){
              $userRole = 'groom';
           }

           if($request->role ==='groom'){
            $userRole = 'bride';
         }

        $profile = Profile::create([
            'user_id' => $user->id,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'date_of_birth' => $request->date_of_birth,
             'mobile' => $request->mobile,
             'role' => $userRole,
        ]);

        event(new Registered($user));
        $memberRole = Role::where('name', 'member')->first();
        $user->assignRole($memberRole);
        // Auth::login($user);

        return redirect(route('login', absolute: false));
        // return redirect(RouteServiceProvider::HOME);
    }
}