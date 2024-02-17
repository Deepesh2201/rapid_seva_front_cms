@extends('layouts.main')
@section('main-section')
    <section class="osahan-main-body osahan-signin-main">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center vh-100">
                <div class="landing-page shadow-sm bg-success col-lg-6">
                    <a class="position-absolute btn-sm btn btn-outline-light m-4 zindex" href="/">Skip <i
                            class="icofont-bubble-right"></i></a>
                    <div class="osahan-slider m-0">
                        @foreach ($banners as $banner)
                            
                        <div class="osahan-slider-item text-center">
                            <div class="d-flex align-items-center justify-content-center vh-100 flex-column">
                                <div class="py-3 osahan-promos">
                                      <img src="{{$backendurl.$banner->img}}"
                                                     class="img-fluid mx-auto rounded" alt="Responsive image"></a>
                                       
                                       
                                 </div>
                            </div>
                        </div>
                        
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-6 pl-lg-5">
                    <div class="osahan-signin shadow-sm bg-white p-4 rounded">
                        <div class="p-3">
                            <h2 class="my-0">Welcome Back</h2>
                            <p class="small mb-4">Sign in to Continue.</p>
                            <form action="{{ route('loggedin') }}" method="post">
                                @csrf
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
                                <button type="submit" class="btn btn-success btn-lg rounded btn-block">Sign
                                    in</button>
                            </form>
                            
                            <p class="text-muted text-center small m-0 py-3">or</p>
                            <a href="#" class="btn btn-dark btn-block rounded btn-lg btn-apple">
                                <i class="icofont-brand-apple mr-2"></i> Sign up with Apple
                            </a>
                            <a href="#"
                                class="btn btn-light border btn-block rounded btn-lg btn-google">
                                <i class="icofont-google-plus text-danger mr-2"></i> Sign up with Google
                            </a>
                            <p class="text-center mt-3 mb-0"><a href="{{url('signup')}}" class="text-dark">Don't have an
                                    account? Sign up</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   @endsection