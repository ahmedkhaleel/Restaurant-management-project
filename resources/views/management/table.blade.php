@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">

            @include('management.inc.sidebar')

            <div class=" col-md-8">
                <i class="fas fa-chair"></i>
                Table
                <a href="{{route('table.create')}}" class="btn btn-success btn-sm text-white float-right" ><i class="fas fa-plus"></i>  Create Table</a>
                <hr>

                @if (session()->has('status'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">X</button>
                     {{session()->get('status')}}
                    </div>
                @elseif(session()->has('statusDelete'))
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">X</button>
                        {{session()->get('statusDelete')}}
                    </div>
                @endif
                <table class="table table-bordered">
                    <thead>
                    <tr class="text-center">
                        <th scope="col">ID</th>
                        <th scope="col">Table</th>
                        <th scope="col">Status</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody >
                    @foreach (\App\Models\Table::all() as $key =>$table)
                    <tr class="text-center">
                        <td>{{$key + 1}}</td>
                        <td>{{$table->name}}</td>
                        <td>{{$table->status}}</td>
                        <td><a class="btn btn-warning" href="{{route('table.edit',[$table->id])}}">Edit</a></td>
                        <td>
                            <form action="{{route('table.destroy',[$table->id])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="Delete" >
                            </form>
                        </td>
                    </tr>
@endforeach
                    </tbody>

                </table>

            </div>

    </div>

</div>
@endsection
