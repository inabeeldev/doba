@extends('shop.app')

@section('content')






<!-- Product Shop Section Begin -->
<section class="product-shop2 spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-3">
                <div class="section-title">
                    <h2>{{ $catName }}</h2>
                </div>
            </div>
            <div class="col-lg-12 order-1 order-lg-2">
                <div class="product-list">
                    <div class="row">
                        @foreach ($products as $p)

                        <div class="col-lg-4 col-sm-6">
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
                </div><br><br>
                @php
                    $totalPages = $productData['totalPages'];
                    $currentPage = $productData['currentPage'];
                    $maxPagesToShow = 8; // Adjust this value to control the number of page links to display
                @endphp

                @if($totalPages > 1)
                    <nav aria-label="Page navigation">
                        <ul class="pagination pagination-lg justify-content-center">
                            @if($currentPage > 1)
                                <li class="page-item">
                                    <a class="page-link" href="{{ url('cat-products/' . $catId . '/' . $catName . '?page=1') }}" aria-label="First">
                                        <span aria-hidden="true">&laquo;&laquo;</span>
                                        <span class="sr-only">First</span>
                                    </a>
                                </li>
                            @endif

                            @for($i = max(1, $currentPage - floor($maxPagesToShow / 2)); $i <= min($totalPages, $currentPage + floor($maxPagesToShow / 2)); $i++)
                                <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                                    <a class="page-link" href="{{ url('cat-products/' . $catId . '/' . $catName . '?page=' . $i) }}">{{ $i }}</a>
                                </li>
                            @endfor

                            @if($currentPage < $totalPages)
                                <li class="page-item">
                                    <a class="page-link" href="{{ url('cat-products/' . $catId . '/' . $catName . '?page=' . $totalPages) }}" aria-label="Last">
                                        <span aria-hidden="true">&raquo;&raquo;</span>
                                        <span class="sr-only">Last</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </nav>
                @endif

            </div>
        </div>
    </div>
</section>
<!-- Product Shop Section End -->



@endsection


@section('scripts')





@endsection
