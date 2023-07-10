@extends('layouts.mainlayout')

@section('title', 'Dasboard')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/adminadminunitdashboard.css') }}">

<h1 class="fw-bold py-3">Welcome, {{Auth::user()->name}} !</h1>

<div class="row mt-3">

    {{-- card items--}}
    <div class="col-md-3 grid-margin stretch-card">
        <div class="card-data items">
            <div class="row">
                <div class="col-6 card-icon"><i class="bi bi-box-seam-fill"></i></div>
                <div class="col-6 d-flex flex-column justify-content-center pt-2">
                    <div class="card-desc">Item</div>
                    <div class="card-count">{{$item_count}} Data</div>
                </div>
            </div>
        </div>
    </div>

    {{-- card list --}}
    <div class="col-md-3 grid-margin stretch-card">
        <div class="card-data list">
            <div class="row">
                <div class="col-6 card-icon"><i class="bi bi-cart-fill"></i></div>
                <div class="col-6 d-flex flex-column justify-content-center pt-2">
                    <div class="card-desc">Total</div>
                    <div class="card-count">{{$bookings_count}} Data</div>
                </div>
            </div>
        </div>
    </div>

    {{-- card list --}}
    <div class="col-md-3 grid-margin stretch-card">
        <div class="card-data list">
            <div class="row">
                <div class="col-6 card-icon"><i class="bi bi-cart-check-fill"></i></div>
                <div class="col-6 d-flex flex-column justify-content-center pt-2">
                    <div class="card-desc">Approved</div>
                    <div class="card-count">{{$approved_bookings_count}} Data</div>
                </div>
            </div>
        </div>
    </div>

    {{-- card list --}}
    <div class="col-md-3 grid-margin stretch-card">
        <div class="card-data list">
            <div class="row">
                <div class="col-6 card-icon"><i class="bi bi-cart-x-fill"></i></div>
                <div class="col-6 d-flex flex-column justify-content-center pt-2">
                    <div class="card-desc">Failed</div>
                    <div class="card-count">{{$failed_bookings_count}} Data</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mt-4">
    {{-- booking table --}}
    <div class="col-md-12 grid-margin stretch-card" >
        <div class="card-booking">
            <h2>Bookings</h2>
            <div>
                <table class="table" style="overflow-y: scroll;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Borrower</th>
                            <th>Item</th>
                            <th>Brand</th>
                            <th>Description</th>
                            <th>Booking Date</th>
                            <th>Return Date</th>
                            <th>Confirm Return</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->users->name }}</td>
                                <td>{{ $item->items->name }}</td>
                                <td>{{ $item->items->brand }}</td>
                                <td>{{ $item->items->description }}</td>
                                <td>{{ $item->booking_date }}</td>
                                <td>{{ $item->return_date }}</td>
                                <td>{{ $item->confirm_return_date }}</td>
                                <td>
                                    @if ($item->status == 'waiting')
                                    <span class="badge bg-secondary">Waiting</span>
                                    @elseif ($item->status == 'approved')
                                        <span class="badge bg-success">Approved</span>
                                    @elseif ($item->status == 'rejected')
                                        <span class="badge bg-danger">Rejected</span>
                                    @elseif ($item->status == 'canceled')
                                        <span class="badge bg-danger">Canceled</span>
                                    @elseif ($item->status == 'on_going')
                                        <span class="badge bg-primary">On Going</span>
                                    @elseif($item->status == 'done')
                                        <span class="badge bg-success"><i class="bi bi-check"></i>Done</span>
                                    @else
                                        <span class="badge bg-warning"><i class="bi bi-check"></i>Done Late</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
