@extends('admin.layout')

@section('title', 'User')
    
@section('content')
    <div class="w-60">
        @if (session('message'))
                
        <div class="alert alert-success">
            <span>{{session('message')}}</span>
        </div>
        
    @endif

        <form action="{{route('update_user')}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="">FullName</label>
                <input type="text" name="fullname" class="form-control" value="{{Auth::user()->fullname}}">
                @error('fullname')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="">UserName</label>
                <input type="text" name="username" class="form-control"  value="{{Auth::user()->username}}" >
                @error('username')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="">Email</label>
                <input type="text" name="email" class="form-control" value="{{Auth::user()->email}}">
                @error('email')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="">Avatar</label>
                <input type="file" name="avatar" class="form-control">
                <img src="{{Storage::Url(Auth::user()->avatar)}}" alt="">
                @error('avatar')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-success" >Save</button>
            </div>
        
        </form>
    </div>
@endsection