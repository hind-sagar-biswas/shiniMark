<x-layout :pageTitle="$pageTitle">
<div class="container shadow d-flex justify-content-center mb-4 p-5 border col-sm ">
    <form action="/users/authenticate" method="POST" autocomplete="off">
        @csrf

        <!-- USERNAME -->
        <div class="input-group mb-1 mr-sm-1">
            <input type="text" class="form-control" name="username" placeholder="username" value="{{old('username')}}" required>
        </div>
        @error('username')
            <p class="text-danger">{{$message}}</p>
        @enderror

        <!-- PASSWORD -->
        <div class="input-group mb-1 mr-sm-1">
            <input type="password" class="form-control" name="password" placeholder="password" value="{{old('password')}}" required>
        </div>
        @error('password')
            <p class="text-danger">{{$message}}</p>
        @enderror

        <div class="form-group mb-3">
            <label for="remember">Remember me</label>
            <input type="checkbox" name="remember" value="1">
        </div>
        <button type="submit" name="submit" class="btn btn-danger mb-1">LOGIN</button>
    </form>
</div>
<br>
</x-layout>