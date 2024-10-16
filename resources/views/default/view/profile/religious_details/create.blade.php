<x-layout.user>

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
        </style>
    </head>
    <body>
    <div class="panel">
        <h2>Religious Details</h2>
        <div class="form-row">
            <div class="form-group">
                <label for="religion">Religion</label>
                <select id="religion">
                    <option value="">Select Religion</option>
                    <option value="hindu">Hindu</option>
                    <option value="muslim">Muslim</option>
                    <option value="christian">Christian</option>
                </select>
            </div>
        </div>

        
        <div class="form-row hidden" id="habitsRow">
            <div class="form-group">
                <label for="cast">Cast</label>
                <select id="cast">
                    <option value="">Select Cast from config</option>
                </select>
            </div>

            <div class="form-group">
                <label for="subCast">SubCast</label>
                <select id="subCast">
                    <option value="">Select SubCast from config</option>
                </select>
            </div>
            <div class="form-group">
                <label for="gotra">Gotra</label>
                <input type="text" id="gotra" placeholder="Enter Gotra">
            </div>
        </div>
    </div>

    <script>
        // Grab the dropdowns
        const religionSelect = document.getElementById('religion');
        const habitsRow = document.getElementById('habitsRow');

        // Listen for changes in the Religion dropdown
        religionSelect.addEventListener('change', function() {
            if (religionSelect.value === 'hindu') {
                // Show the habits dropdowns if 'Hindu' is selected
                habitsRow.classList.remove('hidden');
            } else {
                // Hide the habits dropdowns if any other religion is selected
                habitsRow.classList.add('hidden');
            }
        });
    </script>

    </body>
    </html>

{{-- end --}}
</x-layout.user>
