<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MstGender extends Model
{
    use HasFactory;

    public function get_list(){
        return $this->all();
    }
}
