<?php

namespace App;

use App\Models\Role;
use App\Models\Sale;
use App\Models\Purchase;
use App\Models\SaleDetail;
use App\Models\PurchaseReturn;
use App\Models\PurchaseHistory;
use App\Models\PurchaseReturnDetail;
use App\Models\SaleReturn;
use App\Models\SaleReturnDetail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'role_id', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function hasRole()
    {
        return $this->role->name;
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    public function purchase_histories()
    {
        return $this->hasMany(PurchaseHistory::class);
    }

    public function purchase_retruns()
    {
        return $this->hasMany(PurchaseReturn::class);
    }

    public function purchase_return_details()
    {
        return $this->hasMany(PurchaseReturnDetail::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function sale_details()
    {
        return $this->hasMany(SaleDetail::class);
    }

    public function sale_returns()
    {
        return $this->hasMany(SaleReturn::class);
    }

    public function sale_return_details()
    {
        return $this->hasMany(SaleReturnDetail::class);
    }
}
