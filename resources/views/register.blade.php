@extends('admin.layout')
@section('title', 'Đăng ký')
    
@section('content')
    <div class="container">
        <h2>Đăng Ký</h2>

        <form action="{{route('register')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="" class="form-label">Full Name</label>
                <input type="text" name="fullname" class="form-control">
            </div>
            @error('fullname')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="mb-3">
                <label for="" class="form-label">User Name</label>
                <input type="text" name="username" class="form-control">
            </div>
            @error('username')
                <span class="text-danger">{{ $message }}</span>
            @enderror


            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="text" name="email" class="form-control">
            </div>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="mb-3">
                <label for="" class="form-label">Avatar</label>
                <input type="file" name="avatar" class="form-control">
            </div>
            @error('avatar')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="mb-3">
                <label for="" class="form-label">Mật khẩu</label>
                <input type="password" name="password" class="form-control">
            </div>
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            
            <div class="mb-3">
                <label for="" class="form-label">Nhập lại Mật khẩu</label>
                <input type="password" name="password_confirm" class="form-control">
            </div>
            @error('password_confirm')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <button  type="submit" class="btn btn-primary">Đăng ký</button>
        </form>
    </div>
@endsection