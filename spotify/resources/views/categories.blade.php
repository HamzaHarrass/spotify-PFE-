<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My Spotify</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="/style/style.css">
        <link rel="shortcut icon" href="images/icons/spotify.png" type="image/x-icon">
    </head>
    <body class="overflow-hidden bg-black">
        <div class="container-fluid d-flex px-0">
            <!-- Left sidebar -->
            <nav id="sidebar" class="d-flex justify-content-between flex-column fixed-left flex-shrink-0 px-0 text-grey bg-black">
                <div class="wrapper">
                    <!-- Logo -->
                    <a href="home.html" id="logo" class="d-flex align-items-center py-3 pl-3 disappear">
                        <!-- <img src="img/logo.svg"  alt="Spotify logo"> -->
                        <img class="logo" src="/images/icons/spotify.png" alt="">
                        <span class="ml-2 text-white">Spotify</span>
                    </a>
                    <!-- /Logo -->

                    <a class="d-none appear mb-4" href="/">
                        <img src="/images/logo-small.svg" alt="Small Spotify logo">
                    </a>

                    <!-- Sidebar options -->
                    <ul id="sidebar_options" class="px-0 disappear">
                        <li class="position-relative pl-3 mb-2">
                            <a class="d-flex align-items-center" href="#">
                                <img id="home" src="/images/icons/home.svg" alt="Icon depicting a house">
                                <span class="ml-2 text-white">Home</span>
                            </a>
                        </li>
                    </ul>
                    <!-- /Sidebar options -->

                    <!-- Sidebar options  -->
                    <div class="d-none appear">
                        <a href="#" class="d-block mb-3">
                            <img src="/images/home.svg" alt="Icon depicting a house">
                        </a>

                        <a href="#" class="d-block mb-3">
                            <img src="/images/search.svg" alt="Icon depicting a magnifying glass">
                        </a>
                    </div>
                    <!-- /Sidebar options -->

                </div>

            </nav>

            <!-- App content -->
            <main class="d-flex flex-column w-100 px-0 text-grey">
                <div  style="margin-right: 2%" id="upgrade_bar" class="d-flex justify-content-end  align-items-center fixed-top mt-3">
                    {{-- <a href="#" class="btn rounded-pill border border-white mr-5 px-5 bg-black text-white text-uppercase">Profile</a> --}}
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

                <!-- categories -->
                <ul id="categorie" class="d-flex justify-content-center flex-wrap px-2 pt-4 mb-0 text-uppercase">
                    <li class="mb-5 mr-4">
                        <a class="position-relative" href="dashbordadmin.html">Home</a>
                    </li>
                    <li class="mb-5 mr-4">
                        <a href="#">Categories</a>
                    </li>
                    <li class="mb-5 mr-4">
                        <a href="#">Artists</a>
                    </li>
                </ul>

                <!-- /Artists -->
                <div id="recent" class="d-flex flex-column pl-3 pr-1">
                    <h1 class="pl-2 text-white">Add Categories</h1>
                    <div class="playlist_row container-fluid d-flex my-4">
                        <div class="row w-100">
                            <div class="container-fluid">
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="card d-flex align-items-center justify-content-center bg-black text-white">
                                      <div class="card-body">
                                        <form method="POST" action="{{route('category.store')}}">
                                            @csrf
                                        <h5 class="">Categories Title</h5>
                                        <input class="px-4" type="text" name="name" id="">
                                        <button type="submit">add</button>
                                        <br>
                                          <input id="AddCate" class="mt-3 btn rounded-pill text-white border border-white mr-5 px-5" type="button" value="Add">
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6 ">
                                    <table class="table text-white">
                                      <thead>
                                        <tr>
                                          <th>id</th>
                                          <th>name</th>
                                          <th class="pe-5">Update</th>
                                          <th class="pe-5">delete</th>
                                          <th></th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @foreach ($category as $item)
                                        <tr>
                                          <td>{{$item->id}}</td>
                                          <td>{{$item->name}}</td>
                                          <td><a  class="btn bg-success text-white" href="#">Modifier</a></td>
                                          <td>  <form class="btn btn-danger btn-sm" action="{{route('category.destroy', $item->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                          </td>
                                        </tr>
                                        @endforeach
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            </main>
    </body>
</html>
