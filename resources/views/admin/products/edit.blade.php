@extends('admin.layouts.app')

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products({{ $product->name }})</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url("admin/dashboard")}}">Home</a></li>
              <li class="breadcrumb-item "><a href="{{ route('products.index') }}"> Products</a></li>
              <li class="breadcrumb-item active">Edit ({{ $product->name }})</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

       <!-- Main content -->
       <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-10">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Edit Product</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route("products.update",['product'=>$product->code]) }}" method="POST" enctype="multipart/form-data"  >
                    @csrf
                    @method('PUT')
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="InputEmail1">Name*</label>
                          <input type="text" name="product_name" value="{{ $product->name }}" class="form-control" id="InputEmail1" placeholder="Enter Name">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="Inputcode">Code*</label>
                          <input type="text" name="code" value="{{ $product->code }}"  class="form-control" id="Inputcode" placeholder="Enter Product Code">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="InputEmail1">Acritual Price*</label>
                          <input type="text" name="price"  value="{{ $product->actual_price }}" class="form-control" id="InputEmail1" placeholder="Enter Name">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="Inputdiscount">Discount*</label>
                          <input type="text" name="discount" value="{{ $product->discount }}" class="form-control" id="Inputdiscount" placeholder="Enter discount">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="InputFile">Product Images* </label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" name="product_images[]" multiple value="{{ $product->product_images }}" class="custom-file-input" id="InputFile">
                              <label class="custom-file-label" for="InputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                              <span class="input-group-text" id="InputColor">Upload</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label for="InputDescription">Description*</label>
                            <textarea rows="3" name="description" class="form-control" id="InputDescription" placeholder="Enter Description">{{ $product->description }}</textarea>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="InputSDescription">Short Description(Note)*</label>
                          <textarea rows="3" name="short_description" class="form-control" id="InputSDescription" placeholder="Enter Short Description">{{ $product->short_description }}</textarea>
                        </div>
                      </div>
                    </div>
                    <div class="form-check">
                      <input type="checkbox" name="status" {{ ($product->status)? "checked":"" }} class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">status</label>
                    </div>
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
       </section>

  
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection
      @section("java-script")
      <script src="{{URL::asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
@endsection