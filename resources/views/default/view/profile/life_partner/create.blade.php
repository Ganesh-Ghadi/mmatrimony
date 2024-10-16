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
        </style>
    </head>
    <body>
        <div class="panel">
            <h2>Age / Height Information</h2>
            <div class="container mt-3" id="dropdowns">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="countryDropdown" class="form-label">Min Age</label>
                            <select id="countryDropdown" class="form-select">
                                <option value="">Select an option</option>
                                 <option value="option">Option</option>
                                <option value="option">Option</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="countryDropdown" class="form-label">Max Age</label>
                            <select id="countryDropdown" class="form-select">
                                <option value="">Select an option</option>
                                 <option value="option">Option</option>
                                <option value="option">Option</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="countryDropdown" class="form-label">Min Height</label>
                            <select id="countryDropdown" class="form-select">
                                <option value="">Select an option</option>
                                 <option value="option">Option</option>
                                <option value="option">Option</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="countryDropdown" class="form-label">Max Height</label>
                            <select id="countryDropdown" class="form-select">
                                <option value="">Select an option</option>
                                 <option value="option">Option</option>
                                <option value="option">Option</option>
                            </select>
                        </div>
                    </div>
                    <div class="col" id="stateContainer" style="display: none;">
                        <div class="form-group">
                            <label for="stateDropdown" class="form-label">State</label>
                            <select id="stateDropdown" class="form-select">
                                <option value="">Select an option</option>
                                 
                                
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    <div class="panel">
        <h2>Expected Information About Partenrs</h2>
        <div class="container mt-3" id="dropdowns">
            <div class="row mt-3">
                <div class="form-group">
                    <label for="dropdown2" class="form-label">Income</label>
                    <input type="text" id="dropdown2" class="form-control" placeholder="Enter Income">
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="countryDropdown" class="form-label">Currency</label>
                        <select id="countryDropdown" class="form-select">
                            <option value="">Select an option</option>
                             <option value="option">Option</option>
                            <option value="option">Option</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <div class="form-group">
                    <label for="countryDropdown" class="form-label">Want To See Patrika</label>
                    <select id="countryDropdown" class="form-select">
                        <option value="">Select an option</option>
                         <option value="yes">Yes</option>
                        <option value="no">No</option> 
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="countryDropdown" class="form-label">SubCast</label>
                    <select id="countryDropdown" class="form-select">
                        <option value="">Select an option</option>
                         <option value="yes">Yes</option>
                        <option value="no">No</option>  
                    </select>
                </div>
                </div> 
            <div class="row mt-3">
                <div class="col">
                    <div class="form-group">
                        <label for="countryDropdown" class="form-label">Eating Habbits</label>
                        <select id="countryDropdown" class="form-select">
                            <option value="">Select an option</option>
                             <option value="any">Anything will do</option>
                            <option value="eggetarian">Eggetarian</option>
                            <option value="non-veg">Non-Veg</option>
                            <option value="veg">Veg</option>
                            <option value="vegan">Vegan</option>
                            <option value="vegetarian">Vegetarian</option>
                        </select>
                    </div>
                    </div>
                <div class="col">
                    <div class="form-group">
                        <label for="dropdown2" class="form-label">City Preference</label>
                        <input type="text" id="dropdown2" class="form-control">
                    </div>
                </div>
            </div>  
            <div class="row mt-3">
                <div class="col">
                    <div class="form-group">
                        <label for="dropdown2" class="form-label">Education Specialisation</label>
                        <input type="text" id="dropdown2" class="form-control">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="countryDropdown" class="form-label">Job</label>
                        <select id="countryDropdown" class="form-select">
                            <option value="">Select an option</option>
                             <option value="yes">Yes</option>
                            <option value="no">No</option>  
                        </select>
                    </div>
                    </div>
                <div class="col">
                    <div class="form-group">
                        <label for="countryDropdown" class="form-label">Business</label>
                        <select id="countryDropdown" class="form-select">
                            <option value="">Select an option</option>
                             <option value="yes">Yes</option>
                            <option value="no">No</option>  
                        </select>
                    </div>
                    </div>
                <div class="col">
                    <div class="form-group">
                        <label for="countryDropdown" class="form-label">Foreign Residents</label>
                        <select id="countryDropdown" class="form-select">
                            <option value="">Select an option</option>
                             <option value="yes">Yes</option>
                            <option value="no">No</option>  
                        </select>
                    </div>
                    </div>
            </div>         
        </div>
    </div>  
    <div class="container text-end">
        <button type="button" class="btn btn-primary btn-sm p-2">Save</button>    
    </body>
    </html>
{{-- end --}}
</x-layout.user>
