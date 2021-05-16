@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">

            @include('management.inc.sidebar')

            <div class=" col-md-8">
                <i class="fas fa-chair"></i>
                Edit Table
                <hr>
                <form action="{{route('table.update',[$table->id])}}"  method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                    <label for="categoryName">Table Name</label>
                    <input type="text" name="name"  class="form-control @error('name') is-invalid @enderror"  value="{{$table->name}}">
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
