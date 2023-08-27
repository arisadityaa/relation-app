@extends('layouts.app')
@section('content')

<div class="container mb-3">
  <h1>Products</h1>
</div>

<div class="container mb-3">
  <a class="btn btn-success" href="/product/create" role="button">Create Product</a>
</div>

<div class="container">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Produk</th>
        <th scope="col">Category</th>
        <th scope="col">Harga</th>
        <th scope="col">Stock</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($products as $product)
      <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$product->name}}</td>
        <td>@foreach ($product->category as $category)
            @if ($loop->last)
            {{$category->category}} 
            @else
            {{$category->category}}, 
            @endif
        @endforeach</td>
        <td>{{$product->harga}}</td>
        <td>{{$product->stock}}</td>
        <td>
          <a class="btn btn-warning" href="/product/{{$product->id}}/edit" role="button">Edit</a>
          <a class="btn btn-danger" href="/product/{{$product->id}}/delete" role="button">Delete</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection