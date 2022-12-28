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
                            <tr>
                                <td><img class="tbl-thumb" src="images/{{$product->image}}" alt="Product Image" /></td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->price}}$</td>
                                <td>25% OFF</td>
                                <td>61</td>
                                <td>{{$product->quantity}}</td>
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
                                            <button class="dropdown-item" href="#" id="edit" value="{{$product->id}}">Edit</button>
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

@stop
