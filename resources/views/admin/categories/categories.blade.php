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
                                <th>#</th>
                                <th>Code</th>
                                <th>Name</th>
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

                            @foreach ($categories as $category)
                            <tr>
                                <td class="thumbnail-img">
                                    {{$category->id}}
                                </td>

                                <td class="quantity-box">
                                    {{$category->code}}
                                </td>
                                <td class="total-pr">
                                    <p> {{$category->name}}</p>
                                </td>
                                <td class="remove-pr text-left">
                                <form method="POST" action="{{route('categories.destroy', $category->id)}}">
                                    @method('DELETE')
                                    @csrf
                                 <a href="{{ route('categories.show', $category->id) }}" class="btn bg-success text-white rounded-0">Open</a>
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn bg-warning text-white rounded-0">Edit</a>
                                    <button type="submit" class="btn bg-danger text-white rounded-0">Delete</button>                                       
                                    </form>

                                </td>
                            </tr>                                
                            @endforeach


                        </tbody>
                    </table>
                <a href="{{ route('categories.create') }}" class="btn bg-success text-white rounded-0">Add Category</a>
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