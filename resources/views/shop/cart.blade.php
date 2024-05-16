@extends('shop.app')

@section('content')


<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
                    <a href="{{ route('shop-page') }}">Shop</a>
                    <span>Shopping Cart</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cart-table">
                    <table>
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th class="p-name">Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th><i class="ti-close"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total = 0;
                            @endphp
                            @foreach(session('cart', []) as $cartItem)
                                @php
                                    $total += $cartItem['price'] * $cartItem['quantity'];
                                @endphp
                            @endforeach
                            @foreach(session('cart', []) as $cartItem)
                            <tr>
                                <td class="cart-pic first-row"><img src="{{ asset($cartItem['skuPicList']) }}" alt=""></td>
                                <td class="cart-title first-row">
                                    <a href="{{ route('product-detail', $cartItem['spuId']) }}">
                                        <h5>{{ $cartItem['title'] }}</h5>
                                    </a>
                                </td>
                                <td class="p-price first-row">${{ number_format($cartItem['price'], 2) }}</td>
                                <td class="qua-col first-row">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="number" value="{{ $cartItem['quantity'] }}" onchange="updateCartItem('{{ $cartItem['itemNo'] }}', this.value)">
                                        </div>
                                    </div>
                                </td>
                                <td class="total-price first-row">${{ number_format($cartItem['price'] * $cartItem['quantity'], 2) }}</td>
                                <td class="close-td first-row">
                                    <button class="remove-item-btn" onclick="removeCartItem('{{ $cartItem['itemNo'] }}')">
                                        <i class="ti-close"></i>
                                    </button>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-4">

                    </div>
                    <div class="col-lg-4 offset-lg-4">
                        <div class="proceed-checkout">
                            <ul>
                                {{-- <li class="subtotal">Subtotal <span>${{ number_format($total, 2) }}</span></li> --}}
                                <li class="cart-total">Subtotal <span>${{ number_format($total, 2) }}</span></li>
                            </ul>
                            <a href="{{ route('checkout-page') }}" class="proceed-btn">PROCEED TO CHECKOUT</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shopping Cart Section End -->


<!-- Product Shop Section Begin -->
<section class="product-shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-3">
                <div class="section-title">
                    <h2>Products You may also want</h2>
                </div>
            </div>
            <div class="col-lg-12 order-1 order-lg-2">
                <div class="product-list">
                    <div class="row">
                        @foreach ($products2 as $p)

                        <div class="col-lg-3 col-sm-6">
                            <div class="product-item">
                                <div class="pi-pic">
                                    <a href="{{ route('product-detail', $p['spuId']) }}">
                                        <img src="{{ $p['pictureUrl'] }}" alt="" class="product-img">
                                    </a>
                                    <div class="sale pp-sale">Sale</div>
                                    <div class="icon">
                                        <i class="icon_heart_alt"></i>
                                    </div>
                                    <ul>
                                        <li class="w-icon active"><a href="{{ route('product-detail', $p['spuId']) }}">+ Add To Cart <i class="icon_bag_alt"></i></a></li>
                                    </ul>
                                </div>
                                <div class="pi-text">
                                    <a href="{{ route('product-detail', $p['spuId']) }}">
                                        <h5>{{ strlen($p['title']) > 50 ? substr($p['title'], 0, 50) . '...' : $p['title'] }}</h5>
                                    </a>
                                    <div class="product-price">
                                        ${{ number_format($p['maxPrice'] + ($p['maxPrice'] * 0.45), 2) }}
                                        <span>${{ number_format($p['maxPrice'] + ($p['maxPrice'] * 0.45) + 5, 2) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- Product Shop Section End -->



@endsection


@section('scripts')

<script>
    // Get CSRF token
    var csrfToken = '{{ csrf_token() }}';

    // Update cart item quantity
    function updateCartItem(itemNo, quantity) {
        // Send AJAX request to update the quantity on the server
        $.ajax({
            url: '{{ route("update-cart-item") }}',
            method: 'POST',
            data: {
                itemNo: itemNo,
                quantity: quantity,
                _token: csrfToken // Include CSRF token
            },
            success: function(response) {
                // Reload the page or update the UI as needed
                window.location.reload();
            },
            error: function(xhr, status, error) {
                console.error(error);
                alert('Failed to update cart item.');
            }
        });
    }

    // Remove cart item
    function removeCartItem(itemNo) {
        // Send AJAX request to remove the item from the cart on the server
        $.ajax({
            url: '{{ route("remove-cart-item") }}',
            method: 'POST',
            data: {
                itemNo: itemNo,
                _token: csrfToken // Include CSRF token
            },
            success: function(response) {
                // Reload the page or update the UI as needed
                window.location.reload();
            },
            error: function(xhr, status, error) {
                console.error(error);
                alert('Failed to remove cart item.');
            }
        });
    }
</script>






@endsection
