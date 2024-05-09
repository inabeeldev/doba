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
                                {{-- <a href="#" class="heart-icon"><i class="icon_heart_alt"></i></a> --}}
                            </div>
                            <div class="pd-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <span>(5)</span>
                            </div><br>
                            @php
                                $retailPrice = number_format($productData[0]['children'][0]['stocks'][0]['sellingPrice'] * 1.35, 2);
                                $retailPrice2 = number_format(($productData[0]['children'][0]['stocks'][0]['sellingPrice'] * 1.35) + 5, 2);
                            @endphp
                            <div class="pd-desc">
                                <h4>${{ $retailPrice }} <span>${{ $retailPrice2}}</span></h4>
                            </div>
                            <div class="pd-color">
                                <h6>Brand: <b>{{ $productData[0]['brand'] ? $productData[0]['brand'] : 'Not Specified' }}</b></h6>
                            </div><br>
                            <div class="pd-share">
                                <div class="p-code">SKU : {{ $productData[0]['children'][0]['skuCode'] }}</div>

                            </div><br><br>
                            @if ($productData[0]['children'][0]['stocks'][0]['availableNum'] == 0)
                            <div class="quantity">
                                <a href="#" class="primary-btn pd-cart" id="addToCartBtn1">Out of Stock</a>
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
                                @foreach ($productData[0]['children'][0]['variantProps'] as $variant)
                                    <li><span>{{ $variant['propName'] }}</span>: {{ $variant['propValue'] }}</li>
                                @endforeach
                            </ul>

                            <ul class="pd-tags">
                                <li><span>CATEGORY</span>: {{ $productData[0]['cateName'] }}</li>
                                <li><span>TAGS</span>: {{ implode(', ', $productData[0]['keywords']) }}</li>

                            </ul>



                            {{-- <div class="variant-props">
                                @foreach ($productData[0]['children'] as $child)
                                    @if ($child['stocks'][0]['itemNo'] !== $selectedItemNo)
                                        @foreach ($child['variantProps'] as $variant)
                                            @if (!empty($variant['propValue']))
                                                <p>{{ $variant['propName'] }}: {{ $variant['propValue'] }}</button>
                                            @endif
                                        @endforeach
                                        <br> <!-- Add a line break after each child's variant properties -->
                                    @endif
                                @endforeach
                            </div> --}}

                            <!-- Button trigger modal -->
                            <!-- Check if there are more than one children before showing the link -->
                            @if (count($productData[0]['children']) > 1)
                            <h6><a href="#" id="viewOtherVariantsBtn" style="color: #7D9B3C; font-weight:bold" data-toggle="modal" data-target="#otherVariantsModal">View Other Variants</a></h6>
                            @endif

                            <!-- Modal -->
                            <div class="modal fade" id="otherVariantsModal" tabindex="-1" role="dialog" aria-labelledby="otherVariantsModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="otherVariantsModalLabel">Other Variants</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                        <!-- Table headers -->
                                        <thead>
                                            <tr>
                                            <th>Item No</th>
                                            <th>Variant Props</th>
                                            <th>Stock</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Action</th>
                                            </tr>
                                        </thead>
                                        <!-- Table body -->
                                        <tbody id="otherVariantsTableBody">
                                            <!-- Variants will be dynamically populated here -->
                                        </tbody>
                                        </table>
                                    </div>
                                    </div>
                                    <!-- Modal footer with quantity input and "Add to Cart" button -->
                                    <div class="modal-footer">
                                    </div>
                                </div>
                                </div>
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
                                                <div class="p-price">{{ $productData[0]['children'][0]['currencyName'] }}{{ $retailPrice }}</div>
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
                                    <h4>{{ count($randomReviews) }} Comments</h4>
                                    <div class="comment-option">
                                        @foreach($randomReviews as $review)
                                            <div class="co-item">
                                                <div class="avatar-pic">
                                                    <img src="{{ asset('/public/customer/img/product-single/avatar-5.jpg') }}" alt="">
                                                </div>
                                                <div class="avatar-text">
                                                    <div class="at-rating">
                                                        @for($i = 0; $i < $review['rating']; $i++)
                                                            <i class="fa fa-star"></i>
                                                        @endfor
                                                        @for($i = 0; $i < 5 - $review['rating']; $i++)
                                                            <i class="fa fa-star-o"></i>
                                                        @endfor
                                                    </div>
                                                    <h5>{{ $review['name'] }} <span>{{ $review['date'] }}</span></h5>
                                                    <div class="at-reply">{{ $review['comment'] }}</div>
                                                </div>
                                            </div>
                                        @endforeach
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
                            <li class="w-icon active"><a href="{{ route('product-detail', $p['spuId']) }}">+ Add To Cart <i class="icon_bag_alt"></i></a></li>
                        </ul>
                    </div>
                    <div class="pi-text">
                        <a href="{{ route('product-detail', $p['spuId']) }}">
                            <h5>{{ strlen($p['title']) > 50 ? substr($p['title'], 0, 50) . '...' : $p['title'] }}</h5>
                        </a>
                        <div class="product-price">
                            ${{ number_format($p['maxPrice'] + ($p['maxPrice'] * 0.35), 2) }}
                            <span>${{ number_format($p['maxPrice'] + ($p['maxPrice'] * 0.35) + 5, 2) }}</span>
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
        var price = '{{ $retailPrice }}';
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



<script>
    // JavaScript to handle click events on variant property buttons
    const propButtons = document.querySelectorAll('.prop-button');

    propButtons.forEach(button => {
        button.addEventListener('click', () => {
            const propValue = button.dataset.propValue;
            filterChildren(propValue);
        });
    });

    function filterChildren(propValue) {
        const childProducts = document.querySelectorAll('.child-product');

        childProducts.forEach(product => {
            const variantProps = product.dataset.variantProps.split(',');
            if (variantProps.includes(propValue)) {
                product.style.display = 'block'; // Show the product if it matches the selected variant property
            } else {
                product.style.display = 'none'; // Hide the product if it doesn't match
            }
        });
    }
