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
                    <h4 class="card-title text-primary">My Orders</h4>
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
        <h5 class="card-header">List of Orders</h5>
        <div class="table-responsive text-nowrap">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>Order No</th>
                <th>Order Batch Id</th>
                <th>Payment Status</th>
                <th>Name</th>
                <th>Email</th>
                <th>Telephone</th>
                <th>Province</th>
                <th>City</th>
                <th>Address</th>
            </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($orders as $order)
                <tr>

                    <td><strong>{{ $loop->iteration }}</strong></td>

                    <td>{{ $order->created_at->format('d-m-Y') }}</td>
                    <td>{{ $order->orderNumber }}</td>
                    <td>{{ $order->ordBatchId }}</td>
                    <td>{{ $order->payment_status }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->telephone }}</td>
                    <td>{{ $order->provinceCode }}</td>
                    <td>{{ $order->city }}</td>
                    <td>{{ $order->addr1 }}</td>

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


