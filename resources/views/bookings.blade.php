@extends('layouts.mainlayout')

@section('title', 'Bookings')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/booking.css') }}">
    <h1>Booking List</h1>

    {{-- alert session --}}
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

    <form action="" method="get">
        <div class="d-flex block-search justify-content-start mt-4">
            <div class="input-group">
                <div class="form-outline search-by-name">
                    <input type="search" name="search" id="search" class="form-control" placeholder="Search" style="border-radius: 5px 0 0 5px;">
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-search d-flex"></i>
                </button>
            </div>
        </div>
    </form>

    <h6 class="mt-3">Sort by Status</h6>

    <div class="filter-buttons">
        <a href="{{ route('bookings', ['status' => 'waiting']) }}" class="btn btn-primary {{ request()->get('status') === 'waiting' ? ' active' : '' }}">Waiting</a>
        <a href="{{ route('bookings', ['status' => 'approved']) }}" class="btn btn-primary {{ request()->get('status') === 'approved' ? ' active' : '' }}">Approved</a>
        <a href="{{ route('bookings', ['status' => 'on_going']) }}" class="btn btn-primary {{ request()->get('status') === 'on_going' ? ' active' : '' }}">On Going</a>
        <a href="{{ route('bookings', ['status' => 'rejected']) }}" class="btn btn-primary {{ request()->get('status') === 'rejected' ? ' active' : '' }}">Rejected</a>
        <a href="{{ route('bookings', ['status' => 'canceled']) }}" class="btn btn-primary {{ request()->get('status') === 'canceled' ? ' active' : '' }}">Canceled</a>
    </div>

    {{-- table --}}
    <div class="my-4">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Borrower</th>
                    <th>Item</th>
                    <th>Brand</th>
                    <th>Description</th>
                    <th>Unit</th>
                    <th>Coordinator</th>
                    <th>Amount</th>
                    <th>Booking Date</th>
                    <th>Return Date</th>
                    <th>Confirm Return</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $item)
                    <tr class="{{ $item->confirm_return_date == null ? '' : ($item->return_date < $item->confirm_return_date ? 'text-bg-danger' : 'text-bg-success') }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->users->name }}</td>
                        <td>{{ $item->items->name }}</td>
                        <td>{{ $item->items->brand }}</td>
                        <td>{{ $item->items->description }}</td>
                        <td>{{ $item->items->units->name }}</td>
                        <td>{{ $item->items->users->name }}</td>
                        <td>{{ $item->stock }}</td>
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
                        <td>
                            @if ($item->status == 'waiting')
                                <a href="{{route('approve_bookings', $item->id)}}" class="btn btn-success" name="action" data-toggle="tooltip" title="Approve" value="approve"><i class="bi bi-check-circle"></i></a>
                                <a href="{{route('reject_bookings', $item->id)}}" class="btn btn-danger" name="action" data-toggle="tooltip" title="Reject" value="reject"><i class="bi bi-x-circle"></i></a>
                            @elseif ($item->status == 'approved')
                                <a href="{{route('ongoing_bookings_byadmin', $item->id)}}" class="btn btn-primary" name="action" data-toggle="tooltip" title="In Use" value="used"><i class="bi bi-clock-history"></i></a>
                                <a href="{{route('cancel_bookings_byadmin', $item->id)}}" class="btn btn-warning" name="action" data-toggle="tooltip" title="Cancel" value="cancel"><i class="bi bi-x-circle"></i></a>
                            @elseif ($item->status == 'on_going')
                                <a href="{{route('confirm_bookings', $item->id)}}" class="btn btn-success" name="action" data-toggle="tooltip" title="Confirm" value="confirm"><i class="bi bi-check2-circle"></i></a>
                                <a href="{{route('cancel_bookings_byadmin', $item->id)}}" class="btn btn-warning" name="action" data-toggle="tooltip" title="Cancel" value="cancel"><i class="bi bi-x-circle"></i></a>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="pagination d-flex justify-content-end">
        {{ $bookings->appends(['status' => request('status')])->links() }}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>
        $( document ).ready(function() {
            $('[data-toggle="tooltip"]').tooltip({'placement': 'top'});
        });
    </script>

@endsection
