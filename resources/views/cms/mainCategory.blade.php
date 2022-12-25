@extends('master')
@section('content')
<div class="breadcrumb-wrapper breadcrumb-wrapper-2 breadcrumb-contacts">
    <h1>Main Category</h1>
    <p class="breadcrumbs"><span><a href="index.html">Home</a></span>
        <span><i class="mdi mdi-chevron-right"></i></span>Main Category</p>
</div>
<div class="row">
<div class="col-xl-4 col-lg-12">
    <div class="ec-cat-list card card-default mb-24px">
        <div class="card-body">
            <div class="ec-cat-form">
                <h4>Add New Category</h4>

                <form class="form" id="adding_form">
@csrf
                    <div class="form-group row">
                        <label for="text" class="col-12 col-form- label" >Name</label>
                        <div class="col-12">
                            <input id="name"  class="form-control here slug-title"name="name" type="text">
                            <span class="text-danger error-text name_err"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="slug" class="col-12 col-form-label" >Slug</label>
                        <div class="col-12">
                            <input id="slug" name="slug" class="form-control here set-slug" type="text">
                            <span class="text-danger error-text slug_err"></span>
                            <small>The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-12 col-form-label">Sort Description</label>
                        <div class="col-12">
                            <textarea id="sortDescription" name="sortDescription" cols="40" rows="2" class="form-control"></textarea>
                            <span class="text-danger error-text sortDescription_err"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-12 col-form-label">Full Description</label>
                        <div class="col-12">
                            <textarea id="fullDescription" name="fullDescription" cols="40" rows="4" class="form-control"></textarea>
                            <span class="text-danger error-text fullDescription_err"></span>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-12 col-form-label">Product Tags <span>( Type and
                                make comma to separate tags )</span></label>
                        <div class="col-12">
                            <input type="text" class="form-control" id="productTag" name="productTag" value="" placeholder="" data-role="tagsinput">
                            <span class="text-danger error-text productTag_err"></span>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
<div class="col-xl-8 col-lg-12">
    <div class="ec-cat-list card card-default">
        <div class="card-body">
            <div class="table-responsive">
                <table id="responsive-data-table" class="table">
                    <thead>
                        <tr>
                            <th>Thumb</th>
                            <th>Name</th>
                            <th>Sub Categories</th>
                            <th>Product</th>
                            <th>Total Sell</th>
                            <th>Status</th>
                            <th>Trending</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody id="table">


                            @foreach ($categories as $category)
                            @php
                            $i = 0
                           @endphp

                            <tr class="row{{$category->id}}">
                            <td><img class="cat-thumb" src="assets/img/category/clothes.png" alt="Product Image" /></td>
                            <td class="name{{$category->id}}">{{$category->name}}</td>
                            <td>

                                @foreach ($subCategories as $subCategory)
                                @if($category->id==$subCategory->category_id)
                                <div class="d-none" > {{$i++}}</div>


@endif
@endforeach
                                @foreach ($subCategories as $subCategory)

                                @if($loop->index==0)
                                <span class="ec-sub-cat-list"><span class="ec-sub-cat-count" title="Total Sub Categories">{{$i}}</span>
                                @endif

                                @if($category->id==$subCategory->category_id)
                                <span class="ec-sub-cat-tag">{{$subCategory->name}}</span>
                                @endif




