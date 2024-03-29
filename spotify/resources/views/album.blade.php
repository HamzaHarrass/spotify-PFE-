@extends('layout')

@section('sidebar')
<div class="navigation__list mt-5 d-md-block d-none">

    <div class="navigation__list__header ml-3 " role="button" data-toggle="collapse" href="#yourMusic"  aria-controls="yourMusic">
      Your Music
    </div>

    <div class="" id="yourMusic">
        <a href="#" class="navigation__list__item">
          <i class="ion-person"></i>
          <span>Home</span>
        </a>

      <a href="{{route('music')}}" class="navigation__list__item">
        <i class="ion-headphone"></i>
        <span>Songs</span>
      </a>

      <a href="{{route('album')}}" class="navigation__list__item">
        <i class="ion-ios-musical-notes"></i>
        <span>Albums</span>
      </a>


    </div>

  </div>
@endsection

@section('content')

<ul id="Album" class="d-flex justify-content-center flex-wrap px-2 pt-4 mb-0 text-uppercase">
    <li class="mb-5 mr-4">
        <a class="position-relative" href="">Home</a>
    </li>
    <li class="mb-5 mr-4">
        <a href="#">Albums</a>
    </li>
    <li class="mb-5 mr-4">
        <a href="#">Song</a>
    </li>
</ul>

{{-- Album --}}
<div id="recent" class="d-flex flex-column pl-3 pr-1">
    <h1 class="pl-2 text-white">Add Album</h1>
    <div class="playlist_row container-fluid d-flex my-4">
        <div class="row w-100">
            <div class="container-fluid">
                <div class="row">
                  <div class="col-md-6">
                    <div class="card d-flex align-items-center justify-content-center bg-black text-white">
                      <div class="card-body">
                        <form method="POST" action="{{route('album.store')}}" enctype="multipart/form-data">
                            @csrf
                        <h5 class="">Album Title</h5>
                        <input class="px-4" type="text" name="name" id="">
                        <p class="mt-2">Category</p>
                          <select name="category_id" id="">
                                @foreach ($category as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                          </select>
                          <p class="mt-2">Image</p>
                          <input class="mt-3" type="file" name="image"  accept="image/*">
                          <button id="category" class="mt-3 btn rounded-pill text-white border border-white mr-5 px-5" type="submit">add</button>
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6" style="height: 40vh;overflow:scroll;">
                    <table class="table text-white">
                      <thead>
                        <tr>
                          <th>Image</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th class="pe-5">action</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($album as $item)
                        <tr>
                          <th scope="row"><img src="{{ asset($item->image)}}" alt="" width="60" height="60" ></th>
                          <td>{{ $item->name }}</td>
                          <td>{{ $item->category->name}}</td>
                          <td><form class="" action="{{route('album.destroy', $item->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger ">Delete</button>
                            </form>
                          </td>
                          <td><a  class="btn bg-success text-white" data-toggle="modal" data-target="#staticBackdrop{{$item->id}}" href="#" >Modifier</a></td>
                        </tr>
                        {{-- model --}}
                        <div class="modal fade " id="staticBackdrop{{$item->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog my-5 py-5">
                              <div class="modal-content bg-black border border-success my-5">
                                <div class="modal-header">
                                  <h5 class="modal-title text-white" id="staticBackdropLabel">Update Music</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body d-flex">
                                  <form method="POST" action="{{route('album.update',$item->id)}}" class="w-0" style="justify-content:start" enctype="multipart/form-data">
                                      @csrf
                                      @method('PUT')
                                  <img id="image" src="{{asset($item->image)}}" class="col-6 me-auto d-flex" alt="" srcset="">
                                  <div class=" col-6 d-flex flex-column w-75 px-2">
                                    <p class="mt-2">album Title</p>
                                    <input class="my-1 py-1 rounded-3" name="name" id="name" type="text" value="{{$item->name}}">
                                    <p class="mt-2">Category</p>
                                    <select name="category_id" id="">
                                        @foreach ($category as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    <p class="mt-1">Image</p>
                                    <input class="mt-1" type="file" name="image"  accept="image/*">
                                    <div class="mt-2">
                                        <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                  </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  @foreach ($album as $item)
                  <div class="playlist col-6 col-md-3 col-lg-2 d-flex flex-column mb-3 px-2 mt-5">
                      <img class="img-fluid" src="{{ asset($item->image)}}" alt="">
                      <h2 class="mt-3 text-white text-center">{{$item->name}}</h2>
                      <h2 class=" text-gray text-center">{{$item->category->name}}</h2>
                  </div>
                @endforeach
                </div>
              </div>
        </div>
    </div>
</div>

@endsection
