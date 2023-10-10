<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'age',
        'gender_id',
        'prefecture_id',
        'address',
        'hobby_id',
        'pr_description',
        'image',
    ];

    public function mstHobbies(): BelongsToMany
    {
        return $this->belongsToMany(MstHobby::class);
    }

}
