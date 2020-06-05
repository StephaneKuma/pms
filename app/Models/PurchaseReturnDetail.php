<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseReturnDetail extends Model
{
    protected $fillable = [
        'purchase_id',
        'supplier_id',
        'user_id',
        'drug_id',
        'return_quantity',
        'deduction_amount'
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

    public function drug()
    {
        return $this->belongsTo(Drug::class);
    }
}
