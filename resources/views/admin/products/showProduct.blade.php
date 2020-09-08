@extends('admin.layouts.main')

@section('title', 'Product: ' . $product->name)

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
            <h2>Product <b>{{$product->name}}</b></h2>
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
                                    {{ $product->id }}    
                                </td>
                            </tr>     
                            <tr>
                                <td class="thumbnail-img">
                                    Name
                                </td>

                                <td class="quantity-box">
                                    {{ $product->name }}
                                </td>
                            </tr>  
                            <tr>
                                <td class="thumbnail-img">
                                    Category name
                                </td>

                                <td class="quantity-box">
                                    {{ $product->category->name }}
                                </td>
                            </tr>  
                            <tr>
                                <td class="thumbnail-img">
                                    Image
                                </td>

                                <td class="quantity-box">
                                    <img src="{{Storage::url($product->image)}}" alt="">
                                </td>
                            </tr> 
                            <tr>
                                <td class="thumbnail-img">
                                    Price
                                </td>

                                <td class="quantity-box">
                                    {{ number_format($product->price, 2) }} EUR
                                </td>
                            </tr>                     
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>
</div>
<!-- End Cart -->

@endsection