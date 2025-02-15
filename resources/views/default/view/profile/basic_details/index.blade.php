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
   <form action="{{ route('profiles.basic_details_store') }}" enctype="multipart/form-data" method="POST">
    @csrf
        <div class="l">



            <div class="card border-0 rounded-4 mt-4 me-4 overflow-hidden" 
            style="border-radius: 10px; box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.2);">
           <div class="card-header text-white text-center py-3" 
                style="background-color: #FF0000; border-top-left-radius: 10px; border-top-right-radius: 10px;">
               <h5 class="mb-0 text-white fw-bold">Welcome, {{ $user->first_name }}{{ $user->middle_name }}{{ $user->last_name }}</h5>
           </div>
       
           <div class="card-body text-center p-4">
               <h3 class="fw-bold text-secondary">Profile Completion</h3>
               <div class="progress mt-3 rounded-pill" style="height: 10px;">
                   <div class="progress-bar bg-success rounded-pill" role="progressbar"
                       style="width: {{ $profileCompletion }}%;" 
                       aria-valuenow="{{ $profileCompletion }}" 
                       aria-valuemin="0" 
                       aria-valuemax="100">
                   </div>
               </div>
               <p class="mt-2 text-muted fw-semibold">{{ $profileCompletion }}% Completed</p>
           </div>
       </div>
       
            
            
            
            
            
            <h3 class="text-center" style="color: #FF3846;  margin: 20px;">Basic Details</h3>

            

                  <div class="panel">
                    
       
        <h2>Personal Information</h2>

        <!-- Row with First Name, Middle Name, and Last Name in one line -->    
        <div class="form-row">
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name"  value="{{ $user->first_name }}" id="first_name" placeholder="Enter first name">
                @if ($errors->has('first_name'))
                <span class="text-danger small">{{ $errors->first('first_name') }}</span>
                @endif
            </div>
            
            <div class="form-group">
                <label for="middle_name">Middle Name</label>
                <input type="text" name="middle_name"  value="{{ $user->middle_name }}" id="middle_name" placeholder="Enter Middle name" required>
                @if ($errors->has('middle_name'))
                <span class="text-danger small">{{ $errors->first('middle_name') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name"  value="{{ $user->last_name }}" id="last_name" placeholder="Enter First name" required>
                @if ($errors->has('last_name'))
                <span class="text-danger small">{{ $errors->first('last_name') }}</span>
                @endif
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
                @if ($errors->has('mother_tongue'))
                <span class="text-danger small">{{ $errors->first('mother_tongue') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="native_place">Native Place</label>
                <input type="text" name="native_place"  value="{{ $user->native_place }}" id="native_place" placeholder="Enter Native Place" >
                @if ($errors->has('native_place'))
                <span class="text-danger small">{{ $errors->first('native_place') }}</span>
                @endif
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
                @if ($errors->has('gender'))
                <span class="text-danger small">{{ $errors->first('gender') }}</span>
                @endif
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
                @if ($errors->has('marital_status'))
                <span class="text-danger small">{{ $errors->first('marital_status') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="living_with">Living With</label>
                <select class="form-input" name="living_with" id="living_with">
                    <option value="" selected>Select an option</option>
                    @foreach (config('data.living_with', []) as $value => $name)
                        <option value="{{ $value }}" {{ ($user->living_with === $value) ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach <!-- Add this to close the loop -->
                </select>
                @if ($errors->has('living_with'))
                <span class="text-danger small">{{ $errors->first('living_with') }}</span>
                @endif
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
                @if ($errors->has('blood_group'))
                <span class="text-danger small">{{ $errors->first('blood_group') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="height">Height</label>
                <select class="form-input" name="height" id="height">
                    <option value="" selected>Select an option</option>
                    @foreach (config('data.height', []) as $value => $name)
                        <option value="{{ $value }}" {{ ($user->height === $value) ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach 
                </select>
                @if ($errors->has('height'))
                <span class="text-danger small">{{ $errors->first('height') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="weight">Weight (kg)</label>
                <input type="text" name="weight"  value="{{ $user->weight }}" id="weight" placeholder="Enter Weight in Kgs" >
                @if ($errors->has('weight'))
                <span class="text-danger small">{{ $errors->first('weight') }}</span>
                @endif
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
                @if ($errors->has('body_type'))
                <span class="text-danger small">{{ $errors->first('body_type') }}</span>
                @endif
            </div>
           
            <div class="form-group">
                    <label>Complexion <span class="text-red-500">*</span></label>
                    <select class="form-input" name="complexion" id="complexion">
                        <option value="" selected>select an option</option>
                        @foreach (config('data.complexion') as $value => $name)
                            <option value="{{$value}}" {{ ($user->complexion === $value) ? 'selected' : ''}} >{{ $name }}</option>
                        @endforeach
                    </select> 
                    @if ($errors->has('complexion'))
                    <span class="text-danger small">{{ $errors->first('complexion') }}</span>
                    @endif                 
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
                @if ($errors->has('physical_abnormality'))
                <span class="text-danger small">{{ $errors->first('physical_abnormality') }}</span>
                @endif     
            </div>
            <div class="form-group">
                <label for="spectacles">Spectacles</label> 
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="spectacles" id="spectacles" value="1"
                        {{ $user->spectacles ? 'checked' : '' }}>
                 </div>
            </div>
            <div class="form-group">
                <label for="lens">lens</label>                
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="lens" id="lens" value="1"
                        {{ $user->lens ? 'checked' : '' }}>
                 </div>
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
                @if ($errors->has('eating_habits'))
                <span class="text-danger small">{{ $errors->first('eating_habits') }}</span>
                @endif     
            </div>
           
            <div class="form-group">
                <label for="drinking_habits">Drinking Habbits</label>
                <select class="form-input" name="drinking_habits" id="drinking_habbits">
                    <option value="" selected>Select an option</option>
                    @foreach (config('data.drinking_habits', []) as $value => $name)
                        <option value="{{ $value }}" {{ ($user->drinking_habits === $value) ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                    
                </select>
                @if ($errors->has('drinking_habits'))
                <span class="text-danger small">{{ $errors->first('drinking_habits') }}</span>
                @endif     
            </div>
            <div class="form-group">
                <label for="smoking_habits">Smoking Habbits</label>
                <select class="form-input" name="smoking_habits" id="smoking_habbits">
                    <option value="" selected>Select an option</option>
                    @foreach (config('data.smoking_habits', []) as $value => $name)
                        <option value="{{ $value }}" {{ ($user->smoking_habits === $value) ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                    
                </select>
                @if ($errors->has('smoking_habits'))
                <span class="text-danger small">{{ $errors->first('smoking_habits') }}</span>
                @endif     
            </div>

           
        </div>
         
    </div>
    
   <div class="panel">
        <div class="form-group">
            <label for="about_self">About Yourself</label>
            <textarea name="about_self" id="about_self" class="form-input" placeholder="Tell us about yourself..." >{{ old('about_self', $user->about_self) }}</textarea>
            @if ($errors->has('about_self'))
            <span class="text-danger small">{{ $errors->first('about_self') }}</span>
            @endif     
        </div>
    
    
    </div>

    <div class="panel">
        <h2>Upload Photos</h2>

        <div class="form-row">
            <div class="form-group">
                <label for="photo1">Photo 1</label>
                <input type="file" name="img_1" id="photo1" value="{{ $user->img_1 }}">
                 @if ($errors->has('img_1'))
                <span class="text-danger small">{{ $errors->first('img_1') }}</span>
                @endif  
            </div>

            <div class="form-group">
                <label for="photo2">Photo 2</label>
                <input type="file" name="img_2"  id="photo2">
                @if ($errors->has('img_2'))
                <span class="text-danger small">{{ $errors->first('img_2') }}</span>
                @endif  
            </div>
            <div class="form-group">
                <label for="photo3">Photo 3</label>
                <input type="file" name="img_3" id="photo3">
                @if ($errors->has('img_3'))
                <span class="text-danger small">{{ $errors->first('img_3') }}</span>
                @endif  
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                @if($user->img_1)
                <div x-data="imageLoader()" x-init="fetchImage('{{ $user->img_1 }}')">
                    <template x-if="imageUrl">
                        <!-- Wrap the image in an anchor tag to open it in a new tab -->
                        <a :href="imageUrl" target="_blank">
                            <img style="max-width: 100px;" :src="imageUrl" alt="Uploaded Image" />
                        </a>
                    </template>
                    <template x-if="!imageUrl">
                        {{-- <p>Loading image...</p> --}}
                    </template>
                </div>
                {{-- <img src="{{ asset('storage/images/' . $user->img_1) }}" alt="Uploaded Image" style="max-width: 100px;"> --}}
                @endif
            </div>
            

            <div class="form-group">
                @if($user->img_2)
                <div x-data="imageLoader()" x-init="fetchImage('{{ $user->img_2 }}')">
                     <template x-if="imageUrl">
                        <!-- Wrap the image in an anchor tag to open it in a new tab -->
                        <a :href="imageUrl" target="_blank">
                            <img style="max-width: 100px;" :src="imageUrl" alt="Uploaded Image" />
                        </a>
                    </template>
                  
                    <template x-if="!imageUrl">
                        {{-- <p>Loading image...</p> --}}
                    </template>
                </div>
                {{-- <img src="{{ asset('storage/images/' . $user->img_2) }}" alt="Uploaded Image" style="max-width: 100px;"> --}}
                  @endif
            </div>
            <div class="form-group">
                @if($user->img_3)
                <div x-data="imageLoader()" x-init="fetchImage('{{ $user->img_3 }}')">
                    <template x-if="imageUrl">
                        <!-- Wrap the image in an anchor tag to open it in a new tab -->
                        <a :href="imageUrl" target="_blank">
                            <img style="max-width: 100px;" :src="imageUrl" alt="Uploaded Image" />
                        </a>
                    </template>
                    <template x-if="!imageUrl">
                        {{-- <p>Loading image...</p> --}}
                    </template>
                </div>
                    {{-- <img src="{{ asset('storage/images/' . $user->img_3) }}" alt="Uploaded Image" style="max-width: 100px;"> --}}
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
    


    {{-- image display --}}
    <script>
        function imageLoader() {
            return {
                imageUrl: null,
        
                async fetchImage(filename) {
                    try {
                        const response = await fetch(`/api/images/${filename}`);
                        if (!response.ok) throw new Error('Image not found');
                        
                        // Create a blob URL for the image
                        const blob = await response.blob();
                        this.imageUrl = URL.createObjectURL(blob);
                    } catch (error) {
                        console.error('Error fetching image:', error);
                        this.imageUrl = null; // Handle error case
                    }
                }
            };
        }
        </script>

{{-- end --}}
 </x-layout.user_banner>
