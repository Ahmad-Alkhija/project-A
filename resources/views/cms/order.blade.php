@extends('master')
@section('content')
<div class="breadcrumb-wrapper breadcrumb-wrapper-2 breadcrumb-contacts">
    <h1>Order</h1>
    <p class="breadcrumbs"><span><a href="index.html">Home</a></span>
        <span><i class="mdi mdi-chevron-right"></i></span>Order Add</p>
</div>
<div class="row">
<div class="col-xl-12 col-lg-12">
    <div class="ec-cat-list card card-default mb-24px">
        <div class="card-body">
            <div class="ec-cat-form">
                <h4>Add New  Order</h4>

                <form class="form" id="adding_form">
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
                            <span class="text-danger error-text quantity_err"></span>
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
                            <input id="customerNumber"  class="form-control "name="customerNumber" type="text">
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
 url:"/orderAdd",
 type:"POST",
 data:formValues,
 cache: false,
 processData: false,
 contentType: false,
  success:function(data){
    if($.isEmptyObject(data.error)){
                      console.log(data);
                    //   deleteProductInput(data);
                      alertSucces( 'success','The data is added sucessfully.');
                  }else{
                      printErrorMsg(data.error);
                  }
  }
});
});

//////////////////////////////end of adding in ajax///////////////////////////
</script>
@stop
