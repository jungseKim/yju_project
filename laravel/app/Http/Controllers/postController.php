<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class postController extends Controller
{
    public function addProduct(Request $request)
    {

        $userId = $request->userId;
        $category = $request->category;
        $imagePath = $request->imagePath;
        $saleAddress = $request->saleAddress;
        $productName = $request->productName;
        $content = $request->content;
        $price = $request->price;
        $newProduct = $request->newProduct;
        $exchange = $request->exchange;
        $delivery = $request->delivery;

        // return $price;
        // return 1;
        // return $userId;

        DB::table('items')->insert(['img' => $imagePath, 'user_id' => $userId, 'price' => $price, 'category' => $category, 'sold' => 0, 'content' => $content, 'productName' => $productName, 'saleAddress' => $saleAddress, 'newProduct' => $newProduct, 'exchange' => $exchange, 'delivery' => $delivery]);
        return 1;
    }
}
