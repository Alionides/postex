<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Filters\Filterable;
//use Laravel\Scout\Searchable;

class Customer extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Filterable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

    //protected $table = 'customers';
    protected $guard = 'customer';
    protected $fillable = [
        'email',
        'fin',
        'password',
        'first_name',
        'last_name',
        'dob',
        'phone',
        'status',
        'notes',
        'calendly_url',
    ];
  
 
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'full_name'
    ];


    public function acceptances()
    {
        return $this->hasMany(Acceptance::class);
    }

    // public function companies()
    // {
    //     return $this->hasMany(Company::class);
    // }

    // public function candidates()
    // {
    //     return $this->hasMany(Candidate::class);
    // }

    // public function contacts()
    // {
    //     return $this->hasMany(Contact::class);
    // }

    // public function jobs()
    // {
    //     return $this->hasMany(Job::class);
    // }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
