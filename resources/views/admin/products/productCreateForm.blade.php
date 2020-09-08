@extends('admin.layouts.main')

@section('title', 'Create Category')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 offset-md-3 col-md-6">
            <h2>Create product</h2>
        </div>
        <div class="col-12 offset-md-3 col-md-6">
            <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                @csrf
                {{-- <div class="form-group row">
                    <label for="code" class="col-sm-2 col-form-label">Code:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="code" name="code">
                    </div>
                </div> --}}
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ old('name') }}" id="name" name="name" required>
                        @error('name')
                        <div class="alert alert-danger">
                            {{ $message }}    
                            </div> 
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="category" class="col-sm-2 col-form-label">Category:</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="category" name="category_id" required>
                            @foreach ($categories as $category)

                        <option value="{{$category->id}}">{{$category->name}}</option>
                                
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
                        <input type="text" class="form-control" value="{{ old('price') }}" id="price" name="price" required>
                        @error('price')
                        <div class="alert alert-danger">
                            {{ $message }}    
                            </div> 
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="count" class="col-sm-2 col-form-label">Count:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ old('count') }}" id="count" name="count" required>
                        @error('count')
                        <div class="alert alert-danger">
                            {{ $message }}    
                            </div> 
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">

                        <button type="submit" class="btn bg-success rounded-0 text-white">Create Product</button>
                        
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection