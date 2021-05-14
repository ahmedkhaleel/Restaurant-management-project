@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">

            @include('management.inc.sidebar')

            <div class=" col-md-8">
                <i class="fas fa-bars"></i>
                 Category
                <a href="{{route('category.create')}}" class="btn btn-success btn-sm text-white float-right" ><i class="fas fa-plus"></i>  Create Category</a>
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
                        <th scope="col">Category</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody >

                    @foreach ($categories as $category)
                    <tr class="text-center">
                        <th scope="row">{{$category->id}}</th>
                        <th scope="row">{{$category->name}}</th>
                        <th scope="row"><a href="{{route('category.edit',[$category->id])}}" class="btn btn-success">Edit</a></th>
                        <th scope="row">
                            <form action="{{route('category.destroy',[$category->id])}}"  method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Deletpe" class="btn btn-danger">
                             </form>
                        </th>
                    </tr>

                        @endforeach
                    </tbody>

                </table>
                {!! $categories->links() !!}
            </div>

    </div>

</div>
@endsection
