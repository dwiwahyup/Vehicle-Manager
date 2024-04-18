<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'address',
        'license_number',
        'status',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
