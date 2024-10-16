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
        </style>
    </head>
    <body>

    <div class="panel">
        <h2>Father Details</h2>

        <div class="form-row">
            <div class="form-group">
                <label for="is_alive">Is Alive</label>
                <select id="is_alive">
                    <option value="">Select Is Alive</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>
        </div>

        <!-- Native Place and Gender fields, initially hidden -->
        <div class="form-row hidden" id="additionalInfo">
            <div class="form-group">
                <label for="fullName">Full Name</label>
                <input type="text" id="fullName" placeholder="Enter Full Name">
            </div>
            <div class="form-group">
                <label for="occupation">Occupation</label>
                <select id="occupation">
                    <option value="">Select Occupation</option>
                    <option value="retired">Retired</option>
                    <option value="inservice">In Service</option>
                    <option value="businesses">Businesses</option>
                </select>
            </div>
            <div class="form-group">
                <label for="jobType">Job Type</label>
                <select id="jobType">
                    <option value="">Select Job Type</option>
                    <option value="retired">Retired</option>
                    <option value="inservice">In Service</option>
                    <option value="businesses">Businesses</option>
                </select>
            </div>
            <div class="form-group">
                <label for="organisationName">Organisation Name</label>
                <input type="text" id="organisationName" placeholder="Enter Organisation Name">
            </div>
       
    </div>
    </div>
    <div class="panel">
        <h2>Mother Details</h2>
    
        <div class="form-row">
            <div class="form-group">
                <label for="mother_is_alive">Is Alive</label>
                <select id="mother_is_alive">
                    <option value="">Select Is Alive</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>
        </div>
    
        <!-- Additional fields, initially hidden -->
        <div class="form-row hidden" id="motherAdditionalInfo">
            <div class="form-group">
                <label for="fullName">Full Name</label>
                <input type="text" id="fullName" placeholder="Enter Full Name">
            </div>
            <div class="form-group">
                <label for="occupation">Occupation</label>
                <select id="occupation">
                    <option value="">Select Occupation</option>
                    <option value="retired">Retired</option>
                    <option value="inservice">In Service</option>
                    <option value="businesses">Businesses</option>
                </select>
            </div>
            <div class="form-group">
                <label for="jobType">Job Type</label>
                <select id="jobType">
                    <option value="">Select Job Type</option>
                    <option value="retired">Retired</option>
                    <option value="inservice">In Service</option>
                    <option value="businesses">Businesses</option>
                </select>
            </div>
            <div class="form-group">
                <label for="organisationName">Organisation Name</label>
                <input type="text" id="organisationName" placeholder="Enter Organisation Name">
            </div>
        </div>
    </div>
    <div class="panel">
        <h2>Brother Details</h2>
        <div class="form-row">
            <div class="form-group">
                <label for="residentPlace">Resident Place</label>
                <input type="text" id="residentPlace" placeholder="Enter Resident Place">
             </div>
            <div class="form-group">
                <label for="married">Married</label>
                <select id="married">
                    <option value="">Select Married</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </div>
            <div class="form-group">
                <label for="unmarried">Unmarried</label>
                <select id="unmarried">
                    <option value="">Select Unmarried</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </div>
        </div>
    </div>
    <div class="panel">
        <h2>Sister Details</h2>
        <div class="form-row">
            <div class="form-group">
                <label for="residentPlace">Resident Place</label>
                <input type="text" id="residentPlace" placeholder="Enter Resident Place">
             </div>
            <div class="form-group">
                <label for="married">Married</label>
                <select id="married">
                    <option value="">Select Married</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </div>
            <div class="form-group">
                <label for="unmarried">Unmarried</label>
                <select id="unmarried">
                    <option value="">Select Unmarried</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </div>
        </div>
    </div>

    <div class="panel">
        <h2>About Parents</h2>
        <div class="form-row">
            <div class="form-group">
                <label for="aboutParents">About Parents</label>
                <textarea id="aboutParents" rows="4" placeholder="Describe About Parents"></textarea>
            </div>
        </div>
    </div>

    


    <script>
        // Grab the 'Is Alive' dropdown and the additional info row
        const isAliveSelect = document.getElementById('is_alive');
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
