@extends('admin.layouts.app')

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Plan Features({{ $plan->name }})</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url("admin/dashboard")}}">Home</a></li>
              <li class="breadcrumb-item "><a href="{{ route('plan-feature',['id'=>$plan->id]) }}"></a> Plan Features</li>
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
                  <h3 class="card-title">Add Features to Plan</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('plans.features.store',['plan'=>$plan->id]) }}" >
                    @csrf
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="plan_feature">Select Feature*</label>
                          <select name="plan_feature" class="form-control" id="plan_feature">
                            <option value="">Select</option>
                            @foreach ($features_list as $feature)
                            <option value="{{ $feature->code }}" {{ (old("plan_feature")==$feature->code)? "selected":"" }}>{{ $feature->name }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="description">Description*</label>
                          <input type="text" value="{{ old('description') }}" name="description" class="form-control" id="description" placeholder="description">
                        </div>
                      </div>
                    </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for="Inputtype">Select Feature Type*</label>
                              <select name="feature_type" class="form-control" id="feature_type">
                                <option value="">Select Feature Type</option>
                                <option value="feature">Feature</option>
                                <option value="limit">Limit</option>
                              </select>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="Inputllimit">Limit or status(0 or 1)*</label>
                            <input type="text" value="{{ old('limit') }}" name="limit" class="form-control" id="Inputllimit" placeholder="Enter limit or status">
                          </div>
                        </div>
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