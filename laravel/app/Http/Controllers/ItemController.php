<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Item::all());

        return Item::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // echo "<script>console.log('PHP_Console:".$id."');<script>";
        $item = Item::find($id);
        $relatedProducts = DB::table('items')->where('category', $item->category)->where('productName', '<>', $item->productName)->get();
        $user = User::find($item->user_id);
        //  echo "<script>console.log('PHP_Console:".$category."');<script>";
        $address = $user->address;
        return [Item::find($id), $address, $relatedProducts];
    }
    public function showCategory(Request $request)
    {
        $title =  $request->data;
        // return 1;
        // echo "<script>console.log('PHP_Console:".$id."');<script>";
        // $item = Item::find($id);
        // $relatedProducts = DB::table('items')->where('category', $item->category)->where('productName', '<>', $item->productName)->get();
        // $user = User::find($item->user_id);
        //  echo "<script>console.log('PHP_Console:".DB::table('items')->where('category','=', $title)->get()."');<script>";
        // $address = $user->address;
        return DB::table('items')->where('category','=', $title)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
