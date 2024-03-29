@extends('layout')

@section('content')

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
                    {{-- validation --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    {{-- end validation --}}
                                <div class="row">
                                  <div class="col-md-4">
                                    <div class="card d-flex align-items-center justify-content-center bg-black text-white">
                                      <div class="card-body">
                                        <form method="POST" action="{{route('category.store')}}" enctype="multipart/form-data">
                                            @csrf
                                        <h5 class="">Categories Title</h5>
                                        <input class="px-4" type="text" name="name" id="">
                                        <br>
                                        <input class="mt-3" type="file" name="image" id="" accept="image/*">
                                        <br>
                                        <button id="category" class="mt-3 btn rounded-pill text-white border border-white mr-5 px-5" type="submit">add</button>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-8 ">
                                    <table class="table text-white">
                                      <thead>
                                        <tr>
                                          <th>id</th>
                                          <th>image</th>
                                          <th>name</th>
                                          <th class="pe-5" colspan="2">Action</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @foreach ($category as $item)
                                        <tr>
                                          <td>{{$item->id}}</td>
                                          <th scope="row"><img src="{{ asset($item->image)}}" alt="" width="60" height="60" ></th>
                                          <td>{{$item->name}}</td>
                                          <td><a  class="btn bg-success text-white" data-toggle="modal" data-target="#staticBackdrop{{$item->id}}" href="#" >Modifier</a></td>
                                          <td><form class="" action="{{route('category.destroy', $item->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger w-50">Delete</button>
                                            </form>
                                          </td>
                                        </tr>
                                        {{-- Model --}}
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
                                                  <form method="POST" action="{{route('category.update',$item->id)}}" class="w-0" style="justify-content:start" enctype="multipart/form-data">
                                                      @csrf
                                                      @method('PUT')
                                                  <img id="image" src="{{asset($item->image)}}" class="col-6 me-auto d-flex" alt="" srcset="">
                                                  <div class=" col-6 d-flex flex-column w-75 px-2">
                                                    <p class="mt-2">Music Title</p>
                                                    <input class="my-1 py-1 rounded-3" name="name" id="name" type="text" value="{{$item->name}}">
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
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
        @endsection
