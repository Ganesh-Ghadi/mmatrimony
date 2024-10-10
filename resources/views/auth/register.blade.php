<x-layout.user>
    <div class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
        <div class="card" style="width: 50%;">
            <div class="card-body">
                <h2 class="font-weight-bold mb-3">Register</h2>
                <p class="mb-4">Enter the following details to register</p>
                <x-auth-session-status class="mb-4" :status="session('status')" />
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="row mb-3">
                        <div class="col">
                            <label for="first_name" class="form-label" style="color: black;">First Name</label>
                            <input id="first_name" name="first_name" type="text" class="form-control" value="{{ old('first_name') }}" placeholder="First Name" required autofocus autocomplete="" />
                            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                        </div>
                        
                        
                        <div class="col">
                            <label for="middle_name" class="form-label" style="color: black; margin: 10px 0;">Middle Name</label>
                            <input id="middle_name" name="middle_name" type="text" class="form-control" value="{{ old('middle_name') }}" placeholder="Middle Name" required autofocus autocomplete="" />
                            <x-input-error :messages="$errors->get('middle_name')" class="mt-2" />
                        </div>
                        <div class="col">
                            <label for="last_name" class="form-label" style="color: black; margin: 10px 0;">Last Name</label>
                            <input id="last_name" name="last_name" type="text" class="form-control" value="{{ old('last_name') }}" placeholder="Last Name" required autofocus autocomplete="" />
                            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label" style="color: black; margin: 10px 0;">Email</label>
                        <input id="email" name="email" type="email" class="form-control" value="{{ old('email') }}" placeholder="Enter Email" required autofocus autocomplete="" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label" style="color: black; margin: 10px 0;">Password</label>
                        <input id="password" name="password" type="password" class="form-control" placeholder="Enter Password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label" style="color: black; margin: 10px 0;">Confirm Password</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" placeholder="Confirm Password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Register</button>
                </form>
                <div class="text-center my-4">
                    <div class="position-relative">
                        <hr class="my-2" />
                        <span class="bg-light px-2">OR</span>
                    </div>
                </div>
                @if (Route::has('password.request'))
                    <p class="text-center">
                        <a class="text-primary font-weight-bold" href="{{ route('login') }}">
                            {{ __('Already have an Account?') }}
                        </a>
                    </p>
                @endif
            </div>
        </div>
    </div>
    
    

</x-layout.user>
