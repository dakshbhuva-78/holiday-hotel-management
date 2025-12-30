<html>

<head>
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/bootstrap.css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/fontawesome-free-6.5.2-web/css/all.css">
    <script src="{{ URL::to('/') }}/js/bootstrap.js"></script>
    <style>

    </style>
    <!-- <style>

        /* Fixed sidenav, full height */
        .sidenav {
        height: 100%;
        width: 250px;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        overflow-x: hidden;
        padding-top: 28px;
        }

        /* Style the sidenav links and the dropdown button */
        .sidenav a, .dropdown-btn {
        padding: 6px 8px 6px 16px;
        text-decoration: none;
        color: black;
        display: block;
        border: none;
        background: none;
        width: 100%;
        text-align: left;
        cursor: pointer;
        outline: none;
        }

        /* On mouse-over */
        .sidenav a:hover, .dropdown-btn:hover {
        background-color: #3D3D3D;
        color:white;
        }

        /* Add an active class to the active dropdown button */
        .active {
        background-color: #3D3D3D;
        color: white;
        }

        /* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
        .dropdown-container {
        display: none;
        padding-left: 8px;
        }

        /* Optional: Style the caret down icon */
        .fa-caret-down {
        float: right;
        padding-right: 8px;
        }

        /* Some media queries for responsiveness */
        @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
        }
    </style> -->
</head>
<!-- <body>
        <div class="container-fluid bg-dark text-light p-3 d-flex align-items-center justify-content-between sticky-top" >
            <h4 class="mt-2 text-light">ADMIN PANEL</h4>
            <a href="{{ URL::to('/') }}/AdminProfile" class="text-white"><i class="fa-solid fa-user fa-2xl"></i></a>
        </div>
        <div class="row">
            <div class="col-lg-2">
                <div class="sidenav mt-5 shadow-lg">
                    <a class="mt-3" href="{{ URL::to('/') }}/AdminDashboard" style="font-size: 20px;">Dashboard</a>
                    <button class="dropdown-btn mt-3" style="font-size: 20px;">Rooms 
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-container shadow-lg" style="font-size: 18px;">
                        <a href="{{ URL::to('/') }}/r_add">ADD</a>
                        <a href="{{ URL::to('/') }}/r_delete">Delete</a>
                        <a href="{{ URL::to('/') }}/r_update">Update</a>
                    </div>
                    <button class="dropdown-btn mt-3" style="font-size: 20px;">Carousel 
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-container shadow-lg" style="font-size: 18px;">
                        <a href="{{ URL::to('/') }}/c_add">ADD</a>
                        <a href="{{ URL::to('/') }}/c_delete">Delete</a>
                        <a href="{{ URL::to('/') }}/c_update">Update</a>
                    </div>
                    <button class="dropdown-btn mt-3" style="font-size: 20px;">Data Tables 
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-container shadow-lg" style="font-size: 18px;">
                        <a href="{{ URL::to('/') }}/r_data">Rooms</a>
                        <a href="{{ URL::to('/') }}/c_data">Carousel</a>
                        <a href="#"></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-10">
                <div class="main">
                    @yield('dynamic_content')
                </div>
            </div>
        </div>
        <script>
            /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
            var dropdown = document.getElementsByClassName("dropdown-btn");
            var i;

            for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var dropdownContent = this.nextElementSibling;
                if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
                } else {
                dropdownContent.style.display = "block";
                }
            });
            }
        </script>
    </body> -->
