<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8" />
    <title>Register Collaborrow</title>
    <link rel="stylesheet" href="{{asset('css/register.css')}}" />
    <link rel="icon" href="{{asset('image/logo-removebg.png')}}">
</head>
<body>
    <div class="center">
    <h1>Register</h1>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="txt_field">
            <input type="text" name="name" id="name" required>
            <span></span>
            <label>Name</label>
        </div>
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
        <div class="txt_field">
            <input type="text" name="no_telp" id="no_telp" required>
            <span></span>
            <label>Phone Number</label>
        </div>
        <div class="txt_field">
            <input type="address" name="address" id="address" required>
            <span></span>
            <label>Address</label>
        </div>
        <input type="submit" value="Register" />
        <div class="signup_link">Already have an Account? <a href="/login">Login</a></div>
    </form>
    @if(Session::has('error'))
    <div class="alert alert-danger" role="alert">
        {{ Session::get('error') }}
    </div>
    @endif
    </div>
</body>
</html>
