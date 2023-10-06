<?php
namespace App\Repositories;

use App\Interfaces\CustomerHobbyRepositoryInterface;
use App\Models\CustomerHobby;

class CustomerHobbyRepository implements CustomerHobbyRepositoryInterface
{


    /**
     * 顧客の趣味一覧を取得
     *
     * @param integer $customer_id
     * @return object
     */
    public function getCustomerHobbyList($customer_id=0){
        if($customer_id){
            return CustomerHobby::select('mst_hobbies.id')->join('mst_hobbies', 'mst_hobbies.id', '=', 'customers_hobbies.hobby_id')->where('customer_id','=',$customer_id)->get();
        }else{
            return (object)[];
        }
    }


    /**
     * 顧客の趣味を新規登録
     *
     * @param integer $customer_id
     * @param array $hobby_id
     * @return void
     */
    public function insertCustomerHobby($customer_id,$hobby_id=[]){
        if(!empty($hobby_id) && !empty($customer_id)){
            foreach($hobby_id as $hobby){
                CustomerHobby::create([
                    "customer_id"=>$customer_id,
                    "hobby_id"=>$hobby
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
    public function updateCustomerHobby($customer_id,$hobby_id=[]){
        if(!empty($customer_id)){
            CustomerHobby::where('customer_id', $customer_id)->delete();
            if(!empty($hobby_id)){
                foreach($hobby_id as $hobby){
                    CustomerHobby::create([
                        "customer_id"=>$customer_id,
                        "hobby_id"=>$hobby
                    ]);
                }
            }
        }
    }

}
