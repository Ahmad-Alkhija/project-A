@extends('master')
@section('content')

<div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
    <div>
        <h1>Product</h1>
        <p class="breadcrumbs"><span><a href="index.html">Home</a></span>
            <span><i class="mdi mdi-chevron-right"></i></span>Product</p>
    </div>
    <div>
        <a href="product-list.html" class="btn btn-primary"> Add Porduct</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="responsive-data-table" class="table"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Offer</th>
                                <th>Purchased</th>
                                <th>Stock</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($products as $product)
                            <tr class="row{{$product->id}}">
                                <td ><img id="image{{$product->id}}" class="tbl-thumb" src="images/{{$product->image}}" alt="Product Image" /></td>
                                <td id="name{{$product->id}}">{{$product->name}}</td>
                                <td id="price{{$product->id}}">{{$product->price}}$</td>
@if(!isset($product->offer->offer))
<td id="offer"><button  type="button" id="addoffer" value="{{$product->id}}" class="btn btn-outline-success btn-sm col-7">ADD OFFER</button></td>
@else
                                <td>{{$product->offer->offer}}%</td>
                                @endif

                                <td>61</td>
                                <td id="quantity{{$product->id}}">{{$product->quantity}}</td>
                                <td>ACTIVE</td>
                                <td>{{$product->created_at->format('m/d/Y')}}</td>
                                <td>
                                    <div class="btn-group mb-1">
                                        <button type="button" id="info" value="{{$product->id}}" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#infoModal">Info</button>
                                        <button type="button"
                                            class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false" data-display="static">
                                            <span class="sr-only">Info</span>
                                        </button>

                                        <div class="dropdown-menu">
                                            <button class="dropdown-item"  id="edit" value="{{$product->id}}">Edit</button>
                                            <button class="dropdown-item" id ="delete"value="{{$product->id}}" href="#">Delete</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{{--              The delete Modal                  --}}
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <form class="form" id="my_from_delete">
        <div class="modal-header">
          <h3 class="modal-title" id="infoModalLabel">Category Info</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
           <div class="form-group">
            <h3>Are you Sure </h3>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
          <button type="submit" class="btn btn-success">Yes</button>
        </div>
          </form>
      </div>
    </div>
  </div>
   {{--               end The Info Modal                  --}}









     {{--                The edit Modal                  --}}

     <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content" >
            <div class="card card-default">

            <form class="form" id="updateing_form" enctype="multipart/form-data">
            <div class="modal-header">
              <h2 class="modal-title" id="exampleModalLabel">Edit Modal</h2>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                    @csrf
                    <input type="hidden" name="_method" value="PUT">





                                @csrf
                            <div class="row ec-vendor-uploads">
                                <div class="col-lg-4">
                                    <div class="ec-vendor-img-upload">
                                        <div class="ec-vendor-main-img">
                                            <div class="avatar-upload">
                                                <div class="avatar-edit">
                                                    <input  name="image_main" type='file' id="imageUpload " class="image_main_edit ec-image-upload"
                                                        accept=".png, .jpg, .jpeg" />
                                                    <label for="imageUpload"><img
                                                            src="assets/img/icons/edit.svg"
                                                            class="svg_img header_svg" alt="edit" /></label>
                                                </div>
                                                <div class="avatar-preview ec-preview">
                                                    <div class="imagePreview ec-div-preview">
                                                        <img class="image_main_edit ec-image-preview"
                                                            src="assets/img/products/vender-upload-preview.jpg"
                                                            alt="edit" />
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="thumb-upload-set colo-md-12">
                                                <div class="thumb-upload">
                                                    <input name="images[0]" type="hidden number"     class="image_id1">
                                                    <div class="thumb-edit">

                                                        <input  name="images[1]" value="null" type='file'  id="thumbUpload01"
                                                            class="image1 ec-image-upload"
                                                            accept=".png, .jpg, .jpeg" />
                                                        <label for="imageUpload"><img
                                                                src="assets/img/icons/edit.svg"
                                                                class="svg_img header_svg" alt="edit" /></label>
                                                    </div>
                                                    <div class="thumb-preview ec-preview">

                                                        <div class="image-thumb-preview">
                                                            <img class="image1 image-thumb-preview ec-image-preview"
                                                                src="assets/img/products/vender-upload-thumb-preview.jpg"
                                                                alt="edit" />
                                                        </div>
                                                    </div>

                                                </div>
                                                <input name="images[2]"  type="hidden" class="image_id2" >
                                                <div class="thumb-upload">
                                                    <div class="thumb-edit">

                                                        <input name="images[3]" type='file'  id="thumbUpload02"
                                                            class="image2 ec-image-upload"
                                                            accept=".png, .jpg, .jpeg" />
                                                        <label for="imageUpload"><img
                                                                src="assets/img/icons/edit.svg"
                                                                class="svg_img header_svg" alt="edit" /></label>
                                                    </div>
                                                    <div class="thumb-preview ec-preview">
                                                        <div class="image-thumb-preview">
                                                            <img class="image2 image-thumb-preview ec-image-preview"
                                                                src="assets/img/products/vender-upload-thumb-preview.jpg"
                                                                alt="edit" />
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="thumb-upload">
                                                    <div class="thumb-edit">
                                                        <input type="hidden" class="image_id3" name="images[4]" >
                                                        <input   name="images[5]" type='file' id="thumbUpload03"
                                                            class=" image3 ec-image-upload"
                                                            accept=".png, .jpg, .jpeg" />
                                                        <label for="imageUpload"><img
                                                                src="assets/img/icons/edit.svg"
                                                                class="svg_img header_svg" alt="edit" /></label>
                                                    </div>
                                                    <div class="thumb-preview ec-preview">
                                                        <div class="image-thumb-preview">
                                                            <img class="image3 image-thumb-preview ec-image-preview"
                                                                src="assets/img/products/vender-upload-thumb-preview.jpg"
                                                                alt="edit" />
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="thumb-upload">
                                                    <div class="thumb-edit">
                                                        <input type="hidden" class="image_id4" name="images[6]" value="">
                                                        <input  name="images[7]" type='file' id="thumbUpload04"
                                                            class="image4 ec-image-upload"
                                                            accept=".png, .jpg, .jpeg" />
                                                        <label for="imageUpload"><img
                                                                src="assets/img/icons/edit.svg"
                                                                class="svg_img header_svg" alt="edit" /></label>
                                                    </div>
                                                    <div class="thumb-preview ec-preview">
                                                        <div class="image-thumb-preview">
                                                            <img class="image4  image-thumb-preview ec-image-preview"
                                                                src="assets/img/products/vender-upload-thumb-preview.jpg"
                                                                alt="edit" />
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="thumb-upload">
                                                    <div class="thumb-edit">
                                                        <input type="hidden" class="image_id5" name="images[8]">
                                                        <input  name="images[9]" type='file' id="thumbUpload05"
                                                            class="image5 ec-image-upload"
                                                            accept=".png, .jpg, .jpeg" />
                                                        <label for="imageUpload"><img
                                                                src="assets/img/icons/edit.svg"
                                                                class="svg_img header_svg" alt="edit" /></label>
                                                    </div>
                                                    <div class="thumb-preview ec-preview">
                                                        <div class="image-thumb-preview">
                                                            <img class="image5  image-thumb-preview ec-image-preview"
                                                                src="assets/img/products/vender-upload-thumb-preview.jpg"
                                                                alt="edit" />
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="thumb-upload">
                                                    <div class="thumb-edit">
                                                        <input type="hidden" class="image_id6" name="images[10]" >
                                                        <input   name="images[11]" type='file' id="thumbUpload06"
                                                            class="image6 ec-image-upload"
                                                            accept=".png, .jpg, .jpeg" />
                                                        <label for="imageUpload"><img
                                                                src="assets/img/icons/edit.svg"
                                                                class="svg_img header_svg" alt="edit" /></label>
                                                    </div>
                                                    <div class="thumb-preview ec-preview">
                                                        <div class="image-thumb-preview">
                                                            <img class="image6 image-thumb-preview ec-image-preview"
                                                                src="assets/img/products/vender-upload-thumb-preview.jpg"
                                                                alt="edit" />
                                                        </div>
                                                    </div>

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
                                                <input name="name" id="name_edit" type="text" class="name form-control slug-title" id="inputEmail4">
                                                <span class="text-danger error-text name_err"></span>
                                            </div>
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
                                                <span class="text-danger error-text subCategory_id_edit_err"></span>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="slug" class="col-12 col-form-label">Slug</label>
                                                <div class="col-12">
                                                    <input name="slug" id="slug_edit" name="slug" class="slug form-control here set-slug" type="text">
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
                                                <input class="color1" name="color[]" type="color" class="form-control form-control-color"
                                                    id="exampleColorInput1" value="#ff6191"
                                                    title="Choose your color">
                                                <input class="color2" name="color[]" type="color" class="form-control form-control-color"
                                                    id="exampleColorInput2" value="#33317d"
                                                    title="Choose your color">
                                                <input class="color3" name="color[]" type="color" class="form-control form-control-color"
                                                    id="exampleColorInput3" value="#56d4b7"
                                                    title="Choose your color">
                                                <input class="color4" name="color[]" type="color" class="form-control form-control-color"
                                                    id="exampleColorInput4" value="#009688"
                                                    title="Choose your color">
                                            </div>
                                            <div class="col-md-8 mb-25">
                                                <label class="form-label">Size USA</label>
                                                <input type="hidden" name="size[]" value="Size USA">
                                                <div class="form-checkbox-box">
                                                    <div class="form-check form-check-inline">
                                                        <input type="checkbox" class="size" id="susa" name="size[]" value="S">
                                                        <label>S</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input id="musa"  type="checkbox" name="size[]" value="M" class="size">
                                                        <label>M</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input id="lusa"  class="size" type="checkbox" name="size[]" value="L">
                                                        <label>L</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input id="xlusa"  type="checkbox" class="size" name="size[]" value="XL">
                                                        <label>XL</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="checkbox" class="size"  id="xxlusa"   name="size[]" value="XXL">
                                                        <label>XXL</label>
                                                    </div>
                                                </div>
                                                <label class="form-label">Size Number</label>
                                                <input type="hidden" value="Size Number" name="size[]">

                                                <input name="size[]" type="text" class="size form-control" id="size_usa" >
                                                <div id="moreSize_edit">

                                                </div>
                                           <div class="btnSize_edit row">
                                                <button  type="button" id="addMoreSize_edit" class="btn btn-primary col-6">ADD MORE</button>

                                                <button type='button' id='showLessSize_edit' class='btn btn-danger col-6 d-none'>Show Less</button>
                                            </div>



                                            <label class="form-label">Size Europe</label>
                                            <input type="hidden" name="size[]" value="Size Europe">
                                            <div class="form-checkbox-box">
                                                <div class="form-check form-check-inline">
                                                    <input type="checkbox" name="size[]" id="seu" class="size" value="S">
                                                    <label>S</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="checkbox" name="size[]" id="meu"  class="size" value="M">
                                                    <label>M</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="checkbox" name="size[]" id="leu" class="size" value="L">
                                                    <label>L</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="checkbox" name="size[]" id="xleu"  class="size" value="XL">
                                                    <label>XL</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="checkbox" name="size[]" id="xxleu"  class="size" value="XXL">
                                                    <label>XXL</label>
                                                </div>
                                            </div>
                                            <label class="form-label">Size Number</label>
                                            <input type="hidden" value="Size Number" name="size[]">

                                            <input name="size[]" type="text" class="size  form-control " id="size_eu">
                                            <div id="moreSizeE_edit">

                                            </div>
                                       <div class="btnSizeE_edit row">
                                            <button  type="button" id="addMoreSizeE_edit" class="btn btn-primary col-6">ADD MORE</button>

                                            <button type='button' id='showLessSizeE_edit' class='btn btn-danger col-6 d-none'>Show Less</button>
                                        </div>

                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label">Price <span>( In USD
                                                        )</span></label>
                                                <input class="price" name="price" type="number" class="form-control" id="price_edit">
                                                <span class="text-danger error-text price_err"></span>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Quantity</label>
                                                <input class="quantity" name="quantity" type="number" class="form-control" id="quantity_edit">
                                                <span class="text-danger error-text quantity_err"></span>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label">Ful Detail</label>
                                                <textarea class="fulDetail" name="fulDetail" class="form-control" id="fulDetail_edit" rows="4"></textarea>
                                                <span class="text-danger error-text fulDetail_err"></span>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label">Product Tags <span>( Type and
                                                        make comma to separate tags )</span></label>
                                                <input  type="text" class="productTag form-control" id="productTag_edit"
                                                    name="productTag" placeholder=""
                                                    data-role="tagsinput"/>
                                                    <span class="text-danger error-text productTag_err"></span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>




            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success">Save changes</button>
            </div>
        </form>
          </div>
        </div>
        </div>
      </div>


      {{--  --}}
{{--              The edit Modal                  --}}
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form class="form" id="adding_form">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLabel">Edit Modal</h2>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="ec-cat-form">
                @csrf
                <div class="offer_info row">
                    <div class="col-md-6">
                        <input type="hidden" id="product_id" value="" name="product_id">
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

            </div>



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Save</button>
        </div>
    </form>
      </div>
    </div>
  </div>
