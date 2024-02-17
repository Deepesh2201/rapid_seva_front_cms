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
                                    <a
                                        href="#"
                                        data-toggle="modal"
                                        data-target="#exampleModal"
                                        class="btn text-muted bg-white mr-2"
                                        ><i class="icofont-filter mr-1"></i>
                                        Filter</a
                                    >
                                    <a
                                        href="#"
                                        data-toggle="modal"
                                        data-target="#exampleModal"
                                        class="btn text-muted bg-white"
                                        ><i class="icofont-signal mr-1"></i>
                                        Sort</a
                                    >
                                </div>
                            </div>
                            <div class="row">
                                @foreach ($g_subcategory as $subcategory)
                                    
                                <div class="col-6 col-md-3 mb-3">
                                    <div
                                        class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm"
                                    >
                                        <div class="list-card-image">
                                            <a
                                                href="{{url('services')}}/{{$subcategory->id}}"
                                                class="text-dark"
                                            >
                                                <div
                                                    class="member-plan position-absolute"
                                                >
                                                    {{-- <span
                                                        class="badge m-3 badge-danger"
                                                        >10%</span
                                                    > --}}
                                                </div>
                                                <div class="p-3">
                                                    <img
                                                        src="{{$backendurl.$subcategory->img}}"
                                                        class="img-fluid item-img w-100 mb-3"
                                                    />
                                                    <h6>{{$subcategory->title}}</h6>
                                                   
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