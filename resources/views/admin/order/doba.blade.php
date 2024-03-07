@extends('admin.layouts.app')

@section('content')


<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row animate__animated animate__fadeIn">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
              <div class="d-flex align-items-end row">
                <div class="col-sm-9">
                  <div class="card-body">
                    <h4 class="card-title text-primary">Doba Orders</h4>
                  </div>
                </div>
                <div class="col-sm-3 text-center text-sm-left">
                  <div class="card-body pb-0 px-0 px-md-4">
                    <img
                      src="{{ asset('public/admin/img/illustrations/man-with-laptop-light.png') }}"
                      height="100"
                      alt="View Badge User"
                      data-app-dark-img="illustrations/man-with-laptop-dark.png"
                      data-app-light-img="illustrations/man-with-laptop-light.png"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    @endif
    <!-- Striped Rows -->
    <div class="card animate__animated animate__fadeInUp">
        <h5 class="card-header">List of Doba Orders</h5>
        <div class="table-responsive text-nowrap">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Order Detail</th>
                <th>Order Batch Id</th>
                <th>Total</th>
                <th>Payment Status</th>
                <th>Order Pay URL</th>
                <th>Pay Deadline</th>
            </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($orders['orderBatchList'] as $order)
                <tr>

                    <td><strong>{{ $loop->iteration }}</strong></td>
                    @if(!empty($order['waitingPayOrderList']))
                    <td>
                        <a class="btn btn-primary btn-show text-white" href="{{ route('doba-order-detail', $order['waitingPayOrderList'][0]['ordBusiId']) }}">Show</a>
                    </td>
                    @else
                    <td>
                        <a class="btn btn-primary btn-show text-white" href="{{ route('doba-order-detail', $order['paidOrderList'][0]['ordBusiId']) }}">Show</a>
                    </td>
                    @endif
                    <td>{{ $order['ordBatchId'] }}</td>
                    <td>{{ $order['totalPay'] }}</td>
                    @if(empty($order['waitingPayOrderList']))
                        <td>Paid</td>
                    @else
                        <td>Unpaid</td>
                    @endif

                    <td>{{ $order['orderPayURL'] }}</td>
                    <td>{{ $order['payDeadLine'] }}</td>
                </tr>


                @endforeach
            </tbody>
        </table>
        </div>
    </div>
    <!--/ Striped Rows -->


</div>
<!-- / Content -->


@endsection


