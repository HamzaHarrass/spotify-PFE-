<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="/style/style.css">
        <link rel="shortcut icon" href="images/icons/spotify.png" type="image/x-icon">
    </head>
    <body class="overflow-hidden" style="background: rgb(0,0,0);
background: linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(0,113,15,1) 100%);">
        <div class="container-fluid d-flex px-0">
            <!-- Left sidebar -->
            <nav id="sidebar" class="d-flex justify-content-between flex-column fixed-left flex-shrink-0 px-0 text-grey" style="background: rgb(0,0,0);
            background: linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(1,94,14,1) 100%);">
                <div class="wrapper">
                    <!-- Logo -->
                    <a href="home.html" id="logo" class="d-flex align-items-center py-3 pl-3 disappear">
                        <!-- <img src="img/logo.svg"  alt="Spotify logo"> -->
                        <img class="logo" src="/images/icons/spotify.png" alt="">
                        <span class="ml-2 text-white">Spotify</span>
                    </a>
                    <!-- /Logo -->

                    <a class="d-none appear mb-4" href="/">
                        <img width="25" class="mt-2" src="{{asset('images/icons/spotify.png')}}" alt="Small Spotify logo">
                    </a>

                    <!-- Sidebar options -->
                    <ul id="sidebar_options" class="px-0 disappear">
                        <li class="position-relative pl-3 mb-2">
                            <a class="d-flex align-items-center" href="#">
                                <img id="home" src="{{asset('images/icons/home.svg')}}" alt="Icon depicting a house">
                                <span class="ml-2 text-white">Home</span>
                            </a>
                        </li>
                    </ul>
                    <!--  -->
                        @yield('sidebar')
                      <!-- / -->

                    <!-- Sidebar options  -->
                    <div class="d-none appear">
                        <a href="#" class="d-block mb-3">
                            <img src="/images/icons/home.svg" alt="Icon depicting a house">
                        </a>
                    </div>
                    <!-- /Sidebar options -->

                </div>

                <!-- Profile  -->
                <div id="profile" class="d-flex flex-column disappear">
                    <div id="user" class="d-flex align-items-center mt-3 mb-2 pl-3">
                        <div class="user_img mb-3 ">
                            <img width="30" height="30"  src="{{Auth::user()->image}}" alt="image" class="rounded-circle ">
                        </div>

                        <div id="profile_name" class="text-white ml-4">{{ Auth::user()->name }}</div>
                    </div>
                </div>
                <!-- /Profile  -->
            </nav>

            <!-- App content -->
            <main class="d-flex flex-column w-100 px-0 text-grey">
                <div  style="margin-right: 2%" id="upgrade_bar" class="d-flex justify-content-end  align-items-center fixed-top mt-3">
                    <div  class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </button>
                        <div class="dropdown-menu">
                          <a style="cursor: pointer" class="dropdown-item" href="{{ route('profile.edit') }}">Profil</a>
                          <form method="POST" action="{{ route('logout') }}">
                            @csrf
                           <button class="dropdown-item" type="submit">Logout</button>
                          </form>
                        </div>
                      </div>
                </div>

                @yield('content')


            <!-- Now-playing bar -->
            <footer id="now_playing" class="d-flex justify-content-between align-items-center px-sm-3 fixed-bottom bg-dark-grey">
                <!-- Left section (current song) -->
                <div id="song_info" class="d-flex align-items-center">
                    <a href="#">
                        <img class="img-fluid" src="/image/lferda.jpg" alt="">
                    </a>
                    <div class="disappear ml-2 mr-4">
                        <a href="#" id="current_song" class="text-grey">Lferda</a>
                    </div>
                    <div class="disappear d-flex flex-wrap">
                        <a href="#" class="mr-3">
                            <i class="far fa-heart"></i>
                        </a>

                    </div>
                </div>


                <!-- Central section (media controls) -->
                <div class="d-flex flex-column text-white w-50 mx-2 mx-sm-4">
                    <div id="media_icons" class="d-flex justify-content-center align-items-center mb-3">
                        <i class="mr-2 mr-sm-4 fas fa-random"></i>
                        <i class="mr-2 mr-sm-4 fas fa-step-backward"></i>
                        <i class="mr-2 mr-sm-4 px-2 far fa-play-circle"></i>
                        <i class="mr-2 mr-sm-4 fas fa-step-forward"></i>
                        <i class="fas fa-undo"></i>
                    </div>
                    <div id="media_bar" class="d-flex align-items-center">
                        <span id="current-time" class="font-weight-normal">0:00</span>
                        <div id="progress_bar" class="mx-4 rounded-pill">
                            <div class="slider position-relative h-100 rounded-pill" id="progress">
                              <div class="slider_handle position-absolute d-none rounded-circle"></div>
                            </div>
                          </div>
                        <span id="duration" class="font-weight-normal">0:00</span>
                    </div>
                </div>

                <!-- Right section (volume and miscellaneous) -->
                <div id="volume" class="disappear align-items-center d-flex text-white">
                    <i class="mr-3 fas fa-volume-up"></i>
                    <div id="volume_bar" class="rounded-pill">
                        <div class="slider position-relative w-25 h-100 rounded-pill">
                            <div class="slider_handle position-absolute d-none rounded-circle"></div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>

        <!-- <script src="/js/app.js"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    </body>
</html>
