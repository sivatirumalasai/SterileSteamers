@extends('admin.layouts.app')

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Service-Category-Plans({{ $category->name }})</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url("admin/dashboard")}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route("services.categories.index",['service'=>$category->id]) }}">Service-Category({{ $category->name }})</a></li>
              <li class="breadcrumb-item active">Service-Category-Plan</li>
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
                <h3 class="card-title">Service-Category-Plan({{ $category->name }})</h3>
                <a href="{{route('services.plans.create',['service'=>$category->id])}}">+ Add Service-Category-Plan</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Slno</th>
                    <th>Image</th>
                    <th>Plan Name</th>
                    <th>Actual Price</th>
                    <th>Discount Price</th>
                    <th>status</th>
                    <th>Created at</th>
                    <th>Coupons</th>
                    <th>Controles</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($category->plans as $index=>$plan)
                    <tr>
                      <td>{{ $index+1 }}</td>
                    <td><img width="50"  src="{{Storage::url($plan->image)}}" alt=""></td>

                      <td>{{ $plan->name }}</td>
                      <td>{{ $plan->actual_price}}/-
                      </td>
                      <td>{{ $plan->discount_price }}/-</td>
                      <td> {{ ($plan->status)? 'Available':"Not Available" }}</td>
                      <td>{{ $plan->created_at->format('Y-m-d') }}</td>
                      <td>
                        <a href="{{ route('services.coupons.index',['service'=>$plan->id]) }}"><button type="button" class="btn btn-block btn-outline-info">Coupons</button></a>
                      </td>
                      <td>
                        <div class="row"><a href="{{ route('services.plans.edit',['service'=>$category->id,'plan'=>$plan->id]) }}" ><button class="btn btn-block btn-outline-secondary">
                          <i class="fas fa-edit"></i> </button>
                          </a><form action="{{ route('services.plans.destroy', ['service'=>$category->id,'plan'=>$plan->id]) }}" method="POST">
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
                      <th>Plan Name</th>
                      <th>Actual Price</th>
                      <th>Discount Price</th>
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