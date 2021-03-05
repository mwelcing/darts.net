<?php

namespace App\Http\Controllers;

use App\Models\EightTeam;
use App\Models\ExcludedDate;
use App\Models\League;
use App\Models\Match;
use App\Models\MatchDate;
use App\Models\Team;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $matchDates = MatchDate::orderBy('week_no')->get();
        return view('layouts.matches.index', compact('matchDates'));
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function genMatchDates(Request $request)
    {
        $weekone = Carbon::parse($request->weekone);
        $split = League::first()->split_season;
        $weeks = $request->weeks;

        $currweek = $weekone;
        for ($i = 0; $i < $weeks; $i++) {
            $exclude = ExcludedDate::whereDate('date', $currweek)->first();
            if ($exclude) {
                //reset $i to $i -1 to try again
                $i = $i - 1;
            } else {
                //Create a Match Date
                $weekNo = $i + 1;
                MatchDate::create([
                    'week_no' => $weekNo,
                    'date' => $currweek,
                    'half' => $split ? $weekNo > 14 ? 2 : 1 : 1,
                    'position_round' => false
                ]);
            }
            $currweek->addDays(7);
        }
        $request->session()->flash('success', 'Dates successfully created');
        return redirect(route('matches.index'));
    }

    /**
     * @return Application|Factory|View
     */
    public function getMatchDatesView()
    {
        return view('genMatchDates');
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function generateMatches(Request $request)
    {
        $mdates = MatchDate::all();
        foreach ($mdates as $mdate) {
            $dateid = $mdate->id;
            $weekNo = $mdate->week_no;

            //Find the matches for week_no in Eight Team Table
            $matches = EightTeam::whereWeekNo($weekNo)->get();
            foreach ($matches as $match) {
                $hid = Team::whereTeamNo($match->home_team)->first();
                $vid = Team::whereTeamNo($match->visiting_team)->first();
                Match::create([
                    'match_date_id' => $dateid,
                    'home_team_id' => $hid->id,
                    'visiting_team_id' => $vid->id
                ]);
            }
        }

        $request->session()->flash('success', 'Matches successfully generated');
        return redirect(route('matches.index'));
    }
}
