@extends('admin.layouts.app')

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Service-Categories({{ $service->name }})</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url("admin/dashboard")}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route("services.index") }}">Services</a></li>
              <li class="breadcrumb-item active">Service-Category</li>
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
                <h3 class="card-title">Service-Category({{ $service->name }})</h3>
                <a href="{{route('services.categories.create',['service'=>$service->id])}}">+ Add Service-Category</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Slno</th>
                    <th>Image</th>
                    <th>Service Name</th>
                    <th>Description</th>
                    <th>status</th>
                    <th>Created at</th>
                    <th>Plans</th>
                    <th>Controles</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($service->categories as $index=>$category)
                    <tr>
                      <td>{{ $index+1 }}</td>
                    <td><img width="50"  src="{{Storage::url($category->image)}}" alt=""></td>

                      <td>{{ $category->name }}</td>
                      <td>{{ $category->description}}
                      </td>
                      <td> {{ ($category->status)? 'Available':"Not Available" }}</td>
                      <td>{{ $category->created_at->format('Y-m-d') }}</td>
                      <td>
                        <a href="{{ route('services.plans.index',['service'=>$category->id]) }}"><button type="button" class="btn btn-block btn-outline-info">Plans</button></a>
                      </td>
                      <td>
                        <div class="row"><a href="{{ route('services.categories.edit',['service'=>$service->id,'category'=>$category->id]) }}" ><button class="btn btn-block btn-outline-secondary">
                          <i class="fas fa-edit"></i> </button>
                          </a><form action="{{ route('services.categories.destroy', ['service'=>$service->id,'category'=>$category->id]) }}" method="POST">
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
                      <th>Image</th>
                      <th>Service Name</th>
                      <th>Description</th>
                      <th>status</th>
                      <th>Created at</th>
                      <th>Plans</th>
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