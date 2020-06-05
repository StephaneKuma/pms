<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class SaleReturnDetail extends Model
{
    protected $fillable = [
        'sale_return_id',
        'user_id',
        'quantity',
        'total',
        'total_discount'
    ];

    public function sale_return()
    {
        return $this->belongsTo(SaleReturn::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
