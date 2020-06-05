<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
    protected $fillable = [
        'sale_id',
        'user_id',
        'quantity',
        'total_price',
        'discount',
        'total_discount'
    ];

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
