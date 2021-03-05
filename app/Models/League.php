<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperLeague
 */
class League extends Model
{
    protected $guarded = [];

    public function president(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }
}
