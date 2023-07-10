@extends('layouts.mainlayout')

@section('title', 'Booking Item')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/bookitem.css') }}">
    <div class="container-title text-center">
        <h1>Booking Item</h1>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </div>
    @endif

    <form action="/book_item/{{ $items->slug }}" method="post" enctype="multipart/form">
        @csrf
        @method('put')
        {{-- item details --}}
        <div class="row my-4">
            <div class="col-3">
                <div class="card card-item-image">
                    <img src="{{ asset('/storage/photo/'.$items->photo) }}" alt="{{ $items->photo }}">
                </div>
            </div>
            <div class="col-9">
                <div class="card card-item-info ">
                    <h3>Item Details</h3>
                    <div class="row">
                        <div class="col-6">
                            <p>Name : {{ $items->name }}</p>
                            <p>Brand : {{ $items->brand }}</p>
                            <p>Description : {{ $items->description }}</p>
                            <p>Unit : {{ $items->units->name }}</p>
                            <p>Coordinator : {{ $items->users->name }}</p>
                        </div>
                        <div class="col-6">
                            <label for="stock" class="form-label ms-1">Amount of items to be borrowed :</label>
                            <input type="number" name="stock" id="stock" class="form-control" min="0" placeholder="Current stock : {{ $items->stock }}" style="width: 290px" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- booking and user data --}}
        <div class="row my-4">
            <div class="col-3">
                <div class="card card-user-image">
                    <i class="bi bi-person-circle"></i>
                    <div class="card card-user-info mt-3">
                        <p>{{ $users->name }}</p>
                        <p>{{ $users->email }}</p>
                        <p>{{ $users->address }}</p>
                        <p>{{ $users->no_telp }}</p>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <div class="card card-item-info">
                    <h3>Add Booking Details</h3>
                    <input type="hidden" name="user_id" value="{{ $users->id }}">
                    <input type="hidden" name="item_id" value="{{ $items->id }}">
                    <div class="mb-2">
                        <label for="name" class="form-label">Booking Date</label>
                        <input type="date" name="booking_date" id="booking_date" required class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="name" class="form-label">Expected Return Date</label>
                        <input type="date" name="return_date" id="return_date" required class="form-control">
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-primary">Book Item</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
