@extends('shop.app')

@section('content')



<!-- Hero Section Begin -->
<section class="hero-section">
    <div class="hero-items owl-carousel">
        <div class="single-hero-items set-bg single-hero-items-overlay" data-setbg="{{ asset('public/customer/img/hero-1.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        {{-- <span>Bag,kids</span> --}}
                        <h1>{{ \Carbon\Carbon::now()->format('l') }} Sale</h1>
                        <p>Enjoy exclusive discounts every {{ strtolower(\Carbon\Carbon::now()->format('l')) }} at our store! Hurry up and grab the best deals before they're gone!</p>

                        <a href="{{ url('/shop') }}" class="primary-btn">Shop Now</a>
                    </div>
                </div>
                <div class="off-card">
                    <h2>Sale Upto<span>50%</span></h2>
                </div>
            </div>
        </div>
        <div class="single-hero-items set-bg single-hero-items-overlay" data-setbg="{{ asset('public/customer/img/hero-2.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        {{-- <span>Bag,kids</span> --}}
                        <h1>{{ \Carbon\Carbon::now()->format('l') }} Sale</h1>
                        <p>Enjoy exclusive discounts every {{ strtolower(\Carbon\Carbon::now()->format('l')) }} at our store! Hurry up and grab the best deals before they're gone!</p>

                        <a href="{{ url('/shop') }}" class="primary-btn">Shop Now</a>
                    </div>
                </div>
                <div class="off-card">
                    <h2>Sale Upto<span>50%</span></h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->


<div class="banner-section2 spad">
<div class="container-fluid">
    <div class="col-lg-12 mt-5">
        <div class="section-title">
            <h2>Our Promises</h2>
        </div>
    </div>
<div class="benefit-items">
    <div class="row">
        <div class="col-lg-4">
            <div class="single-benefit">
                <div class="sb-icon">
                    <img src="{{ asset('public/customer/img/new/truck.png') }}" alt="">
                </div>
                <div class="sb-text">
                    <h6>Free Shipping</h6>
                    <p>For all order over 99$</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="single-benefit">
                <div class="sb-icon">
                    <img src="{{ asset('public/customer/img/new/fast-time.png') }}" alt="">
                </div>
                <div class="sb-text">
                    <h6>Delivery On Time</h6>
                    <p>If good have prolems</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="single-benefit">
                <div class="sb-icon">
                    <img src="{{ asset('public/customer/img/new/card.png') }}" alt="">
                </div>
                <div class="sb-text">
                    <h6>Secure Payment</h6>
                    <p>100% secure payment</p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<!-- Banner Section Begin -->
<div class="banner-section spad">
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="section-title">
                <h2>Trending Collections</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <a href="{{ route('cat-products', ['catId' => 'grVyDtYRvJbB', 'catName' => 'Men']) }}">
                    <div class="single-banner">
                        <img src="{{ asset('public/customer/img/banner-1.jpg') }}" alt="">
                        <div class="inner-text">
                            <h4>Men’s</h4>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4">
                <a href="{{ route('cat-products', ['catId' => 'rnvgbAYilcDw', 'catName' => 'Women']) }}">
                    <div class="single-banner">
                        <img src="{{ asset('public/customer/img/banner-2.jpg') }}" alt="">
                        <div class="inner-text">
                            <h4>Women’s</h4>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4">
                <a href="{{ route('cat-products', ['catId' => 'AMqQVfPBoYDH', 'catName' => 'Baby']) }}">
                    <div class="single-banner">
                        <img src="{{ asset('public/customer/img/banner-3.jpg') }}" alt="">
                        <div class="inner-text">
                            <h4>Kid’s</h4>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Banner Section End -->


