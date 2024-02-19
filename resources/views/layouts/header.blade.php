<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content>
    <meta name="author" content>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ url('img/logo.png') }}">
    <title>Rapid Seva - On Demand Service</title>

    <link rel="stylesheet" type="text/css" href="{{ url('vendor/slick/slick.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('vendor/slick/slick-theme.min.css') }}" />

    <link href="{{ url('vendor/icons/icofont.min.css') }}"rel="stylesheet" type="text/css">

    <link href="{{ url('vendor/bootstrap/css/bootstrap.min.css') }}"rel="stylesheet">

    <link href="{{ url('css/style.css') }}"rel="stylesheet">

    <link href="{{ url('vendor/sidebar/demo.css') }}"rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".qtyplus").click(function(e) {
                e.preventDefault();
                var fieldName = $(this).attr("field");
                var currentVal = parseInt($("input[name=" + fieldName + "]").val());
                if (!isNaN(currentVal)) {
                    $("input[name=" + fieldName + "]").val(currentVal + 1);
                } else {
                    $("input[name=" + fieldName + "]").val(1);
                }
            });
    
            $(".qtyminus").click(function(e) {
                e.preventDefault();
                var fieldName = $(this).attr("field");
                var currentVal = parseInt($("input[name=" + fieldName + "]").val());
                if (!isNaN(currentVal) && currentVal > 1) {
                    $("input[name=" + fieldName + "]").val(currentVal - 1);
                } else {
                    $("input[name=" + fieldName + "]").val(1);
                }
            });
        });
    </script>
    

</head>

