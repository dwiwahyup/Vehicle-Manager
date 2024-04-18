<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'type',
        'registration_number',
        'year',
        'region',
        'owned_vehicles',
        'service_schedule',
        'status',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'registration_number'
            ]
        ];
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
