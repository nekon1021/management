<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Company;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
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

    
    public function company()
    {
        return $this->belogsTo(Company::class, 'company_id');
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
        $companies = Config::get('companies');
        return view('create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     // 登録処理
    public function store(Request $request){
        // ディレクトリ名
        $image = $request->file('image');
        $path = $image->store('public/images');

        // 保存した画像ファイル名
        $filename = basename($path);
       
        $registerProduct = $this->product->InsertProduct($request);

        // 画像のパスをデータベースに保存する
        $registerProduct->image = $filename;
        $registerProduct->save();
        
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
        $companies = config('companies');

        return view('edit', compact('product', 'companies'))
            ->with('action', route('products.show', ['product' => $id]));
        }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     // 更新処理
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $companies = Config::get('companies');
        $updateProduct = $this->product->updateProduct($request, $product, $companies);

        // 更新後にホーム画面にリダイレクト
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
       // Productsテーブルから指定のIDのレコード1件を取得
       $product = Product::find($id);
       // レコードを削除
       $product->delete();
       // 削除したら一覧画面にリダイレクト
       return redirect()->route('home');

        
    }
}
