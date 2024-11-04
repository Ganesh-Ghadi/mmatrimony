<x-layout.user>
    <style>
        .panel {
            border: 1px solid #ddd;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 900px; 
            margin: 20px auto; 
        }
        .panel h2 {
            margin-bottom: 15px;
            text-align: center;
            color: #333;
        }
        .form-row {
            display: flex;
            justify-content: space-between;
            gap: 20px; 
            margin-bottom: 10px;
        }
        .form-group {
            flex: 1; 
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #f7f7f7;
        }
        .hidden {
            display: none;
        }
        .sidebar {
            width: 300px; 
            position: sticky;
            top: 0; 
            height: 100vh; 
            background-color: #f5f5f5; 
            padding: 15px;
            border-left: 1px solid #ddd; 
        }

        * //progress bar */
   .profile-completion {
        width: 80%;  
        margin: 0 auto;  

    }
    .progress {
        height: 30px;  
    }
    button.btn {
    background-color: #ff0000; /* Rose Red color */
    color: white !important; /* Ensure text color is white */
    border: none; /* Optional: remove border */
}
    </style>

    <form action="{{ route('profiles.store') }}" method="POST">
        @csrf
        <div>
            <div class="profile-completion">
                <h2>Profile Completion</h2>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" 
                         style="width: {{ $profileCompletion }}%;" 
                         aria-valuenow="{{ $profileCompletion }}" 
                         aria-valuemin="0" 
                         aria-valuemax="100">
                        {{ $profileCompletion }}%
                    </div>
                </div>
            </div>
            <div class="panel">
                <h2>Location Information</h2>
                <div class="container mt-3" id="dropdowns">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="country">Country</label>
                                <select class="form-input" name="country" id="country">
                                    <option value="" selected>Select an option</option>
                                    @foreach (config('data.country', []) as $value => $name)
                                        <option value="{{ $value }}" {{ ($user->country === $value) ? 'selected' : '' }}>{{ $name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('country'))
                                    <span class="text-danger small">{{ $errors->first('country') }}</span>
                                @endif  
                            </div>
                        </div>
                        <div class="col hidden" id="stateContainer">
                            <div class="form-group">
                                <label for="state">State</label>
                                <select class="form-input" name="state" id="state">
                                    <option value="" selected>Select an option</option>
                                    @foreach (config('data.state', []) as $value => $name)
                                        <option value="{{ $value }}" {{ ($user->state === $value) ? 'selected' : '' }}>{{ $name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('state'))
                                    <span class="text-danger small">{{ $errors->first('state') }}</span>
                                @endif  
                            </div>
                        </div>
                        <div class="col hidden" id="cityContainer">
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" name="city" value="{{ $user->city }}" id="city" placeholder="Enter City" >
                                @if ($errors->has('city'))
                                    <span class="text-danger small">{{ $errors->first('city') }}</span>
                                @endif  
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel">
                <h2>Address / Contact Information</h2>
                <div class="container mt-3">
                    <div class="col mt-3">
                        <div class="form-group">
                            <label for="address_line_1" class="form-label">Address Line 1</label>
                            <input type="text" name="address_line_1" value="{{ $user->address_line_1 }}" id="address_line_1" class="form-control" placeholder="Enter Address Line 1">
                            @if ($errors->has('address_line_1'))
                                <span class="text-danger small">{{ $errors->first('address_line_1') }}</span>
                            @endif  
                        </div>
                    </div>
                    <div class="col mt-3">
                        <div class="form-group">
                            <label for="address_line_2" class="form-label">Address Line 2</label>
                            <input type="text" name="address_line_2" value="{{ $user->address_line_2 }}" id="address_line_2" class="form-control" placeholder="Enter Address Line 2">
                            @if ($errors->has('address_line_2'))
                                <span class="text-danger small">{{ $errors->first('address_line_2') }}</span>
                            @endif  
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <div class="form-group">
                                <label for="landmark" class="form-label">Landmark</label>
                                <input type="text" name="landmark" value="{{ $user->landmark }}" id="landmark" class="form-control" placeholder="Enter Landmark">
                                @if ($errors->has('landmark'))
                                    <span class="text-danger small">{{ $errors->first('landmark') }}</span>
                                @endif  
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="pincode" class="form-label">Pincode</label>
                                <input type="text" name="pincode" value="{{ $user->pincode }}" id="pincode" class="form-control" placeholder="Enter Pincode">
                                @if ($errors->has('pincode'))
                                    <span class="text-danger small">{{ $errors->first('pincode') }}</span>
                                @endif  
                            </div>
                        </div>
                    </div>  
                    <div class="row mt-3">
                        <div class="col">
                            <div class="form-group">
                                <label for="mobile" class="form-label">Mobile</label>
                                <input name="mobile" type="text" id="mobile" class="form-control" 
                                       placeholder="1234567890"
                                       value="{{ $user->mobile }}" 
                                       title="Please enter a valid 10-digit mobile number">
                                @if ($errors->has('mobile'))
                                    <span class="text-danger small">{{ $errors->first('mobile') }}</span>
                                @endif  
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="landline">Landline</label>
                                <input type="text" name="landline" value="{{ $user->landline }}" id="landline" placeholder="Enter Landline" >
                                @if ($errors->has('landline'))
                                    <span class="text-danger small">{{ $errors->first('landline') }}</span>
                                @endif  
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">  
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input name="email" type="email" id="email" class="form-control" 
                                   placeholder="example@example.com"
                                   value="{{ $user->email }}"
                                   title="Please enter a valid email address">
                            @if ($errors->has('email'))
                                <span class="text-danger small">{{ $errors->first('email') }}</span>
                            @endif  
                        </div>
                    </div>
                </div>
            </div>  

            <div class="container text-end">
                <button type="submit" class="btn btn-primary btn-sm p-2">Save</button>
            </div>
        </div>
    </form>

    <div class="sidebar">
        <x-common.usersidebar />
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const countryDropdown = document.getElementById('country');
            const stateContainer = document.getElementById('stateContainer');
            const cityContainer = document.getElementById('cityContainer');

            // Function to toggle visibility
            function toggleStateCity() {
                if (countryDropdown.value === 'india') {
                    stateContainer.classList.remove('hidden');
                    cityContainer.classList.remove('hidden');
                } else {
                    stateContainer.classList.add('hidden');
                    cityContainer.classList.add('hidden');
                }
            }

            // Initial check
            toggleStateCity();

            // Add event listener to dropdown
            countryDropdown.addEventListener('change', toggleStateCity);
        });
    </script>
</x-layout.user>
