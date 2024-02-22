<nav id="main-nav">
    
    <ul class="second-nav">
        @if (session('user'))
        <li><p>Hi {{session('user')->name}}</p></li>
        @else
        <li><p>Hi Guest</p></li>
        @endif
        <li><a href="/"><i class="icofont-smart-phone mr-2"></i> Home</a></li>
        <li><a href="{{url('categories')}}"><i class="icofont-smart-phone mr-2"></i> Category</a></li>
        <li><a href="#"><i class="icofont-smart-phone mr-2"></i> Trending Deals</a></li>
        <li><a href="#"><i class="icofont-smart-phone mr-2"></i> Popular Deals</a></li>
        <li><a href="#"><i class="icofont-smart-phone mr-2"></i> Help & Support</a></li>
        <li><a href="https://play.google.com/store/apps/details?id=com.shinewell.rsuser"><i class="icofont-smart-phone mr-2"></i> Customer App</a></li>
        <li><a href="https://play.google.com/store/apps/details?id=com.shinewell.rapidsevapartner.retrofit&pcampaignid=web_share"><i class="icofont-smart-phone mr-2"></i> Partner App</a></li>
        @if (session('user'))
        <li><a href="{{url('logout')}}"><i class="icofont-smart-phone mr-2"></i> Logout</a></li>
        @else
        <li><a href="{{url('login')}}"><i class="icofont-login mr-2"></i> Sign In</a></li>
        <li><a href="{{url('signup')}}"><i class="icofont-login mr-2"></i> Register</a></li>
        @endif
        
        
        
        
       
        
    </ul>
    <ul class="bottom-nav">
        <li class="email">
            <a class="text-success" href="/">
                <p class="h5 m-0"><i class="icofont-home text-success"></i></p>
                Home
            </a>
        </li>
        <li class="github">
            <a href="/cart">
                <p class="h5 m-0"><i class="icofont-cart"></i></p>
                CART
            </a>
        </li>
        <li class="ko-fi">
            <a href="tel:+918092222323">
                <p class="h5 m-0"><i class="icofont-headphone"></i></p>
                Help
            </a>
        </li>
    </ul>
</nav>