<body class="fixed-bottom-padding">
    <div class="border-bottom p-3 d-none mobile-nav">
        <div class="title d-flex align-items-center">
            <a href="{{ url('/') }}"class="text-decoration-none text-dark d-flex align-items-center">
                <img class="osahan-logo mr-2" src="https://backend.rapidseva.com/assets/img/logo%20(4).png">

            </a>
            <p class="ml-auto m-0">
                <a href="{{ url('#') }}"
                    class="text-decoration-none bg-white p-1 rounded shadow-sm d-flex align-items-center">
                    <i class="text-dark icofont-sale-discount"></i>
                    <span class="badge badge-danger p-1 ml-1 small">20%</span>
                </a>
            </p>
            <a class="toggle ml-3" href="{{ url('#') }}"><i class="icofont-navigation-menu"></i></a>
        </div>
        <a href="{{ url('search.html') }}" class="text-decoration-none">
            <div class="input-group mt-3 rounded shadow-sm overflow-hidden bg-white">
                <div class="input-group-prepend">
                    <button class="border-0 btn btn-outline-secondary text-success bg-white"><i
                            class="icofont-search"></i></button>
                </div>
                <input type="text" class="shadow-none border-0 form-control pl-0" placeholder="Search for Products.."
                    aria-label aria-describedby="basic-addon1">
            </div>
        </a>
    </div>
{{-- 
    <div class="theme-switch-wrapper">
        <label class="theme-switch" for="checkbox">
            <input type="checkbox" id="checkbox" />
            <div class="slider round"></div>
            <i class="icofont-moon"></i>
        </label>
        <em>Enable Dark Mode!</em>
    </div> --}}


    <div class="bg-white shadow-sm osahan-main-nav">
        <nav class="navbar navbar-expand-lg navbar-light bg-white osahan-header py-0 container">
            <a class="navbar-brand mr-0" href="{{ url('/') }}"><img
                    class="img-fluid logo-img rounded-pill border shadow-sm"
                    src="https://backend.rapidseva.com/assets/img/logo%20(4).png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="ml-3 d-flex align-items-center">
                <div class="dropdown mr-3">
                    <a class="text-dark dropdown-toggle d-flex align-items-center osahan-location-drop" href="#"
                        id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <div><i
                                class="icofont-location-pin d-flex align-items-center bg-light rounded-pill p-2 icofont-size border shadow-sm mr-2"></i>
                        </div>
                        <div>
                            <p class="text-muted mb-0 small">Select Location</p>
                            Patna Bihar...
                        </div>
                    </a>
                    <div class="dropdown-menu osahan-select-loaction p-3" aria-labelledby="navbarDropdown">
                        <span>Select your city</span>
                        <form class="form-inline my-2">

                            <div class="input-group p-0 col-lg-12">
                                <input type="text" class="form-control form-control-sm"
                                    id="inlineFormInputGroupUsername2" placeholder="Search Location">
                                <div class="input-group-prepend">
                                    <div class="btn btn-success rounded-right btn-sm"><i
                                            class="icofont-location-arrow"></i> Detect</div>
                                </div>
                            </div>
                        </form>
                        <div class="city pt-2">
                            <h6>Top Cities</h6>
                            <p class="border-bottom m-0 py-1"><a href="{{ url('#') }}" class="text-dark">Patna
                                    Bihar</a></p>
                        </div>
                    </div>
                </div>

                <div class="input-group mr-sm-2 col-lg-12">
                    <input type="text" class="form-control" id="inlineFormInputGroupUsername2"
                        placeholder="Search for Products..">
                    <div class="input-group-prepend">
                        <div class="btn btn-warning rounded-right"><i class="icofont-search"></i></div>
                    </div>
                </div>
            </div>
            <div class="ml-auto d-flex align-items-center">

                

                <div class="dropdown mr-3">
                    <a href="#" class="dropdown-toggle text-dark" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{-- <img src="img/user.png" class="img-fluid rounded-circle header-user mr-2" /> --}}
                        @if (session('user'))
                            Hi {{ session('user')->name }}
                        @else
                            Hi guest
                        @endif

                    </a>
                    @if (session('user'))
                    <div class="dropdown-menu dropdown-menu-right top-profile-drop"
                        aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{url('myaccount')}}">My account</a>
                        {{-- <a class="dropdown-item" href="promos.html">Promos</a> --}}
                        <a class="dropdown-item" href="{{url('myaddress')}}">My address</a>
                        {{-- <a class="dropdown-item" href="terms_conditions.html">Terms & conditions</a> --}}
                        <a class="dropdown-item" href="{{url('helpsupport')}}">Help & support</a>
                        <a class="dropdown-item" href="{{url('logout')}}">Logout</a>
                    </div>
                
                    @else
                    
                    <div class="dropdown-menu dropdown-menu-right top-profile-drop"
                    aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{url('login')}}">Login</a>
                    <a class="dropdown-item" href="{{url('signup')}}">Register</a>
                </div>
            
                    @endif
                </div>
                
                {{-- <a href="{{ url('#') }}" data-toggle="modal" data-target="#login"
                    class="mr-2 text-dark bg-light rounded-pill p-2 icofont-size border shadow-sm">
                    <i class="icofont-login"></i>
                </a> --}}
                {{-- <div class="dropdown">
                    <a href="{{url('#')}}" class="text-dark dropdown-toggle not-drop" id="dropdownMenuNotification"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i
                            class="icofont-notification d-flex align-items-center bg-light rounded-pill p-2 icofont-size border shadow-sm">

                        </i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right p-0 osahan-notifications-main"
                        aria-labelledby="dropdownMenuNotification">

                        <div class="osahan-notifications bg-white border-bottom p-2">
                            <div class="position-absolute ml-n1 py-2"><i
                                    class="icofont-check-circled text-white bg-success rounded-pill p-1"></i></div>
                            <a href="{{url('status_complete.html')}}" class="text-decoration-none text-dark">
                                <div class="notifiction small">
                                    <div class="ml-3">
                                        <p class="font-weight-bold mb-1">Yay! Order Complete</p>
                                        <p class="small m-0"><i class="icofont-ui-calendar"></i> Today, 05:14 AM</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                </div> --}}

                <a href="{{url('cart')}}" class="ml-2 text-dark bg-light rounded-pill p-2 icofont-size border shadow-sm position-relative">
                    <i class="icofont-shopping-cart"></i>
                    @if(session('cart'))
                        <span class="badge badge-dark rounded-circle position-absolute" style="top: -8px; right: -8px;">{{ count(session('cart')) }}</span>
                    @endif
                </a>
                
            </div>
        </nav>

        <div class="bg-color-head">
            <div class="container menu-bar d-flex align-items-center">
                <ul class="list-unstyled form-inline mb-0">
                    <li class="nav-item active">
                        <a class="nav-link text-white pl-0" href="{{ url('/') }}">Home <span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link text-white pl-0" href="{{ url('/categories') }}">Categories</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link text-white pl-0" href="{{ url('helpsupport') }}">Help & Support</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link text-white pl-0" href="#">Customer App</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link text-white pl-0" href="#">Partner App</a>
                    </li>
                    
                  
                </ul>
                <div class="list-unstyled form-inline mb-0 ml-auto">
                    <a href="#" class="text-white px-3 py-2">Trending</a>
                    <a href="#" class="text-white bg-offer px-3 py-2"><i
                            class="icofont-sale-discount h6"></i>Promos</a>
                </div>
            </div>
        </div>
    </div>

    <nav aria-label="breadcrumb" class="breadcrumb mb-0 d-none">
        <div class="container">
            <ol class="d-flex align-items-center mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{ url('#') }}" class="text-success">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"></li>
            </ol>
        </div>
    </nav>
