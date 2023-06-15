<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    
    // モデルに関連付けるテーブル
     protected $table = 'companies';
     // テーブルに関連付ける主キー
     protected $primaryKey = 'id';
 
    
     protected $fillable = [
         'company_name',
         'street_address',
         'representative_name',
         'created_at',
         'updated_at',
     ];

     public function insertcompany($request)
    {
        // リクエストデータを基に管理マスターユーザーに登録する
        return $this->create([
            'company_name' => $request->company_name,
            'street_address' => $request->street_address,
            'representative_name' => $request->representative_name,
        ]);
    }

    public function updateCompany($request, $company)
    {
        
            $company->fill([
                'company_name' => $request->company_name,
                'street_address' => $request->street_address,
                'representative_name' => $request->representative_name,
            ])->save();

            return $company;
    }

   
}
