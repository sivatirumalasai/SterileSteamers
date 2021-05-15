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
              <li class="breadcrumb-item active">Coupons</li>
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
                <h3 class="card-title">Coupons</h3>
                <a href="{{route('coupons.create')}}">+ Add Coupon</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Slno</th>
                    <th>Image</th>
                    <th>Coupon Name</th>
                    <th>Coupon Code</th>
                    <th>Type</th>
                    <th>status</th>
                    <th>Valid To</th>
                    <th>Controles</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach (App\Models\Coupon::get() as $index=>$service)
                    <tr>
                      <td>{{ $index+1 }}</td>
                    <td><img width="50"  src="{{Storage::url($service->image)}}" alt=""></td>

                      <td>{{ $service->coupon_name }}</td>
                      <td>{{ $service->coupon_code}}</td>
                      @if($service->user_type==1)
                      <td>All</td>
                      @elseif($service->user_type==2)
                      <td>1st time user</td>
                      @elseif($service->user_type==3)
                      <td>Limited</td>
                      @endif
                      <td> {{ ($service->status)? 'Available':"Not Available" }}</td>
                      <td>{{ $service->valid_to }}</td>
                      <td>
                        <div class="row"><a href="{{ route('coupons.edit',['coupon'=>$service->id]) }}" ><button class="btn btn-block btn-outline-secondary">
                          <i class="fas fa-edit"></i> </button>
                          </a>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Slno</th>
                      <th>Image</th>
                      <th>Coupon Name</th>
                      <th>Coupon Code</th>
                      <th>Type</th>
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