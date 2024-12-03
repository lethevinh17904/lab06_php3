@extends('admin.layout');

@section('title', 'Trang chu')
    
@section('content')
    <div>
        @foreach ($moive as $moive)
            <div>
                <a href="#">
                    <h3>{{$moive->title}}</h3>
                </a>
                <p>{{$moive->poster}}</p>
                <p>{{$moive->intro}}</p>
               
                
            </div>
        @endforeach
    </div>
@endsection