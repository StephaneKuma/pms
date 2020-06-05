<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupplierAccount extends Model
{
    protected $fillable = [
        'supplier_id',
        'purchase_id',
        'amount',
        'paid',
        'due'
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }
}
