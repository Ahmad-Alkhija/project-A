@extends('masterUser')
@section('class')
product_page
@stop
@section('content')
    <!-- Sart Single product -->
    <section class="ec-page-content section-space-p">
        <div class="container">
            <div class="row">
                <div class="ec-pro-rightside ec-common-rightside col-lg-9 order-lg-last col-md-12 order-md-first">

                    <!-- Single product content Start -->
                    <div class="single-pro-block">
                        <div class="single-pro-inner">
                            <div class="row">
                                <div class="single-pro-img">
                                    <div class="single-product-scroll">
                                        <div class="single-product-cover">

                                            @foreach($productGallerys as $gallery)
                                            <div class="single-slide zoom-image-hover zoom{{$loop->index}}">
                                                <img class="img-responsive galleryChange{{$loop->index}}" src="../images/{{$gallery->image}}"
                                                    alt="">
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="single-nav-thumb">

                                            @foreach($productGallerys as $gallery)
                                            <div class="single-slide">
                                                <img class="img-responsive galleryChangeH{{$loop->index}}" src="../images/{{$gallery->image}}"
                                                    alt="">
                                            </div>
@endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="single-pro-desc">
                                    <div class="single-pro-content">
                                        <h5 class="ec-single-title">{{$products->name}}</h5>
                                        <div class="ec-single-rating-wrap">
                                            <div class="ec-single-rating">
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star-o"></i>
                                            </div>
                                            <span class="ec-read-review"><a href="#ec-spt-nav-review">Be the first to
                                                    review this product</a></span>
                                        </div>
                                        <div class="ec-single-desc">{{$products->sortDescription}}</div>

                                        {{-- <div class="ec-single-sales">
                                            <div class="ec-single-sales-inner">
                                                <div class="ec-single-sales-title">sales accelerators</div>
                                                <div class="ec-single-sales-visitor">real time <span>24</span> visitor
                                                    right now!</div>
                                                <div class="ec-single-sales-progress">
                                                    <span class="ec-single-progress-desc">Hurry up!left 29 in
                                                        stock</span>
                                                    <span class="ec-single-progressbar"></span>
                                                </div>
                                                <div class="ec-single-sales-countdown">
                                                    <div class="ec-single-countdown"><span
                                                            id="ec-single-countdown"></span></div>
                                                    <div class="ec-single-count-desc">Time is Running Out!</div>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="ec-single-price-stoke">
                                            <div class="ec-single-price">
                                                <span class="ec-single-ps-title">As low as</span>
                                                <span class="new-price">{{$products->price}}$</span>
                                            </div>
                                            <div class="ec-single-stoke">
                                                <span class="ec-single-ps-title">IN STOCK</span>
                                                <span class="ec-single-sku">SKU#: WH12</span>
                                            </div>
                                        </div>

                                        <div class="ec-pro-variation">
                                            <div class="ec-pro-variation-inner ec-pro-variation-size">
                                        @foreach($products->size as $size)
                                        @if($size=='Size USA')
                                        <div class="ec-pro-variation-content">
                                        <span>SIZE USA</span>
                                        <ul>

                                        <?php
                                        $sizeN=1;
                                        $sizeNum=0;
                                        continue;
                                     ?>
                                        @endif
                                        @if($size=='Size Europe')
                                        </div>
                                        <div class="ec-pro-variation-content">
                                        <span>SIZE  Europe</span>
                                        <ul>
                                        <?php
                                         $sizeN=2;
                                        continue;
                                     ?>
                                        @endif
                                        @if($sizeN==1)
                                        @if($size=='Size Number')
                                    </ul>
                                <br>
                                <br>

                                        <h5>Size Number:</h5>
                                        <?php
                                        $sizeNum=1;
                                        continue;
                                    ?>
                                        @endif
                                        @if($sizeNum==1)
                                        <h4>{{$size}}</h4>
                                        @endif

                                        @if($sizeNum!=1)
                                        <li><span>{{$size}}</span></li>
                                        @endif
                                        @endif



                                        @if($sizeN==2)
                                        @if($size=='Size Number')
                                        <br>
                                        <?php
                                        $sizeNum=2;
                                        continue;
                                    ?>
                                        @endif
                                        @if($sizeNum==2)
                                        <li><h4>{{$size}}</h4></li>
                                        @endif

                                        @if($sizeNum!=2)
                                        <li><span>{{$size}}</span></li>
                                        @endif

                                        @endif



                                        @endforeach
                                        </ul>
                                    </div>
                                </div>
                                            {{-- <div class="ec-pro-variation-inner ec-pro-variation-size">
                                                <span>SIZE</span>
                                                <div class="ec-pro-variation-content">
                                                    <ul>
                                                        <li class="active"><span>S</span></li>
                                                        <li><span>M</span></li>
                                                        <li><span>L</span></li>
                                                        <li><span>XL</span></li>
                                                    </ul>
                                                </div>
                                            </div> --}}
                                            <div class="ec-pro-variation-inner ec-pro-variation-color">
                                                <span>Color</span>
                                                <div class="ec-pro-variation-content">
                                                    <input type="hidden" class="productId" value="{{$products->id}}">
 <ul>
    @foreach($products->color as $color)
        @if ( $loop->first)

     <li class="active clickGallery" id='{{$color}}' ><span style="background-color:{{$color}}"></span></li>

        @else
   <li class="clickGallery" id='{{$color}}' >
    <span style="background-color:{{$color}}"></span></li>


         @endif




@endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ec-single-qty">
                                            <div class="qty-plus-minus">
                                                <input class="qty-input" type="text" name="ec_qtybtn" value="1" />
                                            </div>
                                            <div class="ec-single-cart ">
                                                <button class="btn btn-primary order" value="{{$products->id}}">Buy Now</button>

                                            </div>
                                            <div class="ec-single-wishlist">
                                                <a class="ec-btn-group wishlist" title="Wishlist"><img
                                                        src="../assetsUser/images/icons/wishlist.svg" class="svg_img pro_svg"
                                                        alt="" /></a>
                                            </div>
                                            <div class="ec-single-quickview">
                                                <a href="#" class="ec-btn-group quickview" data-link-action="quickview"
                                                    title="Quick view" data-bs-toggle="modal"
                                                    data-bs-target="#ec_quickview_modal"><img
                                                        src="../assetsUser/images/icons/quickview.svg" class="svg_img pro_svg"
                                                        alt="" /></a>
                                            </div>
                                        </div>
                                        <div class="ec-single-social">
                                            <ul class="mb-0">
                                                <li class="list-inline-item facebook"><a href="#"><i
                                                            class="ecicon eci-facebook"></i></a></li>
                                                <li class="list-inline-item twitter"><a href="#"><i
                                                            class="ecicon eci-twitter"></i></a></li>
                                                <li class="list-inline-item instagram"><a href="#"><i
                                                            class="ecicon eci-instagram"></i></a></li>
                                                <li class="list-inline-item youtube-play"><a href="#"><i
                                                            class="ecicon eci-youtube-play"></i></a></li>
                                                <li class="list-inline-item behance"><a href="#"><i
                                                            class="ecicon eci-behance"></i></a></li>
                                                <li class="list-inline-item whatsapp"><a href="#"><i
                                                            class="ecicon eci-whatsapp"></i></a></li>
                                                <li class="list-inline-item plus"><a href="#"><i
                                                            class="ecicon eci-plus"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Single product content End -->
                    <!-- Single product tab start -->
                    <div class="ec-single-pro-tab">
                        <div class="ec-single-pro-tab-wrapper">
                            <div class="ec-single-pro-tab-nav">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab"
                                            data-bs-target="#ec-spt-nav-details" role="tablist">Detail</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#ec-spt-nav-info"
                                            role="tablist">More Information</a>
                                    </li>
                                    {{-- <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#ec-spt-nav-review"
                                            role="tablist">Reviews</a>
                                    </li> --}}
                                </ul>
                            </div>
                            <div class="tab-content  ec-single-pro-tab-content">
                                <div id="ec-spt-nav-details" class="tab-pane fade show active">
                                    <div class="ec-single-pro-tab-desc">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the
                                            1500s, when an unknown printer took a galley of type and scrambled it to
                                            make a type specimen book. It has survived not only five centuries, but also
                                            the leap into electronic typesetting, remaining essentially unchanged.
                                        </p>
                                        <ul>
                                            <li>Any Product types that You want - Simple, Configurable</li>
                                            <li>Downloadable/Digital Products, Virtual Products</li>
                                            <li>Inventory Management with Backordered items</li>
                                            <li>Flatlock seams throughout.</li>
                                        </ul>
                                    </div>
                                </div>
                                <div id="ec-spt-nav-info" class="tab-pane fade">
                                    <div class="ec-single-pro-tab-moreinfo">
                                        <ul>
                                            <li><span>Weight</span> 1000 g</li>
                                            <li><span>Dimensions</span> 35 × 30 × 7 cm</li>
                                            <li><span>Color</span> Black, Pink, Red, White</li>
                                        </ul>
                                    </div>
                                </div>

                                {{-- <div id="ec-spt-nav-review" class="tab-pane fade">
                                    <div class="row">
                                        <div class="ec-t-review-wrapper">
                                            <div class="ec-t-review-item">
                                                <div class="ec-t-review-avtar">
                                                    <img src="../assetsUser/images/review-image/1.jpg" alt="" />
                                                </div>
                                                <div class="ec-t-review-content">
                                                    <div class="ec-t-review-top">
                                                        <div class="ec-t-review-name">Jeny Doe</div>
                                                        <div class="ec-t-review-rating">
                                                            <i class="ecicon eci-star fill"></i>
                                                            <i class="ecicon eci-star fill"></i>
                                                            <i class="ecicon eci-star fill"></i>
                                                            <i class="ecicon eci-star fill"></i>
                                                            <i class="ecicon eci-star-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="ec-t-review-bottom">
                                                        <p>Lorem Ipsum is simply dummy text of the printing and
                                                            typesetting industry. Lorem Ipsum has been the industry's
                                                            standard dummy text ever since the 1500s, when an unknown
                                                            printer took a galley of type and scrambled it to make a
                                                            type specimen.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ec-t-review-item">
                                                <div class="ec-t-review-avtar">
                                                    <img src="../assetsUser/images/review-image/2.jpg" alt="" />
                                                </div>
                                                <div class="ec-t-review-content">
                                                    <div class="ec-t-review-top">
                                                        <div class="ec-t-review-name">Linda Morgus</div>
                                                        <div class="ec-t-review-rating">
                                                            <i class="ecicon eci-star fill"></i>
                                                            <i class="ecicon eci-star fill"></i>
                                                            <i class="ecicon eci-star fill"></i>
                                                            <i class="ecicon eci-star-o"></i>
                                                            <i class="ecicon eci-star-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="ec-t-review-bottom">
                                                        <p>Lorem Ipsum is simply dummy text of the printing and
                                                            typesetting industry. Lorem Ipsum has been the industry's
                                                            standard dummy text ever since the 1500s, when an unknown
                                                            printer took a galley of type and scrambled it to make a
                                                            type specimen.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="ec-ratting-content">
                                            <h3>Add a Review</h3>
                                            <div class="ec-ratting-form">
                                                <form action="#">
                                                    <div class="ec-ratting-star">
                                                        <span>Your rating:</span>
                                                        <div class="ec-t-review-rating">
                                                            <i class="ecicon eci-star fill"></i>
                                                            <i class="ecicon eci-star fill"></i>
                                                            <i class="ecicon eci-star-o"></i>
                                                            <i class="ecicon eci-star-o"></i>
                                                            <i class="ecicon eci-star-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="ec-ratting-input">
                                                        <input name="your-name" placeholder="Name" type="text" />
                                                    </div>
                                                    <div class="ec-ratting-input">
                                                        <input name="your-email" placeholder="Email*" type="email"
                                                            required />
                                                    </div>
                                                    <div class="ec-ratting-input form-submit">
                                                        <textarea name="your-commemt"
                                                            placeholder="Enter Your Comment"></textarea>
                                                        <button class="btn btn-primary" type="submit"
                                                            value="Submit">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <!-- product details description area end -->
                </div>
                <!-- Sidebar Area Start -->
                <div class="ec-pro-leftside ec-common-leftside col-lg-3 order-lg-first col-md-12 order-md-last">

                    <div class="ec-sidebar-slider">
                        <div class="ec-sb-slider-title">Best Sellers</div>
                        <div class="ec-sb-pro-sl">
                            @forEach($productsOffer as $product)
                            @if(isset($product->offer))
                            <div>
                                <div class="ec-sb-pro-sl-item">
                                    <a href="/productView/{{$product->id}}" class="sidekka_pro_img"><img
                                            src="../images/{{$product->image}}" alt="product" /></a>
                                    <div class="ec-pro-content">
                                        <h5 class="ec-pro-title"><a href="/productView/{{$product->id}}">{{$product->name}}</a></h5>
                                        {{-- <div class="ec-pro-rating">
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star"></i>
                                        </div> --}}
                                        <span class="ec-price">
                                            <span class="old-price">${{$product->offer->oldPrice}}</span>
                                            <span class="new-price">${{$product->offer->newPrice}}</span>
                                        </span>
                                    </div>
                                </div>
                            </div>

@endif
@endforeach
                        </div>
                    </div>
                </div>
                <!-- Sidebar Area Start -->
            </div>
        </div>
    </section>
    <!-- End Single product -->


  <!-- Related Product Start -->
  <section class="section ec-releted-product section-space-p">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="section-title">
                    <h2 class="ec-bg-title">Related products</h2>
                    <h2 class="ec-title">Related products</h2>
                    <p class="sub-title">Browse The Collection of Top Products</p>
                </div>
            </div>
        </div>
        <div class="row margin-minus-b-30">
            <!-- Related Product Content -->
            @foreach($productsRelated as $product)
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6 pro-gl-content">
                <div class="ec-product-inner">
                    <div class="ec-pro-image-outer">
                        <div class="ec-pro-image">
                            <a href="product-left-sidebar.html" class="image">
                                <img class="main-image"
                                    src="../images/{{$product->image}}" alt="Product" />
                                <img class="hover-image"
                                    src="../images/{{$product->image}}" alt="Product" />
                            </a>
                            @if(isset($product->offer->offer))
                            <span class="percentage">{{$product->offer->offer}}%</span>
                            @endif
                            <a href="{{$product->id}}" value="{{$product->id}}" class="quickview" data-link-action="quickview"
                                title="Quick view" data-bs-toggle="modal"
                                data-bs-target="#ec_quickview_modal"><img
                                    src="../assetsUser/images/icons/quickview.svg" class="svg_img pro_svg"
                                    alt="" /></a>
                            <div class="ec-pro-actions">
                                <a href="compare.html" class="ec-btn-group compare"
                                    title="Compare"><img src="../assetsUser/images/icons/compare.svg"
                                        class="svg_img pro_svg" alt="" /></a>
                                <button title="Add To Cart" class=" add-to-cart"><img
                                        src="../assetsUser/images/icons/cart.svg" class="svg_img pro_svg"
                                        alt="" /> Add To Cart</button>
                                <a class="ec-btn-group wishlist" title="Wishlist"><img
                                        src="../assetsUser/images/icons/wishlist.svg"
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
                                            data-src="../assetsUser/images/product-image/6_1.jpg"
                                            data-src-hover="../assetsUser/images/product-image/6_1.jpg"
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
                    </div>
                </div>
</section>
<!-- Related Product end -->
@stop

@section('js')
<script>
$(document).on('click','.clickGallery',function(e){
    e.preventDefault();
    var colorGallery=$(this).attr('id');
   var productId=$('.productId').val()
   console.log(colorGallery);
   console.log(productId);


$.ajax({
headers: {
  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
 url:"/productGallery",
 type:"POST",
   data:{
    _token: $("#csrf").val(),

    colorGallery:colorGallery,
    productId:productId,
   },
   cache: false,
  success:function(data){
var counter=0;
var counterH=0;
    data.forEach(function (image) {
$(".zoomImg").each(function() {
    if(counterH==counter){
   $(this).attr('src', "../images/"+image+"");
    }
    counterH++

  });

        jQuery('.galleryChangeH'+counter).attr('src', "../images/"+image+"");
        jQuery('.galleryChange'+counter).attr('src', "../images/"+image+"");
        counter++
   counterH=0;
})

  }
});





});

///////the order ajax//////


$(document).on('click','.order',function(e){
e.preventDefault();
var product_id=$(this).val();
   $.ajax({
  type:"GET",
  url:'/order/'+product_id,
  success:function(data){
console.log(data);
  }

});
});

</script>
@stop