@endforeach
</td>
                            <td class="productTag{{$category->id}}">{{$category->productTag}}</td>
                            <td>2161</td> <td>ACTIVE</td><td><span class="badge badge-success">Top</span></td>
                                    <td> <div class="btn-group"><button type="button" id="info" value="{{$category->id}}" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#infoModal" >info</button><button type="button"class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"data-bs-toggle="dropdown" aria-haspopup="true"aria-expanded="false" data-display="static"><span class="sr-only">Info</span></button><div class="dropdown-menu"><button class="dropdown-item" href="#" id="edit" value="{{$category->id}}">Edit</button><button class="dropdown-item" id ="delete"value="{{$category->id}}" href="#">Delete</button></div></div></td>


                                </tr>
                            @endforeach







                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@stop

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






  {{--              The edit Modal                  --}}
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form class="form" id="updateing_form" enctype="multipart/form-data">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLabel">Edit Modal</h2>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="ec-cat-form">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group row">
                    <label for="text" class="col-12 col-form- label" >Name</label>
                    <div class="col-12">
                        <input id="name_edit"  class="form-control here slug-title-edit"name="name_edit" type="text">
                        <span class="text-danger error-text name_edit_err"></span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="slug" class="col-12 col-form-label" >Slug</label>
                    <div class="col-12">
                        <input id="slug_edit" name="slug_edit" class="form-control here set-slug-edit" type="text">
                        <span class="text-danger error-text slug_edit_err"></span>
                        <small>The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</small>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-12 col-form-label">Sort Description</label>
                    <div class="col-12">
                        <textarea id="sortDescription_edit" name="sortDescription_edit" cols="40" rows="2" class="form-control"></textarea>
                        <span class="text-danger error-text sortDescription_edit_err"></span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-12 col-form-label">Full Description</label>
                    <div class="col-12">
                        <textarea id="fullDescription_edit" name="fullDescription_edit" cols="40" rows="4" class="form-control"></textarea>
                        <span class="text-danger error-text fullDescription_edit_err"></span>

                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-12 col-form-label">Product Tags <span>( Type and
                            make comma to separate tags )</span></label>
                    <div class="col-12">
                        <input type="text" class="form-control" id="productTag_edit" name="productTag_edit" value="" placeholder="" data-role="tagsinput">
                        <span class="text-danger error-text productTag_edit_err"></span>

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
   {{--               end The Info Modal                  --}}






    {{--              The Info Modal                  --}}
  <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="infoModalLabel">Category Info</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
           <div class="form-group">
            <h3>Category Name:</h3>
            <p class="name"><p>
            </div>
            <div class="form-group">
              <h3> Slug Name:</h3>
              <p class="slug"><p>
              </div>

            <div class="form-group">
              <h3> Sort Description:</h3>
              <p class="sortDescription"><p>
              </div>
              <div class="form-group">
                  <h3> Long Description:</h3>
                  <p class="fullDescription"><p>
                  </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
   {{--               end The Info Modal                  --}}








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
 url:"/category",
 type:"POST",
 data:formValues,
 cache: false,
 processData: false,
 contentType: false,
  success:function(data){
    if($.isEmptyObject(data.error)){
                      console.log(data);
                      deleteDataCategory(data)
      $('#table').append("<tr class='row"+data.id+"'>  <td><img class='cat-thumb' src='assets/img/category/clothes.png' alt='Product Image' /></td><td class='name"+data.id+"'>"+data.name+"</td><td> <span class='ec-sub-cat-list'><span class='ec-sub-cat-count' title='Total Sub Categories'>5</span><span class='ec-sub-cat-tag'>T-shirt</span>  <span class='ec-sub-cat-tag'>Shirt</span><span class='ec-sub-cat-tag'>Dress</span><span class= 'ec-sub-cat-tag'>Jeans</span><span class='ec-sub-cat-tag'>Top</span></span></td>         <td class='productTag"+data.id+"'>"+data.productTag+"</td><td>2161</td> <td>ACTIVE</td><td><span class='badge badge-success'>Top</span></td>  <td><div class='btn-group'><button type='button' id='info' value='"+data.id+"' class='btn btn-outline-success' data-bs-toggle= 'modal' >info</button><button type='button'class='btn btn-outline-success dropdown-toggle dropdown-toggle-split'data-bs-toggle='dropdown' aria-haspopup= 'true'aria-expanded='false' data-display= 'static'><span class= 'sr-only'>Info</span></button><div class= 'dropdown-menu'><button class='dropdown-item' href='#'  id='edit'value='"+data.id+"'>Edit</button><button class='dropdown-item' id ='delete'value='"+data.id+"' href='#''>Delete</button></div></div></td></tr>");
      alertSucces( 'success','The data is added sucessfully.');


                  }else{
                      printErrorMsg(data.error);
                  }
  }
});
});
//////////////////////////////end of adding in ajax///////////////////////////


//////////////////////////////////info ajax/////////////////////////////////////
var category_id
$(document).on('click','#info',function(e){
e.preventDefault();
 category_id=$(this).val();
$('#infoModal').modal('show');
console.log(category_id)

$.ajax({
  type:"GET",
  url:'/category/'+category_id+'/edit',
  success:function(data){
    console.log(data);
   $('.name').html(data.name);
   $('.slug').html(data.slug);
   $('.sortDescription').html(data.sortDescription);
   $('.fullDescription').html(data.fullDescription);
  }
});
});
/////////////////////////////end of info ajax/////////////////////////





//////////////////////////// edit ajax/////////////////////////
$(document).on('click','#edit',function(e){
e.preventDefault();
 category_id=$(this).val();
$('#editModal').modal('toggle');
console.log(category_id)

$.ajax({
  type:"GET",
  url:'/category/'+category_id+'/edit',
  success:function(data){
    console.log(data);
   $('#name_edit').val(data.name);
   $('#slug_edit').val(data.slug);
   $('#productTag_edit').val(data.productTag);
   $('#sortDescription_edit').html(data.sortDescription);
   $('#fullDescription_edit').html(data.fullDescription);
  }
});
});
//////////////////////// end of edit ajax///////////////////////////////////////





//--/////////////////////////////////// update in ajax ////////////////////////

$("#updateing_form").submit(function(e){
  e.preventDefault();
  var formValues2 = new FormData($(this)[0])
  $.ajax({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
  url:"/category/"+category_id,
  type:"POST",
   data:formValues2,
  contentType: false,
  processData: false,
  cache: false,
success:function(data){
  if($.isEmptyObject(data.error)){
  console.log(data);
   $(".name"+data.id).html(data.name);
   $(".productTag"+data.id).html(data.productTag);
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
url:"/category/"+category_id,
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
category_id=$(this).val();
$('#deleteModal').modal('show');
});



</script>
@stop
