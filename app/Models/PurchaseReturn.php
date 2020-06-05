<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseReturn extends Model
{
    protected $fillable = [
        'purchase_id',
        'supplier_id',
        'user_id',
        'total_deduction',
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
