<x-layout.user>
   
    
         <style>
            .panel {
                border: 1px solid #ddd;
                padding: 20px;
                background-color: #fff;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                max-width: 900px; /* Optional: Limit the width of the card */
                margin: 20px auto; /* Center the card on the page */
            }
            .panel h2 {
                margin-bottom: 15px;
                text-align: center;
                color: #333;
            }
            .form-row {
                display: flex;
                justify-content: space-between;
                gap: 20px; /* Space between input boxes */
                margin-bottom: 10px;
            }
            .form-group {
                flex: 1; /* Make each input field take up equal space */
             }
            .form-group label {
                display: block;
                margin-bottom: 5px;
                font-weight: bold;
                color: #555;
            }
            .form-group input, .form-group select, .form-group textarea {
                width: 100%;
                padding: 8px;
                box-sizing: border-box;
                border: 1px solid #ccc;
                border-radius: 4px;
                background-color: #f7f7f7;
            }
            .form-group textarea {
                height: 100px; /* Adjust height for the textarea */
            }
            .btn-save {
                display: block;
                width: 100%;
                margin-top: 20px;
            }
            .sidebar {
    width: 300px; /* Fixed width for the sidebar */
    position: sticky;
    top: 0; /* Make the sidebar sticky at the top when scrolling */
    height: 100vh; /* Full height of the viewport */
    background-color: #f5f5f5; /* Optional background color for sidebar */
    padding: 15px;
    border-left: 1px solid #ddd; /* Optional border for separation */
}
        </style>
    </head>
    <body>
        <form action="{{ route('profiles.store') }}" method="POST">
            @csrf
    <div>
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
                        </div>
                    </div>
                    <div class="col" id="stateContainer" style="display: none;">
                        <div class="form-group">
                            <label for="state">State</label>
                            <select class="form-input" name="state" id="state">
                                <option value="" selected>Select an option</option>
                                @foreach (config('data.state', []) as $value => $name)
                                    <option value="{{ $value }}" {{ ($user->state === $value) ? 'selected' : '' }}>{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
        
                    <div class="col" id="cityContainer" style="display: none;">
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" name="city"  value="{{ $user->city }}" id="city" placeholder="Enter City" required>
                            <x-input-error :messages="$errors->get('city')" class="mt-2" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script>
            // Get the country, state, and city elements
            const countryDropdown = document.getElementById('country');
            const stateContainer = document.getElementById('stateContainer');
            const cityContainer = document.getElementById('cityContainer');
        
            // Add event listener to the country dropdown
            countryDropdown.addEventListener('change', function() {
                if (this.value === 'india') {
                    stateContainer.style.display = 'block'; // Show state dropdown
                    cityContainer.style.display = 'block'; // Show city dropdown
                } else {
                    stateContainer.style.display = 'none'; // Hide state dropdown
                    cityContainer.style.display = 'none'; // Hide city dropdown
                }
            });
        </script>
        
        

    <div class="panel">
        <h2>Address / Contact Information</h2>
        <div class="container mt-3" id="dropdowns">
            <div class="col mt-3">
                <div class="form-group">
                    <label for="address_line_1" class="form-label">Address Line 1</label>
                    <input type="text" name="address_line_1" value="{{$user->address_line_1}}" id="address_line_1" class="form-control" placeholder="Enter Address Line 1">
                    <x-input-error :messages="$errors->get('address_line_1')" class="mt-2" />
                </div>
            </div>
            <div class="col mt-3">
                <div class="form-group">
                    <label for="address_line_2" class="form-label">Address Line 2</label>
                    <input type="text" name="address_line_2" value="{{$user->address_line_2}}" id="address_line_2" class="form-control" placeholder="Enter Address Line 2">
                    <x-input-error :messages="$errors->get('address_line_2')" class="mt-2" />
                </div>
            </div>
            <div class="row mt-3">
               
                <div class="col">
                    <div class="form-group">
                        <label for="landmark" class="form-label">Landmark</label>
                        <input type="text" name="landmark" value="{{$user->landmark}}" id="landmark" class="form-control" placeholder="Enter Landmark">
                        <x-input-error :messages="$errors->get('landmark')" class="mt-2" />
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="pincode" class="form-label">pincode</label>
                        <input type="text" name="pincode" value="{{$user->pincode}}" id="pincode" class="form-control" placeholder="Enter pincode">
                        <x-input-error :messages="$errors->get('pincode')" class="mt-2" />
                    </div>
                </div>
                
            </div>  
            <div class="row mt-3">
               
                <div class="col">
                    <div class="form-group">
                        <label for="mobile" class="form-label">Mobile</label>
                        <input name="mobile" type="text" id="mobile" class="form-control" required
                               placeholder="1234567890"
                               value="{{ $user->mobile }}" 
                               pattern="^\d{10}$"
                               title="Please enter a valid 10-digit mobile number">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="landline">Landline</label>
                        <input type="text" name="landline"  value="{{ $user->landline }}" id="landline" placeholder="Enter landline" required>
                        <x-input-error :messages="$errors->get('landline')" class="mt-2" />
                    </div>
                </div>
            </div>
            <div class="row mt-3">  
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input name="email" type="email" id="email" class="form-control" required
                           placeholder="example@example.com"
                           value="{{ $user->email }}"
                           pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                           title="Please enter a valid email address">
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
         
    </script>

    
   
    
    
    </body>
    </html>

{{-- end --}}
</x-layout.user>
