<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') Collaborrow</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="icon" href="{{asset('image/logo-removebg.png')}}">
</head>

<body>
    <div class="row" style="">
        <div class="col-2 block-sidebar">
            <div class="sidebar">
                <div class="row container-header">
                    <div class="col-4 header-logo d-flex justify-content-end">
                        <img src="{{ asset('image/logo-removebg.png') }}" alt="">
                    </div>
                    <div class="col-8 header-name">
                        <h5>Collaborrow</h5>
                    </div>
                </div>

                <div class="container-menu d-flex flex-column">
                    {{-- ADMINISTRATOR --}}
                    @can('manage-crud-admin')
                    <a href="/admin_dashboard" @if (request()->route()->uri == 'admin_dashboard') class="active" @endif>
                        <span class="d-flex">
                            <i class="bi bi-house me-3"></i>
                            <p class="mb-0">Dashboard</p>
                        </span>
                    </a>
                    <a href="/categories" @if (request()->route()->uri == 'categories' || request()->route()->uri == 'category_deleted_list' || request()->route()->uri == 'category_add' || request()->route()->uri == 'category_delete/{slug}' || request()->route()->uri == 'category_edit/{slug}') class="active" @endif>
                        <span class="d-flex">
                            <i class="bi bi-ui-radios-grid me-3"></i>
                            <p class="mb-0">Categories</p>
                        </span>
                    </a>
                    <a href="/units" @if (request()->route()->uri == 'units' || request()->route()->uri == 'unit_deleted_list' || request()->route()->uri == 'unit_add' || request()->route()->uri == 'unit_delete/{slug}' || request()->route()->uri == 'unit_edit/{slug}') class="active" @endif>
                        <span class="d-flex">
                            <i class="bi bi-building me-3"></i>
                            <p class="mb-0">Units</p>
                        </span>
                    </a>
                    <a href="/users" @if (request()->route()->uri == 'users' || request()->route()->uri == 'user_edit/{slug}' || request()->route()->uri == 'user_ban/{slug}' || request()->route()->uri == 'user_banned_list') class="active" @endif>
                        <span class="d-flex">
                            <i class="bi bi-people me-3"></i>
                            <p class="mb-0">Users</p>
                        </span>
                    </a>
                    <a href="/items" @if (request()->route()->uri == 'items' || request()->route()->uri == 'item_deleted_list' || request()->route()->uri == 'item_add' || request()->route()->uri == 'item_delete/{slug}' || request()->route()->uri == 'item_edit/{slug}') class="active" @endif>
                        <span class="d-flex">
                            <i class="bi bi-box-seam me-3"></i>
                            <p class="mb-0">Items</p>
                        </span>
                    </a>
                    <a href="/bookings" @if (request()->route()->uri == 'bookings') class="active" @endif>
                        <span class="d-flex">
                            <i class="bi bi-cart3 me-3"></i>
                            <p class="mb-0">Bookings</p>
                        </span>
                    </a>

                    {{-- ADMIN UNIT --}}
                    @elsecan('manage-crud-adminunit')
                    <a href="/admin_unit_dashboard" @if (request()->route()->uri == 'admin_unit_dashboard') class="active" @endif>
                        <span class="d-flex">
                            <i class="bi bi-house me-3"></i>
                            <p class="mb-0">Dashboard</p>
                        </span>
                    </a>
                    <a href="/profile" @if (request()->route()->uri == 'profile' || request()->route()->uri == 'profile_edit/{slug}') class="active" @endif>
                        <span class="d-flex">
                            <i class="bi bi-person-circle me-3"></i>
                            <p class="mb-0">Profile</p>
                        </span>
                    </a>
                    <a href="/items" @if (request()->route()->uri == 'items' || request()->route()->uri == 'item_deleted_list' || request()->route()->uri == 'item_add' || request()->route()->uri == 'item_delete/{slug}' || request()->route()->uri == 'item_edit/{slug}') class="active" @endif>
                        <span class="d-flex">
                            <i class="bi bi-box-seam me-3"></i>
                            <p class="mb-0">Items</p>
                        </span>
                    </a>
                    <a href="/bookings" @if (request()->route()->uri == 'bookings') class="active" @endif>
                        <span class="d-flex">
                            <i class="bi bi-cart3 me-3"></i>
                            <p class="mb-0">Bookings</p>
                        </span>
                    </a>

                    {{-- USER --}}
                    @elsecan('manage-crud-client')
                    <a href="/dashboard" @if (request()->route()->uri == 'dashboard') class="active" @endif>
                        <span class="d-flex">
                            <i class="bi bi-house me-3"></i>
                            <p class="mb-0">Dashboard</p>
                        </span>
                    </a>
                    <a href="/profile" @if (request()->route()->uri == 'profile' || request()->route()->uri == 'profile_edit/{slug}') class="active" @endif>
                        <span class="d-flex">
                            <i class="bi bi-person-circle me-3"></i>
                            <p class="mb-0">Profile</p>
                        </span>
                    </a>
                    <a href="/item_list" @if (request()->route()->uri == 'item_list' || request()->route()->uri == 'book_item/{slug}') class="active" @endif>
                        <span class="d-flex">
                            <i class="bi bi-box-seam me-3"></i>
                            <p class="mb-0">Items</p>
                        </span>
                    </a>
                    <a href="/bookings_client" @if (request()->route()->uri == 'bookings_client' || request()->route()->uri == 'print.booking_show/{id}') class="active" @endif>
                        <span class="d-flex">
                            <i class="bi bi-cart3 me-3"></i>
                            <p class="mb-0">Bookings</p>
                        </span>
                    </a>
                    @else
                    -
                    @endcan
                </div>
            </div>
        </div>
        <div class="col-10 block-main">
            <div class="block-navbar">
                <nav class="navbar d-flex justify-content-end">
                    <div class="navbar-logout">
                        <a href="{{route('logout')}}" class="btn">
                            <span class="d-flex align-items-center">
                            <i class="bi bi-box-arrow-left me-2"></i>
                            <p class="mb-0">| Sign out</p>
                            </span>
                        </a>
                    </div>
                </nav>
                <div class="content pt-4>
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>
</html>
