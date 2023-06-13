@extends('layouts.app')

@section('title', '編集画面')

@section('content')
<div class="container small">
  <h1>商品編集</h1>
  <form action="{{ route('products.update', ['product' => $product->company_id])}}" method="POST">
  @csrf
  @method('PUT')
    <fieldset>
      <div class="form-group">
        <lavel>商品情報ID</lavel>
        <input type="text" value="{{ $product->company_id }}" class="form-control" disabled>
      </div>

      <div class="form-group">
        <label for="product_name">商品名</label>
        <input type="text" name="product_name" id="product_name" value="{{ $product->product_name }}" class="form-control">
      </div>

      <!-- メーカーのフィールドは非表示または読み取り専用にする -->
      <div class="form-group">
        <label for="company_id">メーカー</label>
        <input type="text" name="company_id" id="company_id" value="{{ $product->company_id }}" class="form-control" readonly>
      </div>

      <div class="form-group">
        <label for="price">価格</label>
        <input type="text" name="price" id="price" value="{{ $product->price }}" class="form-control">
      </div>

      <div class="form-group">
        <label for="stock">在庫数</label>
        <input type="text" name="stock" id="stock" value="{{ $product->stock }}" class="form-control">
      </div>

      <div class="form-group">
        <label for="comment">コメント</label>
        <textarea name="comment" id="comment" class="form-control">{{ $product->comment }}</textarea>
      </div>


      <div class="form-group" style="margin-bottom: 20px;">
        <label>商品画像</label>
        <input type="file" name="image" id="image" value="{{ $product->image }}" class="form-control">
      </div>
    </fieldset>

    <div class="text-center">
        <a href="{{ route('products.show', ['product' => $product->company_id]) }}" class="btn btn-secondary">戻る</a>
        <button type="submit" class="btn btn-success">更新</button>
    </div>

  </form>
</div>

@endsection
