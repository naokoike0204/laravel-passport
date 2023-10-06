<?php
namespace App\Repositories;

use App\Interfaces\MstGenderRepositoryInterface;
use App\Models\MstGender;

class MstGenderRepository implements MstGenderRepositoryInterface
{

    /**
     * 性別一覧を取得
     *
     * @return object
     */
    public function getList(){
        return MstGender::all();
    }
}
