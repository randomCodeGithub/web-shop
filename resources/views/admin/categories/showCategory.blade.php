@extends('admin.layouts.main')

@section('title', 'Categories')

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
                <h2>Categories</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="table-main table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Field</th>
                                <th>Value</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td class="thumbnail-img">
                                    ID
                                </td>

                                <td class="quantity-box">
                                    {{$category->id}}
                                </td>
                            </tr>     
                            <tr>
                                <td class="thumbnail-img">
                                    Code
                                </td>

                                <td class="quantity-box">
                                    {{$category->code}}
                                </td>
                            </tr>  
                            <tr>
                                <td class="thumbnail-img">
                                    Name
                                </td>

                                <td class="quantity-box">
                                    {{$category->name}}
                                </td>
                            </tr>  
                            {{-- <tr>
                                <td class="thumbnail-img">
                                    Description
                                </td>

                                <td class="quantity-box">
                                    2
                                </td>
                            </tr>   --}}
                            <tr>
                                <td class="thumbnail-img">
                                    Image
                                </td>

                                <td class="quantity-box">
                                <img src="{{Storage::url($category->image)}}" alt="">
                                </td>
                            </tr>  
                            <tr>
                                <td class="thumbnail-img">
                                    Count of Product
                                </td>

                                <td class="quantity-box">
                                    {{$category->products->count()}}
                                </td>
                            </tr>                             


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