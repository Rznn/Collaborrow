@extends('layouts.mainlayout')

@section('title', 'Item List')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/itemlist.css') }}">
    <h1>Item List</h1>

    {{-- search for items --}}
    <form action="" method="get">
        <div class="d-flex block-search justify-content-start mt-4">
            <select name="categories" id="categories" class="form-control" style="border-radius: 5px 0 0 5px; width: 280px">
                <option value="">Search by Category</option>
                @foreach ($categories as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary" style="border-radius: 0 5px 5px 0;">
                <i class="bi bi-search d-flex"></i>
            </button>

            <div class="input-group ms-3">
                <div class="form-outline search-by-name">
                    <input type="search" name="search" id="search" class="form-control" placeholder="Search" style="border-radius: 5px 0 0 5px;">
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-search d-flex"></i>
                </button>
            </div>
        </div>
    </form>

    {{-- success add item --}}
    <div class = "mt-4">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    </div>

    {{-- table --}}
    <div class="row pt-3">
        @foreach($items as $item)
            <div class="col-lg-2 col-md-3 col-sm-6 mb-3 d-flex">
                <div class="card p-2 d-flex">
                    <img class="card-img-top d-flex" src="{{ $item->photo != null ? asset('storage/photo/'.$item->photo) : asset('image/no-photo-available.png') }}" alt="Card" draggable="false">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <p class="card-text">{{ $item->brand }} - {{ $item->description }}<br>Stock : {{ $item->stock }}<hr></p>
                        <div class="pt-1 card-status d-flex justify-content-center">
                            @if ($item->status == 'available')
                            <span class="badge bg-success">Available</span>
                            @elseif ($item->status == 'used')
                                <span class="badge bg-secondary">In Used</span>
                            @else
                            <span class="badge bg-danger">Not Available</span>
                            @endif
                        </div>
                        <div class="text-end d-flex justify-content-center pt-2">
                            @if ($item->status == 'available')
                            <a href="/book_item/{{ $item->slug }}" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Book</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
