@extends('master')
@section('content')
<div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
    <div>
        <h1>Add Product</h1>
        <p class="breadcrumbs"><span><a href="index.html">Home</a></span>
            <span><i class="mdi mdi-chevron-right"></i></span>Product</p>
    </div>
    <div>
        <a href="product-list.html" class="btn btn-primary"> View All
        </a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Add Product</h2>
            </div>

            <div class="card-body">
                <form  name="contact-form" id="adding_form" >
                    @csrf
                <div class="row ec-vendor-uploads">
                    <div class="col-lg-4">
                        <div class="ec-vendor-img-upload">
                            <div class="ec-vendor-main-img">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input  name="image_main" type='file' id="imageUpload" class="image_main ec-image-upload"
                                            accept=".png, .jpg, .jpeg" />
                                        <label for="imageUpload"><img
                                                src="assets/img/icons/edit.svg"
                                                class="svg_img header_svg" alt="edit" /></label>
                                    </div>
                                    <div class="avatar-preview ec-preview">
                                        <div class="imagePreview ec-div-preview">
                                            <img class="image_main ec-image-preview"
                                                src="assets/img/products/vender-upload-preview.jpg"
                                                alt="edit" />
                                        </div>
                                    </div>
                                    <span class="text-danger error-text image_main_err"></span>
                                </div>
                                <div class="thumb-upload-set colo-md-12">
                                    <div class="thumb-upload">
                                        <div class="thumb-edit">
                                            <input  name="images[]"type='file' id="thumbUpload01"
                                                class="image ec-image-upload"
                                                accept=".png, .jpg, .jpeg" />
                                            <label for="imageUpload"><img
                                                    src="assets/img/icons/edit.svg"
                                                    class="svg_img header_svg" alt="edit" /></label>
                                        </div>
                                        <div class="thumb-preview ec-preview">
                                            <div class="image-thumb-preview">
                                                <img class="image image-thumb-preview ec-image-preview"
                                                    src="assets/img/products/vender-upload-thumb-preview.jpg"
                                                    alt="edit" />
                                            </div>
                                        </div>
                                        <span class="text-danger error-text image_err"></span>
                                    </div>
                                    <div class="thumb-upload">
                                        <div class="thumb-edit">
                                            <input name="images[]" type='file' id="thumbUpload02"
                                                class="image ec-image-upload"
                                                accept=".png, .jpg, .jpeg" />
                                            <label for="imageUpload"><img
                                                    src="assets/img/icons/edit.svg"
                                                    class="svg_img header_svg" alt="edit" /></label>
                                        </div>
                                        <div class="thumb-preview ec-preview">
                                            <div class="image-thumb-preview">
                                                <img class="image image-thumb-preview ec-image-preview"
                                                    src="assets/img/products/vender-upload-thumb-preview.jpg"
                                                    alt="edit" />
                                            </div>
                                        </div>
                                        <span class="text-danger error-text image_err"></span>
                                    </div>
                                    <div class="thumb-upload">
                                        <div class="thumb-edit">
                                            <input  name="images[]" type='file' id="thumbUpload03"
                                                class="ec-image-upload"
                                                accept=".png, .jpg, .jpeg" />
                                            <label for="imageUpload"><img
                                                    src="assets/img/icons/edit.svg"
                                                    class="svg_img header_svg" alt="edit" /></label>
                                        </div>
                                        <div class="thumb-preview ec-preview">
                                            <div class="image-thumb-preview">
                                                <img class="image image-thumb-preview ec-image-preview"
                                                    src="assets/img/products/vender-upload-thumb-preview.jpg"
                                                    alt="edit" />
                                            </div>
                                        </div>
                                        <span class="text-danger error-text image_err"></span>
                                    </div>
                                    <div class="thumb-upload">
                                        <div class="thumb-edit">
                                            <input  name="images[]" type='file' id="thumbUpload04"
                                                class="image ec-image-upload"
                                                accept=".png, .jpg, .jpeg" />
                                            <label for="imageUpload"><img
                                                    src="assets/img/icons/edit.svg"
                                                    class="svg_img header_svg" alt="edit" /></label>
                                        </div>
                                        <div class="thumb-preview ec-preview">
                                            <div class="image-thumb-preview">
                                                <img class="image  image-thumb-preview ec-image-preview"
                                                    src="assets/img/products/vender-upload-thumb-preview.jpg"
                                                    alt="edit" />
                                            </div>
                                        </div>
                                        <span class="text-danger error-text image_err"></span>
                                    </div>
                                    <div class="thumb-upload">
                                        <div class="thumb-edit">
                                            <input  name="images[]" type='file' id="thumbUpload05"
                                                class="image ec-image-upload"
                                                accept=".png, .jpg, .jpeg" />
                                            <label for="imageUpload"><img
                                                    src="assets/img/icons/edit.svg"
                                                    class="svg_img header_svg" alt="edit" /></label>
                                        </div>
                                        <div class="thumb-preview ec-preview">
                                            <div class="image-thumb-preview">
                                                <img class="image  image-thumb-preview ec-image-preview"
                                                    src="assets/img/products/vender-upload-thumb-preview.jpg"
                                                    alt="edit" />
                                            </div>
                                        </div>
                                        <span class="text-danger error-text image_err"></span>
                                    </div>
                                    <div class="thumb-upload">
                                        <div class="thumb-edit">
                                            <input   name="images[]" type='file' id="thumbUpload06"
                                                class="image ec-image-upload"
                                                accept=".png, .jpg, .jpeg" />
                                            <label for="imageUpload"><img
                                                    src="assets/img/icons/edit.svg"
                                                    class="svg_img header_svg" alt="edit" /></label>
                                        </div>
                                        <div class="thumb-preview ec-preview">
                                            <div class="image-thumb-preview">
                                                <img class="image image-thumb-preview ec-image-preview"
                                                    src="assets/img/products/vender-upload-thumb-preview.jpg"
                                                    alt="edit" />
                                            </div>
                                        </div>
                                        <span class="text-danger error-text image_err"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="ec-vendor-upload-detail">
                            <div class="form row g-3">
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">Product name</label>
                                    <input name="name" type="text" class="name form-control slug-title" id="inputEmail4">
                                </div>
                                <span class="text-danger error-text name_err"></span>
                                <div class="col-md-6">
                                    <label class="form-label">Select Categories</label>
                                    <select name="subCategory_id" id="Categories" class="subCategory_id form-select">
                                        <option value="" disabled selected hidden>Choose a Sub Category</option>
                                        @foreach($subCategories as $subCategory)
                                        <option value="{{$subCategory->id}}">{{$subCategory->name}}</option>

                                        @endforeach
                                        {{-- <optgroup label="Fashion">
                                            <option value="t-shirt">T-shirt</option>
                                            <option value="dress">Dress</option>
                                        </optgroup>
                                        <optgroup label="Furniture">
                                            <option value="table">Table</option>
                                            <option value="sofa">Sofa</option>
                                        </optgroup>
                                        <optgroup label="Electronic">
                                            <option value="phone">I Phone</option>
                                            <option value="laptop">Laptop</option>
                                        </optgroup> --}}
                                    </select>
                                    <span class="text-danger error-text subCategory_id_err"></span>
                                </div>
                                <div class="col-md-12">
                                    <label for="slug" class="col-12 col-form-label">Slug</label>
                                    <div class="col-12">
                                        <input name="slug" id="slug" name="slug" class="slug form-control here set-slug" type="text">
                                    </div>
                                    <span class="text-danger error-text slug_err"></span>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Sort Description</label>
                                    <textarea class="sortDescription" name="sortDescription" class="form-control" rows="2"></textarea>
                                    <span class="text-danger error-text sortDescription_err"></span>
                                </div>
                                <div class="col-md-4 mb-25">
                                    <label class="form-label">Colors</label>
                                    <input class="color" name="color[]" type="color" class="form-control form-control-color"
                                        id="exampleColorInput1" value="#ff6191"
                                        title="Choose your color">
                                    <input class="color" name="color[]" type="color" class="form-control form-control-color"
                                        id="exampleColorInput2" value="#33317d"
                                        title="Choose your color">
                                    <input class="color" name="color[]" type="color" class="form-control form-control-color"
                                        id="exampleColorInput3" value="#56d4b7"
                                        title="Choose your color">
                                    <input class="color" name="color[]" type="color" class="form-control form-control-color"
                                        id="exampleColorInput4" value="#009688"
                                        title="Choose your color">
                                </div>
                                <div class="col-md-8 mb-25">
                                    <label class="form-label">Size USA</label>
                                    <input type="hidden" name="size[]" value="Size USA">
                                    <div class="form-checkbox-box">
                                        <div class="form-check form-check-inline">
                                            <input type="checkbox" class="size" name="size[]" value="S">
                                            <label>S</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="checkbox" name="size[]" value="M" class="size">
                                            <label>M</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input  class="size" type="checkbox" name="size[]" value="L">
                                            <label>L</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="checkbox" class="size" name="size[]" value="XL">
                                            <label>XL</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="checkbox" class="size" name="size[]" value="XXL">
                                            <label>XXL</label>
                                        </div>
                                    </div>
                                    <label class="form-label">Size Number</label>
                                    <input type="hidden" name="size[]" value="Size Number">
                                    <input name="size[]" type="text" class="size form-control " id="size" class="size">
                                    <div id="moreSize">

                                    </div>
                               <div class="btnSize row">
                                    <button  type="button" id="addMoreSize" class="btn btn-primary col-6">ADD MORE</button>

                                    <button type='button' id='showLessSize' class='btn btn-danger col-6 d-none'>Show Less</button>
                                </div>



                                <label class="form-label">Size Europe</label>
                                <input type="hidden" name="size[]" value="Size Europe">
                                <div class="form-checkbox-box">
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" name="size[]" class="size" value="S">
                                        <label>S</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" name="size[]" class="size" value="M">
                                        <label>M</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" name="size[]" class="size" value="L">
                                        <label>L</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" name="size[]" class="size" value="XL">
                                        <label>XL</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" name="size[]" class="size" value="XXL">
                                        <label>XXL</label>
                                    </div>
                                </div>
                                <label class="form-label">Size Number</label>
                                <input type="hidden" name="size[]" value="Size Number">

                                <input name="size[]" type="text" class="size form-control " id="size" class="size">
                                <div id="moreSizeE">

                                </div>
                           <div class="btnSizeE row">
                                <button  type="button" id="addMoreSizeE" class="btn btn-primary col-6">ADD MORE</button>

                                <button type='button' id='showLessSizeE' class='btn btn-danger col-6 d-none'>Show Less</button>
                            </div>

                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Price <span>( In USD
                                            )</span></label>
                                    <input class="price" name="price" type="number" class="form-control" id="price1">
                                    <span class="text-danger error-text price_err"></span>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Quantity</label>
                                    <input class="quantity" name="quantity" type="number" class="form-control" id="quantity1">
                                    <span class="text-danger error-text quantity_err"></span>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Ful Detail</label>
                                    <textarea class="fulDetail" name="fulDetail" class="form-control" rows="4"></textarea>
                                    <span class="text-danger error-text fulDetail_err"></span>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Product Tags <span>( Type and
                                            make comma to separate tags )</span></label>
                                    <input  type="text" class="productTag form-control" id="group_tag"
                                        name="productTag" placeholder=""
                                        data-role="tagsinput"/>
                                        <span class="text-danger error-text productTag_err"></span>
                                </div>

                                <div class="offer_info d-none row">
                                <div class="col-md-6">
                                    <label class="form-label">Product Offer<span> (The offer input from 100% )</span></label>
                                    <input  type="number" class="offer form-control"
                                        name="offer"
                                       />
                                        <span class="text-danger error-text offer_err"></span>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Product Offer endDate</label>
                                    <input  type="date" class="offer form-control"
                                        name="endDate"
                                       />
                                        <span class="text-danger error-text endDate_err"></span>
                                </div>
                            </div>
                            <button  type="button" id="addoffer" class="btn btn-primary col-12">ADD OFFER</button>
                            <button  type="button" id="removeoffer" class="btn btn-danger col-12 d-none">REMOVE OFFER</button>


                                <div class="col-md-12">
                                    <button type="submit"  class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>


