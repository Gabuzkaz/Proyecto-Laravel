<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'language';
    protected $primaryKey = 'language_id';
    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    // Language → Films (1:N)
    public function films()
    {
        return $this->hasMany(Film::class, 'language_id', 'language_id');
    }
}
