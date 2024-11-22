@extends('Admin.layout')

@section('title', 'Trang admin')

@section('content')

@session('message')
    <div class="alert alert-success">
        {{session('message')}}
    </div>
@endsession
<div class="card">
    <div class="card-body">
        <a href="{{ route('movies.create')}}" class="btn btn-success float-end">Thêm mới</a>
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Tiêu đề phim</th>
                <th>Hình ảnh áp phích</th>
                <th>Giới thiệu phim</th>
                <th>Ngày công chiếu</th>
                <th>Thể loại phim</th>
                <th>Thao tác</th>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>
                            <img src="{{ Storage::url($post->poster) }}" alt="" srcset="" width="100">
                        </td>
                        <td>{{ $post->intro }}</td>
                        <td>{{ $post->release_date }}</td>
                        <td>{{ $post->name }}</td>
                        <td>
                            <form action="{{ route('movies.destroy', $post->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn chắc chắn xóa')">Delete</button>
                            </form>
                            <a href="{{ route('movies.edit', $post->id)}}" class="btn btn-warning">Sửa</a>
                            <a href="{{ route('movies.detail', $post->id)}}" class="btn btn-success">Chi tiết</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$posts->links()}}
    </div>
</div>


@endsection