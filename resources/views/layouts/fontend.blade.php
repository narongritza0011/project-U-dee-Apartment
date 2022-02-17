<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- SEO Meta Tags -->
    <meta name="description" content="Your description">
    <meta name="author" content="Your name">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on Facebook, Twitter, LinkedIn -->
    <meta property="og:site_name" content="" /> <!-- website name -->
    <meta property="og:site" content="" /> <!-- website link -->
    <meta property="og:title" content="" /> <!-- title shown in the actual shared post -->
    <meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
    <meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
    <meta property="og:url" content="" /> <!-- where do you want your post to link to -->
    <meta name="twitter:card" content="summary_large_image"> <!-- to have large image post format in Twitter -->

    <!-- Webpage Title -->
    <title>U-dee Apartment</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&display=swap"
        rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@100&display=swap" rel="stylesheet">



    <link rel="stylesheet" href="{{ asset('fontend-assets/css/bootstrap.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('fontend-assets/css/fontawesome-all.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('fontend-assets/css/swiper.css') }}" />
    <link rel="stylesheet" href="{{ asset('fontend-assets/css/styles.css') }}" />

    <!-- Favicon  -->
    <link rel="icon" href="images/favicon.png">

    <link rel="icon" href="{{ asset('fontend-assets/images/favicon.png') }}" />

</head>

<body>

    <!-- Navigation -->
    <nav id="navbar" class="navbar navbar-expand-lg fixed-top navbar-light" aria-label="Main navigation">
        <div class="container">

            <!-- Image Logo -->
            <a class="navbar-brand logo-image" href="index.html"><img
                    src="{{ asset('fontend-assets/images/logo.svg ') }}"" alt=" alternative"></a>

            <!-- Text Logo - Use this if you don't have a graphic logo -->
            <!-- <a class="navbar-brand logo-text" href="index.html">Yavin</a> -->

            <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ms-auto navbar-nav-scroll">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/#header') }}">หน้าหลัก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=" {{ url('/#details') }}">ห้องพัก</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/#projects') }}">ข่าวสาร</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/#contact') }}">ติดต่อ</a>
                    </li>

                </ul>



                @if (Route::has('login'))
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                        @auth
                            <a href="{{ route('admin.dashboard') }}" class="btn-outline-sm">บัญชีของฉัน</a>
                        @else
                            <a href="{{ route('login') }}" class="btn-outline-sm">เข้าสู่ระบบ
                            </a>


                        @endauth
                    </div>
                @endif

            </div> <!-- end of navbar-collapse -->
        </div> <!-- end of container -->
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->


    @yield('header')

    @yield('introduction')



    @yield('room')



    @yield('projects')




    @yield('contact')


    <!-- Footer -->
    <div class="footer bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-col first third">
                        @foreach ($contacts as $contact)
                            <h6>เกี่ยวกับ</h6>
                            <p class="p-small">{{ $contact->about }}</p>

                            <span class="fa-stack">
                                <a href="{{ $contact->facebook_link }}" target="_blank">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-facebook-f fa-stack-1x"></i>
                                </a>
                            </span>


                            <span class="fa-stack">
                                <a href="{{ $contact->ig_link }}" target="_blank">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-instagram fa-stack-1x"></i>
                                </a>
                            </span>
                    </div> <!-- end of footer-col -->
                    <div class="footer-col second">
                        <h6>ช่องท่างติดต่อ</h6>
                        <ul class="list-unstyled li-space-lg p-small">
                            <p class="p-small">เบอร์ติดต่อ: {{ $contact->tel }}</p>
                            <p class="p-small">อีเมล์: {{ $contact->email }}</p>
                            <p class="p-small">facebook: {{ $contact->facebook_name }}</p>

                        </ul>
                    </div> <!-- end of footer-col -->
                    <div class="footer-col third">
                        <h6>เเผนที่</h6>

                        <iframe src="{{ $contact->map }}" width="300" height="300" style="border:0;"
                            allowfullscreen="" loading="lazy">
                        </iframe>




                    </div> <!-- end of footer-col -->
                    @endforeach
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of footer -->
    <!-- end of footer -->


    <!-- Copyright -->
    <div class="copyright bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="p-small">Copyright © Udee Apartment</p>
                </div> <!-- end of col -->
            </div> <!-- enf of row -->

            <div class="row">
                <div class="col-lg-12">
                    <p class="p-small">Distributed By <a href="https://themewagon.com/">Udee-apartment</a></p>
                </div> <!-- end of col -->
            </div> <!-- enf of row -->
        </div> <!-- end of container -->
    </div> <!-- end of copyright -->
    <!-- end of copyright -->


    <!-- Back To Top Button -->
    <button onclick="topFunction()" id="myBtn">

        <img src="{{ asset('fontend-assets/images/up-arrow.png') }}" alt="alternative">

    </button>
    <!-- end of back to top button -->

    <!-- Scripts -->


    <script src="{{ asset('fontend-assets/js/bootstrap.min.js') }}"></script>

    <!-- Bootstrap framework -->
    <script src="{{ asset('fontend-assets/js/swiper.min.js') }}"></script>

    <!-- Swiper for image and text sliders -->
    <script src="{{ asset('fontend-assets/js/purecounter.min.js') }}"></script>

    <!-- Purecounter counter for statistics numbers -->
    <script src="{{ asset('fontend-assets/js/scripts.js') }}"></script>
    <!-- Custom scripts -->
</body>

</html>
