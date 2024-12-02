<x-layout.user>
    <style>
        .card {
            transition: transform 0.2s, box-shadow 0.2s; /* Smooth transition */
            margin-right: 15px; /* Add margin between cards */
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

        /* Wrapper for both profiles and the scroll buttons */
        .profile-wrapper {
            position: relative;
            width: 100%;
        }

        /* Scrollable container for profiles */
        .profile-scroll-container {
            display: flex;
            overflow-x: auto; /* Enable horizontal scrolling */
            padding: 10px 0; /* Add padding for better spacing */
            position: relative; /* Make the container relative to position arrows */
            -ms-overflow-style: none; /* Disable scrollbar for IE */
            scrollbar-width: none; /* Hide scrollbar for Firefox */
        }

        /* Hide scrollbar for Webkit browsers (Chrome, Safari) */
        .profile-scroll-container::-webkit-scrollbar {
            display: none;
        }

        /* Styling for the left and right arrows */
        .scroll-arrow {
            position: absolute;  /* Absolute positioning within the wrapper */
            top: 50%;            /* Center vertically */
            transform: translateY(-50%); /* Adjust for perfect centering */
            background-color: transparent;  /* Transparent background */
            color: black;        /* Arrow color */
            border: none;
            font-size: 24px;      /* Increase font size for visibility */
            cursor: pointer;
            padding: 5px;
            z-index: 10;          /* Ensure it's above other elements */
        }

        .scroll-left {
            left: 10px;  /* Position left arrow to the left of the container */
        }

        .scroll-right {
            right: 10px; /* Position right arrow to the right of the container */
        }
    </style>

    <div class="container my-4">
        @if(session('error'))
        <div class="alert mt-2 alert-danger alert-dismissible fade show" role="alert">
            <strong>Error</strong> {{ session('error') }}
        </div>
        @endif
        <h2 class="text-center">Bride Profiles</h2>
        <div class="profile-wrapper">
            <!-- Left Arrow -->
            <button class="scroll-arrow scroll-left" onclick="scrollContainer('bride-profiles', -1)">❮</button>
            <div class="profile-scroll-container" id="bride-profiles">
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
                                @else
                                    <div class="no-profile-photo">No Profile Photo Displayed</div>
                                @endif
                                <div class="card-body text-center">
                                    <h5 class="card-title">{{ $user->first_name }} {{ $user->last_name }}</h5>
                                    <p class="card-text">{{ \Carbon\Carbon::parse($user->date_of_birth)->age }} years</p>
                                    <p class="card-text">{{ @$user->subCaste->name }}</p>
                                    <p class="card-text">{{ $user->bio }}</p>
                                    <span class="view-profile" onclick="location.href='{{ route('user.show_profile', $user->id) }}'">View Profile</span>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <!-- Right Arrow -->
            <button class="scroll-arrow scroll-right" onclick="scrollContainer('bride-profiles', 1)">❯</button>
        </div>

        <h2 class="text-center">Groom Profiles</h2>
        <div class="profile-wrapper">
            <!-- Left Arrow -->
            <button class="scroll-arrow scroll-left" onclick="scrollContainer('groom-profiles', -1)">❮</button>
            <div class="profile-scroll-container" id="groom-profiles">
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
                                @else
                                    <div class="no-profile-photo">No Profile Photo Displayed</div>
                                @endif
                                <div class="card-body text-center">
                                    <h5 class="card-title">{{ $user->first_name }} {{ $user->last_name }}</h5>
                                    <p class="card-text">{{ \Carbon\Carbon::parse($user->date_of_birth)->age }} years</p>
                                    <p class="card-text">{{ @$user->subCaste->name }}</p>
                                    <p class="card-text">{{ $user->bio }}</p>
                                    <span class="view-profile" onclick="location.href='{{ route('user.show_profile', $user->id) }}'">View Profile</span>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <!-- Right Arrow -->
            <button class="scroll-arrow scroll-right" onclick="scrollContainer('groom-profiles', 1)">❯</button>
        </div>
    </div>

    <script>
        // Function to handle the scrolling behavior
        function scrollContainer(containerId, direction) {
            const container = document.getElementById(containerId);
            const scrollAmount = 300; // Amount to scroll (adjust as needed)

            container.scrollBy({
                left: direction * scrollAmount,
                behavior: 'smooth'
            });
        }

        // Image Loader (Your original code)
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
</x-layout.user>
