<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'body',
        'featured_image',
        'category',
        'tags',
        'status',
        'published_at',
        'meta_title',
        'meta_description',
        'reading_time',
    ];

    protected $casts = [
        'tags'         => 'array',
        'published_at' => 'datetime',
    ];

    // ── Boot ─────────────────────────────────────────────────────────────────

    protected static function booted(): void
    {
        static::creating(function (Post $post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title);
            }
        });

        static::saving(function (Post $post) {
            if ($post->body) {
                $post->reading_time = max(1, (int) ceil(
                    str_word_count(strip_tags($post->body)) / 200
                ));
            }
        });
    }

    // ── Scopes ────────────────────────────────────────────────────────────────

    /** Only live, published posts visible to the public. */
    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', 'published')
                     ->where(fn ($q) => $q
                         ->whereNull('published_at')
                         ->orWhere('published_at', '<=', now())
                     );
    }

    /** Latest first. */
    public function scopeLatest(Builder $query): Builder
    {
        return $query->orderByDesc('published_at')->orderByDesc('created_at');
    }

    // ── Helpers ───────────────────────────────────────────────────────────────

    public function isPublished(): bool
    {
        return $this->status === 'published'
            && ($this->published_at === null || $this->published_at->lte(now()));
    }

    public function isScheduled(): bool
    {
        return $this->status === 'published'
            && $this->published_at !== null
            && $this->published_at->gt(now());
    }

    public function featuredImageUrl(): ?string
    {
        return $this->featured_image
            ? asset('storage/' . $this->featured_image)
            : null;
    }

    public function statusLabel(): string
    {
        if ($this->isScheduled()) {
            return 'Scheduled';
        }

        return match ($this->status) {
            'published' => 'Published',
            'archived'  => 'Archived',
            default     => 'Draft',
        };
    }

    public function statusColour(): string
    {
        if ($this->isScheduled()) {
            return 'text-blue-700 bg-blue-50 border-blue-200';
        }

        return match ($this->status) {
            'published' => 'text-green-700 bg-green-50 border-green-200',
            'archived'  => 'text-muted-grey bg-border-grey/30 border-border-grey',
            default     => 'text-amber-700 bg-amber-50 border-amber-200',
        };
    }
}
