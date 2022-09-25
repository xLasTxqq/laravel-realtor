<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Flat extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'numberhouse',
        'floor',
        'numberflat',
        'rooms',
        'area',
        'livingspace',
        'cost',
        'status',
        'booked',
        'purchasedname',
        'purchasedphone',
        'idapplication',
    ];

    protected $hidden = [
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
