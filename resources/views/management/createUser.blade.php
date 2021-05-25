@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">

            @include('management.inc.sidebar')

            <div class=" col-md-8">
                <i class="fas fa-user"></i>
                Create a User
                <hr>
                <form action="{{route('user.store')}}"  method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="form-group">
                    <label for="name">User Name</label>

                            <input type="text" name="name"  class="form-control @error('name') is-invalid @enderror" placeholder="Menu Name ....  ....">

                        @error('name')
                        <div class="btn text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">User Email</label>

                        <input type="email" name="email"  class="form-control @error('email') is-invalid @enderror" placeholder="email ....  ....">

                        @error('email')
                        <div class="btn text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Password</label>

                        <input type="password" name="password"  class="form-control @error('password') is-invalid @enderror" placeholder="Password .... ....">

                        @error('password')
                        <div class="btn text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Roles</label>

                        <select name="role" class="form-control">
                            <option value="Admin">Admin</option>
                            <option value="cashier">cashier</option>
                        </select>

                        @error('role')
                        <div class="btn text-danger">{{ $message }}</div>
                        @enderror
                    </div>







                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>

        </div>
    </div>
@endsection
