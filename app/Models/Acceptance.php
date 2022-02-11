<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acceptance extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'sender_fin',
        'sender_first_name',
        'sender_last_name',
        'sender_phone',
        'receiver_fin',
        'receiver_first_name',
        'receiver_last_name',
        'receiver_phone',
        'tracking_id',
        'kg',
        'price',
        'package_type',
        'location_id',
        'barcodes',
        'status'
    ];
    
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}

    
