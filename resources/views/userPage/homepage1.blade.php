@extends('masterUser')
@section('css')
<link rel="stylesheet" href="assetsUser/css/demo1.css" />
@stop
@section('content')
    <!-- Main Slider Start -->
    <div class="sticky-header-next-sec ec-main-slider section section-space-pb">
        <div class="ec-slider swiper-container main-slider-nav main-slider-dot">
            <!-- Main slider -->
            <div class="swiper-wrapper">
                <div class="ec-slide-item swiper-slide d-flex ec-slide-1">
                    <div class="container align-self-center">
                        <div class="row">
                            <div class="col-xl-6 col-lg-7 col-md-7 col-sm-7 align-self-center">
                                <div class="ec-slide-content slider-animation">
                                    <h1 class="ec-slide-title">New Fashion Collection</h1>
                                    <h2 class="ec-slide-stitle">Sale Offer</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>
                                    <a href="#" class="btn btn-lg btn-secondary">Order Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ec-slide-item swiper-slide d-flex ec-slide-2">
                    <div class="container align-self-center">
                        <div class="row">
                            <div class="col-xl-6 col-lg-7 col-md-7 col-sm-7 align-self-center">
                                <div class="ec-slide-content slider-animation">
                                    <h1 class="ec-slide-title">Boat Headphone Sets</h1>
                                    <h2 class="ec-slide-stitle">Sale Offer</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>
                                    <a href="#" class="btn btn-lg btn-secondary">Order Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination swiper-pagination-white"></div>
            <div class="swiper-buttons">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>
    <!-- Main Slider End -->


    <!-- Product tab Area Start -->
    <section class="section ec-product-tab section-space-p" id="collection">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2 class="ec-bg-title">Our Top Collection</h2>
                        <h2 class="ec-title">Our Top Collection</h2>
                        <p class="sub-title">Browse The Collection of Top Products</p>
                    </div>
                </div>

                <!-- Tab Start -->
                <div class="col-md-12 text-center">
                    <ul class="ec-pro-tab-nav nav justify-content-center">
                        <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#tab-pro-for-all">For
                                All</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#tab-pro-for-men">For
                                Men</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#tab-pro-for-women">For
                                Women</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#tab-pro-for-child">For
                                Children</a></li>
                    </ul>
                </div>
                <!-- Tab End -->
            </div>
            <div class="row">
                <div class="col">
                    <div class="tab-content">
                        <!-- 1st Product tab start -->
                        <div class="tab-pane fade show active" id="tab-pro-for-all">
                            <div class="row">
                                <!-- Product Content -->
                                @foreach($products as $product)
                                @if($loop->index<6)
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-6 pro-gl-content">
                                    <div class="ec-product-inner">
                                        <div class="ec-pro-image-outer">
                                            <div class="ec-pro-image">
                                                <a href="product-left-sidebar.html" class="image">
                                                    <img class="main-image"
                                                        src="images/{{$product->image}}" alt="Product" />
                                                    <img class="hover-image"
                                                        src="images/{{$product->image}}" alt="Product" />
                                                </a>
                                                @if($product->saleType=="WholeSale"||$product->saleType=="RetailSale&WholeSale
")
                <span class="flags saleT">
                    <span class="new">whole sale</span>
                </span>
                @endif
                                                @if(isset($product->offer->offer))
                                                <span class="percentage">{{$product->offer->offer}}%</span>
                                                @endif
                                                <a href="{{$product->id}}" value="{{$product->id}}" class="quickview" data-link-action="quickview"
                                                    title="Quick view" data-bs-toggle="modal"
                                                    data-bs-target="#ec_quickview_modal"><img
                                                        src="assetsUser/images/icons/quickview.svg" class="svg_img pro_svg"
                                                        alt="" /></a>
                                                <div class="ec-pro-actions">
                                                    <a href="compare.html" class="ec-btn-group compare"
                                                        title="Compare"><img src="assetsUser/images/icons/compare.svg"
                                                            class="svg_img pro_svg" alt="" /></a>
                                                    <button title="Add To Cart" class=" add-to-cart"><img
                                                            src="assetsUser/images/icons/cart.svg" class="svg_img pro_svg"
                                                            alt="" /> Add To Cart</button>
                                                    <a class="ec-btn-group wishlist" title="Wishlist"><img
                                                            src="assetsUser/images/icons/wishlist.svg"
                                                            class="svg_img pro_svg" alt="" /></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ec-pro-content">
                                            <h5 class="ec-pro-title"><a href="/productView/{{$product->id}} ">{{$product->name}}</a></h5>
                                            {{-- <div class="ec-pro-rating">
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star "></i>
                                                <i class="ecicon eci-star"></i>
                                            </div> --}}
                                            <div class="ec-pro-list-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dutmmy text ever since the 1500s, when an unknown printer took a galley.</div>
                                            <span class="ec-price">
                                                @if(!isset($product->offer->offer))
                                                <span class="price">{{$product->price}}</span>
                                                @endif
                                                @if(isset($product->offer->offer))
                                                <span class="old-price">
                                                   {{ $product->offer->oldPrice}}
                                                </span>
                                                <span class="new-price"> {{ $product->offer->newPrice}}</span>
                                                @endif
                                            </span>
                                            <div class="ec-pro-option">
                                                <div class="ec-pro-color">
                                                    <span class="ec-pro-opt-label">Color</span>
                                                    <ul class="ec-opt-swatch ec-change-img">
                                                        @foreach( $product->color as $color)
                                                        <li class="active"><a href="#" class="ec-opt-clr-img"
                                                                data-src="assetsUser/images/product-image/6_1.jpg"
                                                                data-src-hover="assetsUser/images/product-image/6_1.jpg"
                                                                data-tooltip="Gray"><span
                                                                    style="background-color:{{$color}};"></span></a></li>
                                                     @endforeach
                                                    </ul>
                                                </div>
                                                {{-- <div class="ec-pro-size">
                                                    <span class="ec-pro-opt-label">Size</span>
                                                    <ul class="ec-opt-size">
                                                        <li class="active"><a href="#" class="ec-opt-sz"
                                                                data-old="$25.00" data-new="$20.00"
                                                                data-tooltip="Small">S</a></li>
                                                        <li><a href="#" class="ec-opt-sz" data-old="$27.00"
                                                                data-new="$22.00" data-tooltip="Medium">M</a></li>
                                                        <li><a href="#" class="ec-opt-sz" data-old="$30.00"
                                                                data-new="$25.00" data-tooltip="Large">X</a></li>
                                                        <li><a href="#" class="ec-opt-sz" data-old="$35.00"
                                                                data-new="$30.00" data-tooltip="Extra Large">XL</a></li>
                                                    </ul>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach

                                <div class="col-sm-12 shop-all-btn"><a href="shop-left-sidebar-col-3.html">Shop All Collection</a></div>
                            </div>
                        </div>
                        <!-- ec 1st Product tab end -->
                        <!-- ec 2nd Product tab start -->
                        <div class="tab-pane fade" id="tab-pro-for-men">
                            <div class="row">
                                <!-- Product Content -->
                                @php
                                $counter=0
                                @endphp
                                @foreach($products as $product)

                                @if($product->gender=='men'&&$counter<6)
                                @php
                                $counter++
                            @endphp
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-6 pro-gl-content">
                                    <div class="ec-product-inner">
                                        <div class="ec-pro-image-outer">
                                            <div class="ec-pro-image">
                                                <a href="product-left-sidebar.html" class="image">
                                                    <img class="main-image"
                                                        src="images/{{$product->image}}" alt="Product" />
                                                    <img class="hover-image"
                                                        src="images/{{$product->image}}" alt="Product" />
                                                </a>
                                                @if($product->saleType=="WholeSale"||$product->saleType=="RetailSale&WholeSale
")
                <span class="flags saleT">
                    <span class="new">whole sale</span>
                </span>
                @endif
                                                @if(isset($product->offer->offer))
                                                <span class="percentage">{{$product->offer->offer}}%</span>
                                                @endif
                                                <a href="{{$product->id}}" value="{{$product->id}}" class="quickview" data-link-action="quickview"
                                                    title="Quick view" data-bs-toggle="modal"
                                                    data-bs-target="#ec_quickview_modal"><img
                                                        src="assetsUser/images/icons/quickview.svg" class="svg_img pro_svg"
                                                        alt="" /></a>
                                                <div class="ec-pro-actions">
                                                    <a href="compare.html" class="ec-btn-group compare"
                                                        title="Compare"><img src="assetsUser/images/icons/compare.svg"
                                                            class="svg_img pro_svg" alt="" /></a>
                                                    <button title="Add To Cart" class=" add-to-cart"><img
                                                            src="assetsUser/images/icons/cart.svg" class="svg_img pro_svg"
                                                            alt="" /> Add To Cart</button>
                                                    <a class="ec-btn-group wishlist" title="Wishlist"><img
                                                            src="assetsUser/images/icons/wishlist.svg"
                                                            class="svg_img pro_svg" alt="" /></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ec-pro-content">
                                            <h5 class="ec-pro-title"><a href="/productView/{{$product->id}} ">{{$product->name}}</a></h5>
                                            {{-- <div class="ec-pro-rating">
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star "></i>
                                                <i class="ecicon eci-star"></i>
                                            </div> --}}
                                            <div class="ec-pro-list-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dutmmy text ever since the 1500s, when an unknown printer took a galley.</div>
                                            <span class="ec-price">
                                                @if(!isset($product->offer->offer))
                                                <span class="price">{{$product->price}}</span>
                                                @endif
                                                @if(isset($product->offer->offer))
                                                <span class="old-price">
                                                   {{ $product->offer->oldPrice}}
                                                </span>
                                                <span class="new-price"> {{ $product->offer->newPrice}}</span>
                                                @endif
                                            </span>
                                            <div class="ec-pro-option">
                                                <div class="ec-pro-color">
                                                    <span class="ec-pro-opt-label">Color</span>
                                                    <ul class="ec-opt-swatch ec-change-img">
                                                        @foreach( $product->color as $color)
                                                        <li class="active"><a href="#" class="ec-opt-clr-img"
                                                                data-src="assetsUser/images/product-image/6_1.jpg"
                                                                data-src-hover="assetsUser/images/product-image/6_1.jpg"
                                                                data-tooltip="Gray"><span
                                                                    style="background-color:{{$color}};"></span></a></li>
                                                     @endforeach
                                                    </ul>
                                                </div>
                                                {{-- <div class="ec-pro-size">
                                                    <span class="ec-pro-opt-label">Size</span>
                                                    <ul class="ec-opt-size">
                                                        <li class="active"><a href="#" class="ec-opt-sz"
                                                                data-old="$25.00" data-new="$20.00"
                                                                data-tooltip="Small">S</a></li>
                                                        <li><a href="#" class="ec-opt-sz" data-old="$27.00"
                                                                data-new="$22.00" data-tooltip="Medium">M</a></li>
                                                        <li><a href="#" class="ec-opt-sz" data-old="$30.00"
                                                                data-new="$25.00" data-tooltip="Large">X</a></li>
                                                        <li><a href="#" class="ec-opt-sz" data-old="$35.00"
                                                                data-new="$30.00" data-tooltip="Extra Large">XL</a></li>
                                                    </ul>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach

                                <div class="col-sm-12 shop-all-btn"><a href="shop-left-sidebar-col-3.html">Shop All Collection</a></div>
                            </div>
                        </div>
                        <!-- ec 2nd Product tab end -->
                        <!-- ec 3rd Product tab start -->
                        <div class="tab-pane fade" id="tab-pro-for-women">
                            <div class="row">

                                @php
                                $counter=0
                                @endphp
                                @foreach($products as $product)

                                @if($counter<6&&$product->gender=='women')
                                    @php
                                $counter++
                                @endphp
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-6 pro-gl-content">
                                    <div class="ec-product-inner">
                                        <div class="ec-pro-image-outer">
                                            <div class="ec-pro-image">
                                                <a href="product-left-sidebar.html" class="image">
                                                    <img class="main-image"
                                                        src="images/{{$product->image}}" alt="Product" />
                                                    <img class="hover-image"
                                                        src="images/{{$product->image}}" alt="Product" />
                                                </a>
                                                @if($product->saleType=="WholeSale"||$product->saleType=="RetailSale&WholeSale
")
                <span class="flags saleT">
                    <span class="new">whole sale</span>
                </span>
                @endif
                                                @if(isset($product->offer->offer))
                                                <span class="percentage">{{$product->offer->offer}}%</span>
                                                @endif
                                                <a href="{{$product->id}}" value="{{$product->id}}" class="quickview" data-link-action="quickview"
                                                    title="Quick view" data-bs-toggle="modal"
                                                    data-bs-target="#ec_quickview_modal"><img
                                                        src="assetsUser/images/icons/quickview.svg" class="svg_img pro_svg"
                                                        alt="" /></a>
                                                <div class="ec-pro-actions">
                                                    <a href="compare.html" class="ec-btn-group compare"
                                                        title="Compare"><img src="assetsUser/images/icons/compare.svg"
                                                            class="svg_img pro_svg" alt="" /></a>
                                                    <button title="Add To Cart" class=" add-to-cart"><img
                                                            src="assetsUser/images/icons/cart.svg" class="svg_img pro_svg"
                                                            alt="" /> Add To Cart</button>
                                                    <a class="ec-btn-group wishlist" title="Wishlist"><img
                                                            src="assetsUser/images/icons/wishlist.svg"
                                                            class="svg_img pro_svg" alt="" /></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ec-pro-content">
                                            <h5 class="ec-pro-title"><a href="/productView/{{$product->id}} ">{{$product->name}}</a></h5>
                                            {{-- <div class="ec-pro-rating">
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star "></i>
                                                <i class="ecicon eci-star"></i>
                                            </div> --}}
                                            <div class="ec-pro-list-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dutmmy text ever since the 1500s, when an unknown printer took a galley.</div>
                                            <span class="ec-price">
                                                @if(!isset($product->offer->offer))
                                                <span class="price">{{$product->price}}</span>
                                                @endif
                                                @if(isset($product->offer->offer))
                                                <span class="old-price">
                                                   {{ $product->offer->oldPrice}}
                                                </span>
                                                <span class="new-price"> {{ $product->offer->newPrice}}</span>
                                                @endif
                                            </span>
                                            <div class="ec-pro-option">
                                                <div class="ec-pro-color">
                                                    <span class="ec-pro-opt-label">Color</span>
                                                    <ul class="ec-opt-swatch ec-change-img">
                                                        @foreach( $product->color as $color)
                                                        <li class="active"><a href="#" class="ec-opt-clr-img"
                                                                data-src="assetsUser/images/product-image/6_1.jpg"
                                                                data-src-hover="assetsUser/images/product-image/6_1.jpg"
                                                                data-tooltip="Gray"><span
                                                                    style="background-color:{{$color}};"></span></a></li>
                                                     @endforeach
                                                    </ul>
                                                </div>
                                                {{-- <div class="ec-pro-size">
                                                    <span class="ec-pro-opt-label">Size</span>
                                                    <ul class="ec-opt-size">
                                                        <li class="active"><a href="#" class="ec-opt-sz"
                                                                data-old="$25.00" data-new="$20.00"
                                                                data-tooltip="Small">S</a></li>
                                                        <li><a href="#" class="ec-opt-sz" data-old="$27.00"
                                                                data-new="$22.00" data-tooltip="Medium">M</a></li>
                                                        <li><a href="#" class="ec-opt-sz" data-old="$30.00"
                                                                data-new="$25.00" data-tooltip="Large">X</a></li>
                                                        <li><a href="#" class="ec-opt-sz" data-old="$35.00"
                                                                data-new="$30.00" data-tooltip="Extra Large">XL</a></li>
                                                    </ul>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach

                                <div class="col-sm-12 shop-all-btn"><a href="shop-left-sidebar-col-3.html">Shop All Collection</a></div>
                                </div>


                        </div>
                        <!-- ec 3rd Product tab end -->
                        <!-- ec 4th Product tab start -->
                        <div class="tab-pane fade" id="tab-pro-for-child">
                            <div class="row">
                                <!-- Product Content -->
                                @php
                                $counter=0
                                @endphp
                                @foreach($products as $product)
                                @if($counter<6&&($product->gender=='boy'||$product->gender=='girl'))
                                @php
                                $counter++
                                @endphp
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-6 pro-gl-content">
                                    <div class="ec-product-inner">
                                        <div class="ec-pro-image-outer">
                                            <div class="ec-pro-image">
                                                <a href="product-left-sidebar.html" class="image">
                                                    <img class="main-image"
                                                        src="images/{{$product->image}}" alt="Product" />
                                                    <img class="hover-image"
                                                        src="images/{{$product->image}}" alt="Product" />
                                                </a>
                                                @if($product->saleType=="WholeSale"||$product->saleType=="RetailSale&WholeSale
")
                <span class="flags saleT">
                    <span class="new">whole sale</span>
                </span>
                @endif
                                                @if(isset($product->offer->offer))
                                                <span class="percentage">{{$product->offer->offer}}%</span>
                                                @endif
                                                <a href="{{$product->id}}" value="{{$product->id}}" class="quickview" data-link-action="quickview"
                                                    title="Quick view" data-bs-toggle="modal"
                                                    data-bs-target="#ec_quickview_modal"><img
                                                        src="assetsUser/images/icons/quickview.svg" class="svg_img pro_svg"
                                                        alt="" /></a>
                                                <div class="ec-pro-actions">
                                                    <a href="compare.html" class="ec-btn-group compare"
                                                        title="Compare"><img src="assetsUser/images/icons/compare.svg"
                                                            class="svg_img pro_svg" alt="" /></a>
                                                    <button title="Add To Cart" class=" add-to-cart"><img
                                                            src="assetsUser/images/icons/cart.svg" class="svg_img pro_svg"
                                                            alt="" /> Add To Cart</button>
                                                    <a class="ec-btn-group wishlist" title="Wishlist"><img
                                                            src="assetsUser/images/icons/wishlist.svg"
                                                            class="svg_img pro_svg" alt="" /></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ec-pro-content">
                                            <h5 class="ec-pro-title"><a href="/productView/{{$product->id}} ">{{$product->name}}</a></h5>
                                            {{-- <div class="ec-pro-rating">
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star "></i>
                                                <i class="ecicon eci-star"></i>
                                            </div> --}}
                                            <div class="ec-pro-list-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dutmmy text ever since the 1500s, when an unknown printer took a galley.</div>
                                            <span class="ec-price">
                                                @if(!isset($product->offer->offer))
                                                <span class="price">{{$product->price}}</span>
                                                @endif
                                                @if(isset($product->offer->offer))
                                                <span class="old-price">
                                                   {{ $product->offer->oldPrice}}
                                                </span>
                                                <span class="new-price"> {{ $product->offer->newPrice}}</span>
                                                @endif
                                            </span>
                                            <div class="ec-pro-option">
                                                <div class="ec-pro-color">
                                                    <span class="ec-pro-opt-label">Color</span>
                                                    <ul class="ec-opt-swatch ec-change-img">
                                                        @foreach( $product->color as $color)
                                                        <li class="active"><a href="#" class="ec-opt-clr-img"
                                                                data-src="assetsUser/images/product-image/6_1.jpg"
                                                                data-src-hover="assetsUser/images/product-image/6_1.jpg"
                                                                data-tooltip="Gray"><span
                                                                    style="background-color:{{$color}};"></span></a></li>
                                                     @endforeach
                                                    </ul>
                                                </div>
                                                {{-- <div class="ec-pro-size">
                                                    <span class="ec-pro-opt-label">Size</span>
                                                    <ul class="ec-opt-size">
                                                        <li class="active"><a href="#" class="ec-opt-sz"
                                                                data-old="$25.00" data-new="$20.00"
                                                                data-tooltip="Small">S</a></li>
                                                        <li><a href="#" class="ec-opt-sz" data-old="$27.00"
                                                                data-new="$22.00" data-tooltip="Medium">M</a></li>
                                                        <li><a href="#" class="ec-opt-sz" data-old="$30.00"
                                                                data-new="$25.00" data-tooltip="Large">X</a></li>
                                                        <li><a href="#" class="ec-opt-sz" data-old="$35.00"
                                                                data-new="$30.00" data-tooltip="Extra Large">XL</a></li>
                                                    </ul>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                                <div class="col-sm-12 shop-all-btn"><a href="shop-left-sidebar-col-3.html">Shop All Collection</a></div>
                            </div>
                        </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>



    <!--  offer Section Start -->
    <section class="section ec-offer-section section-space-p section-space-m">
        <h2 class="d-none">Offer</h2>
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-xl-6 col-lg-7 col-md-7 col-sm-7 align-self-center ec-offer-content">
                    <h2 class="ec-offer-title">Sunglasses</h2>
                    <h3 class="ec-offer-stitle" data-animation="slideInDown">Super Offer</h3>
                    <span class="ec-offer-img" data-animation="zoomIn"><img src="assetsUser/images/offer-image/1.png" alt="offer image" /></span>
                    <span class="ec-offer-desc">Acetate Frame Sunglasses</span>
                    <span class="ec-offer-price">$40.00 Only</span>
                    <a class="btn btn-primary" href="shop-left-sidebar-col-3.html" data-animation="zoomIn">Shop Now</a>
                </div>
            </div>
        </div>
    </section>
    <!-- offer Section End -->





    <!-- New Product Start -->
    <section class="section ec-new-product section-space-p" id="arrivals">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2 class="ec-bg-title">New Arrivals</h2>
                        <h2 class="ec-title">New Arrivals</h2>
                        <p class="sub-title">Browse The Collection of Top Products</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($productsNew as $product)
                @if($loop->index<6)
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-6 pro-gl-content">
                    <div class="ec-product-inner">
                        <div class="ec-pro-image-outer">
                            <div class="ec-pro-image">
                                <a href="product-left-sidebar.html" class="image">
                                    <img class="main-image"
                                        src="images/{{$product->image}}" alt="Product" />
                                    <img class="hover-image"
                                        src="images/{{$product->image}}" alt="Product" />
                                </a>
                                @if($product->saleType=="WholeSale"||$product->saleType=="RetailSale&WholeSale
")
                <span class="flags saleT">
                    <span class="new">whole sale</span>
                </span>
                @endif
                                @if(isset($product->offer->offer))
                                <span class="percentage">{{$product->offer->offer}}%</span>
                                @endif
                                <a href="{{$product->id}}" value="{{$product->id}}" class="quickview" data-link-action="quickview"
                                    title="Quick view" data-bs-toggle="modal"
                                    data-bs-target="#ec_quickview_modal"><img
                                        src="assetsUser/images/icons/quickview.svg" class="svg_img pro_svg"
                                        alt="" /></a>
                                <div class="ec-pro-actions">
                                    <a href="compare.html" class="ec-btn-group compare"
                                        title="Compare"><img src="assetsUser/images/icons/compare.svg"
                                            class="svg_img pro_svg" alt="" /></a>
                                    <button title="Add To Cart" class=" add-to-cart"><img
                                            src="assetsUser/images/icons/cart.svg" class="svg_img pro_svg"
                                            alt="" /> Add To Cart</button>
                                    <a class="ec-btn-group wishlist" title="Wishlist"><img
                                            src="assetsUser/images/icons/wishlist.svg"
                                            class="svg_img pro_svg" alt="" /></a>
                                </div>
                            </div>
                        </div>
                        <div class="ec-pro-content">
                            <h5 class="ec-pro-title"><a href="/productView/{{$product->id}} ">{{$product->name}}</a></h5>
                            {{-- <div class="ec-pro-rating">
                                <i class="ecicon eci-star fill"></i>
                                <i class="ecicon eci-star fill"></i>
                                <i class="ecicon eci-star fill"></i>
                                <i class="ecicon eci-star "></i>
                                <i class="ecicon eci-star"></i>
                            </div> --}}
                            <div class="ec-pro-list-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dutmmy text ever since the 1500s, when an unknown printer took a galley.</div>
                            <span class="ec-price">
                                @if(!isset($product->offer->offer))
                                <span class="price">{{$product->price}}</span>
                                @endif
                                @if(isset($product->offer->offer))
                                <span class="old-price">
                                   {{ $product->offer->oldPrice}}
                                </span>
                                <span class="new-price"> {{ $product->offer->newPrice}}</span>
                                @endif
                            </span>
                            <div class="ec-pro-option">
                                <div class="ec-pro-color">
                                    <span class="ec-pro-opt-label">Color</span>
                                    <ul class="ec-opt-swatch ec-change-img">
                                        @foreach( $product->color as $color)
                                        <li class="active"><a href="#" class="ec-opt-clr-img"
                                                data-src="assetsUser/images/product-image/6_1.jpg"
                                                data-src-hover="assetsUser/images/product-image/6_1.jpg"
                                                data-tooltip="Gray"><span
                                                    style="background-color:{{$color}};"></span></a></li>
                                     @endforeach
                                    </ul>
                                </div>
                                {{-- <div class="ec-pro-size">
                                    <span class="ec-pro-opt-label">Size</span>
                                    <ul class="ec-opt-size">
                                        <li class="active"><a href="#" class="ec-opt-sz"
                                                data-old="$25.00" data-new="$20.00"
                                                data-tooltip="Small">S</a></li>
                                        <li><a href="#" class="ec-opt-sz" data-old="$27.00"
                                                data-new="$22.00" data-tooltip="Medium">M</a></li>
                                        <li><a href="#" class="ec-opt-sz" data-old="$30.00"
                                                data-new="$25.00" data-tooltip="Large">X</a></li>
                                        <li><a href="#" class="ec-opt-sz" data-old="$35.00"
                                                data-new="$30.00" data-tooltip="Extra Large">XL</a></li>
                                    </ul>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>

                @endif
                @endforeach
            </div>
        </div>
    </section>
    <!-- New Product end -->




  <!-- ec testmonial Start -->
  <section class="section ec-test-section section-space-ptb-100 section-space-m" id="reviews">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="section-title mb-0">
                    <h2 class="ec-bg-title">Testimonial</h2>
                    <h2 class="ec-title">Client Review</h2>
                    <p class="sub-title mb-3">What say client about us</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="ec-test-outer">
                <ul id="ec-testimonial-slider">
                    <li class="ec-test-item">
                        <img src="assetsUser/images/testimonial/top-quotes.svg" class="svg_img test_svg top" alt="" />
                        <div class="ec-test-inner">
                            <div class="ec-test-img"><img alt="testimonial" title="testimonial"
                                    src="assetsUser/images/testimonial/1.jpg" /></div>
                            <div class="ec-test-content">
                                <div class="ec-test-desc">Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry. Lorem Ipsum has been the industry's standard dummy text
                                    ever since the 1500s, when an unknown printer took a galley of type and
                                    scrambled it to make a type specimen</div>
                                <div class="ec-test-name">John Doe</div>
                                <div class="ec-test-designation">General Manager</div>
                                <div class="ec-test-rating">
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                </div>
                            </div>
                        </div>
                        <img src="assetsUser/images/testimonial/bottom-quotes.svg" class="svg_img test_svg bottom"
                            alt="" />
                    </li>
                    <li class="ec-test-item ">
                        <img src="assetsUser/images/testimonial/top-quotes.svg" class="svg_img test_svg top" alt="" />
                        <div class="ec-test-inner">
                            <div class="ec-test-img"><img alt="testimonial" title="testimonial"
                                    src="assetsUser/images/testimonial/2.jpg" /></div>
                            <div class="ec-test-content">
                                <div class="ec-test-desc">Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry. Lorem Ipsum has been the industry's standard dummy text
                                    ever since the 1500s, when an unknown printer took a galley of type and
                                    scrambled it to make a type specimen</div>
                                <div class="ec-test-name">John Doe</div>
                                <div class="ec-test-designation">General Manager</div>
                                <div class="ec-test-rating">
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                </div>
                            </div>
                        </div>
                        <img src="assetsUser/images/testimonial/bottom-quotes.svg" class="svg_img test_svg bottom"
                            alt="" />
                    </li>
                    <li class="ec-test-item">
                        <img src="assetsUser/images/testimonial/top-quotes.svg" class="svg_img test_svg top" alt="" />
                        <div class="ec-test-inner">
                            <div class="ec-test-img"><img alt="testimonial" title="testimonial"
                                    src="assetsUser/images/testimonial/3.jpg" /></div>
                            <div class="ec-test-content">
                                <div class="ec-test-desc">Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry. Lorem Ipsum has been the industry's standard dummy text
                                    ever since the 1500s, when an unknown printer took a galley of type and
                                    scrambled it to make a type specimen</div>
                                <div class="ec-test-name">John Doe</div>
                                <div class="ec-test-designation">General Manager</div>
                                <div class="ec-test-rating">
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                </div>
                            </div>
                        </div>
                        <img src="assetsUser/images/testimonial/bottom-quotes.svg" class="svg_img test_svg bottom"
                            alt="" />
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- ec testmonial end -->



@stop
