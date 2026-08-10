<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Achievement extends Model
{
    protected $fillable = [
        'organizational_unit_id',
        'title',
        'description',
        'achievement_type',
        'photo_path',
        'sort_order',
    ];

    public function organizationalUnit(): BelongsTo
    {
        return $this->belongsTo(OrganizationalUnit::class);
    }

    public function members(): BelongsToMany
    {
        return $this->belongsToMany(
            Member::class,
            'achievement_member'
        )->withTimestamps();
    }
}