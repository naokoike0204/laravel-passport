<?php
namespace App\Repositories;

use App\Interfaces\MstGenderRepositoryInterface;
use App\Models\MstGender;

class MstGenderRepository implements MstGenderRepositoryInterface
{
    public function getList(){
        return MstGender::all();
    }
}
