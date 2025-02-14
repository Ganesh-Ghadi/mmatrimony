<x-layout.user_banner>
   
 
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

/* //progress bar */
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
    </head>
    <body>
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
                    <h3 class="text-center" style="color: #FF3846;  margin: 20px;">About Life Partner</h3>

        <div class="panel">
            <h4>Age / Height Information</h4>
            <div class="container mt-3" id="dropdowns">
                <div class="row">
                    @if($user->role === 'bride')
                    <div class="col">
                        <div class="form-group">
                            <label for="partner_min_age">Min Age</label>
                            <select name="partner_min_age" id="partner_min_age" class="form-input">
                                <option value="" selected>select an option</option>
                                @if (config('data.partner_min_age'))
                                    @foreach (config('data.partner_min_age') as $value => $name)
                                        <option value="{{$value}}" {{ ($user->partner_min_age === $value) ? 'selected' : ''}} >{{ $name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @if ($errors->has('partner_min_age'))
                            <span class="text-danger small">{{ $errors->first('partner_min_age') }}</span>
                            @endif  
                        </div>
                    </div>
                    @else 
                    <div class="col">
                        <div class="form-group">
                            <label for="partner_min_age">Min Age</label>
                            <select name="partner_min_age" id="partner_min_age" class="form-input">
                                <option value="" selected>select an option</option>
                                @if (config('data.bride_min_age'))
                                    @foreach (config('data.bride_min_age') as $value => $name)
                                        <option value="{{$value}}" {{ ($user->partner_min_age === $value) ? 'selected' : ''}} >{{ $name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @if ($errors->has('partner_min_age'))
                            <span class="text-danger small">{{ $errors->first('partner_min_age') }}</span>
                            @endif  
                        </div>
                    </div>
                    @endif
                   
                    <div class="col">
                        <div class="form-group">
                            <label for="partner_max_age">Max Age</label>
                            <select name="partner_max_age" id="partner_max_age" class="form-input">
                                <option value="" selected>select an option</option>
                                @if (config('data.partner_max_age'))
                                    @foreach (config('data.partner_max_age') as $value => $name)
                                        <option value="{{$value}}" {{ ($user->partner_max_age === $value) ? 'selected' : ''}} >{{ $name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @if ($errors->has('partner_max_age'))
                            <span class="text-danger small">{{ $errors->first('partner_max_age') }}</span>
                            @endif  
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="partner_min_height">Min Height</label>
                            <select name="partner_min_height" id="partner_min_height" class="form-input">
                                <option value="" selected>select an option</option>
                                @if (config('data.partner_min_height'))
                                    @foreach (config('data.partner_min_height') as $value => $name)
                                        <option value="{{$value}}" {{ ($user->partner_min_height === $value) ? 'selected' : ''}} >{{ $name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @if ($errors->has('partner_min_height'))
                            <span class="text-danger small">{{ $errors->first('partner_min_height') }}</span>
                            @endif 
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="partner_max_height">Max Height</label>
                            <select name="partner_max_height" id="partner_max_height" class="form-input">
                                <option value="" selected>select an option</option>
                                @if (config('data.partner_max_height'))
                                    @foreach (config('data.partner_max_height') as $value => $name)
                                        <option value="{{$value}}" {{ ($user->partner_max_height === $value) ? 'selected' : ''}} >{{ $name }}</option>
                                    @endforeach
                                @endif
                                
                            </select>
                            @if ($errors->has('partner_max_height'))
                            <span class="text-danger small">{{ $errors->first('partner_max_height') }}</span>
                            @endif 
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>  
    <div class="panel">
        <h4>Expected Information About Partenrs</h4>
        <div class="row mt-3">
            <div class="col">
                <div class="form-group">
                    <label for="partner_income">Partner Income (INR-Anually)</label>
                    <input type="text" name="partner_income" value="{{ $user->partner_income }}" id="partner_income" placeholder="Enter Native Place">
                    @if ($errors->has('partner_income'))
                        <span class="text-danger small">{{ $errors->first('partner_income') }}</span>
                    @endif
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="want_to_see_patrika">Want to see Patrika</label>
                    <select class="form-input" name="want_to_see_patrika" id="want_to_see_patrika">
                        <option value="" selected>Select an option</option>
                        <option value="yes" {{ $user->want_to_see_patrika === 'yes' ? 'selected' : '' }}>Yes</option>
                        <option value="no" {{ $user->want_to_see_patrika === 'no' ? 'selected' : '' }}>No</option>
                    </select>
                    @if ($errors->has('want_to_see_patrika'))
                        <span class="text-danger small">{{ $errors->first('want_to_see_patrika') }}</span>
                    @endif
                </div>
            </div>
        </div> <!-- Close the first row properly -->
        
        <!-- Start second row properly -->
        <div class="row mt-3">
            <div class="col">
                <div class="form-group">
                    <label for="partner_eating_habbit">Eating Habits</label>
                    <select class="form-input" name="partner_eating_habbit" id="partner_eating_habbit">
                        <option value="" selected>Select an option</option>
                        @foreach (config('data.partner_eating_habbit', []) as $value => $name)
                            <option value="{{ $value }}" {{ ($user->partner_eating_habbit === $value) ? 'selected' : '' }}>{{ $name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('partner_eating_habbit'))
                        <span class="text-danger small">{{ $errors->first('partner_eating_habbit') }}</span>
                    @endif
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="partner_city_preference">City Preference</label>
                    <input type="text" name="partner_city_preference" value="{{ $user->partner_city_preference }}" id="partner_city_preference" placeholder="Enter City Preference">
                    @if ($errors->has('partner_city_preference'))
                        <span class="text-danger small">{{ $errors->first('partner_city_preference') }}</span>
                    @endif
                </div>
            </div>
        </div>
        
        <!-- Third row -->
        <div class="row mt-3">
            <div class="col">
                <div class="form-group">
                    <label for="partner_education">Education</label>
                    <input type="text" name="partner_education" value="{{ $user->partner_education }}" id="partner_education" placeholder="Enter Education">
                    @if ($errors->has('partner_education'))
                        <span class="text-danger small">{{ $errors->first('partner_education') }}</span>
                    @endif
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="partner_job">Job</label>
                    <select class="form-input" name="partner_job" id="partner_job">
                        <option value="" selected>Select an option</option>
                        <option value="yes" {{ $user->partner_job === 'yes' ? 'selected' : '' }}>Yes</option>
                        <option value="no" {{ $user->partner_job === 'no' ? 'selected' : '' }}>No</option>
                    </select>
                    @if ($errors->has('partner_job'))
                        <span class="text-danger small">{{ $errors->first('partner_job') }}</span>
                    @endif
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="partner_business">Business</label>
                    <select class="form-input" name="partner_business" id="partner_business">
                        <option value="" selected>Select an option</option>
                        <option value="yes" {{ $user->partner_business === 'yes' ? 'selected' : '' }}>Yes</option>
                        <option value="no" {{ $user->partner_business === 'no' ? 'selected' : '' }}>No</option>
                    </select>
                    @if ($errors->has('partner_business'))
                        <span class="text-danger small">{{ $errors->first('partner_business') }}</span>
                    @endif
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="partner_foreign_resident">Foreign Resident</label>
                    <select class="form-input" name="partner_foreign_resident" id="partner_foreign_resident">
                        <option value="" selected>Select an option</option>
                        <option value="yes" {{ $user->partner_foreign_resident === 'yes' ? 'selected' : '' }}>Yes</option>
                        <option value="no" {{ $user->partner_foreign_resident === 'no' ? 'selected' : '' }}>No</option>
                    </select>
                    @if ($errors->has('partner_foreign_resident'))
                        <span class="text-danger small">{{ $errors->first('partner_foreign_resident') }}</span>
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
    </body>
    </html>
{{-- end --}}
</x-layout.user_banner>
