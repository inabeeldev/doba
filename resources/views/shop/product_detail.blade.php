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
                    <span>Detail</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Product Shop Section Begin -->
<section class="product-shop2 spad page-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="product-pic-zoom">
                            @if (isset($productData[0]['children'][0]['skuPicList']) && is_array($productData[0]['children'][0]['skuPicList']) && count($productData[0]['children'][0]['skuPicList']) > 0)
                                <img class="product-big-img" src="{{ $productData[0]['children'][0]['skuPicList'][0] }}" alt="{{ $productData[0]['title'] }}">
                                <div class="zoom-icon">
                                    <i class="fa fa-search-plus"></i>
                                </div>
                            @else
                                <!-- Display a default image or a placeholder image -->
                                <img class="product-big-img" src="{{ asset('/public/customer/img/product-default.jpg') }}" alt="Default Product Image">
                            @endif
                        </div>
                        <div class="product-thumbs">
                            <div class="product-thumbs-track ps-slider owl-carousel">
                                @if (isset($productData[0]['children'][0]['skuPicList']) && is_array($productData[0]['children'][0]['skuPicList']) && count($productData[0]['children'][0]['skuPicList']) > 0)
                                    @foreach ($productData[0]['children'][0]['skuPicList'] as $image)
                                        <div class="pt" data-imgbigurl="{{ $image }}"><img src="{{ $image }}" alt="{{ $productData[0]['title'] }}"></div>
                                    @endforeach
                                @else
                                    <!-- Display a default image or a placeholder image -->
                                    <div class="pt" data-imgbigurl="{{ $productData[0]['children'][0]['skuPicList'][0] }}"><img src="{{ $productData[0]['children'][0]['skuPicList'][0] }}" alt="Default Product Image"></div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-details">
                            <div class="pd-title">
                                <span>{{ $productData[0]['sellerName'] }}</span>
                                <h3>{{ $productData[0]['title'] }}</h3>
                                <a href="#" class="heart-icon"><i class="icon_heart_alt"></i></a>
                            </div>
                            <div class="pd-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <span>(5)</span>
                            </div><br>
                            <div class="pd-desc">
                                <h4>${{ $productData[0]['children'][0]['marketPrice'] }} <span>${{ $productData[0]['children'][0]['marketPrice'] + 5 }}</span></h4>
                            </div>
                            <div class="pd-color">
                                <h6>Brand: <b>{{ $productData[0]['brand'] ? $productData[0]['brand'] : 'Not Specified' }}</b></h6>
                            </div><br><br>
                            @if ($productData[0]['children'][0]['stocks'][0]['availableNum'] == 0)
                            <div class="quantity">
                                <a href="#" class="primary-btn pd-cart" id="addToCartBtn">Out of Stock</a>
                            </div>
                            @else
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" id="quantityInput" value="1">
                                </div>
                                <a href="#" class="primary-btn pd-cart" id="addToCartBtn">Add To Cart</a>
                            </div>
                            @endif

                            <ul class="pd-tags">
                                <li><span>CATEGORY</span>: {{ $productData[0]['cateName'] }}</li>
                                <li><span>TAGS</span>: {{ implode(', ', $productData[0]['keywords']) }}</li>

                            </ul>
                            <div class="pd-share">
                                <div class="p-code">Sku : {{ $productData[0]['children'][0]['skuCode'] }}</div>
                                {{-- <div class="pd-social">
                                    <a href="#"><i class="ti-facebook"></i></a>
                                    <a href="#"><i class="ti-twitter-alt"></i></a>
                                    <a href="#"><i class="ti-linkedin"></i></a>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-tab">
                    <div class="tab-item">
                        <ul class="nav" role="tablist">
                            <li>
                                <a class="active" data-toggle="tab" href="#tab-1" role="tab">DESCRIPTION</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab-2" role="tab">SPECIFICATIONS</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab-3" role="tab">Customer Reviews (02)</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-item-content">
                        <div class="tab-content">
                            <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                <div class="product-content">
                                    <div class="row">
                                        <div class="col-lg-7">
                                            {!! $productData[0]['goodsDesc'] !!}
                                        </div>
                                        <div class="col-lg-5">
                                            <img src="img/product-single/tab-desc.jpg" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                <div class="specification-table">
                                    <table>
                                        <tr>
                                            <td class="p-catagory">Price</td>
                                            <td>
                                                <div class="p-price">{{ $productData[0]['children'][0]['marketPrice'] }} {{ $productData[0]['children'][0]['currencyName'] }}</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-catagory">Availability</td>
                                            <td>
                                                @if ($productData[0]['children'][0]['stocks'][0]['availableNum'] > 0)
                                                    <div class="p-stock">{{ $productData[0]['children'][0]['stocks'][0]['availableNum'] }} in stock</div>
                                                @else
                                                    <div class="p-stock">Out of stock</div>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-catagory">Weight</td>
                                            <td>
                                                <div class="p-weight">{{ $productData[0]['packagingInformation']['packagingWeight']['weight'] }} {{ $productData[0]['packagingInformation']['packagingWeight']['weightUnit'] }}</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-catagory">Size</td>
                                            <td>
                                                <div class="p-size">{{ $productData[0]['packagingInformation']['packagingSize']['length'] }}x{{ $productData[0]['packagingInformation']['packagingSize']['width'] }}{{ $productData[0]['packagingInformation']['packagingSize']['dimUnit'] }}</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-catagory">Color</td>
                                            <td>
                                                <div class="p-color">{{ $productData[0]['children'][0]['variantProps'][0]['propValue'] }}</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-catagory">Sku</td>
                                            <td>
                                                <div class="p-code">{{ $productData[0]['children'][0]['skuCode'] }}</div>
                                            </td>
                                        </tr>
                                    </table>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                <div class="customer-review-option">
                                    <h4>2 Comments</h4>
                                    <div class="comment-option">
                                        <div class="co-item">
                                            <div class="avatar-pic">
                                                <img src="{{ asset('/public/customer/img/product-single/avatar-1.png') }}" alt="">
                                            </div>
                                            <div class="avatar-text">
                                                <div class="at-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <h5>Brandon Kelley <span>27 Aug 2019</span></h5>
                                                <div class="at-reply">Nice !</div>
                                            </div>
                                        </div>
                                        <div class="co-item">
                                            <div class="avatar-pic">
                                                <img src="{{ asset('/public/customer/img/product-single/avatar-2.png') }}" alt="">
                                            </div>
                                            <div class="avatar-text">
                                                <div class="at-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <h5>Roy Banks <span>27 Aug 2019</span></h5>
                                                <div class="at-reply">Nice !</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="personal-rating">
                                        <h6>Your Ratind</h6>
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                    </div>
                                    <div class="leave-comment">
                                        <h4>Leave A Comment</h4>
                                        <form action="#" class="comment-form">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <input type="text" placeholder="Name">
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" placeholder="Email">
                                                </div>
                                                <div class="col-lg-12">
                                                    <textarea placeholder="Messages"></textarea>
                                                    <button type="submit" class="site-btn">Send message</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Shop Section End -->

<!-- Related Products Section End -->
<div class="related-products spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-3">
                <div class="section-title">
                    <h2>Related Products</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($randomRelatedProducts as $p)
            <div class="col-lg-3 col-sm-6">
                <div class="product-item">
                    <div class="pi-pic">
                        <a href="{{ route('product-detail', $p['spuId']) }}">
                            <img src="{{ $p['pictureUrl'] }}" alt="" class="product-img">
                        </a>
                        <div class="sale">Sale</div>
                        <div class="icon">
                            <i class="icon_heart_alt"></i>
                        </div>
                        <ul>
                            <li class="w-icon active"><a href="#">+ Add To Cart <i class="icon_bag_alt"></i></a></li>
                        </ul>
                    </div>
                    <div class="pi-text">
                        <a href="{{ route('product-detail', $p['spuId']) }}">
                            <h5>{{ strlen($p['title']) > 50 ? substr($p['title'], 0, 50) . '...' : $p['title'] }}</h5>
                        </a>
                        <div class="product-price">
                            ${{ $p['maxPrice'] }}
                            <span>${{ $p['maxPrice'] + 5 }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
<!-- Related Products Section End -->


@endsection


@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.getElementById('addToCartBtn').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default form submission

        var quantity = document.getElementById('quantityInput').value;
        var spuId = '{{ $productData[0]['spuId'] }}';
        var title = '{{ $productData[0]['title'] }}';
        var price = '{{ $productData[0]['children'][0]['stocks'][0]['sellingPrice'] }}';
        var skuPicList = '{{ $productData[0]['children'][0]['skuPicList'][0] }}';
        var itemNo = '{{ $productData[0]['children'][0]['stocks'][0]['itemNo'] }}'; // Assuming $p['itemNo'] is the item ID
        var shippingMethodId = '{{ $productData[0]['shipMethods'][0]['shipId'] }}'; // Assuming $p['shippingMethodId'] is the shipping method ID

        // Send data to server via AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '{{ route("add-to-cart") }}'); // Using Laravel route name
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}'); // Include CSRF token in the request header
        xhr.onload = function() {
            if (xhr.status === 200) {
                Swal.fire({
                    icon: "success",
                    title: "Success!",
                    text: "Item added to cart successfully!",
                    timer: 1000, // Set a timer to automatically close the alert after 2 seconds
                    showConfirmButton: false // Hide the "OK" button
                }).then(function() {
                    location.reload(); // Reload the page after the alert is closed
                });
            } else {
                alert('Failed to add item to cart.');
            }
        };
        xhr.send(JSON.stringify({
            itemNo: itemNo,
            quantity: quantity,
            shippingMethodId: shippingMethodId,
            spuId: spuId,
            title: title,
            price: price,
            skuPicList: skuPicList
        }));
    });
</script>



@endsection
