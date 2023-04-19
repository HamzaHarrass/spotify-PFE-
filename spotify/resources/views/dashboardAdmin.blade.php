@extends('layout')

@section('sidebar')

@endsection

@section('content')

        <!-- categories -->
        <ul id="filters" class="d-flex justify-content-center flex-wrap px-2 pt-4 mb-0 text-uppercase">
            <li class="mb-5 mr-4">
                <a class="position-relative" href="{{route('dashboardAdmin')}}">Home</a>
            </li>
            <li class="mb-5 mr-4">
                <a href="{{route('acceptdemande')}}">Demande</a>
            </li>
        </ul>
        <!-- /Artists -->
        <div id="recent" class="d-flex flex-column pl-3 pr-2">
            <h1 class="pl-2 text-white">Dashbord</h1>
            <div class="playlist_row container-fluid d-flex my-4">
                <div class="row w-100">


                    <div class="  d-flex flex-wrap justify-content-around align-items-top w-100 row">
                        <div class="col-lg-4 col-md-6 col-sm-6 mt-3">
                          <div class="card card-stats bg-black bg-gradient">
                                <div class="card-content text-white text-center">
                                  <p class="category mt-1"><strong>Users</strong></p>
                                  <h3 class="card-title">{{$stats['userCount']}}</h3>
                                </div>
                          </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-6 mt-3">
                          <div class="card card-stats bg-black bg-gradient">
                                <div class="card-content text-white text-center">
                                  <p class="category mt-1"><strong>Artists</strong></p>
                                  <h3 class="card-title">{{$stats['artistCount']}}</h3>
                                </div>
                          </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-6 mt-3">
                          <div class="card card-stats bg-black bg-gradient">
                                <div class="card-content text-white text-center ">
                                  <p class="category mt-1"><strong>Albums</strong></p>
                                  <h3 class="card-title">{{$stats['albumCount']}}</h3>
                                </div>
                          </div>
                        </div>
                      </div>



                      <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6 text-white mt-5">
                                <h2>Artists</h2>
                                <table class="table text-white mt-3 ">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Nom</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $item)
                                        <tr>
                                            <td><img src="{{asset($item->image)}}" alt="Image de l'artiste" width="50px"></td>
                                            <td>{{$item->name}}</td>
                                            <td><form class="" action="{{route('profile.deleteUser', $item->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger ">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-6 text-white mt-5">
                                <h2>Albums</h2>
                                <table class="table text-white mt-3">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Nom</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($album as $item)
                                        <tr>
                                            <td><img src="{{asset($item->image)}}" alt="Image de l'artiste" width="50px"></td>
                                            <td>{{$item->name}}</td>
                                            <td><form class="" action="{{route('album.destroy', $item->id)}}" method="post">
                                                     @csrf
                                                     @method('DELETE')
                                                     <button type="submit" class="btn btn-danger ">Delete</button>
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

@endsection
