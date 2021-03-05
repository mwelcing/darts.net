<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\AdminMessage
 *
 * @property int $id
 * @property string $message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AdminMessage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminMessage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminMessage query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminMessage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminMessage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminMessage whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminMessage whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperAdminMessage extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\EightTeam
 *
 * @property int $id
 * @property int $week_no
 * @property int $visiting_team
 * @property int $home_team
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|EightTeam newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EightTeam newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EightTeam query()
 * @method static \Illuminate\Database\Eloquent\Builder|EightTeam whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EightTeam whereHomeTeam($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EightTeam whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EightTeam whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EightTeam whereVisitingTeam($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EightTeam whereWeekNo($value)
 * @mixin \Eloquent
 */
	class IdeHelperEightTeam extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ExcludedDate
 *
 * @property int $id
 * @property string $date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ExcludedDate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExcludedDate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExcludedDate query()
 * @method static \Illuminate\Database\Eloquent\Builder|ExcludedDate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExcludedDate whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExcludedDate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExcludedDate whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperExcludedDate extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\League
 *
 * @property int $id
 * @property string $name
 * @property string $year
 * @property int $president_id
 * @property string $email
 * @property int $pfh
 * @property int $pfs
 * @property int $split_season
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Team $president
 * @method static \Illuminate\Database\Eloquent\Builder|League newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|League newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|League query()
 * @method static \Illuminate\Database\Eloquent\Builder|League whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|League whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|League whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|League whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|League wherePfh($value)
 * @method static \Illuminate\Database\Eloquent\Builder|League wherePfs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|League wherePresidentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|League whereSplitSeason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|League whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|League whereYear($value)
 * @mixin \Eloquent
 */
	class IdeHelperLeague extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Match
 *
 * @property int $id
 * @property int $match_date_id
 * @property int $home_team_id
 * @property int $visiting_team_id
 * @property int $entered
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Team $home_team
 * @property-read \App\Models\MatchDate $match_date
 * @property-read \App\Models\MatchScore|null $match_score
 * @property-read \App\Models\MissingScore|null $missing_score
 * @property-read \App\Models\Team $visiting_team
 * @method static \Illuminate\Database\Eloquent\Builder|Match newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Match newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Match query()
 * @method static \Illuminate\Database\Eloquent\Builder|Match whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Match whereEntered($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Match whereHomeTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Match whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Match whereMatchDateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Match whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Match whereVisitingTeamId($value)
 * @mixin \Eloquent
 */
	class IdeHelperMatch extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MatchDate
 *
 * @property int $id
 * @property int $week_no
 * @property string $date
 * @property int $half
 * @property int $position_round
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $scores_entered
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Match[] $matches
 * @property-read int|null $matches_count
 * @method static \Illuminate\Database\Eloquent\Builder|MatchDate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MatchDate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MatchDate query()
 * @method static \Illuminate\Database\Eloquent\Builder|MatchDate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MatchDate whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MatchDate whereHalf($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MatchDate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MatchDate wherePositionRound($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MatchDate whereScoresEntered($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MatchDate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MatchDate whereWeekNo($value)
 * @mixin \Eloquent
 */
	class IdeHelperMatchDate extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MatchScore
 *
 * @property int $id
 * @property int $match_id
 * @property int $home_team_points
 * @property int $visiting_team_points
 * @property int $v_p1
 * @property int $v_p1_outs
 * @property int $v_p1_hats
 * @property int $v_p1_six
 * @property int $v_p2
 * @property int $v_p2_outs
 * @property int $v_p2_hats
 * @property int $v_p2_six
 * @property int $v_p3
 * @property int $v_p3_outs
 * @property int $v_p3_hats
 * @property int $v_p3_six
 * @property int $v_p4
 * @property int $v_p4_outs
 * @property int $v_p4_hats
 * @property int $v_p4_six
 * @property int $h_p1
 * @property int $h_p1_outs
 * @property int $h_p1_hats
 * @property int $h_p1_six
 * @property int $h_p2
 * @property int $h_p2_outs
 * @property int $h_p2_hats
 * @property int $h_p2_six
 * @property int $h_p3
 * @property int $h_p3_outs
 * @property int $h_p3_hats
 * @property int $h_p3_six
 * @property int $h_p4
 * @property int $h_p4_outs
 * @property int $h_p4_hats
 * @property int $h_p4_six
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Player $hp1
 * @property-read \App\Models\Player $hp2
 * @property-read \App\Models\Player $hp3
 * @property-read \App\Models\Player $hp4
 * @property-read \App\Models\Match $match
 * @property-read \App\Models\Player $vp1
 * @property-read \App\Models\Player $vp2
 * @property-read \App\Models\Player $vp3
 * @property-read \App\Models\Player $vp4
 * @method static \Illuminate\Database\Eloquent\Builder|MatchScore newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MatchScore newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MatchScore query()
 * @method static \Illuminate\Database\Eloquent\Builder|MatchScore whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MatchScore whereHP1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MatchScore whereHP1Hats($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MatchScore whereHP1Outs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MatchScore whereHP1Six($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MatchScore whereHP2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MatchScore whereHP2Hats($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MatchScore whereHP2Outs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MatchScore whereHP2Six($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MatchScore whereHP3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MatchScore whereHP3Hats($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MatchScore whereHP3Outs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MatchScore whereHP3Six($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MatchScore whereHP4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MatchScore whereHP4Hats($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MatchScore whereHP4Outs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MatchScore whereHP4Six($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MatchScore whereHomeTeamPoints($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MatchScore whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MatchScore whereMatchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MatchScore whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MatchScore whereVP1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MatchScore whereVP1Hats($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MatchScore whereVP1Outs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MatchScore whereVP1Six($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MatchScore whereVP2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MatchScore whereVP2Hats($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MatchScore whereVP2Outs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MatchScore whereVP2Six($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MatchScore whereVP3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MatchScore whereVP3Hats($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MatchScore whereVP3Outs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MatchScore whereVP3Six($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MatchScore whereVP4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MatchScore whereVP4Hats($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MatchScore whereVP4Outs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MatchScore whereVP4Six($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MatchScore whereVisitingTeamPoints($value)
 * @mixin \Eloquent
 */
	class IdeHelperMatchScore extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MissingScore
 *
 * @property int $id
 * @property int $match_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Match $match
 * @method static \Illuminate\Database\Eloquent\Builder|MissingScore newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MissingScore newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MissingScore query()
 * @method static \Illuminate\Database\Eloquent\Builder|MissingScore whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MissingScore whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MissingScore whereMatchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MissingScore whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperMissingScore extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Player
 *
 * @property int $id
 * @property string $name
 * @property string $gender
 * @property int $team_id
 * @property int $outs
 * @property int $hats
 * @property int $six
 * @property int $points
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MatchScore[] $match_scores_h_p1
 * @property-read int|null $match_scores_h_p1_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MatchScore[] $match_scores_h_p2
 * @property-read int|null $match_scores_h_p2_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MatchScore[] $match_scores_h_p3
 * @property-read int|null $match_scores_h_p3_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MatchScore[] $match_scores_h_p4
 * @property-read int|null $match_scores_h_p4_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MatchScore[] $match_scores_v_p1
 * @property-read int|null $match_scores_v_p1_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MatchScore[] $match_scores_v_p2
 * @property-read int|null $match_scores_v_p2_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MatchScore[] $match_scores_v_p3
 * @property-read int|null $match_scores_v_p3_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MatchScore[] $match_scores_v_p4
 * @property-read int|null $match_scores_v_p4_count
 * @property-read \App\Models\Team $team
 * @method static \Illuminate\Database\Eloquent\Builder|Player newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Player newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Player query()
 * @method static \Illuminate\Database\Eloquent\Builder|Player whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Player whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Player whereHats($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Player whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Player whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Player whereOuts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Player wherePoints($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Player whereSix($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Player whereTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Player whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperPlayer extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Team
 *
 * @property int $id
 * @property string $name
 * @property int $team_no
 * @property string $phone_no
 * @property float|null $gps_lat
 * @property float|null $gps_long
 * @property int $points
 * @property int $fhp
 * @property int $shp
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Match[] $home_matches
 * @property-read int|null $home_matches_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Player[] $players
 * @property-read int|null $players_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Player[] $playersByName
 * @property-read int|null $players_by_name_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\League[] $presidents
 * @property-read int|null $presidents_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Match[] $visiting_matches
 * @property-read int|null $visiting_matches_count
 * @method static \Illuminate\Database\Eloquent\Builder|Team newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Team newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Team query()
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereFhp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereGpsLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereGpsLong($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team wherePhoneNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team wherePoints($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereShp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereTeamNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperTeam extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperUser extends \Eloquent {}
}

