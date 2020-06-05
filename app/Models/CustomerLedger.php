<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerLedger extends Model
{
    protected $fillable = ['customer_id', 'balance', 'paid', 'due'];

    public function customers()
    {
        return $this->belongsTo(Customer::class);
    }
}
