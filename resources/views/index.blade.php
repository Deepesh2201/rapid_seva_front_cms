@extends('layouts.main')
@section('main-section')
<section class="py-4 osahan-main-body">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <div class="osahan-home-page">

                    <div class="osahan-body">
                        {{-- Top Slider Starts Here--}}
                        <div class="py-3 osahan-promos">
                           <div class="promo-slider pb-0 mb-0">
								@foreach ($banners as $banner)
									
                                <div class="osahan-slider-item mx-2">
                                    <a href="services/{{$banner->sid}}"><img src="{{$backendurl.$banner->img}}"
                                            class="img-fluid mx-auto rounded" alt="Responsive image"></a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        {{-- Top Slider ends Here --}}

                        {{-- Categories Starts here --}}
                        <div class="pt-3 pb-2  osahan-categories">
                            <div class="d-flex align-items-center mb-2">
                                <h5 class="m-0">What do you looking for?</h5>
                                <a href="#" class="ml-auto btn btn-outline-success btn-sm">See more</a>
                            </div>
                            <div class="categories-slider">
								@foreach ($categories as $category)
								
                                <div class="col-c">
                                    <div class="bg-white shadow-sm rounded text-center my-2 px-2 py-3 c-it">
                                        <a href="subcategories/{{$category->id}}">
                                            <img src="{{$backendurl.$category->cat_img}}" class="img-fluid px-2 mx-auto">
                                            <p class="m-0 pt-2 text-muted text-center">{{$category->cat_name}}</p>
                                        </a>
                                    </div>
                                </div>	
								@endforeach
                                
                            </div>
                        </div>
                        {{-- Categories ends here --}}

                        

                        <div class="title d-flex align-items-center py-3">
                            <h5 class="m-0">Pick's Today</h5>
                            <a class="ml-auto btn btn-outline-success btn-sm" href="picks_today.html">See more</a>
                        </div>

                        <div class="pick_today">
                            <div class="row">
								@foreach ($g_subcategory as $subcategory)
									
                                <div class="col-6 col-md-3 mb-3">
                                    <div
                                        class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                                        <div class="list-card-image">
                                            <a href="{{url('services')}}/{{$subcategory->id}}" class="text-dark">
                                                <div class="member-plan position-absolute"><span
                                                        class="badge m-3 badge-danger">10%</span></div>
                                                <div class="p-3">
                                                    <img src="{{$backendurl.$subcategory->img}}"
                                                        class="img-fluid item-img w-100 mb-3">
                                                    <h6>{{$subcategory->title}}</h6>
                                                    {{-- <div class="d-flex align-items-center">
                                                        <h6 class="price m-0 text-success">$0.8/kg</h6>
                                                        <a data-toggle="collapse" href="#collapseExample1"
                                                            role="button" aria-expanded="false"
                                                            aria-controls="collapseExample1"
                                                            class="btn btn-success btn-sm ml-auto">+</a>
                                                        <div class="collapse qty_show" id="collapseExample1">
                                                            <div>
                                                                <span class="ml-auto" href="#">
                                                                    <form id="myform"
                                                                        class="cart-items-number d-flex"
                                                                        method="POST" action="#">
                                                                        <input type="button" value="-"
                                                                            class="qtyminus btn btn-success btn-sm"
                                                                            field="quantity" />
                                                                        <input type="text" name="quantity"
                                                                            value="1" class="qty form-control" />
                                                                        <input type="button" value="+"
                                                                            class="qtyplus btn btn-success btn-sm"
                                                                            field="quantity" />
                                                                    </form>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                               @endforeach
                            </div>
                        </div>

                        {{-- Bottom Offers Sliders Starts Here --}}
                        <div class="py-3 osahan-promos">
                            <div class="d-flex align-items-center mb-3">
                                <h5 class="m-0">Promos for you</h5>
                                <a href="#" class="ml-auto btn btn-outline-success btn-sm">See more</a>
                            </div>
                            <div class="promo-slider pb-0 mb-0">
								@foreach ($banners as $banner)
									
                                <div class="osahan-slider-item mx-2">
                                    <a href="#"><img src="{{$backendurl.$banner->img}}"
                                            class="img-fluid mx-auto rounded" alt="Responsive image"></a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        {{-- Bottom Offers Slider Ends Here --}}




                        {{-- <div class="title d-flex align-items-center py-3">
                            <h5 class="m-0">Recommend for You</h5>
                            <a class="ml-auto btn btn-outline-success btn-sm" href="recommend.html">26 more</a>
                        </div>

                        <div class="osahan-recommend">
                            <div class="row">
								$@foreach ($g_subcategoryvid as $subcatvid)
									
                                <div class="col-12 col-md-4 mb-3">
                                    <a href="#" class="text-dark text-decoration-none">
                                        <div
                                            class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                                            <div class="recommend-slider2 rounded mb-0">
                                                <div class="osahan-slider-item m-2 rounded">
                                                    <img src="{{$backendurl.$subcatvid->img}}"
                                                        class="img-fluid mx-auto rounded shadow-sm"
                                                        alt="Responsive image">
                                                </div>
                                                
                                            </div>
                                            <div class="p-3 position-relative">
                                                <h6 class="mb-1 font-weight-bold text-success">{{$subcatvid->title}}
                                                </h6>
                                                <p class="text-muted">Orange Great Quality item from Jamaica.</p>
                                                <div class="d-flex align-items-center">
                                                    <h6 class="m-0">$8.8/kg</h6>
                                                    <a class="ml-auto" href="#">
                                                        <form id="myform" class="cart-items-number d-flex"
                                                            method="POST" action="#">
                                                            <input type="button" value="-"
                                                                class="qtyminus btn btn-success btn-sm"
                                                                field="quantity" />
                                                            <input type="text" name="quantity" value="1"
                                                                class="qty form-control" />
                                                            <input type="button" value="+"
                                                                class="qtyplus btn btn-success btn-sm"
                                                                field="quantity" />
                                                        </form>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection