<x-layout :pageTitle="$pageTitle">
<div class="container shadow d-flex justify-content-center mb-4 p-5 border col-sm ">
    <form action="/bookmarks" method="POST" autocomplete="off">
        @csrf
        <!-- TITLE -->
        <div class="input-group mb-1 mr-sm-1">
            <input type="text" class="form-control" name="name" placeholder="Title" value="{{old('name')}}" required>
        </div>
        @error('name')
            <p class="txt-red">{{$message}}</p>
        @enderror

        <!-- ALTERNATE TITLES CSV -->
        <div class="input-group mb-1 mr-sm-1">
            <input type="text" class="form-control" name="alt_names" placeholder="Alt. names (saperate by comma)" value="{{old('alt_names')}}">
        </div>
        @error('alt_names')
            <p class="txt-red">{{$message}}</p>
        @enderror

        <!-- LINK -->
        <div class="input-group mb-1 mr-sm-1">
            <input type="url" class="form-control" id="link" name="link" placeholder="https://" value="{{old('link')}}">
        </div>
        @error('link')
            <p class="txt-red">{{$message}}</p>
        @enderror

        <!-- CATEGORIES -->
        <div class="input-group mb-1 mr-sm-1">
            <select class="form-control" name="category_id">
                <x-form-select-options :options="$categories" show="category" />
            </select>
        </div>
        @error('category_id')
            <p class="txt-red">{{$message}}</p>
        @enderror

        <!-- CURRENT & lATEST CHAPTER -->
        <div class="input-group mb-1 mr-sm-1">
            <input type="number" class="form-control" step="0.1" name="current" placeholder="Current" value="0" required>
        </div>
        @error('current')
            <p class="txt-red">{{$message}}</p>
        @enderror
        <div class="input-group mb-1 mr-sm-1">
            <input type="number" class="form-control" step="0.1" name="latest" placeholder="Latest" value="1" required>
        </div>
        @error('latest')
            <p class="txt-red">{{$message}}</p>
        @enderror

        <!-- STATUS -->
        <div class="input-group mb-1 mr-sm-1">
            <select class="form-control" name="status_id">
                <x-form-select-options :options="$status_list" show="status" />
            </select>
        </div>
        @error('status_id')
            <p class="txt-red">{{$message}}</p>
        @enderror

        <!-- READ STATUS -->
        <div class="input-group mb-1 mr-sm-1">
            <select class="form-control" name="read_status_id">
                <x-form-select-options :options="$read_status_list" show="read_status" />
            </select>
        </div>
        @error('read_status_id')
            <p class="txt-red">{{$message}}</p>
        @enderror

        <button type="submit" name="submit" class="btn btn-danger mb-1">SUBMIT</button>
        <a href="/" name="home" class="btn btn-secondary mb-1">HOME</a>
    </form>
</div>
<br>
</x-layout>