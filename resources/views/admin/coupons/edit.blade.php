@extends('admin.layouts.app')

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Services</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url("admin/dashboard")}}">Home</a></li>
              <li class="breadcrumb-item "><a href="{{ route('services.index') }}">Services</a> </li>
              <li class="breadcrumb-item active">Edit</li>
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
                  <h3 class="card-title">Edit Service({{ $service->name }})</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="POST" enctype="multipart/form-data" action="{{ route("coupons.update",['coupon'=>$service->id]) }}" >
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label for="InputEmail1">Coupon Name*</label>
                            <input type="text" value="{{ $service->coupon_name }}" name="coupon_name" class="form-control" id="InputEmail1" placeholder="Enter Name">
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label for="coupon_code">Coupon Code*</label>
                            <input type="text" value="{{ $service->coupon_code }}" name="coupon_code" class="form-control" id="coupon_code" placeholder="Enter Coupon Code">
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label for="InputFile">Coupon Image* </label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" value="{{ old('coupon_image') }}" name="coupon_image" class="custom-file-input" id="InputFile">
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
                            <label for="user_type">User type*</label>
                            <select name="user_type" required class="form-control" id="user_type">
                              <option value="1" {{ ($service->user_type==1)? "selected":"" }}>All</option>
                              <option value="2" {{ ($service->user_type==2)? "selected":"" }}>1st User</option>
                              <option value="3" {{ ($service->user_type==3)? "selected":"" }}>Limited</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for="InputDescription">User Limit(only if user type limited)*</label>
                              <input type="number" value="{{ $service->user_limit }}" name="user_limit" class="form-control" id="InputEmail1" placeholder="Enter User limit">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="coupon_type">Coupon Type*</label>
                            <select name="coupon_type" required class="form-control" id="coupon_type">
                              <option value="discount" {{ ($service->type=='discount')? "selected":"" }}>Discount</option>
                              <option value="amount" {{ ($service->type=='amount')? "selected":"" }}>Amount</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for="discount">Discount/Amount*</label>
                              <input type="text" value="{{ $service->amount }}" name="amount" class="form-control" id="discount" placeholder="Enter Discount or Amount">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="valid_from">Valid Date From*</label>
                            <input type="date" required value="{{ $service->valid_from }}" name="valid_from" class="form-control" id="valid_from"  >
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="valid_to">Valid Date To*</label>
                            <input type="date" required value="{{ $service->valid_to }}" name="valid_to" class="form-control" id="valid_to" >
                          </div>
                        </div>
                      </div>
  
                      <div class="form-check">
                        <input type="checkbox" name="status" {{ $service->status? "checked":"" }} class="form-check-input" id="exampleCheck1">
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