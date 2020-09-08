@extends('admin.layouts.main')

@section('title', 'Products')

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
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Count</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($products as $product)
                            <tr>
                                <td class="thumbnail-img">
                                    {{$product->id}}
                                </td>

                                <td class="total-pr">
                                    <p>{{$product->name}}</p>
                                </td>
                                <td class="total-pr">
                                    <p>{{$product->category->name}}</p>
                                </td>
                                <td class="total-pr">
                                    <p>{{ number_format($product->price, 2)}} EUR</p>
                                </td>
                                <td>
                                <p>{{ $product->count }}</p>
                                </td>
                                <td class="remove-pr text-left">
                                <form method="POST" action="{{ route('products.destroy', $product->id) }}">
                                    @method('DELETE')
                                    @csrf
                                 <a href="{{ route('products.show', $product->id) }}" class="btn bg-success text-white rounded-0">Open</a>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn bg-warning text-white rounded-0">Edit</a>
                                    <button type="submit" class="btn bg-danger text-white rounded-0">Delete</button>                                       
                                    </form>

                                </td>
                            </tr>                                
                            @endforeach


                        </tbody>
                    </table>
                <a href="{{ route('products.create') }}" class="btn bg-success text-white rounded-0">Add Product</a>
                </div>
            </div>
        </div>
</div>
</div>
<!-- End Cart -->

@endsection