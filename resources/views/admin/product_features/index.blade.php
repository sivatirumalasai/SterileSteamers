@extends('admin.layouts.app')

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product-Features</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url("admin/dashboard")}}">Home</a></li>
              <li class="breadcrumb-item "><a href="{{ route('products.index') }}">Product({{ $product->name }})</a></li>
              <li class="breadcrumb-item active">Product-Features</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Product-Features({{ $product->name }})</h3>
                <a href="{{route('products.features.create',['product'=>$product->code])}}">+ Add Features</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Slno</th>
                    <th>Features Name</th>
                    <th>Image</th>
                    <th>status</th>
                    <th>Created at</th>
                    <th>Controles</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($product->features as $index=>$accessory)
                    <tr>
                      <td>{{ $index+1 }}</td>
                      <td>{{ $accessory->name }}</td>
                      <td><img width="50"  src="{{Storage::url($accessory->image)}}" alt=""></td>
                      <td> {{ ($accessory->status)? 'Available':"Not Available" }}</td>
                      <td>{{ $accessory->created_at->format('Y-m-d') }}</td>
                          <td>
                            <div class="row"><a href="{{ route('products.features.edit',['product'=>$product->code,'feature'=>$accessory->id]) }}"><button class="btn btn-block btn-outline-secondary">
                              <i class="fas fa-edit"></i> </button>
                              </a><a > <button class="btn btn-block btn-outline-danger">
                                <i class="fas fa-trash"></i></button>
                              </a>
                            </div>
                          </td>
                    </tr>
                    @endforeach
                  
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Slno</th>
                      <th>Features Name</th>
                      <th>Price</th>
                      <th>status</th>
                      <th>Created at</th>
                      <th>Controles</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
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