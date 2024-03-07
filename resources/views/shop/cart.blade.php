@extends('shop.app')

@section('content')


<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="./home.html"><i class="fa fa-home"></i> Home</a>
                    <a href="./shop.html">Shop</a>
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
                                <li class="subtotal">Subtotal <span>${{ number_format($total, 2) }}</span></li>
                                <li class="cart-total">Total <span>${{ number_format($total, 2) }}</span></li>
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
