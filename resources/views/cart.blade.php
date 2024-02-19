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
                                        <span class="c-number">2</span> Service Address <a href="#"
                                            data-toggle="modal" data-target="#exampleModal"
                                            class="text-decoration-none text-success ml-auto">
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
                                                    <input type="radio" id="customRadio{{ $address->id }}"
                                                        name="customRadioInline1" class="custom-control-input"
                                                        value="{{ $address->id }}" checked>
                                                    <label class="custom-control-label w-100"
                                                        for="customRadio{{ $address->id }}">
                                                        <div>
                                                            <div class="p-3 bg-white rounded shadow-sm w-100">
                                                                <div class="d-flex align-items-center mb-2">
                                                                    <input type="hidden" id="addressid" name="address"
                                                                        value="{{ $address->id }}">
                                                                    <p class="mb-0 h6">{{ $address->type }}</p>
                                                                    <p class="mb-0 badge badge-success ml-auto"><i
                                                                            class="icofont-check-circled"></i> Default</p>
                                                                </div>
                                                                <p class="small text-muted m-0">{{ $address->address }}</p>
                                                                <p class="small text-muted m-0">Landmark :
                                                                    {{ $address->landmark }}</p>
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
                                        <div class="schedule">
                                            <ul class="nav nav-tabs justify-content-center nav-fill" id="myTab"
                                                role="tablist">
                                                @foreach ($days as $index => $day)
                                                    <li class="nav-item" role="presentation">
                                                        <a class="nav-link{{ $index === 0 ? ' active' : '' }} text-dark"
                                                            id="{{ strtolower(substr($day, 0, 3)) }}-tab"
                                                            data-toggle="tab"
                                                            href="#{{ strtolower(substr($day, 0, 3)) }}" role="tab"
                                                            aria-controls="{{ strtolower(substr($day, 0, 3)) }}"
                                                            aria-selected="{{ $index === 0 ? 'true' : 'false' }}">
                                                            <p class="mb-0 font-weight-bold">
                                                                {{ strtoupper(substr($day, 0, 3)) }}</p>
                                                            <p class="mb-0">{{ date('j M', strtotime("+$index days")) }}
                                                            </p>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                            <div class="tab-content filter bg-white" id="myTabContent">
                                                @foreach ($days as $index => $day)
                                                    <div class="tab-pane fade{{ $index === 0 ? ' show active' : '' }}"
                                                        id="{{ strtolower(substr($day, 0, 3)) }}" role="tabpanel"
                                                        aria-labelledby="{{ strtolower(substr($day, 0, 3)) }}-tab">
                                                        @foreach ($timeSlots as $slot)
                                                            <div class="custom-control border-bottom px-0 custom-radio">
                                                                <input class="custom-control-input" type="radio"
                                                                    name="exampleRadios{{ $index }}"
                                                                    id="{{ strtolower(substr($day, 0, 3)) }}{{ $loop->iteration }}"
                                                                    value="{{ strtolower(substr($day, 0, 3)) }}{{ $loop->iteration }}"
                                                                    {{ $loop->first ? 'checked' : '' }}>
                                                                <label class="custom-control-label py-3 w-100 px-3"
                                                                    for="{{ strtolower(substr($day, 0, 3)) }}{{ $loop->iteration }}">
                                                                    <i class="icofont-clock-time mr-2"></i>
                                                                    {{ trim($slot) }}
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>

                                        <!-- Schedule Order Button -->
                                        <div class="p-3">
                                            <a href="#" class="btn btn-success btn-lg btn-block" type="button"
                                                data-toggle="collapse" data-target="#collapsefour" aria-expanded="true"
                                                aria-controls="collapsefour">Schedule Order</a>
                                        </div>
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
                                                <a class="nav-link text-dark" id="cash-tab" data-toggle="tab"
                                                    href="#cash" role="tab" aria-controls="cash"
                                                    aria-selected="true">
                                                    <p class="mb-0 font-weight-bold">
                                                        Cash on Delivery</p>
                                                </a>
                                            </li>
                                        </ul>

                                    </div>
                                    <a type="button" id="placeOrderBtn" class="btn btn-success btn-lg btn-block mt-3"
                                        type="button">Place Order</a>
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
                                                <a href="{{ url('cart') }}"> <button type="button" class="close"
                                                        data-dismiss="">&times;</button></a>
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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Add event listener to the "Schedule Order" button
            document.querySelector('#collapsefour .btn-success').addEventListener('click', function() {
                // Get the selected date
                var selectedDate = document.querySelector('.nav-tabs .nav-link.active').getAttribute(
                    'aria-controls');

                // Get the selected time slot
                var selectedTimeSlot = document.querySelector(
                    '.tab-pane.fade.show.active .custom-control-input:checked').value;

                // Check if both date and time slot are selected
                if (selectedDate && selectedTimeSlot) {
                    // You can use the selectedDate and selectedTimeSlot variables here as needed
                    console.log('Selected Date:', selectedDate);
                    console.log('Selected Time Slot:', selectedTimeSlot);

                    // Here you can proceed with further actions, such as sending the selected date and time slot to the server via AJAX
                } else {
                    // If either date or time slot is not selected, display an error message
                    alert('Please select a date and time slot.');
                }
            });
        });
    </script>