{{-- cat section --}}
<div class="">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Popular Categories</h2>
                </div>
            </div>
            <div class="col-md-2 col-sm-12">
                <div class="category-1">
                    <a href="{{ route('cat-products', ['catId' => 'AnDbvgoDFcVY', 'catName' => 'Beauty & Health']) }}">
                        <img src="{{ asset('public/customer/img/category/beauty.jpg') }}" alt="Category 1" class="rounded-circle img-responsive smaller-image">
                        <p class="text-center mt-3 font-weight-bold h5">Beauty & Health</p>
                    </a>
                </div>
            </div>
            <div class="col-md-2 col-sm-12">
                <div class="category-1">
                    <a href="{{ route('cat-products', ['catId' => 'BpvWbAPOIcqo', 'catName' => 'Clothing, Shoes & Jewelry']) }}">
                        <img src="{{ asset('public/customer/img/category/clothing.jpg') }}" alt="Category 2" class="rounded-circle img-responsive smaller-image">
                        <p class="text-center mt-3 font-weight-bold h5">Clothing & Jewelry</p>
                    </a>
                </div>
            </div>
            <div class="col-md-2 col-sm-12">
                <div class="category-1">
                    <a href="{{ route('cat-products', ['catId' => 'rRvPbBYtMJDn', 'catName' => 'Toys, Kids & Baby']) }}">
                        <img src="{{ asset('public/customer/img/category/toys.jpg') }}" alt="Category 3" class="rounded-circle img-responsive smaller-image">
                        <p class="text-center mt-3 font-weight-bold h5">Kids</p>
                    </a>
                </div>
            </div>
            <div class="col-md-2 col-sm-12">
                <div class="category-1">
                    <a href="{{ route('cat-products', ['catId' => 'rKvSDFctCoVA', 'catName' => 'Electronics']) }}">
                        <img src="{{ asset('public/customer/img/category/electronics.jpg') }}" alt="Category 4" class="rounded-circle img-responsive smaller-image">
                        <p class="text-center mt-3 font-weight-bold h5">Electronics</p>
                    </a>
                </div>
            </div>
            <div class="col-md-2 col-sm-12">
                <div class="category-1">
                    <a href="{{ route('cat-products', ['catId' => 'BovRVPJymYDO', 'catName' => 'Home, Garden & Tools']) }}">
                        <img src="{{ asset('public/customer/img/category/home.jpg') }}" alt="Category 4" class="rounded-circle img-responsive smaller-image">
                        <p class="text-center mt-3 font-weight-bold h5">Home & Garden</p>
                    </a>
                </div>
            </div>
        </div>
        <!-- Add more rows of categories here if needed -->
    </div>
</div>


{{-- cat section end --}}





<!-- Deals of day Begin -->
<section class="blog-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Deals Of the Day</h2>
                </div>
            </div>
            <div class="col-lg-12 order-1 order-lg-2">
                <div class="row">
                    @foreach ($products2 as $p)
                    <div class="col-lg-3 col-sm-4">
                        <div class="blog-item">
                            <div class="bi-pic">
                                <a href="{{ route('product-detail', $p['spuId']) }}">
                                    <img src="{{ $p['pictureUrl'] }}" alt="">
                                </a>
                            </div>
                            <div class="bi-text text-center">
                                <a href="{{ route('product-detail', $p['spuId']) }}">
                                    <h4>{{ strlen($p['title']) > 40 ? substr($p['title'], 0, 40) . '...' : $p['title'] }}</h4>
                                </a>
                                <p class="mb-3" style="font-size: 22px; font-weight:bolder">${{ $p['maxPrice'] }}</p>
                                <div class="countdown-timer2" id="countdownp">
                                    <div class="cd-item">
                                        <span>01</span>
                                        <p>Days</p>
                                    </div>
                                    <div class="cd-item">
                                        <span>9</span>
                                        <p>Hrs</p>
                                    </div>
                                    <div class="cd-item">
                                        <span>40</span>
                                        <p>Mins</p>
                                    </div>
                                    <div class="cd-item">
                                        <span>52</span>
                                        <p>Secs</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
<!-- deals of day End -->



<!-- Product Shop Section Begin -->
<section class="product-shop">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Items Of The Week</h2>
                </div>
            </div>
            <div class="col-lg-12 order-1 order-lg-2">
                <div class="product-list">
                    <div class="row">
                        @foreach ($productData[0] as $p)

                        <div class="col-lg-3 col-sm-6">
                            <div class="product-item mb-5">
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
                </div>
                {{-- @if ($productData->lastPage() > 1)
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                        <li class="page-item {{ ($productData->currentPage() == 1) ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $productData->previousPageUrl() }}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        @for ($i = 1; $i <= $productData->lastPage(); $i++)
                            <li class="page-item {{ ($productData->currentPage() == $i) ? 'active' : '' }}">
                                <a class="page-link" href="{{ url('/?page=' . $i) }}">{{ $i }}</a>
                            </li>
                        @endfor
                        <li class="page-item {{ ($productData->currentPage() == $productData->lastPage()) ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $productData->nextPageUrl() }}" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            @endif --}}


            </div>
        </div>
    </div>
</section>
<!-- Product Shop Section End -->

