<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'customer_id',
        'user_id',
        'amount',
        'paid',
        'due',
        'counter',
        'pay_status'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function details()
    {
        return $this->hasMany(SaleDetail::class);
    }

    public function returns()
    {
        return $this->hasMany(SaleReturn::class);
    }
}
