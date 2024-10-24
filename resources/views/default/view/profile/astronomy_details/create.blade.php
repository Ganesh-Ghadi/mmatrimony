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
/* //new */
.dropdown-container {
    position: relative;
    display: inline-block;
}

.dropdown-button {
    cursor: pointer;
    width: 50px; /* Adjust the width */
    height: 20px; /* Adjust the height */
    font-size: 12px; /* Smaller font size */
    text-align: center; /* Center the text horizontally */
    color: black; /* Set text color to black */
    background-color: transparent; /* Make the background transparent */
    border: 1px solid #ccc; /* Add a border */
    padding: 0; /* Remove default padding */
    line-height: 2px; /* Center text vertically within the button */
}
 .dropdown-menu {
    display: none; /* Initially hidden */
    position: absolute;
    background-color: white;
    border: 1px solid #ccc;
    z-index: 100;
    max-height: 200px; /* Limit height */
    overflow-y: auto; /* Scroll if too many items */
    width: 50px;
 }
.dropdown-menu label {
    color: black; /* Set text color to black */
    font-size: 14px; /* Smaller font size for dropdown items */
    padding: 4px; /* Reduced padding */
}
.checkbox-option {
    margin-right: 5px; /* Space between checkbox and label */
    transform: scale(1.2); /* Make checkboxes smaller */
}
        </style>
    </head>
    <body>
        <form action="{{ route('profiles.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
                     <div class="l">
    <div class="panel">
        <h2>Personal Information</h2>
        <div class="mb-2">
            <label for="date_of_birth" class="form-label" style="color: black; margin: 10px 0;">Date of Birth</label>
            <input id="date_of_birth" name="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror"
                   value="{{ $user->date_of_birth }}" placeholder="Enter Date of Birth" required
                   max="{{ now()->subYears(18)->format('Y-m-d') }}" title="You must be at least 18 years old" />
            <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2 text-danger small" />
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="birth_time">Birth Time (IST)</label>
                <input type="time" id="birth_time" value="12:00">
                <small>Format: HH:MM (Indian Standard Time)</small>
            </div>
        </div>
    </div>
