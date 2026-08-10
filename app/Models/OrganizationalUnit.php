<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrganizationalUnit extends Model
{
    protected $fillable = [
        'cabinet_id',
        'parent_id',
        'name',
        'type',
        'short_name',
        'description',
        'tasks',
        'cover_path',
        'sort_order',
    ];

    public function cabinet(): BelongsTo
    {
        return $this->belongsTo(Cabinet::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(
            OrganizationalUnit::class,
            'parent_id'
        );
    }

    public function children(): HasMany
    {
        return $this->hasMany(
            OrganizationalUnit::class,
            'parent_id'
        );
    }

    public function positions(): HasMany
    {
        return $this->hasMany(Position::class);
    }

    public function programs(): HasMany
    {
        return $this->hasMany(Program::class);
    }

    public function achievements(): HasMany
    {
        return $this->hasMany(Achievement::class);
    }

    public function documentations(): HasMany
    {
        return $this->hasMany(Documentation::class);
    }
}