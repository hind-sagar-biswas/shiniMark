<x-layout :pageTitle="$pageTitle">
<div class="container shadow d-flex justify-content-center mb-4 p-5 border col-sm ">
    <form action="/users" method="POST" autocomplete="off">
        @csrf
        <!-- Name -->
        <div class="input-group mb-1 mr-sm-1">
            <input type="text" class="form-control" name="name" placeholder="Name" value="{{old('name')}}" required>
        </div>
        @error('name')
            <p class="text-danger">{{$message}}</p>
        @enderror

        <!-- USERNAME -->
        <div class="input-group mb-1 mr-sm-1">
            <input type="text" class="form-control" name="username" placeholder="username" value="{{old('username')}}" required>
        </div>
        @error('username')
            <p class="text-danger">{{$message}}</p>
        @enderror
        
        <!-- EMAIL -->
        <div class="input-group mb-1 mr-sm-1">
            <input type="email" class="form-control" name="email" placeholder="yourmail@domain.com" value="{{old('email')}}" required>
        </div>
        @error('email')
            <p class="text-danger">{{$message}}</p>
        @enderror

        <!-- PASSWORD -->
        <div class="input-group mb-1 mr-sm-1">
            <input type="password" class="form-control" name="password" placeholder="password" value="{{old('password')}}" required>
        </div>
        @error('password')
            <p class="text-danger">{{$message}}</p>
        @enderror

        <!-- CONFIRM PASSWORD -->
        <div class="input-group mb-1 mr-sm-1">
            <input type="password" class="form-control" name="password_confirmation" placeholder="password_confirmation" value="{{old('password_confirmation')}}" required>
        </div>
        @error('password_confirmation')
            <p class="text-danger">{{$message}}</p>
        @enderror

        <button type="submit" name="submit" class="btn btn-danger mb-1">REGISTER</button>
        <a href="/login" name="home" class="btn btn-secondary mb-1">LOGIN</a>
    </form>
</div>
<br>
</x-layout>