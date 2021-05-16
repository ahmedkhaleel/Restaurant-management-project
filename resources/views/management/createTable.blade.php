@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">

            @include('management.inc.sidebar')

            <div class=" col-md-8">
                <i class="fas fa-chair"></i>
                Create Table
                <hr>
                <form action="{{route('table.store')}}"  method="POST">
                    @csrf
                    @method('post')
                    <div class="form-group">
                        <label for="categoryName">Table Name</label>
                        <input type="text" name="name"  class="form-control @error('name') is-invalid @enderror" placeholder="table name ....">
                        @error('name')
                        <div class="btn text-danger">{{ $message }}</div>
                        @enderror

                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>

        </div>
    </div>
@endsection
