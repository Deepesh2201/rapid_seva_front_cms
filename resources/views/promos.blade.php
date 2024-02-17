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
                    <div class="osahan-promos">
                        <h4 class="mb-4 profile-title">Avaiable Promos</h4>
                        @foreach ($coupons as $coupon)
                            
                        <div class="pb-3">
                            <a  class="text-decoration-none text-white">
                                <div class="rounded bg-danger shadow-sm p-3 text-white">
                                    <div class="row align-items-center">
                                        <div class="col-9">
                                            <div class="d-flex align-items-center">
                                                <img class="pp-osahan-logo" src="img/logo.png">
                                                <div class="brand ml-2">
                                                    <h5 class="m-0">{{$coupon->coupon_title}}</h5>
                                                </div>
                                            </div>
                                            <div class="mt-2 mb-3">
                                                <p class="text-white m-0">Get {{$coupon->disc_per}}% Off upto ₹{{$coupon->max_disc}} | Offer Valid till {{ \Carbon\Carbon::parse($coupon->end_date)->format('d-m-Y') }}</p>
                                            </div>
                                            
                                            <a class="btn btn-light btn-sm"><i
                                                    class="icofont-sale-discount"></i> {{$coupon->disc_per}}% OFF</a>
                                        </div>
                                        <div class="col-3 text-center">
                                            <a href="#" class="btn btn-light btn-sm copy-coupon-btn">{{ $coupon->coupon_code }} <img src="{{ url('img/duplicate-alt.svg') }}" width="15px"></a>
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const copyCouponBtns = document.querySelectorAll('.copy-coupon-btn');
            copyCouponBtns.forEach(function(btn) {
                btn.addEventListener('click', function(event) {
                    event.preventDefault();
                    const couponCode = this.textContent.trim();
                    copyToClipboard(couponCode);
                });
            });
    
            function copyToClipboard(text) {
                navigator.clipboard.writeText(text)
                    .then(() => {
                        alert('Coupon code copied to clipboard: ' + text);
                    })
                    .catch(err => {
                        console.error('Failed to copy coupon code: ', err);
                    });
            }
        });
    </script>
    
    
@endsection
