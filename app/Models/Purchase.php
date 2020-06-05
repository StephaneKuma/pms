<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
        'drug_id',
        'supplier_id',
        'details',
        'total_dicount',
        'total_amount'
    ];

    public function drug()
    {
        return $this->belongsTo(Drug::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
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

    public function accounts()
    {
        return $this->hasMany(SupplierAccount::class);
    }

    public function payments()
    {
        return $this->hasMany(SupplierPayment::class);
    }
}
