<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $table = 'rental';
    protected $primaryKey = 'rental_id';
    public $timestamps = false;

    protected $fillable = [
        'rental_date',
        'inventory_id',
        'customer_id',
        'return_date',
        'staff_id',
    ];

    // Rental → Cliente (N:1)
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }

    // Rental → Inventario (N:1)
    public function inventory()
    {
        return $this->belongsTo(Inventory::class, 'inventory_id', 'inventory_id');
    }

    // Rental → Pagos (1:N)
    public function payments()
    {
        return $this->hasMany(Payment::class, 'rental_id', 'rental_id');
    }
    public function film() 
    {
    return $this->belongsTo(Film::class, 'inventory_id', 'inventory_id')
                ->join('film', 'inventory.film_id', '=', 'film.film_id')
                ->select('film.*', 'inventory.inventory_id');
    }
    public function staff()
{
    return $this->belongsTo(Staff::class, 'staff_id');
}

}
