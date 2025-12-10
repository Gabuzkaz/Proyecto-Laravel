<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $table = 'store';
    protected $primaryKey = 'store_id';
    public $timestamps = false;

    protected $fillable = [
        'manager_staff_id',
        'address_id',
    ];

    // Tienda → Clientes (1:N)
    public function customers()
    {
        return $this->hasMany(Customer::class, 'store_id', 'store_id');
    }

    // Tienda → Inventarios (1:N)
    public function inventories()
    {
        return $this->hasMany(Inventory::class, 'store_id', 'store_id');
    }
}

