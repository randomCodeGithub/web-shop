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
                <h2>Order history</h2>
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
                                {{-- <th>Phone</th> --}}
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

                                        {{$order->user->name}} {{$order->user->surname}}
                                    </a>
                                </td>
                                {{-- <td class="price-pr">
                                    <p></p>
                                </td> --}}
                                <td class="quantity-box">
                                    {{$order->created_at->format('H:m:s | d.m.y')}}
                                </td>
                                <td class="total-pr">
                                    <p>{{ number_format($order->getFullPrice(), 2) }} EUR</p>
                                </td>
                                <td class="remove-pr">
                                    <a href=" {{ route('account_show_order', $order->id) }} " class="btn bg-success text-white">Open</a>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>
</div>
<!-- End Cart -->

@endsection