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
                <form role="form" method="POST" enctype="multipart/form-data" action="{{ route("products.specifications.store",['product'=>$product->id]) }}" >
                    @csrf
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="category">Categories*</label>
                          <input type="text" value="{{ (old('category')=="")? isset($product->specifications->category)? $product->specifications->category :"" : old('category') }}" name="category" class="form-control" id="category" placeholder="Enter Category">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="info">Boiler / Heater Info*</label>
                          <input type="text" value="{{ (old('info')=="")? isset($product->specifications->info)? $product->specifications->info :"" : old('info') }}" name="info" class="form-control" id="info" placeholder="Enter Code">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                            <label for="power">Electric power (watts)*</label>
                            <input type="text" value="{{ (old('power')=="")? isset($product->specifications->power)? $product->specifications->power :"" : old('power') }}" name="power" class="form-control" id="power" placeholder="Enter Price">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="voltage">Required voltage*</label>
                          <input type="text" value="{{ (old('voltage')=="")? isset($product->specifications->voltage)? $product->specifications->voltage :"" : old('voltage') }}" name="voltage" class="form-control" id="voltage" placeholder="Enter Name">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="current">Required amperage‡*</label>
                          <input type="text" value="{{ (old('current')=="")? isset($product->specifications->current)? $product->specifications->current :"" : old('current') }}" name="current" class="form-control" id="current" placeholder="Enter Code">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                            <label for="heater_count">Heater count*</label>
                            <input type="text" value="{{ (old('heater_count')=="")? isset($product->specifications->heater_count)? $product->specifications->heater_count :"" : old('heater_count') }}" name="heater_count" class="form-control" id="heater_count" placeholder="Enter Price">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="steam_capacity">Steam capacity*</label>
                          <input type="text" value="{{ (old('steam_capacity')=="")? isset($product->specifications->steam_capacity)? $product->specifications->steam_capacity :"" : old('steam_capacity') }}" name="steam_capacity" class="form-control" id="steam_capacity" placeholder="Enter Name">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="flow_rate">Maximum flow rate*</label>
                          <input type="text" value="{{ (old('flow_rate')=="")? isset($product->specifications->flow_rate)? $product->specifications->info :"" : old('flow_rate') }}" name="flow_rate" class="form-control" id="flow_rate" placeholder="Enter Code">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                            <label for="approximate">BTUs (approximate or equivalent)*</label>
                            <input type="text" value="{{ (old('approximate')=="")? isset($product->specifications->approximate)? $product->specifications->approximate :"" : old('approximate') }}" name="approximate" class="form-control" id="approximate" placeholder="Enter Price">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="operating_pressure">Operating pressure*</label>
                          <input type="text" value="{{ (old('operating_pressure')=="")? isset($product->specifications->operating_pressure)? $product->specifications->operating_pressure :"" : old('operating_pressure') }}" name="operating_pressure" class="form-control" id="operating_pressure" placeholder="Enter Name">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="maximum_pressure">Maximum pressure*</label>
                          <input type="text" value="{{ (old('maximum_pressure')=="")? isset($product->specifications->maximum_pressure)? $product->specifications->maximum_pressure :"" : old('maximum_pressure') }}"  name="maximum_pressure" class="form-control" id="maximum_pressure" placeholder="Enter Code">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                            <label for="boiler_vessel_capacity">Boiler vessel capacity*</label>
                            <input type="text" value="{{ (old('boiler_vessel_capacity')=="")? isset($product->specifications->boiler_vessel_capacity)? $product->specifications->boiler_vessel_capacity :"" : old('boiler_vessel_capacity') }}" name="boiler_vessel_capacity" class="form-control" id="boiler_vessel_capacity" placeholder="Enter Price">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="boiler_temperature">Boiler temperature*</label>
                          <input type="text" value="{{ (old('boiler_temperature')=="")? isset($product->specifications->boiler_temperature)? $product->specifications->boiler_temperature :"" : old('boiler_temperature') }}" name="boiler_temperature" class="form-control" id="boiler_temperature" placeholder="Enter Name">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="sprayer_tip_temperature">Sprayer tip temperature*</label>
                          <input type="text" value="{{ (old('sprayer_tip_temperature')=="")? isset($product->specifications->sprayer_tip_temperature)? $product->specifications->sprayer_tip_temperature :"" : old('sprayer_tip_temperature') }}" name="sprayer_tip_temperature" class="form-control" id="sprayer_tip_temperature" placeholder="Enter Code">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                            <label for="steam_temperature_sprayed">Steam temperature, sprayed‡*</label>
                            <input type="text" value="{{ (old('steam_temperature_sprayed')=="")? isset($product->specifications->steam_temperature_sprayed)? $product->specifications->steam_temperature_sprayed :"" : old('steam_temperature_sprayed') }}" name="steam_temperature_sprayed" class="form-control" id="steam_temperature_sprayed" placeholder="Enter Price">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="preheating_time">Preheating time‡*</label>
                          <input type="text" value="{{ (old('preheating_time')=="")? isset($product->specifications->preheating_time)? $product->specifications->preheating_time :"" : old('preheating_time') }}" name="preheating_time" class="form-control" id="preheating_time" placeholder="Enter Name">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="water_tank_capacity">Water tank capacity*</label>
                          <input type="text" value="{{ (old('water_tank_capacity')=="")? isset($product->specifications->water_tank_capacity)? $product->specifications->water_tank_capacity :"" : old('water_tank_capacity') }}" name="water_tank_capacity" class="form-control" id="water_tank_capacity" placeholder="Enter Code">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                            <label for="fuel_tank_capacity">Fuel tank capacity*</label>
                            <input type="text" value="{{ (old('fuel_tank_capacity')=="")? isset($product->specifications->fuel_tank_capacity)? $product->specifications->fuel_tank_capacity :"" : old('fuel_tank_capacity') }}" name="fuel_tank_capacity" class="form-control" id="fuel_tank_capacity" placeholder="Enter Price">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="fuel_consumption">Fuel consumption*</label>
                          <input type="text" value="{{ (old('fuel_consumption')=="")? isset($product->specifications->fuel_consumption)? $product->specifications->fuel_consumption :"" : old('fuel_consumption') }}" name="fuel_consumption" class="form-control" id="fuel_consumption" placeholder="Enter Name">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="guns_included">Steam hose connections*</label>
                          <input type="text" value="{{ (old('guns_included')=="")? isset($product->specifications->guns_included)? $product->specifications->guns_included :"" : old('guns_included') }}" name="steam_hose_connections" class="form-control" id="guns_included" placeholder="Enter Code">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                            <label for="guns_included">Steam hose/guns included*</label>
                            <input type="text" value="{{ (old('guns_included')=="")? isset($product->specifications->guns_included)? $product->specifications->guns_included :"" : old('guns_included') }}" name="guns_included" class="form-control" id="guns_included" placeholder="Enter Price">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="direct_water_connection">Direct water connection*</label>
                          <input type="text" value="{{ (old('direct_water_connection')=="")? isset($product->specifications->direct_water_connection)? $product->specifications->direct_water_connection :"" : old('direct_water_connection') }}" name="direct_water_connection" class="form-control" id="direct_water_connection" placeholder="Enter Name">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="product_weight">Product weight, empty*</label>
                          <input type="text" value="{{ (old('product_weight')=="")? isset($product->specifications->product_weight)? $product->specifications->product_weight :"" : old('product_weight') }}" name="product_weight" class="form-control" id="product_weight" placeholder="Enter Code">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                            <label for="product_dimensions">Product dimensions (L x W x H)*</label>
                            <input type="text" value="{{ (old('product_dimensions')=="")? isset($product->specifications->product_dimensions)? $product->specifications->product_dimensions :"" : old('product_dimensions') }}" name="product_dimensions" class="form-control" id="product_dimensions" placeholder="Enter Price">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="InputEmail1">Freight dimensions**</label>
                          <input type="text" value="{{ (old('freight_dimensions')=="")? isset($product->specifications->freight_dimensions)? $product->specifications->freight_dimensions :"" : old('freight_dimensions') }}" name="freight_dimensions" class="form-control" id="InputEmail1" placeholder="Enter Name">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="body_materials">Body materials*</label>
                          <input type="text" value="{{ (old('body_materials')=="")? isset($product->specifications->body_materials)? $product->specifications->body_materials :"" : old('body_materials') }}" name="body_materials" class="form-control" id="body_materials" placeholder="Enter Code">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                            <label for="InputPrice1">Colors available*</label>
                            <input type="text" value="{{ (old('colors_available')=="")? isset($product->specifications->colors_available)? $product->specifications->colors_available :"" : old('colors_available') }}" name="colors_available" class="form-control" id="InputPrice1" placeholder="Enter Price">
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