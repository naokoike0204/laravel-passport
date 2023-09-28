<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CustomerController extends Controller
{
    public function index():View{
        if (Auth::check()) {
            $customers = Customer::all();
        }else{
            $customers = [];
        }
        return view('customers.index', [
            "customers" => $customers
        ]);
    }

}
