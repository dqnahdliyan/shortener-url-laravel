<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'price',
        'short_url',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'double',
        ];
    }

    public function getImageAttribute(): string
    {
        return $this->attributes['image'] ? asset('storage/'.$this->attributes['image']) : 'https://placehold.co/640x360';
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
