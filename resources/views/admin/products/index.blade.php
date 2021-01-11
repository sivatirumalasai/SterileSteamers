@extends('admin.layouts.app')

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url("admin/dashboard")}}">Home</a></li>
              <li class="breadcrumb-item active">Products</li>
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
                <h3 class="card-title">Products</h3>
                <a href="{{route('products.create')}}">+ Add Product</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Slno</th>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Code</th>
                    <th>Price</th>
                    <th>Created at</th>
                    <th>Features</th>
                    <th>Specifications</th>
                    <th>Accessories</th>
                    <th>Controles</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach (App\Models\Product::all() as $item=>$product)
                  <tr>
                    <td>{{ $item+1 }}</td>
                    @foreach(json_decode($product->images) as $product_image) 
                    <td><img width="50"  src="{{Storage::url($product_image)}}" alt=""></td>
                    @break
                    @endforeach
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->code }}</td>
                    <td>{{ $product->actual_price }}</td>
                    <td>{{ $product->created_at->format('Y-m-d') }}</td>
                    <td>
                      <a href="{{ route('products.features.index',['product'=>$product->code]) }}"><button type="button" class="btn btn-block btn-outline-info">Features</button></a>
                    </td>
                      <td>
                        <a href="{{ route('products.specifications.index',['product'=>$product->code]) }}"><button type="button" class="btn btn-block btn-outline-warning">Specifications</button>
                        </a>
                      </td>
                      <td>
                        <a href="{{ route('products.accessories.index',['product'=>$product->code]) }}"><button type="button" class="btn btn-block btn-outline-primary">Accessories</button>
                        </a>
                      </td>
                      <td>
                        <div class="row"><a href="{{ route('products.edit',$product->code) }}"><button class="btn btn-block btn-outline-secondary">
                          <i class="fas fa-edit"></i> </button>
                          </a>
                          <form action="{{ route('products.destroy', $product->code) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-block btn-outline-danger">
                              <i class="fas fa-trash"></i></button>
                        </form>
                        </div>
                      </td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Slno</th>
                      <th>Product Name</th>
                      <th>Colors</th>
                      <th>Price</th>
                      <th>Created at</th>
                      <th>Features</th>
                      <th>Specifications</th>
                      <th>Accessories</th>
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