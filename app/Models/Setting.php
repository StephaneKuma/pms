<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'name',
        'logo',
        'title',
        'description',
        'copyright',
        'contact',
        'currency',
        'symbol',
        'email',
        'address',
    ];
}
