<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Shortener extends Model
{
    use HasFactory;

    protected $fillable = [
        'original',
        'short',
        'unique_key',
    ];

    public function visitors(): HasMany
    {
        return $this->hasMany(Visitor::class);
    }
}
