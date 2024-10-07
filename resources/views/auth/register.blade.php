<x-layout.auth>
    <div
        class="flex justify-center items-center min-h-screen bg-[url('/assets/images/map.svg')] dark:bg-[url('/assets/images/map-dark.svg')] bg-cover bg-center">
        <div class="panel sm:w-[480px] m-6 max-w-lg w-full">
            <h2 class="font-bold text-2xl mb-3">Sign Up</h2>
            <p class="mb-7">Enter your email and password to register</p>
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <form class="space-y-5" method="POST" action="{{ route('register') }}">
                @csrf
                <div>
                    <label for="name">Name</label>
                    <input id="name" name="name" type="name" class="form-input" value="{{ old('name') }}" placeholder="Enter Name" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div>
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" class="form-input" value="{{ old('email') }}" placeholder="Enter Email" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div>
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" class="form-input" placeholder="Enter Password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div>
                    <label for="password_confirmation">Confirm Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" class="form-input" placeholder="Confirm Password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
                <button type="submit" class="btn btn-primary w-full">SIGN UP</button>
            </form>
            <div
                class="relative my-7 h-5 text-center before:w-full before:h-[1px] before:absolute before:inset-0 before:m-auto before:bg-[#ebedf2] dark:before:bg-[#253b5c]">
                <div class="font-bold text-white-dark bg-white dark:bg-[#0e1726] px-2 relative z-[1] inline-block">
                    <span>OR</span></div>
            </div>
            @if (Route::has('password.request'))
                <p class="text-center">
                    <a class="text-primary font-bold hover:underline" href="{{ route('login') }}">
                        {{ __('Already have an Account?') }}
                    </a>
                </p>
            @endif
        </div>
    </div>

</x-layout.auth>
