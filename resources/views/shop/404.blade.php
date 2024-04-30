@extends('shop.app')

@section('content')


<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="#"><i class="fa fa-home"></i> Home</a>
                    <span>Contact</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->



<!-- Contact Section Begin -->
<section class="contact-section spad">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-danger">
                    <div class="card-body">
                        <h2 class="card-title text-danger text-center">404 Page Not Found</h2>
                        <p class="card-text text-center">Sorry, the page you are looking for could not be found.</p>
                        <div class="text-center">
                            <a href="{{ url('/') }}" class="btn btn-danger">Go to Homepage</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->



@endsection
