<x-layout.user>
    
 
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

<body data-bs-spy="scroll" data-bs-target="#navBar" id="weddingHome">

   


<div class="main-content">
    @if($purchased_packages)
   
    <div class="container">
        <h3 class="text-center">Purchased Packages  </h3>
        <h3 class="text-center">available Tokens {{$user->available_tokens}}  </h3>

        <div class="d-flex flex-row justify-items-center gap-4 ">

        @foreach ($purchased_packages as $purchased_package)
        <div class="package-container">
                <div class="package">
                    <div class="package-box">
                        <h4>{{ $purchased_package->name }}</h4>
                        <div class="form-group">
                            <p><strong>Package Description:</strong> {{ $purchased_package->description }}</p>
                            <p><strong>Package Price:</strong> ₹{{ number_format($purchased_package->price, 2) }}</p>
                            <p><strong>Expiry date:</strong> {{ $purchased_package->pivot->expires_at }}</p>
                            <p><strong>Package Price:</strong> ₹{{ number_format($purchased_package->price, 2) }}</p>

                        </form>
                        </div>
                    </div>
                </div>
        </div>
        @endforeach
    </div>


    </div>
@endif
    <div class="container">
        <h3 class="text-center">Packages</h3>
        <div class="package-container">
            @foreach ($packages as $package)
                <div class="package">
                    <div class="package-box">
                        <h4>{{ $package->name }}</h4>
                        <div class="form-group">
                            <p><strong>Package Description:</strong> {{ $package->description }}</p>
                            <p><strong>Package Price:</strong> ₹{{ number_format($package->price, 2) }}</p>
                            <form action="{{route('purchase_packages.store')}}" method="POST">
                                @csrf
                                <input type="hidden" name="package_id" type="number" value="{{$package->id}}">
                            <button type="submit" class="btn btn-primary">Buy</button>
                        </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>


{{-- <script>
    function buyPackage(packageId) {
        // Logic to handle the purchase
        alert('You are buying package ID: ' + packageId);
    }
</script> --}}



    <div class="sidebar">
        <x-common.usersidebar />
    </div>
     
     
</body>

</html>

    
    
    
    
</x-layout.user>

   <!-- <div class="form-group">
    <label for="name">Package Name:</label>
    <select name="name" id="name" disabled>
        @foreach ($packages as $package)
            <option value="{{ $package->id }}" {{ ($user->package === $package->id) ? 'selected' : '' }}>
                {{ $package->name }}
            </option>
        @endforeach
    </select>
    

    <x-input-error :messages="$errors->get('package')" class="mt-2" />
</div> -->
