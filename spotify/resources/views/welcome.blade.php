<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/styleHome.css">
 <!-- boxicons link -->
    <link rel="stylesheet"
    href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <!-- remixicon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Poppins:wght@300;400;500;600;700;800;900&display=splay=swap" rel="stylesheet">
</head>
<body>
    <header>
        <a href="#" class="logo"><span>S</span>POTIF<span>Y</span></a>
        <ul class="navlist">
            @if (Route::has('login'))
            @auth
            @if (Auth::user()->role_id == 1)
            <li><a href="{{ url('/dashboardAdmin') }}">Dashborad</a></li>
            @endif
            @if (Auth::user()->role_id == 2)
            <li><a href="{{ url('/dashboard') }}">Dashborad</a></li>
            @endif
            @if (Auth::user()->role_id == 3)
            <li><a href="{{ url('/dashboard_artist') }}">Dashborad</a></li>
            @endif
            @else
            <li><a href="{{ route('register') }}">Sign Up</a></li>
            <li><a href="{{ route('login') }}">Log In</a></li>
            @endauth
            @endif
        </ul>
        <div class="bx bx-menu" id="menu-icon"></div>
    </header>

    <section class="banner">
        <div class="content">
            <h2>Millions of songs.</h2>
            <h1>Spotify</h1>
            <p>Spotify is now free on mobile, tablet and computer. Listen to the right music, wherever you are.</p>
            <a href="#" class="btn"><i class="ri-spotify-fill"></i>GET SPOTIFY FREE</a>
        </div>
        <div class="img">
            <img width="700" src="images/lticolore-beau-modele-feminin-concept-emotions-humaines-expression-faciale-ventes-publicite-mode.png" alt="">
        </div>
    </section>

    <div class="icons">
        <a id="instagram"  href=""><i class="ri-instagram-line"></i></a>
        <a id="youtube" href=""><i class="ri-youtube-line"></i></a>
        <a id="facebook" href=""><i class="ri-facebook-circle-line"></i></a>
    </div>

    <div class="scroll-down">
        <a href="#about"><i class="ri-arrow-down-s-line"></i></a>
    </div>
</body>
</html>
