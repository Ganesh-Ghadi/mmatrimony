<x-layout.user_banner>
    <style>
        a.btn {
       background-color: #ff0000; /* Rose Red color */
       color: white !important; /* Ensure text color is white */
       
   }
   </style>
    <div class="d-flex justify-content-center align-items-center min-vh-100 bg-light" style="background-image: url('/assets/images/map.svg'); background-size: cover; background-position: center;">
        <div class="card" style="width: 480px;">
            <div class="card-body">
                <h2 class="font-weight-bold mb-3">Sign In</h2>
                <p class="mb-4">Enter your Email or Mobile Number to login</p>
                {{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}
                @if(Session::has('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Password has been set successfully.
                </div>
            @endif
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    {{-- <div class="mb-3">
                        <label for="email" class="form-label" style="color: black;">Email/Mobile</label>
                        <input id="email" name="email" type="text" class="form-control" value="{{ old('email') }}" placeholder="Enter email or mobile number" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2 small text-danger " />
                    </div> --}}
                    <div class="mb-3">
                        <label for="email" class="form-label" style="color: black;">Email/Mobile</label>
                        <input id="email" name="email" type="text" class="form-control" value="{{ old('email') }}"
                               placeholder="Enter email or mobile number" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2 small text-danger" />
                      </div>
                      
                      <script>
                        // Wait for the DOM to be fully loaded
                        document.addEventListener("DOMContentLoaded", function() {
                          const inputField = document.getElementById("email");
                      
                          inputField.addEventListener("blur", function() {
                            let value = inputField.value.trim();
                      
                            // Check if the input starts with a digit and doesn't already have '+91'
                            // Also, ensure it doesn't look like an email (i.e., no '@' symbol)
                            if (value && /^[0-9]/.test(value) && !value.includes('@') && !value.startsWith('+91')) {
                              inputField.value = '+91' + value;
                            }
                          });
                        });
                      </script>
                      
                    <div class="mb-3">
                        <label for="password" class="form-label" style="color: black;">Password</label>
                        <input id="password" name="password" type="password" class="form-control" placeholder="Enter Password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2 small text-danger" />
                    </div>
                    <div class="mb-3 form-check">
                        <input id="remember_me" name="remember" type="checkbox" class="form-check-input" />
                        <label for="remember_me" class="form-check-label" style="color: black;">{{ __('Remember me') }}</label>
                    </div>
                    <button type="submit" class="btn text-white btn-primary w-100">SIGN IN</button>
                </form>
                @if (Route::has('password.request'))
                    <p class="text-center my-4">
                        <a class="text-primary font-weight-bold" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    </p>
                @endif
            </div>
        </div>
    </div>
</x-layout.user_banner>