<footer class="section-footer border-top bg-white">
    <section class="footer-top py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                    <form>
                        <div class="input-group">
                            <input type="text" placeholder="Email" class="form-control" name>
                            <span class="input-group-append">
                                <button type="submit" class="btn btn-success"> Subscribe</button>
                            </span>
                        </div>
                    </form>
                </div>
                <div class="col-md-4 text-md-right">
                    <a href="https://www.facebook.com/rapidsevaa" class="btn btn-icon btn-light"><i class="icofont-facebook"></i></a>
                    <a href="#" class="btn btn-icon btn-light"><i class="icofont-twitter"></i></a>
                    <a href="#" class="btn btn-icon btn-light"><i class="icofont-instagram"></i></a>
                    <a href="#" class="btn btn-icon btn-light"><i class="icofont-youtube"></i></a>
                </div>
            </div>

        </div>

    </section>

    <section class="footer-main border-top pt-5 pb-4">
        <div class="container">
            <div class="row">
                <aside class="col-md">
                    <h6 class="title">Services</h6>
                    <ul class="list-unstyled list-padding">
                        <li> <a href="{{url('categories')}}" class="text-dark">Category</a></li>
                        <li> <a href="{{url('categories')}}" class="text-dark">Lists</a></li>
                        <li> <a href="{{url('categories')}}" class="text-dark">Trending</a></li>
                        <li> <a href="{{url('categories')}}" class="text-dark">Recommended</a></li>
                        <li> <a href="{{url('categories')}}" class="text-dark">Most Popular</a></li>
                    </ul>
                </aside>
                <aside class="col-md">
                    <h6 class="title">Contact Details</h6>
                    <ul class="list-unstyled list-padding">
                        <li> <a href="tel:+918092222323" class="text-dark">Call :+91 809 222 2323</a></li>
                        <li> <a href="tel:+918092222323" class="text-dark">WhatsApp :+91 809 222 2323</a></li>
                        <li> <a href="mailto:rapidseva8@gmail.com" class="text-dark">Email : rapidseva8@gmail.com</a></li>
                        <li> <a class="text-dark">Address : Patna, Bihar </a></li>
                    </ul>
                </aside>
                {{-- <aside class="col-md">
                    <h6 class="title">My Order</h6>
                    <ul class="list-unstyled list-padding">
                        <li> <a href="my_order.html" class="text-dark">My order</a></li>
                        <li> <a href="status_complete.html" class="text-dark">Status Complete</a></li>
                        <li> <a href="status_onprocess.html" class="text-dark">Status on Process</a></li>
                        <li> <a href="status_canceled.html" class="text-dark">Status Canceled</a></li>
                        <li> <a href="review.html" class="text-dark">Review</a></li>
                    </ul>
                </aside> --}}
                {{-- <aside class="col-md">
                    <h6 class="title">My Account</h6>
                    <ul class="list-unstyled list-padding">
                        <li> <a class="text-dark" href="my_account.html"> My account</a></li>
                        <li> <a class="text-dark" href="promos.html"> Promos</a></li>
                        <li> <a class="text-dark" href="my_address.html"> My address</a></li>
                        <li> <a class="text-dark" href="terms_conditions.html"> Terms &amp; conditions</a></li>
                        <li> <a class="text-dark" href="help_support.html"> Help &amp; support</a></li>
                        <li> <a class="text-dark" href="help_ticket.html"> Help ticket</a></li>
                        <li> <a class="text-dark" href="signin.html"> Logout</a></li>
                    </ul>
                </aside> --}}
                <aside class="col-md">
                    <h6 class="title">Quick Links</h6>
                    <ul class="list-unstyled list-padding">
                        <li><a href="{{url('privacypolicy')}}" class="text-dark"> Privacy Policy </a></li>
                        <li><a href="{{url('termsandconditions')}}" class="text-dark"> Terms & Conditions </a></li>
                        <li><a href="{{url('refundpolicy')}}" class="text-dark"> Refund Policy </a></li>
                        <li><a href="#" class="text-dark"> FAQ </a></li>
                        <li><a href="{{url('login')}}" class="text-dark"> Sign In </a></li>
                    </ul>
                </aside>
            </div>

        </div>

    </section>

    <section class="footer-bottom border-top py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <span class="pr-2">© 2024 Rapid Seva</span>
                    <span class="pr-2"><a href="{{url('privacypolicy')}}" class="text-dark">Privacy</a></span>
                    <span class="pr-2"><a href="{{url('termsandconditions')}}" class="text-dark">Terms &
                            Conditions</a></span>
                </div>
                <div class="col-md-3 text-md-right">
                    <span class="pr-2"><a href="#" class="text-dark">Designed & Developed By : <a href="https://shinewell.in" target="_blank">Shine Well</a></span>
                </div>
                <div class="col-md-3 text-md-right">
                    <a href="https://play.google.com/store/apps/details?id=com.shinewell.rsuser"><img src="{{url('img/playmarket.png')}}" height="30"></a>
                    <a href="https://play.google.com/store/apps/details?id=com.shinewell.rapidsevapartner.retrofit&pcampaignid=web_share"><img src="{{url('img/playmarket.png')}}" height="30"></a>
                </div>
            </div>

        </div>

    </section>
    <div class="modal fade right-modal" id="login" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header p-0">
                    <nav class="schedule w-100">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-link active col-5 py-4" id="nav-home-tab" data-toggle="tab"
                                href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
                                <p class="mb-0 font-weight-bold">Sign in</p>
                            </a>
                            <a class="nav-link col-5 py-4" id="nav-profile-tab" data-toggle="tab"
                                href="#nav-profile" role="tab" aria-controls="nav-profile"
                                aria-selected="false">
                                <p class="mb-0 font-weight-bold">Sign up</p>
                            </a>
                            <a class="nav-link col-2 p-0 d-flex align-items-center justify-content-center"
                                data-dismiss="modal" aria-label="Close">
                                <h1 class="m-0 h4 text-dark"><i class="icofont-close-line"></i></h1>
                            </a>
                        </div>
                    </nav>
                </div>
                <div class="modal-body p-0">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <div class="osahan-signin p-4 rounded">
                                <div class="p-2">
                                    <h2 class="my-0">Welcome Back</h2>
                                    <p class="small mb-4">Sign in to Continue.</p>
                                    <form action="https://askbootstrap.com/preview/grofarweb/verification.html">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <input placeholder="Enter Email" type="email" class="form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input placeholder="Enter Password" type="password" class="form-control"
                                                id="exampleInputPassword1">
                                        </div>
                                        <button type="submit" class="btn btn-success btn-lg rounded btn-block">Sign
                                            in</button>
                                    </form>
                                    <p class="text-muted text-center small m-0 py-3">or</p>
                                    <a href="verification.html"
                                        class="btn btn-dark btn-block rounded btn-lg btn-apple">
                                        <i class="icofont-brand-apple mr-2"></i> Sign up with Apple
                                    </a>
                                    <a href="verification.html"
                                        class="btn btn-light border btn-block rounded btn-lg btn-google">
                                        <i class="icofont-google-plus text-danger mr-2"></i> Sign up with Google
                                    </a>
                                    <p class="text-center mt-3 mb-0"><a href="signup.html" class="text-dark">Don't
                                            have an account? Sign up</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                            aria-labelledby="nav-profile-tab">
                            <div class="osahan-signup bg-white p-4">
                                <div class="p-2">
                                    <h2 class="my-0">Let's get started</h2>
                                    <p class="small mb-4">Create account to see our top picks for you!</p>
                                    <form action="{{ route('register') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputName1">Name</label>
                                            <input placeholder="Enter Full Name" type="text" class="form-control @error('fullname') is-invalid @enderror"
                                                id="fullname" name="fullname" aria-describedby="emailHelp">
                                            @error('fullname')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputNumber1">Phone Number</label>
                                            <input placeholder="Enter Phone Number" type="number"
                                                class="form-control @error('mobile') is-invalid @enderror" id="mobile" name="mobile"
                                                aria-describedby="emailHelp">
                                            @error('mobile')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <input placeholder="Enter Email" type="email" class="form-control @error('email') is-invalid @enderror"
                                                id="email" name="email" aria-describedby="emailHelp">
                                            @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input placeholder="Enter Password" type="password" class="form-control @error('password') is-invalid @enderror"
                                                id="password" name="password">
                                            @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword2">Confirmation Password</label>
                                            <input placeholder="Enter Confirmation Password" type="password"
                                                class="form-control @error('password_confirmation') is-invalid @enderror" id="confirmpassword" name="password_confirmation">
                                            @error('password_confirmation')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-success rounded btn-lg btn-block">Create
                                            Account</button>
                                    </form>
                                    
                                    <p class="text-muted text-center small py-2 m-0">or</p>
                                    <a href="verification.html"
                                        class="btn btn-dark btn-block rounded btn-lg btn-apple">
                                        <i class="icofont-brand-apple mr-2"></i> Sign up with Apple
                                    </a>
                                    <a href="verification.html"
                                        class="btn btn-light border btn-block rounded btn-lg btn-google">
                                        <i class="icofont-google-plus text-danger mr-2"></i> Sign up with Google
                                    </a>
                                    <p class="text-center mt-3 mb-0"><a href="signin.html" class="text-dark">Already
                                            have an account! Sign in</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer p-0 border-0">
                    <div class="col-6 m-0 p-0">
                        <a href="#" class="btn border-top border-right btn-lg btn-block"
                            data-dismiss="modal">Close</a>
                    </div>
                    <div class="col-6 m-0 p-0">
                        <a href="help_support.html" class="btn border-top btn-lg btn-block">Help</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="modal fade right-modal" id="login" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header p-0">
                <nav class="schedule w-100">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-link active col-5 py-4" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                            role="tab" aria-controls="nav-home" aria-selected="true">
                            <p class="mb-0 font-weight-bold">Sign in</p>
                        </a>
                        <a class="nav-link col-5 py-4" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                            role="tab" aria-controls="nav-profile" aria-selected="false">
                            <p class="mb-0 font-weight-bold">Sign up</p>
                        </a>
                        <a class="nav-link col-2 p-0 d-flex align-items-center justify-content-center"
                            data-dismiss="modal" aria-label="Close">
                            <h1 class="m-0 h4 text-dark"><i class="icofont-close-line"></i></h1>
                        </a>
                    </div>
                </nav>
            </div>
            <div class="modal-body p-0">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                        aria-labelledby="nav-home-tab">
                        <div class="osahan-signin p-4 rounded">
                            <div class="p-2">
                                <h2 class="my-0">Welcome Back</h2>
                                <p class="small mb-4">Sign in to Continue.</p>
                                <form action="https://askbootstrap.com/preview/grofarweb/verification.html">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input placeholder="Enter Email" type="email" class="form-control"
                                            id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input placeholder="Enter Password" type="password" class="form-control"
                                            id="exampleInputPassword1">
                                    </div>
                                    <button type="submit" class="btn btn-success btn-lg rounded btn-block">Sign
                                        in</button>
                                </form>
                                <p class="text-muted text-center small m-0 py-3">or</p>
                                <a href="verification.html" class="btn btn-dark btn-block rounded btn-lg btn-apple">
                                    <i class="icofont-brand-apple mr-2"></i> Sign up with Apple
                                </a>
                                <a href="verification.html"
                                    class="btn btn-light border btn-block rounded btn-lg btn-google">
                                    <i class="icofont-google-plus text-danger mr-2"></i> Sign up with Google
                                </a>
                                <p class="text-center mt-3 mb-0"><a href="signup.html" class="text-dark">Don't have
                                        an account? Sign up</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="osahan-signup bg-white p-4">
                            <div class="p-2">
                                <h2 class="my-0">Let's get started</h2>
                                <p class="small mb-4">Create account to see our top picks for you!</p>
                                <form action="https://askbootstrap.com/preview/grofarweb/verification.html">
                                    <div class="form-group">
                                        <label for="exampleInputName1">Name</label>
                                        <input placeholder="Enter Name" type="text" class="form-control"
                                            id="exampleInputName1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputNumber1">Phone Number</label>
                                        <input placeholder="Enter Phone Number" type="number"
                                            class="form-control" id="exampleInputNumber1"
                                            aria-describedby="emailHelp">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input placeholder="Enter Email" type="email" class="form-control"
                                            id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input placeholder="Enter Password" type="password" class="form-control"
                                            id="exampleInputPassword1">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword2">Confirmation Password</label>
                                        <input placeholder="Enter Confirmation Password" type="password"
                                            class="form-control" id="exampleInputPassword2">
                                    </div>
                                    <button type="submit" class="btn btn-success rounded btn-lg btn-block">Create
                                        Account</button>
                                </form>
                                <p class="text-muted text-center small py-2 m-0">or</p>
                                <a href="verification.html" class="btn btn-dark btn-block rounded btn-lg btn-apple">
                                    <i class="icofont-brand-apple mr-2"></i> Sign up with Apple
                                </a>
                                <a href="verification.html"
                                    class="btn btn-light border btn-block rounded btn-lg btn-google">
                                    <i class="icofont-google-plus text-danger mr-2"></i> Sign up with Google
                                </a>
                                <p class="text-center mt-3 mb-0"><a href="signin.html" class="text-dark">Already
                                        have an account! Sign in</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer p-0 border-0">
                <div class="col-6 m-0 p-0">
                    <a href="#" class="btn border-top border-right btn-lg btn-block"
                        data-dismiss="modal">Close</a>
                </div>
                <div class="col-6 m-0 p-0">
                    <a href="help_support.html" class="btn border-top btn-lg btn-block">Help</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{url('vendor/jquery/jquery.min.js')}}" type="ffb9166e87b0cbd838d29fa0-text/javascript"></script>
<script src="{{url('vendor/bootstrap/js/bootstrap.bundle.min.js')}}" type="ffb9166e87b0cbd838d29fa0-text/javascript"></script>

<script type="ffb9166e87b0cbd838d29fa0-text/javascript" src="{{url('vendor/slick/slick.min.js')}}"></script>

<script type="ffb9166e87b0cbd838d29fa0-text/javascript" src="{{url('vendor/sidebar/hc-offcanvas-nav.js')}}"></script>

<script src="{{url('js/osahan.js')}}" type="ffb9166e87b0cbd838d29fa0-text/javascript"></script>
<script src="{{url('js/rocket-loader.min.js')}}" data-cf-settings="ffb9166e87b0cbd838d29fa0-|49" defer></script>
<script defer src="{{url('https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317')}}"
    integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA=="
    data-cf-beacon='{"rayId":"856059bb1d609a09","version":"2024.2.0","r":1,"token":"dd471ab1978346bbb991feaa79e6ce5c","b":1}'
    crossorigin="anonymous"></script>
</body>

</html>
