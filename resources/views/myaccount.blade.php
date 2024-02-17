@extends('layouts.main')
@section('main-section')
    <?php
    use Carbon\Carbon;
    ?>
    <section class="py-4 osahan-main-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                    <div class="osahan-account bg-white rounded shadow-sm overflow-hidden">
                        <div class="p-4 profile text-center border-bottom">
                            <img src="img/user.png" class="img-fluid rounded-pill">
                            <h6 class="font-weight-bold m-0 mt-2">{{ session('user')->name }}</h6>
                            <p class="small text-muted m-0">
                                Member Since: {{ Carbon::parse(session('user')->rdate)->format('d/m/Y') }}
                            </p>
                        </div>
                        <div class="account-sections">
                            

                            <ul class="list-group">
                                <a href="{{ url('myaccount') }}" class="text-decoration-none text-dark">
                                    <li class="border-bottom bg-white d-flex align-items-center p-3">
                                        <i class="icofont-user osahan-icofont bg-danger"></i>My Account
                                        <span class="badge badge-success p-1 badge-pill ml-auto"><i
                                                class="icofont-simple-right"></i></span>
                                    </li>
                                </a>
                                <a href="{{ url('promos') }}" class="text-decoration-none text-dark">
                                    <li class="border-bottom bg-white d-flex align-items-center p-3">
                                        <i class="icofont-sale-discount osahan-icofont bg-success"></i>Promos
                                        <span class="badge badge-success p-1 badge-pill ml-auto"><i
                                                class="icofont-simple-right"></i></span>
                                    </li>
                                </a>
                                <a href="{{ url('myaddress') }}" class="text-decoration-none text-dark">
                                    <li class="border-bottom bg-white d-flex align-items-center p-3">
                                        <i class="icofont-address-book osahan-icofont bg-dark"></i>My Address
                                        <span class="badge badge-success p-1 badge-pill ml-auto"><i
                                                class="icofont-simple-right"></i></span>
                                    </li>
                                </a>
                                <a href="{{ url('termsandconditions') }}" class="text-decoration-none text-dark">
                                    <li class="border-bottom bg-white d-flex align-items-center p-3">
                                        <i class="icofont-info-circle osahan-icofont bg-primary"></i>Terms, Privacy &
                                        Policy
                                        <span class="badge badge-success p-1 badge-pill ml-auto"><i
                                                class="icofont-simple-right"></i></span>
                                    </li>
                                </a>
                                <a href="{{ url('helpsupport') }}" class="text-decoration-none text-dark">
                                    <li class="border-bottom bg-white d-flex align-items-center p-3">
                                        <i class="icofont-phone osahan-icofont bg-warning"></i>Help & Support
                                        <span class="badge badge-success p-1 badge-pill ml-auto"><i
                                                class="icofont-simple-right"></i></span>
                                    </li>
                                </a>

                                <a href="{{ url('logout') }}" class="text-decoration-none text-dark">
                                    <li class="border-bottom bg-white d-flex  align-items-center p-3">
                                        <i class="icofont-lock osahan-icofont bg-danger"></i> Logout
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 p-4 bg-white rounded shadow-sm">
                    <h4 class="mb-4 profile-title">My account</h4>
                    <div id="edit_profile">
                        <div class="p-0">
                            <form action="{{ route('register') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputName1">Full Name</label>
                                    <input type="hidden" id="userid" name="userid" value="{{ session('user')->id }}">
                                    <input type="text" class="form-control" id="fullname" name="fullname"
                                        value="{{ session('user')->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputNumber1">Mobile Number</label>
                                    <input type="number" class="form-control" id="mobile" name="mobile" disabled
                                        value="{{ session('user')->mobile }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" disabled
                                        value="{{ session('user')->email }}">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success btn-block btn-lg">Save
                                        Changes</button>
                                </div>
                            </form>
                        </div>
                        <div class="additional mt-3">
                            <div class="change_password mb-1">
                                <a href="change_password.html"
                                    class="p-3 btn-light border btn d-flex align-items-center">Change Password
                                    <i class="icofont-rounded-right ml-auto"></i></a>
                            </div>
                            <div class="deactivate_account">
                                <a href="deactivate_account.html"
                                    class="p-3 btn-light border btn d-flex align-items-center">Deactivate Account
                                    <i class="icofont-rounded-right ml-auto"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
