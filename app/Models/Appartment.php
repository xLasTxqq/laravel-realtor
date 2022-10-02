<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appartment extends Model
{
    use HasFactory;

    protected $fillable = [
        'house_number',
        'floor',
        'appartment_number',
        'number_of_rooms',
        'apartment_area',
        'living_space',
        'price',
        'currency'
    ];

    public function applications()
    {
        return $this->hasMany(Application::class, 'appartment_id','id');
    }
}
