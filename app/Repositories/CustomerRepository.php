<?php

namespace App\Repositories;

use App\Interfaces\CustomerRepositoryInterface;
use App\Models\Customer;
use App\Models\CustomerHobby;
use App\Models\MstGender;
use App\Models\MstHobby;

class CustomerRepository implements CustomerRepositoryInterface
{

    //全顧客の取得
    public function getCustomerAll($paginate_count){
        return Customer::paginate($paginate_count);
    }


    //顧客IDで1件取得
    public function getCustomerIdFirst($customer_id=0){
        if($customer_id){
            return Customer::where('id','=',$customer_id)->first();
        }else{
            return [];
        }
    }

/**
     * 登録処理
     */
    public function insertCustomerProfile($request)
    {
        // リクエストデータを基に管理マスターユーザーに登録する
        return Customer::create([
            'name' => $request->name,
            'age' => $request->age,
            'gender_id' => $request->gender_id,
            'prefecture_id' => $request->prefecture_id,
            'address' => $request->address,
            'pr_description' => $request->pr_description,
            'image' => $request->image,
        ]);

    }

    /**
     * 更新処理
     */
    public function updateCustomerProfile($customer_id,$request)
    {
        $customer = Customer::find($customer_id);
        $customer->fill([
            'name' => $request->name,
            'age' => $request->age,
            'gender_id' => $request->gender_id,
            'prefecture_id' => $request->prefecture_id,
            'address' => $request->address,
            'pr_description' => $request->pr_description,
            'image' => $request->image,
        ]);
        return $customer->save();

    }

    public function deleteCustomerProfile($customer_id){
        $customer = Customer::where('id','=',$customer_id)->first();
      if(!empty($customer)){
        $customer->delete();
      }
      return true;
    }

}
