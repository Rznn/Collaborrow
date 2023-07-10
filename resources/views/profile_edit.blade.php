@extends('layouts.mainlayout')

@section('title', 'Edit Profile')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <h1 class="text-center my-3">Edit User Profile</h1>

    {{-- adding form --}}
    <div class="mt-5">
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif

        <form action="/profile_edit/{{ $users->slug }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card mx-auto" style="padding: 30px 40px 30px 40px; width: 800px;background:none; border-radius: 15px; box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 2px 0px;">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $users->name }}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" id="email" class="form-control" value="{{ $users->email }}">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" value="{{ $users->password }}">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea type="text" cols="80" rows="2" name="address" id="address" class="form-control" style="resize: none">{{ $users->address }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="no_telp" class="form-label">Phone Number</label>
                    <input type="text" name="no_telp" id="no_telp" class="form-control" value="{{ $users->no_telp }}">
                </div>

                <div class="mt-3 d-flex justify-content-center">
                    <button class="btn btn-success" type="submit">Update Data</button>
                </div>
            </div>
        </form>
    </div>

@endsection
