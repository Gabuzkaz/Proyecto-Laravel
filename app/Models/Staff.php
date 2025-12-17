<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staff';
    protected $primaryKey = 'staff_id';
    public $timestamps = false;

    protected $fillable = [
        'first_name',
        'last_name',
        'address_id',
        'email',
        'store_id',
        'active',
        'username',
        'password',
    ];

    // Staff → Store (N:1)
    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'store_id');
    }

    // Staff → Address (N:1)
    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id', 'address_id');
    }

    // Staff → Rentals (1:N)
    public function rentals()
    {
        return $this->hasMany(Rental::class, 'staff_id', 'staff_id');
    }

    // Staff → Payments (1:N)
    public function payments()
    {
        return $this->hasMany(Payment::class, 'staff_id', 'staff_id');
    }
}
