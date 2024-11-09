<x-layout.user_banner>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Personal Information Panel</title>
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

            /* Initially hide drinking and smoking habit fields */
            .hidden {
                display: none;
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
        <form action="{{ route('profiles.religious_details_store') }}" enctype="multipart/form-data" method="POST">
            @csrf
        <div class="l">
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
        <h2>Religious Details</h2>
        <div class="form-row">
            <div class="form-group">
                <label for="religion">Religion</label>
                <select class="form-input" name="religion" id="religion" disabled>
                    <option value="hindu" selected>Hindu</option>
                </select>
                
                <!-- Hidden input to ensure 'religion' is sent with the form -->
                <input type="hidden" name="religion" value="hindu">
        
                @if ($errors->has('religion'))
                    <span class="text-danger small">{{ $errors->first('religion') }}</span>
                @endif
            </div>
        </div>
        
        

        
        <div class="form-row hidden" id="habitsRow">
            <div class="form-group">
                <label for="caste">Caste</label>
                <select class="form-input" name="caste" id="caste" disabled>
                    @foreach($castes as $caste)
                        @if($caste->name === 'Maratha')
                            <option value="{{ $caste->id }}" selected>Maratha</option> <!-- Always selected 'Maratha' -->
                        @else
                            <option value="{{ $caste->id }}" hidden>{{ $caste->name }}</option> <!-- Hide other castes -->
                        @endif
                    @endforeach
                </select> 
                @if ($errors->has('caste'))
                    <span class="text-danger small">{{ $errors->first('caste') }}</span>
                @endif   
            </div>
              

            <div class="form-group">
                <label>Subcastes</label>
                <select class="form-input" name="sub_caste" id="sub_caste">
                    <option value="" selected>select an option</option>
                    @foreach($subCastes as $subCaste)
                    <option value="{{$subCaste->id}}" {{ ($user->sub_caste === $subCaste->id ) ? 'selected' : ''}}>{{$subCaste->name}}</option>
                    @endforeach
                </select> 
                @if ($errors->has('sub_caste'))
                <span class="text-danger small">{{ $errors->first('sub_caste') }}</span>
                @endif   
                  
           </div>
          
            <div class="form-group">
                <label for="gotra">Gotra</label>
                <input type="text" name="gotra"  value="{{ $user->gotra }}" id="gotra" placeholder="Enter first name" >
                @if ($errors->has('gotra'))
                <span class="text-danger small">{{ $errors->first('gotra') }}</span>
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
        document.addEventListener('DOMContentLoaded', function() {
            const religionSelect = document.getElementById('religion');
            const habitsRow = document.getElementById('habitsRow');
    
            // Check the initial value of the religion dropdown
            if (religionSelect.value === 'hindu') {
                habitsRow.classList.remove('hidden');
            } else {
                habitsRow.classList.add('hidden');
            }
    
            // Listen for changes in the Religion dropdown
            religionSelect.addEventListener('change', function() {
                if (religionSelect.value === 'hindu') {
                    habitsRow.classList.remove('hidden');
                } else {
                    habitsRow.classList.add('hidden');
                }
            });
        });
    </script>
    

    </body>
    </html>

{{-- end --}}
</x-layout.user_banner>
