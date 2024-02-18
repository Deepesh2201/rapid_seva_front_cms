@extends('layouts.main')
@section('main-section')
    <section class="py-4 osahan-main-body">
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            {{-- @if (session('cart'))

    <p>Cart Items:</p>

    <ul>

        @foreach (session('cart') as $item)

        <p>qwqw</p>

            <li>{{ $item['name'] }} - {{ $item['price'] }} Qty : {{ $item['quantity'] }}</li>

            <!-- Add more fields as needed -->

        @endforeach

    </ul>

@else

    <p>No items in the cart</p>

@endif --}}


            <div class="row">
                <div class="col-lg-6">
                    <div class="recommend-slider mb-3">
                        <div class="osahan-slider-item">
                            <img src="{{ $backendurl . $servicedetails->img }}" class="img-fluid mx-auto shadow-sm rounded"
                                alt="Responsive image" />
                        </div>

                    </div>
                    <div class="pd-f d-flex align-items-center mb-3">
                        <a href="{{ route('addtocart', $servicedetails->id) }}"
                            class="btn btn-warning p-3 rounded btn-block d-flex align-items-center justify-content-center mr-3 btn-lg">
                            <i class="icofont-plus m-0 mr-2"></i> ADD TO CART
                        </a>

                        <a href="{{ route('buynow', $servicedetails->id) }}"
                            class="btn btn-success p-3 rounded btn-block d-flex align-items-center justify-content-center btn-lg m-0"><i
                                class="icofont-cart m-0 mr-2"></i> BUY
                            NOW</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="p-4 bg-white rounded shadow-sm">
                        <div class="pt-0">
                            <h2 class="font-weight-bold">
                                {{ $servicedetails->title }}
                            </h2>
                            <p class="font-weight-light text-dark m-0 d-flex align-items-center">
                                Offer Price :
                                <b
                                    class="h6 text-dark m-0">₹{{ $servicedetails->price - ($servicedetails->price * $servicedetails->discount) / 100 }}</b>
                                <span class="badge badge-danger ml-2">{{ $servicedetails->discount }}% OFF</span>
                            </p>
                            <a href="#">
                                <div class="rating-wrap d-flex align-items-center mt-2">
                                    <ul class="rating-stars list-unstyled">
                                        <li>
                                            <i class="icofont-star text-warning"></i>
                                            <i class="icofont-star text-warning"></i>
                                            <i class="icofont-star text-warning"></i>
                                            <i class="icofont-star text-warning"></i>
                                            <i class="icofont-star"></i>
                                        </li>
                                    </ul>
                                    <p class="label-rating text-muted ml-2 small">
                                        (245 Reviews)
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="pt-2">
                            <div class="row">
                                <div class="col-6">
                                    <p class="font-weight-bold m-0">
                                        Service Time
                                    </p>
                                    <p class="text-muted m-0">{{ $servicedetails->ttken }} min</p>
                                </div>

                            </div>
                        </div>
                        <div class="details">
                            {{-- <div class="pt-3 bg-white">
                                <div class="d-flex align-items-center">

                                    <a class="ml-auto" href="#">
                                        <form id="addToCartForm" class="cart-items-number d-flex" method="POST" action="{{ route('addtocart', $servicedetails->id) }}">
                                            @csrf
                                            <input type="hidden" name="quantity" id="quantity" value="1">
                                            <!-- Hidden field to store the quantity -->
                                            <input type="button" value="-" class="qtyminus btn btn-success btn-sm"
                                                field="quantity" />
                                            <input type="text" name="quantity" value="1" class="qty form-control" />
                                            <input type="button" value="+" class="qtyplus btn btn-success btn-sm"
                                                field="quantity" />
                                            
                                        </form>

                                    </a>
                                </div>
                            </div> --}}
                            <div class="pt-3">

                                <p class="font-weight-bold mb-2">
                                    Service Details
                                </p>
                                <p class="text-muted small mb-0">{!! $servicedetails->sdesc !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
