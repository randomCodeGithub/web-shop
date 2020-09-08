@extends('layouts.main')

@section('title', 'Order Confirm')

@section('content')

<!-- Start Top Search -->
<div class="top-search">
    <div class="container">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-search"></i></span>
            <input type="text" class="form-control" placeholder="Search">
            <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
        </div>
    </div>
</div>
<!-- End Top Search -->

<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Checkout</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active">Checkout</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start Cart  -->
<div class="cart-box-main">
    <div class="container">

        <div class="row">
            <div class="col-sm-6 offset-lg-3 col-lg-6 mb-3">
                <div class="row">
                    <div class="col-md-12 col-lg-12">

                        <div class="order-box">
                            <div class="title-left text-center">
                                <h3 class="text-uppercase">Order confirming</h3>
                                @guest <p>Укажите своё имя, номер телефона</p> @endguest
                            </div>

                            <form action="{{ route('confirmed') }}" method="POST">
                                @csrf

                            <hr class="my-1">

                            @guest

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <input type="text" class="form-control @error('firstName') is-invalid @enderror"
                                        value="{{ old('firstName') }}" name="firstName" placeholder="First Name" required
                                        autocomplete="firstName">
                                        @error('firstName')
                                        <div class="alert alert-danger">
                                            {{ $message }}    
                                            </div> 
                                        @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="text" class="form-control @error('lastName') is-invalid @enderror"
                                        value="{{ old('lastName') }}" name="lastName" placeholder="Last Name" required
                                        autocomplete="lastName">
                                        @error('lastName')
                                        <div class="alert alert-danger">
                                            {{ $message }}    
                                            </div> 
                                        @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" name="email" placeholder="Email" required
                                        autocomplete="email">
                                        @error('email')
                                        <div class="alert alert-danger">
                                            {{ $message }}    
                                            </div> 
                                        @enderror
                                </div>
                            </div>

                            @else
                            <div class="d-flex">
                                <h4><span class="text-uppercase font-weight-bold">Your Name:
                                    </span>{{ Auth::user()->name }}</h4>
                            </div>
                            <hr class="my-1">
                            <div class="d-flex">
                                <h4><span class="text-uppercase font-weight-bold">E-mail: </span>
                                    {{ Auth::user()->email }}</h4>
                            </div>
                            <hr class="my-1">
                            <div class="d-flex">
                                <h4><span class="text-uppercase font-weight-bold">Phone: </span></h4>
                            </div>
                            @endguest

                            <hr>
                            <div class="d-flex gr-total">
                                <h5 class="text-uppercase">Total price</h5>
                                <div class="ml-auto h5">{{ $order->getFullPrice() }} EUR</div>
                            </div>
                            <hr>

                            <button type="submit" class="btn hvr-hover text-white bg-success rounded-0">Place
                                Order</button>

                        </form>                            
                        </div>


                    </div>




                </div>
            </div>
        </div>

    </div>
</div>
<!-- End Cart -->

{{-- <form method="POST" action="{{ route('login') }}" class="mt-3 review-form-box">
@csrf
<div class="form-row">
    <div class="form-group col-md-12">
        <input type="email" class="form-control @error('login_email') is-invalid @enderror"
            value="{{ old('firstName') }}" name="firstName" placeholder="Enter First Name" required
            autocomplete="firstName">
    </div>
    <div class="form-group col-md-12">
        <input type="email" class="form-control @error('login_email') is-invalid @enderror"
            value="{{ old('lastName') }}" name="lastName" placeholder="Enter Last Name" required
            autocomplete="lastName">
    </div>
</div>
</form> --}}

<!-- Start Instagram Feed  -->
<div class="instagram-box">
    <div class="main-instagram owl-carousel owl-theme">
        <div class="item">
            <div class="ins-inner-box">
                <img src="{{asset('images/instagram-img-01.jpg')}}" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="images/instagram-img-02.jpg" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="images/instagram-img-03.jpg" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="images/instagram-img-04.jpg" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="images/instagram-img-05.jpg" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="images/instagram-img-06.jpg" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="images/instagram-img-07.jpg" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="images/instagram-img-08.jpg" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="images/instagram-img-09.jpg" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="images/instagram-img-05.jpg" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection