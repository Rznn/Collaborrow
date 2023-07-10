<link rel="stylesheet" href="{{ asset('css/adminadminunitdashboard.css') }}">
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
