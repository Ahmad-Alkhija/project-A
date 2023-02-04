@extends('masterUser')
@section('class')
shop_page
@stop
@section('content')

  <!-- Ec breadcrumb start -->
  <div class="ec-side-cart-overlay"></div>
  <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row ec_breadcrumb_inner">
                    <div class="col-md-6 col-sm-12">
                        <h2 class="ec-breadcrumb-title">Shop</h2>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <!-- ec-breadcrumb-list start -->
                        <ul class="ec-breadcrumb-list">
                            <li class="ec-breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="ec-breadcrumb-item active">Shop</li>
                        </ul>
                        <!-- ec-breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Ec breadcrumb end -->
<!-- Ec Shop page -->
<section class="ec-page-content section-space-p">
    <div class="container">
        <div class="row">
            <div class="ec-shop-rightside col-lg-9 order-lg-last col-md-12 order-md-first margin-b-30">
                <!-- Shop Top Start -->
                <div class="ec-pro-list-top d-flex">
                    <div class="col-md-6 ec-grid-list">
                        <div class="ec-gl-btn">
                            <button class="btn btn-grid active"><img src="assetsUser/images/icons/grid.svg"
                                    class="svg_img gl_svg" alt="" /></button>
                            <button class="btn btn-list"><img src="assetsUser/images/icons/list.svg"
                                    class="svg_img gl_svg" alt="" /></button>
                        </div>
                    </div>
                    <div class="col-md-6 ec-sort-select">
                        <span class="sort-by">Sort by</span>
                        <div class="ec-select-inner">
                            <select name="ec-select" id="ec-select">
                                <option selected disabled>Position</option>
                                <option value="1">Relevance</option>
                                <option value="2">Name, A to Z</option>
                                <option value="3">Name, Z to A</option>
                                <option value="4">Price, low to high</option>
                                <option value="5">Price, high to low</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- Shop Top End -->

                <!-- Shop content Start -->
                <section class="ec-page-content section-space-p">
                <div class="shop-pro-content">
                    <div class="shop-pro-inner">
                        <div class="row cardL">
                @include('includeUser.card',[
                    'reloadPage'=>0,
                ]);
                        </div>
                    </div>
                    <!-- Ec Pagination Start -->
                    <div class="ec-pro-pagination">
                        <span>Showing 1-12 of 21 item(s)</span>
                        <ul class="ec-pro-pagination-inner">
                            <li><a class="active" href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a class="next" href="#">Next <i class="ecicon eci-angle-right"></i></a></li>
                        </ul>
                    </div>
                    <!-- Ec Pagination End -->
                </div>
                <!--Shop content End -->
            </div>
            <!-- Sidebar Area Start -->

            <div class="ec-shop-leftside col-lg-3 order-lg-first col-md-12 order-md-last">
                <div id="shop_sidebar">
                    <div class="ec-sidebar-heading">
                        <h1>Filter Products By</h1>
                    </div>
                    <div class="ec-sidebar-wrap">
                        <form id="fluter">
                            @csrf
                        <!-- Sidebar Category Block -->
                        <div class="ec-sidebar-block">
                            <div class="ec-sb-title">
                                <h3 class="ec-sidebar-title">Category</h3>
                            </div>
                            <div class="ec-sb-block-content">
                                <ul>

                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input type="checkbox" checked /> <a href="#">ALL</a><span
                                                class="checked"></span>
                                        </div>
                                    </li>
                                    @foreach($categorys as $category)
                                    <li>

                                        <div class="ec-sidebar-block-item">

                                            <input type="checkbox" class="filtering_change" name="category[]" value="{{$category->id}}"/><a>{{$category->name}}</a><span
                                                class="checked"></span>

                                        </div>

                                    </li>
                                    @endforeach

                                    {{-- <li id="ec-more-toggle-content" style="padding: 0; display: none;">
                                        <ul>
                                            <li>
                                                <div class="ec-sidebar-block-item">
                                                    <input type="checkbox" /> <a href="#">Watch</a><span
                                                        class="checked"></span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="ec-sidebar-block-item">
                                                    <input type="checkbox" /> <a href="#">Cap</a><span
                                                        class="checked"></span>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item ec-more-toggle">
                                            <span class="checked"></span><span id="ec-more-toggle">More
                                                Categories</span>
                                        </div>
                                    </li> --}}

                                </ul>
                            </div>
                        </div>
                        {{-- <!-- Sidebar Size Block -->
                        <div class="ec-sidebar-block">
                            <div class="ec-sb-title">
                                <h3 class="ec-sidebar-title">Size</h3>
                            </div>
                            <div class="ec-sb-block-content">
                                <ul>
                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input name="size[]"class="filtering_change"  type="checkbox" value='S'  /><a href="#">S</a><span
                                                class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input name="size[]"class="filtering_change" type="checkbox" value="M" /><a href="#">M</a><span
                                                class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input name="size[]"class="filtering_change" type="checkbox" value="L" /> <a href="#">L</a><span
                                                class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input name="size[]"class="filtering_change" type="checkbox" value="XL" /><a href="#">XL</a><span
                                                class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input name="size[]"class="filtering_change" type="checkbox" value="XXL" /><a href="#">XXL</a><span
                                                class="checked"></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div> --}}


 <!-- Sidebar Sale type Block -->
 <div class="ec-sidebar-block">
    <div class="ec-sb-title">
        <h3 class="ec-sidebar-title">Gnder</h3>
    </div>
    <div class="ec-sb-block-content">
        <ul>
            <li>
                <div class="ec-sidebar-block-item">
                    <input name="gender[]"class="filtering_change"  type="checkbox" value='men'  /><a href="#">Men</a><span
                        class="checked"></span>
                </div>
            </li>
            <li>
                <div class="ec-sidebar-block-item">
                    <input name="gender[]"class="filtering_change" type="checkbox" value="women" /><a href="#">Wonen</a><span
                        class="checked"></span>
                </div>
            </li>
            <li>
                <div class="ec-sidebar-block-item">
                    <input name="gender[]"class="filtering_change" type="checkbox" value="boy" /> <a href="#">boy(Kid)</a><span
                        class="checked"></span>
                </div>
            </li>



            <li>
                <div class="ec-sidebar-block-item">
                    <input name="gender[]"class="filtering_change" type="checkbox" value="girl"/> <a href="#">girl(Kid)</a><span
                        class="checked"></span>
                </div>
            </li>


        </ul>
    </div>
