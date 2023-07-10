@extends('layouts.mainlayout')

@section('title', 'Units')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/category_unit_user.css') }}">

    <h1>Unit List</h1>

    {{-- add --}}
    <div class="mt-4 d-flex justify-content-start">
        <a href="/unit_add" class="btn btn-primary me-2">Add Unit</a>
        <a href="/unit_deleted_list" class="btn btn-secondary">View Deleted Units</a>
    </div>

    {{-- success cud --}}
    <div class = "mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>

    {{-- table --}}
    <div class="my-5 card-table">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Unit Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($units as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->unit_address }}</td>
                        <td>
                            <a href="/unit_edit/{{ $item->slug }}" class="btn btn-success" name="action" data-toggle="tooltip" title="Edit" value="edit"><i class="bi bi-pencil-square"></i></a>
                            <a href="/unit_delete/{{ $item->slug }}" class="btn btn-danger" name="action" data-toggle="tooltip" title="Delete" value="delete"><i class="bi bi-trash"></i></a>
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
