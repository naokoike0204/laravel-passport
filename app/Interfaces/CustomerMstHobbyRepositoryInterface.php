<?php

namespace App\Interfaces;

interface CustomerMstHobbyRepositoryInterface{
    public function getList();
    public function insert(int $customer_id,array $hobby_id);
    public function update(int $customer_id,array $hobby_id);
}
