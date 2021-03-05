<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperMatchScore
 */
class MatchScore extends Model
{
    protected $guarded = [];

    public function match(): BelongsTo
    {
        return $this->belongsTo(Match::class, 'match_id', 'id');
    }

    public function vp1(): BelongsTo
    {
        return $this->belongsTo(Player::class, 'v_p1');
    }
    public function vp2(): BelongsTo
    {
        return $this->belongsTo(Player::class, 'v_p2');
    }
    public function vp3(): BelongsTo
    {
        return $this->belongsTo(Player::class, 'v_p3');
    }
    public function vp4(): BelongsTo
    {
        return $this->belongsTo(Player::class, 'v_p4');
    }
    public function hp1(): BelongsTo
    {
        return $this->belongsTo(Player::class, 'h_p1');
    }
    public function hp2(): BelongsTo
    {
        return $this->belongsTo(Player::class, 'h_p2');
    }
    public function hp3(): BelongsTo
    {
        return $this->belongsTo(Player::class, 'h_p3');
    }
    public function hp4(): BelongsTo
    {
        return $this->belongsTo(Player::class, 'h_p4');
    }
}
