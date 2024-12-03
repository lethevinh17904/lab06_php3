@extends('admin.layout')

@section('title', 'create moive')
    
@section('content')
    <div class="w-60">
        @session('message')
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endsession

        <form action="{{route('moives.detail',$moive->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="">Title</label>
                <input type="text" name="title" class="form-control" value="{{$moive->title}}" disabled >
            
            </div>

            <div class="mb-3">
                <label for="">Intro</label>
                <input type="text" name="intro" class="form-control" value="{{$moive->intro}}" disabled>
             
            </div>

            <div class="mb-3">
                <label for="">Gene</label>
                <select name="gene_id" class="form-control" >
                    @foreach ($genes as $gene)
                        <option value="{{$gene->id}}" disabled
                            @selected($gene->id === $moive->gene_id )
                            >
                            {{$gene->name}}
                        </option>
                    
                    @endforeach
                </select>
              
            </div>

            <div class="mb-3">
                <label for="">Poster</label>
                <input type="file" name="poster" class="form-control" disabled >
                <img src="{{ Storage::url($moive->poster) }}" alt="" width="60">
               
            </div>

            <div class="mb-3">
                <label for="">Release_date</label>
                <input type="date" name="release_date" class="form-control" value="{{\Carbon\Carbon::parse($moive->release_date)->format('Y-m-d')}}" disabled>
                
            </div>

            <div class="mb-3">
                <a href="{{route('moives.index')}}" class="btn btn-warning">Quay lại</a>
            </div>
        
        </form>
    </div>
@endsection