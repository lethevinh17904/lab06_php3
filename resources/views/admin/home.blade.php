@extends('admin.layout')

@section('title', 'Login')



@section('content')
<div class="card-header">
    <h3>Danh sách user</h3>
</div>
    <div class="card-body">
        @if (session('message'))
            
        <div class="alert alert-success">
            <span class="">{{session('message')}}</span>
        </div>
        
    @endif
    @if (session('error'))
            
    <div class="alert alert-danger">
        <span class="">{{session('error')}}</span>
    </div>
    
@endif
 <table class="table">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Fullname</th>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col">Avatar</th>
        <th scope="col">Active</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($user as $user)
        <tr>
            <th scope="row">{{$user -> id}}</th>
             <td>{{$user -> fullname}}</td>
             <td>{{$user -> username}}</td>
             <td>{{$user -> email}}</td>
             <td>{{$user -> role}}</td>
             <td>  <img src="{{Storage::Url($user -> avatar)}}" class="w-25" alt=""></td>
             <td>
                <form action="{{ route('user.updateStatus', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @if($user->active == 1)
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn ban người dùng này?')">
                            Ban
                        </button>
                    @else
                        <button type="submit" class="btn btn-success" onclick="return confirm('Bạn có chắc muốn mở khóa người dùng này?')">
                            Unban
                        </button>
                    @endif
                </form>
            </td>
            
           </tr> 
        @endforeach
     
     
     
    
    </tbody>
  </table>
@endsection
