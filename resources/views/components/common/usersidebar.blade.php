 
    <style>
        /* Sidebar style */
        #sidebar {
            position: fixed; /* Fixed positioning for the sidebar */
            top: 0;
            right: 0;
            width: 250px; /* Adjust the width as needed */
            height: 100%;
            background-color: #f8f9fa; /* Background color of sidebar */
            box-shadow: -2px 0 5px rgba(0, 0, 0, 0.1); /* Optional shadow */
            z-index: 1030; /* Above other content */
            display: none; /* Start with sidebar hidden */
            overflow-y: auto; /* Enable scrolling when content exceeds the sidebar height */
            z-index: 500;
        }
    
        /* Ensure sidebar is hidden on small screens and toggle button is visible */
        @media (max-width: 992px) {
            #sidebar {
                display: none; /* Hide sidebar on small screens */
            }
    
            #sidebarToggle {
                display: block; /* Show toggle button */
            }
        }
    
        @media (min-width: 992px) {
            #sidebar {
                display: block; /* Show sidebar */
                float: right; /* Place sidebar beside main content */
                position: relative; /* Make sidebar part of the main content flow */
            }

            .main-content {
                margin-right: 250px; /* Space for the sidebar */
            }

            #sidebarToggle {
                display: block; /* Hide toggle button */
            }
        }

        /* Main content area */
        .main-content {
            margin-right: 250px; /* Space for the sidebar */
        }
    
        /* Adjust main content on smaller screens */
        @media (max-width: 992px) {
            .main-content {
                margin-right: 0; /* No margin on small screens */
            }
        }

        /* Package box style */
        .package-box {
            border: 1px solid #ddd; /* Border for package box */
            border-radius: 8px; /* Rounded corners */
            padding: 20px; /* Padding inside the box */
            text-align: center; /* Center text */
            transition: box-shadow 0.3s; /* Smooth shadow transition */
        }

        .package-box:hover {
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); /* Shadow on hover */
        }

        /* Horizontal layout for package boxes */
        .package-container {
            display: flex; /* Flex container for horizontal layout */
            justify-content: space-between; /* Space between items */
            margin-top: 20px; /* Space above package section */
        }

        .package {
            flex: 1; /* Each package box takes equal space */
            margin: 0 10px; /* Margin between boxes */
        }

    </style>
    
 <div data-bs-spy="scroll" data-bs-target="#navBar" id="weddingHome">
    {{-- Sidebar for larger screens --}}
    <div  id="sidebar">
        <div class="offcanvas-header"> <!-- Hide on large screens -->
        <h5 class="offcanvas-title" id="sidebarLabel">Profile Details</h5>
        <button id="sidebarClose" class="btn btn-close  d-lg-none"></button> <!-- Close button -->
    </div>
        <div class="offcanvas-body">
            <ul class="list-group">
                <li class="list-group-item"><a href="{{ route('search.create') }}">Quick Search</a></li>
                <li class="list-group-item"><a href="{{ route('view_profile.create') }}">View Profile</a></li>
                <li class="list-group-item"><a href="{{ route('basic_details.index') }}">Basic Details</a></li>
                <li class="list-group-item"><a href="{{ route('religious_details.create') }}">Religious Details</a></li>
                <li class="list-group-item"><a href="{{ route('family_details.create') }}">Family Background</a></li>
                <li class="list-group-item"><a href="{{ route('astronomy_details.create') }}">Astronomy Details</a></li>
                <li class="list-group-item"><a href="{{ route('educational_details.create') }}">Educational Details</a></li>
                <li class="list-group-item"><a href="{{ route('occupation_details.create') }}">Occupational Details</a></li>
                <li class="list-group-item"><a href="{{ route('contact_details.create') }}">Contact Details</a></li>
                 <li class="list-group-item"><a href="{{ route('life_partner.create') }}">About Life Partner</a></li>
                 <li class="list-group-item"><a href="{{ route('user_packages.create') }}">Package</a></li>
                 <li class="list-group-item"><a href="{{ route('profiles.view_interested') }}">Interested</a></li>
                 <li class="list-group-item"><a href="{{ route('profiles.view_favorite') }}">Favorites</a></li>

                {{-- <li class="list-group-item"><a href="#">Pay Now</a></li>  --}}
            </ul>
        </div>
    </div>

 
    
   
</div>

 
