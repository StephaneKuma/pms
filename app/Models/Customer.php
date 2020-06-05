<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'company_id',
        'name',
        'type',
        'email',
        'phone',
        'address',
        'note',
        'image',
        'regular_discount',
        'target_amount',
        'target_discount'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function ledgers()
    {
        return $this->hasMany(CustomerLedger::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function returns()
    {
        return $this->hasMany(SaleReturn::class);
    }
}
