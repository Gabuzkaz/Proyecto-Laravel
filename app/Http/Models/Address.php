<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'address';
    protected $primaryKey = 'address_id';
    public $timestamps = false;

    protected $fillable = [
        'address',
        'address2',
        'district',
        'city_id',
        'postal_code',
        'phone',
    ];

    // Address → City (N:1)
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'city_id');
    }

    // Address → Staff (1:N)
    public function staff()
    {
        return $this->hasMany(Staff::class, 'address_id', 'address_id');
    }

    // Address → Customers (1:N)
    public function customers()
    {
        return $this->hasMany(Customer::class, 'address_id', 'address_id');
    }
}
