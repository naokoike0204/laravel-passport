<?php

namespace App\Repositories;

use App\Interfaces\MstHobbyRepositoryInterface;
use App\Models\MstHobby;

class MstHobbyRepository implements MstHobbyRepositoryInterface
{
    public function getList(){

        return MstHobby::all();
    }
}
