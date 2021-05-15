@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">

        @include('management.inc.sidebar')

            <div class=" col-md-8">
                <i class="fas fa-hamburger"></i>
                 Menus
                <a href="{{route('menu.create')}}" class="btn btn-success btn-sm text-white float-right" ><i class="fas fa-plus"></i> Create Menu</a>
                <hr>

                @if (session()->has('status'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">X</button>
                     {{session()->get('status')}}
                    </div>
                @endif
                <table class="table table-bordered">
                    <thead>
                    <tr class="text-center">
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Category</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody >
                    @foreach (\App\Models\Menu::all() as $key=>$menu)
                    <tr class="text-center">
                        <td >{{$key+1}}</td>
                        <td >{{$menu->name}}</td>
                        <td >
                            <img class="img-thumbnail" src="{{asset('menu_images/'.$menu->image)}}"  width="120px" height="120px" />
                        </td>
                        <td >{{$menu->description}}</td>
                        <td >{{$menu->price}}</td>
                        <td >{{$menu->category->name}}</td>
                        <td ><a href="{{route('menu.edit',[$menu->id])}}" class="btn btn-warning">Edit</a></td>
                        <td >
                            <form action="{{route('menu.destroy',[$menu->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form></td>
                    </tr>
                    @endforeach
                    </tbody>

                </table>

            </div>

    </div>

</div>
@endsection
