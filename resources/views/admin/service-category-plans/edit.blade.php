@extends('admin.layouts.app')

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Service-Category-Plans</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url("admin/dashboard")}}">Home</a></li>
              <li class="breadcrumb-item "><a href="{{ route('services.index') }}">Services</a> </li>
              <li class="breadcrumb-item "><a href="{{ route('services.categories.index',['service'=>$category->id]) }}">Services-Categories</a> </li>
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
                  <h3 class="card-title">Edit Service-Category ({{ $category->name }})</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                  <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('services.plans.update',['service'=>$category->category->service_id,'plan'=>$category->id]) }}" >
                    @csrf
                    @method('PUT')
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="InputEmail1">Name*</label>
                          <input type="text" value="{{ $category->name }}" name="name" class="form-control" id="InputEmail1" placeholder="Enter Name">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="inputtype">Type*</label>
                          <input type="text" value="{{ $category->type }}" name="type" class="form-control" id="inputtype" placeholder="Enter Type">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="actual_price">Actual Price*</label>
                          <input type="text" value="{{ $category->actual_price }}" name="actual_price" class="form-control" id="actual_price" placeholder="Enter actual price">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="discount_price">Discount Price(Final Price)*</label>
                          <input type="text" value="{{ $category->discount_price }}" name="discount_price" class="form-control" id="discount_price" placeholder="Enter discount price">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="duration">Duration (in mins)*</label>
                          <input type="text" value="{{ $category->duration }}" name="duration" class="form-control" id="duration" placeholder="Enter duration ">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="InputFile">Service Image* </label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" value="{{ old('service_image') }}" name="service_image" class="custom-file-input" id="InputFile">
                              <label class="custom-file-label" for="InputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                              <span class="input-group-text" id="InputColor">Upload</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label for="InputDescription">Description*</label>
                            <textarea rows="3" name="description" class="form-control" id="InputDescription" placeholder="Enter Description">{{ $category->description }}</textarea>
                        </div>
                      </div>
                    </div>

                    <div class="form-check">
                      <input type="checkbox" name="status" {{ $category->status? "checked":"" }}  class="form-check-input" id="exampleCheck1">
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