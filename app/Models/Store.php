<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'store';
    protected $primaryKey = 'store_id';
    public $timestamps = false;

    // CAMPOS PERMITIDOS PARA ASIGNACIÓN MASIVA
    protected $fillable = [
        'manager_staff_id',
        'address_id'
    ];

    public function manager()
    {
        return $this->belongsTo(Staff::class, 'manager_staff_id');
    }

    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }
}