</div>










 <!-- Sidebar Sale type Block -->
 <div class="ec-sidebar-block">
    <div class="ec-sb-title">
        <h3 class="ec-sidebar-title">Sale Type</h3>
    </div>
    <div class="ec-sb-block-content">
        <ul>

            <li>
                <div class="ec-sidebar-block-item">
                    <input name="saleType[]"class="filtering_change"  type="checkbox" value='WholeSale'  /><a href="#">Whole Sale</a><span
                        class="checked"></span>
                </div>
            </li>
            <li>
                <div class="ec-sidebar-block-item">
                    <input name="saleType[]"class="filtering_change" type="checkbox" value="RetailSale" /><a href="#">Retail Sale</a><span
                        class="checked"></span>
                </div>
            </li>
            <li>
                <div class="ec-sidebar-block-item">
                    <input name="saleType[]"class="filtering_change" type="checkbox" value="RetailSale&WholeSale" /> <a href="#">Whole and Retail Sale</a><span
                        class="checked"></span>
                </div>
            </li>


        </ul>
    </div>
</div>

                        {{-- <!-- Sidebar Color item -->
                        <div class="ec-sidebar-block ec-sidebar-block-clr">
                            <div class="ec-sb-title">
                                <h3 class="ec-sidebar-title">Color</h3>
                            </div>
                            <div class="ec-sb-block-content">
                                <ul>
                                    <li>
                                        <div class="ec-sidebar-block-item"><span
                                                style="background-color:#c4d6f9;"></span></div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item"><span
                                                style="background-color:#ff748b;"></span></div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item"><span
                                                style="background-color:#000000;"></span></div>
                                    </li>
                                    <li class="active">
                                        <div class="ec-sidebar-block-item"><span
                                                style="background-color:#2bff4a;"></span></div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item"><span
                                                style="background-color:#ff7c5e;"></span></div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item"><span
                                                style="background-color:#f155ff;"></span></div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item"><span
                                                style="background-color:#ffef00;"></span></div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item"><span
                                                style="background-color:#c89fff;"></span></div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item"><span
                                                style="background-color:#7bfffa;"></span></div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item"><span
                                                style="background-color:#56ffc1;"></span></div>
                                    </li>
                                </ul>
                            </div>
                        </div> --}}
                        <!-- Sidebar Price Block -->
                        <div class="ec-sidebar-block">
                            <div class="ec-sb-title">
                                <h3 class="ec-sidebar-title">Price</h3>
                            </div>
                            <div class="ec-sb-block-content es-price-slider ">
                                <div class="ec-price-filter filtering_click">
                                    <div id="ec-sliderPrice" class="filter__slider-price " data-min="0"
                                        data-max="{{$priceMax}}" data-step="10"></div>
                                    <div class="ec-price-input">
                                        <label class="filter__label"><input type="number" name="priceMin"
                                                class="filter__input filtering_input "></label>
                                        <span class="ec-price-divider"></span>
                                        <label class="filter__label"><input type="number" name="priceMax"
                                                class="filter__input filtering_input "></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

