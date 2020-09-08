@extends('admin.layouts.main')

@section('title', 'Edit Product')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 offset-md-3 col-md-6">
            <h2>Edit Product</h2>
        </div>
        <div class="col-12 offset-md-3 col-md-6">
            <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{ $product->name }}" id="name" name="name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="category" class="col-sm-2 col-form-label">Category:</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="category" name="category_id">
                            <option value="{{ $product->category->id }}" selected>{{ $product->category->name }}</option>

                            @foreach ($categories as $category)

                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                
                            @endforeach


                            {{-- <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option> --}}
                          </select>
                    </div>
                </div>
                {{-- <div class="form-group row">
                    <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                </div> --}}
                <div class="form-group row">
                    <label for="img" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-10">
                        <label class="btn hvr-hover text-white">Load<input type="file" class="form-control-file d-none" id="img" name="image">
                        </label>
                        
                    </div>
                </div>
                <div class="form-group row">
                    <label for="price" class="col-sm-2 col-form-label">Price:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ number_format($product->price, 2) }}" id="price" name="price">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="count" class="col-sm-2 col-form-label">Count:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ $product->count }}" id="count" name="count">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn bg-success rounded-0 text-white">Edit Category</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection