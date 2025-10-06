<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WhatDoWe extends Model
{
    use HasFactory;

    protected $table = 'what_do_we';

    protected $fillable = [
        'title_en',
        'title_fa',
        'slug',
        'description_en',
        'description_fa',
        'body_en',
        'body_fa',
    ];

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function scopeActive($query)
    {
        return $query->whereNotNull('title_en')->whereNotNull('title_fa');
    }
}