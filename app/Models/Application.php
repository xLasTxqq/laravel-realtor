<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Application extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'fullname',
        'number',
        'dateapplication',
        'numberhouse',
        'numberflat',
        'comment1',
        'status',
        'datemeeting',
        'comment2',
        'agreedate',
        'idflat ',
    ];

    protected $hidden = [
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
//        'agreedate' => 'date',
    ];
}
