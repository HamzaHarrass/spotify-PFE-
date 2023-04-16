@extends('layout')

@section('sidebar')
<div class="navigation__list mt-5 ">

    <div class="navigation__list__header ml-3 " role="button" data-toggle="collapse" href="#yourMusic"  aria-controls="yourMusic">
      Your Music
    </div>

    <div class="" id="yourMusic">

      <a href="{{route('song')}}" class="navigation__list__item">
        <i class="ion-headphone"></i>
        <span>Songs</span>
      </a>

      <a href="#" class="navigation__list__item">
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

<div id="recent" class="d-flex flex-column pl-3 pr-1">
    <h1 class="pl-2 text-white">Music</h1>
    <div class="playlist_row container-fluid d-flex my-4 ">
        <div class="row w-100">
            @foreach ($music as $item)
            <div class="playlist col-6 col-md-3 col-lg-2 d-flex flex-column mb-3 px-2">
                <a class="position-relative" href="#">
                    <img class="img-fluid" src="{{asset($item->image)}}" alt="">
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
            </div>
        </div>
    </div>
</div>

@endsection
