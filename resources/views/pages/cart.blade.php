@extends('layouts.main')

@section('title', 'Cart')

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
<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Cart</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active">Cart</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->


<div class="container">
    <div class="row">
        <div class="col-12 offset-md-3 col-md-6">
            @if (session()->has('removeItem'))
            <p class="bg-danger text-center text-white py-2">{{session()->get('removeItem')}}</p>
            @elseif (session()->has('addItem'))
            <p class="bg-success text-center text-white py-2">{{session()->get('addItem')}}</p>
            @elseif (session()->has('warning'))
            <p class="bg-warning text-center text-white py-2">{{session()->get('warning')}}</p>
            @endif
        </div>
    </div>
</div>


<!-- Start Cart  -->
<div class="cart-box-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-main table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Images</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($order)

                            @if (!count($order->products))
                            <td class="name-pr text-center" colspan="6">
                                <h3 class="pt-4">
                                    Cart is empty
                                </h3>
                            </td>
                            @else

                            @foreach ($order->products()->with('category')->get() as $product)
                            <tr>
                                <td class="thumbnail-img">
                                    <a href="{{route('product', [$product->category->code, $product->id])}}">
                                        <img class="img-fluid" src="{{ Storage::url($product->image) }}" alt="" />
                                        {{-- <img class="img-fluid" src="{{asset('images/img-pro-01.jpg')}}" alt="" /> --}}
                                    </a>
                                </td>
                                <td class="name-pr">
                                    <a href="{{route('product', [$product->category->code, $product->id])}}">
                                        {{$product->name}}
                                    </a>
                                </td>
                                <td class="price-pr">
                                    <p>{{ number_format($product->price, 2) }} EUR</p>
                                </td>
                                <td class="quantity-box">

                                    <div class="d-flex">
                                        <span
                                            class="bg-secondary text-white font-weight-bold py-1 px-3 mr-1 rounded-circle">{{$product->pivot->count}}</span>
                                        <form action="{{route('cart-remove', $product->id)}}" method="POST">
                                            @csrf
                                            <button class="btn bg-danger text-white rounded-0">-</button>

                                        </form>

                                        <form action="{{route('cart-add', $product->id)}}" method="POST">
                                            @csrf
                                            <button class="btn bg-success text-white rounded-0">+</button>
                                        </form>
                                    </div>
                                </td>
                                <td class="total-pr">
                                    <p>{{ number_format($product->getPriceForCount(), 2) }} EUR</p>
                                </td>
                                <td class="remove-pr">
                                    <a href="#">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach

                            @endif

                            @else

                            <tr>
                                <td class="name-pr text-center" colspan="6">
                                    <h3 class="pt-4">
                                        Cart is empty
                                    </h3>
                                </td>
                            </tr>

                            @endisset
                        </tbody>
                    </table>
                </div>
            </div>
        </div>



        <div class="row my-5">

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
                        <a href="{{route('auth')}}" class="ml-auto mr-1 btn bg-success text-white rounded-0">Login &
                            Confirm</a>
                        @endguest
                        <a href="{{route('checkout')}}"
                            class="ml-auto @guest hvr-hover @else bg-success @endguest btn  text-white">@guest Confirm
                            without login @else Confirm @endguest</a>

                        @endif



                    </div>
                </div>
            </div>

            @endisset
        </div>



    </div>
</div>
<!-- End Cart -->

@endsection