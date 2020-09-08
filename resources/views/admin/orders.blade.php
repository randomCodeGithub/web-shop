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


{{-- <div class="container">
    <div class="row">
        <div class="col-12 offset-md-3 col-md-6">
            @if (session()->has('removeItem'))
            <p class="bg-danger text-center text-white py-2">{{session()->get('removeItem')}}</p>
@elseif (session()->has('addItem'))
<p class="bg-success text-center text-white py-2">{{session()->get('addItem')}}</p>
@endif
</div>
</div>
</div> --}}


<!-- Start Cart  -->
<div class="cart-box-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Orders</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="table-main table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Order Date</th>
                                <th>Price</th>
                                <th>Action</th>
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
                            @foreach ($orders as $order)

                            <tr>
                                <td class="thumbnail-img">
                                    {{$order->id}}
                                </td>
                                <td class="name-pr">
                                    <a href="#">

                                        @if ($order->user_id == null)
                                        {{$order->name}}
                                        @else
                                        {{$order->user->name}} {{$order->user->surname}}
                                        @endif
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
                                    <a href=" {{ route('order_show', $order->id) }} " class="btn bg-success text-white">Open</a>
                                </td>
                            </tr>

                            @endforeach

                            {{-- <tr>
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
                            <tr>
                                <td class="thumbnail-img">
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
                            </tr>

                            <tr>
                                <td class="thumbnail-img">
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
                        </tbody>
                    </table>
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