@stop
@section('js')
<script>




//adding ajax offer//////////
$("#adding_form").submit(function(e){
e.preventDefault()
var formValues = new FormData($(this)[0])
deleteErrorMsg();
$.ajax({
headers: {
  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
 url:"/offer",
 type:"POST",
 data:formValues,
 cache: false,
 processData: false,
 contentType: false,
  success:function(data){
    if($.isEmptyObject(data.error)){
                      console.log(data);
                      $('.offer').val(" ");
                      $('#addModal').modal('toggle');
                      $("#offer").html(data.offer+"%")
                      alertSucces( 'success','The data is added sucessfully.');

                  }else{
                      printErrorMsg(data.error);
                  }
  }
});
});


$(document).on('click','#addoffer',function(e){
    gProduct_id=$(this).val();
    $('#addModal').modal('toggle');
    $('#product_id').val(gProduct_id);

});

var listProduct_id
var counter_size_edit=0
var counter_sizeE_edit=0
var counter_input=0;
var texttrue;
var texttrueE;
var counter_inputE=0;
var counter_loop=0
var counter_color=0
var counter_image=0
var counter_dispalyE=0;
var counter_dispaly=0;





//////////////////////////// edit ajax/////////////////////////
$(document).on('click','#edit',function(e){
e.preventDefault();
$('.size').prop('checked', false);
 listProduct_id=$(this).val();
$('#editModal').modal('toggle');
$.ajax({
  type:"GET",
  url:'/listProduct/'+listProduct_id+'/edit',
  success:function(data){
    console.log(data);
var size_name;
var counter=0;
    data[0].size.forEach(function(size) {
        if(size=="Size USA"||size=="Size Europe"){
counter++
        }
        if(counter==1){
if(size=='S')
$('#susa').prop("checked", true );

if(size=='M')
$('#musa').prop("checked", true );

if(size=='L')
$('#lusa').prop("checked", true );

if(size=='XL')
$('#xlusa').prop("checked", true );

if(size=='XXL')
$('#xxlusa').prop("checked", true );

if(size=="Size Number"){
    texttrue=true;
}

if( texttrue===true){
    if(counter_input==1){
    $('#size_usa').val(size);
    }
    if(counter_input!=1&&counter_input!=0){
    counter_dispaly++

        $('#moreSize_edit').append("<input name='size[]' type='text' class='size form-control' id='size_usa"+counter_dispaly+"' class='size'>")
        if(counter_input==2)
    $( "#showLessSize_edit" ).removeClass( "d-none" );
    $('#size_usa'+ counter_dispaly).val(size);
    }
    counter_input++;

}

        }

     if(counter==2){
 if(size=='S')
$('#seu').prop("checked", true );

if(size=='M')
$('#meu').prop("checked", true );

if(size=='L')
$('#leu').prop("checked", true );

if(size=='XL')
$('#xleu').prop("checked", true );

if(size=='XXL')
$('#xxleu').prop("checked", true );


if(size=="Size Number"){
    texttrueE=true;
}

if( texttrueE===true){
    if(counter_inputE==1){
    $('#size_eu').val(size);
    }
    if(counter_inputE!=1&&counter_inputE!=0){
    counter_dispalyE++
        $('#moreSizeE_edit').append("<input name='size[]' type='text' class='size form-control' id='size_eu"+counter_dispalyE+"' class='size'>")
    if(counter_inputE==2){
    $( "#showLessSizeE_edit" ).removeClass( "d-none" );
    }
    $('#size_eu'+counter_dispalyE).val(size);

    }
    counter_inputE++;

}
 }
 counter_loop++
 if(counter_loop==data[0].size.length-1){


 }
});
//deleting input in the edit modal
$("#editModal").on('hide.bs.modal', function(){
  deleteErrorMsg();

    $('.size').prop('checked', false);

    for(i=counter_dispaly;i!=0;i--){
            $("#size_usa"+i).remove();
            if(i==counter_dispaly){
                $( "#showLessSize_edit" ).addClass( "d-none" );

            }
    }
    for(i=counter_dispalyE;i!=0;i--){
            $("#size_eu"+i).remove();
            if(i==counter_dispalyE){
         $( "#showLessSizeE_edit" ).addClass( "d-none" );
    }

    }

for(i=counter_image;i!=0;i--){
    jQuery('.image'+i).attr('src', 'assets/img/products/vender-upload-thumb-preview.jpg');
    $(".image"+i).val("");
}


for(i=counter_color;i!=0;i--){
    $('.color'+i).val("");
}

 counter_inputE=0;
 counter_input=0;
 counter_size_edit=0
 counter_sizeE_edit=0
 texttrue=false;
 texttrueE=false;
 counter_loop=0
 counter_image=0;
 counter_color=0;
 counter_dispalyE=0;
 counter_dispaly=0;
  });

  data[1].forEach(function(img) {
    counter_image++;
    $('.image_id'+counter_image).val(data[1][counter_image-1].id);
    jQuery('.image'+counter_image).attr('src', "images/"+img.image+"");
  });

  data[0].color.forEach(function(colors) {
    counter_color++;
    $('.color'+counter_color).val(""+colors+"");
  });


  $('#name_edit').val(""+data[0].name+"");
  $(".subCategory_id option[value='"+data[0].subCategory_id+"']").prop("selected","selected");
  $('#slug_edit').val(""+data[0].slug+"");
  $('.sortDescription').val(""+data[0].sortDescription+"");
  $('#quantity_edit').val(""+data[0].quantity+"");
  $('#fulDetail_edit').val(""+data[0].fulDetail+"");
  $('#price_edit').val(""+data[0].price+"");
  $('#productTag_edit').val(""+data[0].productTag+"");
  jQuery('.image_main_edit').attr('src', "images/"+data[0].image+"");
  $('.image_main_edit').val("");



  }
});
});
//////////////////////// end of edit ajax///////////////////////////////////////





//--/////////////////////////////////// update in ajax ////////////////////////

$("#updateing_form").submit(function(e){
  e.preventDefault();
  deleteErrorMsg();
  var formValues2 = new FormData($(this)[0])
  $.ajax({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
  url:"/listProduct/"+listProduct_id,
  type:"POST",
   data:formValues2,
  contentType: false,
  processData: false,
  cache: false,
success:function(data){
  if($.isEmptyObject(data.error)){
  console.log(data);

   $("#name"+data.id).html(data.name);
   $("#price"+data.id).html(data.price);
   $("#quantity"+data.id).html(data.quantity);
  jQuery('#image'+data.id).attr('src', "images/"+data.image+"");

;


   $('#editModal').modal('hide');
   alertSucces( 'success','The data is update sucessfully.');

  }else{
    printErrorMsg(data.error);
  }

}
  });
});
//--////////////////////////////////// end update in ajax /////////////////////
$("#my_from_delete").submit(function(e){

e.preventDefault();
$.ajax({
headers: {
  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
type:"delete",
url:"/listProduct/"+listProduct_id,
_token: $("#csrf").val(),
success:function(response){
$(".row"+response.id).remove();
$('#deleteModal').modal('hide');
alertSucces( 'success','The data is deleted sucessfully.');


}
});
});
$(document).on('click','#delete',function(e){
e.preventDefault();
listProduct_id=$(this).val();
$('#deleteModal').modal('show');
});







$("#addMoreSize_edit").click(function(e){
e.preventDefault();
counter_dispaly++;
$('#moreSize_edit').append("<input name='size[]' type='text' class='size form-control' id='size_usa"+counter_dispaly+"' class='size'>")
if(counter_dispaly==1){
$( "#showLessSize_edit" ).removeClass( "d-none" );
}
});
$("#showLessSize_edit").click(function(e){
e.preventDefault();
$("#size_usa"+counter_dispaly).remove();
counter_dispaly--;
if(counter_dispaly==0){
$( "#showLessSize_edit" ).addClass( "d-none" )
}
});







$("#addMoreSizeE_edit").click(function(e){
e.preventDefault();
counter_dispalyE++;
$('#moreSizeE_edit').append("<input name='size[]' type='text' class='size form-control' id='size_eu"+counter_dispalyE+"' class='size'>")
if(counter_dispalyE==1){
$( "#showLessSizeE_edit" ).removeClass( "d-none" );
}
});
$("#showLessSizeE_edit").click(function(e){
e.preventDefault();
$("#size_eu"+counter_dispalyE).remove();
counter_dispalyE--;
if(counter_dispalyE==0){
$( "#showLessSizeE_edit" ).addClass( "d-none" )
}
});



</script>
@stop
