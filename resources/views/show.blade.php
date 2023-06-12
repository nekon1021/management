@extends('layouts.app')

@section('title', '詳細画面')

@section('content')
<div class="container">
    <h3>商品情報</h3>
    <table class="table table-striped">
        <tbody>
            <tr>
              <td>商品情報ID</td>
              <th></th>
            </tr>
            <tr>
                <td>商品画像</td>
                <th>{{ $product->image }}</th>
            </tr>
            <tr>
                <td>商品名</td>
                <th>{{ $product->product_name }}</th>
            </tr>
            <tr>
                <td>メーカー</td>
                <th>{{ $product->company_id }}</th>
            </tr>
            <tr>
                <td>価格</td>
                <th>{{ $product->price }}</th>
            </tr>
            <tr>
                <td>在庫数</td>
                <th>{{ $product->stock }}</th>
            </tr>
            <tr>
                <td>コメント</td>
                <th>{{ $product->comment }}</th>
            </tr>
        </tbody>
    </table>

    <div class="text-center">
        <a href="{{ route('home') }}" class="btn btn-secondary">戻る</a>
        <a href="{{ route('products.edit', ['product' => $product->id]) }}" class="btn btn-info">編集</a>
    </div>

</div>
@endsection
