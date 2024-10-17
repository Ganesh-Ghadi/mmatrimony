<x-layout.user>
   
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Personal Information Panel</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
        </style>
    </head>
    <body>
    <div>
        <div class="panel">
            <h2>Location Information</h2>
            <div class="container mt-3" id="dropdowns">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="countryDropdown" class="form-label">Country</label>
                            <select id="countryDropdown" class="form-select">
                                <option value="">Select an option</option>
                                <option value="india">India</option>
                                <option value="option">Option</option>
                            </select>
                        </div>
                    </div>
                    <div class="col" id="stateContainer" style="display: none;">
                        <div class="form-group">
                            <label for="stateDropdown" class="form-label">State</label>
                            <select id="stateDropdown" class="form-select">
                                <option value="">Select an option</option>
                                <option value="andaman_nicobar">Andaman and Nicobar Islands</option>
                                <option value="andhra_pradesh">Andhra Pradesh</option>
                                <option value="arunachal_pradesh">Arunachal Pradesh</option>
                                <option value="assam">Assam</option>
                                <option value="bihar">Bihar</option>
                                <option value="chandigarh">Chandigarh</option>
                                <option value="chhattisgarh">Chhattisgarh</option>
                                <option value="dadra_nagar_haveli">Dadra and Nagar Haveli and Daman and Diu</option>
                                <option value="daman_and_diu">Daman and Diu</option>
                                <option value="delhi">Delhi</option>
                                <option value="goa">Goa</option>
                                <option value="gujarat">Gujarat</option>
                                <option value="haryana">Haryana</option>
                                <option value="himachal_pradesh">Himachal Pradesh</option>
                                <option value="jammu_and_kashmir">Jammu and Kashmir</option>
                                <option value="jharkhand">Jharkhand</option>
                                <option value="karnataka">Karnataka</option>
                                <option value="kerala">Kerala</option>
                                <option value="lakshadweep">Lakshadweep</option>
                                <option value="madhya_pradesh">Madhya Pradesh</option>
                                <option value="maharashtra">Maharashtra</option>
                                <option value="manipur">Manipur</option>
                                <option value="meghalaya">Meghalaya</option>
                                <option value="mizoram">Mizoram</option>
                                <option value="nagaland">Nagaland</option>
                                <option value="odisha">Odisha</option>
                                <option value="punjab">Punjab</option>
                                <option value="rajasthan">Rajasthan</option>
                                <option value="sikkim">Sikkim</option>
                                <option value="tamil_nadu">Tamil Nadu</option>
                                <option value="telangana">Telangana</option>
                                <option value="tripura">Tripura</option>
                                <option value="uttar_pradesh">Uttar Pradesh</option>
                                <option value="uttarakhand">Uttarakhand</option>
                                <option value="west_bengal">West Bengal</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col" id="cityContainer" style="display: none;">
                        <div class="form-group">
                            <label for="cityDropdown" class="form-label">City</label>
                            <select id="cityDropdown" class="form-select">
                                <option value="">Select an option</option>
                                 
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
        
        <script>
            // Get the country dropdown and state/city containers
            const countryDropdown = document.getElementById('countryDropdown');
            const stateContainer = document.getElementById('stateContainer');
            const cityContainer = document.getElementById('cityContainer');
        
            // Add event listener to the country dropdown
            countryDropdown.addEventListener('change', function() {
                if (this.value === 'india') {
                    stateContainer.style.display = 'block'; // Show state dropdown
                    cityContainer.style.display = 'block'; // Show city dropdown
                } else {
                    stateContainer.style.display = 'none'; // Hide state dropdown
                    cityContainer.style.display = 'none'; // Hide city dropdown
                }
            });
            
        </script>
        

    <div class="panel">
        <h2>Address / Contact Information</h2>
        <div class="container mt-3" id="dropdowns">
            <div class="col mt-3">
                <div class="form-group">
                    <label for="dropdown2" class="form-label">Address Line 1</label>
                    <input type="text" id="dropdown2" class="form-control">
                </div>
            </div>
            <div class="col mt-3">
                <div class="form-group">
                    <label for="dropdown2" class="form-label">Address Line 2
                    </label>
                    <input type="text" id="dropdown2" class="form-control">
                </div>
            </div>
            <div class="row mt-3">
               
                <div class="col">
                    <div class="form-group">
                        <label for="dropdown2" class="form-label">Landmark</label>
                        <input type="text" id="dropdown2" class="form-control">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="dropdown2" class="form-label">Pin Code</label>
                        <input type="text" id="dropdown2" class="form-control">
                    </div>
                </div>
                
            </div>  
            <div class="row mt-3">
               
                <div class="col">
                    <div class="form-group">
                        <label for="mobile" class="form-label">Mobile</label>
                        <input type="text" id="mobile" class="form-control" required
                               placeholder="1234567890"
                               pattern="^\d{10}$"
                               title="Please enter a valid 10-digit mobile number">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="landline" class="form-label">Landline</label>
                        <input type="text" id="landline" class="form-control" required
                               placeholder="012-3456789"
                               title="Please enter a valid landline number">
                        <div id="landlineError" class="text-danger" style="display:none;">Invalid landline format.</div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">  
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" class="form-control" required
                           placeholder="example@example.com"
                           pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                           title="Please enter a valid email address">
                </div>
            </div>
        </div>
    </div>  
    <div class="container text-end">
        <button type="button" class="btn btn-primary btn-sm p-2">Save</button>
    </div>
</div>
<div class="sidebar">
    <x-common.usersidebar />
</div>
    <script>
        const landlineInput = document.getElementById('landline');
        const landlineError = document.getElementById('landlineError');
    
        landlineInput.addEventListener('input', function() {
            const landlinePattern = /^(?:\d{3}-\d{7}|\d{7}|\d{10})$/;
            if (landlinePattern.test(landlineInput.value)) {
                landlineError.style.display = 'none';
            } else {
                landlineError.style.display = 'block';
            }
        });
    </script>

    
   
    
    
    </body>
    </html>

{{-- end --}}
</x-layout.user>
