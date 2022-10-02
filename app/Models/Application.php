<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'phone_number',
        'client_comment',
        'status',
        'date_meeting',
        'manager_comment',
        'date_of_purchase',
        'appartment_id',
    ];

    public function appartment()
    {
        return $this->belongsTo(Appartment::class,'appartment_id','id');
    }
}
