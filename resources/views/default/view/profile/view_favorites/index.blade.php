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

.view-profile {
            color: #007bff; /* Bootstrap primary color */
            text-decoration: underline; /* Underline the text */
            cursor: pointer; /* Change cursor to pointer */
        }
        </style>
    </head>
    <body>
      <div class="container-fluid">
    <div class="panel">
        @foreach($users as $user)
            <div class="col-md-4 mx-3 "> <!-- This will make 3 cards per row on medium and larger screens -->
                <div class="card">
                    @if ($user->img_1)
                        <img src="{{ asset('storage/images/' . $user->img_1) }}" alt="Uploaded Image" class="profile-image">
                    @else
                        <div class="no-profile-photo">No Profile Photo Displayed</div>
                    @endif
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $user->first_name }} {{ $user->last_name }}</h5>
                        <p class="card-text">{{ \Carbon\Carbon::parse($user->date_of_birth)->age }} years</p> <!-- Display age -->
                        <p class="card-text">{{ @$user->subCaste->name }}</p> <!-- Display sub_caste -->
                        <p class="card-text">{{ $user->bio }}</p>
                        <span class="view-profile" onclick="location.href='{{ route('user.profile', $user->id) }}'">View Profile</span>
                    </div>
                </div>
=            </div>
        @endforeach
    </div>
</div>

    <div class="sidebar">
        <x-common.usersidebar />
    </div>

    

    </body>
    </html>

   
{{-- end --}}
</x-layout.user>
