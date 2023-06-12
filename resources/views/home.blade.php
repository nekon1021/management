@extends('layouts.app')

@section('title', '商品一覧')

@section('content')
<div class="container">
    <form method="get" action="" class="form-inline">
        <select name="manufacturer_name">
            <option value="0">メーカー名を選択してください</option>
            <option value="1">企業1</option>
            <option value="2">企業2</option>
            <option value="3">企業3</option>
        </select>
        <input type="text" name="" value="" placeholder="検索キーワード">
        <input type="submit" value="検索" class="btn btn-info" style="margin-left: 10px; color: white;">
    </form>

    <div class="text-right">
        <a href="products/create" class="btn" style="background-color: #f0ad4e; color: white; width: 100px;">商品登録</a>
    </div>

    <table class="table mx-auto" style="width: 1000px;">
        <tr class="table-info">
            <th scope="col" width="10%">id</th>
            <th scope="col" width="10%">商品画像</th>
            <th scope="col" width="20%">商品名</th>
            <th scope="col" width="10%">価格</th>
            <th scope="col" width="10%">在庫数</th>
            <th scope="col" width="20%">メーカー名</th>
            <th scope="col" width="10%"></th>
            <th scope="col" width="10%"></th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->image }}</td>
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->stock }}</td>
            <td>{{ $product->company_id }}</td>
            <td><a href="{{ route('products.show', ['product' => $product->id]) }}" class="btn btn-primary">詳細</a></td>
            <td><a class="btn btn-danger">削除</a></td>
        </tr>
        @endforeach

    </table>
</div>
@endsection