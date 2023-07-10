<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Landing Page</title>
    <link rel="stylesheet" href="{{asset('css/landing.css')}}" />
    <link rel="icon" href="{{asset('image/logo-removebg.png')}}">
  </head>
  <body>
    <main>
      <div class="big-wrapper light">
        <img src="{{asset('image/shape.png')}}" alt="" class="shape" />

        <header>
          <div class="container">
            <div class="logo">
              <img src="{{asset('image/logo-removebg.png')}}" alt="Logo" />
              <h3>Collaborrow</h3>
            </div>

            <div class="links">
              <ul>
                <li><a href="/register" class="btn">Sign up</a></li>
              </ul>
            </div>

            <div class="overlay"></div>

            <div class="hamburger-menu">
              <div class="bar"></div>
            </div>
          </div>
        </header>

        <div class="showcase-area">
          <div class="container">
            <div class="left">
              <div class="big-title">
                <h1>Start Borrow</h1>
                <h1>Your Things with Ease!</h1>
              </div>
              <p class="text">
                Discover a convenient and collaborative platform designed specifically for borrowing resources within your campus community.
                <br><br>
                So, experience the ease of borrowing and the power of collaboration with Collaborrow.
              </p>
              <div class="cta">
                <a href="/login" class="btn">Get started</a>
              </div>
            </div>

            <div class="right">
              <img src="{{asset('image/person.png')}}" alt="Person Image" class="person" />
            </div>
          </div>
        </div>

        <div class="bottom-area">
          <div class="container">
            <button class="toggle-btn">
              <i class="far fa-moon"></i>
              <i class="far fa-sun"></i>
            </button>
          </div>
        </div>
      </div>
    </main>

    <!-- JavaScript Files -->

    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <script src="{{asset('js/landing.js')}}"></script>
  </body>
</html>
