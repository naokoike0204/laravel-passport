<?php

namespace App\Interfaces;

interface CustomerRepositoryInterface{

    public function getCustomerAll($paginate_count);
    public function getCustomerIdFirst($customer_id);
    public function updateCustomerProfile($customer_id,object $request);
    public function insertCustomerProfile(object $request);
    public function deleteCustomerProfile($customer_id);


}
