@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">

            @include('management.inc.sidebar')

            <div class=" col-md-8">
                <i class="fas fa-user"></i>
                Users
                <a href="{{route('user.create')}}" class="btn btn-success btn-sm text-white float-right" ><i class="fas fa-plus"></i> Create User</a>
                <hr>
                @if (session()->has('delete'))
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">X</button>
                        {{session()->get('delete')}}
                    </div>
                @endif
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
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody >
                    @foreach ($users as $key=>$user)
                        <tr class="text-center">
                            <td >{{($key+1)}}</td>
                            <td >{{$user->name}}</td>
                            <td >{{$user->email}}</td>
                            <td >{{$user->role}}</td>
                            <td ><a href="{{route('user.edit',[$user->id])}}" class="btn btn-warning">Edit</a></td>
                            <td >
                                <form action="{{route('user.destroy',[$user->id])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </form></td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
                {{$users->appends($_GET)->links()}}
            </div>

        </div>

    </div>
@endsection
