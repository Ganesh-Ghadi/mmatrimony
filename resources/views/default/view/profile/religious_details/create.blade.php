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
        <form action="{{ route('profiles.store') }}" method="POST">
            @csrf
        <div class="l">
    <div class="panel">
        <h2>Religious Details</h2>
        <div class="form-row">
            <div class="form-group">
                <label>Religion</label>
                <select class="form-input" name="religion"  id="religion">
                    <option value="" selected>select an option</option>
                    <option value="hindu" {{ ($user->religion === 'hindu') ? 'selected' : ''}} >Hindu</option>
                </select> 
                <x-input-error :messages="$errors->get('religion')" class="mt-2" /> 
                

            </div>
        </div>

        
        <div class="form-row hidden" id="habitsRow">
            <div class="form-group">
                <label>Castes</label>
                <select class="form-input" name="castes" id="castes">
                    <option value="" selected>select an option</option>
                    @foreach($castes as $caste)
                    <option value="{{$caste->id}}" {{ ($user->caste === $caste->id ) ? 'selected' : ''}}>{{$caste->name}}</option>
                    @endforeach
                </select> 
                <x-input-error :messages="$errors->get('castes')" class="mt-2" /> 
            </div>   

            <div class="form-group">
                <label>Subcastes</label>
                <select class="form-input" name="sub_caste" id="sub_caste">
                    <option value="" selected>select an option</option>
                    @foreach($subCastes as $subCaste)
                    <option value="{{$subCaste->id}}" {{ ($user->sub_caste === $subCaste->id ) ? 'selected' : ''}}>{{$subCaste->name}}</option>
                    @endforeach
                </select> 
                <x-input-error :messages="$errors->get('sub_caste')" class="mt-2" /> 
            </div>
            <div class="form-group">
                <label for="gotra">Gotra</label>
                <input type="text" name="gotra"  value="{{ $user->gotra }}" id="gotra" placeholder="Enter first name" required>
                <x-input-error :messages="$errors->get('gotra')" class="mt-2" />
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
