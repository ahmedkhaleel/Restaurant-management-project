@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">

            @include('management.inc.sidebar')

            <div class=" col-md-8">
                <i class="fas fa-bars"></i>
                    Edit a Menu
                <hr>
                <form action="{{route('menu.update',[$menu->id])}}"  method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Menu Name</label>

                        <input value="{{$menu->name}}" type="text" name="name"  class="form-control @error('name') is-invalid @enderror" >

                        @error('name')
                        <div class="btn text-danger">{{ $message }}</div>
                        @enderror


                    </div>
                    <label for="price" >Price</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input value="{{$menu->price}}" type="text" name="price" class="form-control" aria-label="Amount (to the nearest dollor)" >
                        <div class="input-group-prepend">
                            <span class="input-group-text">.00</span>
                        </div>
                    </div>

                    <label for="MenuImage" >Image</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="inputGroupFile01">
                            <label class="custom-file-label" for="inputGroupFile01">Choose File</label>
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="Description" >Description</label>

                        <input for="Description" type="textarea" class="form-control" name="description" value="{{$menu->description}}">

                    </div>
                    <div class="form-group">
                        <label for="category" >Category</label>
                        <select class="form-control" name="category_id" >


                            @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{$menu->category_id === $category->id ? 'selected' : ''}} >{{$category->name}}</option>
@endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-warning">Edit</button>
                </form>
            </div>

        </div>
    </div>
@endsection
