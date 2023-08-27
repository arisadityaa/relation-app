@extends('layouts.app')

@section('content')

    <div class="container mb-3">
        <h1>Create Products</h1>
    </div>

    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <form action="/product/create" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name Product</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="name of product">
            </div>
            <div class="form-group">
                <label for="harga">Harga Product</label>
                <input type="number" class="form-control" id="harga" name="harga" placeholder="harga product">
            </div>
            <div class="form-group">
                <label for="stock">Stock Product</label>
                <input type="number" class="form-control" id="stock" name="stock" placeholder="stock product">
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select multiple class="form-control" id="category" name="category[]">
                    <option disabled>select category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category }}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-primary mx-2" type="submit">Create Product</button>
        </form>
    </div>
@endsection
