@extends('layout')

@section('sidebar')
<div class="navigation__list mt-5 ">

    <div class="navigation__list__header ml-3 " role="button" data-toggle="collapse" href="#yourMusic"  aria-controls="yourMusic">
      Your Music
    </div>

    <div class="" id="yourMusic">

      <a href="#" class="navigation__list__item">
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

<div class="container-fluid">
    <div class="row">
        <div class=" ml-5 col-10 sf-playlist">
            <div class="row">
                <div class="col-2">
                    <img src="{{asset($album->image)}}"  class="img-fluid border rounded"/>
                </div>
                <div class="col-10 d-flex align-items-end text-white">
                    <h2 class="title">{{$album->name}}</h2>
                    <h2></h2>
                </div>
            </div>
            <br/>

            <div class="row">
                <div class="col-12">
                    <div style="height: 300px; overflow: auto  ">
                        <table  class="table text-white">
                            <thead >
                                <th>#</th>
                                <th>image</th>
                                <th>Name</th>
                                <th></th>
                                <th>
                                    <span class="fa fa-thumbs-up"></span>
                                </th>
                            </thead>
                            <tbody>
                                @foreach ($music as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>
                                        <img src="{{asset($item->image)}}" width="30" height="30" class="rounded "/>
                                        <a href="" class="ml-4">
                                            <i class="bi bi-heart"></i>
                                        </a>
                                    </td>
                                    <td>{{$item->name}}</td>
                                    <td>
                                        <audio id="audio-{{$item->id}}" >
                                            <source src="{{asset($item->audio)}}" type="audio/mpeg">
                                        </audio>
                                    </td>
                                    <td><a href="#" class="play-button" data-id="{{$item->id}}" onclick="playMusic({{$item->id}})">
                                        <i class="bi bi-play-circle-fill color-success icon-music"></i>
                                      </a></td>
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
    </div>
</div>

@endsection
<script>
    let currentAudioElement = null;

function playMusic(id) {
    var audio = document.querySelector(`#audio-${id}`);
    const audioElement = document.querySelector(`#audio-${id}`);

    if (audioElement) {
    if (currentAudioElement) {
      currentAudioElement.pause();
    }

    audioElement.play();
    currentAudioElement = audioElement;
  }
}


</script>