<!-- Man Banner Section Begin -->
<section class="man-banner spad">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="filter-control">
                    <ul>
                        <li class="active">Recently Added</li>
                        {{-- <li>HandBag</li>
                        <li>Shoes</li>
                        <li>Accessories</li> --}}
                    </ul>
                </div>
                <div class="product-slider owl-carousel">
                    @foreach ($productData[1] as $p)
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
                    @endforeach
                </div>
            </div>
            <div class="col-lg-3 offset-lg-1">
                <a href="{{ route('cat-products', ['catId' => 'grVyDtYRvJbB', 'catName' => 'Men']) }}">
                    <div class="product-large set-bg" data-setbg="{{ asset('public/customer/img/products/man-large.jpg') }}">
                        <h2>Men’s</h2>
                        <h6 class="mt-3 text-white"><u>Discover More</u></h6>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- Man Banner Section End -->

<!-- Deal Of The Week Section Begin-->
<section class="deal-of-week set-bg spad" style="background: #F8F8F0">
    <div class="container">
        <div class="col-lg-12 text-center">
            <div class="section-title">
                <h2>Deals Of The Week</h2>
                <p>Discover our amazing deals of the week and save big on your favorite items! Whether you're shopping for electronics, fashion, or home goods, we've got something for everyone. Don't miss out!</p>


                {{-- <div class="product-price">
                    $35.00
                    <span>/ HanBag</span>
                </div> --}}
            </div>
            <div class="countdown-timer" id="countdown">
                <div class="cd-item">
                    <span>56</span>
                    <p>Days</p>
                </div>
                <div class="cd-item">
                    <span>12</span>
                    <p>Hrs</p>
                </div>
                <div class="cd-item">
                    <span>40</span>
                    <p>Mins</p>
                </div>
                <div class="cd-item">
                    <span>52</span>
                    <p>Secs</p>
                </div>
            </div>
            <a href="{{ route('shop-page') }}" class="primary-btn">Shop Now</a>
        </div>
    </div>
</section>
<!-- Deal Of The Week Section End -->



<!-- Women Banner Section Begin -->
<section class="women-banner spad">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <a href="{{ route('cat-products', ['catId' => 'rnvgbAYilcDw', 'catName' => 'Women']) }}">
                    <div class="product-large set-bg" data-setbg="{{ asset('public/customer/img/products/women-large.jpg') }}">
                        <h2>Women’s</h2>
                        <h6 class="mt-3 text-white"><u>Discover More</u></h6>
                    </div>
                </a>
            </div>
            <div class="col-lg-8 offset-lg-1">
                <div class="filter-control">
                    <ul>
                        <li class="active">Recently Added</li>
                        {{-- <li>HandBag</li>
                        <li>Shoes</li>
                        <li>Accessories</li> --}}
                    </ul>
                </div>
                <div class="product-slider owl-carousel">
                    @foreach ($productData[2] as $p)
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
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Women Banner Section End -->













