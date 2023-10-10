<?php

namespace App\Repositories;

use App\Http\Requests\CustomerRequest;
use App\Interfaces\CustomerRepositoryInterface;
use App\Models\Customer;
use App\Models\CustomerHobby;
use App\Models\MstGender;
use App\Models\MstHobby;

class CustomerRepository implements CustomerRepositoryInterface
{


    /**
     * 全顧客の取得
     *
     * @param integer $paginate_count
     * @return object
     */
    public function getAll(int $paginate_count){
        return Customer::paginate($paginate_count);
    }



    /**
     * 顧客IDで1件取得
     *
     * @param integer $customer_id
     * @return object
     */
    public function getFirst(int $customer_id=0){
        if($customer_id){
            return Customer::where('id','=',$customer_id)->first();
        }else{
            return new Customer;
        }
    }


    /**
     * 登録処理
     *
     * @param CustomerRequest $request
     * @return mixed
     */
    public function insert(CustomerRequest $request)
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
     *
     * @param integer $customer_id
     * @param CustomerRequest $request
     * @return mixed
     */
    public function update(int $customer_id,CustomerRequest $request)
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


    /**
     * 削除
     *
     * @param integer $customer_id
     * @return true
     */
    public function delete(int $customer_id){
        $customer = Customer::where('id','=',$customer_id)->first();
      if(!empty($customer)){
        $customer->delete();
      }
      return true;
    }

}
