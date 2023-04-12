@extends('layout')

@section('content')
<ul id="filters" class="d-flex justify-content-center flex-wrap px-2 pt-4 mb-0 text-uppercase">
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
<!-- /Music -->
<div id="recent" class="d-flex flex-column pl-3 pr-1">
    <h1 class="pl-2 text-white">Add Music</h1>
    <div class="playlist_row container-fluid d-flex my-4">
        <div class="row w-100">
            <div class="container-fluid">
                <div class="row">
                  <div class="col-md-6">
                    <div class="card d-flex align-items-center justify-content-center bg-black text-white">
                      <div class="card-body">
                        <form method="POST" action="{{route('music.store')}}" enctype="multipart/form-data">
                            @csrf
                        <h5 class="">Music Title</h5>
                        <input class="px-4" type="text" name="name" id="">
                        <p class="mt-2">Category</p>
                          <select name="category_id" id="">
                                @foreach ($category as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                          </select>
                          <p class="mt-2">Image</p>
                          <input class="mt-3" type="file" name="image"  accept="image/*">
                          <p class="mt-2">Music</p>
                          <input type="file" name="audio">
                          <button id="category" class="mt-3 btn rounded-pill text-white border border-white mr-5 px-5" type="submit">add</button>
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 ">
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
                        @foreach ($music as $item)
                        <tr>
                          <th scope="row"><img src="{{ asset($item->image)}}" alt="" width="60" height="60" ></th>
                          <td>{{ $item->name }}</td>
                          <td>{{ $item->category->name}}</td>
                          <td><a class="btn  bg-danger  text-white" href="#">delete</a></td>
                          <td><a  class="btn bg-success text-white" data-toggle="modal" data-target="#staticBackdrop{{$item->id}}" href="#" >Modifier</a></td>
                        </tr>
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
                                  <form method="POST" action="" class="w-0" style="justify-content:start" enctype="multipart/form-data">
                                      @csrf
                                      @method('PUT')
                                  <img id="image" src="{{asset($item->image)}}" class="col-6 w-25 me-auto d-flex" alt="" srcset="">
                                  <div class=" col-6 d-flex flex-column w-75 px-2">
                                    <p class="mt-2">Music Title</p>
                                    <input class="my-1 py-1 rounded-3" id="name" type="text" value="{{$item->name}}">
                                    <p class="mt-2">Category</p>
                                        <select name="category_id" id="">
                                                @foreach ($category as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach
                                        </select>
                                    <p class="mt-2">Image</p>
                                    <input class="mt-3" type="file" name="image"  accept="image/*">
                                    <p class="mt-2">Music</p>
                                    <input type="file" name="audio">
                                  </div>
                                  </form>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="button" class="btn btn-primary">Update</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
        </div>
    </div>
</div>

{{-- modal --}}

@endsection
