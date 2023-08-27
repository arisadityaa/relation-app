@extends('layouts.app')
@section('content')

<div class="container mb-3">
  <h1>Category</h1>
</div>

<div class="container mb-3">
  <a class="btn btn-success" href="/category/create" role="button">Create Category</a>
</div>

<div class="container">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Category</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($categories as $category)
      <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$category->category}}</td>
        <td>
          <a class="btn btn-warning" href="/category/{{$category->id}}/edit" role="button">Edit</a>
          <a class="btn btn-danger" href="/category/{{$category->id}}/delete" role="button">Delete</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection