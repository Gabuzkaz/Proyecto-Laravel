<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $table = 'inventory';
    protected $primaryKey = 'inventory_id';
    public $timestamps = false;

    protected $fillable = [
        'film_id',
        'store_id',
    ];

    // Inventario → Película (N:1)
    public function film()
    {
        return $this->belongsTo(Film::class, 'film_id', 'film_id');
    }

    // Inventario → Tienda (N:1)
    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'store_id');
    }

    // Inventario → Rentals (1:N)
    public function rentals()
    {
        return $this->hasMany(Rental::class, 'inventory_id', 'inventory_id');
    }
}
