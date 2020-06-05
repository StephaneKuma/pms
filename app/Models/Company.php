<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name', 'status'];

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
}
