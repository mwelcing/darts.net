<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperTeam
 */
class Team extends Model
{
    protected $guarded = [];

    public function players(): HasMany
    {
        return $this->hasMany(Player::class)->orderBy('points', 'desc');
    }

    public function playersByName(): HasMany
    {
        return $this->hasMany(Player::class)->orderBy('name');
    }

    public function presidents(): HasMany
    {
        return $this->hasMany(League::class, 'president_id');
    }

    public function home_matches(): HasMany
    {
        return $this->hasMany(Match::class, 'home_team_id');
    }

    public function visiting_matches(): HasMany
    {
        return $this->hasMany(Match::class, 'visiting_team_id');
    }
}
