@extends('admin.layout')

@section('title', 'create moive')
    
@section('content')
    <div class="w-60">
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="">Title</label>
                <input type="text" name="title" class="form-control" value="{{old('title')}}">
                @error('title')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="">Intro</label>
                <input type="text" name="intro" class="form-control" value="{{old('intro')}}">
                @error('intro')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="">Gene</label>
                <select name="gene_id" class="form-control" >
                    <option value="" selected>--Chọn--</option>
                    @foreach ($genes as $gene)
                        <option value="{{$gene->id}}">
                            {{$gene->name}}
                        </option>
                    @endforeach
                </select>
                @error('gene_id')
                <span class="text-danger">{{$message}}</span>
            @enderror
            </div>

            <div class="mb-3">
                <label for="">Poster</label>
                <input type="file" name="poster" class="form-control">
                @error('poster')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="">Release_date</label>
                <input type="date" name="release_date" class="form-control" value="{{old('release_date')}}">
                @error('release_date')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary" >Create New</button>
            </div>
        
        </form>
    </div>
@endsection