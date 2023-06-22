<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    private $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function index()
    {
        $products = $this->product->findAllProducts();

        return view('home', compact('products'));
    }

    


    public function create(Request $request)
    {
        $companies = Config::get('companies');
        return view('create', compact('companies'));
    }

    public function store(Request $request)
    {
        $image = $request->file('img_path');

        if ($image) {
            $image->store('public/images');
        }
    
        $this->product->insertProduct($request);
        return redirect()->route('home')->with('successMessage', '商品登録に成功しました。');
        
    }

    public function show($id)
    {
        $product = $this->product->find($id);
        return view('show', compact('product'));
    }

    public function edit($id)
    {
        $product = $this->product->find($id);
        $companies = Config::get('companies');

        return view('edit', compact('product', 'companies'))->with('action', route('products.update', ['product' => $id]));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $companies = Config::get('companies');
        $updateProduct = $this->product->updateProduct($request, $product, $companies);

        return redirect()->route('home');
    }

    public function destroy($id)
    {
        $product = $this->product->find($id);
        $product->delete();
        return redirect()->route('home');
    }

   

}


