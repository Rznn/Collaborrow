<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8" />
    <title>Login Collaborrow</title>
    <link rel="stylesheet" href="{{asset('css/login.css')}}" />
    <link rel="icon" href="{{asset('image/logo-removebg.png')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <div class="center">
    <h1>Login</h1>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="txt_field">
            <input type="email" name="email" id="email" required>
            <span></span>
            <label>Email</label>
        </div>
        <div class="txt_field">
            <input type="password" name="password" id="password" autocomplete="new-password" required>
            <span></span>
            <label>Password</label>
        </div>
        <input type="submit" value="Login" />
        <div class="signup_link">Not a member? <a href="/register">Signup</a></div>
    </form>
    @if(Session::has('error'))
    <div class="alert alert-danger mx-3" role="alert">
        {{ Session::get('error') }}
    </div>
    @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
