<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Item;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use SebastianBergmann\Environment\Console;

class postController extends Controller
{

    public function dongs(Request $request)
    {
        $userId = $request->userId;


        $count = DB::table('items')->where('user_id', $userId)->get()->count();

        // for( $i=1; $i<5; $i++){
        //     DB::table('grades')->where('id',$i)
        // }

        $users = DB::table('grades')
            ->whereColumn([
                [$count, '>', 'low'],
                [$count, '<', 'high'],
            ])->get();


        $grade = Grade::select('grade')->whereBetween($count, ['low', 'high'])->get();

        dd($users);
    }


    public function show($id)
    {
        //유저이름 같이 보내주기
        //longbe 머시기 사용하기
        return Post::find($id);
    }

    public function posts()
    {
        return Item::all();
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

    public function addProduct()
    {

        return 1;
        // $category = $request->category;
        // // $imagePath = $request->imagePath;
        // $saleAddress = $request->saleAddress;
        // $productName = $request->productName;
        // $content = $request->content;
        // $price = $request->price;
        // $newProduct = $request->newProduct;
        // $exchange = $request->exchange;f
        // $delivery = $request->delivery;s
        $bumbuer = 'test';

        // DB::table('items')->insert(['img' => '이미지', 'user_id' => Auth::user()->id, 'price' => $price, 'category' => $category, 'sold' => 0, 'content' => $content, 'productName' => $productName, 'saleAddress' => $saleAddress, 'newProduct' => $newProduct, 'exchange' => $exchange, 'delivery' => $delivery]);
        DB::table('items')->insert(['img' => '이미지', 'user_id' => 1, 'price' => 1, 'category' => 'asd', 'sold' => 0, 'content' => 'asd', 'productName' => 'sdsds', 'saleAddress' => 'sdsd', 'newProduct' => 'asasdsdad', 'exchange' => 'asdsadasd', 'delivery' => 'sadsad']);

        return 1;
    }
}
