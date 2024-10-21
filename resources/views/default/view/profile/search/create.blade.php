<x-layout.user>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: black;
        }

        h1, h2, p, li, form {
            color: black;
        }

        .sidebar {
            width: 300px;
            position: sticky;
            top: 0;
            height: 100vh;
            background-color: #f5f5f5;
            padding: 15px;
            border-left: 1px solid #ddd;
        }

        input[type="text"], input[type="number"], button {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
            width: 100%;
        }

        /* Update button color to rose red */
        button {
            background-color: #ff0000; /* Rose Red color */
            color: white;
            cursor: pointer;
            width: auto;
            padding: 10px 25px;
            margin-top: 40px; /* Top margin */
            margin-bottom: 20px; /* Bottom margin */
            margin-right: 15px; /* Right margin */
        }

        button:hover {
            background-color: #cc0066; /* Darker shade for hover effect */
        }

        .age-range {
            display: flex;
            align-items: center; /* Vertically align inputs and "to" */
            gap: 10px;
            margin-bottom: 10px;
        }

        .marital-status {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .results {
            display: grid;
            grid-template-columns: repeat(4, 1fr); /* 4 cards per row */
            gap: 20px;
            margin-top: 20px;
        }

        .card {
            background-color: white;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .card h3 {
            font-size: 1em; /* Reduced size for the heading */
        }

        .card p {
            font-size: 0.9em; /* Reduced size for paragraphs */
        }

        .card img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
        }

        .form-actions {
            display: flex; /* Makes the buttons appear in one line */
            justify-content: flex-end; /* Align buttons to the right */
            gap: 10px; /* Adds spacing between the buttons */
        }

        /* Responsive for smaller screens */
        @media (max-width: 1024px) {
            .results {
                grid-template-columns: repeat(2, 1fr); /* 2 cards per row on medium screens */
            }
        }

        @media (max-width: 600px) {
            .results {
                grid-template-columns: 1fr; /* 1 card per row on small screens */
            }
        }
        button,
a.btn {
    background-color: #ff0000; /* Rose Red color */
     cursor: pointer;
    padding: 10px 25px;
    margin-top: 40px; /* Top margin */
    margin-bottom: 20px; /* Bottom margin */
    margin-right: 15px; /* Right margin */
    border: none; /* Remove default border */
    text-align: center; /* Center text */
}

button:hover,
a.btn:hover {
    background-color: #cc0066; /* Darker shade for hover effect */
}

    </style>

    <div>
        <h1 class="text-center">User Search</h1>

        <!-- Search Form -->
        <form action="{{ route('search.create') }}" method="GET">
            <div class="input-group mb-3">
                <input class="form-control" type="text" name="query" placeholder="Search Bride/Groom" value="{{ request()->input('query') }}">
            </div>
        
            <!-- Age Range Search Inputs -->
            <div class="age-range">
                <input type="number" class="form-control" name="from_age" placeholder="From age" min="18" max="70" value="{{ request()->input('from_age') }}">
                <span>to</span>
                <input type="number" class="form-control" name="to_age" placeholder="To age" min="18" max="70" value="{{ request()->input('to_age') }}">
            </div>
        
            <!-- Marital Status Multi-select Checkboxes -->
            <div class="marital-status mt-3">
                <label><input type="checkbox" name="marital_status[]" value="Never Married" {{ in_array('Never Married', (array) request()->input('marital_status')) ? 'checked' : '' }}> Never Married</label>
                <label><input type="checkbox" name="marital_status[]" value="Married" {{ in_array('Married', (array) request()->input('marital_status')) ? 'checked' : '' }}> Married</label>
                <label><input type="checkbox" name="marital_status[]" value="Divorced" {{ in_array('Divorced', (array) request()->input('marital_status')) ? 'checked' : '' }}> Divorced</label>
                <label><input type="checkbox" name="marital_status[]" value="Awaiting Divorce" {{ in_array('Awaiting Divorce', (array) request()->input('marital_status')) ? 'checked' : '' }}> Awaiting Divorce</label>
                <label><input type="checkbox" name="marital_status[]" value="Separated" {{ in_array('Separated', (array) request()->input('marital_status')) ? 'checked' : '' }}> Separated</label>
                <label><input type="checkbox" name="marital_status[]" value="Widowed" {{ in_array('Widowed', (array) request()->input('marital_status')) ? 'checked' : '' }}> Widowed</label>
                <label><input type="checkbox" name="marital_status[]" value="Annulled" {{ in_array('Annulled', (array) request()->input('marital_status')) ? 'checked' : '' }}> Annulled</label>
                 
            </div>
        
            <!-- Search and Reset Buttons -->
            <div class="form-actions mt-3">
                <button type="submit" class="btn btn-primary">Search</button>
                <a href="{{ route('search.create') }}" class="btn btn-primary">Reset</a> <!-- Link to reset the form -->
            </div>
        </form>

        <hr>

        <!-- Show User Profiles -->
        @if($users->isNotEmpty())
            <h2>Searched Members</h2>
            <div class="results">
                @foreach ($users as $user)
                    <div class="card">
                        <!-- Display user profile image -->
                        <div class="form-group">
                            @if($user->img_1)
                                <img src="{{ asset('storage/images/' . $user->img_1) }}" alt="Uploaded Image" class="profile-image">
                            @else
                                <p>No pic display</p>
                            @endif
                        </div>
                        <h3>{{ $user->first_name }} {{ $user->last_name }}</h3>
                        <p>Age: {{ $user->age }}</p> <!-- Displaying the calculated age -->
                        <p>Marital Status: {{ $user->marital_status }}</p> <!-- Displaying the marital status -->
            
                        {{-- <!-- View Profile Link -->
                        <form action="{{ route('profiles.add_favorite') }}" method="POST">
                            @csrf
                            <input type="hidden" name="favorite_id" value="{{$user->id}}">
                        <button type="submit" class="btn btn-primary text-white btn-sm ">Add to favorites</button>
                    </form>


                        <a href="{{ route('user.profile', $user->id) }}" class="btn btn-primary">View Profile</a> --}}
                        {{-- start --}}

                        @if($user->is_favorited)
                        <form action="{{ route('profiles.remove_favorite') }}" method="POST">
                            @csrf
                            <input type="hidden" name="favorite_id" value="{{$user->id}}">

                            <button type="submit">Remove from Favorites</button>
                        </form>
                    @else
                        <form action="{{ route('profiles.add_favorite') }}" method="POST">
                            @csrf
                            <input type="hidden" name="favorite_id" value="{{$user->id}}">

                            <button type="submit">Add to Favorites</button>
                        </form>
                    @endif

                        {{-- end --}}
                        <a href="{{ route('user.profile', $user->id) }}" class="btn btn-primary">View Profile</a> 

                    </div>
                @endforeach

            </div>
        @else
            <p>No users found.</p>
        @endif
    </div>

    <div class="sidebar">
        <x-common.usersidebar />
    </div>

</x-layout.user>
