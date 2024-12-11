<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Maratha Vivah Mandal Dombivli</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="icon" href="{{asset('assets/user/img/favicon.png')}}">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Open+Sans:wght@400;500;600&family=Petit+Formal+Script&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
        <link href="{{ asset('assets/user/lib/animate/animate.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/user/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">


        <!-- Libraries Stylesheet -->
        {{-- <link href="lib/animate/animate.min.css" rel="stylesheet"> --}}
         {{-- <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet"> --}}
       
        <!-- Include SweetAlert2 CSS and JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>


       

        <!-- Customized Bootstrap Stylesheet -->
        {{-- <link href="css/bootstrap.min.css" rel="stylesheet"> --}}
        <link href="{{ asset('assets/user/css/bootstrap.min.css') }}" rel="stylesheet">


        <!-- Template Stylesheet -->
        {{-- <link href="css/style.css" rel="stylesheet"> --}}
        <link href="{{ asset('assets/user/css/style.css') }}" rel="stylesheet">

       
    </head>
    

    <body data-bs-spy="scroll" data-bs-target="#navBar" id="weddingHome">

        <!-- Navbar start -->
        <div class="container-fluid sticky-top px-0">
            <div class="container-fluid">
                <div class="container px-0">
                    <nav class="navbar navbar-light navbar-expand-xl py-2" id="navBar">
                        <a href="#" class="navbar-brand">
                            <img src="{{asset('assets/user/img/logo.png')}}" class="img-fluid" style="height: 60px;">
                        </a>
                        <button class="navbar-toggler py-1 px-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                            <span class="fa fa-bars text-primary"></span>
                        </button>
                        <div class="collapse navbar-collapse py-2" id="navbarCollapse">
                            <div class="navbar-nav mx-auto border-top">
                                <a href="/" class="nav-item nav-link active">Home</a>
                                <a href="/about-us" class="nav-item nav-link">About Us</a>
                                <a href="{{ route('basic_details.index') }}" class="nav-item nav-link">Profile</a>
                                <a href="#" class="nav-item nav-link">Success Stories</a>
                                <a href="#" class="nav-item nav-link">Contact Us</a>
                            </div>
                            @auth
                            <div class="d-flex align-items-center flex-nowrap">
                                <form action="{{ route('logout') }}" method="POST" id="logout-form">
                                    @csrf
                                    <button type="button" class="btn btn-sm btn-primary py-1 px-3 ms-3" onclick="confirmLogout()">Logout</button>
                                </form>
                            </div>
                            
                            <script>
                                function confirmLogout() {
                                    Swal.fire({
                                        title: 'Are you sure?',
                                        text: "You will be logged out!",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonText: 'Yes, logout!',
                                        cancelButtonText: 'No, cancel!'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            document.getElementById('logout-form').submit();
                                        }
                                    });
                                }
                            </script>
                            
                            
                            @else
                            <div class="d-flex align-items-center flex-nowrap">
                                <a href="{{route('register')}}" class="btn btn-sm btn-primary py-1 px-3 ms-3">Register</a>
                                <a href="{{route('login')}}" class="btn btn-sm btn-primary py-1 px-3 ms-3">Login</a>
                            </div>
                            @endauth
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        
        <!-- Navbar End -->



        <!-- Carousel Start -->
        
       
        <style>

        .breadcrumb-container {
            position: relative;
            width: 100%;
        }
        
        .breadcrumb-overlay {
            position: absolute;
            top: 50%; /* Adjust the vertical position */
            left: 50%;
            transform: translate(-50%, -50%); /* Center the breadcrumb */
            color: white; /* Text color */
            z-index: 10; /* Ensure breadcrumb is above the image */
        }
        
        .breadcrumb {
            background-color: transparent; /* Make breadcrumb background transparent */
            margin-bottom: 0; /* Remove bottom margin */
            font-size: 14px; /* Adjust font size */
        }
        
        .breadcrumb a {
            color: white; /* Link color */
        }
        
        .breadcrumb .active {
            color: white; /* Active breadcrumb color */
        }
    </style>

<div class="image-container" style="position: relative; display: inline-block; width: 100%;">
    <img src="{{asset('assets/images/mvm banner 04.jpeg')}}" class="img-fluid" alt="Image" style="height: 50px; width: 100%; object-fit: cover;">
    <div class="url-overlay" id="urlOverlay" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; display: flex; justify-content: center; align-items: center; padding: 10px; background-color: rgba(0, 0, 0, 0.5); color: white; font-size: 14px; font-weight: bold;">
        <!-- URL will be dynamically injected here -->
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Get the current page's URL
    const currentUrl = window.location.href;

    // Extract the path and check if there are query parameters
    const urlPath = currentUrl.split('?')[0];  // Split by '?' to ignore query parameters

    // Extract the path segments
    const segments = urlPath.split('/');
    const lastSegment = segments[segments.length - 1];

    // Check for the specific case of '/user/profile/9'
    if (segments.length === 4 && segments[2] === 'profile' && !isNaN(lastSegment)) {
        // If the URL is specifically '/user/profile/ID', only show 'Profile'
        document.getElementById('urlOverlay').innerText = 'Profile';
    } else {
        // Capitalize and display the full path, like 'Profile / Basic Details'
        const capitalizedFirstSegment = segments[segments.length - 2].charAt(0).toUpperCase() + segments[segments.length - 2].slice(1);

        // If the last segment has underscores, format it (e.g., "basic_details" -> "Basic Details")
        const formattedText = lastSegment
            .split('_')                // Split by underscores
            .map(word => word.charAt(0).toUpperCase() + word.slice(1))  // Capitalize each word
            .join(' ');                // Join with spaces

        // If the URL has multiple path segments, display the first segment followed by the last formatted segment
        const formattedPath = capitalizedFirstSegment + ' / ' + formattedText;
        document.getElementById('urlOverlay').innerText = formattedPath;
    }
});
document.addEventListener("DOMContentLoaded", function() {
    // Get the current page's URL
    const currentUrl = window.location.href;

    // Extract the path and check if there are query parameters
    const urlPath = currentUrl.split('?')[0];  // Split by '?' to ignore query parameters

    // Extract the path segments
    const segments = urlPath.split('/');
    const lastSegment = segments[segments.length - 1];

    // Check for specific cases: /login and /register
    if (lastSegment === 'login') {
        document.getElementById('urlOverlay').innerText = 'Login';
    } else if (lastSegment === 'register') {
        document.getElementById('urlOverlay').innerText = 'Register';
    } else {
        // Check for the specific case of '/user/profile/9'
        if (segments.length === 4 && segments[2] === 'profile' && !isNaN(lastSegment)) {
            // If the URL is specifically '/user/profile/ID', only show 'Profile'
            document.getElementById('urlOverlay').innerText = 'Profile';
        } else {
            // Capitalize and display the full path, like 'Profile / Basic Details'
            const capitalizedFirstSegment = segments[segments.length - 2].charAt(0).toUpperCase() + segments[segments.length - 2].slice(1);

            // If the last segment has underscores, format it (e.g., "basic_details" -> "Basic Details")
            const formattedText = lastSegment
                .split('_')                // Split by underscores
                .map(word => word.charAt(0).toUpperCase() + word.slice(1))  // Capitalize each word
                .join(' ');                // Join with spaces

            // If the URL has multiple path segments, display the first segment followed by the last formatted segment
            const formattedPath = capitalizedFirstSegment + ' / ' + formattedText;
            document.getElementById('urlOverlay').innerText = formattedPath;
        }
    }
});



