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
    
        <!-- Dropdown over the image -->
        <div class="dropdown-container" style="position: absolute; top: 10px; left: 120px;">
            <select id="imageDropdown" class="form-select" style="width: 80px; padding: 3px; font-size: 12px; color: black;">
                <option value="">Select</option>
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
                <option value="3">Option 3</option>
            </select>
        </div>
        <div class="dropdown-container" style="position: absolute; top: 60px; left: 20px;">
            <select id="imageDropdown" class="form-select" style="width: 80px; padding: 3px; font-size: 12px; color: black;">
                <option value="">Select</option>
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
                <option value="3">Option 3</option>
            </select>
        </div>
        <div class="dropdown-container" style="position: absolute; top: 60px; left: 20px;">
            <select id="imageDropdown" class="form-select" style="width: 80px; padding: 3px; font-size: 12px; color: black;">
                <option value="">Select</option>
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
                <option value="3">Option 3</option>
            </select>
        </div>
        
        
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
