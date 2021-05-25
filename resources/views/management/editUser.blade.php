@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">

            @include('management.inc.sidebar')

            <div class=" col-md-8">
                <i class="fas fa-user"></i>
                Edita User
                <hr>
                <form action="{{route('user.update',[$user->id])}}"  method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                    <label for="name">User Name</label>

                            <input type="text" name="name"  class="form-control @error('name') is-invalid @enderror"  value="{{$user->name}}">

                        @error('name')
                        <div class="btn text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">User Email</label>

                        <input type="email" name="email"  class="form-control @error('email') is-invalid @enderror"  value="{{$user->email}}">

                        @error('email')
                        <div class="btn text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Password</label>

                        <input type="password" name="password"  class="form-control @error('password') is-invalid @enderror" value="{{$user->password}}">

                        @error('password')
                        <div class="btn text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="role">Roles</label>

                        <select name="role" class="form-control">
                            <option value="admin" {{$user->role == 'admin' ? 'selected':'' }}>Admin</option>
                            <option value="cashier" {{$user->role == 'cashier' ? 'selected':'' }}>cashier</option>
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