<script>
    document.getElementById('placeOrderBtn').addEventListener('click', function() {
        // Get the CSRF token from the meta tag
        var token = document.head.querySelector('meta[name="csrf-token"]').content;
        // Get selected delivery address details
        var selectedAddressId = document.querySelector('input[name="customRadioInline1"]:checked').value;
        var productIds = [];
        var totalPrice = 0;
        var toPay = 0;
        @if (session('cart'))
        // Iterate over each cart item
        @foreach (session('cart') as $item)
            // Extract the product ID from the current item and push it to the productIds array
            productIds.push('{{ $item['id'] }}');
            // Calculate item total and add to the total price
            var itemPrice = parseFloat('{{ $item['price'] }}');
            var discount = parseFloat('{{ $item['discount'] }}');
            var itemTotal = itemPrice - (itemPrice * discount / 100);
            toPay += itemTotal;
            totalPrice += itemPrice;
        @endforeach
        @endif
        // Get the selected date
        var selectedDateElement = document.querySelector('.nav-tabs .nav-link.active');
        var selectedDate = selectedDateElement.getAttribute('aria-controls');
        var selectedDateString = selectedDateElement.querySelector('.mb-0').textContent.trim();
        
        // Extract day abbreviation and date
        var dayAbbreviation = selectedDateString.split(' ')[0].toUpperCase(); // Convert to uppercase
        var date = selectedDateString.split(' ')[1];

        // Get the selected time slot
        var selectedTimeSlotElement = document.querySelector('.tab-pane.fade.show.active .custom-control-input:checked');
        var selectedTimeSlot = selectedTimeSlotElement.value;
        var selectedTimeSlotString = selectedTimeSlotElement.nextElementSibling.textContent.trim();

        // Check if both date and time slot are selected
        if (selectedAddressId && productIds.length > 0 && selectedDate && selectedTimeSlot) {
            // Format the time slot into HH:MM AM/PM format
            var timeArray = selectedTimeSlotString.split(':');
            var hours = parseInt(timeArray[0]);
            var minutes = parseInt(timeArray[1]);
            var ampm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12;
            hours = hours ? hours : 12; // Handle midnight (0 hours)
            minutes = minutes < 10 ? '0' + minutes : minutes;
            var formattedTime = hours + ':' + minutes + ' ' + ampm;

            // Construct the date and time string
            var selectedDateTimeString = dayAbbreviation;

            // Prepare the order data
            var orderData = {
                paymentMethod: '2',
                addressId: selectedAddressId,
                productId: productIds,
                selectedDate: selectedDateTimeString,
                selectedTime:formattedTime,
                totalPrice:totalPrice,
                toPay:toPay,
            };

            // Send an AJAX request to the server
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '/placeorder', true);
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.setRequestHeader('X-CSRF-TOKEN', token);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    window.location.href = '/successful';
                    // Handle successful response
                } else {
                    console.error('Request failed. Status: ' + xhr.status);
                }
            };
            xhr.send(JSON.stringify(orderData));
        } else {
            // Display an error message if any required data is missing
            alert('Please select delivery address, products, date, and time.');
        }
    });
</script>




@endsection
