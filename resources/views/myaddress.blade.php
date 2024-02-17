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
                    <div class="osahan-my_address">
                        <h4 class="mb-4 profile-title">My Addresses</h4>
                        @foreach ($addresses as $address)
                            
                        <div class="custom-control custom-radio px-0 mb-3 position-relative border-custom-radio">
                            <input type="radio" id="customRadioInline1" name="customRadioInline1"
                                class="custom-control-input" checked />
                            <label class="custom-control-label w-100" for="customRadioInline1">
                                <div>
                                    <div class="p-3 bg-white rounded shadow-sm w-100">
                                        <div class="d-flex align-items-center mb-2">
                                            <p class="mb-0 h6">{{$address->type}}</p>
                                            <p class="mb-0 badge badge-success ml-auto">
                                                Default
                                            </p>
                                        </div>
                                        <p class="small text-muted m-0">House No.: {{$address->houseno}}</p>
                                        <p class="small text-muted m-0">Address : {{$address->address}}</p>
                                        <p class="small text-muted m-0">Pincode : {{$address->pincode}}</p>
                                        <p class="small text-muted m-0">Landmark : {{$address->landmark}}</p>
                                        {{-- <p class="pt-2 m-0 text-right">
                                            <span class="small"><a href="#" data-toggle="modal"
                                                    data-target="#exampleModal" class="text-decoration-none text-success"><i
                                                        class="icofont-edit"></i>
                                                    Edit</a></span>
                                            <span class="small ml-3"><a href="#" data-toggle="modal"
                                                    data-target="#Delete" class="text-decoration-none text-danger"><i
                                                        class="icofont-trash"></i>
                                                    Delete</a></span>
                                        </p> --}}
                                    </div>
                                </div>
                            </label>
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
