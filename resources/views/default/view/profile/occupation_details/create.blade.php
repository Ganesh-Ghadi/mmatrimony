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


/* //progress bar */
.profile-completion {
        width: 80%;  
        margin: 0 auto;  

    }
    .progress {
        height: 30px;  
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
    <div class="panel">
        <h2>Organisation Information</h2>
        <div class="container mt-3" id="dropdowns">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="occupation">Occupation</label>
                        <select name="occupation" id="occupation"">
                            <option value="" selected>Select an option</option>
                            @foreach (config('data.occupation', []) as $value => $name)
                                <option value="{{$value}}" {{ ($user->occupation === $value) ? 'selected' : ''}} >{{ $name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('occupation'))
                        <span class="text-danger small">{{ $errors->first('occupation') }}</span>
                        @endif  
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="organization">Organisation</label>
                        <input type="text" name="organization" value="{{$user->organization}}" id="organization" class="form-control" placeholder="Enter Organization">
                        @if ($errors->has('organization'))
                        <span class="text-danger small">{{ $errors->first('organization') }}</span>
                        @endif  
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <div class="form-group">
                        <label for="designation">Designation</label>
                        <input type="text" name="designation" value="{{$user->designation}}" id="designation" class="form-control" placeholder="Enter designation">
                        @if ($errors->has('designation'))
                        <span class="text-danger small">{{ $errors->first('designation') }}</span>
                        @endif  
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="job_location">Job Location</label>
                        <input type="text" name="job_location" value="{{$user->job_location}}" id="job_location" class="form-control" placeholder="Enter job_location">
                        @if ($errors->has('job_location'))
                        <span class="text-danger small">{{ $errors->first('job_location') }}</span>
                        @endif  
                    </div>
                </div>
            </div>
        </div>
    </div>  

    <div class="panel">
        <h2>Experience / Income Information</h2>
        <div class="container mt-3" id="dropdowns">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="income">Income (INR)</label>
                        <input type="text" name="income" value="{{$user->income}}" id="income" class="form-control" placeholder="Enter income">
                        <x-input-error :messages="$errors->get('income')" class="mt-2" />
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="job_experience">Job Experience (months)</label>
                        <input type="text" name="job_experience" value="{{$user->job_experience}}" id="job_experience" class="form-control" placeholder="Enter Job Experience">
                        @if ($errors->has('job_experience'))
                        <span class="text-danger small">{{ $errors->first('job_experience') }}</span>
                        @endif  
                    </div>
                </div>
                {{-- <div class="col">
                    <div class="form-group">
                        <label for="dropdown1" class="form-label">Currency</label>
                        <select id="dropdown1" class="form-select">
                            <option value="">Select an option</option>
                            <option value="inr">INR</option>
                            <option value="usd">USD</option>
                            <option value="aed">AED</option>    
                        </select>
                    </div>
                </div> --}}
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

    
   
    
    
    </body>
    </html>

{{-- end --}}
</x-layout.user>
