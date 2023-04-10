<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="shortcut icon" href="images/icons/spotify.png" type="image/x-icon">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style/StyleHome.css">
    </head>
    <body class="antialiased d-flex flex-column">
        <div class="d-flex justify-content-end align-items-center w-100 px-5">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                    @auth
                        <a id="dashbord" class="btn text-white border rounded-lg" href="{{ url('/dashboard') }}" class="">Dashboard</a>
                    @else
                        <a id="login" href="{{ route('login') }}" class="btn rounded-pill border border-white mr-5 px-5 bg-black text-white text-uppercase">Log in</a>

                        @if (Route::has('register'))
                            <a id="register" href="{{ route('register') }}" class="btn rounded-pill border border-white mr-5 px-5 bg-black text-white text-uppercasejjj">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
                    <div id="wrapper">
                        <div id="container">
                          <div id="headphones-container">
                            <div id="headphones"></div>
                            <div id="ears">
                              <div id="ear-one"></div>
                              <div id="ear-two"></div>
                              <div id="mic-stand">
                                <div id="mic-one"></div>
                                <div id="mic-two"></div>
                              </div>
                            </div>
                          </div>

                          <div class="disk">
                            <div id="two">
                              <div id="three">
                                <div id="four">
                                  <div id="mic">
                                    <div id="lines">
                                      <div class="line"></div>
                                      <div class="line"></div>
                                      <div class="line"></div>
                                      <div class="line"></div>
                                      <div class="line"></div>
                                      <div class="line"></div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div id="equalizer">
                          <div id="horizontal"></div>
                          <div id="vertical-lines">
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                            <div class="vertical"></div>
                          </div>
                        </div>
                        <h1>Spotify</h1>
                        {{-- <h2>Spotify</h2> --}}
                    </div>
        {{-- </div> --}}
        <script src="./script/script.js"></script>
    </body>
</html>
