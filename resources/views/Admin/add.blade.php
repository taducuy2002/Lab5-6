@extends('Admin.layout')

@section('title', 'Thêm mới')

@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="mb-3">
            <label for="" class="form-control">Tiêu đề phim</label>
            <input type="text" name="title" class="form-control">
            @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-control">Hình ảnh áp phích</label>
            <input type="file" name="poster" class="form-control">
            @error('poster')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-control">Giới thiệu phim</label>
            <input type="text" name="intro" class="form-control">
            @error('intro')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-control">Ngày công chiếu</label>
            <input type="date" name="release_date" class="form-control">
            @error('release_date')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-control">Loại phim</label>
            <select name="genre_id" id="" class="form-select">
                @foreach ($genes as $gene )
                <option value="{{$gene->id}}">{{$gene->name}}</option>
                @endforeach
            </select>
            
        </div>

        <button type="submit" class="btn btn-success">Thêm mới</button>
        </form>
    </div>
</div>

@endsection