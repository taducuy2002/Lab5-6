<?php

namespace App\Http\Controllers;
use App\Models\Genes;
use App\Http\Requests\StoreRequest;
use App\Http\Requests\StartRequest;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    public function index() {
        $posts = DB::table('movies')->join('genes', 'genre_id', '=', 'genes.id')->select('movies.*', 'name')->paginate(5);
        return view('Admin.index', compact('posts'));
    }
    public function create () {
        $genes = Genes::all();
        return view('Admin.add', compact('genes'));
    }

    public function store (StoreRequest $request) {
     $data = $request->except('poster');

     if($request->hasFile('poster')) {
        $path_image = $request->file('poster')->store('images', 'public');
        $data['poster'] = $path_image;
     }
     Movie::query()->create($data);
     return redirect()->route('movies.index')->with('message', 'Thêm dữ liệu thành công');
    }


    public function destroy ($id) {
        $post = DB::table('movies')->find($id);
        DB::table('movies')->where('id', $id)->delete();
        return redirect()->route('movies.index', $post->genre_id);
}

public function search(Request $request) {
    $query = $request->input('query');
    $genes = DB::table('genes')->get();

    $posts = DB::table('movies')
        ->join('genes', 'movies.genre_id', '=', 'genes.id')
        ->select('movies.*', 'genes.name')
        ->where('movies.title', 'LIKE', "%{$query}%") 
        ->orWhere('movies.intro', 'LIKE', "%{$query}%") 
        ->paginate(50);

    return view('Admin.list-movie', compact('posts', 'genes'));
}


public function edit($id) {
    $post = Movie::query()->find($id);
    $genes = Genes::all();
    return view('Admin.edit', compact('post','genes'));
}


public function update (Request $request, $id) {
    $post = Movie::query()->find($id);

    $data = $request->validate(
        [
       'title' => ['required', 'min:6', 'unique:movies,title,'. $post->id], 
        'poster' => ['nullable', 'image', 'max:2048'], 
        'intro' => ['required', 'min:6'],
        'release_date' => ['required', 'date', 'after_or_equal:' . now()->toDateString()],
        ],
        [
        'title.required' => 'Bạn phải nhập title.',
        'title.min' => 'Title phải có ít nhất 6 ký tự.',
        'poster.image' => 'Poster phải là một hình ảnh.',
        'poster.max' => 'Poster không được vượt quá 2MB.',
        'intro.required' => 'Bạn phải nhập phần giới thiệu.',
        'intro.min' => 'Phần giới thiệu phải có ít nhất 6 ký tự.',
        'release_date.required' => 'Bạn phải nhập ngày công chiếu.',
        'release_date.date' => 'Ngày công chiếu phải là một ngày hợp lệ.',
        'release_date.after_or_equal' => 'Ngày công chiếu không được nhỏ hơn ngày hiện tại.',
        ]
);
    $data = $request->except('poster');
    if($request->hasFile('poster')) {
       $path_image = $request->file('poster')->store('images', 'public');
       $data['poster'] = $path_image;
    }
    $post -> update($data);
    return redirect()->back()->with('message', 'Cập nhật thành công');
   }

   public function detail($id) {
    $post = DB::table('movies')
              ->join('genes', 'movies.genre_id', '=', 'genes.id')
              ->select('movies.*', 'genes.name as name')
              ->where('movies.id', $id)
              ->first();
    if ($post == null) {
        return abort(404); 
    }
    $genes = DB::table('genes')->get();
    return view('Admin.detail', compact('post', 'genes'));
}

}