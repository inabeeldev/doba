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
    <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <canvas id="unpaidOrdersChart" width="200" height="200"></canvas>

            </div>
        </div>
          <div class="col-lg-4 col-md-6">
            <div class="card">
                <canvas id="paidOrdersChart" width="200" height="200"></canvas>

            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <canvas id="orderDistributionChart" width="200" height="200"></canvas>

            </div>
        </div>
    </div>


  </div>
  <!-- / Content -->






@endsection


@section('scripts')

<script>
    var ctxPaid = document.getElementById('paidOrdersChart').getContext('2d');
    var ctxUnpaid = document.getElementById('unpaidOrdersChart').getContext('2d');

    var paidOrdersChart = new Chart(ctxPaid, {
        type: 'bar',
        data: {
            labels: ['Paid Orders'],
            datasets: [{
                label: 'Paid Orders',
                data: [{{ $p_orders->count() }}],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            indexAxis: 'y',
            elements: {
                bar: {
                    borderWidth: 3,
                }
            }
        }
    });

    var unpaidOrdersChart = new Chart(ctxUnpaid, {
        type: 'bar',
        data: {
            labels: ['Unpaid Orders'],
            datasets: [{
                label: 'Unpaid Orders',
                data: [{{ $up_orders->count() }}],
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            indexAxis: 'y',
            elements: {
                bar: {
                    borderWidth: 3,
                }
            }
        }
    });
 </script>

<script>
    var ctxDistribution = document.getElementById('orderDistributionChart').getContext('2d');

    var orderDistributionChart = new Chart(ctxDistribution, {
        type: 'pie',
        data: {
            labels: ['Paid Orders', 'Unpaid Orders'],
            datasets: [{
                label: 'Order Distribution',
                data: [{{ $p_orders->count() }}, {{ $up_orders->count() }}],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Order Distribution'
                }
            }
        }
    });
 </script>



@endsection
