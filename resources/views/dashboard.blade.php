<x-layout.user_banner>
    {{-- <link href="{{ asset('assets/user/css/bootstrap.min.css') }}" rel="stylesheet"> --}}
    {{-- <link href="{{ asset('assets/user/css/styles.css') }}" rel="stylesheet"> <!-- Optional custom styles --> --}}

    <style>
        .card {
            transition: transform 0.2s, box-shadow 0.2s; /* Smooth transition */
        }

        .card:hover {
            transform: translateY(-5px); /* Lift effect */
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); /* Shadow effect */
        }

        .profile-image {
            width: 80%; /* Set a smaller width */
            height: auto; /* Maintain aspect ratio */
            margin: 10px auto; /* Center the image */
            display: block; /* Make it a block element for centering */
            border-radius: 8px; /* Optional: add rounded corners */
        }
        .no-profile-photo {
    width: 80%; /* Match the width of the profile image */
    height: 387px; /* Set a fixed height for the placeholder */
    background-color: #f0f0f0; /* Light gray background */
    display: flex;
    align-items: center; /* Vertically center the content */
    justify-content: center; /* Horizontally center the content */
    color: #888; /* Gray color for text */
    font-weight: bold;
    margin: 10px auto; /* Center the placeholder */
    border-radius: 8px; /* Optional: add rounded corners */
    text-align: center; /* Ensure text is centered inside the div */
    line-height: 1.5; /* Control the line height for better text visibility */
}





        .view-profile {
            color: #007bff; /* Bootstrap primary color */
            text-decoration: underline; /* Underline the text */
            cursor: pointer; /* Change cursor to pointer */
        }
    </style>

    <div class="container my-4">
        <h2 class="text-center">Bride Profiles</h2>
        <div class="row mb-4">
            @foreach($users as $user)
                @if ($user->role == 'bride')
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            @if ($user->img_1)
                            <div x-data="imageLoader()" x-init="fetchImage('{{ $user->img_1 }}')">
                                <template x-if="imageUrl">
                                    <img class="profile-image" :src="imageUrl" alt="Uploaded Image" />
                                </template>
                                <template x-if="!imageUrl">
                                    {{-- <p>Loading image...</p> --}}
                                </template>
                            </div>
                                {{-- <img src="{{ asset('storage/images/' . $user->img_1) }}" alt="Uploaded Image" class="profile-image"> --}}
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
                    </div>
                @endif
            @endforeach
        </div>

        <h2 class="text-center">Groom Profiles</h2>
        <div class="row">
            @foreach($users as $user)
                @if ($user->role == 'groom')
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            @if ($user->img_1)
                            <div x-data="imageLoader()" x-init="fetchImage('{{ $user->img_1 }}')">
                                <template x-if="imageUrl">
                                    <img class="profile-image" :src="imageUrl" alt="Uploaded Image" />
                                </template>
                                <template x-if="!imageUrl">
                                    {{-- <p>Loading image...</p> --}}
                                </template>
                            </div>
                                {{-- <img src="{{ asset('storage/images/' . $user->img_1) }}" alt="Uploaded Image" class="profile-image"> --}}
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
                    </div>
                @endif
            @endforeach
        </div>
    </div>


    
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('assets/user/js/bootstrap.bundle.min.js') }}"></script> --}}
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
</x-layout.user_banner>
