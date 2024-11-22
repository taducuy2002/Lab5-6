@extends('Admin.layout')

@section('title', 'Cập nhật')

@section('content')

@session('message')
    <div class="alert alert-success">
        {{session('message')}}
    </div>
@endsession

<div class="card">
    <div class="card-body">
        <form action="{{ route('movies.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        <div class="mb-3">
            <label for="" class="form-control">Tiêu đề phim</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') ?? $post->title }}">
            @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-control">Hình ảnh áp phích</label>
            <img src="{{ Storage::url($post->poster) }}" alt="" srcset="" width="100">
            <input type="file" name="poster" class="form-control">
            @error('poster')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-control">Giới thiệu phim</label>
            <input type="text" name="intro" class="form-control" value="{{ old('intro') ?? $post->intro }}">
            @error('intro')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-control">Ngày công chiếu</label>
            <input type="datetime-local" name="release_date" class="form-control" value="{{ old('release_date') ?? $post->release_date }}">
            @error('release_date')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-control">Loại phim</label>
            <select name="genre_id" id="" class="form-select">
                @foreach ($genes as $gene )
                <option value="{{$gene->id}}" @selected($gene->id === $post->genre_id)>{{$gene->name}}</option>
                @endforeach
            </select>
            
        </div>

        <button type="submit" class="btn btn-success">Cập nhật</button>
        </form>
        <a href="{{ route('movies.index')}}" class="btn btn-primary">Quay lại</a>
    </div>
</div>

@endsection