@extends('layout')

@section('content')

<div class="col-12 sf-playlist mt-5 text-white">
    <div class="row">
        <div class="col-2">
            <img src="" class="img-fluid"/>
        </div>
        <div class="col-10">
            <h2 class="title">Helping Hands...Live & Acoustic At The Masonic</h2>
        </div>
    </div>
    <br/>

    <div class="row">
        <div class="col-12 w-100 d-flex justify-content-center" style="">
            <div style="height: 300px; overflow: auto">
                <table class="table text-white">
                    <thead>
                        <th>#</th>
                        <th colspan="2">image</th>
                        <th colspan="3">name</th>
                        <th colspan="3">category</th>
                        <th colspan="5">action</th>
                    </thead>
                    <tbody>
                        @foreach ($music as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td colspan="3">
                                <img src="{{asset($item->image)}}" alt="" width="50" srcset="">
                            </td>
                            <td>
                                <span class="fa fa-heart-o"></span>
                            </td>
                            <td>{{$item->name}}</td>
                            <td>{{ $item->category->name}}</td>
                            <td></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
