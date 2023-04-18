@extends('layout')

@section('content')
        <!-- categories -->
        <ul id="Album" class="d-flex justify-content-center flex-wrap px-2 pt-4 mb-0 text-uppercase">
            <li class="mb-5 mr-4">
                <a class="position-relative" href="{{route('dashboardAdmin')}}">Home</a>
            </li>
            <li class="mb-5 mr-4">
                <a href="{{route('acceptdemande')}}">Demande</a>
            </li>
        </ul>

<div id="recent" class="d-flex flex-column pl-3 pr-1">
    <h1 class="pl-2 text-white">Playlist</h1>
    <!-- <input class="w-25 r" type="text" name="" id=""> -->
    <div class="playlist_row container-fluid d-flex my-4">
        <div class="row w-100">
            @foreach ($demande as $item)
            <div class="playlist col-6 col-md-3 col-lg-2 d-flex flex-column mb-3 px-2">
                <a class="position-relative" href="{{route('acceptdemande')}}">
                    <img class="img-fluid rounded" src="{{asset($item->user->image)}}" alt="">
                    <div class="playlist_overlay position-absolute d-none w-100 h-100 bg-fading-black">
                        <i class="position-absolute far fa-play-circle"></i>
                    </div>
                </a>
                    <h2 class="mt-3 text-white text-star">{{$item->user->name}}</h2>
                    <form method="POST" action="{{ route('acceptdemande.update', $item->id)}}">
                        @csrf
                        <button class="btn btn-success">Accepter</button>
                    </form>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
