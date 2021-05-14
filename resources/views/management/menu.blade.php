@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">

        @include('management.inc.sidebar')

            <div class=" col-md-8">
                <i class="fas fa-hamburger"></i>
                 Menus
                <a href="{{route('category.create')}}" class="btn btn-success btn-sm text-white float-right" ><i class="fas fa-plus"></i> Create Menu</a>
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


                    </tbody>

                </table>

            </div>

    </div>

</div>
@endsection
