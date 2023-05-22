<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $fillable = [
        'province_name',
    ];

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
