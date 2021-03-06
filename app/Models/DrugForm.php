<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DrugForm extends Model
{
    protected $fillable = ['name'];

    public function drugs()
    {
        return $this->hasMany(Drug::class);
    }
}
