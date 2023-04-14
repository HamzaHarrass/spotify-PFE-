@extends('layout')

@section('content')

<ul id="filters" class="d-flex justify-content-center flex-wrap px-2 pt-4 mb-0 text-uppercase">
    <li class="mb-5 mr-4">
        <a class="position-relative" href="playlist.html">Playlist</a>
    </li>
    <li class="mb-5 mr-4">
        <a href="Albums.html">Albums</a>
    </li>
    <li class="mb-5 mr-4">
        <a href="#">Artists</a>
    </li>
</ul>

                <!-- Playlist -->
                <div id="recent" class="d-flex flex-column pl-3 pr-1">
                    <h1 class="pl-2 text-white">Music</h1>
                    <div class="playlist_row container-fluid d-flex my-4 ">
                        <div class="row w-100">
                            @foreach ($music as $item)
                            <div class="playlist col-6 col-md-3 col-lg-2 d-flex flex-column mb-3 px-2">
                                <a class="position-relative" href="#">
                                    <img class="img-fluid" src="{{asset($item->image)}}" alt="">
                                    {{-- <audio controls>
                                        <source src="{{asset($item->audio)}}" type="audio/mpeg">
                                    </audio> --}}
                                    <div class="playlist_overlay  position-absolute d-none w-100 h-100 bg-fading-black">
                                        <i class="position-absolute far fa-play-circle"></i>
                                    </div>
                                </a>
                                <div href="#">
                                    <h2 class="mt-3 text-white text-center">{{$item->name}}</h2>
                                </div>
                                <div href="#" class="text-center">
                                    <span id="heavymetal">{{$item->category->name}}</span>
                                </div>
                            </div>
                            @endforeach
                            <div class="h-100 w-0 d-flex align-items-center">
                                <a class="" href="">>>show more</a>
                            </div>
                        </div>
                    </div>

                    <h1 class="pl-2 text-white">Album</h1>
                    <div class="playlist_row container-fluid d-flex my-4">
                        <div class="row w-100">
                            @foreach ($album as $item)
                            <div class="playlist col-6 col-md-3 col-lg-2 d-flex flex-column mb-3 px-2">
                                <a class="position-relative" href="#">
                                    <img class="img-fluid" src="{{asset($item->image)}}" alt="">
                                    {{-- <div class="playlist_overlay position-absolute d-none w-100 h-100 bg-fading-black">
                                        <i class="position-absolute far fa-play-circle"></i>
                                    </div> --}}
                                </a>
                                <a href="#">
                                    <h2 class="mt-3 text-white text-center">{{$item->name}}</h2>
                                </a>
                                <a href="#" class="text-center">
                                    <span id="heavymetal">{{$item->category->name}}</span>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
   <script src="script/script.js"></script>
@endsection