@stop
@section('js')
<script>

//////////////////////////////////// adding in ajax ///////////////////
$("#adding_form").submit(function(e){
e.preventDefault();
   var formValues = new FormData($(this)[0])
   deleteErrorMsg();
$.ajax({
headers: {
  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
 url:"/product",
 type:"POST",
 data:formValues,
 cache: false,
 processData: false,
 contentType: false,
  success:function(data){
    if($.isEmptyObject(data.error)){
                      console.log(data);
                      deleteProductInput(data);
$('.offer').val("")
$( ".offer_info" ).addClass( "d-none" );
$( "#removeoffer" ).addClass( "d-none" );
$( "#addoffer" ).removeClass( "d-none" );

                      alertSucces( 'success','The data is added sucessfully.');
                  }else{
                      printErrorMsg(data.error);
                  }
  }
});
});

//////////////////////////////end of adding in ajax///////////////////////////

var counter_size=0
$("#addMoreSize").click(function(e){
e.preventDefault();
counter_size++;
$('#moreSize').append("<input name='size[]' type='text' class='size form-control' id='size"+counter_size+"' class='size'>")
if(counter_size==1){
$( "#showLessSize" ).removeClass( "d-none" );
}
});
$("#showLessSize").click(function(e){
e.preventDefault();
$("#size"+counter_size).remove();
counter_size--;
if(counter_size==0){
$( "#showLessSize" ).addClass( "d-none" )
}
});


/////////////////////////////////////////////////////////////
var counter_sizeE=0
$("#addMoreSizeE").click(function(e){
e.preventDefault();
counter_sizeE++;
$('#moreSizeE').append("<input name='size[]' type='text' class='size form-control' id='size"+counter_sizeE+"' class='size'>")
if(counter_sizeE==1){
$( "#showLessSizeE" ).removeClass( "d-none" );
}
});
$("#showLessSizeE").click(function(e){
e.preventDefault();
$("#size"+counter_sizeE).remove();
counter_sizeE--;
if(counter_sizeE==0){
$( "#showLessSizeE" ).addClass( "d-none" )
}
});

//////offer add/////
$("#addoffer").click(function(e){
$( ".offer_info" ).removeClass( "d-none" );
$( "#removeoffer" ).removeClass( "d-none" );
$( "#addoffer" ).addClass( "d-none" );

});
$("#removeoffer").click(function(e){
$('.offer').val("")
$( ".offer_info" ).addClass( "d-none" );
$( "#removeoffer" ).addClass( "d-none" );
$( "#addoffer" ).removeClass( "d-none" );

});
</script>
@stop
