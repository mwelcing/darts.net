<?php

namespace App\Http\Controllers;

use App\Models\Match;
use App\Models\MissingScore;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class MissingScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $missingscores = MissingScore::all();
        return view('layouts.missing_scores.index', compact('missingscores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $matchdates = MatchDate::orderBy('week_no')->get();
        return view('layouts.missing_scores.create', compact('matchdates'));
    }
    /**
     * Return Matches based on passed in date
     * @param Request $request
     * @return Match[]|Builder[]|Collection
     */
    public function matches(Request $request) {
        $matches = Match::whereMatchDateId($request->input('matchdateid'))
            ->with('home_team')
            ->with('visiting_team')
            ->get();
        return $matches;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function store(Request $request)
    {
        MissingScore::create([
            'match_id' => $request->input('match_id')
        ]);
        $request->session()->flash('success', 'Saved');
        return redirect(route('missingscores.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param MissingScore $missingscore
     * @return Response
     */
    public function show(MissingScore $missingscore)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param MissingScore $missingscore
     * @return Response
     */
    public function edit(MissingScore $missingscore)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param MissingScore $missingscore
     * @return Response
     */
    public function update(Request $request, MissingScore $missingscore)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param MissingScore $missingscore
     * @return Application|RedirectResponse|Response|Redirector
     * @throws \Exception
     */
    public function destroy(MissingScore $missingscore)
    {
        $missingscore->delete();
        \Session::flash('deleted', 'Message Deleted');
        return redirect(route('missingscores.index'));
    }
}
