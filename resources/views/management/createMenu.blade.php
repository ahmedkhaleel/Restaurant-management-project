@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">

            @include('management.inc.sidebar')

            <div class=" col-md-8">
                <i class="fas fa-bars"></i>
                Create a Menu
                <hr>
                <form action="{{route('category.store')}}"  method="POST">
                    @csrf
                    @method('post')
                    <div class="form-group">
                    <label for="MenuName">Menu Name</label>

                            <input type="text" name="MenuName"  class="form-control @error('MenuName') is-invalid @enderror" placeholder="Menu Name ....  ....">

                        @error('MenuName')
                        <div class="btn text-danger">{{ $message }}</div>
                        @enderror


                    </div>
                    <label for="menuPrice" >Price</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="text" name="price" class="form-control" aria-label="Amount (to the nearest dollor)">
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

                            <input for="Description" type="textarea" class="form-control" name="description"placeholder="Description....">

                    </div>
<div class="form-group">
    <label for="category" >Category</label>
    <select class="form-control" name="category_id" >
        @foreach(\App\Models\Category::all() as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
</div>

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>

        </div>
    </div>
@endsection
