@extends('admin.layouts.app')

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Services -Coupons ({{ $category->name }})</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url("admin/dashboard")}}">Home</a></li>
              <li class="breadcrumb-item "><a href="{{ route('services.index') }}">Services</a> </li>
              <li class="breadcrumb-item "><a href="{{ route('services.coupons.index',['service'=>$category->service_category_plan_id]) }}">Services-Coupons</a> </li>
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
                  <h3 class="card-title">Edit Service-Coupon ({{ $category->name }})</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('services.coupons.update',['service'=>$category->service_category_plan_id,'coupon'=>$category->id]) }}" >
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="InputEmail1">Name*</label>
                            <input type="text" value="{{ $category->name }}" required name="name" class="form-control" id="InputEmail1" placeholder="Enter Name">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="InputFile">Coupon Image* </label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" value="{{ old('coupon_image') }}" name="coupon_image"  class="custom-file-input" id="InputFile">
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
                            <label for="amount">Amount*</label>
                            <input type="text" value="{{ $category->amount }}" name="amount" class="form-control" id="amount" required placeholder="Enter Name">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for="duration">Duration*</label>
                              <input type="text" value="{{ $category->duration }}" required name="duration" class="form-control" id="duration" placeholder="Enter Duration">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="coupon_type">Coupon type*</label>
                            <select name="coupon_type" required class="form-control" id="coupon_type">
                              <option value="amount" {{ ($category->type=='amount')? "selected":"" }}>Amount</option>
                              <option value="discount" {{ ($category->type=='discount')? "selected":"" }}>Discount</option>
                              <option value="ratio" {{ ($category->type=='ratio')? "selected":"" }}>Ration</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for="discount">Discount/Amount(only when type discount or amount)*</label>
                              <input type="text" value="{{ $category->discount }}" name="discount" class="form-control" id="discount" placeholder="Enter discount/amount">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="paid_services">No Of Paid Services (only when type ratio)*</label>
                            <input type="text" value="{{ $category->no_of_paid_services }}" name="paid_services" class="form-control" id="paid_services" required placeholder="1,2,4...">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for="free_services">No of Free Services(only when type ratio)*</label>
                              <input type="text" value="{{ $category->no_of_free_services }}" required name="free_services" class="form-control" id="free_services" placeholder="1,2,3">
                          </div>
                        </div>
                      </div>
                      <div class="form-check">
                        <input type="checkbox" name="status" {{ $category->status? "checked":"" }} class="form-check-input" id="exampleCheck1">
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