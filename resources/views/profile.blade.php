@extends('layouts.mainlayout')

@section('title', 'Profile')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">

    <div class="container mt-5 py-5">
        <div class="row d-flex justify-content-center align-items-center mx-auto">
          <div class="col col-lg-12 d-flex justify-content-center mb-4 mb-lg-0">
            <div class="card mb-3" style="border-radius: .5rem;">
              <div class="row g-0 my-auto">
                <div class="col-md-4 gradient-custom text-center"
                  style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                  <img src="{{ asset('image/user.avif') }}"
                    alt="Avatar" class="img-fluid mt-4 mb-4" style="width: 100px;"
                  />
                  <h5>{{ $users->name }}</h5>
                  <p>{{ $users->roles->name }}</p>
                  <a href="/profile_edit/{{$users->slug}}" class="btn btn-primary" style="border-radius:30%; background-color:#6a7e9d ;border:transparent ;color: #f5efe7" name="action" data-toggle="tooltip" title="Edit" value="edit"><i class="bi bi-pencil-square"></i></a>
                </div>
                <div class="col-md-8">
                  <div class="card-body p-4" style="text-align: center">
                    <h5 class="pb-2"><b>User Information</b></h5>
                    <hr class="mt-2 mb-4">
                    <div class="row pt-1">
                      <div class="col-6 mb-3">
                        <h6>Email</h6>
                        <p class="text-muted">{{ $users->email }}</p>
                      </div>
                      <div class="col-6 mb-3">
                        <h6>Phone</h6>
                        <p class="text-muted">{{ $users->no_telp }}</p>
                      </div>
                    </div>
                    <hr class="mt-0 mb-4">
                    <div class="">
                        <h6>Address</h6>
                        <p class="text-muted">{{ $users->address }}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>
        $( document ).ready(function() {
            $('[data-toggle="tooltip"]').tooltip({'placement': 'top'});
        });
    </script>
@endsection
