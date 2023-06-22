@extends('layouts.app')

@section('title', '登録画面')

@section('content')
<div class="container">
  <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="product_name">商品名<span class="badge bg-danger">必須</span></label>
      <input type="text" class="form-control" name="product_name" id="product_name">
    </div>

    <div class="form-group">
      <label for="company_id">メーカー<span class="badge bg-danger">必須</span></label>
        <select class="form-control" name="company_id" id="company_id">
          @foreach (config('companies') as $company_id => $company_name)
            <option value="{{ $company_id }}">{{ $company_name }}</option>
          @endforeach
        </select>
    </div>

    <div class="form-group">
      <label for="price">価格<span class="badge bg-danger">必須</span></label>
      <input type="text" class="form-control" name="price" id="price">
    </div>

    <div class="form-group">
      <label for="stock">在庫数<span class="badge bg-danger">必須</span></label>
      <input type="text" class="form-control" name="stock" id="stock">
    </div>

    <div class="form-group">
      <label for="comment">コメント</label>
      <textarea class="form-control" name="comment" id="comment"></textarea>
    </div>

    <div class="form-group" style="margin-bottom: 20px;">
      <labrl>商品画像</labrl>
      <input type="file" class="form-control" name="img_path" id="img_path">
    </div>

    <div class="form-gorup text-center">
      <a href="{{ route('home') }}" class="btn btn-secondary">戻る</a>
      <button type="submit" class="btn btn-success">{{__('登録')}}</button>
    </div>
  </form>


</div>
@endsection
