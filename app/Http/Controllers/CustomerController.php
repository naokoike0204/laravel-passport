<?php

namespace App\Http\Controllers;


use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Http\Requests\CustomerRequest;

class CustomerController extends Controller
{

    public function __construct()
    {

    }


    /**
     * 顧客一覧
     *
     * @return View
     */
    public function index():View{

        $customerService = app()->make('CustomerService');

        if (Auth::check()) {
            $customers = $customerService->getCustomerAll(3);
        }else{
            $customers = [];
        }
        return view('customer.customer', [
            "customers" => $customers
        ]);
    }

    /**
     * 詳細、編集画面の表示
     *
     * @param integer $customer_id
     * @return View
     */
    public function edit($customer_id=0){
        if (Auth::check()) {
            $customer = app()->make('CustomerService')->getCustomerIdFirst($customer_id);

        }else{
            $customer = [];
        }
        $genders = app()->make('CustomerService')->getGenderList();
        $hobbies = app()->make('CustomerService')->getHobbyList();


        return view('customer.customer-edit', [
            "customer" => $customer,
            "genders"=>$genders,
            "hobbies"=>$hobbies,
            "prefecture_name"=>$customer->prefecture_name->name ?? ''
        ]);
    }

    /**
     * データの更新、新規登録処理
     *
     * @param integer $customer_id
     * @param CustomerRequest $request
     * @return RedirectResponse
     */
    public function update($customer_id=0, CustomerRequest $request):RedirectResponse{

        // バリデーション済みデータの取得
        $validated = $request->validated();

        if(!empty($customer_id)){
            $registerCustomer = app()->make('CustomerService')->updateCustomerProfile($customer_id,$request);
        }else{
            $registerCustomer = app()->make('CustomerService')->insertCustomerProfile($request);
        }

        return to_route('customer');
    }


    /**
     * 論理削除
     *
     * @param [type] $customer_id
     * @return void
     */
    public function delete($customer_id){

        if(!empty($customer_id)){
            $registerCustomer = app()->make('CustomerService')->deleteCustomerProfile($customer_id);
        }
        return to_route('customer');
    }

}
