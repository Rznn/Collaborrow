@extends('layouts.mainlayout')

@section('title', 'Edit Item')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <h1 class="text-center my-3">Edit Item</h1>

    {{-- adding form --}}
    <div class="mt-5">
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif

        <form action="/item_edit/{{ $items->slug }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card" style="padding: 30px 40px 30px 40px; background:none; border-radius: 15px; box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 2px 0px;">
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $items->name }}" placeholder="Change Item Name">
                        </div>
                        <div class="mb-3">
                            <label for="brand" class="form-label">Brand</label>
                            <input type="text" name="brand" id="brand" class="form-control" value="{{ $items->brand }}" placeholder="Item Brand">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" name="description" id="description" class="form-control" value="{{ $items->description }}"placeholder="Item Description">
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select name="categories" id="categories" class="form-control select">
                                <option style="background-color:rgba(159, 157, 157, 0.374)" value="{{ $items->category_id }}">{{ $items->categories->name }}</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" name="stock" id="stock" class="form-control" min="0" value="{{ $items->stock }}" placeholder="Item Stock">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="units" class="form-label">Unit</label>
                            <select name="units" id="units" class="form-control select">
                                <option style="background-color:rgba(159, 157, 157, 0.374)" value="{{ $items->unit_id }}">{{ $items->units->name }}</option>
                                @foreach ($units as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="users" class="form-label">Coordinator</label>
                            <select name="users" id="users" class="form-control select">
                                <option style="background-color:rgba(159, 157, 157, 0.374)" value="{{ $items->user_id }}">{{ $items->users->name }}</option>
                                @foreach ($users as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Photo</label>
                            <input type="file" name="image" id="image" class="form-control" placeholder="Photo">
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-control select">
                                <option disabled value="{{ $items->id }}">Current: {{ $items->status }}</option>
                                <option value="available">Available</option>
                                <option value="not_available">Not Available</option>
                            </select>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-success mt-4" type="submit">Update Data</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
