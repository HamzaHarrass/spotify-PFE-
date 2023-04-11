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
                                <div class="row">
                                  <div class="col-md-6">
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
                                  <div class="col-md-6 ">
                                    <table class="table text-white">
                                      <thead>
                                        <tr>
                                          <th>id</th>
                                          <th>image</th>
                                          <th>name</th>
                                          <th></th>
                                          <th class="pe-5">delete</th>
                                          <th></th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @foreach ($category as $item)
                                        <tr>
                                          <td>{{$item->id}}</td>
                                          <th scope="row"><img src="{{ asset($item->image)}}" alt="" width="60" height="60" ></th>
                                          <td>{{$item->name}}</td>
                                          <td></td>
                                          <td><form class="btn btn-danger btn-sm" action="{{route('category.destroy', $item->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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
        @endsection
