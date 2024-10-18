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
            .form-group input, .form-group select {
                width: 100%;
                padding: 8px;
                box-sizing: border-box;
                border: 1px solid #ccc;
                border-radius: 4px;
                background-color: #f7f7f7;
            }
            .form-group textarea {
        width: 100%; /* Adjust this to 100% or any desired percentage */
        padding: 8px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
        background-color: #f7f7f7;
        height: 100px;
    }
    .form-group {
                flex: 1;
                text-align: center;
            }
            .form-group input[type="file"] {
                display: block;
                margin: 0 auto;
                width: 100%;
                padding: 8px;
                border: 1px solid #ccc;
                border-radius: 4px;
                background-color: #f7f7f7;
            }
            .form-group label {
                margin-bottom: 5px;
                display: block;
                font-weight: bold;
                color: #555;
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
/* //checkbox */
.form-check {
    display: flex;
    align-items: center; /* Center aligns the checkbox and label vertically */
}

.form-check-input {
    appearance: checkbox; /* Ensures the input is displayed as a checkbox */
    width: 16px; /* Adjust the width */
    height: 16px; /* Adjust the height */
    margin-right: 8px; /* Space between the checkbox and label */
    cursor: pointer; /* Changes cursor to pointer on hover */
    outline: none; /* Removes the default browser outline */
}

.form-check-label {
    font-size: 14px; /* Adjust the font size */
    color: #333; /* Change label text color */
}

            

   
            
        </style>
   <form action="{{ route('profiles.store') }}" method="POST">
    @csrf
        <div class="l">

                  <div class="panel">
       
        <h2>Personal Information</h2>

        <!-- Row with First Name, Middle Name, and Last Name in one line -->    
        <div class="form-row">
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name"  value="{{ $user->first_name }}" id="first_name" placeholder="Enter first name" required>
                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
            </div>
            
            <div class="form-group">
                <label for="middle_name">Middle Name</label>
                <input type="text" name="middle_name"  value="{{ $user->middle_name }}" id="middle_name" placeholder="Enter Middle name" required>
                <x-input-error :messages="$errors->get('middle_name')" class="mt-2" />            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name"  value="{{ $user->last_name }}" id="last_name" placeholder="Enter First name" required>
                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
             </div>
        </div>

        <!-- Second row with Mother Tongue and Country -->
        <div class="form-row">
            <div class="form-group">
                <label for="mother_tongue">Mother Tongue</label>
                <select name="mother_tongue" class="form-input" id="mother_tongue">
                    <option value="" selected>Select an option</option>
                    @foreach (config('data.mother_tongues', []) as $value => $name)
                        <option value="{{ $value }}" {{ ($user->mother_tongue === $value) ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
 
                
                
            </div>
            <div class="form-group">
                <label for="native_place">Native Place</label>
                <input type="text" name="native_place"  value="{{ $user->native_place }}" id="native_place" placeholder="Enter Native Place" required>
                <x-input-error :messages="$errors->get('native_place')" class="mt-2" />
            </div>
 
            <div class="form-group">
                <label for="gender">Gender</label>
                <select name="gender" id="gender" class="form-input">
                    <option value="" selected>select an option</option>
                    @if (config('data.gender'))
                        @foreach (config('data.gender') as $value => $name)
                            <option value="{{$value}}" {{ ($user->gender === $value) ? 'selected' : ''}} >{{ $name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>

           
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="marital_status">Marital Status</label>
                <select class="form-input" name="marital_status" id="marital_status">
                    <option value="" selected>Select an option</option>
                    @foreach (config('data.marital_status', []) as $value => $name)
                        <option value="{{ $value }}" {{ ($user->marital_status === $value) ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                    
                        
                </select>
            </div>
            <div class="form-group">
                <label for="living_with">Living With</label>
                <select class="form-input" name="living_with" id="living_with">
                    <option value="" selected>Select an option</option>
                    @foreach (config('data.living_with', []) as $value => $name)
                        <option value="{{ $value }}" {{ ($user->living_with === $value) ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach <!-- Add this to close the loop -->
                </select>
            </div>
            
        </div>
    </div>
    <div class="panel">
        <h2>Health Information</h2>

        <!-- Row with First Name, Middle Name, and Last Name in one line -->
        <div class="form-row">
            <div class="form-group">
                <label for="blood_group">Blood Group</label>
                <select class="form-input" name="blood_group" id="blood_group">
                    <option value="" selected>Select an option</option>
                    @foreach (config('data.blood_group', []) as $value => $name)    
                    <option value="{{ $value }}" {{ ($user->blood_group === $value) ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                      
                </select>
            </div>
            <div class="form-group">
                <label for="height">Height</label>
                <select class="form-input" name="height" id="height">
                    <option value="" selected>Select an option</option>
                    @foreach (config('data.height', []) as $value => $name)
                        <option value="{{ $value }}" {{ ($user->height === $value) ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach 
                    
                    
                </select>
            </div>
            <div class="form-group">
                <label for="weight">Weight (kg)</label>
                <input type="text" name="weight"  value="{{ $user->weight }}" id="weight" placeholder="Enter Weight in Kgs" required>
                <x-input-error :messages="$errors->get('weight')" class="mt-2" />
            </div>
        </div>
       

        <!-- Second row with Mother Tongue and Country -->
        <div class="form-row">
            <div class="form-group">
                <label for="body_type">Body Type</label>
                <select class="form-input" name="body_type" id="body_type">
                    <option value="" selected>Select an option</option>
                    @foreach (config('data.body_type', []) as $value => $name)
                        <option value="{{ $value }}" {{ ($user->body_type === $value) ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                     
                </select>
            </div>
           
            <div class="form-group">
                
                    <label>Complexion <span class="text-red-500">*</span></label>
                    <select class="form-input" name="complexion" id="complexion">
                        <option value="" selected>select an option</option>
                        @foreach (config('data.complexion') as $value => $name)
                            <option value="{{$value}}" {{ ($user->complexion === $value) ? 'selected' : ''}} >{{ $name }}</option>
                        @endforeach
                    </select> 
                    <x-input-error :messages="$errors->get('complexion')" class="mt-2" /> 
                 
            </div>

           
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="physical_abnormality">Physical Abnormality</label>
                <select class="form-input" name="physical_abnormality" id="physical_abnormality">
                    <option value="" selected>select an option</option>
                    <option value="1" {{$user->physical_abnormality === 1 ? 'selected' : ''}} >Yes</option>
                    <option value="0" {{$user->physical_abnormality === 0 ? 'selected' : ''}}>No</option>
                </select>
                <x-input-error :messages="$errors->get('physical_abnormality')" class="mt-2" /> 
            </div>
            <div class="form-group">
                <label for="spectacles">Spectacles</label>
                <!-- Hidden input to ensure 0 is submitted when unchecked -->
                <input type="hidden" name="spectacles" value="0">
                
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="spectacles" id="spectacles" value="1"
                        {{ $user->spectacles ? 'checked' : '' }}>
                 </div>
                <x-input-error :messages="$errors->get('spectacles')" class="mt-2" />
            </div>
            <div class="form-group">
                <label for="lens">lens</label>
                <!-- Hidden input to ensure 0 is submitted when unchecked -->
                <input type="hidden" name="lens" value="0">
                
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="lens" id="lens" value="1"
                        {{ $user->lens ? 'checked' : '' }}>
                 </div>
                <x-input-error :messages="$errors->get('lens')" class="mt-2" />
            </div>
            
            
            
            
 
            
            
        </div>
    </div>
    <div class="panel">
        <h2>Food Habits</h2>
        <div class="form-row">
            <div class="form-group">
                <label for="eating_habits">Eating Habbits</label>
                <select class="form-input" name="eating_habits" id="eating_habits">
                    <option value="" selected>Select an option</option>
                    @foreach (config('data.eating_habits', []) as $value => $name)
                        <option value="{{ $value }}" {{ ($user->eating_habits === $value) ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
            </div>
           
            <div class="form-group">
                <label for="drinking_habits">Drinking Habbits</label>
                <select class="form-input" name="drinking_habits" id="drinking_habbits">
                    <option value="" selected>Select an option</option>
                    @foreach (config('data.drinking_habits', []) as $value => $name)
                        <option value="{{ $value }}" {{ ($user->drinking_habits === $value) ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                    
                </select>
            </div>
            <div class="form-group">
                <label for="smoking_habits">Smoking Habbits</label>
                <select class="form-input" name="smoking_habits" id="smoking_habbits">
                    <option value="" selected>Select an option</option>
                    @foreach (config('data.smoking_habits', []) as $value => $name)
                        <option value="{{ $value }}" {{ ($user->smoking_habits === $value) ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                    
                </select>
            </div>

           
        </div>
         
    </div>
    
   <div class="panel">
        <div class="form-group">
            <label for="about_self">About Yourself</label>
            <textarea name="about_self" id="about_self" class="form-input" placeholder="Tell us about yourself..." required>{{ old('about_self', $user->about_self) }}</textarea>
            <x-input-error :messages="$errors->get('about_self')" class="mt-2" />
        </div>
    
    
    </div>

    <div class="panel">
        <h2>Upload Photos</h2>

        <div class="form-row">
            <div class="form-group">
                <label for="photo1">Photo 1</label>
                <input type="file" id="photo1" accept="image/*">
            </div>
            <div class="form-group">
                <label for="photo2">Photo 2</label>
                <input type="file" id="photo2" accept="image/*">
            </div>
            <div class="form-group">
                <label for="photo3">Photo 3</label>
                <input type="file" id="photo3" accept="image/*">
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
        

          // Get the container where the textarea will be inserted
          const textareaContainer = document.getElementById('textarea-container');

// Create the form-group div
const formGroupDiv = document.createElement('div');
formGroupDiv.className = 'form-group';

// Create the label element
const label = document.createElement('label');
label.setAttribute('for', 'eating_habbits');
label.textContent = 'Eating Habits';

// Create the textarea element
const textarea = document.createElement('textarea');
textarea.id = 'eating_habbits';
textarea.placeholder = 'Describe your eating habits';

// Append the label and textarea to the form-group div
formGroupDiv.appendChild(label);
formGroupDiv.appendChild(textarea);

// Append the form-group div to the container
textareaContainer.appendChild(formGroupDiv);
    </script>
    
   

{{-- end --}}
 </x-layout.user>
