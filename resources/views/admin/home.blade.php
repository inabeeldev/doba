@extends('admin.layouts.app')

@section('content')



<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 col-md-12 order-1">
            <div class="row">
              <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                  <div class="card-body">
                    <span class="fw-semibold d-block mb-1">Unpaid Orders</span>
                    <h3 class="card-title mb-2">{{ $up_orders->count() }}</h3>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                  <div class="card-body">
                    <span class="fw-semibold d-block mb-1">Paid Orders</span>
                    <h3 class="card-title mb-2">{{ $p_orders->count() }}</h3>
                  </div>
                </div>
              </div>

            </div>
          </div>
      <!-- Total Revenue -->


    </div>

  </div>
  <!-- / Content -->






@endsection
