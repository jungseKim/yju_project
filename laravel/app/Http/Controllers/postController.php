<?php

namespace App\Http\Controllers;

use App\Models\Item;
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

        $userId = $request->userId;
        $category = $request->category;
        $productImage = $request->productImage;
        $productName = $request->productName;
        $content = $request->content;
        $price = $request->price;
        $newProduct = $request->newProduct;
        $exchange = $request->exchange;


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










        DB::table('items')->insert(['user_id' => $userId, 'price' => $price, 'category' => $category, 'sold' => 0, 'content' => $content, 'productName' => $productName,  'newProduct' => $newProduct, 'exchange' => $exchange, 'img' => $filename]);
        return 1;
    }


    public function search(Request $request)
    {
        if ($request->productName) {
            $productName = $request->productName;
            $searchResult = DB::table('items')->where('productName', 'like', '%' . $productName . '%')->get();

            return response()->json([
                'searchResult' => $searchResult
            ]);
        } else {
            $userName = $request->userName;

            // $searchResult = DB::table('users')->where('name', 'like', '%' . $userName . '%')->value('Id');

            $searchResult = DB::table('items')->join('users', 'items.user_id', '=', 'users.id')->where('users.name', 'like', '%' . $userName . '%')->select('items.*')->get();

            return response()->json([
                'searchResult' => $searchResult
            ]);
        };
    }

    public function addsearch()
    {
    }
}
