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
                                <th>Offer</th>
                                <th>Old Price</th>
                                <th>New Price</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Action</th>


                        </thead>

                        <tbody>
                            @foreach($offers as $offer)
                            <tr class="row{{$offer->id}}">
                                <td ><img id="image{{$offer->id}}" class="tbl-thumb" src="images/{{$offer->Product->image}}" alt="Product Image" /></td>
                                <td id="name{{$offer->id}}">{{$offer->Product->name}}</td>
                                <td id="offer{{$offer->id}}">{{$offer->offer}}%</td>

                                <td id="oldPrice{{$offer->id}}">{{$offer->oldPrice}}</td>

                                <td id="newPrice{{$offer->id}}">{{$offer->newPrice}}</td>
                                <td id="startDate{{$offer->id}}">{{$offer->startDate}}</td>
                                <td id="endtDate{{$offer->id}}">{{$offer->endDate}}</td>

                                <td>
                                    <div class="btn-group mb-1">
                                        <button type="button" id="info" value="{{$offer->id}}" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#infoModal">Info</button>
                                        <button type="button"
                                            class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false" data-display="static">
                                            <span class="sr-only">Info</span>
                                        </button>

                                        <div class="dropdown-menu">
                                            <button class="dropdown-item"  id="edit" value="{{$offer->id}}">Edit</button>
                                            <button class="dropdown-item" id ="delete"value="{{$offer->id}}" href="#">Delete</button>
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



{{--              The edit Modal                  --}}
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form class="form" id="updateing_form">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLabel">Edit Modal</h2>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="ec-cat-form">
                <input type="hidden" name="_method" value="PUT">

                @csrf
                <div class="offer_info row">
                    <div class="col-md-6">

                        <label class="form-label">Product Offer<span> (The offer input from 100% )</span></label>
                        <input  type="number" class="offer form-control"
                            name="offer"
                           />
                            <span class="text-danger error-text offer_err"></span>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Product Offer endDate</label>
                        <input  type="date" class="offerDate form-control"
                            name="endDate"
                           />
                            <span class="text-danger error-text endDate_err"></span>
                    </div>
                </div>

            </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Save change</button>
        </div>
    </form>
      </div>
    </div>
  </div>

@stop
@section('js')
<script>
    ///edit in ajax
    var offer_id
$(document).on('click','#edit',function(e){
e.preventDefault();

$('.size').prop('checked', false);
offer_id=$(this).val();
$('#editModal').modal('toggle');
$.ajax({
  type:"GET",
  url:'/offer/'+offer_id+'/edit',
  success:function(data){
    console.log(data);


    $('.offer').val(data.offer)
    $('.offerDate').val(data.endDate)

  }
})

});
//--/////////////////////////////////// update in ajax ////////////////////////

$("#updateing_form").submit(function(e){
  e.preventDefault();
  var formValues2 = new FormData($(this)[0])
  $.ajax({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
  url:"/offer/"+offer_id,
  type:"POST",
   data:formValues2,
  contentType: false,
  processData: false,
  cache: false,
success:function(data){
  if($.isEmptyObject(data.error)){
  console.log(data);
   $("#offer"+data.id).html(data.offer);
   $("#startDate"+data.id).html(data.startDate);
   $("#endDate"+data.id).html(data.endDate);
   $("#newPrice"+data.id).html(data.newPrice);



//    $(".productTag"+data.id).html(data.productTag);
   $('#editModal').modal('hide');
   alertSucces( 'success','The data is update sucessfully.');

  }else{
    printErrorMsg(data.error);
  }

}
  });
});
//--////////////////////////////////// end update in ajax /////////////////////

</script>
@stop
