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
            .sidebar {
    width: 300px; /* Fixed width for the sidebar */
    position: sticky;
    top: 0; /* Make the sidebar sticky at the top when scrolling */
    height: 100vh; /* Full height of the viewport */
    background-color: #f5f5f5; /* Optional background color for sidebar */
    padding: 15px;
    border-left: 1px solid #ddd; /* Optional border for separation */
}
/* imagedropdown */
    .transparent-input {
        background-color: transparent;
        border: none;
        color: black; /* Ensures the text (number) remains visible */
        text-align: center; /* Center the text */
        font-size: 12px;
        font-weight: bold;
        padding: 0; /* Remove padding */
        width: 20px;
        cursor: pointer;

         /* Match width of the dropdown */
    }

    .transparent-input:focus {
        outline: none; /* Remove focus outline */
    }

    /* Optional: Hide the placeholder if you want */
    .transparent-input::placeholder {
        color: transparent; /* Make the placeholder transparent */
    }
    .dropdown-container {
    display: flex;               /* Use flexbox to align items */
    align-items: center;        /* Center items vertically */
}

.transparent-input {
                    /* Adjust the width as needed */
    padding: 3px;              /* Ensure padding matches dropdown */
    font-size: 12px;           /* Ensure font size matches dropdown */
    color: black;              /* Set text color */
    background-color: transparent; /* Make background transparent */
    border: none;              /* Remove border if needed */
}

.form-select {
    width: 80px;               /* Fixed width for dropdown */
    padding: 3px;              /* Ensure padding matches input */
    font-size: 12px;           /* Ensure font size matches input */
    color: black;              /* Set text color */
}
        </style>
    </head>
    <body>
        <div class="l">
    <div class="panel">
        <h2>Personal Information</h2>

        <div class="form-row">
            <div class="form-group">
                <label for="dob_day">Day</label>
                <select id="dob_day">
                    <option value="">Day</option>
                    <!-- Options for days will be populated dynamically -->
                </select>
            </div>
            <div class="form-group">
                <label for="dob_month">Month</label>
                <select id="dob_month">
                    <option value="">Month</option>
                    <!-- Options for months will be populated dynamically -->
                </select>
            </div>
            <div class="form-group">
                <label for="dob_year">Year</label>
                <select id="dob_year">
                    <option value="">Year</option>
                    <!-- Options for years will be populated dynamically -->
                </select>
            </div>
        </div>
        

        <div class="form-row">
            <div class="form-group">
                <label for="birth_time">Birth Time (IST)</label>
                <input type="time" id="birth_time" value="12:00">
                <small>Format: HH:MM (Indian Standard Time)</small>
            </div>
        </div>
    </div>
   

    

    <script>
        // Add any JavaScript functionality if needed
       // Populate days (1-31)
// Populate days (1-31)
const days = Array.from({ length: 31 }, (_, i) => `<option value="${i + 1}">${i + 1}</option>`);
document.getElementById('dob_day').innerHTML = `<option value="">Day</option>` + days.join('');

// Populate months (January - December)
const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
const monthOptions = months.map((month, index) => `<option value="${index + 1}">${month}</option>`);
document.getElementById('dob_month').innerHTML = `<option value="">Month</option>` + monthOptions.join('');

// Populate years (current year - 100 years back)
const currentYear = new Date().getFullYear();
const years = Array.from({ length: 100 }, (_, i) => `<option value="${currentYear - i}">${currentYear - i}</option>`);
document.getElementById('dob_year').innerHTML = `<option value="">Year</option>` + years.join('');

// Add event listener to validate age
document.getElementById('submit').addEventListener('click', function() {
    const day = parseInt(document.getElementById('dob_day').value);
    const month = parseInt(document.getElementById('dob_month').value);
    const year = parseInt(document.getElementById('dob_year').value);
    const errorElement = document.getElementById('error');
    
    // Reset the error message
    errorElement.textContent = '';

    if (!day || !month || !year) {
        errorElement.textContent = 'Please select a valid date of birth.';
        return;
    }

    const birthDate = new Date(year, month - 1, day);
    const today = new Date();
    
    // Calculate the cutoff date: today's date minus 18 years
    const cutoffDate = new Date(today.getFullYear() - 18, today.getMonth(), today.getDate());

    if (birthDate > cutoffDate) {
        errorElement.textContent = 'You must be at least 18 years old.';
    } else {
        errorElement.textContent = '';
        // Proceed with form submission or further processing
        alert('Birth date is valid!');
    }
});



    </script>

