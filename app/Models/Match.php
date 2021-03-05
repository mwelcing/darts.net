<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @mixin IdeHelperMatch
 */
class Match extends Model
{
    protected $guarded = [];

    public function match_date(): BelongsTo
    {
        return $this->belongsTo(MatchDate::class);
    }
    public function home_team(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'home_team_id');
    }
    public function visiting_team(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'visiting_team_id');
    }

    public function match_score(): HasOne
    {
        return $this->hasOne(MatchScore::class, 'match_id', 'id');
    }

    public function missing_score(): HasOne
    {
        return $this->hasOne(MissingScore::class);
    }
}
