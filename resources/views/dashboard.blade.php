<x-layout.user>
   
    <link href="{{ asset('assets/user/css/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/user/css/slick.theme.css') }}" rel="stylesheet">

    <style>
        .slider { width: 80%; margin: auto; }
        .slide { text-align: center; }
        .slide img { width: 100px; height: 100px; }
    </style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="{{ asset('assets/user/js/slick.min.js') }}"></script>

       

    <div class="body-tag">
        <div class="slider" id="userSlider">
            @foreach($users as $user)
                <div class="slide">
                    <h3>{{ $user->first_name }}</h3>
                </div>
            @endforeach
        </div>
        <button id="loadMore">Load More</button>
    </div>




           <script>
    jQuery(document).ready(function() {
    let offset = 4; // Initial offset
    jQuery('#userSlider').slick({
        infinite: false,
        slidesToShow: 4,
        slidesToScroll: 4,
    });

    jQuery('#loadMore').on('click', function() {
        console.log('Loading more users...');
        jQuery.ajax({
            url: '/dashboard/load',
            type: 'GET',
            data: { offset: offset },
            success: function(data) {
                console.log('Data received:', data);
                if (data.users && data.users.length) {
                    data.users.forEach(user => {
                        jQuery('#userSlider').slick('slickAdd', `
                            <div class="slide">
                                <h3>${user.first_name}</h3>
                            </div>
                        `);
                    });
                    offset += 4; // Update offset
                } else {
                    console.log('No more users to load');
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', status, error);
            }
        });
    });
});
</script>
        </div>






  


























{{-- 
 <!-- Hello! Start -->
 <div class="container-fluid position-relative py-5" id="weddingAbout">
    <div class="position-absolute" style="top: -35px; right: 0;">
        <img src="{{asset('assets/user/img/tamp-bg-1.png')}}" class="img-fluid" alt="Maratha Vivah Mandal, Dombivli">
    </div>
    <div class="position-absolute" style="top: -10px; left: 0; transform: rotate(150deg);">
        <img src="{{asset('assets/user/img/tamp-bg-1.png')}}" class="img-fluid" alt="Maratha Vivah Mandal, Dombivli">
    </div>
    <div class="container position-relative py-5">
        
        <div class="row">
            <div class="col-lg-12">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="mx-auto  mb-3 wow fadeInUp" data-wow-delay="0.1s" >
                            <h2 class="display-1 text-primary mb-0">About Us</h2>
                        </div>
                        <div class="d-flex">
                            <div class="my-auto">
                                <p>Text will come here Text will come here Text will come here Text will come here Text will come here Text will come here Text will come here </p><p>Text will come here Text will come here Text will come here Text will come here Text will come here Text will come here Text will come here 
                                </p>
                            </div>
                        </div>
                        <a class="btn btn-primary btn-primary-outline-0 py-3 px-5 mt-4" href="#">Know More</a>
                    </div>
                    <div class="col-lg-5 wow fadeInUp order-first order-md-last" data-wow-delay="0.3s">
                            <img src="{{asset('assets/user/img/about.jpg')}}" class="img-fluid img-border w-100" alt="Maratha Vivah Mandal, Dombivli">
                    </div>
                   
                   
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hello! End -->


<!-- About Start -->
<div class="container-fluid position-relative overflow-hidden bg-secondary py-5">
    <img src="{{asset('assets/user/img/bg-flower.png')}}" class="img-fluid position-absolute top-0" style="right: -15px; transform: rotate(270deg); opacity: 0.5;" alt="Maratha Vivah Mandal, Dombivli">
    <img src="{{asset('assets/user/img/bg-flower.png')}}" class="img-fluid position-absolute" style="bottom: 10px; left: -15px; transform: rotate(90deg); opacity: 0.5;" alt="Maratha Vivah Mandal, Dombivli">
    <div class="container py-5 position-relative">
        <div class="row g-5 align-items-center">
            <div class="col-xl-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="border-white bg-primary" style="border-style: double;">
                    <img src="{{asset('assets/user/img/about-1.jpg')}}" class="img-fluid w-100" alt="Maratha Vivah Mandal, Dombivli">
                </div>
            </div>
            <div class="col-xl-6">
                <div class="wow fadeIn" data-wow-delay="0.3s">
                    <h2 class="display-5 text-white mb-4">Register Yourself</h2>
                    <p class="text-white fs-5 mb-4">Text will come here Text will come here Text will come here Text will come here Text will come here 
                    </p>
                    <div class="tab-class bg-primary p-4">
                        <ul class="nav d-flex mb-4">
                            <li class="nav-item">
                                <a class="d-flex py-2 text-center bg-white active" data-bs-toggle="pill" href="#tab-1">
                                    <span class="text-dark px-3">Step 01</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="d-flex py-2 mx-3 text-center bg-white" data-bs-toggle="pill" href="#tab-2">
                                    <span class="text-dark px-3">Step 02</span>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane fade show p-0 active">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-flex">
                                            <div class="me-4">
                                                <img src="{{asset('assets/user/img/bride.jpg')}}" class="img-fluid w-100 img-border" alt="Maratha Vivah Mandal, Dombivli">
                                            </div>
                                            <div class="text-start my-auto">
                                                <h3 class="h5 text-white fw-bold">Title Here</h3>
                                                <p class="text-white mb-3">Text will come here Text will come here Text will come here 
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-2" class="tab-pane fade show p-0">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-flex">
                                            <div class="me-4">
                                                <img src="img/bride2.jpg" class="img-fluid w-100 img-border" alt="Maratha Vivah Mandal, Dombivli">
                                            </div>
                                            <div class="text-start my-auto">
                                                <h3 class="h5 text-white fw-bold">Title Here</h3>
                                                <p class="text-white mb-3">Text will come here Text will come here Text will come here 
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex mt-5">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0">
                            <a href="#" class="btn btn-primary btn-primary-outline-0 py-3 px-4">View Full Process</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Story Start -->
<div class="container-fluid story position-relative py-5" id="weddingStory">
   
    <div class="container position-relative py-5">
        <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
            <h2 class="display-4">Success Stories</h2>
        </div>
        <div class="story-timeline">
            <div class="row wow fadeInUp" data-wow-delay="0.2s">
                <div class="col-md-6 text-end border-0 border-top border-end border-secondary p-4">
                    <div class="d-inline-flex align-items-center h-100">
                        <img src="{{asset('assets/user/img/story-1.jpg')}}" class="img-fluid w-100 img-border" alt="Maratha Vivah Mandal, Dombivli">
                    </div>
                </div>
                <div class="col-md-6 border-start border-top border-secondary p-4 pe-0">
                    <div class="h-100 d-flex flex-column justify-content-center bg-secondary p-4">
                        <h3 class="h4 mb-2 text-white">Bride Vs Groom</h3>
                        <p class=" text-light mb-2" >01 Jan 2020</p>
                        <p class="m-0 fs-5">Text will come here Text will come here Text will come here Text will come here Text will come here .</p>
                    </div>
                </div>
            </div>
            <div class="row flex-column-reverse flex-md-row wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-md-6 text-end border-end border-top border-secondary p-4 ps-0">
                    <div class="h-100 d-flex flex-column justify-content-center bg-secondary p-4">
                        <h3 class="h4 mb-2 text-white">Bride Vs Groom</h3>
                        <p class=" text-light mb-2" >01 Jan 2020</p>
                        <p class="m-0 fs-5">Text will come here Text will come here Text will come here Text will come here Text will come here .</p>
                    </div>
                </div>
                <div class="col-md-6 border-start border-top border-secondary p-4">
                    <div class="d-inline-flex align-items-center h-100">
                        <img src="{{asset('assets/user/img/story-1.jpg')}}" class="img-fluid w-100 img-border" alt="Maratha Vivah Mandal, Dombivli">
                    </div>
                </div>
            </div>
            <div class="row wow fadeInUp" data-wow-delay="0.4s">
                <div class="col-md-6 text-end border-end border-top border-secondary p-4 ps-0">
                    <div class="d-inline-flex align-items-center h-100">
                        <img src="{{asset('assets/user/img/story-1.jpg')}}" class="img-fluid w-100 img-border" alt="Maratha Vivah Mandal, Dombivli">
                    </div>
                </div>
                <div class="col-md-6 border-start border-top border-secondary p-4 pe-0">
                    <div class="h-100 d-flex flex-column justify-content-center bg-secondary p-4">
                        <h3 class="h4 mb-2 text-white">Bride Vs Groom</h3>
                        <p class=" text-light mb-2" >01 Jan 2020</p>
                        <p class="m-0 fs-5">Text will come here Text will come here Text will come here Text will come here Text will come here .</p>
                    </div>
                </div>
            </div>
            <div class="row flex-column-reverse flex-md-row wow fadeInUp" data-wow-delay="0.5s">
                <div class="col-md-6 text-end border border-start-0 border-secondary p-4 ps-0">
                    <div class="h-100 d-flex flex-column justify-content-center bg-secondary p-4">
                        <h3 class="h4 mb-2 text-white">Bride Vs Groom</h3>
                        <p class=" text-light mb-2" >01 Jan 2020</p>
                        <p class="m-0 fs-5">Text will come here Text will come here Text will come here Text will come here Text will come here .</p>
                    </div>
                </div>
                <div class="col-md-6 border border-end-0 border-secondary p-4">
                    <div class="d-inline-flex align-items-center h-100">
                        <img src="{{asset('assets/user/img/story-1.jpg')}}" class="img-fluid w-100 img-border" alt="Maratha Vivah Mandal, Dombivli">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Story End -->



<!-- Wedding Timeline start -->
<div class="container-fluid wedding-timeline bg-secondary position-relative overflow-hidden py-5" id="weddingTimeline">
    <div class="position-absolute" style="top: 50%; left: -100px; transform: translateY(-50%); opacity: 0.5;">
        <img src="{{asset('assets/user/img/wedding-bg.png')}}" class="img-fluid" alt="Maratha Vivah Mandal, Dombivli">
    </div>
    <div class="position-absolute" style="top: 50%; right: -160px; transform: translateY(-50%); opacity: 0.5; rotate: 335deg;">
        <img src="{{asset('assets/user/img/wedding-bg.png')}}" class="img-fluid" alt="Maratha Vivah Mandal, Dombivli">
    </div>
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="display-4 text-white">Other Social Work</h2>
        </div>
        <div class="position-relative wedding-content">
            <div class="row g-4">
                <div class="col-6 col-md-6 col-xl-3 border border-bottom-0">
                    <div class="text-center p-3 wow fadeIn" data-wow-delay="0.1s">
                        <div class="mb-4 p-3 d-inline-flex">
                            <em class="fa fa-school text-white fa-2x">&nbsp;</em>
                        </div>
                        <h3 class="text-white mb-3">Title Here</h3>
                        <p>Text will come here Text will come here Text will come here Text will come here Text will come here </p>
                    </div>
                </div>
                <div class="col-6 col-md-6 col-xl-3 border border-top-0 border-start-0">
                    <div class="text-center p-3 wow fadeIn" data-wow-delay="0.3s">
                        <div class="mb-4 p-3 d-inline-flex">
                            <em class="fa fa-building text-white fa-2x">&nbsp;</em>
                        </div>
                        <h3 class="text-white mb-3">Title Here</h3>
                        <p>Text will come here Text will come here Text will come here Text will come here Text will come here </p>
                    </div>
                </div>
                <div class="col-6 col-md-6 col-xl-3 border border-bottom-0 border-end-0">
                    <div class="text-center p-3 wow fadeIn" data-wow-delay="0.5s">
                        <div class="mb-4 p-3 d-inline-flex">
                            <em class="fa fa-users text-white fa-2x">&nbsp;</em>
                        </div>
                        <h3 class="text-white mb-3">Title Here</h3>
                        <p>Text will come here Text will come here Text will come here Text will come here Text will come here </p>
                    </div>
                </div>
                <div class="col-6 col-md-6 col-xl-3 border border-top-0">
                    <div class="text-center p-3 wow fadeIn" data-wow-delay="0.7s">
                        <div class="mb-4 p-3 d-inline-flex">
                            <em class="fa fa-leaf text-white fa-2x">&nbsp;</em>
                        </div>
                        <h3 class="text-white mb-3">Title Here</h3>
                        <p>Text will come here Text will come here Text will come here Text will come here Text will come here </p>
                    </div>
                </div>
            </div>
            <div class="position-absolute heart-circle " style="bottom: 0; left: -18px;">
                <div class="border border-2 border-primary rounded-circle p-1 bg-secondary"></div>
            </div>
            <div class="position-absolute heart-circle" style="top: 18px; right: -17px;">
                <div class="border border-2 border-primary rounded-circle p-1 bg-secondary"></div>
            </div>
        </div>
    </div>
</div>
<!-- Wedding Timeline End -->

 <!--- Bridesmaids & Groomsmen start -->
 <div class="container-fluid team position-relative py-3">
    <div class="position-absolute" style="bottom: -80px; right: 0;">
        <img src="{{asset('assets/user/img/tamp-bg-1.png')}}" class="img-fluid" alt="Maratha Vivah Mandal, Dombivli">
    </div>
    <div class="position-absolute" style="bottom: -90px; left: 0; transform: rotate(150deg);">
        <img src="{{asset('assets/user/img/tamp-bg-1.png')}}" class="img-fluid" alt="Maratha Vivah Mandal, Dombivli">
    </div>
    <div class="container py-5">
        <div class="mb-5 text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
            <h2 class="display-2 text-dark">Find Your Partner</h2>
            <p class="fs-5 text-dark">Text will come here Text will come here Text will come here Text will come here Text will come here Text will come here </p>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                <div class="team-item">
                    <div class="team-img">
                        <div class="team-img-main">
                            <img src="{{asset('assets/user/img/bridesmaid-1.png')}}" class="img-fluid w-100" alt="Maratha Vivah Mandal, Dombivli">
                        </div>
                    </div>
                    <div class="team-content">
                        <div class="d-flex flex-column p-4">
                            <h3 class="text-white display-6 mb-1">Bride Name</h3>
                            <h4 class="h6 text-white fs-5 mb-0">Location</h4>
                        </div>
                    </div>
                    <div class="team-social d-flex flex-column">
                        <a class="btn btn-light btn-light-outline-0 mb-2" href="#"><em class="fas fa-eye"></em></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.4s">
                <div class="team-item">
                    <div class="team-img">
                        <div class="team-img-main">
                            <img src="{{asset('assets/user/img/bridesmaid-1.png')}}" class="img-fluid w-100" alt="Maratha Vivah Mandal, Dombivli">
                        </div>
                    </div>
                    <div class="team-content">
                        <div class="d-flex flex-column p-4">
                            <h3 class="text-white display-6 mb-1">Bride Name</h3>
                            <h4 class="h6 text-white fs-5 mb-0">Location</h4>
                        </div>
                    </div>
                    <div class="team-social d-flex flex-column">
                        <a class="btn btn-light btn-light-outline-0 mb-2" href="#"><em class="fas fa-eye"></em></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.6s">
                <div class="team-item">
                    <div class="team-img">
                        <div class="team-img-main">
                            <img src="{{asset('assets/user/img/bridesmaid-1.png')}}" class="img-fluid w-100" alt="Maratha Vivah Mandal, Dombivli">
                        </div>
                    </div>
                    <div class="team-content">
                        <div class="d-flex flex-column p-4">
                            <h3 class="text-white display-6 mb-1">Bride Name</h3>
                            <h4 class="h6 text-white fs-5 mb-0">Location</h4>
                        </div>
                    </div>
                    <div class="team-social d-flex flex-column">
                        <a class="btn btn-light btn-light-outline-0 mb-2" href="#"><em class="fas fa-eye"></em></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.8s">
                <div class="team-item">
                    <div class="team-img">
                        <div class="team-img-main">
                            <img src="{{asset('assets/user/img/bridesmaid-1.png')}}" class="img-fluid w-100" alt="Maratha Vivah Mandal, Dombivli">
                        </div>
                    </div>
                    <div class="team-content">
                        <div class="d-flex flex-column p-4">
                            <h3 class="text-white display-6 mb-1">Bride Name</h3>
                            <h4 class="h6 text-white fs-5 mb-0">Location</h4>
                        </div>
                    </div>
                    <div class="team-social d-flex flex-column">
                        <a class="btn btn-light btn-light-outline-0 mb-2" href="#"><em class="fas fa-eye"></em></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                <div class="team-item">
                    <div class="team-img">
                        <div class="team-img-main">
                            <img src="{{asset('assets/user/img/Groomsmen-1.png')}}" class="img-fluid w-100" alt="Maratha Vivah Mandal, Dombivli">
                        </div>
                    </div>
                    <div class="team-content">
                        <div class="d-flex flex-column p-4">
                            <h3 class="text-white display-6 mb-1">Groom Name</h3>
                            <h4 class="h6 text-white fs-5 mb-0">Location</h4>
                        </div>
                    </div>
                    <div class="team-social d-flex flex-column">
                        <a class="btn btn-light btn-light-outline-0 mb-2" href="#"><em class="fas fa-eye"></em></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.4s">
                <div class="team-item">
                    <div class="team-img">
                        <div class="team-img-main">
                            <img src="{{asset('assets/user/img/Groomsmen-1.png')}}" class="img-fluid w-100" alt="Maratha Vivah Mandal, Dombivli">
                        </div>
                    </div>
                    <div class="team-content">
                        <div class="d-flex flex-column p-4">
                            <h3 class="text-white display-6 mb-1">Groom Name</h3>
                            <h4 class="h6 text-white fs-5 mb-0">Location</h4>
                        </div>
                    </div>
                    <div class="team-social d-flex flex-column">
                        <a class="btn btn-light btn-light-outline-0 mb-2" href="#"><em class="fas fa-eye"></em></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.6s">
                <div class="team-item">
                    <div class="team-img">
                        <div class="team-img-main">
                            <img src="{{asset('assets/user/img/Groomsmen-1.png')}}" class="img-fluid w-100" alt="Maratha Vivah Mandal, Dombivli">
                        </div>
                    </div>
                    <div class="team-content">
                        <div class="d-flex flex-column p-4">
                            <h3 class="text-white display-6 mb-1">Groom Name</h3>
                            <h4 class="h6 text-white fs-5 mb-0">Location</h4>
                        </div>
                    </div>
                    <div class="team-social d-flex flex-column">
                        <a class="btn btn-light btn-light-outline-0 mb-2" href="#"><em class="fas fa-eye"></em></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.8s">
                <div class="team-item">
                    <div class="team-img">
                        <div class="team-img-main">
                            <img src="{{asset('assets/user/img/Groomsmen-1.png')}}" class="img-fluid w-100" alt="Maratha Vivah Mandal, Dombivli">
                        </div>
                    </div>
                    <div class="team-content">
                        <div class="d-flex flex-column p-4">
                            <h3 class="text-white display-6 mb-1">Groom Name</h3>
                            <h4 class="h6 text-white fs-5 mb-0">Location</h4>
                        </div>
                    </div>
                    <div class="team-social d-flex flex-column">
                        <a class="btn btn-light btn-light-outline-0 mb-2" href="#"><em class="fas fa-eye"></em></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bridesmaids & Groomsmen End -->




<!-- Gallery Start -->
<div class="container-fluid gallery position-relative py-5" id="weddingGallery">
   
    <div class="container position-relative py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
            <h2 class="display-2 text-dark">Happy Couples</h2>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                <div class="gallery-item">
                    <div class="gallery-img">
                        <img class="img-fluid w-100" src="{{asset('assets/user/img/gallery-1.jpg')}}" alt="Maratha Vivah Mandal, Dombivli">
                        <div class="hover-style"></div>
                        <div class="search-icon">
                            <a href="{{asset('assets/user/img/gallery-1.jpg')}}" data-lightbox="Gallery-1" class="my-auto"><i class="fas fa-plus btn-primary btn-primary-outline-0 p-3"></i></a>
                        </div>
                    </div>
                    <div class="gallery-overlay bg-light border-secondary border-top-0 p-4" style="border-style: double;">
                        <h3 class="h5">Bride Vs Groom</h3>
                        <p class="text-dark mb-0">Weding Date</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.4s">
                <div class="gallery-item">
                    <div class="gallery-img">
                        <img class="img-fluid w-100" src="{{asset('assets/user/img/gallery-1.jpg')}}" alt="Maratha Vivah Mandal, Dombivli">
                        <div class="hover-style"></div>
                        <div class="search-icon">
                            <a href="{{asset('assets/user/img/gallery-1.jpg')}}" data-lightbox="Gallery-1" class="my-auto"><i class="fas fa-plus btn-primary btn-primary-outline-0 p-3"></i></a>
                        </div>
                    </div>
                    <div class="gallery-overlay bg-light border-secondary border-top-0 p-4" style="border-style: double;">
                        <h3 class="h5">Bride Vs Groom</h3>
                        <p class="text-dark mb-0">Weding Date</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.6s">
                <div class="gallery-item">
                    <div class="gallery-img">
                        <img class="img-fluid w-100" src="{{asset('assets/user/img/gallery-1.jpg')}}" alt="Maratha Vivah Mandal, Dombivli">
                        <div class="hover-style"></div>
                        <div class="search-icon">
                            <a href="{{asset('assets/user/img/gallery-1.jpg')}}" data-lightbox="Gallery-1" class="my-auto"><i class="fas fa-plus btn-primary btn-primary-outline-0 p-3"></i></a>
                        </div>
                    </div>
                    <div class="gallery-overlay bg-light border-secondary border-top-0 p-4" style="border-style: double;">
                        <h3 class="h5">Bride Vs Groom</h3>
                        <p class="text-dark mb-0">Weding Date</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.8s">
                <div class="gallery-item">
                    <div class="gallery-img">
                        <img class="img-fluid w-100" src="{{asset('assets/user/img/gallery-1.jpg')}}" alt="Maratha Vivah Mandal, Dombivli">
                        <div class="hover-style"></div>
                        <div class="search-icon">
                            <a href="{{asset('assets/user/img/gallery-1.jpg')}}" data-lightbox="Gallery-1" class="my-auto"><i class="fas fa-plus btn-primary btn-primary-outline-0 p-3"></i></a>
                        </div>
                    </div>
                    <div class="gallery-overlay bg-light border-secondary border-top-0 p-4" style="border-style: double;">
                        <h3 class="h5">Bride Vs Groom</h3>
                        <p class="text-dark mb-0">Weding Date</p>
                    </div>
                </div>
            </div>
            
            <div class="col-12 text-center wow fadeIn" data-wow-delay="0.2s">
                <a class="btn btn-primary btn-primary-outline-0 py-3 px-5 me-2 mt-4" href="#">View All <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- Gallery end -->
 --}}

   
   </x-layout.user>
