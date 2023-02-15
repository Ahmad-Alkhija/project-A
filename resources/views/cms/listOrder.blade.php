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
                                <th>ID</th>
                                <th>Prodcut</th>
                                <th>Prodcut Tag</th>
                                <th>Sale Price</th>
                                <th>Product Price</th>
                                <th>Offer Price</th>
                                <th>Qauntity</th>
                                <th>Sale Type</th>
                                <th>Customer Name</th>
                                <th>Customer Email</th>
                                <th>Customer Phone Number</th>
                                <th>Date</th>
                                <th>Active</th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach($orders as $order)
                            <tr class="row{{$order->id}}">
                                <td id="{{$order->id}}">{{$order->id}}</td>
                                <td id="product{{$order->id}}">{{$order->name}}</td>
                                <td id="productTag{{$order->id}}">{{$order->productTag}}</td>
                                <td id="priceSale{{$order->id}}">{{$order->priceSale}}$</td>
                                <td id="priceProduct{{$order->id}}">{{$order->priceProduct}}$</td>

                                <td id="priceOffer{{$order->id}}">
                                    @if($order->priceOffer=="")
                                    NULL
                                    @else
                                    {{$order->priceOffer}}
                                @endif
                                </td>

                                <td id="quantity{{$order->id}}">{{$order->quantity}}</td>
                                <td id="saleType{{$order->id}}">{{$order->saleType}}</td>
                                <td id="customerName{{$order->id}}">{{$order->customerName}}</td>
                                <td id="customerEmail{{$order->id}}">{{$order->customerEmail}}</td>
                                <td id="phoneNumber{{$order->id}}">{{$order->phoneNumber}}</td>
                                <td>{{$order->created_at->format('m/d/Y')}}</td>
                                <td>
                                    <div class="btn-group mb-1">
                                        <button type="button" id="info" value="{{$order->id}}" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#infoModal">Info</button>
                                        <button type="button"
                                            class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false" data-display="static">
                                            <span class="sr-only">Info</span>
                                        </button>

                                        <div class="dropdown-menu">
                                            <button class="dropdown-item"  id="edit" value="{{$order->id}}">Edit</button>
                                            <button class="dropdown-item" id ="delete"value="{{$order->id}}" href="#">Delete</button>
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

            <div class="modal-body row">

                    @csrf
                    <input type="hidden" name="_method" value="PUT">



                        <div class="ec-cat-form">
                            <h4 class="error_ptq"></h4>


            @csrf
                                <div class="form-group row">
                                    <label for="text" class="col-12 col-form- label" >Product Tag</label>
                                    <div class="col-12">
                                        <input id="productTag"  class="form-control "name="productTag" type="text">
                                        <span class="text-danger error-text productTag_err"></span>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="slug" class="col-12 col-form-label" >Quantity</label>
                                    <div class="col-12">
                                        <input id="quantity" name="quantity" class="form-control " type="text">
                                        <span class="text-danger error-text quantity_err"></span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="slug" class="col-12 col-form-label" >Sale Price</label>
                                    <div class="col-12">
                                        <input id="priceSale" name="priceSale" class="form-control " type="text">
                                        <span class="text-danger error-text priceSale_err"></span>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="category_id" class="col-12 col-form-label">Sale Type</label>
                                    <div class="col-12">
                                        <select id="saleType" name="saleType" class="custom-select">
                                            <option value="" disabled selected hidden>Choose a Sale Type</option>

                                          <option value="WoleSale">Whole Sale</option>
                                          <option value="RetailSale">RetailSale</option>



                                        </select>
                                        <span class="text-danger error-text saleType_err"></span>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="text" class="col-12 col-form- label" >Customer Name</label>
                                    <div class="col-12">
                                        <input id="customerName"  class="form-control "name="customerName" type="text">
                                        <span class="text-danger error-text customerNumber_err"></span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="text" class="col-12 col-form- label" >Customer Email </label>
                                    <div class="col-12">
                                        <input id="customerEmail"  class="form-control "name="customerEmail" type="email">
                                        <span class="text-danger error-text customerEmail_err"></span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-form-label">Customer Phone Number <span>( Enter the phone country code )</span></label>
                                    <div class="col-12">
                                        <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" value="" >
                                        <span class="text-danger error-text phoneNumber_err"></span>

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

@stop
@section('js')
<script>
    var order_id
//////////////////////////// edit ajax/////////////////////////
$(document).on('click','#edit',function(e){
e.preventDefault();
 order_id=$(this).val();
 $('.error-text').html('');
 $('.error_ptq').html('');

$('#editModal').modal('toggle');
$.ajax({
  type:"GET",
  url:'/orderList/'+order_id+'/edit',
  success:function(data){
    $('#productTag').val(data.productTag)
    $('#quantity').val(data.quantity)
    $('#priceSale').val(data.priceSale)
    $("#saleType option[value='"+data.saleType
+"']").prop("selected","selected");
$('#customerName').val(data.customerName)
$('#customerEmail').val(data.customerEmail)
$('#phoneNumber').val(data.phoneNumber)


  }
});
})
//////////////////////////end edit ajax////////////////////
//////////////////////////// update ajax/////////////////////////

$("#updateing_form").submit(function(e){
  e.preventDefault();
  var formValues2 = new FormData($(this)[0])
  $.ajax({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
  url:"/orderList/"+order_id,
  type:"POST",
   data:formValues2,
  contentType: false,
  processData: false,
  cache: false,
success:function(data){
  if($.isEmptyObject(data.error)){
    if(data.error1!=undefined){

          $('.error_ptq').html(data.error1)
                }else{

                     alertSucces( 'success','The data is upddate sucessfully.');
                     $('.error-text').html('');
                      $('.error_ptq').html('');
                      $("#priceSale"+data.id).html(data.priceSale);
                      $("#priceProduct"+data.id).html(data.priceProduct);
                      $("#priceoffer"+data.id).html(data.priceSale);
                   $("#product"+data.id).html(data.name);
                    $("#quantity"+data.id).html(data.quantity);
                    $("#saleType"+data.id).html(data.saleType);
                    $("#customerName"+data.id).html(data.customerName);
                    $("#customerEmail"+data.id).html(data.customerEmail);
                    $("#phoneNumber"+data.id).html(data.phoneNumber);
                    $("#productTag"+data.id).html(data.productTag);


                     $('#editModal').modal('hide');

                }

  }else{
    printErrorMsg(data.error);
  }
}
})
})
////////////////////////////end update ajax/////////////////////////
//////////////////////////// delete ajax/////////////////////////

$("#my_from_delete").submit(function(e){

e.preventDefault();
$.ajax({
headers: {
  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
type:"delete",
url:"/orderList/"+order_id,
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
order_id=$(this).val();
$('#deleteModal').modal('show');
});
//////////////////////////// delete ajax/////////////////////////

</script>
@stop
