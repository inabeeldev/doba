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
                    <span>Check Out</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->
@if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

@endif

@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>
@endif
<!-- Shopping Cart Section Begin -->
<section class="checkout-section spad">
    <div class="container">
        <form action="{{ route('checkout-store') }}" method="POST" class="checkout-form" id="formAuthentication">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    {{-- <div class="checkout-content">
                        <a href="#" class="content-btn">Click Here To Login</a>
                    </div> --}}
                    <h4>Biiling Details</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="name">Name<span>*</span></label>
                            <input type="text" id="name" name="billingAddress[name]" placeholder="Enter your full name" required>
                        </div>
                        <div class="col-lg-6">
                            <label for="email">Email<span>*</span></label>
                            <input type="email" id="email" name="email" placeholder="Enter your Email Address" required>
                        </div>
                        <div class="col-lg-6">
                            <label for="phone">Phone<span>*</span></label>
                            <input type="text" id="phone" name="billingAddress[telephone]" placeholder="Enter your phone number" required>
                        </div>
                        {{-- <div class="col-lg-12">
                            <label for="cun">Country Code<span>*</span></label>
                            <input type="text" id="cun" name="billingAddress[countryCode]" placeholder="Enter your country code" required>
                        </div> --}}
                        <input type="hidden" name="billingAddress[countryCode]" value="US" required>

                        <div class="col-lg-12">
                            <label for="provinceCode">State<span>*</span></label>
                            <select name="billingAddress[provinceCode]" id="provinceCode" class="form-control" >
                                <option value="">Select your state</option>
                                @foreach ($states as $state)
                                    <option value="{{ $state->code }}">{{ $state->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-12">
                            <label for="city">Town / City<span>*</span></label>
                            <select name="billingAddress[city]" id="city" class="form-control">
                                <option value="">Select your city</option>
                            </select>
                        </div>
                        {{-- <input type="text" id="town" name="billingAddress[city]" placeholder="Enter your town / city" required> --}}
                        <div class="col-lg-12 mt-3">
                            <label for="street">Street Address 1<span>*</span></label>
                            <input type="text" id="street" class="street-first" name="billingAddress[addr1]" placeholder="Enter your street address" required>
                        </div>
                        <div class="col-lg-12">
                            <label for="street2">Street Address 2</label>
                            <input type="text" id="street2" name="billingAddress[addr2]" placeholder="Enter additional street address">
                        </div>
                        <div class="col-lg-12">
                            <label for="zip">Postcode / ZIP <span>*</span></label>
                            <input type="text" id="zip" name="billingAddress[zip]" placeholder="Enter your postcode / ZIP" required>
                        </div>
                        <div class="col-lg-12">
                            <label for="phoneExt">Phone Extension</label>
                            <input type="text" id="phoneExt" name="billingAddress[phoneExtension]" placeholder="Enter your phone extension">
                        </div>
                    </div>

                </div>
                <div class="col-lg-6">
                    {{-- <div class="checkout-content">
                        <input type="text" placeholder="Enter Your Coupon Code">
                    </div> --}}
                    <div class="place-order">
                        <h4>Your Order</h4>
                        <div class="order-total">
                            @php
                                $total = 0;
                                $totalShipFee = 0;
                                $totalTax = 0; // Initialize total tax amount
                            @endphp
                            @foreach(session('cart', []) as $cartItem)
                                @php
                                    $total += $cartItem['price'] * $cartItem['quantity'];
                                    $totalShipFee += $cartItem['shipFee'];
                                    $totalTax += $cartItem['tax']; // Add tax amount to total tax
                                @endphp
                            @endforeach
                            <ul class="order-table">
                                <li>Product <span>Total</span></li>
                            </ul>
                            @foreach(session('cart', []) as $cartItem)
                                <ul class="order-table">
                                    <li class="fw-normal">{{ strlen($cartItem['title']) > 30 ? substr($cartItem['title'], 0, 40) . '...' : $cartItem['title'] }} x {{ $cartItem['quantity'] }}
                                        <span>${{ number_format($cartItem['price'] * $cartItem['quantity'], 2) }}</span>
                                    </li>
                                </ul>
                            @endforeach
                            <ul class="order-table">
                                <li class="fw-normal">Subtotal <span>${{ number_format($total, 2) }}</span></li>
                                <li class="fw-normal">Shipping Fee <span>${{ number_format($totalShipFee, 2) }}</span></li>
                                <li class="fw-normal">Tax <span>${{ number_format($totalTax, 2) }}</span></li> <!-- Display total tax amount -->
                                <li class="total-price">Total <span>${{ number_format($total + $totalShipFee + $totalTax, 2) }}</span></li>
                            </ul>

                            <input type="hidden" name="storeOrderAmount" value="{{ number_format($total + $totalShipFee + $totalTax, 2) }}">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="card" class="form-label">Enter Card Information</label>
                                </div>
                            </div>
                            <div id="card-element">
                                <!-- A Stripe Element will be inserted here. -->
                            </div>

                            <!-- Used to display form errors. -->
                            <div id="card-errors" role="alert"></div>
                            <br><br>
                            <div class="order-btn">
                                <button type="submit" class="site-btn place-btn">Place Order</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>
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



<script src="https://js.stripe.com/v3/"></script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        var stripe = Stripe('{{ config('services.stripe.key') }}');
        var elements = stripe.elements();
        var cardElement = elements.create('card');
        cardElement.mount('#card-element');

        var form = document.getElementById('formAuthentication');
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            stripe.createToken(cardElement).then(function(result) {
                if (result.error) {
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    var tokenInput = document.createElement('input');
                    tokenInput.setAttribute('type', 'hidden');
                    tokenInput.setAttribute('name', 'stripeToken');
                    tokenInput.setAttribute('value', result.token.id);
                    form.appendChild(tokenInput);
                    form.submit();
                }
            });
        });
    });
</script>


<script>
$(document).ready(function() {
    $('#provinceCode').select2(); // Initialize Select2 on the province select element

    $('#provinceCode').change(function() {
        var stateCode = $(this).val();
        if(stateCode) {
            $.ajax({
                type: "GET",
                url: "{{ route('get-cities', ':stateCode') }}".replace(':stateCode', stateCode),
                success: function(cities) {
                    $('#city').empty();
                    $('#city').append('<option value="">Select your city</option>');
                    $.each(cities, function(key, city) {
                        $('#city').append('<option value="' + city.city + '">' + city.city + '</option>');
                    });
                    $('#city').select2(); // Re-initialize Select2 on the city select element
                }
            });
        } else {
            $('#city').empty();
            $('#city').append('<option value="">Select your city</option>');
            $('#city').select2(); // Re-initialize Select2 on the city select element
        }
    });
});



</script>

@endsection
