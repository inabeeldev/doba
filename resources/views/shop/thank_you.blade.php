@extends('shop.app')

@section('content')
<br><br>
<div class="jumbotron text-center">
    <h1 class="display-3">Thank You!</h1>
    <p class="lead"><strong>Thank you for ordering. You will get your order very soon.</strong></p>
    <hr>
    <p>
      Having trouble? <a href="{{ '/' }}">Contact us</a>
    </p>
    <p class="lead">
      <a class="btn btn-primary btn-sm" href="{{ url('/') }}" role="button">Continue to homepage</a>
    </p>
  </div>
<br><br>
<!-- Product Shop Section Begin -->
<section class="product-shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Shop More</h2>
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
                                        <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                        <li class="quick-view"><a href="#">+ Quick View</a></li>
                                        <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
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

            </div>
        </div>
    </div>
</section>
<!-- Product Shop Section End -->



@endsection


@section('scripts')





@endsection
