<?php

namespace App\Http\Controllers;

use App\Models\League;
use App\Models\Match;
use App\Models\MatchDate;
use App\Models\MatchScore;
use App\Models\Player;
use App\Models\Team;
use App\Rules\NotZero;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $matchDates = MatchDate::orderBy('week_no')->get();
        return view('layouts.matches.index', compact('matchDates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $matchdateid
     * @return Application|Factory|View|Response
     */
    public function create($matchdateid)
    {
        $matchDates = MatchDate::orderBy('week_no', 'asc')->get();
        $teams = Team::orderBy('team_no', 'asc')->get();
        return view('layouts.matches.create', compact('matchDates', 'teams', 'matchdateid'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'match_date_id' => ['required', new NotZero()],
            'home_team_id' => ['required', new NotZero()],
            'visiting_team_id' => ['required', new NotZero()]
        ]);


        Match::create($request->except('savenadd', 'save'));
        $request->session()->flash('success', 'Match Added');
        return redirect(route("matches.create", $request->get('match_date_id')));
    }

    public function enterscores($matchdateid)
    {
        $matches = Match::whereMatchDateId($matchdateid)->get();
        return view('layouts.matches.scores', compact('matches', 'matchdateid'));
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function savescores(Request $request)
    {
        $matchCount = count(collect($request->get('match-id')));
        for ($i = 1; $i <= $matchCount; $i++) {
            $match_id = $request->input('match-id.' . $i);
            $visiting_team_points = $request->input('visiting-team-points.' . $i);
            $home_team_points = $request->input('home-team-points.' . $i);
            $v_p1 = $request->input('v-p1.' . $i);
            $v_p1_outs = $request->input('v-p1-outs.' . $i);
            $v_p1_hats = $request->input('v-p1-hats.' . $i);
            $v_p1_six = $request->input('v-p1-six.' . $i);
            $v_p2 = $request->input('v-p2.' . $i);
            $v_p2_outs = $request->input('v-p2-outs.' . $i);
            $v_p2_hats = $request->input('v-p2-hats.' . $i);
            $v_p2_six = $request->input('v-p2-six.' . $i);
            $v_p3 = $request->input('v-p3.' . $i);
            $v_p3_outs = $request->input('v-p3-outs.' . $i);
            $v_p3_hats = $request->input('v-p3-hats.' . $i);
            $v_p3_six = $request->input('v-p3-six.' . $i);
            $v_p4 = $request->input('v-p4.' . $i);
            $v_p4_outs = $request->input('v-p4-outs.' . $i);
            $v_p4_hats = $request->input('v-p4-hats.' . $i);
            $v_p4_six = $request->input('v-p4-six.' . $i);
            $h_p1 = $request->input('h-p1.' . $i);
            $h_p1_outs = $request->input('h-p1-outs.' . $i);
            $h_p1_hats = $request->input('h-p1-hats.' . $i);
            $h_p1_six = $request->input('h-p1-six.' . $i);
            $h_p2 = $request->input('h-p2.' . $i);
            $h_p2_outs = $request->input('h-p2-outs.' . $i);
            $h_p2_hats = $request->input('h-p2-hats.' . $i);
            $h_p2_six = $request->input('h-p2-six.' . $i);
            $h_p3 = $request->input('h-p3.' . $i);
            $h_p3_outs = $request->input('h-p3-outs.' . $i);
            $h_p3_hats = $request->input('h-p3-hats.' . $i);
            $h_p3_six = $request->input('h-p3-six.' . $i);
            $h_p4 = $request->input('h-p4.' . $i);
            $h_p4_outs = $request->input('h-p4-outs.' . $i);
            $h_p4_hats = $request->input('h-p4-hats.' . $i);
            $h_p4_six = $request->input('h-p4-six.' . $i);

            //Now save the players score for the match
            $matchscore = MatchScore::create([
                'match_id' => $match_id,
                'home_team_points' => $home_team_points,
                'visiting_team_points' => $visiting_team_points,
                'v_p1' => $v_p1,
                'v_p1_outs' => $v_p1_outs,
                'v_p1_hats' => $v_p1_hats,
                'v_p1_six' => $v_p1_six,
                'v_p2' => $v_p2,
                'v_p2_outs' => $v_p2_outs,
                'v_p2_hats' => $v_p2_hats,
                'v_p2_six' => $v_p2_six,
                'v_p3' => $v_p3,
                'v_p3_outs' => $v_p3_outs,
                'v_p3_hats' => $v_p3_hats,
                'v_p3_six' => $v_p3_six,
                'v_p4' => $v_p4,
                'v_p4_outs' => $v_p4_outs,
                'v_p4_hats' => $v_p4_hats,
                'v_p4_six' => $v_p4_six,
                'h_p1' => $h_p1,
                'h_p1_outs' => $h_p1_outs,
                'h_p1_hats' => $h_p1_hats,
                'h_p1_six' => $h_p1_six,
                'h_p2' => $h_p2,
                'h_p2_outs' => $h_p2_outs,
                'h_p2_hats' => $h_p2_hats,
                'h_p2_six' => $h_p2_six,
                'h_p3' => $h_p3,
                'h_p3_outs' => $h_p3_outs,
                'h_p3_hats' => $h_p3_hats,
                'h_p3_six' => $h_p3_six,
                'h_p4' => $h_p4,
                'h_p4_outs' => $h_p4_outs,
                'h_p4_hats' => $h_p4_hats,
                'h_p4_six' => $h_p4_six
            ]);

            //Save the Team Scores
            $match = Match::whereId($match_id)->first();
            $match->fill([
                'entered' => true
            ]);

            $match->saveOrFail();
        }

        // Update MatchDate set entered = true
        $matchdateid = $request->input('matchdateid');
        $matchDate = MatchDate::whereId($matchdateid)->first();
        $matchDate->fill([
            'scores_entered' => true
        ]);
        $matchDate->saveOrFail();

        $request->session()->flash('success', 'Scores Saved');
        return redirect(route('matches.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param Match $match
     * @return Response
     */
    public function show(Match $match)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Match $match
     * @return Application|Factory|View|Response
     */
    public function edit(Match $match)
    {
        $home_players = $match->home_team->players;
        $visiting_players = $match->visiting_team->players;
        return view('layouts.match_scores.edit', compact('match', 'home_players', 'visiting_players'));
    }

    /**
     * Calculates the scores
     */
    public function splitSeasonCalcScores()
    {
        //Update Team Scores
        $teams = Team::all();
        foreach ($teams as $team) {
            $fhp = 0;
            $shp = 0;
            $points = 0;
            $matches = Match::whereHomeTeamId($team->id)
                ->with('match_score')->get();
            foreach ($matches as $match) {
                if ($match->match_date->week_no < 15) {
                    if ($match->match_score) {
                        $fhp = $fhp + $match->match_score->home_team_points;
                    }
                } else {
                    if ($match->match_score) {
                        $shp = $shp + $match->match_score->home_team_points;
                    }
                }
            }

            $matches = Match::whereVisitingTeamId($team->id)
                ->with('match_score')->get();
            foreach ($matches as $match) {
                if ($match->match_date->week_no < 15) {
                    if ($match->match_score) {
                        $fhp = $fhp + $match->match_score->visiting_team_points;
                    }
                } else {
                    if ($match->match_score) {
                        $shp = $shp + $match->match_score->visiting_team_points;
                    }
                }
            }

            $points = $fhp + $shp;

            $team->fill([
                'fhp' => $fhp,
                'shp' => $shp,
                'points' => $points
            ]);

            $team->saveOrFail();
        }

        //Update Player Scores
        $players = Player::all();
        foreach ($players as $player) {
            $outs = 0;
            $hats = 0;
            $six = 0;
            $scores = $player->match_scores_h_p1;
            foreach ($scores as $score) {
                $outs = $outs + $score->h_p1_outs;
                $hats = $hats + $score->h_p1_hats;
                $six = $six + $score->h_p1_six;
            }
            $scores = $player->match_scores_h_p2;
            foreach ($scores as $score) {
                $outs = $outs + $score->h_p2_outs;
                $hats = $hats + $score->h_p2_hats;
                $six = $six + $score->h_p2_six;
            }
            $scores = $player->match_scores_h_p3;
            foreach ($scores as $score) {
                $outs = $outs + $score->h_p3_outs;
                $hats = $hats + $score->h_p3_hats;
                $six = $six + $score->h_p3_six;
            }
            $scores = $player->match_scores_h_p4;
            foreach ($scores as $score) {
                $outs = $outs + $score->h_p4_outs;
                $hats = $hats + $score->h_p4_hats;
                $six = $six + $score->h_p4_six;
            }
            $scores = $player->match_scores_v_p1;
            foreach ($scores as $score) {
                $outs = $outs + $score->v_p1_outs;
                $hats = $hats + $score->v_p1_hats;
                $six = $six + $score->v_p1_six;
            }
            $scores = $player->match_scores_v_p2;
            foreach ($scores as $score) {
                $outs = $outs + $score->v_p2_outs;
                $hats = $hats + $score->v_p2_hats;
                $six = $six + $score->v_p2_six;
            }
            $scores = $player->match_scores_v_p3;
            foreach ($scores as $score) {
                $outs = $outs + $score->v_p3_outs;
                $hats = $hats + $score->v_p3_hats;
                $six = $six + $score->v_p3_six;
            }
            $scores = $player->match_scores_v_p4;
            foreach ($scores as $score) {
                $outs = $outs + $score->v_p4_outs;
                $hats = $hats + $score->v_p4_hats;
                $six = $six + $score->v_p4_six;
            }

            $pointsForHat = League::first()->pfh;
            $pointsForSix = League::first()->pfs;

            $player->fill([
                'outs' => $outs,
                'hats' => $hats,
                'six' => $six,
                'points' => ($outs) + ($hats * $pointsForHat) + ($six * $pointsForSix)
            ]);

            $player->saveOrFail();
        }

        \Session::flash('success', 'Scores Updated');
        return redirect(route('welcome'));
    }

    /**
     * Save the Updated Scores
     *
     * @param Request $request
     */
    public function updatescores(Request $request, MatchScore $matchscore)
    {
        $visiting_team_points = $request->input('visiting-team-points');
        $home_team_points = $request->input('home-team-points');
        $v_p1 = $request->input('v-p1');
        $v_p1_outs = $request->input('v-p1-outs');
        $v_p1_hats = $request->input('v-p1-hats');
        $v_p1_six = $request->input('v-p1-six');
        $v_p2 = $request->input('v-p2');
        $v_p2_outs = $request->input('v-p2-outs');
        $v_p2_hats = $request->input('v-p2-hats');
        $v_p2_six = $request->input('v-p2-six');
        $v_p3 = $request->input('v-p3');
        $v_p3_outs = $request->input('v-p3-outs');
        $v_p3_hats = $request->input('v-p3-hats');
        $v_p3_six = $request->input('v-p3-six');
        $v_p4 = $request->input('v-p4');
        $v_p4_outs = $request->input('v-p4-outs');
        $v_p4_hats = $request->input('v-p4-hats');
        $v_p4_six = $request->input('v-p4-six');
        $h_p1 = $request->input('h-p1');
        $h_p1_outs = $request->input('h-p1-outs');
        $h_p1_hats = $request->input('h-p1-hats');
        $h_p1_six = $request->input('h-p1-six');
        $h_p2 = $request->input('h-p2');
        $h_p2_outs = $request->input('h-p2-outs');
        $h_p2_hats = $request->input('h-p2-hats');
        $h_p2_six = $request->input('h-p2-six');
        $h_p3 = $request->input('h-p3');
        $h_p3_outs = $request->input('h-p3-outs');
        $h_p3_hats = $request->input('h-p3-hats');
        $h_p3_six = $request->input('h-p3-six');
        $h_p4 = $request->input('h-p4');
        $h_p4_outs = $request->input('h-p4-outs');
        $h_p4_hats = $request->input('h-p4-hats');
        $h_p4_six = $request->input('h-p4-six');

        //Now save the players score for the match
        $matchscore->fill([
            'home_team_points' => $home_team_points,
            'visiting_team_points' => $visiting_team_points,
            'v_p1' => $v_p1,
            'v_p1_outs' => $v_p1_outs,
            'v_p1_hats' => $v_p1_hats,
            'v_p1_six' => $v_p1_six,
            'v_p2' => $v_p2,
            'v_p2_outs' => $v_p2_outs,
            'v_p2_hats' => $v_p2_hats,
            'v_p2_six' => $v_p2_six,
            'v_p3' => $v_p3,
            'v_p3_outs' => $v_p3_outs,
            'v_p3_hats' => $v_p3_hats,
            'v_p3_six' => $v_p3_six,
            'v_p4' => $v_p4,
            'v_p4_outs' => $v_p4_outs,
            'v_p4_hats' => $v_p4_hats,
            'v_p4_six' => $v_p4_six,
            'h_p1' => $h_p1,
            'h_p1_outs' => $h_p1_outs,
            'h_p1_hats' => $h_p1_hats,
            'h_p1_six' => $h_p1_six,
            'h_p2' => $h_p2,
            'h_p2_outs' => $h_p2_outs,
            'h_p2_hats' => $h_p2_hats,
            'h_p2_six' => $h_p2_six,
            'h_p3' => $h_p3,
            'h_p3_outs' => $h_p3_outs,
            'h_p3_hats' => $h_p3_hats,
            'h_p3_six' => $h_p3_six,
            'h_p4' => $h_p4,
            'h_p4_outs' => $h_p4_outs,
            'h_p4_hats' => $h_p4_hats,
            'h_p4_six' => $h_p4_six
        ]);

        $matchscore->saveOrFail();

        //Recalc scores


        $request->session()->flash('success', 'Scores Updated');
        return redirect(route('matches.index'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Match $match
     * @return Response
     */
    public function update(Request $request, Match $match)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Match $match
     * @return Response
     */
    public function destroy(Match $match)
    {
        //
    }
}
