@extends('layouts.app')

@section('content')

    <div class="container mb-3">
        <h1>Create Category</h1>
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
        <form action="/category/{{$id}}/update" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" class="form-control" id="category" name="category" value="{{$category->category}}">
            </div>
            <button class="btn btn-primary mx-2" type="submit">Update Category</button>
        </form>
    </div>
@endsection
