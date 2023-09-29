<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'age',
        'prefecture_id',
        'address',
        'hobby_id',
        'pr_description',
        'image',
    ];

    /**
     * 登録処理
     */
    public function InsertCustomer($request)
    {
        // リクエストデータを基に管理マスターユーザーに登録する
        return $this->create([
            'name' => $request->name,
            'age' => $request->age,
            'gender_id' => $request->gender_id,
            'prefecture_id' => $request->prefecture_id,
            'address' => $request->address,
            'pr_description' => $request->pr_description,
        ]);
    }

    /**
     * 更新処理
     */
    public function updateCustomer($customer_id,$request)
    {
        $customer = $this->find($customer_id);
        $customer->fill([
            'name' => $request->name,
            'age' => $request->age,
            'gender_id' => $request->gender_id,
            'prefecture_id' => $request->prefecture_id,
            'address' => $request->address,
            'pr_description' => $request->pr_description,
        ]);
        return $customer->save();

    }

}
