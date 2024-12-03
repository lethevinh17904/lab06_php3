@extends('admin.layout')

@section('title', 'Danh sách phim')

@section('content')
    
@session('message')
  <div class="alert alert-success">
      {{session('message')}}
  </div>
@endsession

<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">title</th>
        <th scope="col">poster</th>
        <th scope="col">intro</th>
        <th scope="col">release_date</th>
        <th scope="col">gene_name</th>
        <th scope="col">
            <a href="{{route('moives.create')}}" class="btn btn-primary">Create</a>
        </th>
      </tr>
    </thead>
    <tbody>
        @foreach ($moives as $moive)
        <tr>
            <th scope="row">{{$moive->id}}</th>
            <td>{{$moive->title}}</td>
            <td>
                <img src="{{ Storage::url($moive->poster)  }}" alt="" width="60">
            </td>
            <td>{{$moive->intro}}</td>
            <td>{{$moive->release_date}}</td>
            <td>{{$moive->gene->name}}</td>
            <td>
                <a href="{{route('moives.detail', $moive->id)}}" class="btn btn-success mb-3">Detail</a>
                <a href="{{route('moives.edit', $moive->id)}}" class="btn btn-warning mb-3">Edit</a>
                <form action="{{route('moives.destroy', $moive->id)}}" method="POST">
                  @csrf
                  @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>

          </tr>
        @endforeach
     
     
    </tbody>
  </table>
  {{$moives -> links()}}
@endsection
    