<!-- Product Shop Section Begin -->
<section class="product-shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>New Arrivals</h2>
                </div>
            </div>
            <div class="col-lg-12 order-1 order-lg-2">
                <div class="product-list">
                    <div class="row">
                        @foreach ($productData[3] as $p)

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
                                        ${{ $p['maxPrice'] }}
                                        <span>${{ $p['maxPrice'] + 5 }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach

                    </div>
                </div>
                {{-- @if ($productData->lastPage() > 1)
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                        <li class="page-item {{ ($productData->currentPage() == 1) ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $productData->previousPageUrl() }}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        @for ($i = 1; $i <= $productData->lastPage(); $i++)
                            <li class="page-item {{ ($productData->currentPage() == $i) ? 'active' : '' }}">
                                <a class="page-link" href="{{ url('/?page=' . $i) }}">{{ $i }}</a>
                            </li>
                        @endfor
                        <li class="page-item {{ ($productData->currentPage() == $productData->lastPage()) ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $productData->nextPageUrl() }}" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            @endif --}}


            </div>
        </div>
    </div>
</section>
<!-- Product Shop Section End -->

<!-- Instagram Section Begin -->
<div class="col-lg-12">
    <div class="section-title mb-3 mt-3">
        <h2>Top Picks</h2>
    </div>
</div>
<div class="instagram-photo">
    <a href="{{ route('cat-products', ['catId' => 'ZNbpvVJUQcqn', 'catName' => 'Outdoor']) }}">
    <div class="insta-item set-bg" data-setbg="{{ asset('public/customer/img/category/outdoor.jpg') }}">
        <div class="inside-text">
            <i class="ti-shopping-cart"></i>
            <h5>Outdoor</h5>
        </div>
    </div>
    </a>
    <a href="{{ route('cat-products', ['catId' => 'WAbcVOJQoYDN', 'catName' => 'Pet Supplies']) }}">
    <div class="insta-item set-bg" data-setbg="{{ asset('public/customer/img/category/pets.jpg') }}">
        <div class="inside-text">
            <i class="ti-shopping-cart"></i>
            <h5>Pets</h5>
        </div>
    </div>
    </a>
    <a href="{{ route('cat-products', ['catId' => 'WYvhDeJtFcbg', 'catName' => 'Electronics Accessories']) }}">
    <div class="insta-item set-bg" data-setbg="{{ asset('public/customer/img/category/electronics1.jpg') }}">
        <div class="inside-text">
            <i class="ti-shopping-cart"></i>
            <h5>Electronics</h5>
        </div>
    </div>
    </a>
    <a href="{{ route('cat-products', ['catId' => 'fVvMDFcEoYba', 'catName' => 'Automotive']) }}">
    <div class="insta-item set-bg" data-setbg="{{ asset('public/customer/img/category/automotive.jpg') }}">
        <div class="inside-text">
            <i class="ti-shopping-cart"></i>
            <h5>Automotive</h5>
        </div>
    </div>
    </a>
    <a href="{{ route('cat-products', ['catId' => 'kNqPvIojdYVD', 'catName' => 'Industrial']) }}">
    <div class="insta-item set-bg" data-setbg="{{ asset('public/customer/img/category/industrial.jpg') }}">
        <div class="inside-text">
            <i class="ti-shopping-cart"></i>
            <h5>Industrial</h5>
        </div>
    </div>
    </a>
    <a href="{{ route('cat-products', ['catId' => 'WrDgVAYWlobc', 'catName' => 'Fashion Accessories']) }}">
    <div class="insta-item set-bg" data-setbg="{{ asset('public/customer/img/category/clothing1.jpg') }}">
        <div class="inside-text">
            <i class="ti-shopping-cart"></i>
            <h5>Fashion</h5>
        </div>
    </div>
    </a>
</div>
<!-- Instagram Section End -->


{{-- @php
    $blogt1 = 'Find The Collection Of Beauty Products For Women At Nature Checkout.';
    $blogt2 = 'Decorate Your Home With Unique Home Decorative Items Available At The Doorstep.';
    $blogt3 = 'Discover Nature Checkout, Haven For Men’s & Women’s Fashion Accessories';
    $blogd1 = 'Nature Checkout, your ultimate destination for health and beauty products, understands the importance of pampering your inner and outer wellness. ';
    $blogd2 = 'Step into  our online store where beauty meets functionality, where creativity knows no bounds, and where your living space becomes a canvas for artistic expression.';
    $blogd3 = 'Discover the latest trends and update your style with our extensive collection of fashion accessories at Nature Checkout.';
@endphp
<!-- Latest Blog Section Begin -->
<section class="latest-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>From The Blog</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single-latest-blog">
                    <img src="{{ asset('public/customer/img/latest-1.jpg') }}" alt="">
                    <div class="latest-text">
                        <div class="tag-list">
                            <div class="tag-item">
                                <i class="fa fa-calendar-o"></i>
                                May 14,2024
                            </div>

                        </div>
                        <a href="#">
                            <h4>{{ strlen($blogt1) > 50 ? substr($blogt1, 0, 50) . '...' : $blogt1 }}</h4>
                        </a>
                        <p>{{ strlen($blogd1) > 100 ? substr($blogd1, 0, 100) . '...' : $blogd1 }} </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-latest-blog">
                    <img src="{{ asset('public/customer/img/latest-2.jpg') }}" alt="">
                    <div class="latest-text">
                        <div class="tag-list">
                            <div class="tag-item">
                                <i class="fa fa-calendar-o"></i>
                                May 14,2024
                            </div>

                        </div>
                        <a href="#">
                            <h4>{{ strlen($blogt2) > 50 ? substr($blogt2, 0, 50) . '...' : $blogt2 }}</h4>
                        </a>
                        <p>{{ strlen($blogd2) > 100 ? substr($blogd2, 0, 100) . '...' : $blogd2 }} </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-latest-blog">
                    <img src="{{ asset('public/customer/img/latest-3.jpg') }}" alt="">
                    <div class="latest-text">
                        <div class="tag-list">
                            <div class="tag-item">
                                <i class="fa fa-calendar-o"></i>
                                May 14,2024
                            </div>

                        </div>
                        <a href="#">
                            <h4>{{ strlen($blogt3) > 50 ? substr($blogt3, 0, 50) . '...' : $blogt3 }}</h4>
                        </a>
                        <p>{{ strlen($blogd3) > 100 ? substr($blogd3, 0, 100) . '...' : $blogd3 }} </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Latest Blog Section End --> --}}

<!-- Faq Section Begin -->
<div class="">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mt-5 mb-3">
                <div class="section-title">
                    <h2>Frequently Asked Questions</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="faq-accordin">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-heading active">
                                <a class="active" data-toggle="collapse" data-target="#collapseOne">
                                    How do I place an order on Nature Checkout?
                                </a>
                            </div>
                            <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                <div class="card-body">
                                    <p>Ordering from Nature Checkout is easy! Simply browse our
                                        products, click on the item you want, choose your
                                        options/specs (size, color, etc.), and click "Add to Cart."
                                        When you're ready to complete your purchase, click the
                                        shopping cart icon and follow the checkout process.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-heading">
                                <a data-toggle="collapse" data-target="#collapseTwo">
                                    How long will the delivery take?
                                </a>
                            </div>
                            <div id="collapseTwo" class="collapse" data-parent="#accordionExample">
                                <div class="card-body">
                                    <p>The delivery time depends on your location and the shipping
                                        method you choose during the checkout process. Our standard
                                        shipping option typically takes between 2 to 10 business
                                        days, while express shipping delivers within 5 business
                                        days.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-heading">
                                <a data-toggle="collapse" data-target="#collapseThree">
                                    What payment methods do you accept?
                                </a>
                            </div>
                            <div id="collapseThree" class="collapse" data-parent="#accordionExample">
                                <div class="card-body">
                                    <p>We accept major credit and debit cards, including Visa,
                                        Mastercard, American Express, and Discover.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-heading">
                                <a data-toggle="collapse" data-target="#collapse4">
                                    What if I have a question about a product or need
                                    assistance?
                                </a>
                            </div>
                            <div id="collapse4" class="collapse" data-parent="#accordionExample">
                                <div class="card-body">
                                    <p>We're here to help! Feel free to contact our Customer
                                        Support team via email at info@naturecheckout.com or contact
                                        helpdesk during our business hours. We're always happy to
                                        assist with any inquiries or concerns.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('public/customer/img/faq.jpg') }}" alt="" style="border-radius: 20px" class="faq-img img-responsive img-fluid">
            </div>
        </div>
    </div>