</script>


{{-- <script>
    document.getElementById('viewOtherVariantsBtn').addEventListener('click', function() {
      // Clear existing table body
      document.getElementById('otherVariantsTableBody').innerHTML = '';

      // Populate table body with other variants
      @foreach ($productData[0]['children'] as $child)
        @if ($child['stocks'][0]['itemNo'] !== $selectedItemNo)
          var row = document.createElement('tr');

          // Add itemNo cell
          var itemNoCell = document.createElement('td');
          itemNoCell.textContent = '{{ $child['stocks'][0]['itemNo'] }}';
          row.appendChild(itemNoCell);

          // Add variantProps cell
          var variantPropsCell = document.createElement('td');
          variantPropsCell.textContent = '';
          @foreach ($child['variantProps'] as $variant)
            variantPropsCell.textContent += '{{ $variant['propName'] }}: {{ $variant['propValue'] }}';
            if (@json(!$loop->last)) {
              variantPropsCell.textContent += ', ';
            }
          @endforeach
          row.appendChild(variantPropsCell);

          // Add quantity input cell
          var quantityCell = document.createElement('td');
          var quantityInput = document.createElement('input');
          quantityInput.type = 'number';
          quantityInput.className = 'form-control';
          quantityInput.value = '1';
          quantityInput.min = '1';
          quantityCell.appendChild(quantityInput);
          row.appendChild(quantityCell);

          // Add "Add to Cart" button cell
          var addToCartCell = document.createElement('td');
          var addToCartButton = document.createElement('button');
          addToCartButton.type = 'button';
          addToCartButton.className = 'btn btn-primary';
          addToCartButton.textContent = 'Add to Cart';
          addToCartButton.addEventListener('click', function() {
            // Handle "Add to Cart" button click event for this variant
            var quantity = quantityInput.value;
            var itemNo = '{{ $child['stocks'][0]['itemNo'] }}'; // Assuming $child['stocks'][0]['itemNo'] is the item ID

            // Send data to server via AJAX
            // Implement your AJAX request here
          });
          addToCartCell.appendChild(addToCartButton);
          row.appendChild(addToCartCell);

          // Append the row to the table body
          document.getElementById('otherVariantsTableBody').appendChild(row);
        @endif
      @endforeach
    });
  </script> --}}


  <script>
    document.getElementById('viewOtherVariantsBtn').addEventListener('click', function() {
      // Clear existing table body
      document.getElementById('otherVariantsTableBody').innerHTML = '';

      // Populate table body with other variants
      @foreach ($productData[0]['children'] as $child)
        @if ($child['stocks'][0]['itemNo'] !== $selectedItemNo)
          var row = document.createElement('tr');

          // Add itemNo cell
          var itemNoCell = document.createElement('td');
          itemNoCell.textContent = '{{ $child['stocks'][0]['itemNo'] }}';
          row.appendChild(itemNoCell);

          // Add variantProps cell
          var variantPropsCell = document.createElement('td');
          variantPropsCell.textContent = '';
          @foreach ($child['variantProps'] as $variant)
            variantPropsCell.textContent += '{{ $variant['propName'] }}: {{ $variant['propValue'] }}';
            if (@json(!$loop->last)) {
              variantPropsCell.textContent += ', ';
            }
          @endforeach
          row.appendChild(variantPropsCell);

          var stockCell = document.createElement('td');
          var stock = '{{ $child['stocks'][0]['availableNum'] }}';
          stockCell.textContent = stock;
          row.appendChild(stockCell);


          // Add price cell
          var priceCell = document.createElement('td');
          var price = '{{ $child['stocks'][0]['sellingPrice'] * 1.35 }}'; // Calculate the price
          priceCell.textContent = '$' + price; // Display the price with currency symbol
          row.appendChild(priceCell);



          // Add quantity input cell
          var quantityCell = document.createElement('td');
          var quantityInput = document.createElement('input');
          quantityInput.type = 'number';
          quantityInput.className = 'form-control';
          quantityInput.value = '1';
          quantityInput.min = '1';
          quantityCell.appendChild(quantityInput);
          row.appendChild(quantityCell);

          // Add "Add to Cart" button cell
          var addToCartCell = document.createElement('td');
          var addToCartButton = document.createElement('button');
          addToCartButton.type = 'button';
          addToCartButton.className = 'btn btn-primary';
          addToCartButton.textContent = 'Add to Cart';
          addToCartButton.addEventListener('click', function() {
            // Handle "Add to Cart" button click event for this variant
            var quantity = quantityInput.value;
            var itemNo = '{{ $child['stocks'][0]['itemNo'] }}'; // Assuming $child['stocks'][0]['itemNo'] is the item ID
            var price = '{{ $child['stocks'][0]['sellingPrice'] * 1.35 }}';
            var shippingMethodId = '{{ $productData[0]['shipMethods'][0]['shipId'] }}';
            var spuId = '{{ $productData[0]['spuId'] }}';
            var title = '{{ $productData[0]['title'] }}';
            var skuPicList = '{{ $productData[0]['children'][0]['skuPicList'][0] }}';

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
              price: price,
              shippingMethodId: shippingMethodId,
              spuId: spuId,
              title: title,
              skuPicList: skuPicList
            }));
          });
          addToCartCell.appendChild(addToCartButton);
          row.appendChild(addToCartCell);

          // Append the row to the table body
          document.getElementById('otherVariantsTableBody').appendChild(row);
        @endif
      @endforeach
    });
  </script>





@endsection
