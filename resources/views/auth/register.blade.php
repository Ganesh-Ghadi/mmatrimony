<x-layout.user>
    <div class="d-flex justify-content-center align-items-center min-vh-100 bg-light" style="background-image: url('/assets/images/map.svg'); background-size: cover; background-position: center;">
        <div class="card" style="width: 480px;">
            <div class="card-body">
                <h2 class="font-weight-bold mb-3 text-center">Register</h2>
                <p class="mb-3 text-center">Enter the following details to register</p>
                {{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}
                @if(Session::has('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                </div>
            @endif
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="row mb-2">
                        <div class="col">
                            <label for="first_name" class="form-label" style="color: black; margin: 10px 0">First Name</label>
                            <input id="first_name" name="first_name" type="text" class="form-control" value="{{ old('first_name') }}" placeholder="First Name" required autofocus autocomplete="" />
                            <x-input-error :messages="$errors->get('first_name')" class="mt-2 text-danger small" />
                        </div>
                        
                        
                        <div class="col">
                            <label for="middle_name" class="form-label" style="color: black; margin: 10px 0;">Middle Name</label>
                            <input id="middle_name" name="middle_name" type="text" class="form-control" value="{{ old('middle_name') }}" placeholder="Middle Name" required autofocus autocomplete="" />
                            <x-input-error :messages="$errors->get('middle_name')" class="mt-2 text-danger small" />
                        </div>
                        <div class="col">
                            <label for="last_name" class="form-label" style="color: black; margin: 10px 0;">Last Name</label>
                            <input id="last_name" name="last_name" type="text" class="form-control" value="{{ old('last_name') }}" placeholder="Last Name" required autofocus autocomplete="" />
                            <x-input-error :messages="$errors->get('last_name')" class="mt-2 text-danger small" />
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="email" class="form-label" style="color: black; margin: 10px 0;">Email</label>
                        <input id="email" name="email" type="email" class="form-control" value="{{ old('email') }}" placeholder="Enter Email" required autofocus autocomplete="" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger small" />
                    </div>
                    <div class="mb-2">
                        <label for="mobile" class="form-label" style="color: black; margin: 10px 0;">Mobile</label>
                        <input id="mobile" name="mobile" type="tel" class="form-control @error('mobile') is-invalid @enderror"
                               value="{{ old('mobile') }}" placeholder="+91 1234567890" required autofocus autocomplete="off"
                               pattern="^\+?[0-9]{1,15}$" title="Please enter a valid mobile number with country code (e.g., +1 1234567890)" />
                        
                        <x-input-error :messages="$errors->get('mobile')" class="mt-2 text-danger small" />
                    </div>
                    <div class="mb-2">
                        <label for="date_of_birth" class="form-label" style="color: black; margin: 10px 0;">Date of Birth</label>
                        <input id="date_of_birth" name="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror"
                               value="{{ old('date_of_birth') }}" placeholder="Enter Date of Birth" required autofocus
                               max="{{ now()->subYears(18)->format('Y-m-d') }}" title="You must be at least 18 years old" />
                        
                        <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2 text-danger small" />
                    </div>
                    
                    <div class="mb-2 ">
                        <label class="form-label" style="color: black; margin: 10px 0;">Looking for:</label>
                        <div class="d-flex gap-2 flex-row">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" id="bride" value="bride" {{ old('role') === 'bride' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="bride" style="color: black;">
                                Bride
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" id="groom" value="groom" {{ old('role') === 'groom' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="groom" style="color: black;">
                                Groom
                            </label>
                        </div>
                        <x-input-error :messages="$errors->get('role')" class="mt-2 text-danger small" />
                    </div>
                </div>
                    
                    
                    {{-- <div class="mb-2">
                        <label for="password" class="form-label" style="color: black; margin: 10px 0;">Password</label>
                        <input id="password" name="password" type="password" class="form-control" placeholder="Enter Password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger small" />
                    </div>
                    <div class="mb-2">
                        <label for="password_confirmation" class="form-label" style="color: black; margin: 10px 0;">Confirm Password</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" placeholder="Confirm Password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-danger small" />
                    </div> --}}
                    <button type="submit" class="btn text-white btn-primary w-100">Register</button>
                </form>
               
                @if (Route::has('password.request'))
                <p class="text-end my-2 small"> 
                        <a class="text-primary font-weight-bold" href="{{ route('login') }}">
                            {{ __('Already have an Account?') }}
                        </a>
                    </p>
                @endif
            </div>
        </div>
    </div>
    
    

</x-layout.user>
