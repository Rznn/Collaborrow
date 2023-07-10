<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Borrow Authorization</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            * {
                margin-top: 5px;
                padding: 0;
            }
            body {
                font-family: 'Roboto', sans-serif;
                line-height: 1.4;
            }
            .center-align {
                text-align: center;
                line-height: 1.25;
            }
            .blue-heading {
                color: #00579e;
                font-size: 16pt;
                margin: 2rem 0 2rem 0;
            }
            .text-bold {
                font-weight: bold;
            }
            .list-items {
                list-style-type: disc;
                padding-left: 20px;
                list-style: none;
            }
            .list-items li {
                font-size: 12pt;
            }
            .mb-0 {
                margin-bottom: 0 !important;
            }
            .mt-0 {
                margin-top: 0 !important;
            }
        </style>
    </head>
    <body>
        <p class="center-align mb-0">
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('image/logo-removebg.png'))) }}" width="70" height="70" alt="">
        </p>
        <p class="center-align mb-0">
            <strong>COLLABORROW</strong>
        </p>
        <p class="center-align mb-0">
            <strong>{{ $bookings->items->units->name }}</strong>
        </p>
        <p class="center-align mb-3">
            <strong>{{ $bookings->items->units->unit_address }}</strong>
        </p>
        <hr>
        <p class="center-align blue-heading text-bold mb-0">
            BORROW AUTHORIZATION
        </p>
        <p class="center-align" style="margin-bottom: 20px">
            <strong>No: {{ $bookings->id }} - IB{{ $bookings->items->id }}</strong>
        </p>
        <p>
            <strong>
                The person responsible for borrowing the items below:
            </strong>
        </p>
        <ul class="list-items">
            <li>
                <strong>Name: </strong>{{ $bookings->users->name }}
            </li>
            <li>
                <strong>Email: </strong>{{ $bookings->users->email }}
            </li>
            <li>
                <strong>Phone number: </strong>{{ $bookings->users->no_telp }}
            </li>
        </ul>
        <p>
            <strong>
                To borrow item with the following details:
            </strong>
        </p>
        <ul class="list-items">
            <li>
                <strong>Name: </strong>{{ $bookings->items->name }}
            </li>
            <li>
                <strong>Brand: </strong>{{ $bookings->items->brand }}
            </li>
            <li>
                <strong>Details: </strong>{{ $bookings->items->description }}
            </li>
            <li>
                <strong>Booking date: </strong>{{ $bookings->booking_date }}
            </li>
            <li>
                <strong>Expected Return date: </strong>{{ $bookings->return_date }}
            </li>
            <li>
                <strong>Amount: </strong>{{ $bookings->stock }}
            </li>
        </ul>
        <p>
            <strong>
                Please visit our unit to finalize the booking confirmation. Kindly ensure to handle the items with care and prevent any damage. In the event of any damage, a penalty fee will be imposed as agreed upon.
            </strong>
        </p>
        <p>
            <strong>
                If you need assistance, please contact:
            </strong>
        </p>
        <hr>
        <ul class="list-items">
            <li>
                <strong>Admin unit:</strong> {{ $bookings->items->users->name }}
            </li>
            <li>
                <strong>Phone number:</strong> {{ $bookings->items->users->no_telp }}
            </li>
        </ul>
    </body>
</html>
