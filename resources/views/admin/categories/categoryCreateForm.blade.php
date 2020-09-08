@extends('admin.layouts.main')

@section('title', 'Create Category')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 offset-md-3 col-md-6">
            <h2>Create Category</h2>
        </div>
        <div class="col-12 offset-md-3 col-md-6">
            <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="code" class="col-sm-2 col-form-label">Code:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{ old('code') }}" id="code" name="code" required>
                    @error('code')
                    <div class="alert alert-danger">
                    {{ $message }}    
                    </div>                        
                    @enderror
                    </div>
                </div>
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
                {{-- <div class="form-group row">
                    <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                </div> --}}
                <div class="form-group row">
                    <label for="image" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-10">
                        <label class="btn hvr-hover text-white">Load<input type="file" class="form-control-file d-none" id="image" name="image">
                        </label>
                        
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">

                        <button type="submit" class="btn bg-success rounded-0 text-white">Create Category</button>
                        
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection