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
                    <h4 class="card-title text-primary">Doba Order Detail</h4>
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

    @php
        $or = !empty($order['waitingPayOrderList']) ? $order['waitingPayOrderList'] : $order['paidOrderList'];
    @endphp


<div class="row">
    <!-- Inline text elements -->
    <div class="col">
      <div class="card mb-4">
        <h5 class="card-header">Order Details</h5>
        <div class="card-body">
          <table class="table table-borderless">
            <tbody>

              <tr>
                <td>Order Batch Id</td>
                <td class="py-3">
                  <p class="mb-0"><strong>{{ $order['ordBatchId'] }}</strong></p>
                </td>
              </tr>

              <tr>
                <td>Payment Status</td>
                <td class="py-3">
                  <p class="mb-0"><strong>{{ $order['orderPayURL'] ? 'Unpaid' : 'Paid' }}</strong></p>
                </td>
              </tr>

              <tr>
                <td>Order Pay Url</td>
                <td class="py-3">
                  <p class="mb-0"><strong><a href="{{ $order['orderPayURL'] ? $order['orderPayURL'] : '#'}}">{{ $order['orderPayURL'] ? $order['orderPayURL'] : 'Paid Already' }}</a></strong></p>
                </td>
              </tr>

              <tr>
                <td>Pay Deadline</td>
                <td class="py-3">
                  <p class="mb-0"><strong>{{ $order['payDeadLine'] ? $order['payDeadLine'] : 'Already Paid' }}</strong></p>
                </td>
              </tr>

              <tr>
                <td>Buyer Name</td>
                <td class="py-3">
                  <p class="mb-0"><strong>{{ $or[0]['buyerName'] }}</strong></p>
                </td>
              </tr>

              <tr>
                <td>Order Business Id</td>
                <td class="py-3">
                  <p class="mb-0"><strong>{{ $or[0]['ordBusiId'] }}</strong></p>
                </td>
              </tr>

              <tr>
                <td>Seller Name</td>
                <td class="py-3">
                  <p class="mb-0"><strong>{{ $or[0]['sellerName'] }}</strong></p>
                </td>
              </tr>

              <tr>
                <td>Order Status</td>
                <td class="py-3">
                    <p class="mb-0"><strong>{{ $or[0]['ordStatusName'] }}</strong></p>
                </td>
            </tr>
            <tr>
                <td>Shipping From</td>
                <td class="py-3">
                    <p class="mb-0"><strong>{{ $or[0]['shipFrom'] }}</strong></p>
                </td>
            </tr>
            <tr>
                <td>Order Total</td>
                <td class="py-3">
                    <p class="mb-0"><strong>{{ $or[0]['orderTotal'] }}</strong></p>
                </td>
            </tr>
            <tr>
                <td>Items Subtotal</td>
                <td class="py-3">
                    <p class="mb-0"><strong>{{ $or[0]['itemsSubtotal'] }}</strong></p>
                </td>
            </tr>
            <tr>
                <td>Shipping Subtotal</td>
                <td class="py-3">
                    <p class="mb-0"><strong>{{ $or[0]['shippingSubtotal'] }}</strong></p>
                </td>
            </tr>
            <tr>
                <td>Tax Subtotal</td>
                <td class="py-3">
                    <p class="mb-0"><strong>{{ $or[0]['taxSubtotal'] }}</strong></p>
                </td>
            </tr>
            <tr>
                <td>Transaction Fee Subtotal</td>
                <td class="py-3">
                    <p class="mb-0"><strong>{{ $or[0]['transactionFeeSubtotal'] }}</strong></p>
                </td>
            </tr>
            <tr>
                <td>Inventory Location</td>
                <td class="py-3">
                    <p class="mb-0"><strong>{{ $or[0]['inventoryLocation'] }}</strong></p>
                </td>
            </tr>
            <tr>
                <td>Buyer Remark</td>
                <td class="py-3">
                    <p class="mb-0"><strong>{{ $or[0]['buyerRemark'] }}</strong></p>
                </td>
            </tr>

            <tr>
                <td>Order Logis Details</td>
                <td class="py-3">
                    <p class="mb-0"><strong>
                        @if(!empty($or[0]['orderLogisDetails']))
                            @foreach($or[0]['orderLogisDetails'] as $detail)
                                {{ $detail }}<br>
                            @endforeach
                        @else
                            N/A
                        @endif
                    </strong></p>
                </td>
            </tr>

            <tr>
                <td>Order Refund Apply Req List</td>
                <td class="py-3">
                    <p class="mb-0"><strong>{{ $or[0]['orderRefundApplyReqList'] }}</strong></p>
                </td>
            </tr>
            <tr>
                <td>Amount Paid By Crov Credit</td>
                <td class="py-3">
                    <p class="mb-0"><strong>{{ $or[0]['amountPaidByCrovCredit'] }}</strong></p>
                </td>
            </tr>
            <tr>
                <td>Amount Paid By Card</td>
                <td class="py-3">
                    <p class="mb-0"><strong>{{ $or[0]['amountPaidByCard'] }}</strong></p>
                </td>
            </tr>
            <tr>
                <td>Amount Paid By Account</td>
                <td class="py-3">
                    <p class="mb-0"><strong>{{ $or[0]['amountPaidByAccount'] }}</strong></p>
                </td>
            </tr>
            <tr>
                <td>Amount Paid By Bank Transfer</td>
                <td class="py-3">
                    <p class="mb-0"><strong>{{ $or[0]['amountPaidByBankTransfer'] }}</strong></p>
                </td>
            </tr>
            <tr>
                <td>Amount Refunded To Crov Credit</td>
                <td class="py-3">
                    <p class="mb-0"><strong>{{ $or[0]['amountRefundedToCrovCredit'] }}</strong></p>
                </td>
            </tr>




            </tbody>
          </table>
        </div>
      </div>




      <div class="card mb-4">
        <h5 class="card-header">Billing & Shipping Details</h5>
        <div class="card-body">
          <table class="table table-borderless">
            <tbody>

                <tr>
                    <td>Customer Details</td>
                    <td class="py-3">
                        <p class="mb-0"><strong>Name: {{ $or[0]['billingAddress']['name'] }}</strong></p>
                        <p class="mb-0"><strong>Province: {{ $or[0]['billingAddress']['provinceName'] }}</strong></p>
                        <p class="mb-0"><strong>Country: {{ $or[0]['billingAddress']['countryName'] }}</strong></p>
                        <p class="mb-0"><strong>Telephone: {{ $or[0]['billingAddress']['telephone'] }}</strong></p>
                        <p class="mb-0"><strong>Zip: {{ $or[0]['billingAddress']['zip'] }}</strong></p>
                        <p class="mb-0"><strong>City: {{ $or[0]['billingAddress']['cityName'] }}</strong></p>
                        <p class="mb-0"><strong>Address Line 1: {{ $or[0]['billingAddress']['address1'] }}</strong></p>
                        <p class="mb-0"><strong>Address Line 2: {{ $or[0]['billingAddress']['address2'] }}</strong></p>
                    </td>
                </tr>






            </tbody>
          </table>
        </div>
      </div>

      <div class="card mb-4">
        <h5 class="card-header">Ordered Items</h5>
        <div class="card-body">
          <table class="table table-table-bordered">
            <thead>
                <tr>
                    <th>Goods Name</th>
                    <th>Goods SKU Code</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>Item No</th>
                </tr>
            </thead>
            <tbody>
                @foreach($or[0]['orderItemList'] as $item)
                <tr>
                    <td>{{ $item['goodsName'] }}</td>
                    <td>{{ $item['goodsSkuCode'] }}</td>
                    <td>{{ $item['unitPrice'] }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>{{ $item['itemNo'] }}</td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>


    </div>
  </div>



</div>
<!-- / Content -->


@endsection
