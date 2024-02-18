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
            <div class="row">
                <div class="col-lg-8">
                    <div class="accordion" id="accordionExample">

                        <div class="card border-0 osahan-accor rounded shadow-sm overflow-hidden">
                            <div class="card-header bg-white border-0 p-0" id="headingOne">
                                <h2 class="mb-0">
                                    <button
                                        class="btn d-flex align-items-center bg-white btn-block text-left btn-lg h5 px-3 py-4 m-0"
                                        type="button" data-toggle="collapse" data-target="#collapseOne"
                                        aria-expanded="true" aria-controls="collapseOne">
                                        <span class="c-number">1</span> Cart
                                        ({{ session('cart') ? count(session('cart')) : '0' }} items)
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordionExample">
                                <div class="card-body p-0 border-top">
                                    <div class="osahan-cart">
                                        @php
                                            $price = 0;
                                            $subtotal = 0;
                                        @endphp
                                        @if (session('cart'))
                                            @foreach (session('cart') as $item)
                                                @php
                                                    $price += $item['price'];
                                                    $subtotal += ($item['price'] - ($item['price'] * $item['discount']) / 100) * 1;
                                                @endphp
                                                <div class="cart-items bg-white position-relative border-bottom">
                                                    <a href="{{ url('servicesdetails') }}/{{ $item['id'] }}"
                                                        class="position-absolute">
                                                        <span class="badge badge-danger m-3">{{ $item['discount'] }}%</span>
                                                    </a>
                                                    <div class="d-flex align-items-center p-3">
                                                        <a href="{{ url('servicesdetails') }}/{{ $item['id'] }}"><img
                                                                src="{{ $backendurl }}{{ $item['image'] }}"
                                                                class="img-fluid"></a>
                                                        <a href="{{ url('servicesdetails') }}/{{ $item['id'] }}"
                                                            class="ml-3 text-dark text-decoration-none w-100">
                                                            <h5 class="mb-1">{{ $item['name'] }}</h5>
                                                            <p class="text-muted mb-2"><del
                                                                    class="text-success mr-1">₹{{ $item['price'] }}</del>
                                                                ₹{{ $item['price'] - ($item['price'] * $item['discount']) / 100 }}
                                                            </p>
                                                            <div class="mt-3">
                                                                <p class="total_price font-weight-bold"><span
                                                                        class="alert alert-success">₹{{ $item['price'] - ($item['price'] * $item['discount']) / 100 }}</span>
                                                                </p>
                                                            </div>
                                                            <a href="{{ url('removecart') }}/{{ $item['id'] }}"><button
                                                                    type="button" class="float-right btn btn-danger btn-sm"
                                                                    field="quantity">Remove</button></a>
                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <p>No items in the cart</p>
                                        @endif
                                        <div>
                                            <a href="#" class="text-decoration-none btn btn-block p-3" type="button"
                                                data-toggle="collapse" data-target="#collapsetwo" aria-expanded="true"
                                                aria-controls="collapsetwo">
                                                <div
                                                    class="rounded shadow bg-success d-flex align-items-center p-3 text-white">
                                                    <div class="more">
                                                        <h6 class="m-0">Subtotal ₹{{ number_format($subtotal, 2) }}</h6>
                                                        <!-- Display subtotal with 2 decimal places -->
                                                        <p class="small m-0">Proceed to checkout</p>
                                                    </div>
                                                    <div class="ml-auto"><i class="icofont-simple-right"></i></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card border-0 osahan-accor rounded shadow-sm overflow-hidden mt-3">

                            <div class="card-header bg-white border-0 p-0" id="headingtwo">
                                <h2 class="mb-0">
                                    <button
                                        class="btn d-flex align-items-center bg-white btn-block text-left btn-lg h5 px-3 py-4 m-0"
                                        type="button" data-toggle="collapse" data-target="#collapsetwo"
                                        aria-expanded="true" aria-controls="collapsetwo">
                                        <span class="c-number">2</span> Service Address <a href="#" data-toggle="modal"
                                            data-target="#exampleModal" class="text-decoration-none text-success ml-auto">
                                            <i class="icofont-plus-circle mr-1"></i>Add New Delivery Address</a>
                                    </button>
                                </h2>
                            </div>

                            <div id="collapsetwo" class="collapse" aria-labelledby="headingtwo"
                                data-parent="#accordionExample">
                                <div class="card-body p-0 border-top">
                                    <div class="osahan-order_address">
                                        <div class="p-3 row">
                                            @foreach ($addresses as $address)
                                                
                                            <div
                                                class="custom-control col-lg-6 custom-radio mb-3 position-relative border-custom-radio">
                                                <input type="radio" id="customRadioInline1" name="customRadioInline1"
                                                    class="custom-control-input" checked>
                                                <label class="custom-control-label w-100" for="customRadioInline1">
                                                    <div>
                                                        <div class="p-3 bg-white rounded shadow-sm w-100">
                                                            <div class="d-flex align-items-center mb-2">
                                                                <input type="hidden" id="addressid" name="address" value="{{$address->id}}">
                                                                <p class="mb-0 h6">{{$address->type}}</p>
                                                                <p class="mb-0 badge badge-success ml-auto"><i
                                                                        class="icofont-check-circled"></i> Default</p>
                                                            </div>
                                                            <p class="small text-muted m-0">{{$address->address}}</p>
                                                            <p class="small text-muted m-0">Landmark : {{$address->landmark}}</p>
                                                            <p class="pt-2 m-0 text-right"><span class="small"><a
                                                                        href="#" data-toggle="modal"
                                                                        data-target="#exampleModal"
                                                                        class="text-decoration-none text-info">Edit</a></span>
                                                            </p>
                                                        </div>
                                                        <span class="btn btn-light border-top btn-lg btn-block">
                                                            Deliver Here
                                                        </span>
                                                    </div>
                                                </label>
                                            </div>
                                           @endforeach
                                            <a href="#" class="btn btn-success btn-lg btn-block mt-3"
                                                type="button" data-toggle="collapse" data-target="#collapsethree"
                                                aria-expanded="true" aria-controls="collapsethree">Continue</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card border-0 osahan-accor rounded shadow-sm overflow-hidden mt-3">

                            <div class="card-header bg-white border-0 p-0" id="headingthree">
                                <h2 class="mb-0">
                                    <button
                                        class="btn d-flex align-items-center bg-white btn-block text-left btn-lg h5 px-3 py-4 m-0"
                                        type="button" data-toggle="collapse" data-target="#collapsethree"
                                        aria-expanded="true" aria-controls="collapsethree">
                                        <span class="c-number">3</span> Delivery Time
                                    </button>
                                </h2>
                            </div>

                            <div id="collapsethree" class="collapse" aria-labelledby="headingthree"
                                data-parent="#accordionExample">
                                <div class="card-body p-0 border-top">
                                    <div class="osahan-order_address">
                                        <div class="text-center mb-4 py-4">
                                            <p class="display-2"><i class="icofont-ui-calendar text-success"></i></p>
                                            <p class="mb-1">Your Current Slot:</p>
                                            <h6 class="font-weight-bold text-dark">Tommorow, 6AM - 10AM</h6>
                                        </div>
                                        <div class="schedule">
                                            <ul class="nav nav-tabs justify-content-center nav-fill" id="myTab"
                                                role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link active text-dark" id="mon-tab" data-toggle="tab"
                                                        href="#mon" role="tab" aria-controls="mon"
                                                        aria-selected="true">
                                                        <p class="mb-0 font-weight-bold">MON</p>
                                                        <p class="mb-0">7 Sep</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link text-dark" id="tue-tab" data-toggle="tab"
                                                        href="#tue" role="tab" aria-controls="tue"
                                                        aria-selected="false">
                                                        <p class="mb-0 font-weight-bold">TUE</p>
                                                        <p class="mb-0">8 Sep</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link text-dark" id="wed-tab" data-toggle="tab"
                                                        href="#wed" role="tab" aria-controls="wed"
                                                        aria-selected="false">
                                                        <p class="mb-0 font-weight-bold">WED</p>
                                                        <p class="mb-0">9 Sep</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link text-dark" id="thu-tab" data-toggle="tab"
                                                        href="#thu" role="tab" aria-controls="thu"
                                                        aria-selected="false">
                                                        <p class="mb-0 font-weight-bold">THU</p>
                                                        <p class="mb-0">10 Sep</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link text-dark" id="fri-tab" data-toggle="tab"
                                                        href="#fri" role="tab" aria-controls="fri"
                                                        aria-selected="false">
                                                        <p class="mb-0 font-weight-bold">FRI</p>
                                                        <p class="mb-0">11 Sep</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link text-dark" id="sat-tab" data-toggle="tab"
                                                        href="#sat" role="tab" aria-controls="sat"
                                                        aria-selected="false">
                                                        <p class="mb-0 font-weight-bold">SAT</p>
                                                        <p class="mb-0">12 Sep</p>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="tab-content filter bg-white" id="myTabContent">
                                                <div class="tab-pane fade show active" id="mon" role="tabpanel"
                                                    aria-labelledby="mon-tab">
                                                    <div class="custom-control border-bottom px-0 custom-radio">
                                                        <input class="custom-control-input" type="radio"
                                                            name="exampleRadios" id="mon1" value="mon1" checked>
                                                        <label class="custom-control-label py-3 w-100 px-3"
                                                            for="mon1">
                                                            <i class="icofont-clock-time mr-2"></i> 6AM - 10AM
                                                        </label>
                                                    </div>
                                                    <div class="custom-control border-bottom px-0 custom-radio">
                                                        <input class="custom-control-input" type="radio"
                                                            name="exampleRadios" id="mon2" value="mon2">
                                                        <label class="custom-control-label py-3 w-100 px-3"
                                                            for="mon2">
                                                            <i class="icofont-clock-time mr-2"></i> 4PM - 6AM
                                                        </label>
                                                    </div>
                                                    <div class="custom-control border-bottom px-0 custom-radio">
                                                        <input class="custom-control-input" type="radio"
                                                            name="exampleRadios" id="mon3" value="mon3">
                                                        <label class="custom-control-label py-3 w-100 px-3"
                                                            for="mon3">
                                                            <i class="icofont-clock-time mr-2"></i> 6PM - 9PM
                                                        </label>
                                                    </div>
                                                    <div class="custom-control border-bottom px-0 custom-radio">
                                                        <input class="custom-control-input" type="radio"
                                                            name="exampleRadios" id="mon4" value="mon4">
                                                        <label class="custom-control-label py-3 w-100 px-3"
                                                            for="mon4">
                                                            <i class="icofont-clock-time mr-2"></i> 10AM - 1PM
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="tue" role="tabpanel"
                                                    aria-labelledby="tue-tab">
                                                    <div class="custom-control border-bottom px-0 custom-radio">
                                                        <input class="custom-control-input" type="radio"
                                                            name="exampleRadios" id="tue1" value="tue1" checked>
                                                        <label class="custom-control-label py-3 w-100 px-3"
                                                            for="tue1">
                                                            <i class="icofont-clock-time mr-2"></i> 6AM - 10AM
                                                        </label>
                                                    </div>
                                                    <div class="custom-control border-bottom px-0 custom-radio">
                                                        <input class="custom-control-input" type="radio"
                                                            name="exampleRadios" id="tue2" value="tue2">
                                                        <label class="custom-control-label py-3 w-100 px-3"
                                                            for="tue2">
                                                            <i class="icofont-clock-time mr-2"></i> 4PM - 6AM
                                                        </label>
                                                    </div>
                                                    <div class="custom-control border-bottom px-0 custom-radio">
                                                        <input class="custom-control-input" type="radio"
                                                            name="exampleRadios" id="tue3" value="tue3">
                                                        <label class="custom-control-label py-3 w-100 px-3"
                                                            for="tue3">
                                                            <i class="icofont-clock-time mr-2"></i> 6PM - 9PM
                                                        </label>
                                                    </div>
                                                    <div class="custom-control border-bottom px-0 custom-radio">
                                                        <input class="custom-control-input" type="radio"
                                                            name="exampleRadios" id="tue4" value="tue4">
                                                        <label class="custom-control-label py-3 w-100 px-3"
                                                            for="tue4">
                                                            <i class="icofont-clock-time mr-2"></i> 10AM - 1PM
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="wed" role="tabpanel"
                                                    aria-labelledby="wed-tab">
                                                    <div class="custom-control border-bottom px-0 custom-radio">
                                                        <input class="custom-control-input" type="radio"
                                                            name="exampleRadios" id="wed1" value="wed1" checked>
                                                        <label class="custom-control-label py-3 w-100 px-3"
                                                            for="wed1">
                                                            <i class="icofont-clock-time mr-2"></i> 6AM - 10AM
                                                        </label>
                                                    </div>
                                                    <div class="custom-control border-bottom px-0 custom-radio">
                                                        <input class="custom-control-input" type="radio"
                                                            name="exampleRadios" id="wed2" value="wed2">
                                                        <label class="custom-control-label py-3 w-100 px-3"
                                                            for="wed2">
                                                            <i class="icofont-clock-time mr-2"></i> 4PM - 6AM
                                                        </label>
                                                    </div>
                                                    <div class="custom-control border-bottom px-0 custom-radio">
                                                        <input class="custom-control-input" type="radio"
                                                            name="exampleRadios" id="wed3" value="wed3">
                                                        <label class="custom-control-label py-3 w-100 px-3"
                                                            for="wed3">
                                                            <i class="icofont-clock-time mr-2"></i> 6PM - 9PM
                                                        </label>
                                                    </div>
                                                    <div class="custom-control border-bottom px-0 custom-radio">
                                                        <input class="custom-control-input" type="radio"
                                                            name="exampleRadios" id="wed4" value="wed4">
                                                        <label class="custom-control-label py-3 w-100 px-3"
                                                            for="wed4">
                                                            <i class="icofont-clock-time mr-2"></i> 10AM - 1PM
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="thu" role="tabpanel"
                                                    aria-labelledby="thu-tab">
                                                    <div class="custom-control border-bottom px-0 custom-radio">
                                                        <input class="custom-control-input" type="radio"
                                                            name="exampleRadios" id="thu1" value="thu1" checked>
                                                        <label class="custom-control-label py-3 w-100 px-3"
                                                            for="thu1">
                                                            <i class="icofont-clock-time mr-2"></i> 6AM - 10AM
                                                        </label>
                                                    </div>
                                                    <div class="custom-control border-bottom px-0 custom-radio">
                                                        <input class="custom-control-input" type="radio"
                                                            name="exampleRadios" id="thu2" value="thu2">
                                                        <label class="custom-control-label py-3 w-100 px-3"
                                                            for="thu2">
                                                            <i class="icofont-clock-time mr-2"></i> 4PM - 6AM
                                                        </label>
                                                    </div>
                                                    <div class="custom-control border-bottom px-0 custom-radio">
                                                        <input class="custom-control-input" type="radio"
                                                            name="exampleRadios" id="thu3" value="thu3">
                                                        <label class="custom-control-label py-3 w-100 px-3"
                                                            for="thu3">
                                                            <i class="icofont-clock-time mr-2"></i> 6PM - 9PM
                                                        </label>
                                                    </div>
                                                    <div class="custom-control border-bottom px-0 custom-radio">
                                                        <input class="custom-control-input" type="radio"
                                                            name="exampleRadios" id="thu4" value="thu4">
                                                        <label class="custom-control-label py-3 w-100 px-3"
                                                            for="thu4">
                                                            <i class="icofont-clock-time mr-2"></i> 10AM - 1PM
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="fre" role="tabpanel"
                                                    aria-labelledby="fre-tab">
                                                    <div class="custom-control border-bottom px-0 custom-radio">
                                                        <input class="custom-control-input" type="radio"
                                                            name="exampleRadios" id="fri1" value="fri1" checked>
                                                        <label class="custom-control-label py-3 w-100 px-3"
                                                            for="fri1">
                                                            <i class="icofont-clock-time mr-2"></i> 6AM - 10AM
                                                        </label>
                                                    </div>
                                                    <div class="custom-control border-bottom px-0 custom-radio">
                                                        <input class="custom-control-input" type="radio"
                                                            name="exampleRadios" id="fri2" value="fri2">
                                                        <label class="custom-control-label py-3 w-100 px-3"
                                                            for="fri2">
                                                            <i class="icofont-clock-time mr-2"></i> 4PM - 6AM
                                                        </label>
                                                    </div>
                                                    <div class="custom-control border-bottom px-0 custom-radio">
                                                        <input class="custom-control-input" type="radio"
                                                            name="exampleRadios" id="fri3" value="fri3">
                                                        <label class="custom-control-label py-3 w-100 px-3"
                                                            for="fri3">
                                                            <i class="icofont-clock-time mr-2"></i> 6PM - 9PM
                                                        </label>
                                                    </div>
                                                    <div class="custom-control border-bottom px-0 custom-radio">
                                                        <input class="custom-control-input" type="radio"
                                                            name="exampleRadios" id="fri4" value="fri4">
                                                        <label class="custom-control-label py-3 w-100 px-3"
                                                            for="fri4">
                                                            <i class="icofont-clock-time mr-2"></i> 10AM - 1PM
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="sat" role="tabpanel"
                                                    aria-labelledby="sat-tab">
                                                    <div class="custom-control border-bottom px-0 custom-radio">
                                                        <input class="custom-control-input" type="radio"
                                                            name="exampleRadios" id="sat1" value="sat1" checked>
                                                        <label class="custom-control-label py-3 w-100 px-3"
                                                            for="sat1">
                                                            <i class="icofont-clock-time mr-2"></i> 6AM - 10AM
                                                        </label>
                                                    </div>
                                                    <div class="custom-control border-bottom px-0 custom-radio">
                                                        <input class="custom-control-input" type="radio"
                                                            name="exampleRadios" id="sat2" value="sat2">
                                                        <label class="custom-control-label py-3 w-100 px-3"
                                                            for="sat2">
                                                            <i class="icofont-clock-time mr-2"></i> 4PM - 6AM
                                                        </label>
                                                    </div>
                                                    <div class="custom-control border-bottom px-0 custom-radio">
                                                        <input class="custom-control-input" type="radio"
                                                            name="exampleRadios" id="sat3" value="sat3">
                                                        <label class="custom-control-label py-3 w-100 px-3"
                                                            for="sat3">
                                                            <i class="icofont-clock-time mr-2"></i> 6PM - 9PM
                                                        </label>
                                                    </div>
                                                    <div class="custom-control border-bottom px-0 custom-radio">
                                                        <input class="custom-control-input" type="radio"
                                                            name="exampleRadios" id="sat4" value="sat4">
                                                        <label class="custom-control-label py-3 w-100 px-3"
                                                            for="sat4">
                                                            <i class="icofont-clock-time mr-2"></i> 10AM - 1PM
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-3">
                                        <a href="#" class="btn btn-success btn-lg btn-block" type="button"
                                            data-toggle="collapse" data-target="#collapsefour" aria-expanded="true"
                                            aria-controls="collapsefour">Schedule Order</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card border-0 osahan-accor rounded shadow-sm overflow-hidden mt-3">

                            <div class="card-header bg-white border-0 p-0" id="headingfour">
                                <h2 class="mb-0">
                                    <button
                                        class="btn d-flex align-items-center bg-white btn-block text-left btn-lg h5 px-3 py-4 m-0"
                                        type="button" data-toggle="collapse" data-target="#collapsefour"
                                        aria-expanded="true" aria-controls="collapsefour">
                                        <span class="c-number">4</span> Payment
                                    </button>
                                </h2>
                            </div>

                            <div id="collapsefour" class="collapse" aria-labelledby="headingfour"
                                data-parent="#accordionExample">
                                <div class="card-body px-3 pb-3 pt-1 border-top">
                                    <div class="schedule">
                                        <ul class="nav nav-tabs justify-content-center nav-fill" id="myTab"
                                            role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active text-dark" id="credit-tab" data-toggle="tab"
                                                    href="#credit" role="tab" aria-controls="credit"
                                                    aria-selected="true">
                                                    <p class="mb-0 font-weight-bold"><i
                                                            class="icofont-credit-card mr-2"></i> Credit/Debit Card</p>
                                                </a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link text-dark" id="banking-tab" data-toggle="tab"
                                                    href="#banking" role="tab" aria-controls="banking"
                                                    aria-selected="false">
                                                    <p class="mb-0 font-weight-bold"><i class="icofont-globe mr-2"></i>
                                                        Net Banking</p>
                                                </a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link text-dark" id="cash-tab" data-toggle="tab"
                                                    href="#cash" role="tab" aria-controls="cash"
                                                    aria-selected="false">
                                                    <p class="mb-0 font-weight-bold"><i class="icofont-dollar mr-2"></i>
                                                        Cash on Delivery</p>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content bg-white" id="myTabContent">
                                            <div class="tab-pane fade show active" id="credit" role="tabpanel"
                                                aria-labelledby="credit-tab">
                                                <div class="osahan-card-body pt-3">
                                                    <h6 class="m-0">Add new card</h6>
                                                    <p class="small">WE ACCEPT <span
                                                            class="osahan-card ml-2 font-weight-bold">( Master Card /
                                                            Visa Card / Rupay )</span></p>
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="col-md-12 form-group">
                                                                <label class="form-label font-weight-bold small">Card
                                                                    number</label>
                                                                <div class="input-group">
                                                                    <input placeholder="Card number" type="number"
                                                                        class="form-control">
                                                                    <div class="input-group-append"><button
                                                                            id="button-addon2" type="button"
                                                                            class="btn btn-outline-secondary"><i
                                                                                class="icofont-credit-card"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8 form-group"><label
                                                                    class="form-label font-weight-bold small">Valid
                                                                    through(MM/YY)</label><input
                                                                    placeholder="Enter Valid through(MM/YY)"
                                                                    type="number" class="form-control"></div>
                                                            <div class="col-md-4 form-group"><label
                                                                    class="form-label font-weight-bold small">CVV</label><input
                                                                    placeholder="Enter CVV Number" type="number"
                                                                    class="form-control"></div>
                                                            <div class="col-md-12 form-group"><label
                                                                    class="form-label font-weight-bold small">Name on
                                                                    card</label><input placeholder="Enter Card number"
                                                                    type="text" class="form-control"></div>
                                                            <div class="col-md-12 form-group">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" id="custom-checkbox1"
                                                                        class="custom-control-input">
                                                                    <label title type="checkbox" for="custom-checkbox1"
                                                                        class="custom-control-label small pt-1">Securely
                                                                        save this card for a faster checkout next
                                                                        time.</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="banking" role="tabpanel"
                                                aria-labelledby="banking-tab">
                                                <div class="osahan-card-body pt-3">
                                                    <form>
                                                        <div class="btn-group btn-group-toggle w-100"
                                                            data-toggle="buttons">
                                                            <label class="btn btn-outline-secondary active">
                                                                <input type="radio" name="options" id="option1"
                                                                    checked> HDFC
                                                            </label>
                                                            <label class="btn btn-outline-secondary">
                                                                <input type="radio" name="options" id="option2">
                                                                ICICI
                                                            </label>
                                                            <label class="btn btn-outline-secondary">
                                                                <input type="radio" name="options" id="option3">
                                                                AXIS
                                                            </label>
                                                        </div>
                                                        <div class="form-row pt-3">
                                                            <div class="col-md-12 form-group">
                                                                <label class="form-label small font-weight-bold">Select
                                                                    Bank</label><br>
                                                                <select class="custom-select form-control">
                                                                    <option>Bank</option>
                                                                    <option>KOTAK</option>
                                                                    <option>SBI</option>
                                                                    <option>UCO</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="cash" role="tabpanel"
                                                aria-labelledby="cash-tab">
                                                <div class="custom-control custom-checkbox pt-3">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customControlAutosizing">
                                                    <label class="custom-control-label" for="customControlAutosizing">
                                                        <b>Cash</b><br>
                                                        <p class="small text-muted m-0">Please keep exact change handy
                                                            to help us serve you better</p>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="checkout.html" class="btn btn-success btn-lg btn-block mt-3"
                                        type="button">Continue</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sticky_sidebar">
                        <div class="bg-white rounded overflow-hidden shadow-sm mb-3 checkout-sidebar">
                            <div class="d-flex align-items-center osahan-cart-item-profile border-bottom bg-white p-3">
                                <img alt="osahan" src="{{ url('img/logo.png') }}"
                                    class="mr-3 rounded-circle img-fluid">
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 font-weight-bold">Rapid Seva</h6>
                                    <p class="mb-0 small text-muted"><i class="feather-map-pin"></i> Patna, Bihar, India
                                    </p>
                                </div>
                            </div>
                            <div>
                                <div class="bg-white p-3 clearfix">
                                    <p class="font-weight-bold small mb-2">Bill Details</p>
                                    <p class="mb-1">Item Total <span
                                            class="small text-muted">({{ session('cart') ? count(session('cart')) : '0' }}
                                            item)</span> <span
                                            class="float-right text-dark">₹{{ number_format($price, 2) }}</span></p>
                                    <p class="mb-1">Offer Discount <span
                                            class="float-right text-dark">₹{{ is_numeric($price) && is_numeric($subtotal) ? number_format($price - $subtotal, 2) : '0.00' }}</span>
                                    </p>
                                    <p class="mb-3">Coupon Discount
                                        @if (isset($couponcode) && !empty($couponcode))
                                            <span class="alert alert-success">{{ $couponcode }}</span>

                                            @php
                                                $discount = ($subtotal / 100) * $coupondiscount;
                                                $finalDiscount = $discount > $maxdiscount ? $maxdiscount : $discount;
                                            @endphp

                                            <span
                                                class="float-right text-dark">₹{{ number_format($finalDiscount, 2) }}</span>
                                        @else
                                            <span class="float-right text-dark">₹{{ $coupondiscount ?? 0 }}
                                            </span>
                                        @endif
                                        @if (isset($couponsuccess))
                                        <div class="alert alert-success alert-dismissible">
                                            {{ $couponsuccess }}
                                            <a href="{{url('cart')}}"> <button type="button" class="close" data-dismiss="">&times;</button></a>
                                        </div>
                                        
                                        @endif
                                    </p>
                                    <form action="{{ route('applycoupon') }}" method="POST">
                                        @csrf
                                        <input type="text" id="coupon" name="coupon">
                                        <button type="submit" class="btn btn-sm btn-success">Apply</button>
                                    </form>
                                    @if (session('couponerror'))
                                        <div class="alert alert-danger">{{ session('couponerror') }}</div>
                                    @endif



                                    <h6 class="mb-0 text-success">Total Discount<span
                                            class="float-right text-success">₹{{ number_format($price - ($subtotal - ($finalDiscount ?? '0.00')), 2) }}</span>
                                    </h6>

                                </div>
                                <div class="p-3 border-top">
                                    <h5 class="mb-0">TO PAY <span
                                            class="float-right text-danger">₹{{ number_format($subtotal - ($finalDiscount ?? '0.00')) }}</span>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Delivery Address</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class>
                        <div class="form-row">
                            <div class="col-md-12 form-group">
                                <label class="form-label">Delivery Area</label>
                                <div class="input-group">
                                    <input placeholder="Delivery Area" type="text" class="form-control">
                                    <div class="input-group-append"><button id="button-addon2" type="button"
                                            class="btn btn-outline-secondary"><i class="icofont-pin"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 form-group"><label class="form-label">Complete
                                    Address</label><input
                                    placeholder="Complete Address e.g. house number, street name, landmark" type="text"
                                    class="form-control"></div>
                            <div class="col-md-12 form-group"><label class="form-label">Delivery
                                    Instructions</label><input
                                    placeholder="Delivery Instructions e.g. Opposite Gold Souk Mall" type="text"
                                    class="form-control"></div>
                            <div class="mb-0 col-md-12 form-group">
                                <label class="form-label">Nickname</label>
                                <div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
                                    <label class="btn btn-outline-secondary active">
                                        <input type="radio" name="options" id="option1" checked> Home
                                    </label>
                                    <label class="btn btn-outline-secondary">
                                        <input type="radio" name="options" id="option2"> Work
                                    </label>
                                    <label class="btn btn-outline-secondary">
                                        <input type="radio" name="options" id="option3"> Other
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer p-0 border-0">
                    <div class="col-6 m-0 p-0">
                        <button type="button" class="btn border-top btn-lg btn-block"
                            data-dismiss="modal">Close</button>
                    </div>
                    <div class="col-6 m-0 p-0">
                        <button type="button" class="btn btn-success btn-lg btn-block">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
