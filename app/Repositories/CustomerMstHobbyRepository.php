<?php
namespace App\Repositories;

use App\Interfaces\CustomerMstHobbyRepositoryInterface;
use App\Models\Customer;
use App\Models\CustomerMstHobby;

class CustomerMstHobbyRepository implements CustomerMstHobbyRepositoryInterface
{


    /**
     * 顧客の趣味一覧を取得
     *
     * @param integer $customer_id
     * @return object
     */
    public function getList(int $customer_id=0){
        if($customer_id){
            $customerMstHobby = Customer::find($customer_id)->mstHobbies()->get();

            return $customerMstHobby;
        }else{
            return new CustomerMstHobby();
        }
    }


    /**
     * 顧客の趣味を新規登録
     *
     * @param integer $customer_id
     * @param array $hobby_id
     * @return void
     */
    public function insert(int $customer_id,array $hobby_id=[]){
        if(!empty($hobby_id) && !empty($customer_id)){
            foreach($hobby_id as $hobby){
                CustomerMstHobby::create([
                    "customer_id"=>$customer_id,
                    "mst_hobby_id"=>$hobby
                ]);
            }
        }
    }


    /**
     * 顧客の趣味を更新
     *
     * @param integer $customer_id
     * @param array $hobby_id
     * @return void
     */
    public function update(int $customer_id,array $hobby_id=[]){
        if(!empty($customer_id)){
            CustomerMstHobby::where('customer_id', $customer_id)->delete();
            if(!empty($hobby_id)){
                foreach($hobby_id as $hobby){
                    CustomerMstHobby::create([
                        "customer_id"=>$customer_id,
                        "mst_hobby_id"=>$hobby
                    ]);
                }
            }
        }
    }

}
