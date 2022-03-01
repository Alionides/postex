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
        'sender_address',
        'receiver_fin',
        'receiver_first_name',
        'receiver_last_name',
        'receiver_phone',
        'receiver_address',
        'tracking_id',
        'kg',
        'price',
        'package_type',
        'barcodes',
        'status'
    ];
    
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

 
}

    
