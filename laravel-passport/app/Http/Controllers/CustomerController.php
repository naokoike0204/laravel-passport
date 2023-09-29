<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use App\Http\Requests\CustomerRequest;

class CustomerController extends Controller
{

    public function __construct()
    {
        $this->customer = new Customer();
    }

    public function index():View{
        if (Auth::check()) {
            $customers = Customer::all();
        }else{
            $customers = [];
        }
        return view('customer.customer', [
            "customers" => $customers
        ]);
    }

    public function edit($customer_id){
        if (Auth::check()) {
            $customer = Customer::where('id','=',$customer_id)->first();
        }else{
            $customer = [];
        }

        return view('customer.customer-edit', [
            "customer" => $customer
        ]);
    }

    public function update($customer_id, CustomerRequest $request):RedirectResponse{


        if(!empty($customer_id)){
            $registerCustomer = $this->customer->updateCustomer($customer_id,$request);
        }else{
            $registerCustomer = $this->customer->InsertCustomer($request);
        }

        return to_route('customer.customer');
    }

}
