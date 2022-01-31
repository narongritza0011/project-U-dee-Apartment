<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>U-dee Apartment</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendors/iconly/bold.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/choices.js/choices.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('toastr/toastr.min.css') }}" />






    <link rel="stylesheet" href="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon">

</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">

                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html"><img src="{{ asset('assets/images/logo/logo.png') }}" alt="Logo"
                                    srcset=""></a>
                        </div>


                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">

                    <ul class="menu">
                        <li class="sidebar-title">เมนู </li>

                        <li class="sidebar-item  {{ request()->is('admin/dashboard*') ? 'active' : '' }}">
                            <a href="{{ route('admin.dashboard') }}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>หน้าหลัก</span>
                            </a>
                        </li>

                        <li class="sidebar-item  {{ request()->is('admin/admin*') ? 'active' : '' }}">
                            <a href="{{ route('admin.admin') }}" class='sidebar-link'>
                                <i class="bi bi-person-badge-fill"></i>
                                <span>ผู้ดูเเลระบบ</span>
                            </a>
                        </li>
                        <li class="sidebar-item  {{ request()->is('admin/member*') ? 'active' : '' }}">
                            <a href="{{ route('admin.member') }}" class='sidebar-link'>
                                <i class="bi bi-person-lines-fill"></i>
                                <span>สมาชิก</span>
                            </a>
                        </li>

                        <!-- sidebar-item has-sub {{ request()->is('admin*') ? ' active' : '' }} -->
                        <li class="sidebar-item has-sub  {{ request()->is('admin/all/*') ? 'active' : '' }}">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-house-door-fill"></i>
                                <span>ห้องพัก</span>
                            </a>
                            <ul class="submenu {{ request()->is('admin/all/*') ? 'active' : '' }}">




                                <li class="submenu-item {{ request()->is('admin/all/room_type') ? 'active' : '' }}">
                                    <a href="{{ route('admin.room_type') }}">ประเภทห้องพัก</a>
                                </li>
                                <li class="submenu-item {{ request()->is('admin/all/room') ? 'active' : '' }} ">
                                    <a href="{{ route('admin.room') }}">ห้องพัก</a>
                                </li>
                                <li class="submenu-item {{ request()->is('admin/all/elect_water') ? 'active' : '' }} ">
                                    <a href="{{ route('admin.elect_water') }}">ค่าน้ำ&ค่าไฟ</a>
                                </li>
                            </ul>
                        </li>


                        <li class="sidebar-item  {{ request()->is('admin/slide*') ? 'active' : '' }}">
                            <a href="{{ route('admin.slide') }}" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>สไลด์</span>
                            </a>
                        </li>
                        </li>
                        <li class="sidebar-item  {{ request()->is('admin/new*') ? 'active' : '' }}">
                            <a href="{{ route('admin.new') }}" class='sidebar-link'>
                                <i class="bi bi-chat-left-text"></i>
                                <span>ข่าวสาร</span>
                            </a>
                        </li>
                        </li>
                        <li class="sidebar-item  {{ request()->is('admin/contact*') ? 'active' : '' }}">
                            <a href="{{ route('admin.contact') }}" class='sidebar-link'>
                                <i class="bi bi-envelope-fill"></i>
                                <span>เกี่ยวกับ</span>
                            </a>
                        </li>
                        </li>
                        <li class="sidebar-item  {{ request()->is('admin/location*') ? 'active' : '' }}">
                            <a href="{{ route('admin.location') }}" class='sidebar-link'>
                                <i class="bi bi-map-fill"></i>
                                <span>เเผนที่</span>
                            </a>
                        </li>

                        <li class="sidebar-item  {{ request()->is('admin/profile*') ? 'active' : '' }}">
                            <a href="{{ route('admin.profile') }}" class='sidebar-link'>
                                <i class="bi bi-person"></i>
                                <span>บัญชีของฉัน</span>
                            </a>
                        </li>
                        <li class="sidebar-item  {{ request()->is('admin/settings*') ? 'active' : '' }}">
                            <a href="{{ route('admin.settings') }}" class='sidebar-link'>
                                <i class="bi bi-gear-fill"></i>
                                <span>ตั้งค่า</span>
                            </a>
                        </li>

                        <li class="sidebar-item ">

                            <a href="{{ route('logout') }}" class='sidebar-link' onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>ออกจากระบบ</span>
                            </a>
                        </li>



                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>



                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>


            <div class="page-content">

                @yield('content')

            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; dew</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="http://ahmadsaugi.com"> dew</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets/vendors/apexcharts/apexcharts.js') }}"></script>


    <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>


    <script src="{{ asset('assets/vendors/simple-datatables/simple-datatables.js') }}"></script>



    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

    <script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>




    <!-- <script src="{{ asset('assets/js/extensions/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/vendors/sweetalert2/sweetalert2.all.min.js') }}"></script> -->




    <script src="{{ asset('assets/vendors/choices.js/choices.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    @yield('script')
</body>

</html>
