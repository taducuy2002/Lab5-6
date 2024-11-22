

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    
    @section('content')
    
<div class="container">
    <div class="card">
        <div class="card-body">
          
                <h3>Danh sách</h3>
            
            <div class="row">
                <div class="row g-3 gap-3 ml-5">
                
                  @foreach ($posts as $post)
                  <div class="card" style="width: 18rem;">
                    <img src="{{ Storage::url($post->poster) }}" alt="" srcset="" width="100">
                    <div class="card-body">
                      <h5 class="card-title">{{ $post->title}}</h5>
                      <p class="card-text">Giới thiệu phim: {{$post->intro}}</p>
                      <p class="card-text text-danger">Ngày công chiếu: {{ $post->release_date }}</p>
                      <div class="">
                        {{-- <a href="{{route('detail', $post->id)}}" class="btn btn-primary">Chi tiết</a> --}}
                      </div>
                    </div>
                  </div> 
                  @endforeach        
                </div>
        </div>
    </div>
</div>
{{$posts->links()}}
<a href="{{route('movies.index')}}" class="btn btn-primary">Quay lại</a>
</body>
</html>