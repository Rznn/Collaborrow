@extends('layouts.mainlayout')

@section('title', 'Deleted Units')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        .table{
            text-align: center;
        }

        .table th {
            padding: 10px 0;
            background-color: #ede0ce;
        }

        .table th:first-child,
        .table td:first-child {
            border-top-left-radius: 8px;
            border-bottom-left-radius: 8px;
        }

        .table th:last-child,
        .table td:last-child {
            border-top-right-radius: 8px;
            border-bottom-right-radius: 8px;
        }

        th:nth-child(1),
        td:nth-child(1) {
        width: 25%;
        }

        th:nth-child(2),
        td:nth-child(2),
        th:nth-child(3),
        td:nth-child(3),
        th:nth-child(4),
        td:nth-child(4) {
        width: 25%;
        }
    </style>

    <h1>Deleted Unit List</h1>
    {{-- back --}}
    <div class="mt-4 d-flex justify-content-start">
        <a href="/units" class="btn btn-primary">Back to Unit List</a>
    </div>

    {{-- success restore --}}
    <div class = "mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>

    {{-- table --}}
    <div class="my-5">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deletedunits as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->unit_address }}</td>
                        <td>
                            <a href="/unit_restore/{{ $item->slug }}"class="btn btn-warning" name="action" data-toggle="tooltip" title="Restore" value="restore"><i class="bi bi-arrow-left-circle"></i> | Restore</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>
        $( document ).ready(function() {
            $('[data-toggle="tooltip"]').tooltip({'placement': 'top'});
        });
    </script>
@endsection
