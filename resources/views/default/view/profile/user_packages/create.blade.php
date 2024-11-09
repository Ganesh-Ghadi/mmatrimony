<x-layout.user_banner>
    <style>
        /* Sidebar style */
        #sidebar {
            position: fixed;
            top: 0;
            right: 0;
            width: 220px;
            height: 100%;
            background-color: #f8f9fa;
            box-shadow: -2px 0 5px rgba(0, 0, 0, 0.1);
            z-index: 1030;
            overflow-y: auto;
            display: block;
        }

        /* Adjust sidebar display on different screen sizes */
        @media (max-width: 992px) {
            #sidebar {
                display: none;
            }
            #sidebarToggle {
                display: block;
            }
        }

        @media (min-width: 992px) {
            #sidebar {
                display: block;
            }
            .main-content {
                margin-right: 220px;
            }
            #sidebarToggle {
                display: none;
            }
        }

        /* Main content area */
        .main-content {
            margin-right: 220px;
        }

        @media (max-width: 992px) {
            .main-content {
                margin-right: 0;
            }
        }

        /* Package box as card styling */
        .package-box {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Card-like shadow */
            padding: 20px;
            text-align: center;
            transition: box-shadow 0.3s;
            min-width: 200px;
            max-width: 300px; /* Restrict maximum width */
            overflow: hidden; /* Prevent overflow */
            white-space: normal; /* Allow text to wrap */
        }

        .package-box:hover {
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .carousel-wrapper {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem 0;
        }

        .carousel-content {
            display: flex;
            gap: 10px;
            overflow-x: auto;
            scroll-behavior: smooth;
            padding: 10px;
            max-width: 100%;
            white-space: nowrap;
        }

        /* Carousel controls */
        .carousel-controls {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
        }

        .carousel-button {
            background-color: transparent;
            color: #333; /* Dark color for visibility */
            border: none;
            padding: 8px 12px;
            border-radius: 50%;
            cursor: pointer;
            opacity: 0.7;
            transition: opacity 0.3s;
            font-size: 1.5rem; /* Increase font size for better visibility */
        }

        .carousel-button:hover {
            opacity: 1;
        }

        /* Text styling within cards */
        .package-box h4 {
            margin-bottom: 15px;
            font-size: 1.25rem;
            color: #333;
        }

        .package-box p {
            margin-bottom: 10px;
            font-size: 0.9rem;
            color: #555;
        }

        .package-box .btn-primary {
            margin-top: 10px;
        }
    </style>

    <div class="panel">
        <h3 class="text-center m-3">Available Tokens: {{$user->available_tokens}}</h3>

        @if($purchased_packages->isNotEmpty())
        <h3 class="text-center m-3">Purchased Packages</h3>
        <div class="carousel-wrapper">
            <div class="carousel-content" id="purchasedPackagesCarousel">
                @foreach ($purchased_packages as $purchased_package)
                    <div class="package-box">
                        <h4>{{ $purchased_package->name }}</h4>
                        <div class="form-group">
                            <p><strong>Package Description:</strong> {{ $purchased_package->description }}</p>
                            <p><strong>Package Price:</strong> ₹{{ number_format($purchased_package->price, 2) }}</p>
                            <p><strong>Expiry Date:</strong> {{ $purchased_package->pivot->expires_at }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="carousel-controls">
                <button class="carousel-button" onclick="scrollCarousel('left', 'purchasedPackagesCarousel')">&#8249;</button>
                <button class="carousel-button" onclick="scrollCarousel('right', 'purchasedPackagesCarousel')">&#8250;</button>
            </div>
        </div>
        @endif

        <div class="container">
            <h3 class="text-center m-3">Packages</h3>
            <div class="carousel-wrapper">
                <div class="carousel-content" id="availablePackagesCarousel">
                    @foreach ($packages as $package)
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
                    @endforeach
                </div>
                <div class="carousel-controls">
                    <button class="carousel-button" onclick="scrollCarousel('left', 'availablePackagesCarousel')">&#8249;</button>
                    <button class="carousel-button" onclick="scrollCarousel('right', 'availablePackagesCarousel')">&#8250;</button>
                </div>
            </div>
        </div>
    </div>

    <div class="sidebar">
        <x-common.usersidebar />
    </div>

    <script>
        // Function to scroll the carousel left or right
        function scrollCarousel(direction, carouselId) {
            const carousel = document.getElementById(carouselId);
            const scrollAmount = 300; // Amount to scroll by in pixels

            if (direction === 'left') {
                carousel.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
            } else {
                carousel.scrollBy({ left: scrollAmount, behavior: 'smooth' });
            }
        }
    </script>
</x-layout.user_banner>
