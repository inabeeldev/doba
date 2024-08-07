<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Explore Best Online Shopping Experience - Nature Checkout')</title>
    <meta name="description" content="@yield('meta_description', 'Shop the latest trends at Nature Checkout. Enjoy unbeatable prices, fast shipping, and top-quality products. Find everything you need in one place today!')">
    <meta name="keywords" content="">


    <link rel="canonical" href="https://www.naturecheckout.com/" />

    <link rel="icon" type="image/x-icon" href="{{ asset('public/admin/img/favicon/favicon.ico') }}" />



    <script type="application/ld+json">
        {
          "@context": "https://schema.org/",
          "@type": "WebSite",
          "name": "Nature Checkout",
          "url": "https://www.naturecheckout.com/",
          "potentialAction": {
            "@type": "SearchAction",
            "target": "{search_term_string}",
            "query-input": "required name=search_term_string"
          }
        }
        </script>

        <script type="application/ld+json">
        {
          "@context": "https://schema.org/",
          "@type": "BreadcrumbList",
          "itemListElement": [{
            "@type": "ListItem",
            "position": 1,
            "name": "Home Page",
            "item": "https://www.naturecheckout.com/"
          },{
            "@type": "ListItem",
            "position": 2,
            "name": "Explore Items",
            "item": "https://www.naturecheckout.com/shop"
          },{
            "@type": "ListItem",
            "position": 3,
            "name": "Trending Products",
            "item": "https://www.naturecheckout.com/trending-products"
          }]
        }
        </script>

        <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "FAQPage",
          "mainEntity": [{
            "@type": "Question",
            "name": "How do I place an order on Nature Checkout?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Ordering from Nature Checkout is easy! Simply browse our products, click on the item you want, choose your options/specs (size, color, etc.), and click \"Add to Cart.\" When you're ready to complete your purchase, click the shopping cart icon and follow the checkout process."
            }
          },{
            "@type": "Question",
            "name": "How long will the delivery take?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "The delivery time depends on your location and the shipping method you choose during the checkout process. Our standard shipping option typically takes between 2 to 10 business days, while express shipping delivers within 5 business days."
            }
          },{
            "@type": "Question",
            "name": "What payment methods do you accept?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "We accept major credit and debit cards, including Visa, Mastercard, American Express, and Discover."
            }
          },{
            "@type": "Question",
            "name": "What if I have a question about a product or need assistance?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "We're here to help! Feel free to contact our Customer Support team via email at info@naturecheckout.com or contact helpdesk during our business hours. We're always happy to assist with any inquiries or concerns."
            }
          }]
        }
        </script>


    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('public/customer/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('public/customer/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('public/customer/css/themify-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('public/customer/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('public/customer/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('public/customer/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('public/customer/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('public/customer/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('public/customer/css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('public/customer/css/style2.css') }}" type="text/css">
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet"> --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    <!-- Taboola Pixel Code -->
    <script type='text/javascript'>
      window._tfa = window._tfa || [];
      window._tfa.push({notify: 'event', name: 'page_view', id: 1682200});
      !function (t, f, a, x) {
             if (!document.getElementById(x)) {
                t.async = 1;t.src = a;t.id=x;f.parentNode.insertBefore(t, f);
             }
      }(document.createElement('script'),
      document.getElementsByTagName('script')[0],
      '//cdn.taboola.com/libtrc/unip/1682200/tfa.js',
      'tb_tfa_script');
    </script>
<!-- End of Taboola Pixel Code -->


    <!-- Taboola Pixel Code -->
    <script>
        _tfa.push({notify: 'event', name: 'start_checkout', id: 1682200});
    </script>
    <!-- End of Taboola Pixel Code -->


    <!-- Taboola Pixel Code -->
    <script>
        _tfa.push({notify: 'event', name: 'make_purchase', id: 1682200});
    </script>
    <!-- End of Taboola Pixel Code -->


    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-16552512112">
    </script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'AW-16552512112');
    </script>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-N88HNGC2');</script>
        <!-- End Google Tag Manager -->


</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="header-top header-top2">
            <div class="container">
                <div class="marquee-class">
                    <div class="marquee-item">New Items have been added to store</div>
                    <div class="marquee-item">Get upto 50% off on Electronics items till end of this month</div>
                </div>
            </div>
        </div>

        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class=" fa fa-envelope"></i>
                        info@naturecheckout.com
                    </div>
                    <div class="phone-service">
                        <i class=" fa fa-truck"></i>
                        <b>Free Shipping for all Orders above $99</b>
                    </div>

                </div>
                <div class="ht-right">
                    {{-- <a href="#" class="login-panel"><i class="fa fa-user"></i>Login</a> --}}
                    <div class="lan-selector">
                        <select class="language_drop" name="countries" id="countries" style="width:300px;">
                            <option value='yt' data-image="{{ asset('public/customer/img/flag-1.jpg') }}" data-imagecss="flag yt"
                                data-title="English">English</option>
                        </select>
                    </div>
                    <div class="top-social">
                        <a target="_blank" href="https://www.facebook.com/Naturecheckout"><i class="fa fa-facebook"></i></a>
                        <a target="_blank" href="https://www.instagram.com/naturecheckout"><i class="fa fa-instagram"></i></a>
                        <a target="_blank" href="https://twitter.com/naturecheckout"><i class="fa fa-twitter"></i></a>
                        <a target="_blank" href="https://www.pinterest.com/Naturecheckout"><i class="fa fa-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="inner-header" style="padding-top: 45px">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo" style="padding: 0px">
                            <a href="{{ url('/') }}" style="font-size: 20px; color: darkorange; font-weight: bolder;">
                                <img src="{{ asset('public/customer/img/logo/logo3.png') }}" alt="Nature Checkout" style="position: relative; bottom: 40px; max-width:45%">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-7 col-md-7">

                        {{-- <form action="{{ route('search') }}" method="get">
                            <div class="advanced-search">
                                <div class="input-group">
                                    <input class="searchbar-input typeahead" placeholder="What do you need?" type="text" name="query" id="query" value="{{ request()->input('query') }}" style="color: #000;">
                                    <button type="submit"><i class="ti-search"></i></button>
                                </div>
                            </div>
                        </form> --}}

                        <form action="{{ route('search') }}" method="get" id="search-form">
                            <div class="advanced-search">
                                <div class="input-group">
                                    <input class="searchbar-input typeahead" placeholder="What do you need?" type="text" name="query" id="query" value="{{ request()->input('query') }}" style="color: #000;">
                                    <button type="submit"><i class="ti-search"></i></button>

                                </div>
                            </div>
                        </form>

                        <div id="autocomplete-results"></div>

                    </div>
                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right">
                            <li class="heart-icon">
                                {{-- <a href="#">
                                    <i class="icon_heart_alt"></i>
                                    <span>1</span>
                                </a> --}}
                            </li>
                            <li class="cart-icon">
                                <a href="#">
                                    <i class="icon_bag_alt"></i>
                                    <span>{{ count(session('cart', [])) }}</span>
                                </a>
                                @php
                                    $total = 0;
                                @endphp

                                @foreach(session('cart', []) as $cartItem)
                                    @php
                                        $total += $cartItem['price'] * $cartItem['quantity'];
                                    @endphp
                                @endforeach
                                <div class="cart-hover">
                                    <div class="select-items">
                                        <table>
                                            <tbody>
                                                @foreach(session('cart', []) as $cartItem)
                                                <tr>
                                                    <td class="si-pic"><img src="{{ asset($cartItem['skuPicList']) }}" alt="" style="height: 80px"></td>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <p>${{ number_format($cartItem['price'], 2) }} x {{ $cartItem['quantity'] }}</p>
                                                            <h6><a href="{{ route('product-detail', $cartItem['spuId']) }}">{{ strlen($cartItem['title']) > 30 ? substr($cartItem['title'], 0, 30) . '...' : $cartItem['title'] }}</a></h6>
                                                        </div>
                                                    </td>
                                                    {{-- <td class="si-close">
                                                        <a href="#" class="removeCartItem" data-item-id="{{ $cartItem['itemNo'] }}"><i class="ti-close"></i></a>
                                                    </td> --}}
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="select-total">
                                        <span>total:</span>
                                        <h5>${{ number_format($total, 2) }}</h5>
                                    </div>
                                    <div class="select-button">
                                        <a href="{{ route('shopping-cart') }}" class="primary-btn view-card">VIEW CART</a>
                                        <a href="{{ route('checkout-page') }}" class="primary-btn checkout-btn">CHECKOUT</a>
                                    </div>
                                </div>

                            </li>
                            <li class="cart-price">${{ number_format($total, 2) }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container">
                <div class="nav-depart">
                    <div class="depart-btn">
                        <i class="ti-menu"></i>
                        <span>All Categories</span>
                        <ul class="depart-hover">
                            @foreach($categoryData as $category)
                                <li class="main-category">
                                    <a href="{{ route('cat-products', ['catId' => $category['catId'], 'catName' => str_replace(' ', '-', $category['catName'])]) }}">
                                        {{ $category['catName'] }}
                                    </a>
                                    @if(isset($category['node']))
                                    <div class="sub-categories">
                                        <ul>
                                            @foreach($category['node'] as $subCategory)
                                                <li class="sub-category">
                                                    <a href="{{ route('cat-products', ['catId' => $subCategory['catId'], 'catName' => str_replace(' ', '-', $subCategory['catName'])]) }}">{{ $subCategory['catName'] }}</a>
                                                    @if(isset($subCategory['node']))
                                                    <div class="sub-sub-categories">
                                                        <ul>
                                                            @foreach($subCategory['node'] as $subSubCategory)
                                                                <li><a href="{{ route('cat-products', ['catId' => $subSubCategory['catId'], 'catName' => str_replace(' ', '-', $subSubCategory['catName'])]) }}">{{ $subSubCategory['catName'] }}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>






                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ url('/') }}">Home</a></li>
                        <li class="{{ Request::routeIs('shop-page') ? 'active' : '' }}"><a href="{{ route('shop-page') }}">Shop</a></li>
                        <li class="{{ Request::routeIs('trending-products') ? 'active' : '' }}"><a href="{{ route('trending-products') }}">Trending Products</a></li>
                        <li class="{{ Request::is('shopping-cart') ? 'active' : '' }}"><a href="{{ url('shopping-cart') }}">Shopping Cart</a></li>
                    </ul>

                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    @yield('content')



    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="footer-left">
                        <div class="footer-logo">
                            <a href="{{ url('/') }}" style="font-size: 20px; color: darkorange; font-weight: bolder;">
                                <img src="{{ asset('public/customer/img/logo/logo3.png') }}" alt="Nature Checkout" style="max-width:30%">
                            </a>
                        </div>
                        <ul>

                            <li>
                                We offer quick and easy services to both merchants and consumers in the area of spending. Our goal is to strengthen the relationship between merchants and customers while also positively impacting the economy.
                            </li>
                        </ul>
                        <div class="footer-social">
                            <a target="_blank" href="https://www.facebook.com/Naturecheckout"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a target="_blank" href="https://www.instagram.com/naturecheckout"><i class="fa fa-instagram"></i></a>
                            <a target="_blank" href="https://twitter.com/naturecheckout"><i class="fa fa-twitter"></i></a>
                            <a target="_blank" href="https://www.pinterest.com/Naturecheckout"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Connect</h5>
                        <ul>
                            <li class=""><a href="{{ url('/') }}">Home</a></li>
                            <li class=""><a href="{{ route('shop-page') }}">Shop</a></li>
                            <li class=""><a href="{{ route('trending-products') }}">Trending Products</a></li>
                            <li class=""><a href="{{ url('shopping-cart') }}">Shopping Cart</a></li>
                            <li class=""><a href="https://helpdesk.naturecheckout.com">Support</a></li>
                            <li class=""><a href="{{ route('privacy-policy') }}">Privacy Policy</a></li>
                            <li class=""><a href="{{ route('terms-conditions') }}">Terms</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>Categories</h5>
                        @php
                            shuffle($categoryData);
                        @endphp

                        @foreach ($categoryData as $index => $category)
                            @if ($index < 6)
                                <ul>
                                    <li><a href="{{ route('cat-products', ['catId' => $category['catId'], 'catName' => str_replace(' ', '-', $category['catName'])]) }}">{{ $category['catName'] }}</a></li>
                                </ul>
                            @endif
                        @endforeach

                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="footer-widget">
                        <h5>Contact Us</h5>
                        {{-- <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#" class="subscribe-form">
                            <input type="text" placeholder="Enter Your Mail">
                            <button type="button">Subscribe</button>
                        </form> --}}
                        <ul>
                            <li class="text-light">829 W Palmdale Blvd, Suite 133 <br>
                                Palmdale, California 93551</li>
                            <li class="text-light">Email: info@naturecheckout.com</li>
                        </ul>

                        <div class="mt-5">
                            <a href="https://apps.apple.com/pk/app/nature-checkout/id6482295475" target="_blank" class="btn btn-store mb-2">
                                <span class="fa fa-apple fa-3x pull-left"></span>
                                <span class="btn-label">Download on the</span>
                                <span class="btn-caption">App Store</span>
                            </a>
                            <a href="https://play.google.com/store/apps/details?id=com.doba_nckt.app" target="_blank" class="btn btn-store">
                                <span class="fa fa-android fa-3x pull-left"></span>
                                <span class="btn-label">Download on the</span>
                                <span class="btn-caption">Google Play</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                            All rights reserved
                        </div>
                        <div class="payment-pic">
                            <img src="{{ asset('public/customer/img/payment-method.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Footer Section End -->

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N88HNGC2"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->

   <!-- Js Plugins -->
    <script src="{{ asset('public/customer/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('public/customer/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/customer/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('public/customer/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('public/customer/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('public/customer/js/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('public/customer/js/jquery.dd.min.js') }}"></script>
    <script src="{{ asset('public/customer/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('public/customer/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('public/customer/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

    @include('shop.includes.js')
    @yield('scripts')

</body>

</html>
