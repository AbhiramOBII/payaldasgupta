<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Industry extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'full_description',
        'expected_outcomes',
        'related_service_ids',
        'status',
        'sort_order',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'expected_outcomes'   => 'array',
        'related_service_ids' => 'array',
    ];

    // ── Boot ─────────────────────────────────────────────────────────────────

    protected static function booted(): void
    {
        static::creating(function (Industry $industry) {
            if (empty($industry->slug)) {
                $industry->slug = Str::slug($industry->title);
            }
        });
    }

    // ── Scopes ────────────────────────────────────────────────────────────────

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', 'active');
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('sort_order')->orderBy('title');
    }

    // ── Relationships / helpers ───────────────────────────────────────────────

    /**
     * Fetch the related Service models, preserving the stored order.
     */
    public function relatedServices(): Collection
    {
        $ids = $this->related_service_ids ?? [];

        if (empty($ids)) {
            return Collection::make();
        }

        return Service::whereIn('id', $ids)
            ->orderBy('sort_order')
            ->get();
    }
}
