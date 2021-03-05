<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperPlayer
 */
class Player extends Model
{
    protected $guarded = [];

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    public function match_scores_v_p1(): HasMany
    {
        return $this->hasMany(MatchScore::class, 'v_p1');
    }
    public function match_scores_v_p2(): HasMany
    {
        return $this->hasMany(MatchScore::class, 'v_p2');
    }
    public function match_scores_v_p3(): HasMany
    {
        return $this->hasMany(MatchScore::class, 'v_p3');
    }
    public function match_scores_v_p4(): HasMany
    {
        return $this->hasMany(MatchScore::class, 'v_p4');
    }
    public function match_scores_h_p1(): HasMany
    {
        return $this->hasMany(MatchScore::class, 'h_p1');
    }
    public function match_scores_h_p2(): HasMany
    {
        return $this->hasMany(MatchScore::class, 'h_p2');
    }
    public function match_scores_h_p3(): HasMany
    {
        return $this->hasMany(MatchScore::class, 'h_p3');
    }
    public function match_scores_h_p4(): HasMany
    {
        return $this->hasMany(MatchScore::class, 'h_p4');
    }
}
