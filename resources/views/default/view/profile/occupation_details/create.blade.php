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
        <h2>Organisation Information</h2>
        <div class="container mt-3" id="dropdowns">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="dropdown1" class="form-label">Occupation</label>
                        <select id="dropdown1" class="form-select">
                            <option value="">Select an option</option>
                            <option value="government">Government</option>
                            <option value="semiGovernment">Semi Government</option>
                            <option value="private">Private</option>
                            <option value="inSearch">In Search</option>
                            <option value="business">Business</option>
                            <option value="businessAndServices">Business and Services</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="dropdown2" class="form-label">Organisation</label>
                        <input type="text" id="dropdown2" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="dropdown2" class="form-label">Designation</label>
                        <input type="text" id="dropdown2" class="form-control">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="dropdown2" class="form-label">Job Location</label>
                        <input type="text" id="dropdown2" class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </div>  

    <div class="panel">
        <h2>Experience / Income Information</h2>
        <div class="container mt-3" id="dropdowns">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="dropdown2" class="form-label">Income</label>
                        <input type="text" id="dropdown2" class="form-control">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="dropdown2" class="form-label">Job Experience</label>
                        <input type="text" id="dropdown2" class="form-control">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="dropdown1" class="form-label">Currency</label>
                        <select id="dropdown1" class="form-select">
                            <option value="">Select an option</option>
                            <option value="inr">INR</option>
                            <option value="usd">USD</option>
                            <option value="aed">AED</option>    
                        </select>
                    </div>
                </div>
            </div>  
        </div>
       
    </div>  
</div>
  
 
<div class="sidebar">
    <x-common.usersidebar />
</div>

    
   
    
    
    </body>
    </html>

{{-- end --}}
</x-layout.user>
