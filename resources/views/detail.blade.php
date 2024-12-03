@extends('admin.layout')

@section('title', 'Trang chi tiet user')
    
@section('content')
    <div class="w-60">
        @if (session('message'))
                
        <div class="alert alert-success">
            <span>{{session('message')}}</span>
        </div>
        
    @endif
        <form action="{{route('detail')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 ">
                <label  class="form-label">FullName:</label>
                <input style="width:400px" type="text" class="form-control border border-info-subtle" value="{{$user->fullname}}"  name="fullname" disabled>
                <p>
                    @error('fullname')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </p>
            </div>
            <div class="mb-3 ">
                <label  class="form-label">UserName :</label>
                <input style="width:400px" type="text" class="form-control border border-info-subtle" value="{{$user->username}}" name="username" disabled >
                <p>
                    @error('username')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </p>
            </div>
            <div class="mb-3 ">
                <label  class="form-label">Email:</label>
                <input style="width:400px" type="email" class="form-control border border-info-subtle" value="{{$user->email}}" name="email" disabled >
                <p>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </p>
            </div>
            <div class="mb-3 ">
                <label  class="form-label">Role:</label>
                <input style="width:400px" type="text" class="form-control border border-info-subtle" value="{{$user->role}}" name="role" disabled placeholder="Enter role">
                <p>
                    @error('role')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </p>
            </div>

            <div class="mb-3">
                <a href="{{route('update_user')}}" class="btn btn-primary" > Update User </a>
                <a href="{{route('update_password')}}" class="btn btn-danger" > Update Password</a>
                
            </div>

        </form>
    </div>
@endsection