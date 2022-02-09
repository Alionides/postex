<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acceptance extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'first_name',
        'last_name',
        'phone',
        'tracking_id',
        'kg',
        'price',
        'package_type',
        'delivery_location',
        'barcodes',
        'status'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
