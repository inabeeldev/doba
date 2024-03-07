@extends('shop.app')

@section('content')



<!-- Hero Section Begin -->
<section class="hero-section">
    <div class="hero-items owl-carousel">
        <div class="single-hero-items set-bg" data-setbg="{{ asset('public/customer/img/hero-1.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <span>Bag,kids</span>
                        <h1>Black friday</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore</p>
                        <a href="#" class="primary-btn">Shop Now</a>
                    </div>
                </div>
                <div class="off-card">
                    <h2>Sale <span>50%</span></h2>
                </div>
            </div>
        </div>
        <div class="single-hero-items set-bg" data-setbg="{{ asset('public/customer/img/hero-2.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <span>Bag,kids</span>
                        <h1>Black friday</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore</p>
                        <a href="#" class="primary-btn">Shop Now</a>
                    </div>
                </div>
                <div class="off-card">
                    <h2>Sale <span>50%</span></h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->



<!-- Product Shop Section Begin -->
<section class="product-shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h4>Showing Results for '{{ $query }}'</h4>
                </div>
            </div>
            <div class="col-lg-12 order-1 order-lg-2">
                <div class="product-list">
                    <div class="row">
                        @foreach ($products['goodsList'] as $p)

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
                                        ${{ $p['maxPrice'] }}
                                        <span>${{ $p['maxPrice'] + 5 }}</span>
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
                        <ul class="pagination justify-content-center">
                            @if($currentPage > 1)
                                <li class="page-item">
                                    <a class="page-link" href="{{ url('search?query=' . $query . '&page=1') }}" aria-label="First">
                                        <span aria-hidden="true">&laquo;&laquo;</span>
                                        <span class="sr-only">First</span>
                                    </a>
                                </li>
                            @endif

                            @for($i = max(1, $currentPage - floor($maxPagesToShow / 2)); $i <= min($totalPages, $currentPage + floor($maxPagesToShow / 2)); $i++)
                                <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                                    <a class="page-link" href="{{ url('search?query=' . $query . '&page=' . $i) }}">{{ $i }}</a>
                                </li>
                            @endfor

                            @if($currentPage < $totalPages)
                                <li class="page-item">
                                    <a class="page-link" href="{{ url('search?query=' . $query . '&page=' . $totalPages) }}" aria-label="Last">
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
