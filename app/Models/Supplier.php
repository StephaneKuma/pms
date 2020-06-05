<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'note',
        'image',
        'status',
    ];

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    public function purchase_histories()
    {
        return $this->hasMany(PurchaseHistory::class);
    }

    public function purchase_returns()
    {
        return $this->hasMany(PurchaseReturn::class);
    }

    public function purchase_return_details()
    {
        return $this->hasMany(PurchaseReturnDetail::class);
    }

    public function ledgers()
    {
        return $this->hasMany(SupplierLedger::class);
    }

    public function accounts()
    {
        return $this->hasMany(SupplierAccount::class);
    }

    public function payments()
    {
        return $this->hasMany(SupplierPayment::class);
    }
}
