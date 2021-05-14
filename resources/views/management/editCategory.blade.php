@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">

            @include('management.inc.sidebar')

            <div class=" col-md-8">
                <i class="fas fa-bars"></i>
                Edit Category
                <hr>
                <form action="{{route('category.update',$category->id)}}"  method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                    <label for="categoryName">Category Name</label>
                    <input type="text" name="name"  class="form-control @error('name') is-invalid @enderror"  value="{{$category->name}}">
                        @error('name')
                        <div class="btn text-danger">{{ $message }}</div>
                        @enderror

                    </div>
                    <button type="submit" class="btn btn-outline-success">Update</button>
                </form>
            </div>

        </div>
    </div>
@endsection
