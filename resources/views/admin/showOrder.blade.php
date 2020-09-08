@extends('admin.layouts.main')

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
                <p>Customer: <b>
                        @if ($order->user_id == null)
                        {{$order->name}}
                        @else
                        {{$order->user->name}} {{$order->user->surname}}
                        @endif</b></p>
                <p>Phone: </p>
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
                            {{-- 
                            @if (!count($order->products))
                            <td class="name-pr text-center" colspan="6">
                                <h3 class="pt-4">
                                    Cart is empty
                                </h3>
                            </td>
                            @else --}}
                            {{-- @foreach ($orders as $order)
                            <tr>
                                <td class="thumbnail-img">
                                    {{$order->id}}
                            </td>
                            <td class="name-pr">
                                <a href="#">
                                    {{$order->name}}
                                </a>
                            </td>
                            <td class="price-pr">
                                <p></p>
                            </td>
                            <td class="quantity-box">
                                {{$order->created_at->format('H:m:s | d.m.y')}}
                            </td>
                            <td class="total-pr">
                                <p>{{ number_format($order->getFullPrice(), 2) }} EUR</p>
                            </td>
                            <td class="remove-pr">
                                <button class="btn bg-success text-white">Open</button>
                            </td>
                            </tr>


                            @endforeach --}}

                            {{-- {{-- <tr>
                                <td class="thumbnail-img">
                                    <a href="#">
                                        <img class="img-fluid" src="images/img-pro-02.jpg" alt="" />
                                    </a>
                                </td>
                                <td class="name-pr">
                                    <a href="#">
                                        Lorem ipsum dolor sit amet
                                    </a>
                                </td>
                                <td class="price-pr">
                                    <p>$ 60.0</p>
                                </td>
                                <td class="quantity-box"><input type="number" size="4" value="1" min="0" step="1"
                                        class="c-input-text qty text"></td>
                                <td class="total-pr">
                                    <p>$ 80.0</p>
                                </td>
                                <td class="remove-pr">
                                    <a href="#">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr> --}}
                                {{-- <td class="thumbnail-img">
                                    <a href="#">
                                        <img class="img-fluid" src="images/img-pro-03.jpg" alt="" />
                                    </a>
                                </td>
                                <td class="name-pr">
                                    <a href="#">
                                        Lorem ipsum dolor sit amet
                                    </a>
                                </td>
                                <td class="price-pr">
                                    <p>$ 30.0</p>
                                </td>
                                <td class="quantity-box"><input type="number" size="4" value="1" min="0" step="1"
                                        class="c-input-text qty text"></td>
                                <td class="total-pr">
                                    <p>$ 80.0</p>
                                </td>
                                <td class="remove-pr">
                                    <a href="#">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </td>
                            </tr> --}}

                            @foreach ($products as $product)
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

        <div class="row mb-5">

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
        </div>

        {{-- <div class="row my-5">

            <div class="col-sm-12">
                <div class="order-box">
                    <div class="d-flex gr-total">
                        <h5>Total Price</h5>
                        <div class="ml-auto h5">
                            @isset($order)
                            {{$order->getFullPrice()}} EUR
        @else
        0 EUR
        @endisset
    </div>
</div>
<hr>
</div>
</div>
@isset($order)
<div class="offset-md-8 col-lg-4 col-sm-12">
    <div class="order-box">
        <div class="d-flex gr-total">

            @if (count($order->products))
            @guest
            <a href="{{route('auth')}}" class="ml-auto btn bg-success text-white">Login & Confirm order</a>
            @else
            <a href="{{route('checkout')}}" class="ml-auto btn bg-success text-white">Confirm order</a>
            @endguest
            @endif



        </div>
    </div>
</div>

@endisset
</div> --}}



</div>
</div>
<!-- End Cart -->

@endsection