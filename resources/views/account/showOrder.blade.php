@extends('layouts.main')

@section('title', 'Orders')

@section('content')

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

<!-- Start Cart  -->
<div class="cart-box-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Order Nr {{ $order->id }}</h2>
                {{-- <p>Customer: <b>{{$order->user->name}} {{$order->user->surname}}</p>
                <p>Phone: </p> --}}
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="table-main table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Count</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->products as $product)
                            <tr>
                                <td class="thumbnail-img">
                                    <a href="{{route('product', [$product->category->code, $product->id])}}">
                                        {{-- <img class="img-fluid" src="{{ Storage::url($product->image) }}" alt="" /> --}}
                                        <img class="img-fluid" src="{{asset('images/img-pro-01.jpg')}}" alt="" />
                                    </a>
                                </td>
                                <td class="name-pr">
                                    <a href="{{route('product', [$product->category->code, $product->id])}}">
                                        {{$product->name}}
                                    </a>
                                </td>
                                <td class="quantity-box">
                                    <div class="d-flex">
                                        <span class="bg-secondary text-white font-weight-bold py-1 px-3 mr-1 rounded-circle">{{$product->pivot->count}}</span>
                                    </div>
                                </td>
                                <td class="price-pr">
                                    <p>{{ number_format($product->price, 2) }} EUR</p>
                                </td>
                                <td class="total-pr">
                                    <p>{{ number_format($product->getPriceForCount(), 2) }} EUR</p>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="4"><div class="gr-total"><h5 class="pb-0">Total Price</h5><div></td>
                                <td>{{ number_format($order->getFullPrice(), 2) }} EUR</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- <div class="row mb-5">

            <div class="col-sm-12">
                <div class="order-box">
                    <div class="d-flex gr-total">
                        <h5>Total Price</h5>
                        <div class="ml-auto h5">
                            {{$order->getFullPrice()}} EUR
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div> --}}
</div>
</div>
<!-- End Cart -->

@endsection