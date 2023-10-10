<?php

namespace App\Models;

use AWS\CRT\HTTP\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CustomerMstHobby extends Model
{
    use HasFactory;
    protected $table = 'customer_mst_hobby';
    protected $fillable = [
        'customer_id',
        'mst_hobby_id'
    ];



}
