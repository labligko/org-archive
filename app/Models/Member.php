<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Member extends Model
{
    protected $fillable = [
        'position_id',
        'name',
        'photo_path',
        'bio',
        'instagram_url',
        'linkedin_url',
        'sort_order',
    ];

    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class);
    }

    public function programs(): BelongsToMany
    {
        return $this->belongsToMany(
            Program::class,
            'member_program'
        )->withTimestamps();
    }

    public function achievements(): BelongsToMany
    {
        return $this->belongsToMany(
            Achievement::class,
            'achievement_member'
        )->withTimestamps();
    }
}