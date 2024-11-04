<x-layout.user>
    <style>
        /* Sidebar style */
        #sidebar {
            position: fixed;
            top: 0;
            right: 0;
            width: 220px; /* Reduced sidebar width */
            height: 100%;
            background-color: #f8f9fa;
            box-shadow: -2px 0 5px rgba(0, 0, 0, 0.1);
            z-index: 1030;
            overflow-y: auto;
            display: block;
        }

        /* Adjust sidebar display on different screen sizes */
        @media (max-width: 992px) {
            #sidebar { display: none; }
            #sidebarToggle { display: block; }
        }
        @media (min-width: 992px) {
            #sidebar { display: block; }
            .main-content { margin-right: 220px; } /* Adjusted to sidebar width */
            #sidebarToggle { display: none; }
        }

        /* Main content area */
        .main-content {
            margin-right: 220px;
        }
        @media (max-width: 992px) {
            .main-content { margin-right: 0; }
        }

        /* Package box style */
        .package-box {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            transition: box-shadow 0.3s;
        }
        .package-box:hover {
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        /* Horizontal layout with scrolling */
        .scrollable-packages {
    display: flex;
    gap: 10px;
    overflow-x: auto; /* Allow only horizontal scrolling */
    max-height: 240px; /* Fixed height for visibility */
    max-width: 85%; /* Decreased width for visibility */
    padding: 10px;
    border: 1px solid #ccc;
    white-space: nowrap;
}

/* Optionally, you can remove the height property of .package-container */
.package-container {
    flex: 1 1 200px;
}


        /* Sidebar styling */
        .sidebar {
            width: 220px;
            position: sticky;
            top: 0;
            height: 100vh;
            background-color: #f5f5f5;
            padding: 15px;
            border-left: 1px solid #ddd;
        }
        
        button.btn {
            background-color: #ff0000;
            color: white !important;
            border: none;
        }
        .panel {
            border: 1px solid #ddd;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            margin: 20px auto;
        }
        
    </style>

    <div class="panel">
        <h3 class="text-center m-3">Available Tokens: {{$user->available_tokens}}</h3>
        @if($purchased_packages->isNotEmpty())
        <h3 class="text-center m-3">Purchased Packages</h3>
        <div class="container">
            <div class="scrollable-packages">
                @foreach ($purchased_packages as $purchased_package)
                    <div class="package-container">
                        <div class="package">
                            <div class="package-box">
                                <h4>{{ $purchased_package->name }}</h4>
                                <div class="form-group">
                                    <p><strong>Package Description:</strong> {{ $purchased_package->description }}</p>
                                    <p><strong>Package Price:</strong> ₹{{ number_format($purchased_package->price, 2) }}</p>
                                    <p><strong>Expiry Date:</strong> {{ $purchased_package->pivot->expires_at }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    

        <div class="container">
            <h3 class="text-center m-3">Packages</h3>
            <div class="package-container">
                <div class="row">
                    @foreach ($packages as $package)
                        <div class="col-md-4 mb-3 col-12">
                            <div class="package">
                                <div class="package-box">
                                    <h4>{{ $package->name }}</h4>
                                    <div class="form-group">
                                        <p><strong>Package Description:</strong> {{ $package->description }}</p>
                                        <p><strong>Package Price:</strong> ₹{{ number_format($package->price, 2) }}</p>
                                        <form action="{{ route('purchase_packages.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="package_id" value="{{ $package->id }}">
                                            <button type="submit" class="btn btn-primary">Buy</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="sidebar">
        <x-common.usersidebar />
    </div>
</x-layout.user>
