@extends('layouts.app')

@section('title', '登録画面')

@section('content')
<div class="container">
  <form action="{{ route('products.store') }}" method="POST">
    @csrf
    <div class="form-group">
      <label>商品名</label>
      <input type="text" class="form-control" name="product_name" id="product_name">
    </div>

    <div class="form-group">
      <label>メーカー</label>
      <select class="form-control" name="company_id" id="company_id">
        @foreach (Config::get('companies.company_name') as $key => $val)
          <option value="{{ $key }}">{{ $val }}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label>価格</label>
      <input type="text" class="form-control" name="price" id="price">
    </div>

    <div class="form-group">
      <label>在庫数</label>
      <input type="text" class="form-control" name="stock" id="stock">
    </div>

    <div class="form-group">
      <label>コメント</label>
      <textarea class="form-control" name="comment" id="comment"></textarea>
    </div>

    <div class="form-group" style="margin-bottom: 20px;">
      <labrl>商品画像</labrl>
      <input type="file" class="form-control" name="image" id="image">
    </div>

    <div class="form-gorup text-center">
      <a href="{{ route('home') }}" class="btn btn-secondary">戻る</a>
      <button type="submit" class="btn btn-success">{{__('登録')}}</button>
    </div>
  </form>


</div>
@endsection
