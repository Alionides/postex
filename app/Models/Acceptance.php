<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Location;

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


    // public function locations(){
    //     return $this->hasOne(Location::class);
    //   }



    public function locations_receiver()
    {
        return $this->hasOne(Location::class, 'code', 'receiver_address');
    }
 
    public function locations_sender()
    {
        return $this->hasOne(Location::class, 'code', 'sender_address');
    }
 
}

    
