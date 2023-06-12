<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
       $this->product = new Product();
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    }
    public function index()
    {
        $products = $this->product->findAllProducts();

        return view('home', compact('products'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     // 登録画面
    public function create(Request $request)
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     // 登録処理
    public function store(Request $request)
    {
        $registerProduct = $this->product->InsertProduct($request);
        // リダイレクトするなどの処理を行う
        return redirect()->route('home');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     // 詳細画面
     public function show($id)
    {
        $product = Product::find($id);
        return view('show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     // 編集画面
    public function edit($id)
    {
        $product = Product::find($id);
        return view('edit', compact('product'));
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
        $product = Product::find($id);
        $updateProdcut = $this->product->updateProduct($request, $product);

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Prodcutsテーブルから指定のIDのレコード一件取得
        $product = Product::find($id);
        // レコードを削除
        $product->delete();
        // 削除したらホーム画面にリダイレクト
        return redirect()->route('home');
    }
}
