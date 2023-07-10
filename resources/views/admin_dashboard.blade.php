@extends('layouts.mainlayout')

@section('title', 'Admin Dasboard')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/adminadminunitdashboard.css') }}">

    <h1 class="fw-bold py-3">Welcome, {{Auth::user()->name}} !</h1>

    <div class="row mt-3">
        {{-- card unit --}}
        <div class="col-md-3 grid-margin stretch-card">
            <div class="card-data units">
                <div class="row">
                    <div class="col-6 card-icon"><i class="bi bi-house-fill"></i></div>
                    <div class="col-6 d-flex flex-column justify-content-center pt-2">
                        <div class="card-desc">Unit</div>
                        <div class="card-count">{{$unit_count}} Data</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- card category --}}
        <div class="col-md-3 grid-margin stretch-card">
            <div class="card-data categories">
                <div class="row">
                    <div class="col-6 card-icon"><i class="bi bi-card-heading"></i></div>
                    <div class="col-6 d-flex flex-column justify-content-center pt-2">
                        <div class="card-desc">Category</div>
                        <div class="card-count">{{$category_count}} Data</div>
                    </div>
                </div>
            </div>
        </div>

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
                    <div class="col-6 card-icon"><i class="bi bi-clipboard-check-fill"></i></div>
                    <div class="col-6 d-flex flex-column justify-content-center pt-2">
                        <div class="card-desc">Booking</div>
                        <div class="card-count">{{$booking_count}} Data</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        {{-- booking table --}}
        <div class="col-md-9 grid-margin stretch-card" >
            <div class="card-booking">
                <h2 class="mb-3">Bookings</h2>
                <x-bookings-table :bookings='$bookings'/>
            </div>
        </div>
        {{-- user list --}}
        <div class="col-md-3 grid-margin stretch-card">
            <div class="card">
                <div class="container d-flex justify-content-center">
                    <h5 style="font-weight: bold;">Users</h5>
                </div>
                <hr>
                <div class="card">
                    <div class="card-user">
                    @foreach ($users as $item)
                        {{-- card user --}}
                        <div class="card-data-user grid-margin stretch-card mb-1 col-lg-11">
                            <div class="row card-each-user">
                                <div class="col-5 d-flex justify-content-center pt-2"><i class="bi bi-person"></i></div>
                                <div class="col-7 d-flex flex-column justify-content-center">
                                    <div class="card-name">{{$item->name}}</div>
                                    <div class="card-role">{{$item->roles->name}}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
