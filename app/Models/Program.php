<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Program extends Model
{
    protected $fillable = [
        'organizational_unit_id',
        'name',
        'slug',
        'description',
        'status',
        'start_date',
        'end_date',
        'cover_path',
        'sort_order',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function organizationalUnit(): BelongsTo
    {
        return $this->belongsTo(OrganizationalUnit::class);
    }

    public function members(): BelongsToMany
    {
        return $this->belongsToMany(
            Member::class,
            'member_program'
        )->withTimestamps();
    }
}