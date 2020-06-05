<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class SaleReturn extends Model
{
    protected $fillable = [
        'sale_id',
        'customer_id',
        'user_id',
        'total_discount',
        'total_amount',
        'counter'
    ];

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

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
        return $this->hasMany(SaleReturnDetail::class);
    }
}
