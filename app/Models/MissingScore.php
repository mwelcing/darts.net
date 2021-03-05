<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperMissingScore
 */
class MissingScore extends Model
{
    protected $guarded = [];

    public function match(): BelongsTo
    {
        return $this->belongsTo(Match::class);
    }
}
