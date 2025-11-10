<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Vitamin extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'alternative_name',
        'description',
        'functions',
        'food_sources',
        'daily_need',
        'deficiency_symptoms',
        'toxicity_symptoms',
        'interesting_facts',
        'references',
        'image_path',
        'is_popular',
        'order',
    ];

    protected $casts = [
        'is_popular' => 'boolean',
        'order' => 'integer',
        'references' => 'array',
    ];

    /**
     * Get the category that owns the vitamin.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(VitaminCategory::class, 'category_id');
    }

    /**
     * Scope a query to only include popular vitamins.
     */
    public function scopePopular($query)
    {
        return $query->where('is_popular', true);
    }

    /**
     * Scope a query to order vitamins.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc')->orderBy('name', 'asc');
    }

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($vitamin) {
            if (empty($vitamin->slug)) {
                $vitamin->slug = Str::slug($vitamin->name);
            }
        });

        static::updating(function ($vitamin) {
            if ($vitamin->isDirty('name')) {
                $vitamin->slug = Str::slug($vitamin->name);
            }
        });
    }
}
