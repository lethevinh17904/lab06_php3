@extends('admin.layout')

@section('title', 'Password')
    
@section('content')
    <div class="w-60">
        @if (session('message'))
                
        <div class="alert alert-success">
            <span>{{session('message')}}</span>
        </div>
        
    @endif

        <form action="{{route('update_password')}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="">Mật khẩu cũ</label>
                <input type="password" name="current_password" class="form-control">
                @error('current_password')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="">Mật khẩu mới</label>
                <input type="password" name="new_password" class="form-control">
                @error('new_password')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="">Xác nhận mật khẩu mới</label>
                <input type="password" name="new_password_confirmation" class="form-control">
                @error('new_password_confirmation')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-success" >Save</button>
            </div>
        
        </form>
    </div>
@endsection