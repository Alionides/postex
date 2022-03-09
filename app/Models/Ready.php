<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ready extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'barcodes',
        'driver',
        'sender_address',
        'receiver_address',
        'status',
    ];
}
