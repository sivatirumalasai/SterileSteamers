@extends('admin.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Order Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route("orders.index") }}">Orders</a></li>
              <li class="breadcrumb-item active"><a href="#">{{ $order->order_id }}</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            {{-- <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
            </div> --}}


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> Order Id{{$order->order_id}}.
                    <small class="float-right">Date: {{ $order->created_at }}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  Address: 
                    <strong>{{ $order->first_name }} {{ $order->last_name}}</strong><br>
                    Phone: +91 {{ $order->mobile }}<br>
                    {{ $order->address }}<br>
                    Email: {{ $order->email }}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice #007612</b><br>
                  <b>Txn ID:</b> {{ $order->txn_id}}({{ ($order->txn_status)? 'Paid':"Rejected" }})<br>
                  <b>Payment Status:</b> {{ $order->txn_msg }}<br>
                  <b>Account Paid:</b> Rs:{{ $order->final_amount }} 
                  <b>     Discount :</b> Rs:{{ $order->discount_amount }}
                  
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Qty</th>
                      <th>Product/Accessory</th>
                      <th>Name #</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($order->orderDetails as $order_detail)
                      <tr>
                        <td>{{ $order_detail->quantity }}</td>
                        @if($order_detail->model_type=='App\Models\Product')
                        <td>Product</td>
                        @elseif($order_detail->model_type=='App\Models\Accessory')
                        <td>Accessory</td>
                        @else
                        <td>Service</td>
                        @endif
                        <td>{{ $order_detail->model->name }}</td>
                        <td>Rs: {{ $order_detail->final_amount }}</td>
                      </tr>
                      @endforeach
                    
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">User Details:</p>
                  {{-- <img src="../../dist/img/credit/visa.png" alt="Visa">
                  <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                  <img src="../../dist/img/credit/american-express.png" alt="American Express">
                  <img src="../../dist/img/credit/paypal2.png" alt="Paypal"> --}}

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    comment:{{ $order->user_message }}
                  </p>
                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    Delivery Status: @if($order->delivery_status==1)
                    Delivered
                  @elseif($order->delivery_status==2)
                    Rejected
                  @elseif($order->delivery_status==3)
                   Order-Accepted
                  @else
                  Awaiting-Confirmation
                  @endif
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Txn-date : <b>{{ $order->created_at }}</b></p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Actual Amount:</th>
                        <td>Rs: {{ $order->actual_amount }}</td>
                      </tr>
                      <tr>
                        <th>Discount</th>
                        <td>Rs: {{ $order->discount_amount }}</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>Rs: {{ $order->final_amount }}</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  {{-- <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a> --}}
                  <a href="{{ route('OrderUpdateStatus',['order'=>$order->order_id]) }}"> <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Accept Order
                  </button></a>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
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