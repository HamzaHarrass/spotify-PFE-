  @extends('layout')


  @section('sidebar')

  <div class="navigation__list mt-5 d-md-block d-none">

      <div class="navigation__list__header ml-3 " role="button" data-toggle="collapse" href="#yourMusic"  aria-controls="yourMusic">
        Your Music
      </div>

      <div class="" id="yourMusic">

        <a href="{{route('dashboard')}}" class="navigation__list__item">
          <i class="ion-headphone"></i>
          <span>Home</span>
        </a>

        <a href="{{route('allAlbums')}}" class="navigation__list__item">
          <i class="ion-ios-musical-notes"></i>
          <span>Albums</span>
        </a>

        <a href="#" class="navigation__list__item">
          <i class="ion-person"></i>
          <span>Artists</span>
        </a>

      </div>

    </div>
  @endsection


  @section('content')
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        <form method="POST" action="{{route('demande.store')}}" class="ml-5">
            @csrf
            <button class=" btn text-success bg-white ml-5">
                <i class="bi bi-headset text-black"></i>DEMANDE ARTIST</button>
        </form>
                <!-- categories -->
                <ul id="filters" class="d-flex justify-content-center flex-wrap px-2 pt-4 mb-0 text-uppercase">
                    <li class="mb-5 mr-4">
                        <a class="position-relative" href="{{route('dashboard')}}">Home</a>
                    </li>
                    <li class="mb-5 mr-4">
                        <a href="{{route('allAlbums')}}">Albums</a>
                    </li>
                    <li class="mb-5 mr-4">
                        <a href="#">Artists</a>
                    </li>
                </ul>

                <!-- Playlist -->
                <div id="recent" class="d-flex flex-column pl-3 pr-1">
                    <h1 class="pl-2 text-white">Playlist</h1>
                    <!-- <input class="w-25 r" type="text" name="" id=""> -->
                    <div class="playlist_row container-fluid d-flex my-4">
                        <div class="row w-100">
                            @foreach ($user as $item)
                            <div class="playlist col-6 col-md-3 col-lg-2 d-flex flex-column mb-3 px-2">
                                <a class="position-relative" href="{{route('music_play',$item->id)}}">
                                    <img class="img-fluid" src="{{asset($item->image)}}" alt="">
                                </a>
                                <a href="#">
                                    <h2 class="mt-3 text-white text-center">{{$item->name}}</h2>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
    @endsection
