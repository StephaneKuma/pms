<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupplierPayment extends Model
{
    protected $fillable = [
        'supplier_id',
        'purchase_id',
        'type',
        'bank_id',
        'receiver_name',
        'receiver_contact',
        'paid_amount'
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}
