@extends('admin.layouts.app')

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Orders</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url("admin/dashboard")}}">Home</a></li>
              <li class="breadcrumb-item active">Orders</li>
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
                <h3 class="card-title">Orders</h3>
                {{-- <a href="{{route('orders.create')}}">+ Add Service</a> --}}
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Slno</th>
                    <th>Order Id</th>
                    <th>Payment Status</th>
                    <th>Amount</th>
                    <th>UserName</th>
                    <th>Mobile</th>
                    <th>Delivery</th>
                    <th>Date</th>
                    <th>Details</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach (App\Models\UserOrder::whereNotNull('order_id')->get() as $index=>$order)
                    <tr>
                      <td>{{ $index+1 }}</td>

                      <td>{{ $order->order_id }}</td>
                      {{-- <td>{{ ($order->txn_id)? $order->txn_id:"cancelled" }}</td> --}}
                      <td> {{ ($order->txn_status)? 'Paid':"Rejected" }}</td>
                      <td>{{ $order->final_amount }}</td>
                      <td>{{ $order->first_name." ".$order->last_name }}</td>
                      <td> {{ $order->mobile}}</td>
                      @if($order->delivery_status==1)
                        <td>Delivered</td>
                      @elseif($order->delivery_status==2)
                        <td>Rejected</td>
                      @else
                      <td>Pending</td>
                      @endif
                      <td>{{ $order->created_at->format('Y-m-d') }}</td>
                      <td>
                        <a href="{{ route('orders.show',['order'=>$order->order_id]) }}"><button type="button" class="btn btn-block btn-outline-info">Details</button></a>
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
                      <th>Categories</th>
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