<div class="panel">
    <h2>Astronomy Information</h2>
    
    <div>
        <input type="checkbox" id="toggleDropdowns" />
        <label class="text-black" for="toggleDropdowns" style="color: black;">Will show when we meet</label>
    </div>
    
    

    <div class="container" id="dropdowns">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="dropdown1" class="form-label">Raashee</label>
                    <select id="dropdown1" class="form-select">
                        <option value="">Select an option</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="dropdown2" class="form-label">Nakshatra</label>
                    <select id="dropdown2" class="form-select">
                        <option value="">Select an option</option>
                        <option value="A">Option A</option>
                        <option value="B">Option B</option>
                        <option value="C">Option C</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="dropdown3" class="form-label">Nakshatra</label>
                    <select id="dropdown3" class="form-select">
                        <option value="">Select an option</option>
                        <option value="A">Option A</option>
                        <option value="B">Option B</option>
                        <option value="C">Option C</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="container mt-4" id="dropdowns">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="dropdown1" class="form-label">Caraṇa</label>
                        <select id="dropdown1" class="form-select">
                            <option value="">Select an option</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="dropdown2" class="form-label">Gan</label>
                        <select id="dropdown2" class="form-select">
                            <option value="">Select an option</option>
                            <option value="A">Option A</option>
                            <option value="B">Option B</option>
                            <option value="C">Option C</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="dropdown3" class="form-label">Nadi</label>
                        <select id="dropdown3" class="form-select">
                            <option value="">Select an option</option>
                            <option value="A">Option A</option>
                            <option value="B">Option B</option>
                            <option value="C">Option C</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="image-container" style="position: relative; display: inline-block;">
        <img src="{{ asset('storage/images/patrika.png' . $user->img_1) }}" alt="Profile Image" class="profile-image" style="width: 100%;">
    
        <!-- Dropdown positioned over the image -->
        <div class="dropdown-container" style="position: absolute; top: 80px; left: 290px;">
            <select id="imageDropdown1" class="form-select" style="width: 80px; padding: 3px; font-size: 12px; color: black;">
                <option value="">Select 1</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
            </select>
        </div>
    </br>
        <div class="dropdown-container">
            <input id="imageDropdown2" class="transparent-input" style="" disabled placeholder="Select 2">
             <select class="form-input" name="celestial_bodies" id="celestial_bodies">
                <option value="" selected>Select an option</option>
                @foreach (config('data.celestial_bodies', []) as $value => $name)
                    <option value="{{ $value }}" {{ ($user->celestial_bodies === $value) ? 'selected' : '' }}>{{ $name }}</option>
                @endforeach
            </select>
            @if ($errors->has('celestial_bodies'))
                <span class="text-danger small">{{ $errors->first('celestial_bodies') }}</span>
            @endif  
        </div>
    </div>
    
    
    <div class="dropdown-container">
        <input id="imageDropdown3" class="transparent-input" disabled placeholder="Select 3">
        <select class="form-input" name="celestial_bodies" id="celestial_bodies">
            <option value="" selected>Select an option</option>
            @foreach (config('data.celestial_bodies', []) as $value => $name)
                <option value="{{ $value }}" {{ ($user->celestial_bodies === $value) ? 'selected' : '' }}>{{ $name }}</option>
            @endforeach
        </select>
        @if ($errors->has('celestial_bodies'))
            <span class="text-danger small">{{ $errors->first('celestial_bodies') }}</span>
        @endif  
    </div>
    <div class="dropdown-container">
        <input id="imageDropdown4" class="transparent-input" disabled placeholder="Select 4">
        <select class="form-input" name="celestial_bodies" id="celestial_bodies">
            <option value="" selected>Select an option</option>
            @foreach (config('data.celestial_bodies', []) as $value => $name)
                <option value="{{ $value }}" {{ ($user->celestial_bodies === $value) ? 'selected' : '' }}>{{ $name }}</option>
            @endforeach
        </select>
        @if ($errors->has('celestial_bodies'))
            <span class="text-danger small">{{ $errors->first('celestial_bodies') }}</span>
        @endif  
    </div>
    <div class="dropdown-container">
        <input id="imageDropdown5" class="transparent-input" disabled placeholder="Select 5">
        <select class="form-input" name="celestial_bodies" id="celestial_bodies">
            <option value="" selected>Select an option</option>
            @foreach (config('data.celestial_bodies', []) as $value => $name)
                <option value="{{ $value }}" {{ ($user->celestial_bodies === $value) ? 'selected' : '' }}>{{ $name }}</option>
            @endforeach
        </select>
        @if ($errors->has('celestial_bodies'))
            <span class="text-danger small">{{ $errors->first('celestial_bodies') }}</span>
        @endif  
    </div>
    <div class="dropdown-container">
        <input id="imageDropdown6" class="transparent-input" disabled placeholder="Select 6">
        <select class="form-input" name="celestial_bodies" id="celestial_bodies">
            <option value="" selected>Select an option</option>
            @foreach (config('data.celestial_bodies', []) as $value => $name)
                <option value="{{ $value }}" {{ ($user->celestial_bodies === $value) ? 'selected' : '' }}>{{ $name }}</option>
            @endforeach
        </select>
        @if ($errors->has('celestial_bodies'))
            <span class="text-danger small">{{ $errors->first('celestial_bodies') }}</span>
        @endif  
    </div>
    <div class="dropdown-container">
        <input id="imageDropdown7" class="transparent-input" disabled placeholder="Select 7">
        <select class="form-input" name="celestial_bodies" id="celestial_bodies">
            <option value="" selected>Select an option</option>
            @foreach (config('data.celestial_bodies', []) as $value => $name)
            
                <option value="{{ $value }}" {{ ($user->celestial_bodies === $value) ? 'selected' : '' }}>{{ $name }}</option>
            @endforeach
        </select>
        @if ($errors->has('celestial_bodies'))
            <span class="text-danger small">{{ $errors->first('celestial_bodies') }}</span>
        @endif  
    </div>
    <div class="dropdown-container">
        <input id="imageDropdown8" class="transparent-input" disabled placeholder="Select 8">
        <select class="form-input" name="celestial_bodies" id="celestial_bodies">
            <option value="" selected>Select an option</option>
            @foreach (config('data.celestial_bodies', []) as $value => $name)
                <option value="{{ $value }}" {{ ($user->celestial_bodies === $value) ? 'selected' : '' }}>{{ $name }}</option>
            @endforeach
        </select>
        @if ($errors->has('celestial_bodies'))
            <span class="text-danger small">{{ $errors->first('celestial_bodies') }}</span>
        @endif  
    </div>
    <div class="dropdown-container">
        <input id="imageDropdown9" class="transparent-input" disabled placeholder="Select 9">
        <select class="form-input" name="celestial_bodies" id="celestial_bodies">
            <option value="" selected>Select an option</option>
            @foreach (config('data.celestial_bodies', []) as $value => $name)
                <option value="{{ $value }}" {{ ($user->celestial_bodies === $value) ? 'selected' : '' }}>{{ $name }}</option>
            @endforeach
        </select>
        @if ($errors->has('celestial_bodies'))
            <span class="text-danger small">{{ $errors->first('celestial_bodies') }}</span>
        @endif  
    </div>
    <div class="dropdown-container">
        <input id="imageDropdown10" class="transparent-input" disabled placeholder="Select 10">
        <select class="form-input" name="celestial_bodies" id="celestial_bodies">
            <option value="" selected>Select an option</option>
            @foreach (config('data.celestial_bodies', []) as $value => $name)
                <option value="{{ $value }}" {{ ($user->celestial_bodies === $value) ? 'selected' : '' }}>{{ $name }}</option>
            @endforeach
        </select>
        @if ($errors->has('celestial_bodies'))
            <span class="text-danger small">{{ $errors->first('celestial_bodies') }}</span>
        @endif  
    </div>
    <div class="dropdown-container">
        <input id="imageDropdown11" class="transparent-input" disabled placeholder="Select 11">
        <select class="form-input" name="celestial_bodies" id="celestial_bodies">
            <option value="" selected>Select an option</option>
            @foreach (config('data.celestial_bodies', []) as $value => $name)
                <option value="{{ $value }}" {{ ($user->celestial_bodies === $value) ? 'selected' : '' }}>{{ $name }}</option>
            @endforeach
        </select>
        @if ($errors->has('celestial_bodies'))
            <span class="text-danger small">{{ $errors->first('celestial_bodies') }}</span>
        @endif  
    </div>
    <div class="dropdown-container">
        <input id="imageDropdown12" class="transparent-input" disabled placeholder="Select 12">
        <select class="form-input" name="celestial_bodies" id="celestial_bodies">
            <option value="" selected>Select an option</option>
            @foreach (config('data.celestial_bodies', []) as $value => $name)
                <option value="{{ $value }}" {{ ($user->celestial_bodies === $value) ? 'selected' : '' }}>{{ $name }}</option>
            @endforeach
        </select>
        @if ($errors->has('celestial_bodies'))
            <span class="text-danger small">{{ $errors->first('celestial_bodies') }}</span>
        @endif  
    </div>
