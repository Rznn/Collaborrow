@extends('layouts.mainlayout')

@section('title', 'Add Category')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <h1 class="mt-3" style="text-align:center">Add New Category</h1>

    {{-- adding form --}}
    <div class="mt-5">
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif

        <form action="category_add" method="post">
            @csrf
            <div class="card mx-auto" style="padding: 30px 40px 30px 40px; width: 800px;background:none; border-radius: 15px; box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 2px 0px;">
            <div>
                <label for="Name" class="form-label">Name   </label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Category Name">
            </div>

            <div class="mt-3 d-flex justify-content-center">
                <button class="btn btn-success" type="submit">Add Data</button>
            </div>
            </div>
        </form>
    </div>

@endsection
