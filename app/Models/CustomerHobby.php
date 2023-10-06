<?php

namespace App\Models;

use AWS\CRT\HTTP\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerHobby extends Model
{
    use HasFactory;
    protected $table = 'customers_hobbies';

    protected $fillable = [
        'customer_id',
        'hobby_id'
    ];

}