</div>

<!-- JavaScript to handle dropdown value update -->
<script>
    document.getElementById('imageDropdown1').addEventListener('change', function() {
        const selectedValue = parseInt(this.value);
        
        // Reference to the inputs
        const inputs = [];
        for (let i = 2; i <= 12; i++) {
            inputs.push(document.getElementById(`imageDropdown${i}`));
        }

        if (!isNaN(selectedValue)) {
            inputs.forEach((input, index) => {
                // Calculate the anticlockwise countdown value
                let calculatedValue = selectedValue + index + 1; // Start counting from the selected value

                // Wrap values if they go above 12
                if (calculatedValue > 12) calculatedValue -= 12;

                // Update the values in the inputs
                input.value = calculatedValue;
            });
        } else {
            // Reset the inputs if no value is selected
            inputs.forEach(input => {
                input.value = '';
            });
        }
    });
</script>
        
    
    
{{-- doprdown end --}}

        
            
    </div>
    
    
    <div class="panel">
        <div class="form-group">
            <label for="patrika" class="form-label">More About Patrika</label>
            <textarea id="patrika" class="form-control" rows="4" placeholder="Enter more details..."></textarea>
        </div>
    </div>
</div>
 
<div class="sidebar">
    <x-common.usersidebar />
</div>
<script>
    document.getElementById('toggleDropdowns').addEventListener('change', function() {
    const dropdowns = document.getElementById('dropdowns');

    if (this.checked) {
        dropdowns.style.display = 'none'; // Hide dropdowns
    } else {
        dropdowns.style.display = 'block'; // Show dropdowns
    }
});

</script>
    
    </body>
    </html>

{{-- end --}}
</x-layout.user>
