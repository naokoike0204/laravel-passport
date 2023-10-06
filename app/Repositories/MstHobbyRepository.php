<?php

namespace App\Repositories;

use App\Interfaces\MstHobbyRepositoryInterface;
use App\Models\MstHobby;

class MstHobbyRepository implements MstHobbyRepositoryInterface
{
    //趣味一覧を取得
    public function getList(){
        return MstHobby::all();
    }
}
