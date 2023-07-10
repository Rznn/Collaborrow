<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Items extends Model
{
    use HasFactory;
    use Sluggable;
    use softDeletes;

    protected $table = 'items';

    protected $fillable = [
        'name',
        'brand',
        'description',
        'stock',
        'photo',
        'slug',
        'category_id',
        'unit_id',
        'user_id',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    protected $attributes = [
        'status' => 'available'
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($item) {
            $item->bookings()->delete();
        });
    }

    public function bookings()
    {
        return $this->hasMany(Bookings::class, 'item_id');
    }

    public function categories()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }

    public function units()
    {
        return $this->belongsTo(Units::class, 'unit_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
