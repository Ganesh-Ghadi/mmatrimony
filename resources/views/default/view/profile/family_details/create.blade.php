<x-layout.user_banner>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Father Details</title>
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

            /* Initially hide Native Place and Gender fields */
            .hidden {
                display: none;
            }
            .form-group textarea {
        width: 100%; /* Make the textarea full width */
        padding: 8px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
        background-color: #f7f7f7;
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

 /* Decrease width by 20% */
 .profile-completion {
        width: 80%; /* 100% - 20% */
        margin: 0 auto; /* Center the container */

    }
    .progress {
        height: 30px; /* Set the width to 100% */
    }
    button.btn {
    background-color: #ff0000; /* Rose Red color */
    color: white !important; /* Ensure text color is white */
    border: none; /* Optional: remove border */
}
           
        </style>
    </head>
    <body>
        <form action="{{ route('profiles.family_details_store') }}" method="POST">
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
        <h2>Father Details</h2>
        {{-- @if(auth()->user() && auth()->user()->hasVerifiedEmail())
        <p>Email verified</p>
    @endif --}}
    <div class="form-row">
        <div class="form-group">
            <label for="father_is_alive">Father is Alive</label>
            <select class="form-input" name="father_is_alive" id="father_is_alive">
                <option value="" selected>Select an option</option>
                <option value="1" {{ $user->father_is_alive === 1 ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ $user->father_is_alive === 0 ? 'selected' : '' }}>No</option>
            </select>
            @if ($errors->has('father_is_alive'))
                <span class="text-danger small">{{ $errors->first('father_is_alive') }}</span>
            @endif        
        </div>
    </div>
    
    <div class="form-row" id="father_details">
        <!-- First Row -->
        <div class="form-row"> <!-- Wrapper for the row -->
            <!-- First Column: Father Name -->
            <div class="form-group col-md-6">
                <label for="father_name">Father Name</label>
                <input type="text" class="form-input" name="father_name" value="{{ $user->father_name }}" id="father_name" placeholder="Enter Father Name">
                @if ($errors->has('father_name'))
                    <span class="text-danger small">{{ $errors->first('father_name') }}</span>
                @endif   
            </div>
        
            <!-- Second Column: Father Occupation -->
            <div class="form-group col-md-6">
                <label for="father_occupation">Occupation</label>
                <select class="form-input" name="father_occupation" id="father_occupation">
                    <option value="" selected>Select an option</option>
                    @foreach (config('data.occupation') as $value => $name)
                        <option value="{{$value}}" {{ ($user->father_occupation === $value) ? 'selected' : ''}}>{{ $name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('father_occupation'))
                    <span class="text-danger small">{{ $errors->first('father_occupation') }}</span>
                @endif   
            </div>
        </div>
        
    
        <!-- Second Row -->
        <div class="form-row"> <!-- Wrapper for the row -->
            <!-- First Column: Father Job Type -->
            <div class="form-group col-md-6">
                <label for="father_job_type">Job Type</label>
                <select class="form-input" name="father_job_type" id="father_job_type">
                    <option value="" selected>Select an option</option>
                    @foreach (config('data.job_type') as $value => $name)
                        <option value="{{$value}}" {{ ($user->father_job_type === $value) ? 'selected' : ''}} >{{ $name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('father_job_type'))
                    <span class="text-danger small">{{ $errors->first('father_job_type') }}</span>
                @endif   
            </div>
            
            <!-- Second Column: Father Organization -->
            <div class="form-group col-md-6">
                <label for="father_organization">Organisation Name</label>
                <input type="text" class="form-input" name="father_organization" value="{{ $user->father_organization }}" id="father_organization" placeholder="Enter Organisation Name">
                @if ($errors->has('father_organization'))
                    <span class="text-danger small">{{ $errors->first('father_organization') }}</span>
                @endif   
            </div>
        </div>
        
    </div>
    
    
    
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fatherAliveSelect = document.getElementById('father_is_alive');
            const fatherDetailsSection = document.getElementById('father_details');
            const fatherNameField = document.getElementById('father_name');
            const fatherOccupationField = document.getElementById('father_occupation');
            const fatherJobTypeField = document.getElementById('father_job_type');
            const fatherOrganizationField = document.getElementById('father_organization');
    
            // Function to toggle visibility of father details and reset values if necessary
            function toggleFatherDetails() {
                if (fatherAliveSelect.value === '1') {
                    // Show the details if father is alive
                    fatherDetailsSection.style.display = 'block';
                } else {
                    // Hide the details if father is not alive
                    fatherDetailsSection.style.display = 'none';
    
                    // Reset the values to null when father is not alive
                    fatherNameField.value = '';
                    fatherOccupationField.value = '';
                    fatherJobTypeField.value = '';
                    fatherOrganizationField.value = '';
                }
            }
    
            // Initial call to set visibility based on the current value
            toggleFatherDetails();
    
            // Event listener for changes in the "Father is Alive" dropdown
            fatherAliveSelect.addEventListener('change', toggleFatherDetails);
        });
    </script>
    
    
    </div>
    <div class="panel">
        <h2>Mother Details</h2>
    
        <div class="form-row">
            <div class="form-group">
                <label for="mother_is_alive">Is Alive</label>
                <select class="form-input" name="mother_is_alive" id="mother_is_alive">
                    <option value="" selected>Select an option</option>
                    <option value="1" {{ $user->mother_is_alive === 1 ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ $user->mother_is_alive === 0 ? 'selected' : '' }}>No</option>
                </select>
                @if ($errors->has('mother_is_alive'))
                    <span class="text-danger small">{{ $errors->first('mother_is_alive') }}</span>
                @endif   
            </div>
        </div>
        
        <!-- Additional fields, initially hidden -->
        <div class="form-row" id="mother_details">
    
            <!-- First Column: Full Name and Occupation -->
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="mother_name">Full Name</label>
                    <input class="form-input" name="mother_name" value="{{ $user->mother_name }}" id="mother_name" placeholder="Enter Mother Name">
                    @if ($errors->has('mother_name'))
                        <span class="text-danger small">{{ $errors->first('mother_name') }}</span>
                    @endif   
                </div>
            
                <div class="form-group col-md-6">
                    <label for="mother_occupation">Occupation</label>
                    <select class="form-input" name="mother_occupation" id="mother_occupation">
                        <option value="" selected>Select an option</option>
                        @foreach (config('data.occupation') as $value => $name)
                            <option value="{{$value}}" {{ ($user->mother_occupation === $value) ? 'selected' : '' }}>{{ $name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('mother_occupation'))
                        <span class="text-danger small">{{ $errors->first('mother_occupation') }}</span>
                    @endif   
                </div>
            </div>
            
        
            <!-- Second Column: Job Type and Organization Name -->
            <div class="form-row">
                <!-- First Column: Job Type -->
                <div class="form-group col-md-6">
                    <label for="mother_job_type">Job Type</label>
                    <select class="form-input" name="mother_job_type" id="mother_job_type">
                        <option value="" selected>Select an option</option>
                        @foreach (config('data.job_type') as $value => $name)
                            <option value="{{$value}}" {{ ($user->mother_job_type === $value) ? 'selected' : '' }}>{{ $name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('mother_job_type'))
                        <span class="text-danger small">{{ $errors->first('mother_job_type') }}</span>
                    @endif   
                </div>
            
                <!-- Second Column: Organization Name -->
                <div class="form-group col-md-6">
                    <label for="mother_organization">Organization Name</label>
                    <input type="text" name="mother_organization" value="{{ $user->mother_organization }}" id="mother_organization" placeholder="Enter Organization Name">
                    @if ($errors->has('mother_organization'))
                        <span class="text-danger small">{{ $errors->first('mother_organization') }}</span>
                    @endif   
                </div>
            </div>
            
        
        </div>
        
        
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const motherAliveSelect = document.getElementById('mother_is_alive');
                const motherDetailsSection = document.getElementById('mother_details');
                const motherNameField = document.getElementById('mother_name');
                const motherOccupationField = document.getElementById('mother_occupation');
                const motherJobTypeField = document.getElementById('mother_job_type');
                const motherOrganizationField = document.getElementById('mother_organization');
        
                // Function to toggle visibility and reset values of mother-related details
                function toggleMotherDetails() {
                    if (motherAliveSelect.value === '1') {
                        // Show mother details if she is alive
                        motherDetailsSection.style.display = 'block';
                    } else {
                        // Hide mother details and reset values if she is not alive
                        motherDetailsSection.style.display = 'none';
        
                        // Reset the values to null when mother is not alive
                        motherNameField.value = '';
                        motherOccupationField.value = '';
                        motherJobTypeField.value = '';
                        motherOrganizationField.value = '';
                    }
                }
        
                // Initial call to set visibility and reset values based on current state
                toggleMotherDetails();
        
                // Add event listener for changes in the "Mother is Alive" dropdown
                motherAliveSelect.addEventListener('change', toggleMotherDetails);
            });
        </script>
        
        <style>
            .form-row {
                display: flex;
                justify-content: space-between;
            }
            .form-group {
                flex: 1;
                margin-right: 20px; /* Add some space between fields */
            }
            .form-group:last-child {
                margin-right: 0; /* Remove right margin from last field */
            }
        </style>
        <div class="form-row">
            <!-- Native Place Field -->
            <div class="form-group">
                <label for="mother_native_place">Native Place</label>
                <input type="text" name="mother_native_place" value="{{ $user->mother_native_place }}" id="mother_native_place" placeholder="Enter Native Place" class="form-control">
                @if ($errors->has('mother_native_place'))
                    <span class="text-danger small">{{ $errors->first('mother_native_place') }}</span>
                @endif
            </div>
        
            <!-- Mother Name Before Marriage Field -->
            <div class="form-group">
                <label for="mother_name_before_marriage">Mother Name Before Marriage</label>
                <input type="text" name="mother_name_before_marriage" value="{{ $user->mother_name_before_marriage }}" id="mother_name_before_marriage" placeholder="Enter Mother Name Before Marriage" class="form-control">
                @if ($errors->has('mother_name_before_marriage'))
                    <span class="text-danger small">{{ $errors->first('mother_name_before_marriage') }}</span>
                @endif
            </div>
        </div>
    </div>
    <div class="panel">
        <h2>Brother Details</h2>
        <div class="form-row">
            <div class="form-group">
                <label for="brother_resident_place">Resident Place</label>
                <input type="text" class="form-input" name="brother_resident_place"  value="{{ $user->brother_resident_place }}" id="brother_resident_place" placeholder="Enter Resident Place" >
                @if ($errors->has('brother_resident_place'))
                <span class="text-danger small">{{ $errors->first('brother_resident_place') }}</span>
                @endif             
            </div>
             <div class="form-group">
                <label for="number_of_brothers_married">Brother Married</label>
                <select name="number_of_brothers_married" id="number_of_brothers_married" class="form-input">
                    <option value="" selected>Select an option</option>
                    @for ($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}" {{ ($user->number_of_brothers_married == $i) ? 'selected' : '' }}>{{ $i }} {{ $i > 1 ? 'Brothers' : 'Brother' }}</option>
                    @endfor
                </select>
                @if ($errors->has('number_of_brothers_married'))
                <span class="text-danger small">{{ $errors->first('number_of_brothers_married') }}</span>
                @endif   
            </div>
            
            <div class="form-group">
                <label for="number_of_brothers_unmarried">Brother UnMarried</label>
                <select name="number_of_brothers_unmarried" id="number_of_brothers_unmarried" class="form-input">
                    <option value="" selected>Select an option</option>
                    @for ($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}" {{ ($user->number_of_brothers_unmarried == $i) ? 'selected' : '' }}>{{ $i }} {{ $i > 1 ? 'Brothers' : 'Brother' }}</option>
                    @endfor
                </select>
                @if ($errors->has('number_of_brothers_unmarried'))
                <span class="text-danger small">{{ $errors->first('number_of_brothers_unmarried') }}</span>
                @endif   
            </div>
        </div>
    </div>
    <div class="panel">
        <h2>Sister Details</h2>
        <div class="form-row">
            <div class="form-group">
                <label for="sister_resident_place">Resident Place</label>
                <input class="form-input" name="sister_resident_place"  value="{{ $user->sister_resident_place }}" id="sister_resident_place" placeholder="Enter Resident Place" >
                @if ($errors->has('sister_resident_place'))
                <span class="text-danger small">{{ $errors->first('sister_resident_place') }}</span>
                @endif   
             </div>
             <div class="form-group">
                <label for="number_of_sisters_married">Sister Married</label>
                <select name="number_of_sisters_married" id="number_of_sisters_married" class="form-input">
                    <option value="" selected>Select an option</option>
                    @for ($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}" {{ ($user->number_of_sisters_married == $i) ? 'selected' : '' }}>{{ $i }} {{ $i > 1 ? 'Sisters' : 'Sister' }}</option>
                    @endfor
                </select>
                @if ($errors->has('number_of_sisters_married'))
                <span class="text-danger small">{{ $errors->first('number_of_sisters_married') }}</span>
                @endif   
            </div>
            <div class="form-group">
                <label for="number_of_sisters_unmarried">Sister UnMarried</label>
                <select name="number_of_sisters_unmarried" id="number_of_sisters_unmarried" class="form-input">
                    <option value="" selected>Select an option</option>
                    @for ($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}" {{ ($user->number_of_sisters_unmarried == $i) ? 'selected' : '' }}>{{ $i }} {{ $i > 1 ? 'Sisters' : 'Sister' }}</option>
                    @endfor
                </select>
                @if ($errors->has('number_of_sisters_unmarried'))
                <span class="text-danger small">{{ $errors->first('number_of_sisters_unmarried') }}</span>
                @endif   
            </div>
        </div>
    </div>


    <div class="panel">
        <h2>About Parents</h2>
        <div class="panel">
            <div class="form-group">
                <label for="about_parents">About Yourself</label>
                <textarea name="about_parents" id="about_parents" class="form-input" placeholder="Tell us about yourself..." >{{ old('about_parents', $user->about_parents) }}</textarea>
                @if ($errors->has('about_parents'))
                <span class="text-danger small">{{ $errors->first('about_parents') }}</span>
                @endif   
            </div>
    </div>
    </div>
    <div class="text-end">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</div>
</form>
<div class="sidebar">
    <x-common.usersidebar />
</div>

    


    {{-- <script>
        // Grab the 'Is Alive' dropdown and the additional info row
        const isAliveSelect = document.getElementById('father_is_alive');
        const additionalInfo = document.getElementById('additionalInfo');

        // Listen for changes in the 'Is Alive' dropdown
        isAliveSelect.addEventListener('change', function() {
            if (isAliveSelect.value === 'yes') {
                // Show Native Place and Gender fields when "Yes" is selected
                additionalInfo.classList.remove('hidden');
            } else {
                // Hide Native Place and Gender fields if "No" or blank is selected
                additionalInfo.classList.add('hidden');
            }
        });

          // Grab the 'Is Alive' dropdown and the additional info row
    const motherIsAliveSelect = document.getElementById('mother_is_alive');
    const motherAdditionalInfo = document.getElementById('motherAdditionalInfo');

    // Listen for changes in the 'Is Alive' dropdown
    motherIsAliveSelect.addEventListener('change', function() {
        if (motherIsAliveSelect.value === 'yes') {
            // Show additional info when "Yes" is selected
            motherAdditionalInfo.classList.remove('hidden');
        } else {
            // Hide additional info if "No" or blank is selected
            motherAdditionalInfo.classList.add('hidden');
        }
    });
    </script> --}}

    </body>
    </html>

{{-- end --}}
</x-layout.user_banner>
