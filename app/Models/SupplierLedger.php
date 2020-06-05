<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupplierLedger extends Model
{
    protected $fillable = [
        'supplier_id',
        'amount',
        'paid',
        'due'
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
