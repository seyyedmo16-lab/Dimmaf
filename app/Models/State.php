<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class State extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'symbol',
        'is_active',
        'name',
        'investment_facilities',
        'education_rank',
        'tourism',
        'jobs_and_business',
        'accommodation',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'investment_facilities' => 'integer',
            'education_rank' => 'integer',
            'tourism' => 'integer',
            'jobs_and_business' => 'integer',
            'accommodation' => 'integer',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    /**
     * Get the contacts for the state.
     */
    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class);
    }

    /**
     * Get the blogs for the state.
     */
    public function blogs(): HasMany
    {
        return $this->hasMany(Blog::class);
    }

    /**
     * Scope a query to only include active states.
     */
    public function scopeActiveStates($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Get all active states.
     */
    public static function activeStates()
    {
        return static::where('is_active', true)->get();
    }
}