</div>
<!-- Faq Section End -->

<br><br>
<!-- Partner Logo Section Begin -->
<div class="partner-logo">
    <div class="container">
        <div class="logo-carousel owl-carousel">
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="{{ asset('public/customer/img/logo-carousel/logo-1.png') }}" alt="">
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="{{ asset('public/customer/img/logo-carousel/logo-2.png') }}" alt="">
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="{{ asset('public/customer/img/logo-carousel/logo-3.png') }}" alt="">
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="{{ asset('public/customer/img/logo-carousel/logo-4.png') }}" alt="">
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="{{ asset('public/customer/img/logo-carousel/logo-5.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Partner Logo Section End -->


















<!-- Button trigger modal -->
<button type="button" class="btn btn-primary d-none" id="modalTrigger" data-toggle="modal" data-target="#exampleModalCenter">
    Launch demo modal
  </button>

 <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Welcome to Nature Checkout!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img src="{{ asset('public/customer/img/logo/logo3.png') }}" alt="Image" class="img-fluid" style="width: 25%">
                <p class="mt-3">Welcome to our shopping paradise! We are thrilled to have you here and are excited to showcase our vast collection of products designed to cater to your needs and desires.</p>
                <p>Take your time to explore our website, discover new arrivals, and take advantage of our exclusive deals and promotions. We are confident that you'll find something special that speaks to you.</p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Continue Shopping</button>
            </div>
        </div>
    </div>
</div>


@endsection


@section('scripts')


{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
<script>
    $(document).ready(function() {
        // if (localStorage.getItem('modalShown3')) {

            $('#modalTrigger').click();

        //     localStorage.setItem('modalShown3', true);
        // }
    });
</script>



@endsection
