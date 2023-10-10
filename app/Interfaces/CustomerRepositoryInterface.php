<?php

namespace App\Interfaces;

use App\Http\Requests\CustomerRequest;

interface CustomerRepositoryInterface{

    public function getAll(int $paginate_count);
    public function getFirst(int $customer_id);
    public function update(int $customer_id,CustomerRequest $request);
    public function insert(CustomerRequest $request);
    public function delete(int $customer_id);


}
