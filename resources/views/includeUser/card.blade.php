@if($products->isEmpty())
<h1>No Data Available</h1>
@else
@foreach($products as $product)
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
@endforeach
@endif