@stop
@section('js')
<script>
//   $('.edit').click(function() {
// var formValues = new FormData($('#fluter')[0])
// console.log(formValues)

//     $.ajax({
//         headers: {
//   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
// },
//   url:"/categoryUser",
//   type:"POST",
//   data:formValues,
//   cache: false,
//   processData: false,
//   contentType: false,
//       success:function(data){
//         console.log(data);
//       }
//     });
//     })

$(document).on('change','.filtering_change',function(e){
e.preventDefault();
   var formValues = new FormData($('#fluter')[0])
   console.log(1);

$.ajax({
headers: {
  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
 url:"/categoryUser",
 type:"POST",
 data:formValues,
 cache: false,
 processData: false,
 contentType: false,
  success:function(data){
    $('.cardL').html(data)
    console.log(data)

  }
});
});



$(document).on('click','.filtering_click',function(e){
e.preventDefault();
   var formValues = new FormData($('#fluter')[0])
   console.log(1);

$.ajax({
headers: {
  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
 url:"/categoryUser",
 type:"POST",
 data:formValues,
 cache: false,
 processData: false,
 contentType: false,
  success:function(data){
    $('.cardL').html(data)
    console.log(data)

  }
});
});




$(document).on('input','.filtering_input',function(e){
e.preventDefault();
   var formValues = new FormData($('#fluter')[0])
   console.log(1);

$.ajax({
headers: {
  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
 url:"/categoryUser",
 type:"POST",
 data:formValues,
 cache: false,
 processData: false,
 contentType: false,
  success:function(data){
    $('.cardL').html(data)
    console.log(data)

  }
});
});

$(document).on('click','.quickview',function(e){
categoryUser_id=$(this).attr("href");
$.ajax({
  type:"GET",
  url:'/categoryUser/'+categoryUser_id,
  success:function(data){
console.log(data);


jQuery('.img-responsive').attr('src', "images/"+data.image+"");
$('.nameP').html(data.name);
if(data.offer==null){
    $('.price-modal').html(data.price);
    $('.old-price-modal').html('');

}else{
    $('.old-price-modal').html(data.offer.oldPrice);
    $('.new-price-modal').html(data.offer.newPrice);


}
$('.sortD').html(data.sortDescription);
console.log(data.color)

data.color.forEach(function (color) {


    $('.color-modal').append('<li class="colorMM" ><span class="colorMM" style="background-color:'+color+';"></span></li>')

 })






  }
});
});
$("#ec_quickview_modal").on('hide.bs.modal', function(){
    $('.colorMM').remove()
});


</script>

@stop
