@extends('/layouts.mainlayout')

@section('title', 'Booking Show')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/print-show.css') }}">
    <div class="block-title text-center">
        <h1>Print Booking</h1>
        <p>Send the Booking Confirmation to the Admin Unit or Item's Coordinator and Take The Items</p>
    </div>
    {{-- item details --}}
    <div class="row mt-1">
        <div class="col-3">
            <div class="card card-item-image">
                <img src="{{ asset('/storage/photo/'.$bookings->items->photo) }}" alt="{{ $bookings->items->photo }}">
            </div>
        </div>
        <div class="col-9">
            <div class="card card-item-info">
                <h3>Item Details</h3>
                <div class="row">
                    <div class="col-5">
                        <p>Name : {{ $bookings->items->name }}</p>
                        <p>Brand : {{ $bookings->items->brand }}</p>
                        <p>Description : {{ $bookings->items->description }}</p>
                        <p>Amount : {{ $bookings->stock }}</p>
                        <p>Coordinator : {{ $bookings->items->users->name }}</p>
                    </div>
                    <div class="col-7">
                        <p>Unit : {{ $bookings->items->units->name }}</p>
                        <p>Unit Address: {{ $bookings->items->units->unit_address }}</p>
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
                    <p>{{ $bookings->users->name }}</p>
                    <p>{{ $bookings->users->email }}</p>
                    <p>{{ $bookings->users->address }}</p>
                    <p>{{ $bookings->users->no_telp }}</p>
                </div>
            </div>
        </div>
        <div class="col-9">
            <div class="card card-booking-info">
                <h3>Booking Details</h3>
                <p>Booking Id: #{{ $bookings->id }}</p>
                <p>Booking Date: {{ $bookings->booking_date }}</p>
                <p>Expected Return Date: {{ $bookings->return_date }}</p>
                <div class="mt-1 block-btn">
                    <a href="/print.booking_print/{{$bookings->id}}" target="_blank" class="btn btn-primary">Print</a>
                    <a href="/bookings_client" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