</script>










        <div class="container">
           <div class="d-flex justify-content-evenly">
            {{ $slot }}
           </div>
        </div>
             
  

        <!-- Footer Start -->
        <div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">                            
    
                    <div class="row g-5 justify-content-center">
                        <div class="col-lg-3 text-start">
                            {!! @block("footer-1") !!}
                        </div>
                        <div class="col-lg-6 text-center">
                            <div class="footer-item">
                                {!! @block("footer-2") !!}
                            </div>
                        </div>
                        <div class="col-lg-3 text-end">
                            {!! @block("footer-3") !!}
                        </div>
                    </div>
                </div>
            </div>
        <!-- Footer End -->
        



        <!-- Copyright Start -->
        <div class="container-fluid copyright py-4">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-md-6 text-center text-md-start mb-md-0">
                        <span class="text-light">Maratha Vivah Mandal, Dombivli | Developed By <a href="https://sanmisha.com" target="_blank">Sanmisha Technologies</a></span>
                    </div>                    
                </div>
            </div>
        </div>
        <!-- Copyright End -->



        <!-- Back to Top -->
        <a href="#" class="btn btn-primary btn-primary-outline-0 btn-md-square back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
   
    {{-- <script src="lib/wow/wow.min.js"></script> --}}
    {{-- <script src="lib/easing/easing.min.js"></script> --}}
    {{-- <script src="lib/waypoints/waypoints.min.js"></script> --}}
    {{-- <script src="lib/lightbox/js/lightbox.min.js"></script> --}}

    <script src="{{ asset('assets/user/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets/user/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/user/lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('assets/user/lib/easing/easing.min.js') }}"></script>

    
    

    <!-- Template Javascript -->
    {{-- <script src="js/main.js"></script> --}}
    <script src="{{ asset('assets/user/js/main.js') }}"></script>

    
    <script src="/assets/js/alpine-collaspe.min.js"></script>
    <script src="/assets/js/alpine-persist.min.js"></script>
    <script defer src="/assets/js/alpine-ui.min.js"></script>
    <script defer src="/assets/js/alpine-focus.min.js"></script>
    <script defer src="/assets/js/alpine.min.js"></script>
    <script src="/assets/js/custom.js"></script>

    </body>

</html>