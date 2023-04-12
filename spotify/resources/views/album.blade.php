@extends('layout')

@section('content')

<ul id="Album" class="d-flex justify-content-center flex-wrap px-2 pt-4 mb-0 text-uppercase">
    <li class="mb-5 mr-4">
        <a class="position-relative" href="#">Music</a>
    </li>
    <li class="mb-5 mr-4">
        <a href="#">Albums</a>
    </li>
    <li class="mb-5 mr-4">
        <a href="#">Artists</a>
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
                          <td>{{ $item->category}}</td>
                          <td><a class="btn  bg-danger  text-white" href="#">delete</a></td>
                          <td><a  class="btn bg-success text-white"  href="#" >Modifier</a></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  @foreach ($album as $item)
                  <div class="playlist col-6 col-md-3 col-lg-2 d-flex flex-column mb-3 px-2 mt-5">
                      <img class="img-fluid" src="{{ asset($item->image)}}" alt="">
                      <h2 class="mt-3 text-white text-center">{{$item->name}}</h2>
                      <h2 class="mt-3 text-white text-center">{{$item->category}}</h2>
                  </div>
                @endforeach
                </div>
              </div>
        </div>
    </div>
</div>

@endsection
