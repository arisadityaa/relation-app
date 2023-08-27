@extends('layouts.app')

@section('content')

    <div class="container mb-3">
        <h1>Update Products</h1>
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
        <form action="/product/{{ $id }}/update" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="name">Name Product</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
            </div>
            <div class="form-group">
                <label for="harga">Harga Product</label>
                <input type="number" class="form-control" id="harga" name="harga" value="{{ $product->harga }}">
            </div>
            <div class="form-group">
                <label for="stock">Stock Product</label>
                <input type="number" class="form-control" id="stock" name="stock" value="{{ $product->stock }}">
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select multiple class="form-control" id="category" name="category[]">
                    <option disabled>select category</option>
                    {{-- cara susah --}}
                    {{-- @php
                        $a = [];
                    @endphp
                    @foreach ($product->category as $c)
                        {{ array_push($a, $c->id) }}
                    @endforeach
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if (in_array($category->id, $a)) selected @endif>
                            {{ $category->category }}</option>
                    @endforeach --}}

                    {{-- cara gampang --}}
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"@if ($product->category->contains('id', $category->id)) selected @endif>
                            {{ $category->category }}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-primary mx-2" type="submit">Update Product</button>
        </form>
    </div>
@endsection