<div class="panel">
    <h2>Astronomy Information</h2>
    <div>
        <input type="checkbox" id="toggleDropdowns" />
        <label class="text-black" for="toggleDropdowns" style="color: black;">भेटल्यावर बोलूया</label>
    </div>
    <div class="container" id="dropdowns">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="rashee">राशी</label>
                    <select class="form-input" name="rashee" id="rashee">
                        <option value="" selected>Select an option</option>
                        @foreach (config('data.rashee', []) as $value => $name)
                            <option value="{{ $value }}" {{ ($user->rashee === $value) ? 'selected' : '' }}>{{ $name }}</option>
                        @endforeach
                        
                    </select>
                    @if ($errors->has('rashee'))
                    <span class="text-danger small">{{ $errors->first('rashee') }}</span>
                    @endif     
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="nakshatra">नक्षत्र</label>
                    <select class="form-input" name="nakshatra" id="nakshatra">
                        <option value="" selected>Select an option</option>
                        @foreach (config('data.nakshatra', []) as $value => $name)
                            <option value="{{ $value }}" {{ ($user->nakshatra === $value) ? 'selected' : '' }}>{{ $name }}</option>
                        @endforeach
                        
                    </select>
                    @if ($errors->has('nakshatra'))
                    <span class="text-danger small">{{ $errors->first('nakshatra') }}</span>
                    @endif     
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="mangal">मंगळ</label>
                    <select class="form-input" name="mangal" id="mangal">
                        <option value="" selected>Select an option</option>
                        @foreach (config('data.mangal', []) as $value => $name)
                            <option value="{{ $value }}" {{ ($user->mangal === $value) ? 'selected' : '' }}>{{ $name }}</option>
                        @endforeach
                        
                    </select>
                    @if ($errors->has('mangal'))
                    <span class="text-danger small">{{ $errors->first('mangal') }}</span>
                    @endif     
                </div>
            </div>
        </div>
        <div class="container mt-4" id="dropdowns">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="charan">चरण</label>
                        <select class="form-input" name="charan" id="charan">
                            <option value="" selected>Select an option</option>
                            @foreach (config('data.charan', []) as $value => $name)
                                <option value="{{ $value }}" {{ ($user->charan === $value) ? 'selected' : '' }}>{{ $name }}</option>
                            @endforeach
                            
                        </select>
                        @if ($errors->has('charan'))
                        <span class="text-danger small">{{ $errors->first('charan') }}</span>
                        @endif     
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="gana">गण</label>
                        <select class="form-input" name="gana" id="gana">
                            <option value="" selected>Select an option</option>
                            @foreach (config('data.gana', []) as $value => $name)
                                <option value="{{ $value }}" {{ ($user->gana === $value) ? 'selected' : '' }}>{{ $name }}</option>
                            @endforeach
                            
                        </select>
                        @if ($errors->has('gana'))
                        <span class="text-danger small">{{ $errors->first('gana') }}</span>
                        @endif     
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="nadi">गण</label>
                        <select class="form-input" name="nadi" id="nadi">
                            <option value="" selected>Select an option</option>
                            @foreach (config('data.nadi', []) as $value => $name)
                                <option value="{{ $value }}" {{ ($user->nadi === $value) ? 'selected' : '' }}>{{ $name }}</option>
                            @endforeach
                            
                        </select>
                        @if ($errors->has('nadi'))
                        <span class="text-danger small">{{ $errors->first('nadi') }}</span>
                        @endif     
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="image-container" style="position: relative; display: inline-block;">
         <img src="{{ asset('storage/images/patrika.png') }}" alt="Profile Image" class="profile-image" style="width: 100%;">
        
         <!-- Dropdown positioned over the image -->
         <div class="dropdown-container" style="position: absolute; top: 80px; left: 290px;">
         <!-- Number Dropdown -->
         <select id="imageDropdown1" class="form-select" style="width: 80px; padding: 3px; font-size: 12px; color: black;">
         <option value="">numbers</option>
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
         {{-- dropdown 1 --}}
        <div class="dropdown-container" style="position: relative;">
            <button id="dropdownButton2" class="dropdown-button" style="width: 50px; padding: 5px; font-size: 12px; color: black; position: absolute; top: -67px; left: 13px;">Select</button>
            <div id="dropdownMenu2" class="dropdown-menu" style="display: none; position: absolute; background-color: white; border: 1px solid #ccc; z-index: 100; top: -48px; left: 13px;">
                @foreach (config('data.celestial_bodies', []) as $value => $name)
                    <label style="display: block;">
                        <input type="checkbox" value="{{ $value }}" class="checkbox-option"> {{ $name }}
                    </label>
                @endforeach
            </div>
        </div>
         <!-- Celestial Bodies Dropdowns -->
         {{-- dropdown 2 --}}
         <div class="dropdown-container" style="position: relative;">
            <input id="imageDropdown2" class="transparent-input" style="position: absolute; top: -104px; left: -168px;" disabled placeholder="Select 2">
            <button id="dropdownButton1" class="dropdown-button" style="width: 50px; padding: 5px; font-size: 12px; color: black; position: absolute; top: -103px; left: -148px;">Select</button>
            <div id="dropdownMenu1" class="dropdown-menu" style="display: none; position: absolute; background-color: white; border: 1px solid #ccc; z-index: 100; top: -83px; left: -148px;">
                @foreach (config('data.celestial_bodies', []) as $value => $name)
                    <label style="display: block;">
                        <input type="checkbox" value="{{ $value }}" class="checkbox-option"> {{ $name }}
                    </label>
                @endforeach
            </div>
        </div>
         {{--  dropdown 3 --}}
         <div class="dropdown-container" style="position: relative;">
            <input id="imageDropdown3" class="transparent-input" style="position: absolute; top: -59px; left: -268px;" disabled placeholder="Select 3">
            <button id="dropdownButton1" class="dropdown-button" style="width: 50px; padding: 5px; font-size: 12px; color: black; position: absolute; top: -56px; left: -248px;">Select</button>
            <div id="dropdownMenu1" class="dropdown-menu" style="display: none; position: absolute; background-color: white; border: 1px solid #ccc; z-index: 100; top: -37px; left: -248px;">
                @foreach (config('data.celestial_bodies', []) as $value => $name)
                    <label style="display: block;">
                        <input type="checkbox" value="{{ $value }}" class="checkbox-option"> {{ $name }}
                    </label>
                @endforeach
            </div>
        </div>
         {{-- dropdown 4 --}}
         <div class="dropdown-container" style="position: relative;">
            <input id="imageDropdown4" class="transparent-input" style="position: absolute; top: 24px; left: -175px;" disabled placeholder="Select 4">
            <button id="dropdownButton1" class="dropdown-button" style="width: 50px; padding: 5px; font-size: 12px; color: black; position: absolute; top: 26px; left: -160px;">Select</button>
            <div id="dropdownMenu1" class="dropdown-menu" style="display: none; position: absolute; background-color: white; border: 1px solid #ccc; z-index: 100; top: 46px; left: -160px;">
                @foreach (config('data.celestial_bodies', []) as $value => $name)
                    <label style="display: block;">
                        <input type="checkbox" value="{{ $value }}" class="checkbox-option"> {{ $name }}
                    </label>
                @endforeach
            </div>
        </div>
         {{-- dropdown 5 --}}
         <div class="dropdown-container" style="position: relative;">
            <input id="imageDropdown5" class="transparent-input" style="position: absolute; top: 110px; left: -272px;" disabled placeholder="Select 5">
            <button id="dropdownButton1" class="dropdown-button" style="width: 50px; padding: 5px; font-size: 12px; color: black; position: absolute; top: 112px; left: -256px;">Select</button>
            <div id="dropdownMenu1" class="dropdown-menu" style="display: none; position: absolute; background-color: white; border: 1px solid #ccc; z-index: 100; top: 131px; left: -256px;">
                @foreach (config('data.celestial_bodies', []) as $value => $name)
                    <label style="display: block;">
                        <input type="checkbox" value="{{ $value }}" class="checkbox-option"> {{ $name }}
                    </label>
                @endforeach
            </div>
        </div>
            {{-- dropdown 6 --}}
            <div class="dropdown-container" style="position: relative;">
                <input id="imageDropdown6" class="transparent-input" style="position: absolute; top: 156px; left: -185px;" disabled placeholder="Select 6">
                <button id="dropdownButton1" class="dropdown-button" style="width: 50px; padding: 5px; font-size: 12px; color: black; position: absolute; top: 158px; left: -168px;">Select</button>
                <div id="dropdownMenu1" class="dropdown-menu" style="display: none; position: absolute; background-color: white; border: 1px solid #ccc; z-index: 100; top: 158px; left: -256px;">
                    @foreach (config('data.celestial_bodies', []) as $value => $name)
                        <label style="display: block;">
                            <input type="checkbox" value="{{ $value }}" class="checkbox-option"> {{ $name }}
                        </label>
                    @endforeach
                </div>
            </div>
                {{-- dropdown 7 --}}
                <div class="dropdown-container" style="position: relative;">
                    <input id="imageDropdown7" class="transparent-input" style="position: absolute; top: 109px; left: -31px;" disabled placeholder="Select 7">
                    <button id="dropdownButton1" class="dropdown-button" style="width: 50px; padding: 5px; font-size: 12px; color: black; position: absolute; top: 111px; left: -13px;">Select</button>
                    <div id="dropdownMenu1" class="dropdown-menu" style="display: none; position: absolute; background-color: white; border: 1px solid #ccc; z-index: 100; top: 130px; left: -13px;">
                        @foreach (config('data.celestial_bodies', []) as $value => $name)
                            <label style="display: block;">
                                <input type="checkbox" value="{{ $value }}" class="checkbox-option"> {{ $name }}
                            </label>
                        @endforeach
                    </div>
                </div>
                    {{-- dropdown 8 --}}
                    <div class="dropdown-container" style="position: relative;">
                        <input id="imageDropdown8" class="transparent-input" style="position: absolute; top: 157px; left: 131px;" disabled placeholder="Select 8">
                        <button id="dropdownButton1" class="dropdown-button" style="width: 50px; padding: 5px; font-size: 12px; color: black; position: absolute; top: 158px; left: 147px;">Select</button>
                        <div id="dropdownMenu1" class="dropdown-menu" style="display: none; position: absolute; background-color: white; border: 1px solid #ccc; z-index: 100; top: 177px; left: 147px;">
                            @foreach (config('data.celestial_bodies', []) as $value => $name)
                                <label style="display: block;">
                                    <input type="checkbox" value="{{ $value }}" class="checkbox-option"> {{ $name }}
                                </label>
                            @endforeach
                        </div>
                    </div>
                        {{-- dropdown 9 --}}
                        <div class="dropdown-container" style="position: relative;">
                            <input id="imageDropdown9" class="transparent-input" style="position: absolute;  top: 108px; left: 215px; " disabled placeholder="Select 9">
                            <button id="dropdownButton1" class="dropdown-button" style="width: 50px; padding: 5px; font-size: 12px; color: black; position: absolute; top: 109px; left: 233px;">Select</button>
                            <div id="dropdownMenu1" class="dropdown-menu" style="display: none; position: absolute; background-color: white; border: 1px solid #ccc; z-index: 100; top: 129px; left: 123px;">
                                @foreach (config('data.celestial_bodies', []) as $value => $name)
                                    <label style="display: block;">
                                        <input type="checkbox" value="{{ $value }}" class="checkbox-option"> {{ $name }}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                            {{-- dropdown 10 --}}
                            <div class="dropdown-container" style="position: relative;">
                                <input id="imageDropdown10" class="transparent-input" style="position: absolute;top: 24px; left: 121px;" disabled placeholder="Select 10">
                                <button id="dropdownButton1" class="dropdown-button" style="width: 50px; padding: 5px; font-size: 12px; color: black; position: absolute; top: 25px; left: 140px; ">Select</button>
                                <div id="dropdownMenu1" class="dropdown-menu" style="display: none; position: absolute; background-color: white; border: 1px solid #ccc; z-index: 100; top: 44px; left: 153px;">
                                    @foreach (config('data.celestial_bodies', []) as $value => $name)
                                        <label style="display: block;">
                                            <input type="checkbox" value="{{ $value }}" class="checkbox-option"> {{ $name }}
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                                {{-- dropdown 11 --}}
                                <div class="dropdown-container" style="position: relative;">
                                    <input id="imageDropdown11" class="transparent-input" style="position: absolute;top: -56px; left: 221px;" disabled placeholder="Select 11">
                                    <button id="dropdownButton1" class="dropdown-button" style="width: 50px; padding: 5px; font-size: 12px; color: black; position: absolute; top: -55px; left: 240px; ">Select</button>
                                    <div id="dropdownMenu1" class="dropdown-menu" style="display: none; position: absolute; background-color: white; border: 1px solid #ccc; z-index: 100; top: -36px; left: 130px;">
                                        @foreach (config('data.celestial_bodies', []) as $value => $name)
                                            <label style="display: block;">
                                                <input type="checkbox" value="{{ $value }}" class="checkbox-option"> {{ $name }}
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                                    {{-- dropdown 12 --}}
                                    <div class="dropdown-container" style="position: relative;">
                                        <input id="imageDropdown12" class="transparent-input" style="position: absolute;top: -106px; left: 121px;" disabled placeholder="Select 12">
                                        <button id="dropdownButton1" class="dropdown-button" style="width: 50px; padding: 5px; font-size: 12px; color: black; position: absolute; top: -105px; left: 140px; ">Select</button>
                                        <div id="dropdownMenu1" class="dropdown-menu" style="display: none; position: absolute; background-color: white; border: 1px solid #ccc; z-index: 100; top: -85px; left: 140px;">
                                            @foreach (config('data.celestial_bodies', []) as $value => $name)
                                                <label style="display: block;">
                                                    <input type="checkbox" value="{{ $value }}" class="checkbox-option"> {{ $name }}
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
        <script>
            //numbers
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
    //dropdown
    document.addEventListener('DOMContentLoaded', function () {
    const dropdownButtons = document.querySelectorAll('.dropdown-button');
    const dropdownMenus = document.querySelectorAll('.dropdown-menu');

    dropdownButtons.forEach((button, index) => {
        const menu = dropdownMenus[index];
        const checkboxes = menu.querySelectorAll('.checkbox-option');

        button.addEventListener('click', function (event) {
            event.preventDefault(); // Prevent default action (e.g., form submission)
            menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
        });

        // Close dropdown if clicked outside
        document.addEventListener('click', function (event) {
            if (!button.contains(event.target) && !menu.contains(event.target)) {
                menu.style.display = 'none';
            }
        });

        // Handle checkbox changes
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                updateSelectedValues();
            });
        });

        function updateSelectedValues() {
            // Get all selected values across all dropdowns
            const selectedValues = Array.from(document.querySelectorAll('.checkbox-option:checked')).map(checkbox => checkbox.value);

            // Update each dropdown based on selected values
            dropdownMenus.forEach((otherMenu, otherIndex) => {
                const otherCheckboxes = otherMenu.querySelectorAll('.checkbox-option');

                otherCheckboxes.forEach(option => {
                    if (selectedValues.includes(option.value) && !option.checked) {
                        option.parentElement.style.display = 'none'; // Hide option if selected in another dropdown
                    } else {
                        option.parentElement.style.display = 'block'; // Show option if not selected
                    }
                });
            });
        }
    });
});

        </script>
         <div class="panel">
            <div class="form-group">
                <label for="patrika" class="form-label">More About Patrika</label>
                <textarea id="patrika" class="form-control" rows="4" placeholder="Enter more details..."></textarea>
            </div>
        </div>
        </div>
        <div class="text-end">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
        
        
          </form>
{{-- dropdown end --}}  
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
</x-layout.user>


