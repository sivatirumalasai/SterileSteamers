@extends('admin.layouts.app')

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Specifications</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url("admin")}}">Home</a></li>
              {{-- <li class="breadcrumb-item "><a href="{{ route('product-specifications',['id'=>$product->code]) }}">Specifications</a></li> --}}
              <li class="breadcrumb-item active">Specifications</li>
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
                  <h3 class="card-title">Add Specifications</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="POST" enctype="multipart/form-data" action="{{ route("product-specifications-store",['id'=>Request::route('id')]) }}" >
                    @csrf
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="InputEmail1">Categories*</label>
                          <input type="text" required name="category" class="form-control" id="InputEmail1" placeholder="Enter Name">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="InputCode1">Boiler / Heater Info*</label>
                          <input type="text" required name="info" class="form-control" id="InputCode1" placeholder="Enter Code">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                            <label for="InputPrice1">Electric power (watts)*</label>
                            <input type="text" required name="power" class="form-control" id="InputPrice1" placeholder="Enter Price">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="InputEmail1">Required voltage*</label>
                          <input type="text" required name="voltage" class="form-control" id="InputEmail1" placeholder="Enter Name">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="InputCode1">Required amperage‡*</label>
                          <input type="text" required name="current" class="form-control" id="InputCode1" placeholder="Enter Code">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                            <label for="InputPrice1">Heater count*</label>
                            <input type="text" required name="heater_count" class="form-control" id="InputPrice1" placeholder="Enter Price">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="InputEmail1">Steam capacity*</label>
                          <input type="text" required name="steam_capacity" class="form-control" id="InputEmail1" placeholder="Enter Name">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="InputCode1">Maximum flow rate*</label>
                          <input type="text" required name="flow_rate" class="form-control" id="InputCode1" placeholder="Enter Code">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                            <label for="InputPrice1">BTUs (approximate or equivalent)*</label>
                            <input type="text" required name="approximate" class="form-control" id="InputPrice1" placeholder="Enter Price">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="InputEmail1">Operating pressure*</label>
                          <input type="text" required name="operating_pressure" class="form-control" id="InputEmail1" placeholder="Enter Name">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="InputCode1">Maximum pressure*</label>
                          <input type="text" required name="maximum_pressure" class="form-control" id="InputCode1" placeholder="Enter Code">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                            <label for="InputPrice1">Boiler vessel capacity*</label>
                            <input type="text" required name="boiler_vessel_capacity" class="form-control" id="InputPrice1" placeholder="Enter Price">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="InputEmail1">Boiler temperature*</label>
                          <input type="text" required name="boiler_temperature" class="form-control" id="InputEmail1" placeholder="Enter Name">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="InputCode1">Sprayer tip temperature*</label>
                          <input type="text" required name="sprayer_tip_temperature" class="form-control" id="InputCode1" placeholder="Enter Code">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                            <label for="InputPrice1">Steam temperature, sprayed‡*</label>
                            <input type="text" required name="steam_temperature_sprayed" class="form-control" id="InputPrice1" placeholder="Enter Price">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="InputEmail1">Preheating time‡*</label>
                          <input type="text" required name="preheating_time" class="form-control" id="InputEmail1" placeholder="Enter Name">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="InputCode1">Water tank capacity*</label>
                          <input type="text" required name="water_tank_capacity" class="form-control" id="InputCode1" placeholder="Enter Code">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                            <label for="InputPrice1">Fuel tank capacity*</label>
                            <input type="text" required name="fuel_tank_capacity" class="form-control" id="InputPrice1" placeholder="Enter Price">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="InputEmail1">Fuel consumption*</label>
                          <input type="text" required name="fuel_consumption" class="form-control" id="InputEmail1" placeholder="Enter Name">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="InputCode1">Steam hose connections*</label>
                          <input type="text" required name="steam_hose_connections" class="form-control" id="InputCode1" placeholder="Enter Code">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                            <label for="InputPrice1">Steam hose/guns included*</label>
                            <input type="text" required name="guns_included" class="form-control" id="InputPrice1" placeholder="Enter Price">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="InputEmail1">Direct water connection*</label>
                          <input type="text" required name="direct_water_connection" class="form-control" id="InputEmail1" placeholder="Enter Name">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="InputCode1">Product weight, empty*</label>
                          <input type="text" required name="product_weight" class="form-control" id="InputCode1" placeholder="Enter Code">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                            <label for="InputPrice1">Product dimensions (L x W x H)*</label>
                            <input type="text" required name="product_dimensions" class="form-control" id="InputPrice1" placeholder="Enter Price">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="InputEmail1">Freight dimensions**</label>
                          <input type="text" required name="freight_dimensions" class="form-control" id="InputEmail1" placeholder="Enter Name">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="InputCode1">Body materials*</label>
                          <input type="text" required name="body_materials" class="form-control" id="InputCode1" placeholder="Enter Code">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                            <label for="InputPrice1">Colors available*</label>
                            <input type="text" required name="colors_available" class="form-control" id="InputPrice1" placeholder="Enter Price">
                        </div>
                      </div>
                    </div>
                    <div class="form-check">
                      <input type="checkbox" name="status" class="form-check-input" id="exampleCheck1">
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