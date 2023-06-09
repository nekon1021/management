<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

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
        'img_path',
        'created_at',
        'updated_at',
    ];

    protected $rules = [
        'company_id' => 'required',
        'product_name' => 'required',
        'price' => 'required',
        'stock' => 'required',
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

    public function getImageUrlAttribute()
    {
        if ($this->img_path) {
            return asset('storage/images/' . $this->img_path);
        }
        
        return null;
    }

  
    public function insertProduct($request)
    {   
        $validator = Validator::make($request->all(), $this->rules);

    // バリデーションに失敗した場合は例外をスローする
    if ($validator->fails()) {
        throw new ValidationException($validator);
    }
        // リクエストデータを基に管理マスターユーザーに登録する
        return $this->create([
            'company_id' => $request->company_id,
            'product_name' => $request->product_name,
            'price' => $request->price,
            'stock' => $request->stock,
            'comment' => $request->comment ?? null,
            'img_path' => $request->img_path ?? null,
        ]);
    }

    // 更新処理
    public function updateProduct($request, $product)
    {
        if($product) {
            $product->fill([
                'company_id' => $request->company_id,
                'product_name' => $request->product_name,
                'price' => $request->price,
                'stock' => $request->stock,
                'comment' => $request->comment ?? null,
                'img_path' => $request->img_path ?? null,
            ])->save();

            return $product;
        } else {

            // エラーメッセージを表示する
            return redirect()->back()->with('error', '見つかりませんでした');
        }

        }

    
}
