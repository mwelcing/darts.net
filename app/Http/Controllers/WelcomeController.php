<?php

namespace App\Http\Controllers;

use App\Models\AdminMessage;
use App\Models\League;
use App\Models\Match;
use App\Models\MatchDate;
use App\Models\MatchScore;
use App\Models\MissingScore;
use App\Models\Player;
use App\Models\Team;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class WelcomeController extends Controller
{
    /**
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $now = Carbon::now()->toDateString();
        $nextDate = (new MatchDate)->where('date', '>=', $now)->first();
        $nextMatches = Match::whereMatchDateId($nextDate->id)->get();
        $f_teams = (new Team)->where('name', '!=', 'Bye')
            ->with(
                'home_matches.match_score.vp1',
                'home_matches.match_score.vp2',
                'home_matches.match_score.vp3',
                'home_matches.match_score.vp4',
                'home_matches.match_score.hp1',
                'home_matches.match_score.hp2',
                'home_matches.match_score.hp3',
                'home_matches.match_score.hp4',
                'home_matches.visiting_team',
                'home_matches.match_date'
            )
            ->orderBy('fhp', 'desc')
            ->orderBy('name')
            ->get();
        $s_teams = (new Team)->where('name', '!=', 'Bye')
            ->orderBy('shp', 'desc')
            ->orderBy('name')
            ->get();
        $m_players = Player::whereGender('M')
            ->where('name', '!=', '-')
            ->where('points', '>', 0)
            ->orderBy('points', 'desc')
            ->with('team')
            ->get();
        $f_players = Player::whereGender('F')
            ->where('name', '!=', '-')
            ->where('points', '>', 0)
            ->orderBy('points', 'desc')
            ->with('team')
            ->get();
        $phone_list = (new Team)->where('name', '!=', 'Bye')
            ->orderBy('name')
            ->get();
        $league = (new League)->first();
        $adminmessages = AdminMessage::all();
        $missingscores = MissingScore::all();
        return view('welcome', compact('f_teams', 's_teams', 'm_players', 'f_players', 'phone_list', 'league', 'nextMatches', 'nextDate', 'adminmessages', 'missingscores'));
    }

    /** Render component.team.matches and pass rendered view in response
     * @param Request $request
     * @return string
     */
    public function team_match(Request $request): string
    {
        $q = Team::query();
        $q->with('home_matches');
        $q->with('visiting_matches');
        $q->where('id', $request->input('team'));
        $teamRecord = $q->get()->first();
        $view = View::make('components.team-matches', ['team' => $teamRecord]);
        return $view->render();
    }

    /**
     * @param Player $player
     * @return MatchScore|Builder|Builder[]|Collection
     */
    public function player_stats(Player $player)
    {
        $p = (new Player)->find($player)->first();
        $q = MatchScore::query();
        $q->where('h_p1', $p->id);
        $q->orWhere('h_p2', $p->id);
        $q->orWhere('h_p3', $p->id);
        $q->orWhere('h_p4', $p->id);
        $q->orWhere('v_p1', $p->id);
        $q->orWhere('v_p2', $p->id);
        $q->orWhere('v_p3', $p->id);
        $q->orWhere('v_p4', $p->id);
        $q->with('match.match_date');

        return $q->get();
    }
}
