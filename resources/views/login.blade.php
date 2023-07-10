<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8" />
    <title>Login Collaborrow</title>
    <link rel="stylesheet" href="{{asset('css/login.css')}}" />
    <link rel="icon" href="{{asset('image/logo-removebg.png')}}">
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
            <input type="password" name="password" id="password" required>
            <span></span>
            <label>Password</label>
        </div>
        <input type="submit" value="Login" />
        <div class="signup_link">Not a member? <a href="/register">Signup</a></div>
    </form>
    @if(Session::has('error'))
    <div class="alert alert-danger" role="alert">
        {{ Session::get('error') }}
    </div>
    @endif
    </div>
</body>
</html>
