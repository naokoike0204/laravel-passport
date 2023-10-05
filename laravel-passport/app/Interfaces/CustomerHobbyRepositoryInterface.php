<?php

namespace App\Interfaces;

interface CustomerHobbyRepositoryInterface{
    public function getCustomerHobbyList();
    public function insertCustomerHobby($customer_id,array $hobby_id);
    public function updateCustomerHobby($customer_id,array $hobby_id);
}
