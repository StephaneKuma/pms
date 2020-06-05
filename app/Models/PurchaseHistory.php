<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class PurchaseHistory extends Model
{
    protected $fillable = [
        'purchase_id',
        'supplier_id',
        'user_id',
        'quantity',
        'discount',
        'total_amount',
        'expire_date'
    ];

    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
