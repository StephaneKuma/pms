<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = [
        'name',
        'account_name',
        'account_number',
        'branch',
        'signature'
    ];

    public function payments()
    {
        return $this->hasMany(SupplierPayment::class);
    }
}
