<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Documentation extends Model
{
    protected $fillable = [
        'organizational_unit_id',
        'title',
        'description',
        'event_date',
        'sort_order',
    ];

    protected $casts = [
        'event_date' => 'date',
    ];

    public function organizationalUnit(): BelongsTo
    {
        return $this->belongsTo(OrganizationalUnit::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(DocumentationImage::class);
    }
}