<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DocumentationImage extends Model
{
    protected $fillable = [
        'documentation_id',
        'image_path',
        'caption',
        'sort_order',
    ];

    public function documentation(): BelongsTo
    {
        return $this->belongsTo(Documentation::class);
    }
}