<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/bootstrap.css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/fontawesome-free-6.5.2-web/css/all.css">
    <script src="{{ URL::to('/') }}/js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js" integrity="sha512-ZKNVEa7gi0Dz4Rq9jXcySgcPiK+5f01CqW+ZoKLLKr9VMXuCsw3RjWiv8ZpIOa0hxO79np7Ec8DDWALM0bDOaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script>
            $(document).ready(function(){
                $("#demo").waypoint(function(){
                    $("#demo").addClass(
                        "animate__animated animate__flash"
                    )
                },{offset:"20%"});
            });
            $(document).ready(function(){
                $("#rooms").hover(function(){
                    $("#rooms").addClass(
                        "animate__animated animate__flash"
                    )
                },{offset:"3%"});
            });
        </script>
</head>
<body>
    <nav id="nav-bar" class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="{{ URL::to('/') }}//">HOLIDAY</a>
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 h5">
                @if(!session()->has('u_name'))
                    <li class="nav-item "> 
                        <a class="nav-link me-2" href="{{ URL::to('/') }}//">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="{{ URL::to('/') }}/ContactUs">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="{{ URL::to('/') }}/About">About</a>
                    </li>
                @else
                    <li class="nav-item "> 
                        <a class="nav-link me-2" href="{{ URL::to('/') }}//">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="{{ URL::to('/') }}/rooms">Rooms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="{{ URL::to('/') }}/ContactUs">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="{{ URL::to('/') }}/About">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="{{ URL::to('/') }}/Mybookings">MyBookings</a>
                    </li>
                @endif
                </ul>
                @if(!session()->has('u_name'))
                    <div class="nav-item">
                        <form action="{{ URL::to('/') }}/search" method="GET" class="d-flex">
                            <input class="form-control me-2" type="search" name="query" placeholder="Features Or Facilities" aria-label="Search">
                            <button class="btn btn-outline-dark me-2" type="submit">Search</button>
                        </form>
                    </div>
                    <div class="nav-item h5">
                        <a class="nav-link me-2" href="{{ URL::to('/') }}/login">Login</a>
                    </div>
                    <div class="nav-item h5">
                        <a class="nav-link me-2" href="{{ URL::to('/') }}/register">Register</a>
                    </div>
                    
                @else
                    <div class="nav-item">
                        <form action="{{ URL::to('/') }}/search" method="GET" class="d-flex">
                            <input class="form-control me-2" type="search" name="query" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-dark me-2" type="submit">Search</button>
                        </form>
                    </div>
                    <div class="nav-item">
                        <a href="{{ URL::to('/') }}/Profile" class="text-dark"><i class="fa-solid fa-user fa-2xl"></i></a>
                    </div>
                    
                @endif
            </div>
        </div>
    </nav>
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
        <div class="col-md-12">
            @yield('dynamic_content')
        </div><br>
        <script>
            // Auto-hide success flash message after 5 seconds (5000 milliseconds)
            setTimeout(function() {
                let successMessage = document.getElementById('flash-message-success');
                if (successMessage) {
                    successMessage.classList.remove('show'); // Remove Bootstrap's 'show' class to hide the message
                }
            }, 2000); // Adjust time as needed

            // Auto-hide error flash message after 5 seconds (5000 milliseconds)
            setTimeout(function() {
                let errorMessage = document.getElementById('flash-message-error');
                if (errorMessage) {
                    errorMessage.classList.remove('show'); // Remove Bootstrap's 'show' class to hide the message
                }
            }, 2000);
        </script>
    <footer class="bg-dark text-white text-center py-3">   
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-lg-3 p-4">
                    <h3 class="h-font fw-bold fs-3 mb-2 ">Our Vision</h3>
                    <p>
                        Staying in a hotel epitomizes the pursuit of comfort, convenience, and care. It's a sanctuary away from the familiar, where plush bedding and well-appointed rooms await weary travelers. Yet, it's more than just a place to rest; it's a stage for hospitality to shine, where every interaction is imbued with warmth and professionalism !
                    </p>
                </div>
                <div class="col-lg-3 p-4">
                        <h5 class="mb-3 h3">Links</h5>
                        <a href="{{ URL::to('/') }}//" class="d-inline-block text-white mb-2 text-decoration-none">Home</a><br>
                        <a href="{{ URL::to('/') }}/rooms" class="d-inline-block mb-2 text-white text-decoration-none">Rooms</a><br>
                        <a href="{{ URL::to('/') }}/ContactUs" class="d-inline-block mb-2 text-white text-decoration-none">Contact Us</a><br>
                        <a href="{{ URL::to('/') }}/About" class="d-inline-block mb-2 text-white text-decoration-none">About</a>
                </div>
                <div class="col-lg-3 p-4">
                    <h5 class="mb-3 h3">Follow Us</h5>
                    <a href="" class="d-inline-block text-white mb-2 text-decoration-none h5"><i class="fa-brands fa-facebook-f"></i> Facebook</a><br>
                    <a href="" class="d-inline-block text-white mb-2 text-decoration-none h5"><i class="fa-brands fa-twitter"></i> Twitter</a><br>
                    <a href="" class="d-inline-block text-white mb-2 text-decoration-none h5"><i class="fa-brands fa-instagram"></i> Instagram</a><br>
                    <a href="" class="d-inline-block text-white mb-2 text-decoration-none h5"><i class="fa-solid fa-envelope"></i> E-mail</a><br>
                </div>
                <div class="col-lg-3 p-4">
                    <h5 class="mb-3 h3">Contact</h5>
                    <a href="tel: +91 77384826273" class="d-inline-block  text-decoration-none text-white">
                    <i class="fa-solid fa-phone"></i> +91 93166 02805
                    </a>
                    <a href="" class="d-inline-block  text-decoration-none text-white">
                    <i class="fa-solid fa-envelope"></i> smayariya973@rku.ac.in
                    </a>
                    <a href="" target="_blank" class="d-inline-block text-decoration-none text-white mb-2">
                    <i class="fa-solid fa-location-dot"></i> Mobor Beach , Cavelossim , Goa , 403731.
                    </a>
                </div>
            </div>
        </div>
        <h6 class="text-center bg-dark text-white p-3 m-0">Copyright &copy; 2024 HOLIDAY</h6>
    </footer>
</body>
</html>