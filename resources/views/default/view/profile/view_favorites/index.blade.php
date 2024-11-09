<x-layout.user_banner>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Personal Information Panel</title>
        <style>
            /* Existing styles */

            /* Card styling for 3D effect */
            .card {
                border: 1px solid #ddd;
                border-radius: 8px;
                transition: transform 0.2s, box-shadow 0.2s;
                box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            }

            .card:hover {
                transform: translateY(-10px);
                box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            }

            .card-body {
                text-align: center; /* Center align text inside the card */
            }

            .view-profile {
                color: blue;
                font-weight: bold;
                cursor: pointer;
                display: inline-block;
             }

            /* Additional styles */
            .sidebar {
                width: 300px;
                position: sticky;
                top: 0;
                height: 100vh;
                background-color: #f5f5f5;
                padding: 15px;
                border-left: 1px solid #ddd;
            }

            /* Image styles */
            .profile-image {
                width: 80%;
                height: auto;
                margin: 10px auto;
                display: block;
                border-radius: 8px;
            }

            .no-profile-photo {
                width: 80%;
                height: 150px;
                background-color: #f0f0f0;
                display: flex;
                align-items: center;
                justify-content: center;
                color: #888;
                font-weight: bold;
                margin: 10px auto;
                border-radius: 8px;
            }
            button.btn {
    background-color: #ff0000; /* Rose Red color */
    color: white !important; /* Ensure text color is white */
    border: none; /* Optional: remove border */
}
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <h2 class="text-center">Favorites</h2>

            <div class="panel">
                @foreach($users as $user)
                    <div class="col-md-4 mx-3">
                        <div class="card my-2" style="width: 18rem;">
                            @if ($user->img_1)
                                <img src="{{ asset('storage/images/' . $user->img_1) }}" alt="Uploaded Image" class="profile-image">
                            @else
                                <div class="no-profile-photo">No Profile Photo Displayed</div>
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $user->first_name }} {{ $user->last_name }}</h5>
                                <p class="card-text">{{ \Carbon\Carbon::parse($user->date_of_birth)->age }} years</p>
                                <p class="card-text">{{ @$user->subCaste->name }}</p>
                                <p class="card-text">{{ $user->bio }}</p>
                                <span class="view-profile" onclick="location.href='{{ route('user.profile', $user->id) }}'">View Profile</span>
                                <form action="{{ route('profiles.remove_favorite') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="favorite_id" value="{{ $user->id }}">
                                    <input type="hidden" name="fav_page" value="fav_page">
                                    <button class="btn text-white btn-primary" type="submit">Remove from Favorites</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="sidebar">
            <x-common.usersidebar />
        </div>
    </body>
    </html>
</x-layout.user_banner>
