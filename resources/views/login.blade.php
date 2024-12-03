@extends('admin.layout')
@section('title', 'Đăng Nhập')
    
@section('content')
    <div class="container">
        <h2>Đăng Nhập</h2>
        @if ($errors->any())
            <div class="mb-3">
                @foreach ($errors->all() as $error)
                    <div>
                        <span class="text-danger">{{ $error }}</span>
                    </div>
                @endforeach
            </div>
        @endif

            @session('message')
                <div class="alert alert success">
                    {{session('message')}}
                </div>
            @endsession

        <form action="{{route('login')}}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="text" name="email" class="form-control" value="{{old('email')}}">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Mật khẩu</label>
                <input type="password" name="password" class="form-control">
            </div>

            <button  type="submit" class="btn btn-primary">Đăng nhập</button>
            <a href="{{route('register')}}" class="btn btn-primary">Đăng ký</a>
        </form>
    </div>
@endsection