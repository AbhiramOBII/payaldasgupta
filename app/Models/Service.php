<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'full_description',
        'faqs',
        'cta_title',
        'cta_description',
        'cta_link',
        'status',
        'sort_order',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'faqs' => 'array',
    ];

    // Auto-generate slug from title if not provided
    protected static function booted(): void
    {
        static::creating(function (Service $service) {
            if (empty($service->slug)) {
                $service->slug = Str::slug($service->title);
            }
        });
    }

    public function isActive(): bool
    {
        return $this->status === 'active';
    }
}
