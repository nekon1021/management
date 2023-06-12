<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // モデルに関連付けるテーブル
    protected $table = 'products';
    // テーブルに関連付ける主キー
    protected $primaryKey = 'id';

    
    protected $fillable = [
        'company_id',
        'product_name',
        'price',
        'stock',
        'comment',
        'image',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'price' => 'integer',
    ];

    /**
     *  一覧画面表示用にproductsテーブルから全てのデータを取得
     */
    public function findAllProducts()
    {
        return Product::all();
    }

  
    public function insertProduct($request)
    {
        // リクエストデータを基に管理マスターユーザーに登録する
        return $this->create([
            'company_id' => $request->company_id,
            'product_name' => $request->product_name,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);
    }

    

}
