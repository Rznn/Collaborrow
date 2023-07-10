<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bookings extends Model
{
    use HasFactory;
    use Sluggable;
    use SoftDeletes;

    protected $table = 'bookings';

    protected $fillable = [
        'user_id',
        'item_id',
        'booking_date',
        'return_date',
        'stock',
        'confirm_return_date',
        'status',
        'slug',
    ];

    protected $attributes = [
        'status' => 'waiting'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'booking_date'
            ]
        ];
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function items()
    {
        return $this->belongsTo(Items::class, 'item_id');
    }
}
