<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'city';
    protected $primaryKey = 'city_id';
    public $timestamps = false;

    protected $fillable = [
        'city',
        'country_id',
    ];

    // City → Country (N:1)
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'country_id');
    }

    // City → Addresses (1:N)
    public function addresses()
    {
        return $this->hasMany(Address::class, 'city_id', 'city_id');
    }
}
