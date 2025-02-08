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
            @if(session('error'))
            <div class="alert mt-2 alert-danger alert-dismissible fade show" role="alert">
                <strong>Error</strong> {{ session('error') }}
            </div>
            @endif
            <h2 class="text-center">Favorites</h2>

            <div class="panel">
                @foreach($users as $user)
                    <div class="col-md-4 mx-3">
                        <div class="card my-2" style="width: 18rem;">
                            @if ($user->img_1)
                            <div x-data="imageLoader()" x-init="fetchImage('{{ $user->img_1 }}')">
                                <template x-if="imageUrl">
                                    <!-- Wrap the image in an anchor tag to open it in a new tab -->
                                    <a :href="imageUrl" target="_blank">
                                        <img class="profile-image" style="max-width: 100px;" :src="imageUrl" alt="Uploaded Image" />
                                    </a>
                                </template>
                                <template x-if="!imageUrl">
                                    {{-- <p>Loading image...</p> --}}
                                    <div class="no-profile-photo">No Profile Photo Displayed</div>
                                </template>
                            </div>
                            @else
                            <div class="no-profile-photo">No Profile Photo Displayed</div>
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $user->first_name }} {{ $user->last_name }}</h5>
                                <p class="card-text">{{ \Carbon\Carbon::parse($user->date_of_birth)->age }} years</p>
                                {{-- <p class="card-text">{{ @$user->subCaste->name }}</p> --}}
                                <p class="card-text">{{ $user->bio }}</p>
                                <span class="view-profile" onclick="location.href='{{ route('user.show_profile', $user->id) }}'">View Profile</span>
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


    {{-- image display --}}
 <script>
    function imageLoader() {
        return {
            imageUrl: null,
    
            async fetchImage(filename) {
                try {
                    const response = await fetch(`/api/images/${filename}`);
                    if (!response.ok) throw new Error('Image not found');
                    
                    // Create a blob URL for the image
                    const blob = await response.blob();
                    this.imageUrl = URL.createObjectURL(blob);
                } catch (error) {
                    console.error('Error fetching image:', error);
                    this.imageUrl = null; // Handle error case
                }
            }
        };
    }
    </script>

{{-- end --}}
</x-layout.user_banner>