<!-- <body>
        <div class="container-fluid bg-dark text-light p-3 d-flex align-items-center justify-content-between sticky-top" >
            <h4 class="mt-2 text-light">ADMIN PANEL</h4>
            <a href="{{ URL::to('/') }}/AdminProfile" class="text-white"><i class="fa-solid fa-user fa-2xl"></i></a>
        </div>
        <div class="container-fluid">
            <div class="row flex-nowrap">        
                <div class="bg-dark col-auto col-md-4 col-lg-3 min-vh-100 d-flex flex-column justify-content-between">
                    <div class="bg-dark p-2">
                        <a href="" class="d-flex text-decoration-none mt-1 align-items-center text-white">
                            <i class="fs-5 fa fa-guage"></i><span class="fs-4 d-none d-sm-inline">SideMenu</span>
                        </a>
                        <ul class="nav nav-pills flex-column mt-4">
                            <li class="nav-item py-2 py-sm-0">
                                <a href="" class="nav-link  text-white">
                                    <i class="fs-5 fa fa-gauge"></i><span class="fs-4 ms-3 d-none d-sm-inline">Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-item py-2 py-sm-0">
                                <a href="" class="nav-link  text-white">
                                    <i class="fs-5 fa fa-house"></i><span class="fs-4 ms-3 d-none d-sm-inline">Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-item py-2 py-sm-0">
                                <a href="" class="nav-link  text-white">
                                    <i class="fs-5 fa fa-table-list"></i><span class="fs-4 ms-3 d-none d-sm-inline">Dashboard</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </body> -->

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap ">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-white shadow-lg">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="/"
                        class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                        <span class="d-none d-sm-inline me-5 fw-bold fs-3 h-font">HOLIDAY</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                        id="menu">
                        <li class="nav-item mb-3">
                            <a href="{{ URL::to('/') }}/AdminDashboard" class="nav-link align-middle px-0">
                                <i class="fa-solid fa-house fa-2xl text-dark"></i> <span
                                    class="ms-1 h4 d-none d-sm-inline text-dark">Home</span>
                            </a>
                        </li>
                        <li class="nav-item mb-3">
                            <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <i class="fa-solid fa-bed fa-2xl text-dark"></i> <span
                                    class="ms-1 h4 d-none d-sm-inline text-dark">Rooms</span> </a>
                            <ul class="collapse  nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="{{ URL::to('/') }}/r_add" class="nav-link px-0 text-white"> <i
                                            class=" mt-3 fa-solid fa-plus fa-lg text-dark"></i> <span
                                            class="d-none d-sm-inline h6 text-dark">Add Rooms</span> </a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('/') }}/r_delete" class="nav-link px-0 text-white"> <i
                                            class="mt-3 fa-solid fa-trash fa-lg text-dark"></i> <span
                                            class="d-none d-sm-inline h6 text-dark">Delete Rooms</span></a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('/') }}/r_data" class="nav-link px-0 text-white"> <i 
                                            class="mt-3 fa-solid fa-bed fa-xl text-dark"></i> <span
                                            class="d-none d-sm-inline h6 text-dark">Rooms Data</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item mb-3">
                            <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <i class="fa-solid fa-images fa-2xl text-dark"></i> <span
                                    class="ms-1 h4 d-none d-sm-inline text-dark">Carousel</span> </a>
                            <ul class="collapse  nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="{{ URL::to('/') }}/c_add" class="nav-link px-0 text-white"> <i
                                            class=" mt-3 fa-solid fa-plus fa-lg text-dark"></i> <span
                                            class="d-none d-sm-inline h6 text-dark">Add Carousel</span> </a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('/') }}/c_delete" class="nav-link px-0 text-white"> <i
                                            class="mt-3 fa-solid fa-trash fa-lg text-dark"></i> <span
                                            class="d-none d-sm-inline h6 text-dark">Delete Carousel</span></a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('/') }}/c_data" class="nav-link px-0 text-white"> <i 
                                            class="mt-3 fa-solid fa-images fa-lg text-dark"></i> <span
                                            class="d-none d-sm-inline h6 text-dark">Carousel Data</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item mb-3">
                            <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <i class="fa-solid fa-info fa-2xl text-dark"></i> <span
                                    class="ms-1 h4 d-none d-sm-inline text-dark">About Us</span> </a>
                            <ul class="collapse  nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                                <li>
                                    <a href="{{ URL::to('/') }}/a_add" class="nav-link px-0 text-white"> <i
                                            class=" mt-3 fa-solid fa-plus fa-lg text-dark"></i> <span
                                            class="d-none d-sm-inline h6 text-dark">Add AboutUs Content</span></a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('/') }}/a_delete" class="nav-link px-0 text-white"> <i
                                            class="mt-3 fa-solid fa-trash fa-lg text-dark"></i> <span
                                            class="d-none d-sm-inline h6 text-dark">Delete AboutUs Content</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item mb-3">
                            <a href="#submenu4" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <i class="fa-solid fa-phone fa-2xl text-dark"></i> <span
                                    class="ms-1 h4 d-none d-sm-inline text-dark">Contact Us</span> </a>
                            <ul class="collapse nav flex-column ms-1" id="submenu4" data-bs-parent="#menu">
                            <li>
                                    <a href="{{ URL::to('/') }}/con_messages" class="nav-link px-0 text-white"><i 
                                        class="mt-3 fa-regular fa-message fa-lg text-dark"></i> <span
                                            class="d-none d-sm-inline h6 text-dark">Contact Us Messeges</span></a>
                                </li>    
                            <!-- <li>
                                    <a href="{{ URL::to('/') }}/con_add" class="nav-link px-0 text-white"> <i
                                            class=" mt-3 fa-solid fa-plus fa-lg text-dark"></i> <span
                                            class="d-none d-sm-inline h6 text-dark">Add ContactUs Content</span></a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('/') }}/con_delete" class="nav-link px-0 text-white"> <i
                                            class="mt-3 fa-solid fa-trash fa-lg text-dark"></i> <span
                                            class="d-none d-sm-inline h6 text-dark">Delete ContactUs Content</span></a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('/') }}/con_update" class="nav-link px-0 text-white"> <i 
                                            class="mt-3 fa-solid fa-pen fa-lg text-dark"></i> <span
                                            class="d-none d-sm-inline h6 text-dark">Update ContactUs Content</span></a>
                                </li> -->
                            </ul>
                        </li>
                        <li class="nav-item mb-3">
                            <a href="#submenu5" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <i class="fa-solid fa-users fa-2xl text-dark"></i> <span
                                    class="ms-1 h4 d-none d-sm-inline text-dark">Users</span> </a>
                            <ul class="collapse nav flex-column ms-1" id="submenu5" data-bs-parent="#menu">    
                                <li>
                                    <a href="{{ URL::to('/') }}/registered" class="nav-link px-0 text-white"> <i 
                                            class="mt-3 fa-solid fa-registered fa-lg text-dark"></i> <span 
                                            class="d-none d-sm-inline h6 text-dark">Registered</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item mb-3">
                            <a href="#submenu6" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <i class="fa-solid fa-hotel fa-2xl text-dark"></i> <span
                                    class="ms-1 h4 d-none d-sm-inline text-dark">Bookings</span> </a>
                            <ul class="collapse nav flex-column ms-1" id="submenu6" data-bs-parent="#menu">    
                                <li>
                                    <a href="{{ URL::to('/') }}/history" class="nav-link px-0 text-white"> <i 
                                            class="mt-3 fas fa-history fa-lg text-dark"></i> <span 
                                            class="d-none d-sm-inline h6 text-dark">History</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item mb-3">
                            <a href="#submenu7" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <i class="fa-solid fa-star-half-stroke fa-2xl text-dark"></i> <span
                                    class="ms-1 h4 d-none d-sm-inline text-dark">Feedback</span> </a>
                            <ul class="collapse nav flex-column ms-1" id="submenu7" data-bs-parent="#menu">    
                                <li>
                                    <a href="{{ URL::to('/') }}/users_feedback" class="nav-link px-0 text-white"> <i 
                                        class="fa-solid fa-star-half-stroke fa-lg text-dark"></i> <span 
                                            class="d-none d-sm-inline h6 text-dark">Feedback</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item mb-3">
                            <a href="#submenu8" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                    <i class="fa-solid fa-tags fa-2xl text-dark"></i> <span
                                    class="ms-1 h4 d-none d-sm-inline text-dark">Offers</span> </a>
                            <ul class="collapse nav flex-column ms-1" id="submenu8" data-bs-parent="#menu">    
                                <li>
                                    <a href="{{ URL::to('/') }}/add_offers" class="nav-link px-0 text-white"> <i
                                        class=" mt-3 fa-solid fa-plus fa-lg text-dark"></i> <span 
                                            class="d-none d-sm-inline h6 text-dark">Add Offers</span></a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('/') }}/all_offers" class="nav-link px-0 text-white"> <i 
                                            class="fa-solid fa-tags fa-lg text-dark"></i> <span 
                                            class="d-none d-sm-inline h6 text-dark">All Offers</span></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col py-3">
                <div class="container-fluid bg-dark text-light p-3 d-flex align-items-center justify-content-between sticky-top" >
                    <h4 class="mt-2 text-light">ADMIN PANEL</h4>
                    <a href="{{ URL::to('/') }}/AdminProfile" class="text-white"><i class="fa-solid fa-user fa-2xl"></i></a>
                </div>
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert" id="flash-message-success">
                        <strong>Success!</strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="flash-message-error">
                        <strong>Error!!!</strong> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @yield('dynamic_content')
            </div>
        </div>
    </div>
    <script>
        // Auto-hide success flash message after 5 seconds (5000 milliseconds)
        setTimeout(function() {
            let successMessage = document.getElementById('flash-message-success');
            if (successMessage) {
                successMessage.classList.remove('show'); // Remove Bootstrap's 'show' class to hide the message
            }
        }, 5000); // Adjust time as needed

        // Auto-hide error flash message after 5 seconds (5000 milliseconds)
        setTimeout(function() {
            let errorMessage = document.getElementById('flash-message-error');
            if (errorMessage) {
                errorMessage.classList.remove('show'); // Remove Bootstrap's 'show' class to hide the message
            }
        }, 5000); // Adjust time as needed
    </script>
</body>

</html>