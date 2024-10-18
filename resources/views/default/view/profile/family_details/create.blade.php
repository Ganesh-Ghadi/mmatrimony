<x-layout.user>

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
        </style>
    </head>
    <body>
        <form action="{{ route('profiles.store') }}" method="POST">
            @csrf
 <div>
    <div class="panel">
        <h2>Father Details</h2>

        <div class="form-row">
            
            <div class="form-group">
                <label for="father_is_alive">Father is Alive</label>
                <select class="form-input" name="father_is_alive" id="father_is_alive">
                    <option value="" selected>Select an option</option>
                    <option value="yes" {{ $user->father_is_alive === "yes" ? 'selected' : '' }}>Yes</option>
                    <option value="no" {{ $user->father_is_alive === "no" ? 'selected' : '' }}>No</option>
                </select>
                <x-input-error :messages="$errors->get('father_is_alive')" class="mt-2" />
            </div>
        </div>

        <!-- Native Place and Gender fields, initially hidden -->
        <div class="form-row {{ $user->father_is_alive === 'yes' ? '' : 'hidden' }}" id="additionalInfo">

              <div class="form-group">
                <label for="father_name">Father Name</label>
                <input type="text" class="form-input" name="father_name"  value="{{ $user->father_name }}" id="father_name" placeholder="Enter Father Name" required>
                <x-input-error :messages="$errors->get('father_name')" class="mt-2" />
            </div>
            
            <div class="form-group">
                <label for="occupation">Occupation</label>
                <select class="form-input" name="father_occupation" id="father_occupation">
                    <option value="" selected>Select an option</option>
                    @foreach (config('data.occupation') as $value => $name)
                        <option value="{{$value}}" {{ ($user->father_occupation === $value) ? 'selected' : ''}} >{{ $name }}</option>
                    @endforeach
                   
                </select>
            </div>
            <div class="form-group">
                <label for="father_job_type">Job Type</label>
                <select class="form-input" name="father_job_type" id="father_job_type">
                    <option value="" selected>Select an option</option>
                    @foreach (config('data.job_type') as $value => $name)
                        <option value="{{$value}}" {{ ($user->father_job_type === $value) ? 'selected' : ''}} >{{ $name }}</option>
                    @endforeach
                  
                </select>
            </div>
            <div class="form-group">
                <label for="organisationName">Organisation Name</label>
                <input type="text" class="form-input" name="father_organization"  value="{{ $user->father_organization }}" id="father_organization" placeholder="Enter Organisation Name" required>
                <x-input-error :messages="$errors->get('father_organization')" class="mt-2" />
            </div>
       
    </div>
    </div>
    <div class="panel">
        <h2>Mother Details</h2>
    
        <div class="form-row">
            <div class="form-group">
                <label for="mother_is_alive">Is Alive</label>
                <select class="form-input" name="mother_is_alive" id="mother_is_alive">
                    <option value="" selected>Select an option</option>
                    <option value="yes" {{ $user->mother_is_alive === "yes" ? 'selected' : '' }}>Yes</option>
                    <option value="no" {{ $user->mother_is_alive === "no" ? 'selected' : '' }}>No</option>
                </select>
            </div>
        </div>
    
        <!-- Additional fields, initially hidden -->
        <div class="form-row {{ $user->mother_is_alive === 'yes' ? '' : 'hidden' }}" id="additionalInfo">

        {{-- <div class="form-row hidden" id="motherAdditionalInfo"> --}}
            <div class="form-group">
                <label for="mother_name">Full Name</label>
                <input class="form-input" name="mother_name"  value="{{ $user->mother_name }}" id="mother_name" placeholder="Enter Mother Name" required>
                <x-input-error :messages="$errors->get('mother_name')" class="mt-2" />
            </div>
            <div class="form-group">
                <label for="occupation">Occupation</label>
                <select class="form-input" name="mother_occupation" id="mother_occupation">
                    <option value="" selected>Select an option</option>
                    @foreach (config('data.occupation') as $value => $name)
                        <option value="{{$value}}" {{ ($user->mother_occupation === $value) ? 'selected' : ''}} >{{ $name }}</option>
                    @endforeach
                   
                </select>
            </div>
            <div class="form-group">
                <label for="mother_job_type">Job Type</label>
                <select class="form-input" name="mother_job_type" id="mother_job_type">
                    <option value="" selected>Select an option</option>
                    @foreach (config('data.job_type') as $value => $name)
                        <option value="{{$value}}" {{ ($user->mother_job_type === $value) ? 'selected' : ''}} >{{ $name }}</option>
                    @endforeach
                     
                </select>
            </div>
            <div class="form-group">
                <label for="mother_organization">Organization Name</label>
                <input type="text" name="mother_organization"  value="{{ $user->mother_organization }}" id="mother_organization" placeholder="Enter Native Place" required>
                <x-input-error :messages="$errors->get('mother_organization')" class="mt-2" />
            </div>
        </div>
    </div>
    <div class="panel">
        <h2>Brother Details</h2>
        <div class="form-row">
            <div class="form-group">
                <label for="brother_resident_place">Resident Place</label>
                <input type="text" class="form-input" name="brother_resident_place"  value="{{ $user->brother_resident_place }}" id="brother_resident_place" placeholder="Enter Resident Place" required>
                <x-input-error :messages="$errors->get('brother_resident_place')" class="mt-2" />
             </div>
             <div class="form-group">
                <label for="number_of_brothers_married">Brother Married</label>
                <select name="number_of_brothers_married" id="number_of_brothers_married" class="form-input">
                    <option value="" selected>Select an option</option>
                    @for ($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}" {{ ($user->number_of_brothers_married == $i) ? 'selected' : '' }}>{{ $i }} {{ $i > 1 ? 'Brothers' : 'Brother' }}</option>
                    @endfor
                </select>
            </div>
            
            <div class="form-group">
                <label for="number_of_brothers_unmarried">Brother UnMarried</label>
                <select name="number_of_brothers_unmarried" id="number_of_brothers_unmarried" class="form-input">
                    <option value="" selected>Select an option</option>
                    @for ($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}" {{ ($user->number_of_brothers_unmarried == $i) ? 'selected' : '' }}>{{ $i }} {{ $i > 1 ? 'Brothers' : 'Brother' }}</option>
                    @endfor
                </select>
            </div>
        </div>
    </div>
    <div class="panel">
        <h2>Sister Details</h2>
        <div class="form-row">
            <div class="form-group">
                <label for="sister_resident_place">Resident Place</label>
                <input class="form-input" name="sister_resident_place"  value="{{ $user->sister_resident_place }}" id="sister_resident_place" placeholder="Enter Resident Place" required>
                <x-input-error :messages="$errors->get('sister_resident_place')" class="mt-2" />
             </div>
             <div class="form-group">
                <label for="number_of_sisters_married">Sister Married</label>
                <select name="number_of_sisters_married" id="number_of_sisters_married" class="form-input">
                    <option value="" selected>Select an option</option>
                    @for ($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}" {{ ($user->number_of_sisters_married == $i) ? 'selected' : '' }}>{{ $i }} {{ $i > 1 ? 'Sisters' : 'Sister' }}</option>
                    @endfor
                </select>
            </div>
            <div class="form-group">
                <label for="number_of_sisters_unmarried">Sister UnMarried</label>
                <select name="number_of_sisters_unmarried" id="number_of_sisters_unmarried" class="form-input">
                    <option value="" selected>Select an option</option>
                    @for ($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}" {{ ($user->number_of_sisters_unmarried == $i) ? 'selected' : '' }}>{{ $i }} {{ $i > 1 ? 'Brothers' : 'Brother' }}</option>
                    @endfor
                </select>
            </div>
        </div>
    </div>


    <div class="panel">
        <h2>About Parents</h2>
        <div class="panel">
            <div class="form-group">
                <label for="about_parents">About Yourself</label>
                <textarea name="about_parents" id="about_parents" class="form-input" placeholder="Tell us about yourself..." required>{{ old('about_parents', $user->about_parents) }}</textarea>
                <x-input-error :messages="$errors->get('about_parents')" class="mt-2" />
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

    


    <script>
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
    </script>

    </body>
    </html>

{{-- end --}}
</x-layout.user>
