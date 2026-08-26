<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'company',
        'service_interest',
        'message',
        'status',
        'ip_address',
    ];

    // ── Scopes ────────────────────────────────────────────────────────────────

    public function scopeNew(Builder $query): Builder
    {
        return $query->where('status', 'new');
    }

    // ── Helpers ───────────────────────────────────────────────────────────────

    public function isNew(): bool
    {
        return $this->status === 'new';
    }

    public function statusLabel(): string
    {
        return match ($this->status) {
            'read'      => 'Read',
            'responded' => 'Responded',
            default     => 'New',
        };
    }

    public function statusColour(): string
    {
        return match ($this->status) {
            'read'      => 'text-amber-700 bg-amber-50 border-amber-200',
            'responded' => 'text-green-700 bg-green-50 border-green-200',
            default     => 'text-blue-700 bg-blue-50 border-blue-200',
        };
    }
}
