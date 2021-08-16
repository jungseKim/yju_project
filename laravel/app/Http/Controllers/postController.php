<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class postController extends Controller
{


    public function show($id)
    {
        //유저이름 같이 보내주기 
        //longbe 머시기 사용하기
        return Post::find($id);
    }

    public function posts()
    {
        return Post::all();
    }
    public function store(Request $request)
    {
        //public 에 저장하고 싶으면 링크를 걸어 주어야함
        // return $request->file;
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'file' => 'image'
        ]);



        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = $request->user_id;

        if ($request->file('file')) {
            $post->img = $this->uploadPostImage($request);
        } else {
            $post->img = 'noimage.jpg';
        }

        $post->save();
        return $post;
    }
    protected function uploadPostImage(Request $request)
    {
        $name = $request->file('file')->getClientOriginalName();

        $extension = $request->file('file')->extension();
        $originalName = Str::of($name)->basename('.' . $extension);

        $fileName = $originalName . '_' . time() . '.' . $extension;
        // dd($fileName);

        $request->file('file')->storeAs('public/image', $fileName);
        return $fileName;
    }
}
