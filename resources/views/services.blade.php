@extends('layouts.main')
@section('main-section')
    <section class="py-4 osahan-main-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="osahan-listing">
                        <div class="d-flex align-items-center mb-3">
                            <h4>Select Categories</h4>
                            <div class="m-0 text-center ml-auto">
                                <a href="#" data-toggle="modal" data-target="#exampleModal"
                                    class="btn text-muted bg-white mr-2"><i class="icofont-filter mr-1"></i>
                                    Filter</a>
                                <a href="#" data-toggle="modal" data-target="#exampleModal"
                                    class="btn text-muted bg-white"><i class="icofont-signal mr-1"></i>
                                    Sort</a>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($services as $service)
                                <div class="col-6 col-md-3 mb-3">
                                    <div
                                        class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                                        <div class="list-card-image">
                                            <a href="services/{{ $service->id }}" class="text-dark">
                                                <div
                                                    class="member-plan position-absolute"
                                                >
                                                    <span
                                                        class="badge m-3 badge-success" style="background-color:red;color:white"
                                                        >{{$service->discount}}%</span
                                                    >
                                                </div>
                                                <div class="p-3 float-center">
                                                    
                                                    <img src="{{ $backendurl . $service->img }}"
                                                        class="img-fluid item-img w-10 mb-3" />
                                                    <h6>{{ $service->title }}</h6>
                                                    <span class="badge badge-danger mt-2"><s>Price :
                                                            ₹{{ $service->price }}</s></span>
                                                    <span class="badge badge-success mt-2">Offer Price :
                                                        ₹{{($service->price)- $service->price * $service->discount/100 }}</span><br>
                                                    <div>
                                                        <button class="btn btn-sm btn mt-2" style="background-color: black; color:white">Book Now</button>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
