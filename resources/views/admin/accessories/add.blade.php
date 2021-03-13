@extends('admin.layouts.app')

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Accessories</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url("admin/dashboard")}}">Home</a></li>
              <li class="breadcrumb-item ">Accessories</li>
              <li class="breadcrumb-item active">Add</li>
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
                  <h3 class="card-title">Accessory</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                @if(isset($accessory))
                <form role="form" method="POST" enctype="multipart/form-data" action="{{ route("accessories.update",['accessory'=>$accessory->code]) }}" >
                  @method('PUT')
                @else
                <form role="form" method="POST" enctype="multipart/form-data" action="{{ route("accessories.store") }}" >
                  @endif
                    @csrf
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="InputEmail1">Name*</label>
                          <input type="text" value="{{ (isset($accessory))?$accessory->name:old('accessory_name') }}" name="accessory_name" class="form-control" id="InputEmail1" placeholder="Enter Name">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="InputCode1">Code*</label>
                          <input type="text" value="{{ (isset($accessory))?$accessory->code:old('accessory_code') }}" name="accessory_code" class="form-control" id="InputCode1" {{ (isset($accessory))? "disabled":"" }} placeholder="Enter Code">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label for="InputPrice1">Price(INR)*</label>
                            <input type="text" value="{{ (isset($accessory))?$accessory->actual_price:old('price') }}" name="price" class="form-control" id="InputPrice1" placeholder="Enter Price">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="InputDiscount1">Discount(INR)*</label>
                          <input type="text" value="{{ (isset($accessory))?$accessory->discount:old('discount') }}" name="discount" class="form-control" id="InputDiscount1" placeholder="Enter Discont">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="InputColor">Catagories*</label>
                          <input type="text" value="{{ (isset($accessory))?$accessory->category:old('catagories') }}" name="catagories" class="form-control" id="InputColor" placeholder="Enter Catagories">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="InputFile">accessory Images* </label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" value="{{ old('accessory_images') }}" name="accessory_images[]" multiple class="custom-file-input" id="InputFile">
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
                            <textarea rows="3" name="description" class="form-control" id="InputDescription" placeholder="Enter Description">{{ (isset($accessory))?$accessory->description:old('description') }}</textarea>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="InputSDescription">Short Description(Note)*</label>
                          <textarea rows="3" name="short_description" class="form-control" id="InputSDescription" placeholder="Enter Short Description">{{ (isset($accessory))?$accessory->short_description:old('short_description') }}</textarea>
                        </div>
                      </div>
                    </div>
                      <div class="row">
                        <div class="col-sm-4">
                          <div class="form-group">
                              <label for="InputWeight">Weight*</label>
                              <input type="text" value="{{ (isset($accessory))?$accessory->weight:old('weight') }}" name="weight" class="form-control" id="InputWeight" placeholder="Enter Description">
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label for="InputSDimensions">Dimensions*</label>
                            <input type="text" value="{{ (isset($accessory))?$accessory->dimensions:old('dimensions') }}" name="dimensions" class="form-control" id="InputSDimensions" placeholder="Enter Short Description">
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label for="InputSlength">length*</label>
                            <input type="textarea" value="{{ (isset($accessory))?$accessory->length:old('length') }}" name="length" class="form-control" id="InputSlength" placeholder="Enter Short Description">
                          </div>
                        </div>
                      </div>

                    <div class="form-check">
                      <input type="checkbox" {{ (isset($accessory) && $accessory->status)? "checked":"" }} name="status" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">status</label>
                    </div>
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
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