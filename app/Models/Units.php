<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Units extends Model
{
    use HasFactory;
    use Sluggable;
    use SoftDeletes;

    protected $table = 'units';

    protected $fillable = [
        'name',
        'unit_address',
        'slug'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($unit) {
            $unit->items()->delete();
        });
    }

    public function items()
    {
        return $this->hasMany(Items::class, 'unit_id');
    }
}
