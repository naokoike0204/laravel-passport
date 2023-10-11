<?php

namespace App\Http\Controllers;


use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Http\Requests\CustomerRequest;
use App\Services\Customer\CustomerService;

class CustomerController extends Controller
{

    private $customerService;
    public function __construct(
        CustomerService $customerService,
    )
    {

        $this->customerService = $customerService;
    }


    /**
     * 顧客一覧
     *
     * @return View
     */
    public function index():View{

        if (Auth::check()) {
            $customers = $this->customerService->getCustomerAll(3);
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
    public function edit(int $customer_id=0){
        if (Auth::check()) {
            $customer = $this->customerService->getCustomerIdFirst($customer_id);

        }else{
            $customer = [];
        }
        $genders = $this->customerService->getGenderList();
        $hobbies = $this->customerService->getHobbyList();
        $prefecture_name = $customer->prefecture_name->name ?? '';


        return view('customer.customer-edit', compact(
            "customer",
            "genders",
            "hobbies",
            "prefecture_name",
        ));
    }

    /**
     * データの更新、新規登録処理
     *
     * @param integer $customer_id
     * @param CustomerRequest $request
     * @return RedirectResponse
     */
    public function update(int $customer_id=0, CustomerRequest $request):RedirectResponse{


        if(!empty($customer_id)){
            $registerCustomer = $this->customerService->updateCustomerProfile($customer_id,$request);
        }else{
            $registerCustomer = $this->customerService->insertCustomerProfile($request);
        }

        return to_route('customer');
    }


    /**
     * 論理削除
     *
     * @param integer $customer_id
     * @return void
     */
    public function delete(int $customer_id){

        if(!empty($customer_id)){
            $registerCustomer = $this->customerService->deleteCustomerProfile($customer_id);
        }
        return to_route('customer');
    }

}
