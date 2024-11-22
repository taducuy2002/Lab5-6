@extends('Admin.layout')

@section('title', $post->title)

@section('content')

<div>
        <div class="card">
            <div class="card-body">
            <div>
                <h3>Tiêu đề phim: {{ $post->title }}</h3>
                <div class="d-flex"><h3>Hình ảnh: </h3> <img src="{{ Storage::url($post->poster)}}" alt="{{ $post->title}}" width="100"></div>
                <div class="d-flex">
                    <h3>Giới thiệu phim:  {{ $post->intro }}</h3>
                </div>
                <div class="d-flex" >
                    <h3>Ngày công chiếu:{{ $post->release_date }}</h3>
                </div>
                <div class="d-flex">
                    <h3>Thể loại: {{ $post->name }}</h3>
                </div>
             </div>
        </div>
    </div>
    <a href="{{route('movies.index')}}" class="btn btn-primary">Quay lại</a>
</div>

@endsection