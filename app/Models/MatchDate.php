<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperMatchDate
 */
class MatchDate extends Model
{
    protected $guarded = [];

    public function matches(): HasMany
    {
        return $this->hasMany(Match::class);
    }
}
