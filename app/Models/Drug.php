<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    protected $fillable = [
        'supplier_id',
        'name',
        'generic_name',
        'strength',
        'drug_form_id',
        'box_size',
        'trade_price',
        'mrp',
        'box_price',
        'details',
        'side_effect',
        'expire_date',
        'instock',
        'w_discount',
        'short_stock',
        'favourite',
        'discount',
        'sale_quantity'
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function drug_form()
    {
        return $this->belongsTo(DrugForm::class);
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    public function purchase_return_details()
    {
        return $this->hasMany(PurchaseReturnDetail::class);
    }
}
