<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
=======
use App\Models\Grade;
use App\Models\Item;
use App\Models\Post;
>>>>>>> 29a57004a1c543ebbd5ea0a1a75db51b66981f85
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class postController extends Controller
{
    public function imagepath(Request $request)
    {
        // $imagename = $request->imagename;
        $request->file('imgfile')->storeAs('public/image', 'asdsad');

        return 1;
    }
    public function addProduct(Request $request)
    {

<<<<<<< HEAD
        $userId = $request->userId;
        $category = $request->category;
        $productImage = $request->productImage;
        $productName = $request->productName;
        $content = $request->content;
        $price = $request->price;
        $newProduct = $request->newProduct;
        $exchange = $request->exchange;
=======
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
>>>>>>> 29a57004a1c543ebbd5ea0a1a75db51b66981f85


        // $name = $request->file('image')->getClientOriginalName();
        // $extension = $request->file('image')->extension();
        // $extensionout = Str::of($name)->basename('.' . $extension);
        // $filename = $extensionout . '_' . time() . '.' . $extension;
        // $request->file('image')->storeAs('storage/app/public/image', $image);

        // $request->file()storeAs('public/image', $image);

        $name = $productImage->getClientOriginalName();
        $extension = $productImage->extension();
        $extensionout = Str::of($name)->basename('.' . $extension);
        $filename = $extensionout . '_' . time() . '.' . $extension;
        $productImage->storeAs('public/image', $filename);






<<<<<<< HEAD
=======
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
>>>>>>> 29a57004a1c543ebbd5ea0a1a75db51b66981f85

        DB::table('items')->insert(['user_id' => $userId, 'price' => $price, 'category' => $category, 'sold' => 0, 'content' => $content, 'productName' => $productName,  'newProduct' => $newProduct, 'exchange' => $exchange, 'img' => $filename]);
        return 1;
    }
}
