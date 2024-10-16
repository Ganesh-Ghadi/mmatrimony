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
            #sidebar {
    position: fixed; /* Fixes the sidebar in place */
    top: 0;
    left: 0;
    width: 250px; /* Set the desired width */
    height: 100vh; /* Full viewport height */
    overflow-y: auto; /* Allow scrolling inside the sidebar if content overflows */
    background-color: #f8f9fa; /* Adjust the background color */
    z-index: 1000; /* Ensure the sidebar is on top of other elements */
  }

  /* Add padding to the main content to avoid overlap with the fixed sidebar */
  .panel {
    margin-left: 250px; /* Same width as the sidebar */
    padding: 20px;
  }
            
        </style>
        <div class="l">
            <x-common.usersidebar />

        </div>
        <div class="l">

                  <div class="panel">
       
        <h2>Personal Information</h2>

        <!-- Row with First Name, Middle Name, and Last Name in one line -->    
        <div class="form-row">
            <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" id="firstName" placeholder="Enter first name">
            </div>
            <div class="form-group">
                <label for="middleName">Middle Name</label>
                <input type="text" id="middleName" placeholder="Enter middle name">
            </div>
            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" id="lastName" placeholder="Enter last name">
            </div>
        </div>

        <!-- Second row with Mother Tongue and Country -->
        <div class="form-row">
            <div class="form-group">
                <label for="mother_tongue">Mother Tongue</label>
                <select id="mother_tongue">
                    <option value="">Select Mother Tongue</option>
                    <option value="bengali">Bengali</option>
                    <option value="english">English</option>
                    <option value="hindi">Hindi</option>
                    <option value="kannada">Kannada</option>
                    <option value="marathi">Marathi</option>
                    <option value="nepali">Nepali</option>
                    <option value="punjabi">Punjabi</option>
                    <option value="tamil">Tamil</option>
                </select>
            </div>
            <div class="form-group">
                <label for="nativePlace">Native Place</label>
                <input type="text" id="nativePlace" placeholder="Enter Native Place">
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select id="gender">
                    <option value="">Select gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>

           
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="marital_status">Marital Status</label>
                <select id="marital_status">
                    <option value="">Select Marital Status</option>
                    <option value="neverMarried">Never Married</option>
                    <option value="married">Married</option>
                    <option value="widowed">Widowed</option>
                    <option value="divorced">Divorced</option>
                    <option value="separated">Separated</option>
                        
                </select>
            </div>
            <div class="form-group">
                <label for="living">Living With</label>
                <select id="living">
                    <option value="">Select Living With</option>
                    <option value="family">Family</option>
                    <option value="individual">Individual</option>
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
                <select id="blood_group">
                    <option value="">Select Blood Group</option>
                    <option value="a+">A+</option>
                    <option value="a-">A-</option>
                    <option value="b+">B+</option>
                    <option value="b-">B-</option>
                    <option value="o+">O+</option>
                    <option value="o-">O-</option>
                    <option value="ab+">AB+</option>
                    <option value="ab-">AB-</option>
                </select>
            </div>
            <div class="form-group">
                <label for="height">Height</label>
                <select id="height">
                    <option value="">Select Height from config</option>
                    
                </select>
            </div>
            <div class="form-group">
                <label for="weight">Weight</label>
                <input type="text" id="weight" placeholder="Enter Weight in Kgs">
            </div>
        </div>

        <!-- Second row with Mother Tongue and Country -->
        <div class="form-row">
            <div class="form-group">
                <label for="body_type">Body Type</label>
                <select id="body_type">
                    <option value="">Select Body Type</option>
                    <option value="athletic">Athletic</option>
                    <option value="average">Average</option>
                     <option value="slim">Slim</option>
                </select>
            </div>
           
            <div class="form-group">
                <label for="complexion">Complexion</label>
                <select id="complexion">
                    <option value="">Select Complexion</option>
                    <option value="wheatish">Wheatish</option>
                    <option value="brown">Brown</option>
                    <option value="dark">Dark</option>
                    <option value="fair">Fair</option>
                    <option value="veryFair">Very Fair</option>
                 </select>
            </div>

           
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="physical_abnormality">Physical Abnormality</label>
                <select id="physical_abnormality">
                    <option value="">Select Physical Abnormality</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>
            
            <div id="checkbox-container" class="form-row ">
            </div>
        </div>
    </div>
    <div class="panel">
        <h2>Food Habits</h2>
        <div class="form-row">
            <div class="form-group">
                <label for="eating_habbits">Eating Habbits</label>
                <select id="eating_habbits">
                    <option value="">Select Eating Habbits</option>
                    <option value="eggetarian">Eggetarian</option>
                    <option value="non-veg">Non-Veg</option>
                    <option value="veg">Veg</option>
                    <option value="vegan">Vegan</option>
                    <option value="vegetarian">Vegetarian</option>
                    
                </select>
            </div>
           
            <div class="form-group">
                <label for="drinking_habbits">Drinking Habbits</label>
                <select id="drinking_habbits">
                    <option value="">Select Drinking Habbits</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>
            <div class="form-group">
                <label for="smoking_habbits">Smoking Habbits</label>
                <select id="smoking_habbits">
                    <option value="">Select Smoking Habbits</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>   
                </select>
            </div>

           
        </div>
         
    </div>
    
   
    <div class="panel">
        <h2>About Self</h2>
        <!-- Container for dynamically added textarea -->
        <div class="form-row" id="textarea-container">
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
    </div>
</div>
    <script>
        // Create the checkboxes dynamically
        const checkboxContainer = document.getElementById('checkbox-container');

        // Spectacles checkbox
        const spectaclesDiv = document.createElement('div');
        spectaclesDiv.className = 'form-group';
        const spectaclesLabel = document.createElement('label');
        spectaclesLabel.innerHTML = '<input type="checkbox" id="spectacles" name="accessory"> Spectacles';
        spectaclesDiv.appendChild(spectaclesLabel);

        // Lens checkbox
        const lensDiv = document.createElement('div');
        lensDiv.className = 'form-group';
        const lensLabel = document.createElement('label');
        lensLabel.innerHTML = '<input type="checkbox" id="lens" name="accessory"> Lens';
        lensDiv.appendChild(lensLabel);

        // Append both checkboxes to the container
        checkboxContainer.appendChild(spectaclesDiv);
        checkboxContainer.appendChild(lensDiv);

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
