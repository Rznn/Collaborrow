@extends('layouts.mainlayout')

@section('title', 'Ban User')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <div class="card mt-5 mx-auto" style="padding: 30px 40px 30px 40px; width: 800px;background:none; border-radius: 15px; box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 2px 0px;">
        <h2 class="mt-2" style="text-align:center">Do you want to Ban {{ $users->name }} ?</h2>
        <div class="mt-5 d-flex justify-content-center">
            <a href="/user_destroy/{{ $users->slug }}" class="btn btn-danger me-2">Ban User</a>
            <a href="/users" class="btn btn-primary">Cancel</a>
        </div>
    </div>
@endsection
