@extends('layouts.main')

@section('title', 'Category')

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
                <h2>{{$category->name}}: {{$category->products->count()}}</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Shop</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start Shop Page  -->
<div class="shop-box-inner">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12 shop-content-right">
                <div class="right-product-box">
                    <div class="product-item-filter row">
                        <div class="col-12 text-left">
                            {{-- <div class="toolbar-sorter-right">
                                <span>Sort by </span>
                                <select id="basic" class="selectpicker show-tick form-control" data-placeholder="$ USD">
                                <option data-display="Select">Nothing</option>
                                <option value="1">Popularity</option>
                                <option value="2">High Price → High Price</option>
                                <option value="3">Low Price → High Price</option>
                                <option value="4">Best Selling</option>
                            </select>
                            
                            </div> --}}
                            {{-- <p>Showing all 4 results</p> --}}

                            <form method="GET">
                                <label for="min_price">Price</label>
                                <input type="text" class="form-control d-inline w-auto rounded-0 border-secondary"
                                    oninput="validity.valid||(value='0');" id="min_price" name="price_from"
                                    value="{{ request()->price_from }}" size="6">
                                -
                                <input type="text" class="form-control d-inline w-auto rounded-0 border-secondary"
                                    name="price_to" value="{{ request()->price_to }}" size="6">
                                <ul class="nav nav-tabs ml-auto">
                                    <li>
                                        <button type="submit" class="btn hvr-hover text-white" href="">Filter</button>
                                        <a href="{{route('category', $category->code)}}" class="btn">Clear</a>
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </div>

                    <div class="row product-categorie-box">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                <div class="row">

                                    @foreach ($category->products as $item)

                                    <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4">
                                        <div class="products-single fix h-100">
                                            <div class="box-img-hover position-relative d-flex align-items-center"
                                                style="height: 300px">
                                                {{-- <div class="type-lb">
                                                    <p class="sale">Sale</p>
                                                </div> --}}
                                                <img src="{{Storage::url($item->image)}}"
                                                    style="max-width: 270px; height: auto; max-height:300px;"
                                                    class="img-fluid" alt="Image">
                                                {{-- <img src="images/img-pro-01.jpg" class="img-fluid" alt="Image"> --}}
                                            </div>
                                            <div class="why-text text-center position-relative">
                                                <h4 class="pb-2">{{$item->name}}</h4>
                                                <h5 class="pb-2"> {{ number_format($item->price, 2) }} EUR</h5>
                                                <form action="{{route('cart-add', $item->id)}}" method="POST">
                                                    @csrf

                                                    @if ($item->isAvailable())
                                                    <button type="submit" class="btn hvr-hover text-white">Add to
                                                        cart</button>
                                                    @else

                                                    <span class="text-danger">sold out</span>

                                                    @endif


                                                    <a href="{{ route('product', [$category->code, $item->id]) }}"
                                                        target="_blank" class="btn hvr-hover text-white">View</a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    @endforeach

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mb-2">
                    {{$category->products->links()}}
                </div>
            </div>



        </div>
        <!-- End Shop Page -->

        @endsection
        @section('script')
        <script src="{{ asset('js/jquery-ui.js') }}"></script>
        <script src="{{ asset('js/jquery.nicescroll.min.js') }}"></script>

        @endsection